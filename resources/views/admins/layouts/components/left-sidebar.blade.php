<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link {{ Request::is('admin/dashboard')? 'active' : "" }}" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link {{ Request::is('admin/orders/manage')? 'active' : "" }}" href="{{ route('order.manage') }}">
                <div class="sb-nav-link-icon">
                    <i class="fa-brands fa-first-order"></i>
                </div>
                Orders
            </a>
            <a class="nav-link {{ Request::is('admin/product')? 'active' : "" }}" href="{{ route('product') }}">
                <div class="sb-nav-link-icon">
                    <i class="fa-brands fa-product-hunt"></i>
                </div>
                Products
            </a>
            <a class="nav-link {{ Request::is('admin/users')? 'active' : "" }}" href="{{ route('users') }}">
                <div class="sb-nav-link-icon">
                    <i class="fa-solid fa-user"></i>
                </div>
                Customers
            </a>
            <a class="nav-link {{ Request::is('admin/slider')? 'active' : "" }}" href="{{ route('slider') }}">
                <div class="sb-nav-link-icon">
                    <i class="fa-brands fa-slideshare"></i>
                </div>
                Sliders
            </a>
            <a class="nav-link {{ Request::is('admin/banner')? 'active' : "" }}" href="{{ route('banner') }}">
                <div class="sb-nav-link-icon">
                    <i class="fa-brands fa-bandcamp"></i>
                </div>
                Banners
            </a>
            <a class="nav-link {{ Request::is('admin/contact/message')? 'active' : "" }}" href="{{ route('contact.chat') }}">
                <div class="sb-nav-link-icon">
                    <i class="fa-solid fa-comments"></i>
                </div>
                Charts
            </a>
            <a class="nav-link {{ Request::is('admin/app/setting')? 'active' : "" }}" href="{{ route('setting') }}">
                <div class="sb-nav-link-icon"> <i class="fa-solid fa-gears"></i> </div>
                App Settings
            </a>
        </div>
    </div>
</nav>
