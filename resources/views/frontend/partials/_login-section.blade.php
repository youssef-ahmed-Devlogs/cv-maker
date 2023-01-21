<section class="login-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 mb-4">
                <h2 class="login-title">
                    {{ __('frontend.login_heading') }}
                </h2>
                <form action="{{ route('frontend.login') }}" method="POST">
                    @csrf

                    <div class="form-item mb-2">
                        <input type="email" class="form-control" name="email"
                            placeholder="{{ __('frontend.enter_email') }}" value="{{ old('email') }}" />

                        @error('email')
                            <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-item">
                        <input type="password" class="form-control" name="password"
                            placeholder="{{ __('frontend.enter_password') }}" value="{{ old('password') }}" />

                        @error('password')
                            <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="login-button btn btn-xl btn-primary w-100 mt-3">
                        {{ __('frontend.login') }}
                    </button>
                </form>

                <hr />

                <button class="login-button btn btn-success w-100" type="button" class="btn btn-primary"
                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                    {{ __('frontend.create_account') }}
                </button>
            </div>
            <div class="col-xl-6">
                <div class="login-image">
                    <img src="{{ asset('frontend/images/login-image.svg') }}" alt="login image" class="w-100" />
                </div>
            </div>
        </div>
    </div>

    <!-- Create new account modal -->
    @include('frontend.partials._register-modal')
</section>
