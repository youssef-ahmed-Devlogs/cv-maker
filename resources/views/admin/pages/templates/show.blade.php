@extends('admin.layout.app')

@section('title', $user->name)

@section('styles')
    <style>
        .user-profile {
            position: relative;
        }

        .user-profile .profile-photo {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 10px
        }

        .user-profile .profile-photo img {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-profile .profile-photo .name {
            font-weight: bold;
            font-size: 50px;
            line-height: 1.3
        }

        .user-profile .profile-photo .role {
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .user-profile .profile-actions {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="user-profile card">
        <div class="card-body">

            <div class="profile-photo mt-5">
                <img src="{{ $user->photo() }}" alt="{{ $user->name }}">
                <div class="name-role text-center">
                    <h3 class="name mb-0">{{ $user->name }}</h3>

                    @if ($user->role == 'user')
                        <span class="role badge badge-rounded badge-success">{{ $user->role }}</span>
                    @else
                        <span class="role badge badge-rounded badge-primary">{{ $user->role }}</span>
                    @endif
                </div>
            </div>

            <div class="profile-about-me">
                <div class="pt-4 border-bottom-1 pb-4">
                    <h4 class="text-primary">About Me</h4>
                    <p>{{ $user->about_me }}</p>
                </div>
            </div>

            <div class="profile-personal-info">
                <h4 class="text-primary mb-4">Personal Information</h4>

                <div class="row mb-4">
                    <div class="col-3">
                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                        </h5>
                    </div>
                    <div class="col-9">
                        <span>{{ $user->email }}</span>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-3">
                        <h5 class="f-w-500">Age <span class="pull-right">:</span>
                        </h5>
                    </div>
                    <div class="col-9">
                        <span>{{ $user->age }}</span>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-3">
                        <h5 class="f-w-500">Gender <span class="pull-right">:</span>
                        </h5>
                    </div>
                    <div class="col-9">
                        <span>{{ $user->gender }}</span>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-3">
                        <h5 class="f-w-500">Country <span class="pull-right">:</span></h5>
                    </div>
                    <div class="col-9">
                        <span>
                            {{ $user->country ? $user->country->name() : 'Unknown' }}
                        </span>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-3">
                        <h5 class="f-w-500">City <span class="pull-right">:</span></h5>
                    </div>
                    <div class="col-9">
                        <span>
                            {{ $user->city ? $user->city->name() : 'Unknown' }}
                        </span>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-3">
                        <h5 class="f-w-500">Phone <span class="pull-right">:</span></h5>
                    </div>
                    <div class="col-9">
                        <span>{{ $user->phone ?? 'Unknown' }}</span>
                    </div>
                </div>
            </div>

            <div class="profile-actions">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">
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
            </div>
        </div>
    </div>
@endsection
