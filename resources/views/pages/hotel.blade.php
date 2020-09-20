@extends('layouts.app')

@section('content')
    <div id="myCarousel" class="carousel slide carousel-fade">
        <div class="carousel-inner" role="listbox">
            <!-- First slide -->
            <div class="item active">
                <img class="first-slide img-responsive" src="{{ asset("theme/images/slide1.jpg") }}" alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="col-xs-12 text-left">
                            <h2 class="toggleHeading"><em>Sandhya Resort and Spa, Manali</em></h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second slide -->
            <div class="item">
                <img class="second-slide img-responsive" src="{{ asset("theme/images/slide2.jpg") }}" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="col-xs-12 text-left">
                            <h2 class="toggleHeading"><em>Hotel Sandhya Palace, Kullu</em></h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third slide -->
            <div class="item">
                <img class="third-slide img-responsive" src="{{ asset("theme/images/slide3.jpg") }}" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="col-xs-12 text-left">
                            <h2 class="toggleHeading"><em>Hotel Sandhya, Kasol</em></h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="sr-only">Previous</span></a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="sr-only">Next</span></a>

    </div>
    @include("layouts.message")
    <main id="hotelInner">
        @foreach($overviews as $overview)
            @if($loop->iteration % 2==0)
                <article class="description-block container b-padding">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 pull-left">
                            <h1 class="room-text">{{ $overview->title }}</h1>
                            {!! $overview->description ?? '' !!}
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="image-frame">
                                <img src="{{ asset("images/{$hotel->slug}/{$overview->image}") }}" alt="{{ $overview->title }}">
                            </div>
                        </div>
                    </div>
                </article>
            @else
                <article class="container b-padding">
                    <div class="row">
                        <div class="col-md-6 col-sm-6  pull-left">
                            <div class="image-frame">
                                <img src="{{ asset("images/{$hotel->slug}/{$overview->image}") }}" alt="{{ $overview->title }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h1 class="head-room-text">{{ $overview->title }}</h1>
                            {!! $overview->description ?? '' !!}
                        </div>

                    </div>
                </article>
            @endif
        @endforeach

        <!-- gallery-block -->
        <section class="gallery-block container b-padding">
            <div class="row">
                <header class="col-xs-12">
                    <h1>gallery</h1>
                </header>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <!-- carousel -->
                    <div id="carousel-example-generic" class="carousel image-gallery slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @php($chunks = $hotel->galleries->chunk(3))
                            @foreach($chunks as $chunk)
                                <div class="item @if($loop->iteration===1) active @endif">
                                    <div class="row">
                                        @foreach($chunk as $gallery)
                                            <div class="col-xs-4">
                                                <a href="{{ asset("images/{$hotel->slug}/{$gallery->image}") }}" class="fancybox" >
                                                    <img src="{{ asset("images/{$hotel->slug}/{$gallery->image}") }}" alt="{{ $gallery->alt }}">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"></a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('theme/js/myscript.js') }}"></script>
@endsection
