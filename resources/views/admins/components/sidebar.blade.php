<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ route('admin.dashboard.index') }}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ asset('assets/admins/images/logo.png') }}" srcset="{{ asset('assets/admins/images/logo.png') }} 2x" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('assets/admins/images/logo.png') }}" srcset="{{ asset('assets/admins/images/logo.png') }} 2x" alt="logo-dark">
                <img class="logo-small logo-img logo-img-small" src="{{ asset('assets/admins/images/logo.png') }}" srcset="{{ asset('assets/admins/images/logo.png') }} 2x" alt="logo-small">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div>
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    @include('admins.components.NavLink', [
                        'route' => route('admin.dashboard.index'),
                        'name' => 'Dashboard',
                        'icon' => 'ni-menu-alt'
                    ])
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Administration</h6>
                    </li>
                    @include('admins.components.NavLink', [
                        'route' => route('admin.users.index'),
                        'name' => 'Utilisateur',
                        'icon' => 'ni-users'
                    ])
                    @include('admins.components.NavLink', [
                        'route' => route('admin.company.index'),
                        'name' => 'Companie',
                        'icon' => 'ni-building'
                    ])
                    @include('admins.components.NavLink', [
                        'route' => route('admin.drivers.index'),
                        'name' => 'Chauffeurs',
                        'icon' => 'ni-focus'
                    ])
                    @include('admins.components.NavLink', [
                        'route' => route('admin.towns.index'),
                        'name' => 'Ville',
                        'icon' => 'ni-map'
                    ])
                    @include('admins.components.NavLink', [
                        'route' => route('admin.bus.index'),
                        'name' => 'Nos Bus',
                        'icon' => 'ni-truck'
                    ])
                    @include('admins.components.NavLink', [
                        'route' => route('admin.trajets.index'),
                        'name' => 'Ligne de transport',
                        'icon' => 'ni-location'
                    ])

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Transaction</h6>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
