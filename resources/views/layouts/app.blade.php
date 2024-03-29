<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @include('admins.partials.meta')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @include('app.components.styles')
</head>
<body class="style-1">
    <div id="app">
        @include('app.components.navbar')
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
