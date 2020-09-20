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
                        <li class="active">{{ $page_title ?? 'Contact Us' }}</li>
                    </ol>
                </div>
                <div class="col-xs-5">
                    <a href="{{ route('hotels') }}" class="link">book a room</a>
                </div>
            </div>
        </div>
    </div>
    <main id="mainInner">
        <div class="container">
            <div class="contact g-padding">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>Contact Us</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-6">
                        <form action="{{ route('contact') }}" class="contact-form" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="f-name">*Full Name</label>
                                <input id="f-name" type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">*Email</label>
                                <input id="email" type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input id="website" type="text" name="website" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea id="comment" name="message" class="form-control" rows="8" cols="45"></textarea>
                            </div>
                            <input class="btn btn-default" type="submit" value="Send Message">
                        </form>
                    </div>
                    <div class="col-sm-3">

                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <dl class="contact-info col-sm-4">
                    <img src="{{ asset("theme/images/contact-manali.jpg") }}" alt="manali">
                    <b>Sandhya Resort and Spa, Manali</b>
                    <dt><span class="icon-location"></span>Address:</dt>
                    <dd>Sandhya Resort & Spa, Kanyal Road, Rangri, Manali, Himachal Pradesh - 175131</dd>
                    <dt><span class="icon-phone"></span>Phone:</dt>
                    <dd><a href="tel:400748978045">+91 94 1828 1903 | +91 92 1852 5695</a></dd>
                    <dt><span class="icon-paperplane"></span>E-MAIL:</dt>
                    <dd><a href="#">sandhyapalace@gmail.com</a></dd>
                </dl>
                <dl class="contact-info pull-left col-sm-4">
                    <img src="{{ asset("theme/images/contact-kullu.jpg") }}" alt="manali">
                    <b>Hotel Sandhya Palace, Kullu</b>
                    <dt><span class="icon-location"></span>Address:</dt>
                    <dd>VPO Shamshi- Ramshila Road, Himachal Pradesh - 175126</dd>
                    <dt><span class="icon-phone"></span>Phone:</dt>
                    <dd><a href="tel:400748978045">+91 92 1852 5595 | +91 19 0226 5662</a></dd>
                    <dt><span class="icon-paperplane"></span>E-MAIL:</dt>
                    <dd><a href="#">sandhyapalace@gmail.com</a></dd>
                </dl>
                <dl class="contact-info col-sm-4">
                    <img src="{{ asset("theme/images/contact-kasol.jpg") }}" alt="manali">
                    <b>Hotel Sandhya, Kasol</b>
                    <dt><span class="icon-location"></span>Address:</dt>
                    <dd>Village Kasol near Manikaran Distt. Kullu, Himachal Pradesh - 175105</dd>
                    <dt><span class="icon-phone"></span>Phone:</dt>
                    <dd><a href="tel:400748978045">+91 94 1802 5895 | +91 19 0227 3745</a></dd>
                    <dt><span class="icon-paperplane"></span>E-MAIL:</dt>
                    <dd><a href="#">sandhyapalace@gmail.com</a></dd>
                </dl>
            </div>
        </div>
    </main>
@endsection

@section('scripts')

@endsection
