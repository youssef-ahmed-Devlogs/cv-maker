@extends('frontend.layout.app')

@section('styles')
    <style>
        .profile-photo img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            object-fit: cover;
        }

        .profile-photo {
            position: relative;
            cursor: pointer;
        }

        .profile-photo .icon {
            position: absolute;
            left: 0;
            top: 0;
            font-size: var(--h4-size);
            background: rgba(0, 0, 0, 0.3);
            color: var(--light-color);
            width: 100%;
            height: 100%;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition-5);
        }

        .profile-photo:hover .icon {
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    <section class="frequent-section">
        <div class="container">
            <h1 class="page-title text-center">My Account</h1>

            <div class="row">
                <div class="col-xl-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('frontend.update_my_account') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div
                                        class="col-xl-12 d-flex align-items-center justify-content-center flex-column mb-5 mt-3">
                                        <label for="photo" class="profile-photo">
                                            <img src="{{ auth()->user()->photo() }}" alt="{{ auth()->user()->name }}">
                                            <span class="icon">
                                                <i class="fas fa-camera"></i>
                                            </span>
                                        </label>

                                        <input type="file" name="photo" class="d-none" id="photo">

                                        @error('photo')
                                            <small class='text-danger d-block'>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-item mb-2">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="{{ __('frontend.enter_name') }}"
                                                value="{{ auth()->user()->name }}" />

                                            @error('name')
                                                <small class='text-danger d-block'>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-item mb-2">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="{{ __('frontend.enter_email') }}"
                                                value="{{ auth()->user()->email }}" />

                                            @error('email')
                                                <small class='text-danger d-block'>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-item mb-2">
                                            <input type="text" class="form-control" name="age"
                                                placeholder="{{ __('frontend.enter_age') }}"
                                                value="{{ auth()->user()->age }}" />

                                            @error('age')
                                                <small class='text-danger d-block'>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-item mb-2">
                                            <input type="text" class="form-control" name="phone"
                                                placeholder="Your phone" value="{{ auth()->user()->phone }}" />

                                            @error('phone')
                                                <small class='text-danger d-block'>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-item mb-2">
                                            <select class="form-control" name="gender">
                                                <option value="" disabled selected>{{ __('frontend.enter_gender') }}
                                                </option>

                                                <option value="female"
                                                    {{ old('male', auth()->user()->gender) == 'female' ? 'selected' : '' }}>
                                                    {{ __('frontend.female') }}
                                                </option>

                                                <option value="male"
                                                    {{ old('male', auth()->user()->gender) == 'male' ? 'selected' : '' }}>
                                                    {{ __('frontend.male') }}
                                                </option>
                                            </select>

                                            @error('gender')
                                                <small class='text-danger d-block'>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        @php
                                            $countries = App\Models\Country::all();
                                        @endphp

                                        <div class="form-item mb-2">
                                            <select class="form-control" name="country_id" id="country_id">
                                                <option value="" disabled selected>Country</option>

                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ old('country_id', auth()->user()->country_id) == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name() }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            @error('country_id')
                                                <small class='text-danger d-block'>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">

                                        @php
                                            $cities = App\Models\City::where('country_id', auth()->user()->country_id)->get();
                                        @endphp

                                        <div class="form-item mb-2">
                                            <select class="form-control" name="city_id" id="city_id">
                                                <option value="" disabled selected>City</option>

                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ old('city_id', auth()->user()->city_id) == $city->id ? 'selected' : '' }}>
                                                        {{ $city->name() }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('city_id')
                                                <small class='text-danger d-block'>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="form-item">
                                            <textarea cols="30" rows="5" name="about_me" class="form-control" placeholder="About me">{{ auth()->user()->about_me }}</textarea>

                                            @error('about_me')
                                                <small class='text-danger d-block'>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <button id="btn-update" class="btn btn-success mt-3 d-flex align-items-center gap-2">
                                    <i class="fas fa-pen"></i>
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('frontend.update_my_password') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="form-item mb-2">
                                        <input type="password" class="form-control" name="current_password"
                                            placeholder="Enter your current password" />

                                        @error('current_password')
                                            <small class='text-danger d-block'>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-item mb-2">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Enter new password" />

                                        @error('password')
                                            <small class='text-danger d-block'>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-item mb-2">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            placeholder="Re-Enter new password" />

                                        @error('password_confirmation')
                                            <small class='text-danger d-block'>{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>


                                <button class="btn btn-success mt-3 d-flex align-items-center gap-2">
                                    <i class="fas fa-pen"></i>
                                    Update Password
                                </button>
                            </form>
                        </div>
                    </div>


                    @if (auth()->user()->has_subscription())
                        <div class="card mb-4">
                            <p class="m-0 px-3 pt-3">
                                @if (auth()->user()->has_subscription()->plan == 'PRO')
                                    You are subscribed in the pro subscription plan.

                                    <span class="d-block">
                                        Expiration Date:

                                        <strong>
                                            {{ auth()->user()->has_subscription()->expiration_date }}
                                        </strong>
                                    </span>

                                    <span class="d-block">
                                        <strong>{{ auth()->user()->subscriptionExpiration() }}</strong>
                                        days left.
                                    </span>
                                @else
                                    You are subscribed in the free plan.
                                @endif
                            </p>

                            <div class="card-body">
                                <form
                                    action="{{ route('frontend.subscription.unsubscribe',auth()->user()->has_subscription()->plan) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger mt-3 d-flex align-items-center gap-2"
                                        onclick="return confirm('Are you sure you want to unsubscribe?')">
                                        <i class="fa-solid fa-user-xmark"></i>
                                        Unsubscribe
                                    </button>
                                </form>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        const photo = document.getElementById('photo');

        photo.addEventListener('change', (e) => {
            viewImageBeforUpload(e.target.files[0], document.querySelector('.profile-photo img'));
            // $("#btn-update").click()
        })

        $('#country_id').on('change', function(e) {
            const country_id = e.target.value;
            fetchCities(country_id);
        })

        function fetchCities(country_id) {
            $.ajax({
                url: `{{ route('admin.cities.ajaxCities') }}?country_id=${country_id}`,
                method: 'GET',
            }).done(function(cities) {
                $("#city_id").empty();

                cities.forEach((city) => {
                    const name = JSON.parse(city.name)["name_{{ Session::get('locale') }}"];
                    $("#city_id").append(new Option(name, city.id));
                });
            });
        }

        function viewImageBeforUpload(imageFile, viewContainer) {
            if (imageFile.type.startsWith("image")) {
                const reader = new FileReader();
                reader.readAsDataURL(imageFile);
                reader.onload = (e) =>
                    viewContainer.src = e.target.result;
            }
        }
    </script>
@endsection
