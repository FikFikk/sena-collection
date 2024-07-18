<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item  {{ Request::routeIs('dashboard.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">Home</a>
                </li>
                <li class="nav-item {{ Request::routeIs('dashboard.shop') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.shop') }}">Shop</a>
                </li>
                <li class="nav-item {{ Request::routeIs('dashboard.about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.about') }}">About us</a>
                </li>
                <li class="nav-item  {{ Request::routeIs('dashboard.service') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.service') }}">Services</a>
                </li>
                <li class="nav-item  {{ Request::routeIs('dashboard.blog') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.blog') }}">Blog</a>
                </li>
                <li class="nav-item  {{ Request::routeIs('dashboard.contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.contact') }}">Contact us</a>
                </li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li><a class="nav-link" href="#"><img src="../dist/img/user.svg"></a></li>
                <li><a class="nav-link" href="cart.html"><img src="../dist/img/cart.svg"></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Header/Navigation -->
