@extends('admin.layout.auth')

@section('title', 'Admin Login')

@section('content')
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="auth-form">
                            <h4 class="text-center mb-4">Sign in your account</h4>

                            <form action="{{ route('admin.login') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>
                                        <strong>Email</strong>
                                    </label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="hello@example.com">

                                    @error('email')
                                        <small class="text-danger d-block">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>
                                        <strong>Password</strong>
                                    </label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">

                                    @error('password')
                                        <small class="text-danger d-block">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
