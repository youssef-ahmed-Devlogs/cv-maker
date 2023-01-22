@extends('frontend.layout.app')


@section('styles')
    <link rel="stylesheet" href="{{ asset('cv_templates/template.css') }}">
    <link rel="stylesheet" href="{{ asset('cv_templates/template_5/style.css') }}">
@endsection

@section('content')
    <div class="create-cv-page">
        <div class="cv-form">
            @include('frontend.partials._cv-form')
        </div>

        <div class="cv-preview">
            {{-- Template Veiew --}}
            @include('frontend.partials._template-view')

            <div class="actions">
                <button class="btn btn-primary d-flex">
                    <i class="far fa-edit"></i>
                    Edit Template
                </button>
                <button class="btn btn-success d-flex">
                    <i class="fas fa-arrow-alt-circle-down"></i>
                    Download
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('frontend/js/cv-form.js') }}"></script>
@endsection
