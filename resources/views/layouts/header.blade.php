
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <strong class="logo"><a href="/"><img src="{{ asset("theme/images/logo.png") }}" alt="{{ config('app.name') }}"></a></strong>
            <!-- main navigation -->
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span></span></button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                        <li class="active"><a href="/">HOME</a></li>
                        <li><a href="{{ route("about-us") }}">ABOUT</a></li>
                        <li><a href="">Wedding</a> </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="{{ route('hotels') }}" class="dropdown-toggle disable" data-hover="dropdown">OUR HOTEL</a>
                            <ul class="dropdown-menu">
                                @php $hotels = \App\Hotel::all() @endphp
                                @foreach($hotels as $hotel)
                                    <li><a href="{{ route("hotels.show", $hotel->slug) }}">{{ $hotel->name }}</a></li>
                                @endforeach
{{--                                <li><div class="divider"></div></li>--}}
{{--                                <li><a href="#">Destination Wedding</a></li>--}}
{{--                                <li><a href="">Rooms</a> </li>--}}
{{--                                <li><a href="">Gallery</a> </li>--}}
{{--                                <li><a href="">Blog</a> </li>--}}
                            </ul>
                        </li>
                        <li><a href="">Spa</a> </li>
                        <li><a href="{{ route('contact-us') }}">CONTACT</a></li>
                        <li><a href="{{ route('cart') }}"><i class="glyphicon glyphicon-piggy-bank"></i> {{ Session::has('cart') ? Session::get('cart')->quantity: '' }}</a> </li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
