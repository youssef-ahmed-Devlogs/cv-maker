@extends('frontend.layout.app')


@section('styles')
    <style>
        .swiper-header .download-count {
            font-size: var(--h7-size);
        }

        .swiper-header .download-count i {
            color: var(--primary-color);
            font-size: var(--h6-size);
        }

        .swiper-image img {
            width: 100%;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>

    <style>
        .template-page .template-image {
            position: relative;
        }

        .template-page .feature-template {
            position: absolute;
            right: 5px;
            top: 5px;
            color: var(--light-color);
            background-color: var(--second-color);
            padding: 5px 10px;
            font-size: var(--h7-size);
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    {{-- <a href="{{ route('frontend.create') }}" class="btn btn-primary">Create Cv</a> --}}
    <section class="template-page">
        <div class="container">
            <h1 class="page-title text-center">Choose a template</h1>

            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($templates as $template)
                        <div class="swiper-slide">
                            <div class="swiper-header mb-1">
                                <div class="download-count d-flex gap-2">
                                    <i class="fas fa-download"></i>
                                    <span>{{ $template->downloads }}</span>
                                </div>
                            </div>

                            <a href="{{ route('frontend.cvs.create', $template) }}" class="swiper-image template-image">
                                @if (!$template->is_free)
                                    <span class="feature-template">PRO</span>
                                @endif

                                <img class="w-100" src="{{ $template->cover() }}" alt="" />
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        const swiper = new Swiper(".swiper", {
            // Optional parameters


            // If we need pagination
            pagination: {
                el: ".swiper-pagination",
            },

            // Navigation arrows
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },

                // when window width is >= 640px
                640: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                // when window width is >= 840px
                840: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        });
    </script>
@endsection
