<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            @if(auth()->user()->company->picture)
                <a href="{{ route('company.dashboard.index') }}" class="logo-link nk-sidebar-logo">
                    <img class="logo-light logo-img" src="{{ asset('storage/'.auth()->user()->company->picture) }}" srcset="{{ asset('storage/'.auth()->user()->company->picture) }} 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('storage/'.auth()->user()->company->picture) }}" srcset="{{ asset('storage/'.auth()->user()->company->picture) }} 2x" alt="logo-dark">
                </a>
            @else
                <a href="{{ route('company.dashboard.index') }}" class="logo-link nk-sidebar-logo">
                    <img class="logo-light logo-img" src="{{ asset('assets/admins/images/logo.png') }}" srcset="{{ asset('assets/admins/images/logo.png') }} 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('assets/admins/images/logo.png') }}" srcset="{{ asset('assets/admins/images/logo.png') }} 2x" alt="logo-dark">
                </a>
            @endif

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
                        'route' => route('company.dashboard.index'),
                        'name' => 'Dashboard',
                        'icon' => 'ni-menu-alt'
                    ])
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Administration</h6>
                    </li>
                    @include('admins.components.NavLink', [
                        'route' => route('company.chauffeur.index'),
                        'name' => 'Chauffeurs',
                        'icon' => 'ni-focus'
                    ])
                </ul>
            </div>
        </div>
    </div>
</div>
