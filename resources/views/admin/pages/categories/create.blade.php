@extends('admin.layout.app')

@section('title', 'Create Category')


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">

                @csrf

                <div class="row">
                    <div class="col-xl-6 mb-2">
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <input type="text" class="form-control" name="title_en" placeholder="Enter title english"
                                value="{{ old('title_en') }}" />

                            @error('title_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6 mb-2">
                        <div class="form-group">
                            <label class="control-label">العنوان</label>
                            <input type="text" class="form-control" name="title_ar"
                                placeholder="أدخل العنوان باللغة العربية" value="{{ old('title_ar') }}" />

                            @error('title_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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
