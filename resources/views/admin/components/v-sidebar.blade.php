<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
                        <h1 class="text-white fw-bold d-block mt-3"><img src="{{ asset('assets/img/SGS.png') }}" class="img-fluid logo" style="width: 110px"  alt=""></h1>

            <p style="font-size: 20px">Satria Global Solusi</p>
        </div>
        <ul class="sidebar-menu mt-5">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Str::startsWith(request()->path(), 'back-office/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}"><i class="fas fa-fire"></i>
                    <span>Dasboard</span>
                </a>
            </li>
            <li class="menu-header">Content</li>
            <li class="{{ Str::startsWith(request()->path(), 'back-office/artikel') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.artikel.index') }}">
                    <i class="fas fa-newspaper"></i>
                    <span>Article</span>
                </a>
            </li>
            <li class="{{ Str::startsWith(request()->path(), 'back-office/banner') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.banner.index') }}">
                    <i class="fas fa-image"></i>
                    <span>Banner</span>
                </a>
            </li>
            <li class="{{ Str::startsWith(request()->path(), 'back-office/carousel') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.carousel.index') }}">
                    <i class="fas fa-image"></i>
                    <span>Carousel</span>
                </a>
            </li>
            <li class="{{ Str::startsWith(request()->path(), 'back-office/about') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.about.index') }}">
                    <i class="fas fa-building"></i>
                    <span>About</span>
                </a>
            </li>
            <li class="{{ Str::startsWith(request()->path(), 'back-office/contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.contact.index') }}">
                    <i class="fas fa-phone"></i>
                    <span>Contact</span>
                </a>
            </li>
            <li class="{{ Str::startsWith(request()->path(), 'back-office/service') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.service.index') }}">
                    <i class="fas fa-briefcase"></i>
                    <span>Service</span>
                </a>
            </li>
            <li class="{{ Str::startsWith(request()->path(), 'back-office/client') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.client.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Client</span>
                </a>
            </li>
            <li class="{{ Str::startsWith(request()->path(), 'back-office/director') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.director.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Director</span>
                </a>
            </li>
        </ul>

    </aside>
</div>
