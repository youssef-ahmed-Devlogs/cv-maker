<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />

    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/images/favicon.png') }}" />

    <!-- PAGE TITLE HERE -->
    <title>Cv Maker - @yield('title')</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            @yield('content')
        </div>
    </div>
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('backend/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/dlabnav-init.js') }}"></script>

</body>

</html>
