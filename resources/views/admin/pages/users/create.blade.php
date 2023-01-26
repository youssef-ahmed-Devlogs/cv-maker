@extends('admin.layout.app')

@section('title', 'Create User')


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-xl-6 mb-2">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name"
                                value="{{ old('name') }}" />

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email"
                                value="{{ old('email') }}" />

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password"
                                value="{{ old('password') }}" />

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
                                value="{{ old('age') }}" />

                            @error('age')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label class="control-label">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter phone"
                                value="{{ old('phone') }}" />

                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
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
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
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
                            <select class="form-control" name="country" id="country">
                                <option value="" selected disabled>Select</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ old('country') == $country->id ? 'selected' : '' }}>
                                        {{ $country->name() }}
                                    </option>
                                @endforeach
                            </select>

                            @error('country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label>City</label>
                            <select class="form-control" name="city" id="city">
                                <option value="" selected disabled>Select</option>
                            </select>

                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="control-label">About User</label>
                            <textarea name="about_me" class="form-control" placeholder="about" cols="30" rows="5">{{ old('about_me') }}</textarea>

                            @error('about_me')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-xl-12">
                        <div class="form-group">
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

                <button class="btn btn-primary mt-2 d-inline-flex align-items-center" style="gap: 5px">
                    <i class="fas fa-plus"></i>
                    Add
                </button>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        const countryOptions = document.querySelectorAll("#country option");
        countryOptions.forEach(option => {
            if (option.selected)
                fetchCities(option.value);
        });

        $('#country').on('change', function(e) {
            const country_id = e.target.value;
            fetchCities(country_id);
        })

        function fetchCities(country_id) {
            $.ajax({
                url: `{{ route('admin.cities.ajaxCities') }}?country_id=${country_id}`,
                method: 'GET',
            }).done(function(cities) {
                $("#city").empty();

                cities.forEach((city) => {
                    const name = JSON.parse(city.name)["name_{{ Session::get('locale') }}"];
                    $("#city").append(new Option(name, city.id));
                });

                $('#city').selectpicker('refresh');
            });
        }
    </script>
@endsection
