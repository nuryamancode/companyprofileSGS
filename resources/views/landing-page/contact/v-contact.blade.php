@extends('landing-page.base.v-app', ['title' => 'Contact'])
@section('content')
    @php
        $backgroundImageUrl = asset('banner/' . $banner->contact);
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
            <h1 class="display-2 text-white mb-4 animated slideInDown">{{ GoogleTranslate::trans('Contact Us',\App::getLocale()) }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ GoogleTranslate::trans('Home',\App::getLocale()) }}</a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ GoogleTranslate::trans('Contact',\App::getLocale()) }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-fluid py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">{{ GoogleTranslate::trans('Get In Touch',\App::getLocale()) }}</h5>
                <h1 class="mb-3">{{ GoogleTranslate::trans('Contact Company',\App::getLocale()) }}</h1>
            </div>
            <div class="contact-detail position-relative p-5">
                <div class="row g-5 justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                        <div class="d-flex bg-light p-3 rounded" style="height: auto; overflow: hidden;">
                            <div class="flex-shrink-0 btn-square bg-primary done rounded-circle align-items-center justify-content-center"
                                style="width: 64px; height: 64px;">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-3 flex-grow-1">
                                <h4 class="text-primary">{{ GoogleTranslate::trans('Address',\App::getLocale()) }}</h4>
                                <a href="{{ $contact->link_gmaps }}" target="_blank"
                                    class="h6 text-contact">{{ $contact->address }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                        <div class="d-flex bg-light p-3 rounded" style="height: auto; overflow: hidden;">
                            <div class="flex-shrink-0 btn-square bg-primary done rounded-circle align-items-center justify-content-center"
                                style="width: 64px; height: 64px;">
                                <i class="fa fa-phone text-white"></i>
                            </div>
                            <div class="ms-3 flex-grow-1">
                                <h4 class="text-primary">{{ GoogleTranslate::trans('Call Us',\App::getLocale()) }}</h4>
                                @if ($contact->telepon->count() == 1)
                                    <a class="h6 text-contact" href="https://api.whatsapp.com/send?phone={{ $contact->telepon->first()->no_hp }}"
                                        target="_blank">
                                        {{ $contact->telepon->first()->nama }} - {{ $contact->telepon->first()->no_hp }}
                                    </a>
                                @else
                                    <ul>
                                        @foreach ($contact->telepon as $item)
                                            <li>
                                                <a class="h6 text-contact" href="https://api.whatsapp.com/send?phone={{ $item->no_hp }}"
                                                    target="_blank">{{ $item->nama }} - {{ $item->no_hp }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".7s">
                        <div class="d-flex bg-light p-3 rounded" style="height: auto; overflow: hidden;">
                            <div class="flex-shrink-0 bg-primary rounded-circle done align-items-center justify-content-center"
                                style="width: 64px; height: 64px;">
                                <i class="fa fa-envelope text-white"></i>
                            </div>
                            <div class="ms-3 flex-grow-1">
                                <h4 class="text-primary">{{ GoogleTranslate::trans('Email Us',\App::getLocale()) }}</h4>
                                <a class="h6 text-contact d-block" href="mailto:{{ $contact->email }}" target="_blank"
                                    style="white-space: normal; word-break: break-word;">
                                    {{ $contact->email }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5 mt-5">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="p-2 h-100 rounded contact-map">
                            <iframe class="rounded w-100 h-100" src="{{ $contact->link_iframe }}" style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="p-3 rounded contact-form">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ GoogleTranslate::trans(session('success'),\App::getLocale()) }}
                                    </div>
                                @endif
                                <div class="mb-4">
                                    <input type="text" name="name" class="form-control border-0 py-3"
                                        placeholder="{{ GoogleTranslate::trans('Your Name',\App::getLocale()) }}" required>
                                </div>
                                <div class="mb-4">
                                    <input type="email" name="email" class="form-control border-0 py-3"
                                        placeholder="{{ GoogleTranslate::trans('Your Email',\App::getLocale()) }}" required>
                                </div>
                                <div class="mb-4">
                                    <textarea name="message" class="w-100 form-control border-0 py-3" rows="6" placeholder="{{ GoogleTranslate::trans('Message',\App::getLocale()) }}" required></textarea>
                                </div>
                                <div class="text-start">
                                    <button class="btn bg-secondary text-white btn-md" type="submit">{{ GoogleTranslate::trans('Send Message',\App::getLocale()) }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
