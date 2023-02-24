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

            <div class="actions">
                <button class="btn btn-primary d-flex">
                    <i class="far fa-edit"></i>
                    Edit Template
                </button>

                <button class="btn btn-success d-flex" id="download-button">
                    <i class="fas fa-arrow-alt-circle-down"></i>
                    Download
                </button>

                {{-- If have a pro subscription --}}
                @if (true)
                    <select id="download-options" class="form-control">
                        <option value="png">PNG</option>
                        <option value="jpeg">JPG</option>
                        <option value="pdf">PDF</option>
                    </select>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('frontend/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('frontend/js/html2pdf.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/cv-form.js') }}"></script>

    <script>
        // ===== START WORKING WITH SECTIONS =====    

        // To update any data in the form, and run live preview after the update
        function ajaxUpdate(formData) {
            $.ajax({
                type: "PATCH",
                url: "{{ route('frontend.cvs.update', $cv) }}",
                data: {
                    ...formData,
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(cvData) {
                livePreview(cvData);
            });
        }

        // ============= START EDUCATIONS SECTION =============

        // Add educations section
        $("#add-educations-button").on('click', function(e) {
            $.ajax({
                type: "POST",
                url: "{{ route('frontend.cvs.education.addSection', $cv) }}",
                data: {
                    ajax: 1,
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(sectionHTML) {
                appendSection({
                    form: {
                        html: sectionHTML.formSection,
                        selector: '#additional_form_sections'
                    },
                    template: {
                        html: sectionHTML.templateSection,
                        selector: '.template_left_area'
                    },
                    addButton: `#${e.target.id}`
                });

                onSectionDataChange(["education"]);
                onRemoveSection();
            });
        })

        // Remove educations section
        function ajaxDeleteEducationSection() {
            $.ajax({
                type: "DELETE",
                url: `{{ route('frontend.cvs.education.removeSection', $cv) }}`,
                data: {
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(res) {
                removeSection(`educations_section`);
                $(`#add-educations-button`).attr("disabled", false);
            });
        }

        // ============= END EDUCATION SECTION =============


        // ============= START PROJECTS SECTION =============

        // Add experiences section
        $("#add-experiences-button").on('click', function(e) {
            $.ajax({
                type: "POST",
                url: "{{ route('frontend.cvs.experience.addSection', $cv) }}",
                data: {
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(sectionHTML) {
                appendSection({
                    form: {
                        html: sectionHTML.formSection,
                        selector: '#additional_form_sections'
                    },
                    template: {
                        html: sectionHTML.templateSection,
                        selector: '.template_left_area'
                    },
                    addButton: `#${e.target.id}`
                });

                onSectionDataChange(["experience"]);
                onRemoveSection();
            });
        })

        // Remove educations section
        function ajaxDeleteExperienceSection() {
            $.ajax({
                type: "DELETE",
                url: `{{ route('frontend.cvs.experience.removeSection', $cv) }}`,
                data: {
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(res) {
                removeSection(`experiences_section`);
                $(`#add-experiences-button`).attr("disabled", false);
            });
        }

        // ============= END EDUCATION SECTION =============

        // ============= START PROJECTS SECTION =============

        // Add projects section
        $("#add-projects-button").on('click', function(e) {
            $.ajax({
                type: "POST",
                url: "{{ route('frontend.cvs.project.addSection', $cv) }}",
                data: {
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(sectionHTML) {
                appendSection({
                    form: {
                        html: sectionHTML.formSection,
                        selector: '#additional_form_sections'
                    },
                    template: {
                        html: sectionHTML.templateSection,
                        selector: '.template_left_area'
                    },
                    addButton: `#${e.target.id}`
                });

                onSectionDataChange(["project"]);
                onRemoveSection();
            });
        })

        // Remove projects section
        function ajaxDeleteProjectSection() {
            $.ajax({
                type: "DELETE",
                url: `{{ route('frontend.cvs.project.removeSection', $cv) }}`,
                data: {
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(res) {
                removeSection(`projects_section`);
                $(`#add-projects-button`).attr("disabled", false);
            });
        }

        // ============= END PROJECTS SECTION =============

        // ============= START LANGUAGES SECTION =============

        // Add languages section
        $("#add-languages-button").on('click', function(e) {
            $.ajax({
                type: "POST",
                url: "{{ route('frontend.cvs.language.addSection', $cv) }}",
                data: {
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(sectionHTML) {
                appendSection({
                    form: {
                        html: sectionHTML.formSection,
                        selector: '#additional_form_sections'
                    },
                    template: {
                        html: sectionHTML.templateSection,
                        selector: '.template_right_area'
                    },
                    addButton: `#${e.target.id}`
                });

                onSectionDataChange(["language"]);
                onRemoveSection();
            });
        })

        // Remove languages section
        function ajaxDeleteLanguageSection() {
            $.ajax({
                type: "DELETE",
                url: `{{ route('frontend.cvs.language.removeSection', $cv) }}`,
                data: {
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(res) {
                removeSection(`languages_section`);
                $(`#add-languages-button`).attr("disabled", false);
            });
        }

        // ============= END LANGUAGES SECTION =============

        // ============= START SKILLS SECTION =============

        // Add skills section
        $("#add-skills-button").on('click', function(e) {
            $.ajax({
                type: "POST",
                url: "{{ route('frontend.cvs.skill.addSection', $cv) }}",
                data: {
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(sectionHTML) {
                appendSection({
                    form: {
                        html: sectionHTML.formSection,
                        selector: '#additional_form_sections'
                    },
                    template: {
                        html: sectionHTML.templateSection,
                        selector: '.template_right_area'
                    },
                    addButton: `#${e.target.id}`
                });

                onSectionDataChange(["skill"]);
                onRemoveSection();
            });
        })

        // Remove skills section
        function ajaxDeleteSkillSection() {
            $.ajax({
                type: "DELETE",
                url: `{{ route('frontend.cvs.skill.removeSection', $cv) }}`,
                data: {
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(res) {
                removeSection(`skills_section`);
                $(`#add-skills-button`).attr("disabled", false);
            });
        }

        // ============= END SKILLS SECTION =============
    </script>

    <script>
        $("#download-button").click(function() {
            // Do something
        });
    </script>
@endsection
