@extends('admin.layout.app')

@section('title', 'Notifications')

@section('content')
    <div class="row">
        <div class="col-12">
            @include('admin.partials._notifications-card')
        </div>
    </div>
@endsection
