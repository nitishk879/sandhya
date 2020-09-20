<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title ?? config('app.name', 'Sandhya Groups') }}</title>

    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("theme/css/bootstrap.css") }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset("theme/css/style.css") }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset("theme/css/colors.css") }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset("theme/css/jquery.countdown.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("theme/css/animations.min.css") }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset("theme/css/datepicker.css") }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset("theme/css/animate.min.css") }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset("theme/css/bootstrap-dropdownhover.min.css") }}" type="text/css" media="all">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400italic,700" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" type="text/css">

    <link rel="stylesheet prefetch" href="{{ asset("theme/css/jquery-ui.css") }}" type="text/css">

    <link rel="stylesheet" href="{{ asset("theme/css/flexslider.css") }}" type="text/css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @include('layouts.favicons')

    @yield('head')

</head>
<body>
    <div id="wrapper">

        <header id="header">
            @include('layouts.header')
        </header>
        @yield('content')
        <div class="b-container">
            @include('layouts.footer')
        </div>
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript">window.jQuery || document.write('<script src="{{ asset("theme/js/jquery-1.11.2.min.js") }}"><\/script>')</script>
    <script type="text/javascript" src="{{ asset("theme/js/bootstrap.min.js") }}"></script>
    <!-- Range Slider JavaScript -->
    <script type="text/javascript" src='{{ asset("theme/js/jquery-ui.min.js") }}'></script>
    <script type="text/javascript" src='{{ asset("theme/js/range-slider.js") }}'></script>
    <!-- Same Height JavaScript -->
    <script type="text/javascript" src='{{ asset("theme/js/same-height.js") }}'></script>
    <!-- include custom JavaScript -->
    <script type="text/javascript" src="{{ asset("theme/js/jquery.main.js") }}"></script>
    <script type="text/javascript" src="{{ asset("theme/js/animations.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("theme/js/jquery.plugin.js") }}"></script>
    <script type="text/javascript" src="{{ asset("theme/js/jquery.countdown.js") }}"></script>
    <script type="text/javascript" src="{{ asset("theme/js/timber.master.min.js") }}"></script>
    <!-- Bootstrap Dropdown Hover JS -->
    <script type="text/javascript" src="{{ asset("theme/js/bootstrap-dropdownhover.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("theme/js/bootstrap-datepicker.js") }}"></script>
    <script type="text/javascript" defer src="{{ asset("theme/js/jquery.flexslider.js") }}"></script>

    @yield('scripts')
</body>
</html>
