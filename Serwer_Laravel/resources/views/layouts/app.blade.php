<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Park Maszyn V 0.0.1') }}</title>
    <link rel="stylesheet" href="{{ asset('my_css/my.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>


    <div id="app" style="padding-top: 30px;">

       @include('item.header')


       

        <main class="py-4" style="float: clear;">
            @yield('content')
        </main>
    </div>
</body>
</html>
