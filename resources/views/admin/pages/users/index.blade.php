@extends('admin.layout.app')


@section('styles')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <button class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i>

                Add User
            </button>

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

                            @php
                                $users = \App\Models\User::all();
                            @endphp

                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <img class="rounded-circle" width="35"
                                                src="{{ asset('backend/images/profile/small/pic1.jpg') }}" alt="">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>Male</td>
                                        <td>M.COM., P.H.D.</td>
                                        <td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
                                        <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                        <td>2011/04/25</td>
                                        <td>2011/04/25</td>

                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i
                                                    class="la la-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                    class="la la-trash-o"></i></a>
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
