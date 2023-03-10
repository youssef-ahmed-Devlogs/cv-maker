@extends('frontend.layout.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('cv_templates/template.css') }}">
@endsection

@section('content')
    <div class="download-page">
        <div class="container">
            {!! $templateView !!}
        </div>
    </div>
@endsection
