<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title', 'Welcome to Test Project') </title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css" />
    <link rel="stylesheet" href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    @stack('styles')

</head>

<body>
    <div class="container" style="padding:0px">
        <div class="row g-0">
            <div class="col-md-12">
                @include('partials.navbar')
            </div>
        </div>
        <div class="row" style="margin:0px; padding:0px">
            <div class="col-12 p-2">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/vue@3"></script>
    @stack('script')

</body>

</html>
