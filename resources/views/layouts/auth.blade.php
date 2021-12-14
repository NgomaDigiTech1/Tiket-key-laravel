<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <base href="/">
    @include('admins.partials.meta')
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/admins/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/admins/css/theme.css') }}">
</head>

<body class="nk-body bg-white npc-default pg-auth">
<div class="nk-app-root">
    <div class="nk-main ">
        <div class="nk-wrap nk-wrap-nosidebar">
            <div class="nk-content ">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/admins/js/bundle.js') }}"></script>
<script src="{{ asset('assets/admins/js/scripts.js') }}"></script>
</body>
</html>
