
<div class="footer-nav">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="#wrapper" class="go-top">
                    <span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
                </a>
                <strong class="logo"><a href="/"><img src="{{ asset("theme/images/f-logo.png") }}" alt="{{ config("app.name") }}"></a></strong>
                <!-- footer navigation -->
                <nav class="f-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li class="active"><a href="/">HOME</a></li>
                        <li><a href="{{ route("about-us") }}">ABOUT US</a></li>


                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle disable" data-hover="dropdown">OUR HOTEL</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route("hotel.show", "sandhya-resort-and-spa-manali") }}">SANDHYA RESORT & SPA, MANALI</a></li>
                                <li><a href="{{ route("hotel.show", "sandhya-palace-kullu") }}">SANDHYA PALACE KULLU</a></li>
                                <li><a href="{{ route("hotel.show", "sandhya-kasol") }}">SANDHYA KASOL</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route("contact-us") }}">CONTACT</a>
                        </li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p>&copy; <a href="#" class="link">{{ config('app.name') }}</a>. All rights reserved.</p>
            </div>
            <div class="col-sm-6">
                <ul class="list-inline social-networks">
                    <li><a href="https://www.facebook.com/{{ config('app.fb') }}"><span class="icon-facebook"></span></a></li>
                    <li><a href="https://www.instagram.com/{{ config('app.tw') }}/"><span class="icon-twitter"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
