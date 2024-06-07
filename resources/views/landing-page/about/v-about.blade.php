@extends('landing-page.base.v-app', ['title' => 'About'])
@section('content')
    @php
        $backgroundImageUrl = asset('banner/' . $banner->about);
    @endphp

    <style>
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url('{{ $backgroundImageUrl }}') center center no-repeat;
            background-size: cover;
        }
    </style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">{{ GoogleTranslate::trans('About Us',\App::getLocale()) }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ GoogleTranslate::trans('Home',\App::getLocale()) }}</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ GoogleTranslate::trans('About',\App::getLocale()) }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- About Start -->
    <div class="container-fluid">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative">
                        <img src="{{ asset('about/' . $about->image1) }}" class="img-fluid w-75 rounded" alt=""
                            style="margin-bottom: 25%;">
                        <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <img src="{{ asset('about/' . $about->image2) }}" class="img-fluid w-100 rounded"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    <h5 class="text-primary">{{ GoogleTranslate::trans('About Us',\App::getLocale()) }}</h5>
                    <h1 class="mb-4">{{ GoogleTranslate::trans($about->judul,\App::getLocale()) }}</h1>
                    <p>{{ GoogleTranslate::trans($about->description,\App::getLocale()) }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    <h1 class="mb-4">{{ GoogleTranslate::trans('Vision & Mission Company',\App::getLocale()) }}</h1>
                    <h5 class="text-secondary">{{ GoogleTranslate::trans('Vision',\App::getLocale()) }}</h5>
                    <p class="mb-4">{{ GoogleTranslate::trans($about->visi,\App::getLocale()) }}</p>
                    <h5 class="text-danger">{{ GoogleTranslate::trans('Mission',\App::getLocale()) }}</h5>
                    <p>
                    <ol>
                        @foreach ($about->misi as $item)
                            <li>{{ GoogleTranslate::trans($item->text,\App::getLocale()) }}</li>
                        @endforeach
                    </ol>
                    </p>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative">
                        <img src="{{ asset('about/' . $about->image3) }}" class="img-fluid w-75 rounded" alt=""
                            style="margin-bottom: 25%;">
                        <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <img src="{{ asset('about/' . $about->image4) }}" class="img-fluid w-100 rounded"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <div class="container-fluid">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative text-center">
                        <img src="{{ asset('director/' . $director->image) }}" class="img-fluid w-50 rounded"
                            alt="" style="margin-bottom: 25%;">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    <h5 class="text-primary">Director</h5>
                    <h1 class="mb-4">{{ GoogleTranslate::trans($director->nama,\App::getLocale()) }}</h1>
                    <p>{{ GoogleTranslate::trans($director->description,\App::getLocale()) }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
