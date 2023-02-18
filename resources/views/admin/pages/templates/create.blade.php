@extends('admin.layout.app')

@section('title', 'Create Category')


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.templates.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-xl-6 mb-2">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="name_en" placeholder="Enter english name"
                                value="{{ old('name_en') }}" />

                            @error('name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6 mb-2">
                        <div class="form-group">
                            <label class="control-label">الاسم</label>
                            <input type="text" class="form-control" name="name_ar"
                                placeholder="أدخل الأسم باللغة العربية" value="{{ old('name_ar') }}" />

                            @error('name_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-12 mb-2">
                        <div class="form-group">
                            <label class="control-label">Template</label>
                            <textarea name="template_code" class="form-control" cols="30" rows="10" style="height: 600px;"></textarea>
                            @error('template_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="" selected disabled>Select</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title() }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="form-group">
                            <label>Is Free</label>
                            <select class="form-control" name="is_free" id="is_free">
                                <option value="" selected disabled>Select</option>

                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>

                            @error('is_free')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="control-label">Cover</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="cover">
                                <label class="custom-file-label">Choose cover</label>
                            </div>
                        </div>

                        @error('cover')
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
        const countryOptions = document.querySelectorAll("#country_id option");
        countryOptions.forEach(option => {
            if (option.selected)
                fetchCities(option.value);
        });

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
