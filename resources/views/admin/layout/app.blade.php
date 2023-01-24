<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="cv maker" />
    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/images/favicon.png') }}" />
    <!-- PAGE TITLE HERE -->
    <title>Cv Maker Admin | @yield('title')</title>
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- DATATABLES -->
    <link href="{{ asset('backend/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">


    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="{{ asset('backend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/jqvmap/css/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin-2.css') }}">

    @yield('styles')

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->

    @include('admin.partials._preloader')

    <!--*******************
        Preloader end
    ********************-->



    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">


        <!--**********************************
            Nav header start
        ***********************************-->

        @include('admin.partials._nav-header')

        <!--**********************************
          Nav header end
      ***********************************-->

        @include('admin.partials._header')

        <!--**********************************
          Sidebar start
      ***********************************-->

        @include('admin.partials._sidebar')

        <!--**********************************
          Sidebar end
      ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->

        @include('admin.partials._footer')

        <!--**********************************
          Footer end
      ***********************************-->



    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('backend/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/dlabnav-init.js') }}"></script>

    <!-- Chart ChartJS plugin files -->
    <script src="{{ asset('backend/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('backend/vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- Chart sparkline plugin files -->
    <script src="{{ asset('backend/vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Demo scripts -->
    <script src="{{ asset('backend/js/dashboard/dashboard-3.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('backend/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins-init/datatables.init.js') }}"></script>

    <!-- Svganimation scripts -->
    <script src="{{ asset('backend/vendor/svganimation/vivus.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/svganimation/svg.animation.js') }}"></script>

    @yield('scripts')
</body>

</html>
