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
    <div class="container-fluid blog py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">{{ GoogleTranslate::trans('Our Article', \App::getLocale()) }}</h5>
            </div>
            <div class="row g-5 justify-content-center">
                @foreach ($article as $articles)
                    <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                        <a href="{{ route('article.detail', $articles->id) }}" class="articles">
                            <div class="blog-item position-relative bg-light rounded">
                                <img src="{{ asset('artikel/' . $articles->foto) }}" class="img-fluid w-100 rounded-top"
                                    alt="">
                                <div class="blog-content mt-4 position-relative px-3" style="margin-top: -25px;">
                                    <span
                                        class="text-secondary text-center">{{ $articles->created_at->format('d M Y') }}</span>
                                    <h5 class="">{{ GoogleTranslate::trans($articles->judul, \App::getLocale()) }}
                                    </h5>
                                    <p class="py-2">
                                        {!! GoogleTranslate::trans(Str::limit($articles->keterangan, 500), \App::getLocale()) !!}
                                    </p>
                                </div>
                                <div
                                    class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
