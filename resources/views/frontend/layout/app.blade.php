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

    <style>
        #site-ads {
            width: 270px;
            padding: 10px;
            position: absolute;
        }

        #site-ads .single-ad {
            margin-bottom: 10px;
        }

        #site-ads .single-ad img {
            width: 100%;
            height: 400px;
            border-radius: 5px;
            object-fit: cover;
        }
    </style>

    @yield('styles')
</head>

<body>
    <!-- ====================== START HEADER ====================== -->
    @include('frontend.partials._header')
    <!-- ====================== END HEADER ====================== -->

    <!-- ====================== START MAIN CONTENT ====================== -->
    <main>

        @php
            $routesWithoutAds = ['frontend.cvs.edit', 'frontend.index'];
        @endphp

        @if (in_array(Route::currentRouteName(), $routesWithoutAds))
            @yield('content')
        @else
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-10">
                        @yield('content')
                    </div>

                    <div class="col-xl-2 p-2">
                        <a href="#" class="card mb-3">
                            <img src="{{ asset('images/ads_1.png') }}" alt="">
                        </a>

                        <a href="#" class="card mb-3">
                            <img src="{{ asset('images/ads_2.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        @endif


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
