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

    <script>
        const registerForm = document.getElementById("register-form");

        registerForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const data = {
                name: this.name.value,
                email: this.email.value,
                password: this.password.value,
                password_confirmation: this.password_confirmation.value,
                age: this.age.value,
                gender: this.gender.value,
            }

            register(data)
        })

        function register(data) {
            const url = "{{ route('frontend.register') }}";
            data._token = '{{ csrf_token() }}';

            $.ajax({
                method: 'POST',
                url,
                data,
                success: function(response) {
                    location.reload()
                },
                error: function(response) {
                    if (response.status == 422)
                        showErrors(response.responseJSON.errors);
                }
            })
        }


        function showErrors(errors) {
            resetErrors();
            for (let fieldname in errors) {
                const errorsContainer = document.getElementById(`${fieldname}-errors`);
                // Reset first
                errorsContainer.innerHTML = "";
                const fieldErrors = errors[fieldname];
                const errorsElements = fieldErrors.map(message => `<small class='text-danger d-block'>${message}</small>`)
                    .join("");
                errorsContainer.innerHTML = errorsElements;
            }
        }

        function resetErrors() {
            const errorsContainer = document.querySelectorAll(".errors-area");
            errorsContainer.forEach(element => {
                element.innerHTML = ""
            });
        }
    </script>

    @yield('scripts')
</body>

</html>
