<!-- Navbar Start -->
<style>
    .id:hover {
        background-color: white;
        padding: 8px;
        border-radius: 10px;
    }

    .en:hover {
        background-color: white;
        padding: 8px;
        border-radius: 10px;
    }
</style>
<div class="container-fluid bg-primary fixed-top">
    <div class="container">
        <nav class="navbar navbar-dark navbar-expand-lg py-0">
            <a href="{{ route('home', app()->getLocale()) }}" class="navbar-brand">
                                <h1 class="text-white fw-bold d-block"><img src="{{ asset('assets/img/SGSS.png') }}" class="img-fluid logo" style="width: 170px"  alt=""></h1>

            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                <div class="navbar-nav ms-auto mx-xl-auto p-0">
                    <a href="{{ route('home', app()->getLocale()) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                        data-translate="Home">{{ GoogleTranslate::trans('Home', \App::getLocale()) }}</a>
                    <a href="{{ route('about', app()->getLocale()) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}"
                        data-translate="About">{{ GoogleTranslate::trans('About', \App::getLocale()) }}</a>
                    <a href="{{ route('article', app()->getLocale()) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'article' ? 'active' : '' }}"
                        data-translate="Article">{{ GoogleTranslate::trans('Article', \App::getLocale()) }}</a>
                    <a href="{{ route('service', app()->getLocale()) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'service' ? 'active' : '' }}"
                        data-translate="Service">{{ GoogleTranslate::trans('Service', \App::getLocale()) }}</a>
                        <a href="{{ route('contact', app()->getLocale()) }}" class="nav-item nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"
                            data-translate="Contact">{{ GoogleTranslate::trans('Contact', \App::getLocale()) }}</a>

                </div>
                <div class="d-xl-none mb-3 d-flex align-items-center justify-content-start me-4">
                    <style>
                        .ind:hover {
                            background-color: white;
                            padding: 8px;
                            border-radius: 10px;
                        }

                        .eng:hover {
                            background-color: white;
                            padding: 8px;
                            border-radius: 10px;
                        }
                    </style>
                    <div class="ind me-3">
                        <a href="{{ route('lang.switch', 'id') }}" class="position-relative tada infinite">
                            <img src="{{ asset('assets/img/id.png') }}" alt="Indonesian" class="w-10" width="30">
                            <span>ID</span>
                        </a>
                    </div>
                    <div class="eng">
                        <a href="{{ route('lang.switch', 'en') }}" class="position-relative tada infinite">
                            <img src="{{ asset('assets/img/eng.png') }}" alt="English" class="w-10" width="30">
                            <span>EN</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="d-none d-xl-flex flex-shirink-0">
                <div class="d-flex align-items-center justify-content-between me-4">
                    <div class="id me-2">
                        <a href="{{ route('lang.switch', 'id') }}" class="position-relative tada infinite">
                            <img src="{{ asset('assets/img/id.png') }}" alt="Indonesian" class="w-10" width="30">
                            <span class="">ID</span>
                        </a>
                    </div>
                    <div class="en">
                        <a href="{{ route('lang.switch', 'en') }}" class="position-relative tada infinite">
                            <img src="{{ asset('assets/img/eng.png') }}" alt="English" class="w-10" width="30">
                            <span>EN</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
