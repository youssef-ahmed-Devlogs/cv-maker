<form id="cvForm">
    <section id="main-information">
        <h2 class="section-title">Main Information</h2>

        <div class="row">
            <div class="col-xl-12">
                <div class="form-uploader-item">
                    <label for="photo" class="form-uploader-label" title="Upload Photo">
                        <div class="content">
                            <span>Upload Photo</span>
                            <i class="fas fa-plus icon"></i>
                        </div>
                    </label>
                    <input type="file" class="form-uploader onFileUploadEvent" id="photo" name="photo" />
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-item">
                    <label for="name">Name</label>
                    <input type="text" class="form-control onKeyUpEvent" name="name" placeholder="Name" />
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-item">
                    <label for="title">Your Title</label>
                    <input type="text" class="form-control onKeyUpEvent" name="title" placeholder="Title" />
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-item">
                    <label for="email">Email</label>
                    <input type="email" class="form-control onKeyUpEvent" name="email" placeholder="Email" />
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-item">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control onKeyUpEvent" name="phone" placeholder="Phone" />
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-item">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" class="form-control onChangeEvent" id="date_of_birth" name="date_of_birth" />
                </div>
            </div>

            <div class="col-xl-6">
                <div class="form-item">
                    <label for="nationality">Nationality</label>
                    <select name="nationality" class="form-control onChangeEvent">
                        <option value="" disabled selected>Nationality</option>
                        <option value="Egyptian">Egyptian</option>
                        <option value="united status">US</option>
                    </select>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="form-item">
                    <label for="dateOfBirth">Address</label>
                    <input type="text" class="form-control onKeyUpEvent" name="address" placeholder="Address" />
                </div>
            </div>

            <div class="col-xl-12">
                <div class="form-item">
                    <label for="dateOfBirth">About Me</label>
                    <textarea name="about_me" id="about_me" class="form-control onKeyUpEvent" placeholder="Description about you"
                        cols="30" rows="5"></textarea>
                </div>
            </div>
        </div>
    </section>

    <div id="additional-sections">
        {{-- <section id="education">
            <h2 class="section-title">Education</h2>

            <button class="add-more" type="button">
                <i class="fas fa-plus"></i>
                Add More
            </button>
        </section> --}}
    </div>


    <section id="other-sections">
        <h2 class="section-title">Other Sections</h2>

        <div class="add-section-buttons d-flex align-items-center gap-2">
            <button id="add-education-button" type="button" class="add-section-button" data-section_name="Education">
                <i class="fas fa-plus"></i>
                Education
            </button>

            <button id="add-experience-button" type="button" class="add-section-button" data-section_name="Experience">
                <i class="fas fa-plus"></i>
                Experience
            </button>

            <button id="add-projects-button" type="button" class="add-section-button" data-section_name="Projects">
                <i class="fas fa-plus"></i>
                Projects
            </button>

            <button id="add-languages-button" type="button" class="add-section-button" data-section_name="Languages">
                <i class="fas fa-plus"></i>
                Languages
            </button>

            <button id="add-skills-button" type="button" class="add-section-button" data-section_name="Skills">
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
