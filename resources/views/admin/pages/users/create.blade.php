@extends('admin.layout.app')


@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6">
                    <div class="form-item">
                        <label class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" />
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="form-item">
                        <label class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" />
                    </div>
                </div>
            </div>

            <button class="btn btn-primary mt-3">Add</button>
        </div>
    </div>
@endsection
