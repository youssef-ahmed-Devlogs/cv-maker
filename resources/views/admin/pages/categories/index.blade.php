@extends('admin.layout.app')

@section('title', 'Categories List')

@section('styles')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <a href="{{ route('admin.categories.create') }}"
                class="btn-create btn btn-primary mb-3 d-inline-flex align-items-center" style="gap: 5px">
                <i class="fas fa-plus"></i>
                Add Category
            </a>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Categories List</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->title() }}</td>
                                        <td>{{ $category->description ?? 'Unknown' }}</td>
                                        <td>{{ $category->createdBy->name }}</td>
                                        <td>{{ $category->created_at }}</td>

                                        <td class="d-flex align-items-center" style="gap: 5px">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="la la-pencil"></i>
                                            </a>

                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this category?')">
                                                    <i class="la la-trash-o"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
@endsection
