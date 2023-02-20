@extends('frontend.layout.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('cv_templates/template.css') }}">
@endsection

@section('content')
    <div class="create-cv-page">
        <div class="cv-form">
            @include('frontend.partials._cv-form')
        </div>

        <div class="cv-preview">
            {{-- Template Veiew --}}
            {!! $templateView !!}
            {{-- @include('frontend.partials._template-view') --}}

            <div class="actions">
                <button class="btn btn-primary d-flex">
                    <i class="far fa-edit"></i>
                    Edit Template
                </button>
                <button class="btn btn-success d-flex" id="submitCvForm">
                    <i class="fas fa-arrow-alt-circle-down"></i>
                    Download
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function ajaxUpdate(formData) {
            $.ajax({
                type: "PATCH",
                url: "{{ route('frontend.cvs.update', $cv) }}",
                data: {
                    ...formData,
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(res) {
                livePreview(res);
            });
        }

        educationAjaxUpdate()

        // Add education section
        $("#add-education-button").on('click', function(e) {
            $.ajax({
                type: "GET",
                url: "{{ route('frontend.education.components.formSection', $cv) }}",
                data: {
                    ajax: 1
                },
            }).done(function(sectionHTML) {
                $("#add-education-button").attr("disabled", true);
                appendSectionToForm(sectionHTML.formSection, "#additional_form_sections");
                appendSectionToTemplate(sectionHTML.templateSection, ".template_left_area");
            });

            educationAjaxUpdate();
        })

        function educationAjaxUpdate() {
            let educationData = {};
            const educationInputs = document.querySelectorAll('#education_inputs .education_input');

            educationInputs.forEach(input => {
                input.addEventListener('change', (e) => {
                    educationData.id = e.target.dataset.id;
                    educationData[e.target.name] = e.target.value;

                    ajaxUpdate({
                        education: educationData
                    })
                })
            })
        }
    </script>

    <script src="{{ asset('frontend/js/cv-form.js') }}"></script>

    <script>
        $("#submitCvForm").click(function() {
            $("#cvForm").submit();
        });
    </script>
@endsection
