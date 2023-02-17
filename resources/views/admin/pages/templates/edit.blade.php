@extends('admin.layout.app')

@section('title', 'Edit Category')


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">

                @csrf
                @method('patch')

                <div class="row">
                    <div class="col-xl-6 mb-2">
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <input type="text" class="form-control" name="title_en" placeholder="Enter the english title"
                                value="{{ old('title_en') ? old('title_en') : $category->title('en') }}" />

                            @error('title_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6 mb-2">
                        <div class="form-group">
                            <label class="control-label">العنوان</label>
                            <input type="text" class="form-control" name="title_ar"
                                placeholder="أدخل العنوان باللغة العربية"
                                value="{{ old('title_ar') ? old('title_ar') : $category->title('ar') }}" />

                            @error('title_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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
