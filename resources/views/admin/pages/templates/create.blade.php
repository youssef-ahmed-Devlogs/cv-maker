@extends('admin.layout.app')

@section('title', 'Create Template')


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.templates.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-xl-12 mb-2">
                        <div class="form-group">
                            <label class="control-label">Template Code</label>
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

@endsection
