@extends('admin.layout.app')

@section('title', 'Users List')

@section('styles')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <a href="{{ route('admin.users.create') }}"
                class="btn-create btn btn-primary mb-3 d-inline-flex align-items-center" style="gap: 5px">
                <i class="fas fa-plus"></i>
                Add User
            </a>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Users List</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Joining Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <img class="rounded-circle" style="width: 40px;height: 40px;object-fit: cover"
                                                src="{{ $user->photo() }}" alt="">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a>
                                        </td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->age }}</td>
                                        <td class="text-center">
                                            @if ($user->role == 'user')
                                                <span class="badge badge-rounded badge-success">{{ $user->role }}</span>
                                            @else
                                                <span class="badge badge-rounded badge-primary">{{ $user->role }}</span>
                                            @endif

                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->country->name() }}</td>
                                        <td>{{ $user->city->name() }}</td>
                                        <td>{{ $user->created_at }}</td>

                                        <td class="d-flex align-items-center" style="gap: 5px">
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="la la-pencil"></i>
                                            </a>

                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
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
