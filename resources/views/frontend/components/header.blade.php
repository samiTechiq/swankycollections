<header class="sticky-header border-btm-black header-1">
    <div class="header-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-4">
                    <div class="header-logo">
                        <a href="/"
                        class="text-dark fw-bold fs-5 d-none d-lg-block d-xl-block">
                            {{ $appsetting->app_name }}
                        </a>
                        <a href="/"
                        class="text-dark fw-bold d-md-block d-sm-block d-xs-block d-lg-none d-xl-none">
                            {{ $appsetting->app_name }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 d-lg-block d-none">
                    <nav class="site-navigation">
                        <ul class="main-menu list-unstyled justify-content-center">
                            <li class="menu-list-item nav-item has-dropdown @if(Request::is('/')) active @endif">
                                <div class="mega-menu-header">
                                    <a class="nav-link" href="{{ route('home') }}">
                                        Home
                                    </a>
                                </div>
                            </li>
                            <li class="menu-list-item nav-item has-megamenu @if(Request::is('shop')) active @endif">
                                <div class="mega-menu-header">
                                    <a class="nav-link" href="{{ route('shop') }}">
                                        Shop
                                    </a>
                                </div>
                            </li>
                            <li class="menu-list-item nav-item @if(Request::is('contact')) active @endif">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                           @auth
                           <li class="menu-list-item nav-item has-dropdown @if(Request::is('orders') || Request::is('user/profile')) active @endif">
                            <div class="mega-menu-header">
                                <a class="nav-link" href="#">
                                    Account
                                </a>
                                <span class="open-submenu">
                                    <svg class="icon icon-dropdown" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </span>
                            </div>
                            <div class="submenu-transform submenu-transform-desktop">
                                <ul class="submenu list-unstyled">
                                    <li class="menu-list-item nav-item-sub">
                                        <a class="nav-link-sub nav-text-sub" href="{{ route('orders') }}">
                                            My Orders
                                        </a>
                                    </li>
                                    <li class="menu-list-item nav-item-sub">
                                        <a class="nav-link-sub nav-text-sub" href="{{ route('user.profile') }}">
                                            Profile
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                           @endauth
                            @auth
                            <li class="menu-list-item nav-item">
                                <a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
                            </li>
                            @if(Auth::user()->isAdmin == 1)
                            <li class="menu-list-item nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Admin</a>
                            </li>
                            @endif
                            @endauth

                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-8 col-8">
                    <div class="header-action d-flex align-items-center justify-content-end">
                        <a data-bs-toggle="modal" data-bs-target="#searchModal" class="header-action-item header-search" href="javascript:void(0)">
                            <svg class="icon icon-search" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.75 0.250183C11.8838 0.250183 15.25 3.61639 15.25 7.75018C15.25 9.54608 14.6201 11.1926 13.5625 12.4846L19.5391 18.4611L18.4609 19.5392L12.4844 13.5627C11.1924 14.6203 9.5459 15.2502 7.75 15.2502C3.61621 15.2502 0.25 11.884 0.25 7.75018C0.25 3.61639 3.61621 0.250183 7.75 0.250183ZM7.75 1.75018C4.42773 1.75018 1.75 4.42792 1.75 7.75018C1.75 11.0724 4.42773 13.7502 7.75 13.7502C11.0723 13.7502 13.75 11.0724 13.75 7.75018C13.75 4.42792 11.0723 1.75018 7.75 1.75018Z"
                                    fill="black" />
                            </svg>
                        </a>
                        @livewire('cart-counter')
                        <a class="header-action-item header-hamburger ms-4 d-lg-none" href="#drawer-menu"
                            data-bs-toggle="offcanvas">
                            <svg class="icon icon-hamburger" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
