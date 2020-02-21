<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">{{ __('auth.menu') }}</div>
            <a class="nav-link" href="{{ route('start') }}">
                <div class="sb-nav-link-icon">
                    <i class="fa fa-star"></i>
                </div>
                {{ __('auth.start') }}
            </a>
                <a class="nav-link" href="{{ route('users') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    {{ __('auth.users') }}
                </a>
            <a class="nav-link" href="{{ route('companies') }}">
                <div class="sb-nav-link-icon">
                    <i class="fa fa-table"></i>
                </div>
                {{ __('auth.companies') }}
            </a>
            <a class="nav-link" href="{{ route('positions') }}">
                <div class="sb-nav-link-icon">
                    <i class="fa fa-cube"></i>
                </div>
                {{ __('auth.positions') }}
            </a>
        </div>
    </div>
</nav>
