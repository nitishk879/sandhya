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
                        <form action="{{ route("search") }}" class="holder reservation-bar">
                            <div class="input-append date" id="dpd1" data-date="Check In" data-date-format="dd-mm-yyyy">
                                <input class="form-control" name="arrival_date" size="16" type="text" value="{{ $arrival_date ?? '' }}">
                                <span class="icon-calendar"></span>
                            </div>
                            <div class="input-append date" id="dpd2" data-date="Check Out" data-date-format="dd-mm-yyyy">
                                <input class="form-control" name="departure_date" size="16" type="text" value="{{ $departure_date ?? '' }}">
                                <span class="icon-calendar"></span>
                            </div>
                            <div class="form-group">
                                <div class="fake-select">
                                    <select name="adult">
                                        <option value="">Adult</option>
                                        @for($i=1; $i <=5; $i++)
                                            @isset($adult_size)
                                                <option value="{{ $i }}" @if($adult_size==$i) selected @endif>{{ $i }}</option>
                                            @else
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endisset
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="fake-select">
                                    <select name="palace">
                                        <option value="">Hotel</option>
                                        @foreach($hotels as $hotel)
                                            @isset($palace)
                                                <option value="{{ $hotel->slug }}" @if($palace==$hotel->slug) selected @endif>{{ $hotel->name }}</option>
                                            @else
                                                <option value="{{ $hotel->slug }}">{{ $hotel->name }}</option>
                                            @endisset
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-default" value="check availability">
                        </form>
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
                                                    <input id="check-{{ $category->id }}" name="type[]" value="{{ $category->id }}" type="checkbox">
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
                                <li><a href="">Single room</a></li>
                                <li><a href="">Double room</a></li>
                                <li><a href="">Family room</a></li>
                            </ul>
                        </div>
                    </section>
                </aside>
                <!-- content -->
                @isset($rooms)
                    <div class="col-md-9 col-sm-8 content" id="roomOutput">
                        <div class="row rooms list-view">
                            @foreach($rooms as $room)
                                <article class="article">
                                    <div class="col-md-8 col-sm-12 col">
                                        <div class="image-frame">
                                            <img src="{{ asset("storage/rooms/{$room->image}") }}" alt="{{ $room->name }}" title="{{ $room->category->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col">
                                        <div class="info-block">
                                            <div class="info-frame">
                                                <h1>{{ $room->category->name }}</h1>
                                                <p>{{ $room->category->overview }}</p>
                                                <dl class="detail-list">
                                                    <dt>Bed:</dt><dd>{{ $room->type->name }} - 1 double bed</dd>
                                                    <dt>Max:</dt><dd>2 people</dd>
                                                    <dt>Room size:</dt><dd>32mp</dd>
                                                </dl>
                                                <div class="btn-holder">
                                                    <a href="{{ route('book-room', $room->id) }}" class="btn btn-default">
                                                        @if(Session::has('cart') && array_key_exists($room->id, Session::get('cart')->rooms))
                                                            Room Added
                                                        @else
                                                            Book Room
                                                        @endif
                                                    </a>
                                                    <strong class="rent-price">{{ config('app.default_currency' ?? '₹') }} {{ $room->price }} <span>per night</span></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        @if($rooms->count()!==0)
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
                        @else
                            <div class="col-md-9 col-sm-8 content" >
                                <p>Sorry! there are no rooms available as per your search! Please change your search and try again.</p>
                            </div>
                        @endif
                    </div>
                @endisset
            </div>
        </div>
    </main>
@endsection

@section('scripts')

@endsection
