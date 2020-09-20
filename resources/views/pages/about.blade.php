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
                        <li class="active">{{ $page_title ?? 'About Us' }}</li>
                    </ol>
                </div>
                <div class="col-xs-5">
                    <a href="{{ route('hotels') }}" class="link">book a room</a>
                </div>
            </div>
        </div>
    </div>
    <main id="mainInner">
        <!-- about us section -->
        <section class="about-us container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 animate" data-anim-type="fadeInUp" data-anim-delay="300">
                    <div class="text-box">
                        <h1>About us</h1>
                        <p>Welcome to Sandhya Group of Hotels. We are a chain of hotels operating in Kullu, Manali and Kasol. We offer you a promising experience with our delightful services and top-notch locations. Our goal is to provide our customers with a world-class ambience blended with style and comfort. Know more about our hotels:</p>
                    </div>
                </div>
{{--                <div class="col-sm-6 animate" data-anim-type="fadeInUp" data-anim-delay="600">--}}
{{--                    <div class="image-frame"><img src="{{ asset("theme/images/image-04.jpg") }}" alt="image description"></div>--}}
{{--                </div>--}}
            </div>
        </section>
        <!-- about -->
        <section class="about container">
            <div class="row">
                <div class="col-sm-4 animate" data-anim-type="fadeInUp" data-anim-delay="300">
                    <div class="box">
                        <div class="icon ico-luxury"></div>
                        <h2>Luxury</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-sm-4 animate" data-anim-type="fadeInUp" data-anim-delay="600">
                    <div class="box">
                        <div class="icon ico-services"></div>
                        <h2>Great services</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-sm-4 animate" data-anim-type="fadeInUp" data-anim-delay="900">
                    <div class="box">
                        <div class="icon ico-reservation"></div>
                        <h2>Online reservation</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')

@endsection
