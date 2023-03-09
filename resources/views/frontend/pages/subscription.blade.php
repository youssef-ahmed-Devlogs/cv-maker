@extends('frontend.layout.app')


@section('styles')
@endsection


@section('content')
    <!-- ====================== START SUBSCRIPTION SECTION ====================== -->

    <section class="subscription-section" id="subscription-section">
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
@endsection
