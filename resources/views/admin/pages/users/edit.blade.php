@extends('admin.layout.app')

@section('title', 'Edit User')


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-xl-12 d-flex align-items-center justify-content-center mb-4">
                        <img src="{{ $user->photo() }}" alt="{{ $user->name }}"
                            style="width: 200px;height: 200px;object-fit: cover;border-radius: 50%">
                    </div>

                    <div class="col-xl-6 mb-2">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name"
                                value="{{ old('name') ? old('name') : $user->name }}" />

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email"
                                value="{{ old('email') ? old('email') : $user->email }}" />

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" />

                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label class="control-label">Password Confirm</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" placeholder="Re-Enter password" />

                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label class="control-label">Age</label>
                            <input type="text" class="form-control" name="age" placeholder="Enter age"
                                value="{{ old('age') ? old('age') : $user->age }}" />

                            @error('age')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label class="control-label">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter phone"
                                value="{{ old('phone') ? old('phone') : $user->phone }}" />

                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>
                                    Male</option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>
                                    Female
                                </option>
                            </select>

                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role">

                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                    Admin
                                </option>

                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>
                                    User</option>
                            </select>

                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        @php
                            $countries = App\Models\Country::all();
                        @endphp
                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control" name="country_id" id="country_id">
                                <option value="" selected disabled>Choose country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ $user->country_id == $country->id ? 'selected' : '' }}>
                                        {{ $country->name() }}
                                    </option>
                                @endforeach
                            </select>

                            @error('country_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        @php
                            $cities = App\Models\City::where('country_id', $user->country_id)->get();
                        @endphp

                        <div class="form-group">
                            <label>City</label>
                            <select class="form-control" name="city_id" id="city_id">

                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ $user->city_id == $city->id ? 'selected' : '' }}>
                                        {{ $city->name() }}</option>
                                @endforeach
                            </select>

                            @error('city_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="control-label">About User</label>
                            <textarea name="about_me" class="form-control" placeholder="about" cols="30" rows="5">{{ old('about_me') ? old('about_me') : $user->about_me }}</textarea>

                            @error('about_me')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="control-label">Photo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo">
                                <label class="custom-file-label">Choose Photo</label>
                            </div>
                        </div>

                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-success mt-2 d-inline-flex align-items-center" style="gap: 5px">
                    <i class="fas fa-pen"></i>
                    Update
                </button>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
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

                $('#city_id').selectpicker('refresh');
            });
        }
    </script>
@endsection
