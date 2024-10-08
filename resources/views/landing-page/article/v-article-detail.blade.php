@extends('landing-page.base.v-app', ['title' => 'Service Detail'])

@section('content')
    @php
        // Translate the content and decode HTML entities
        $translatedContent = htmlspecialchars_decode(
            GoogleTranslate::trans($data->keterangan, \App::getLocale()),
            ENT_QUOTES,
        );

    @endphp
    <!-- Page Header Start -->
    <div class="container-fluid mt-5 py-3">
        <div class="container text-center mt-5">
            <h1 class="display-2 mt-5 text-primary mb-4 animated slideInDown">
                {{ GoogleTranslate::trans('Article Detail', \App::getLocale()) }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a
                            href="{{ route('home') }}">{{ GoogleTranslate::trans('Home', \App::getLocale()) }}</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('article') }}">{{ GoogleTranslate::trans('Back', \App::getLocale()) }}</a></li>
                    <li class="breadcrumb-item" aria-current="page">
                        {{ GoogleTranslate::trans('Article Detail', \App::getLocale()) }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Project Start -->
    <div class="container-fluid project">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="project-item">
                        <h4 class="text-primary">{{ GoogleTranslate::trans($data->judul, \App::getLocale()) }}</h4>
                        <div class="project-img">
                            <img src="{{ asset('artikel/' . $data->foto) }}" class="img-fluid w-100 rounded" alt="">
                        </div>
                    </div>
                </div>
                <div class="col wow fadeIn" data-wow-delay=".3s">
                    <div class="">
                        <small>{{ $data->created_at->format('d M Y') }}</small>
                        <h4>{!! GoogleTranslate::trans($data->judul2, \App::getLocale()) !!}</h4>
                        <p class="mt-2">{!! $translatedContent !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->
@endsection
