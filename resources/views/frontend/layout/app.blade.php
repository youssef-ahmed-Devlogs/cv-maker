<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CV Maker</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/index.css') }}" />

    @if (session()->get('locale') == 'ar')
        <link rel="stylesheet" href="{{ asset('frontend/css/index-ar.css') }}" />
    @endif

    @yield('styles')
</head>

<body>
    <!-- ====================== START HEADER ====================== -->
    @include('frontend.partials._header')
    <!-- ====================== END HEADER ====================== -->

    <!-- ====================== START MAIN CONTENT ====================== -->
    <main>
        @yield('content')
    </main>
    <!-- ====================== END MAIN CONTENT ====================== -->

    <!-- ====================== START FOOTER ====================== -->
    @include('frontend.partials._footer')
    <!-- ====================== END FOOTER ====================== -->

    <!-- SCRIPT -->
    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/index.js') }}"></script>

    @yield('scripts')
</body>

</html>
