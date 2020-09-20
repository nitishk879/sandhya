@extends('layouts.app')

@section('content')
    <div class="banner inner-page-banner">
        <img src="{{ asset("theme/images/inner-page-banner.png") }}" alt="">
    </div>
    <div class="navigation-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-7">
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">{{ $page_title ?? 'SANDHYA RESORT & SPA, MANALI' }}</li>
                    </ol>
                </div>
                <div class="col-xs-5">
                    <a href="{{ route('hotels') }}" class="link">book a room</a>
                </div>
            </div>
        </div>
    </div>
    @include("layouts.message")
    <main id="mainInner">
        <style type="text/css">
            .paging .pagination > .page-item.active .page-link {
                background: #c2a476!important;
                border-color: #c2a476!important;
            }
            .paging .pagination > .page-item {
                margin: 0;
                padding: 0 0 0 10px;
                display: inline-block;
                vertical-align: middle;
            }
            .paging .pagination > .page-item > .page-link {
                padding: 0;
                display: block;
                text-align: center;
                border-radius: 3px;
                width: 20px;
                height: 20px;
                border: 1px solid #d4d2ce;
                font: 400 16px/18px "Source Sans Pro", Arial, helvetica, sans-serif;
            }
        </style>
        <div class="container gen-padding">
            <div class="row">
                <!-- side bar -->
                <aside class="col-md-3 col-sm-4 sidebar">
                    <!-- widget -->
                    <section class="widget">
                        <h1>Book a room</h1>
                        <div class="holder reservation-bar">
                            <div class="input-append date" id="dpd1" data-date="Check In" data-date-format="dd-mm-yyyy">
                                <input class="form-control" size="16" type="text" value="Arrive date">
                                <span class="icon-calendar"></span>
                            </div>
                            <div class="input-append date" id="dpd2" data-date="Check Out" data-date-format="dd-mm-yyyy">
                                <input class="form-control" size="16" type="text" value="Departure date">
                                <span class="icon-calendar"></span>
                            </div>
                            <div class="form-group">
                                <div class="fake-select">
                                    <select>
                                        <option selected value="Adult">Adult</option>
                                        <option>Children</option>
                                        <option>Option3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="fake-select">
                                    <select>
                                        <option selected value="Room">Room</option>
                                        <option>Option2</option>
                                        <option>Option3</option>
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-default" value="check availability">
                        </div>
                    </section>
                    <!-- widget -->
                    <section class="widget">
                        <h1>filter by</h1>
                        <div class="holder">
                            <div class="block">
                                <h2>Room type</h2>
                                <form id="filter" method="post" action="{{ route('search-results') }}">
                                    @csrf
                                    <ul class="list-unstyled">
                                        @foreach($room_categories as $category)
                                            <li>
                                                <label for="check-{{ $category->id }}">
                                                    <input id="check-{{ $category->id }}" name="type[]" @if(in_array($category->id, $chosen)) checked @endif value="{{ $category->id }}" type="checkbox">
                                                    <span class="fake-input"></span>
                                                    <span class="fake-label">{{ $category->name }}</span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="block">
                                        <h2>Price</h2>
                                        <div class="range-slider">
                                            <div id="slider"></div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-default">Apply Filter</button>
                                </form>
                            </div>
                        </div>
                    </section>
                    <!-- widget -->
                    <section class="widget">
                        <h1>selected rooms</h1>
                        <div class="holder">
                            <ul class="list list-unstyled">
                                @foreach($selected_categories as $category)
                                    <li><a href="#">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                </aside>
                <!-- content -->
                @if($rooms->count() >=1)
                    <div class="col-md-9 col-sm-8 content">
                        <div class="row rooms list-view">
                            @foreach($rooms as $room)
                                <article class="article">
                                    <div class="col-md-8 col-sm-12 col">
                                        <div class="image-frame"><img src="{{ asset("storage/rooms/{$room->image}") }}" alt="{{ $room->name }}" title="{{ $room->name }}"></div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col">
                                        <div class="info-block">
                                            <div class="info-frame">
                                                <h1>{{ $room->category->name }}</h1>
                                                <p>{{ $room->category->overview }}</p>
                                                <dl class="detail-list">
                                                    <dt>Bed:</dt>
                                                    <dd>{{ $room->type->name }} 1 double bed</dd>
                                                    <dt>Max:</dt>
                                                    <dd>2 people</dd>
                                                    <dt>Room size:</dt>
                                                    <dd>32mp</dd>
                                                </dl>
                                                <div class="btn-holder">
                                                    <a href="{{ route('book-room', $room->id) }}" class="btn btn-default">
                                                        @if(Session::has('cart') && array_key_exists($room->id, Session::get('cart')->rooms))
                                                            Room Added
                                                        @else
                                                            Book Room
                                                        @endif
                                                    </a>
                                                    <strong class="rent-price">$235 <span>per night</span></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <strong class="showing-results">Showing results: {{ $rooms->firstItem() }} to {{ $rooms->lastItem() }}, total {{ $rooms->total() }}</strong>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <nav class="paging">
                                    {{ $rooms->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-9 col-sm-8 content">
                        <p>Sorry! No results found for your Filter. Please try with different filter.</p>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection

@section('scripts')@endsection
