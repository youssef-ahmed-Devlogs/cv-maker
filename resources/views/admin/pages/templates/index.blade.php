@extends('admin.layout.app')

@section('title', 'Templates List')

@section('styles')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <a href="{{ route('admin.templates.create') }}"
                class="btn-create btn btn-primary mb-3 d-inline-flex align-items-center" style="gap: 5px">
                <i class="fas fa-plus"></i>
                Add Template
            </a>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Templates List</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Cover</th>
                                    <th>Free</th>
                                    <th>Category</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($templates as $template)
                                    <tr>
                                        <td>
                                            <img class="rounded" style="width: 190px;height: 290px;object-fit: cover"
                                                src="{{ $template->cover() }}" alt="">
                                        </td>
                                        <td>{{ $template->isFree == 1 ? 'Free' : 'Subscription' }}</td>
                                        <td>{{ $template->category->title() }}</td>
                                        <td>{{ $template->createdBy->name }}</td>
                                        <td>{{ $template->created_at }}</td>

                                        <td>
                                            <div class="d-flex align-items-center" style="gap: 5px;">
                                                <a href="{{ route('admin.templates.edit', $template->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="la la-pencil"></i>
                                                </a>

                                                <form action="{{ route('admin.templates.destroy', $template->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this template?')">
                                                        <i class="la la-trash-o"></i>
                                                    </button>
                                                </form>
                                            </div>
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
