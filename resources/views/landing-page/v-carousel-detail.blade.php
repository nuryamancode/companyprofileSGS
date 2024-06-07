@extends('landing-page.base.v-app', ['title' => "Detail"])

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid mt-5 py-3">
        <div class="container text-center mt-5">
            <h1 class="display-2 mt-5 text-primary mb-4 animated slideInDown">{{ GoogleTranslate::trans('Detail',\App::getLocale()) }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ GoogleTranslate::trans('Home',\App::getLocale()) }}</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ GoogleTranslate::trans('Detail',\App::getLocale()) }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Project Start -->
    <div class="container-fluid project">
        <div class="container py-5">
            <div class="">
                <div class="text-center d-flex justify-content-center">
                    <img src="{{ asset('carousel/' . $carousel->image) }}" class="img-fluid w-100 rounded"
                        alt="">
                </div>
            </div>
            <div class="mt-4">
                <h4 class="text-secondary">{{ GoogleTranslate::trans($carousel->judul,\App::getLocale()) }}</h4>
                <p class="mt-2">{{ GoogleTranslate::trans($carousel->description,\App::getLocale()) }}</p>
            </div>
        </div>
    </div>
    <!-- Project End -->
@endsection
