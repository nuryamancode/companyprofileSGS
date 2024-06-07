<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content=" Satria Global Solusi adalah perusahaan yang berpengalaman dalam membantu layanan perizinan untuk mendukung korporasi kegiatan usaha sesuai dengan peraturan pemerintah dan hukum yang berlaku di Republik Indonesia">
    <meta name="keywords" content="sgscglobalconsultant, Satria, Global, Solusi">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Satria Global Solusi">
    <meta property="og:description" content="perusahaan yang berpengalaman dalam membantu layanan perizinan untuk mendukung korporasi kegiatan usaha sesuai dengan peraturan pemerintah dan hukum yang berlaku di Republik Indonesia">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="URL_GAMBAR">
    <title>SGS - Company Profile / {{ $title ?? config('app.name') }}</title>
    @include('landing-page.components.v-head')
</head>

<body>

    @include('landing-page.components.v-navbar')

    @yield('content')


    @include('landing-page.components.v-footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up text-white"></i></a>

    @include('landing-page.components.v-script')
</body>

</html>
