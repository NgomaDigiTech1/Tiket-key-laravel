<header class="head-style-1">
    <div class="navigation">
        <div class="container">
            <div class="navigation-content">
                <div class="header_menu">
                    <nav class="navbar navbar-default navbar-sticky-function navbar-arrow">
                        <div class="logo pull-right">
                            <a href="{{ route('home.index') }}">
                                <img
                                    alt="Image"
                                    src="{{ asset('assets/admins/images/logo.png') }}"
                                    class="colorlogo"
                                >
                            </a>
                            <a href="{{ route('home.index') }}">
                                <img
                                    alt="image"
                                    src="{{ asset('assets/admins/images/logo.png') }}"
                                    class=" whitelogo"
                                >
                            </a>
                        </div>
                        <div id="navbar" class="navbar-nav-wrapper">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                @include('app.partials.NavLink', [
                                    'route' => route('home.index'),
                                    'name' => "Accueil"
                                ])
                                @include('app.partials.NavLink', [
                                    'route' => route('company.index'),
                                    'name' => "Transporteurs"
                                ])
                                @include('app.partials.NavLink', [
                                    'route' => route('app.contact'),
                                    'name' => "Nous Contacter"
                                ])
                                @include('app.partials.NavLink', [
                                    'route' => route('login'),
                                    'name' => "Login"
                                ])
                            </ul>
                        </div>
                        <div id="slicknav-mobile"></div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
