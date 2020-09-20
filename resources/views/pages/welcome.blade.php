@extends('layouts.app')

@section('content')
    <div id="myCarousel" class="carousel slide carousel-fade">
        <div class="carousel-inner" role="listbox">
            <!-- First slide -->
            <div class="item active">
                <img class="first-slide img-responsive" src="{{ asset("images/sliders/DSC_0144.JPG") }}" alt="First slide">
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
                <img class="second-slide img-responsive" src="{{ asset("images/sliders/DSC_0507.JPG") }}" alt="Second slide">
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
                <img class="third-slide img-responsive" src="{{ asset("images/sliders/DSC_0942.JPG") }}" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="col-xs-12 text-left">
                            <h2 class="toggleHeading"><em>Hotel Sandhya, Kasol</em></h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Third slide -->
            <div class="item">
                <img class="third-slide img-responsive" src="{{ asset("images/sliders/DSC_0973.JPG") }}" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="col-xs-12 text-left">
                            <h2 class="toggleHeading"><em>Hotel Sandhya, Kasol</em></h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Third slide -->
            <div class="item">
                <img class="third-slide img-responsive" src="{{ asset("images/sliders/DSC_7759.JPG") }}" alt="Third slide">
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
    <!-- reservation-bar -->
    <div class="reservation-bar">
        <div class="container">
            <div class="row">
                <form action="{{ route('search') }}">
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <div class="input-append date" id="dpd1" data-date="Check In" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" size="16" type="text" name="arrival_date" value="Arrive date" required />
                                    <span class="icon-calendar"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="input-append date" id="dpd2" data-date="Check Out" data-date-format="dd-mm-yyyy">
                                    <input class="form-control" size="16" type="text" name="departure_date" value="Departure date" required />
                                    <span class="icon-calendar"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="fake-select">
                                        <select name="adult_size" required>
                                            <option value="Adult" selected>Adult</option>
                                            @for($i=1;$i<=5;$i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="fake-select">
                                        <select name="palace" required>
                                            <option value="" selected>Manali</option>
                                            @foreach($hotels as $hotel)
                                                <option value="{{ $hotel->slug }}">{{ $hotel->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-default" value="check availability">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <main id="main">
        <section class="about">
            <div class="container b-container">
                <div class="row">
                    <header class="header col-xs-12 g-padding">
                        <h1>A few words</h1>
                    </header>
                </div>
                <div class="row">
                    <div class="col-sm-4 animate" data-anim-type="fadeInUp" data-anim-delay="300">
                        <div class="box">
                            <div class="box-img"><img src="{{ asset("theme/images/small-banner1.jpg") }}" alt=""></div>
                            <div class="box-body">
                                <h2><a href="{{ route("hotel.show", "sandhya-resort-and-spa-manali") }}">Sandhya Resort and Spa, Manali</a></h2>
                                <a class="btn btn-theme-outline" href="">Explore</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 animate" data-anim-type="fadeInUp" data-anim-delay="600">
                        <div class="box">
                            <div class="box-img"><img src="{{ asset("theme/images/small-banner2.jpg") }}" alt=""></div>
                            <div class="box-body">
                                <h2><a href="{{ route("hotel.show", "sandhya-palace-kullu") }}">Sandhya Palace Kullu</a></h2>
                                <a href="" class="btn btn-theme-outline">Explore</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 animate" data-anim-type="fadeInUp" data-anim-delay="900">
                        <div class="box">
                            <div class="box-img"><img src="{{ asset("theme/images/small-banner3.jpg") }}" alt=""></div>
                            <div class="box-body">
                                <h2><a href="{{ route("hotel.show", "sandhya-kasol") }}">Sandhya Kasol</a></h2>
                                <a href="" class="btn btn-theme-outline">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('head')@endsection
@section('scripts')
    <script type="text/javascript">
        // Animating the carousel's captions
        var carouselContainer = $('.carousel');
        var slideInterval = 5000;

        function toggleH(){
            $('.toggleHeading').hide()
            var caption = carouselContainer.find('.active').find('.toggleHeading').addClass('animated flipInX').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                function (){
                    $(this).removeClass('animated flipInX')});
            caption.slideToggle();
        }

        function toggleC(){
            $('.toggleCaption').hide()
            var caption = carouselContainer.find('.active').find('.toggleCaption').addClass('animated fadeInUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                function (){
                    $(this).removeClass('animated fadeInUp')
                });
            caption.slideToggle();
        }
        carouselContainer.carousel({
            interval: slideInterval, cycle: true, pause: "hover"})
            .on('slide.bs.carousel slid.bs.carousel', toggleH).trigger('slide.bs.carousel')
            .on('slide.bs.carousel slid.bs.carousel', toggleC).trigger('slide.bs.carousel');
    </script>
@endsection
