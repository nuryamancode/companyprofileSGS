@extends('landing-page.base.v-app', ['title' => 'Article'])
@section('content')
    @php
        $backgroundImageUrl = asset('banner/' . $banner->about);
    @endphp

    <style>
        .page-header {
            background: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url('{{ $backgroundImageUrl }}') center center no-repeat;
            background-size: cover;
        }
        .articles{
            color: rgba(0, 0, 0, 0.396);
        }
        .articles:hover{
            color: rgb(0, 0, 0);
        }
    </style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">
                {{ GoogleTranslate::trans('Article Us', \App::getLocale()) }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a
                            href="{{ route('home') }}">{{ GoogleTranslate::trans('Home', \App::getLocale()) }}</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ GoogleTranslate::trans('Article', \App::getLocale()) }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Project Start -->
    <div class="container-fluid py-5 my-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">{{ GoogleTranslate::trans('Our Articles', \App::getLocale()) }}</h5>
            </div>
            <div class="row">
                @foreach ($article as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('article.detail', $item->id) }}" class="articles">
                                <img src="{{ asset('artikel/' . $item->foto) }}" class="card-img-top"
                                    alt="Image of the article">
                                <div class="card-body">
                                    <h5 class="card-title">{{ GoogleTranslate::trans($item->judul, \App::getLocale()) }}</h5>
                                    <p class="card-text">
                                        {!! GoogleTranslate::trans(Str::limit($item->keterangan, 100), \App::getLocale()) !!}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Project End -->
@endsection
