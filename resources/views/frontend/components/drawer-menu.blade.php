<div class="offcanvas offcanvas-start d-flex d-lg-none" tabindex="-1" id="drawer-menu">
    <div class="offcanvas-wrapper">
        <div class="offcanvas-header border-btm-black">
            <h5 class="drawer-heading">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0 d-flex flex-column justify-content-between">
            <nav class="site-navigation">
                <ul class="main-menu list-unstyled">
                    <li class="menu-list-item nav-item has-dropdown active">
                        <div class="mega-menu-header">
                            <a class="nav-link active" href="{{ route('home') }}">
                                Home
                            </a>
                        </div>
                    </li>
                    <li class="menu-list-item nav-item has-megamenu">
                        <div class="mega-menu-header">
                            <a class="nav-link" href="{{ route('shop') }}">
                                Shop
                            </a>
                        </div>
                    </li>
                    <li class="menu-list-item nav-item">
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
                    @endauth
                </ul>
            </nav>
            <ul class="utility-menu list-unstyled">
                <li class="utilty-menu-item">
                    <a class="announcement-text" href="tel:+1-078-2376">
                        <span class="utilty-icon-wrapper">
                            <svg class="icon icon-phone" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                        </span>
                        Call: +1 078 2376
                    </a>
                </li>
                @guest
                <li class="utilty-menu-item">
                    <a class="announcement-login announcement-text" href="{{ route('auth.login') }}">
                        <span class="utilty-icon-wrapper">
                            <svg class="icon icon-user" width="24" height="24" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 0C3.07227 0 1.5 1.57227 1.5 3.5C1.5 4.70508 2.11523 5.77539 3.04688 6.40625C1.26367 7.17188 0 8.94141 0 11H1C1 8.78516 2.78516 7 5 7C7.21484 7 9 8.78516 9 11H10C10 8.94141 8.73633 7.17188 6.95312 6.40625C7.88477 5.77539 8.5 4.70508 8.5 3.5C8.5 1.57227 6.92773 0 5 0ZM5 1C6.38672 1 7.5 2.11328 7.5 3.5C7.5 4.88672 6.38672 6 5 6C3.61328 6 2.5 4.88672 2.5 3.5C2.5 2.11328 3.61328 1 5 1Z"
                                    fill="#000" />
                            </svg>
                        </span>
                        <span>Login</span>
                    </a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</div>
