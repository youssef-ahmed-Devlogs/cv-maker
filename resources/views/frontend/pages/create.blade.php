@extends('frontend.layout.app')

@section('content')
    <div class="create-cv-page">
        <div class="cv-form">
            <form>
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
                                <input type="file" class="form-uploader" id="photo" name="photo" />
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-item">
                                <label for="dateOfBirth">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" />
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-item">
                                <label for="dateOfBirth">Your Role</label>
                                <input type="text" class="form-control" name="role" placeholder="Role" />
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-item">
                                <label for="dateOfBirth">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" />
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-item">
                                <label for="dateOfBirth">Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Phone" />
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-item">
                                <label for="dateOfBirth">Date of Birth</label>
                                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" />
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-item">
                                <label for="dateOfBirth">Country</label>
                                <select name="country" class="form-control">
                                    <option value="" disabled selected>Country</option>
                                    <option value="egypt">Egypt</option>
                                    <option value="1">US</option>
                                    <option value="2">asdasd</option>
                                    <option value="3">sadasd</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="form-item">
                                <label for="dateOfBirth">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" />
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="form-item">
                                <label for="dateOfBirth">About Me</label>
                                <textarea name="aboutMe" id="aboutMe" class="form-control" placeholder="Description about you" cols="30"
                                    rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="education">
                    <h2 class="section-title">Education</h2>

                    <button class="add-more" type="button">
                        <i class="fas fa-plus"></i>
                        Add More
                    </button>
                </section>

                <section id="work-experience">
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
                </section>
            </form>
        </div>
        <div class="cv-preview">
            <div id="template">Template</div>
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
