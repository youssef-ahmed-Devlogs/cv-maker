@extends('frontend.layout.app')

@section('content')
    <!-- ====================== START LOGIN SECTION ====================== -->
    @guest
        @include('frontend.partials._login-section')
    @endguest
    <!-- ====================== END LOGIN SECTION ====================== -->


    <!-- ====================== START hero section ====================== -->

    <section class="hero-section">
        <div class="container">
            <div class="row pt-5 align-items-center">
                <div class="col col-md-6 col-lg-6 col-sm-12">
                    <h1>
                        Create your best cv <br />
                        Quickly
                    </h1>
                    <p>
                        Use our professionally reviewed and tested CV templates. Get
                        your new CV ready to download in just a few minutes.
                    </p>
                    <a href="{{ route('frontend.templates') }}" class="btn btn-xl btn-primary">Create My CV</a>
                </div>
                <div class="col col-md-6 col-lg-6 col-sm-12">
                    <div class="image mx-auto">
                        <img src="./images/hero.png" alt="tamplet photo" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ====================== End hero section ====================== -->

    <!-- ====================== START Advantages section ====================== -->

    <section class="advantages-section">
        <div class="container">
            <div class="row text-center align-items-center">
                <div class="adv-card col-xl-4 mb-4">
                    <span class="adv-icon blue">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <h3>Quick and Easy</h3>
                    <p>
                        Save time with our CV maker. No more writer's block or
                        formatting issues in Word.
                    </p>
                </div>
                <div class="adv-card col-xl-4 mb-4">
                    <span class="adv-icon green">
                        <i class="fas fa-chart-bar"></i>
                    </span>

                    <h3>More Professional</h3>
                    <p>
                        Stand out from the crowd with our professionally designed and
                        fully customisable CV templates.
                    </p>
                </div>
                <div class="adv-card col-xl-4 mb-4">
                    <span class="adv-icon yellow">
                        <i class="far fa-address-card"></i>
                    </span>
                    <h3>Designed by Experts</h3>
                    <p>
                        All templates have been reviewed and tested by expert
                        recruiters. It'll let you show yourself in the best possible .
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ====================== START Advantages section ====================== -->

    <!-- ====================== START SUBSCRIPTION SECTION ====================== -->

    <section class="subscription-section">
        <div class="container">
            <h3 class="section-title text-center mb-5">Choose Your Plan</h3>

            <div class="row">
                <div class="col-xl-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <!-- card head -->
                            <div class="card-head text-center mb-3">
                                <h3 class="card-title">FREE SUBSCRIPTION</h3>
                            </div>

                            <!-- card price -->
                            <div class="card-price text-center">
                                <div class="price">
                                    <div class="discount d-flex align-items-center justify-content-center gap-2">
                                        <span class="before-discount d-block">$0.00</span>
                                        <span class="text-primary bg-primary-opacity fw-bold after-discount d-block">
                                            SAVE 100%
                                        </span>
                                    </div>

                                    <div class="dollar d-flex align-items-baseline justify-content-center">
                                        $
                                        <span>0.00</span>
                                        /mo
                                    </div>
                                </div>
                                <a href="{{ route('frontend.templates') }}" class="subscripe-btn btn btn-primary">
                                    START NOW
                                </a>
                            </div>

                            <!-- card list -->
                            <ul class="card-list pb-0">
                                <li class="list-item">
                                    <i class="icon fas fa-check"></i>
                                    Download templates with JPG extension only
                                </li>
                                <li class="list-item">
                                    <i class="icon fas fa-times"></i>
                                    Use many pro templates
                                </li>
                                <li class="list-item">
                                    <i class="icon fas fa-times"></i>
                                    Download templates with many extensions ( PDF - JPG - PNG
                                    )
                                </li>
                                <li class="list-item">
                                    <i class="icon fas fa-times"></i>
                                    Edit templates after create it from any where and any time
                                </li>
                                <li class="list-item">
                                    <i class="icon fas fa-times"></i>
                                    Change templates theme
                                </li>
                                <li class="list-item">
                                    <i class="icon fas fa-times"></i>
                                    Share your CV with one click
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- card head -->
                            <div class="card-head text-center mb-3">
                                <h3 class="card-title">PRO SUBSCRIPTION</h3>
                            </div>

                            <!-- card price -->
                            <div class="card-price text-center">
                                <div class="price">
                                    <div class="discount d-flex align-items-center justify-content-center gap-2">
                                        <span class="before-discount d-block">$9.99</span>
                                        <span class="text-success bg-success-opacity fw-bold after-discount d-block">
                                            SAVE 50%
                                        </span>
                                    </div>

                                    <div class="dollar d-flex align-items-baseline justify-content-center">
                                        $
                                        <span>4.99</span>
                                        /mo
                                    </div>
                                </div>
                                <button class="subscripe-btn btn btn-success">
                                    SUBSCRIBE NOW
                                </button>
                            </div>

                            <!-- card list -->
                            <ul class="card-list pb-0">
                                <li class="list-item">
                                    <i class="icon fas fa-check"></i>
                                    Use many pro templates
                                </li>
                                <li class="list-item">
                                    <i class="icon fas fa-check"></i>
                                    Download templates with many extensions ( PDF - JPG - PNG
                                    )
                                </li>
                                <li class="list-item">
                                    <i class="icon fas fa-check"></i>
                                    Edit templates after create it from any where and any time
                                </li>
                                <li class="list-item">
                                    <i class="icon fas fa-check"></i>
                                    Change templates theme
                                </li>
                                <li class="list-item">
                                    <i class="icon fas fa-check"></i>
                                    Share your CV with one click
                                </li>
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
                                <span class="text d-block">Users</span>
                                <span class="count d-block">+1200</span>
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
                                <span class="text d-block">Templates</span>
                                <span class="count d-block">+100</span>
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
                                <span class="text d-block">Downloads</span>
                                <span class="count d-block">+900</span>
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
                            Have you checked out our Templates?
                        </p>
                        <h3 class="conbinations-title">
                            More than 30 different combinations
                        </h3>
                        <a href="{{ route('frontend.templates') }}" class="conbinations-btn btn btn-success">
                            See Templates
                        </a>
                    </div>
                </div>

                <div class="col-xl-6 mx-auto">
                    <div class="conbinations-image text-center">
                        <img src="images/different-templates.svg" class="w-100" alt="conbinations-image" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ====================== END Different conbinations section ====================== -->
@endsection
