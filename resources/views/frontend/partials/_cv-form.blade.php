<form id="cvForm">
    @csrf
    @method('PATCH')

    <section id="main-information">
        <h2 class="section-title">Main Information</h2>

        <div class="row">
            {{-- <div class="col-xl-12">
                <div class="form-uploader-item">
                    <label for="photo" class="form-uploader-label" title="Upload Photo">
                        <div class="content">
                            <span>Upload Photo</span>
                            <i class="fas fa-plus icon"></i>
                        </div>
                    </label>
                    <input type="file" class="form-uploader onFileUploadEvent" id="photo" name="photo" />
                </div>
            </div> --}}

            <div class="col-xl-6">
                <div class="form-item">
                    <label for="name">Name</label>
                    <input type="text" class="form-control main-input" name="name" placeholder="Name"
                        value="{{ $cv->name }}" />
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-item">
                    <label for="job_title">Job Title</label>
                    <input type="text" class="form-control main-input" name="job_title" placeholder="Job Title"
                        value="{{ $cv->job_title }}" />
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-item">
                    <label for="email">Email</label>
                    <input type="email" class="form-control main-input" name="email" placeholder="Email"
                        value="{{ $cv->email }}" />
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-item">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control main-input" name="phone" placeholder="Phone"
                        value="{{ $cv->phone }}" />
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-item">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control main-input" id="date_of_birth" name="date_of_birth"
                        value="{{ $cv->date_of_birth }}" />
                </div>
            </div>

            <div class="col-xl-6">

                @php
                    $countries = \App\Models\Country::all();
                @endphp

                <div class="form-item">
                    <label for="country">Country</label>
                    <select name="country" class="form-control main-input">
                        <option value="" disabled selected>Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ ucfirst($country->name('en')) }}"
                                {{ ucfirst($cv->country) == ucfirst($country->name('en')) ? 'selected' : '' }}>
                                {{ $country->name('en') }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="form-item">
                    <label for="address">Address</label>
                    <input type="text" class="form-control main-input" name="address" placeholder="Address"
                        value="{{ $cv->address }}" />
                </div>
            </div>

            <div class="col-xl-12">
                <div class="form-item">
                    <label for="about_me">About Me</label>
                    <textarea name="about_me" id="about_me" class="form-control main-input" placeholder="Description about you"
                        cols="30" rows="5">{{ $cv->about_me }}</textarea>
                </div>
            </div>
        </div>
    </section>

    {{-- Additional Sections --}}
    <div id="additional_form_sections">
        @foreach ($cv->educations as $education)
            @include('cv_sections_components.educations.form.section', $education)
        @endforeach

        @foreach ($cv->experiences as $experience)
            @include('cv_sections_components.experiences.form.section', $experience)
        @endforeach

        @foreach ($cv->projects as $project)
            @include('cv_sections_components.projects.form.section', $project)
        @endforeach

        @foreach ($cv->languages as $language)
            @include('cv_sections_components.languages.form.section', $language)
        @endforeach

        @foreach ($cv->skills as $skill)
            @include('cv_sections_components.skills.form.section', $skill)
        @endforeach
    </div>


    <section id="other-sections">
        <h2 class="section-title">Other Sections</h2>

        <div class="add-section-buttons d-flex align-items-center gap-2">
            <button id="add-educations-button" type="button" class="add-section-button"
                {{ $cv->educations->count() > 0 ? 'disabled' : '' }}>
                <i class="fas fa-plus"></i>
                Educations
            </button>

            <button id="add-experiences-button" type="button" class="add-section-button"
                {{ $cv->experiences->count() > 0 ? 'disabled' : '' }}>
                <i class="fas fa-plus"></i>
                Experiences
            </button>

            <button id="add-projects-button" type="button" class="add-section-button"
                {{ $cv->projects->count() > 0 ? 'disabled' : '' }}>
                <i class="fas fa-plus"></i>
                Projects
            </button>

            <button id="add-languages-button" type="button" class="add-section-button"
                {{ $cv->languages->count() > 0 ? 'disabled' : '' }}>
                <i class="fas fa-plus"></i>
                Languages
            </button>

            <button id="add-skills-button" type="button" class="add-section-button"
                {{ $cv->skills->count() > 0 ? 'disabled' : '' }}>
                <i class="fas fa-plus"></i>
                Skills
            </button>
        </div>
    </section>



    {{-- <section id="work-experience">
        <h2 class="section-title">Work Experience</h2>

        <button class="add-more" type="button">
            <i class="fas fa-plus"></i>
            Add More
        </button>
    </section>

    <section id="languages">
        <h2 class="section-title">Languages</h2>

        <button class="add-more" type="button">
            <i class="fas fa-plus"></i>
            Add More
        </button>
    </section>

    <section id="skills">
        <h2 class="section-title">Skills</h2>

        <button class="add-more" type="button">
            <i class="fas fa-plus"></i>
            Add More
        </button>
    </section> --}}
</form>
