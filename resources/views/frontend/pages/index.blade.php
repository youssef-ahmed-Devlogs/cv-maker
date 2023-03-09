@extends('frontend.layout.app')


@section('styles')
@endsection


@section('content')
    <!-- ====================== START hero section ====================== -->

    <section class="hero-section">
        <div class="container">
            <div class="row pt-5 align-items-center">
                <div class="col col-md-6 col-lg-6 col-sm-12">
                    <h1>
                        {{ __('frontend.hero_heading') }}
                    </h1>
                    <p>
                        {{ __('frontend.hero_text') }}
                    </p>

                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('frontend.templates') }}" class="btn btn-xl btn-primary">
                            {{ __('frontend.hero_button_text') }}
                        </a>

                        <button class="btn btn-success btn-xl" type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#video_learn" data-bs-whatever="@mdo">
                            Learn
                        </button>
                    </div>
                </div>
                <div class="col col-md-6 col-lg-6 col-sm-12">
                    <div class="image mx-auto">
                        <img src="{{ asset('frontend/images/hero.png') }}" alt="tamplet photo" />
                    </div>
                </div>
            </div>
        </div>

        @guest
            @include('frontend.partials._video-modal')
        @endguest
    </section>

    <!-- ====================== End hero section ====================== -->

    <!-- ====================== START LOGIN SECTION ====================== -->
    @guest
        @include('frontend.partials._login-section')
    @endguest
    <!-- ====================== END LOGIN SECTION ====================== -->

    <!-- ====================== START Advantages section ====================== -->

    <section class="advantages-section">
        <div class="container">
            <div class="row text-center align-items-center">
                <div class="adv-card col-xl-4 mb-4">
                    <span class="adv-icon blue">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <h3>
                        {{ __('frontend.advantages_heading.0') }}
                    </h3>
                    <p>
                        {{ __('frontend.advantages_text.0') }}
                    </p>
                </div>
                <div class="adv-card col-xl-4 mb-4">
                    <span class="adv-icon green">
                        <i class="fas fa-chart-bar"></i>
                    </span>

                    <h3>
                        {{ __('frontend.advantages_heading.1') }}
                    </h3>
                    <p>
                        {{ __('frontend.advantages_text.1') }}
                    </p>
                </div>
                <div class="adv-card col-xl-4 mb-4">
                    <span class="adv-icon yellow">
                        <i class="far fa-address-card"></i>
                    </span>
                    <h3>
                        {{ __('frontend.advantages_heading.2') }}
                    </h3>
                    <p>
                        {{ __('frontend.advantages_text.2') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ====================== START Advantages section ====================== -->

    <!-- ====================== START SUBSCRIPTION SECTION ====================== -->

    <section class="subscription-section">
        <div class="container">
            <h3 class="section-title text-center mb-5">
                {{ __('frontend.subscription_heading') }}
            </h3>

            <div class="row">
                <div class="col-xl-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <!-- card head -->
                            <div class="card-head text-center mb-3">
                                <h3 class="card-title">
                                    {{ __('frontend.subscription_free') }}
                                </h3>
                            </div>

                            <!-- card price -->
                            <div class="card-price text-center">
                                <div class="price">
                                    <div class="discount d-flex align-items-center justify-content-center gap-2">
                                        {{-- <span class="before-discount d-block">EGP</span> --}}

                                        <span class="text-primary bg-primary-opacity fw-bold after-discount d-block">
                                            {{ __('frontend.subscription_save') }} 100%
                                        </span>
                                    </div>

                                    <div class="dollar d-flex align-items-baseline justify-content-center">
                                        EGP
                                        <span>0.00</span>
                                        /{{ __('frontend.subscription_per_month') }}
                                    </div>
                                </div>

                                <form action="{{ route('frontend.subscription.subscribe', 'FREE') }}" method="POST">
                                    @csrf

                                    <button class="subscripe-btn btn btn-primary" type="submit">
                                        {{ __('frontend.subscription_start_button_text') }}
                                    </button>
                                </form>
                            </div>

                            <!-- card list -->
                            <ul class="card-list pb-0">
                                @foreach (__('frontend.subscription_features') as $subFeature => $cost)
                                    <li class="list-item">
                                        @if ($cost == 'free')
                                            <i class="icon fas fa-check"></i>
                                        @else
                                            <i class="icon fas fa-times"></i>
                                        @endif

                                        {{ $subFeature }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- card head -->
                            <div class="card-head text-center mb-3">
                                <h3 class="card-title">
                                    {{ __('frontend.subscription_pro') }}
                                </h3>
                            </div>

                            <!-- card price -->
                            <div class="card-price text-center">
                                <div class="price">
                                    <div class="discount d-flex align-items-center justify-content-center gap-2">
                                        <span class="before-discount d-block">EGP400</span>
                                        <span class="text-success bg-success-opacity fw-bold after-discount d-block">
                                            {{ __('frontend.subscription_save') }} 50%
                                        </span>
                                    </div>

                                    <div class="dollar d-flex align-items-baseline justify-content-center">
                                        EGP
                                        <span>99</span>
                                        /{{ __('frontend.subscription_per_month') }}
                                    </div>
                                </div>

                                <form action="{{ route('frontend.subscription.subscribe', 'PRO') }}" method="POST">
                                    @csrf

                                    <button class="subscripe-btn btn btn-success" type="submit">
                                        {{ __('frontend.subscription_subscribe_button_text') }}
                                    </button>
                                </form>






                            </div>

                            <!-- card list -->
                            <ul class="card-list pb-0">
                                @foreach (__('frontend.subscription_features') as $subFeature => $cost)
                                    @if ($cost == 'pro')
                                        <li class="list-item">
                                            <i class="icon fas fa-check"></i>
                                            {{ $subFeature }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ====================== END SUBSCRIPTION SECTION ====================== -->

    <!-- ====================== START STATISTICS SECTION ====================== -->

    <section class="statistics-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 mb-4">
                    <div class="card bg-warning-opacity" title="Users">
                        <span class="icon text-warning">
                            <i class="fas fa-users"></i>
                        </span>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="info">
                                <span class="text d-block">
                                    {{ __('frontend.statistics_users') }}
                                </span>
                                <span class="count d-block">+{{ \App\Models\User::count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 mb-4">
                    <div class="card bg-success-opacity" title="Templates">
                        <span class="icon text-success">
                            <i class="far fa-copy"></i>
                        </span>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="info">
                                <span class="text d-block">
                                    {{ __('frontend.statistics_templates') }}
                                </span>
                                <span class="count d-block">+{{ \App\Models\Template::count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 mb-4">
                    <div class="card bg-primary-opacity" title="Downloads">
                        <span class="icon text-primary">
                            <i class="fas fa-file-download"></i>
                        </span>
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="info">
                                <span class="text d-block">
                                    {{ __('frontend.statistics_downloads') }}
                                </span>
                                <span class="count d-block">+{{ App\Models\Template::sum('downloads') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ====================== END STATISTICS SECTION ====================== -->

    <!-- ====================== START Different conbinations section ====================== -->

    <section class="different-conbinations-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 mb-5">
                    <div class="left-area">
                        <p class="conbinations-text">
                            {{ __('frontend.diff_conbitaions_text') }}
                        </p>
                        <h3 class="conbinations-title">
                            {{ __('frontend.diff_conbitaions_heading') }}
                        </h3>
                        <a href="{{ route('frontend.templates') }}" class="conbinations-btn btn btn-success">
                            {{ __('frontend.diff_conbitaions_button_text') }}
                        </a>
                    </div>
                </div>

                <div class="col-xl-6 mx-auto">
                    <div class="conbinations-image text-center">
                        <img src="{{ asset('frontend/images/different-templates.svg') }}" class="w-100"
                            alt="conbinations-image" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ====================== END Different conbinations section ====================== -->
@endsection
