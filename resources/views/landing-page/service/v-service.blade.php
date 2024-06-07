@extends('landing-page.base.v-app', ['title' => 'Service'])

@section('content')
    @php
        $backgroundImageUrl = asset('banner/' . $banner->service);
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
            <h1 class="display-2 text-white mb-4 animated slideInDown">{{ GoogleTranslate::trans('Service',\App::getLocale()) }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ GoogleTranslate::trans('Home',\App::getLocale()) }}</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ GoogleTranslate::trans('Service',\App::getLocale()) }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Project Start -->
    <div class="container-fluid project py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">{{ GoogleTranslate::trans('Our Clients',\App::getLocale()) }}</h5>
            </div>
            <div class="row g-5">
                @foreach ($data as $item)
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                        <a href="{{ route('service.detail', $item->id) }}">
                            <div class="">
                                <a href="{{ route('service.detail', $item->id) }}" class="text-center">
                                    <h4 class="text-primary">{{ GoogleTranslate::trans($item->judul,\App::getLocale()) }}</h4>
                                    <p class="m-0 text-white">{{ GoogleTranslate::trans($item->text,\App::getLocale()) }}</p>
                                </a>
                            </div>
                            <div class="project-item">
                                <a href="{{ route('service.detail', $item->id) }}">
                                    <div class="project-img">
                                        <img src="{{ asset('service/' . $item->image) }}" class="img-fluid w-100 rounded"
                                            alt="">
                                    </div>
                                </a>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Project End -->
@endsection
