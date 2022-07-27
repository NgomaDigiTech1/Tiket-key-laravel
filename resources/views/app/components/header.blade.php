<div class="navigation">
    <div class="container">
        <div class="navigation-content">
            <div class="header_menu">
                <nav class="navbar navbar-default navbar-sticky-function navbar-arrow">
                    <div class="logo pull-left">
                        <a href="{{ route('home.index') }}">
                            <img
                                alt="Image"
                                src="{{ asset('assets/admins/images/logo.png') }}"
                            >
                        </a>
                    </div>
                    <div id="navbar" class="navbar-nav-wrapper">
                        <ul class="nav navbar-nav" id="responsive-menu">
                            @include('app.partials.NavLink', [
                                'route' => route('home.index'),
                                'name' => "Home"
                            ])
                            @include('app.partials.NavLink', [
                                'route' => route('company.index'),
                                'name' => "Transporteurs"
                            ])
                            @include('app.partials.NavLink', [
                                'route' => route('app.contact'),
                                'name' => "Nous contactez"
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
