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
    <!-- <script src="{{ asset('bxslider/dist/jquery.bxslider.min.js') }}" defer></script> -->
    <script src="{{ asset('skippr/dist/skippr.min.js') }}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmo-78k4wCLXw6RD3jsSC_MWcbtfcjzj4&callback=initMap" async defer ></script>
    <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_CLIENT_ID')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customer.css') }}" rel="stylesheet">
    <link href="{{ asset('hotel-datepicker-3.6.8/dist/css/hotel-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('lightbox/simple-lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('bxslider/dist/jquery.bxslider.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('skippr/dist/skippr.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-md navbar-dark">
            <a class="navbar-brand text-white logo text-uppercase" href="/"><span>Dryms</span><span>Listings</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHome"
                aria-controls="navbarHome" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <i class="fa fa-bars" aria-hidden="true" style="color:#ffffff;"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarHome">
                <ul class="navbar-nav ml-auto text-uppercase font-weight-bold">
                    <!-- <li><a href="/#rooms" class="nav-link text-white">Rooms</a></li>
                    <li><a href="/#contact" class="nav-link text-white">Contact</a></li> -->
                    <li><a href="" class="nav-link text-white btn-cta" data-toggle="modal" data-target="#book-now-modal">Book Now</a></li>
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