<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="shortcut icon" href="{{ asset('assets/img/SGSS.png') }}">
    <title>SGS Global Consultant | Satria Global Solusi - BackOffice / {{ $title ?? config('app.name') }}</title>

    @include('admin.components.v-head')
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('admin.components.v-navbar')
            @include('admin.components.v-sidebar')

            @yield('content')
            @include('admin.components.v-footer')
        </div>
    </div>
    @include('sweetalert::alert')
    @include('admin.components.v-script')
</body>

</html>
