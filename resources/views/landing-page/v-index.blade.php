@extends('landing-page.base.v-app', ['title' => 'Home'])

@section('content')
    <!-- Spinner Start -->
    <div id="spinner"
        class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <div class="container-fluid px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($carousel as $key => $item)
                    <li data-bs-target="#carouselId" data-bs-slide-to="{{ $key }}"
                        @if ($loop->first) class="active" @endif></li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach ($carousel as $key => $item)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ asset('carousel/' . $item->image) }}" class="img-fluid"
                            alt="Slide {{ $key }}">
                        <div class="carousel-caption">
                            <div class="container carousel-content mt-5">
                                <h1 class="text-white display-1 mb-4 mt-5 animated fadeInRight">
                                    {{ GoogleTranslate::trans($item->judul, \App::getLocale()) }}</h1>
                                @if ($item->isbutton == 1)
                                    <p class="mb-4 text-white fs-5 animated fadeInDown d-inline-block text-truncate"
                                        style="max-width: 100%;">
                                        {{ GoogleTranslate::trans($item->description, \App::getLocale()) }}</p>
                                @else
                                    <p class="mb-4 text-white fs-5 animated fadeInDown">
                                        {{ GoogleTranslate::trans($item->description, \App::getLocale()) }}</p>
                                @endif
                                @if ($item->isbutton == 1)
                                    <a href="{{ route('detail', $item->id) }}" class="me-2"><button type="button"
                                            class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">{{ GoogleTranslate::trans('Read More', \App::getLocale()) }}</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid py-5 my-5">
        <div class="container pt-5">
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
                    <h5 class="text-primary">{{ GoogleTranslate::trans('About Company', \App::getLocale()) }}</h5>
                    <h1 class="mb-4">{{ GoogleTranslate::trans($about->judul, \App::getLocale()) }}</h1>
                    <p>{{ GoogleTranslate::trans($about->description, \App::getLocale()) }}</p>
                    <h1 class="mb-4">{{ GoogleTranslate::trans('Vision & Mission Company', \App::getLocale()) }}</h1>
                    <h5 class="text-secondary">{{ GoogleTranslate::trans('Vision', \App::getLocale()) }}</h5>
                    <p class="mb-4">{{ GoogleTranslate::trans($about->visi, \App::getLocale()) }}</p>
                    <h5 class="text-danger">{{ GoogleTranslate::trans('Mission', \App::getLocale()) }}</h5>
                    <p>
                    <ol>
                        @foreach ($about->misi as $item)
                            <li>{{ GoogleTranslate::trans($item->text, \App::getLocale()) }}</li>
                        @endforeach
                    </ol>
                    </p>
                    <a href="{{ route('about') }}"
                        class="btn btn-secondary rounded-pill px-5 py-3 text-white">{{ GoogleTranslate::trans('More Details', \App::getLocale()) }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Project Start -->
    <div class="container-fluid project py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">{{ GoogleTranslate::trans('Our Service', \App::getLocale()) }}</h5>
            </div>
            <div class="row g-5">
                @foreach ($service as $item)
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="">
                            <a href="{{ route('service.detail', $item->id) }}" class="text-center">
                                <h4 class="text-primary">{{ GoogleTranslate::trans($item->judul, \App::getLocale()) }}</h4>
                            </a>
                        </div>
                        <div class="project-item">
                            <a href="{{ route('service.detail', $item->id) }}" class="text-center">
                                <div class="project-img">
                                    <img src="{{ asset('service/' . $item->image) }}" class="img-fluid w-100 rounded"
                                        alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-3 mb-4">
                <a href="{{ route('service') }}"
                    class="btn btn-secondary rounded-pill px-5 py-3 text-white">{{ GoogleTranslate::trans('More Details', \App::getLocale()) }}</a>
            </div>
        </div>
    </div>
    <!-- Project End -->

    <!-- Blog Start -->
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
            <div class="text-center mt-3 mb-4">
                <a href="{{ route('article') }}"
                    class="btn btn-secondary rounded-pill px-5 py-3 text-white">{{ GoogleTranslate::trans('More Details', \App::getLocale()) }}</a>
            </div>
        </div>
    </div>


    <!-- Blog End -->
    {{--  <!-- Article Start -->
    <div class="container-fluid  py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">{{ GoogleTranslate::trans('Our Article', \App::getLocale()) }}</h5>
            </div>
            <div class="row">
                @foreach ($article as $articles)
                    <div class="col-md-4 mb-4">
                        <div class="sectiom h-100">
                            <a href="{{ route('article.detail', $articles->id) }}" class="articles">
                                <img src="{{ asset('artikel/' . $articles->foto) }}" class="card-img-top"
                                    alt="Image of the article">
                                <div class="section-body">
                                    <h5 class="card-title">{{ GoogleTranslate::trans($articles->judul, \App::getLocale()) }}
                                    </h5>
                                    <p class="card-text">
                                        {!! GoogleTranslate::trans(Str::limit($articles->keterangan, 100), \App::getLocale()) !!}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-3 mb-4">
                <a href="{{ route('article') }}"
                    class="btn btn-secondary rounded-pill px-5 py-3 text-white">{{ GoogleTranslate::trans('More Details', \App::getLocale()) }}</a>
            </div>
        </div>
    </div>
    <!-- Article End -->  --}}

    <!-- Team Start -->
    <div class="container-fluid py-5 mb-5 team">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <!--<h5 class="text-primary">{{ GoogleTranslate::trans('Our Client', \App::getLocale()) }}</h5>-->
                <!--<h1>{{ GoogleTranslate::trans('Trusted Client', \App::getLocale()) }}</h1>-->
            </div>
            <div class="owl-carousel team-carousel wow fadeIn" data-wow-delay=".5s">
                @foreach ($client as $item)
                    <div class="rounded team-item">
                        <div class="team-content">
                            <div class="team-img-icon">
                                <div class="team-img rounded-circle">
                                    <img src="{{ asset('client/' . $item->image) }}" class="img-fluid rounded-circle"
                                        alt="">
                                </div>
                                <div class="team-name text-center  py-2">
                                    <h4 class="text-uppercase">
                                        {{ GoogleTranslate::trans($item->judul, \App::getLocale()) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->


    @if ($director != null)
        <!-- Director Start -->
        <div class="container-fluid bg-primary py-1 my-5">
            <div class="container pt-5">
                <div class="row g-5">
                    <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                        <div class="h-auto position-relative text-center">
                            <img src="{{ asset('director/' . $director->image) }}" class="img-fluid w-50 rounded"
                                alt="" style="margin-bottom: 25%;">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn text-director" data-wow-delay=".5s">
                        <h5 class="text-white">Director</h5>
                        <h1 class="mb-lg-4 text-white">{{ GoogleTranslate::trans($director->nama, \App::getLocale()) }}
                        </h1>
                        <p class="text-white">{{ GoogleTranslate::trans($director->description, \App::getLocale()) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Director End -->
    @endif
@endsection
