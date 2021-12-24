<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ asset('assets/frontends/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/frontends/css/car.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/frontends/font/flaticon.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/frontends/css/plugin.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/frontends/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontends/css/font.css') }}">
    @yield('styles')
</head>
<body class="cars-inner">
    <div id="app">
        @include('app.components.header')
        <main>
            @yield('content')
        </main>
        @include('app.partials.footer')
    </div>
    @include('app.components.scripts')
    @yield('scripts')
    @include('sweetalert::alert')
</body>
</html>
