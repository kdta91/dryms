<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DRYMSLISTINGS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/customer.js') }}" defer></script>
    <script src="{{ asset('hotel-datepicker-3.6.8/dist/js/hotel-datepicker.js') }}" defer></script>
    <script src="{{ asset('lightbox/simple-lightbox.min.js') }}" defer></script>
    <script src="{{ asset('skippr/dist/skippr.min.js') }}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmo-78k4wCLXw6RD3jsSC_MWcbtfcjzj4&callback=initMap"
        async defer></script>
    <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_CLIENT_ID')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customer.css') }}" rel="stylesheet">
    <link href="{{ asset('hotel-datepicker-3.6.8/dist/css/hotel-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('lightbox/simple-lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('skippr/dist/skippr.css') }}" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">
	<link rel="icon" sizes="16x16 32x32 64x64" href="{{ asset('favicon/favicon.ico') }}">
	<link rel="icon" type="image/png" sizes="196x196" href="{{ asset('favicon/avicon-192.png') }}">
	<link rel="icon" type="image/png" sizes="160x160" href="{{ asset('favicon/avicon-160.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96.png') }}">
	<link rel="icon" type="image/png" sizes="64x64" href="{{ asset('favicon/favicon-64.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16.png') }}">
	<link rel="apple-touch-icon" href="{{ asset('favicon/favicon-57.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/favicon-114.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/favicon-72.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/favicon-144.png') }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/favicon-60.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/favicon-120.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/favicon-76.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/favicon-152.png') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/favicon-180.png') }}">
	<meta name="msapplication-TileColor" content="#FFFFFF">
	<meta name="msapplication-TileImage" content="{{ asset('favicon/favicon-144.png') }}">
	<meta name="msapplication-config" content="/browserconfig.xml">
</head>

<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-md navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand text-white logo text-uppercase"
                        href="/"><strong><span>Dryms</span><span>Listings</span></strong></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="nav-link text-white text-uppercase font-weight-bold btn-cta" data-toggle="modal"
                            data-target="#book-now-modal">Book Now</a></li>
                </ul>
            </div>
        </nav>

        <main>
            @include('partials.alert')
            @yield('content')
            @include('partials.customer.footer')
        </main>
    </div>
</body>

</html>
