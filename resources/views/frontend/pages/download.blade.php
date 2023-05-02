@extends('frontend.layout.app')


@section('styles')
    <link rel="stylesheet" href="{{ asset('cv_templates/template.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('cv_templates/template_1/style.css') }}"> --}}
@endsection

@section('content')
    <div class="download-page">
        <div class="container">
            <div class="actions">
                <button id="download-button" class="btn btn-xl btn-primary">
                    {{ __('frontend.download_button_text') }}
                </button>


                <select id="download-options" class="form-control">
                    <option value="png">PNG</option>
                    <option value="jpeg">JPG</option>

                    @if (auth()->user()->pro_subscription() != null)
                        <option value="pdf">PDF</option>
                    @endif
                </select>
            </div>

            {!! $templateView !!}
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('frontend/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('frontend/js/html2pdf.bundle.min.js') }}"></script>
@endsection
