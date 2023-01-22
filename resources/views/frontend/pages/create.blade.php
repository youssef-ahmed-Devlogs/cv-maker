@extends('frontend.layout.app')


@section('styles')
    <link rel="stylesheet" href="{{ asset('cv_templates/template.css') }}">
    <link rel="stylesheet" href="{{ asset('cv_templates/template_5/style.css') }}">
@endsection

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
            <div class="template-view">
                <!-- Start Template Header -->
                <div class="template_header">
                    <!-- Start Template Person -->
                    <div class="template_person">
                        <div class="template_person_img">
                            <img class="icon" src="{{ auth()->user()->photo() }}" alt="" />
                        </div>
                        <div class="template_person_name_title">
                            <h2 class="template_person_name template_text_dark">
                                Youssef Ahmed
                            </h2>
                            <p class="template_person_title template_text_dark">
                                Web Developer
                            </p>
                        </div>
                    </div>
                    <!-- End Template Person -->
                </div>
                <!-- End Template Header -->

                <!-- Start Template Body -->
                <div class="template-body">
                    <!-- Start Template Left Body -->
                    <div class="template_left_area">
                        <!-- Start Template Section -->
                        <div class="template_section">
                            <h2 class="template_sec_title bullet bullet-radius">About Me</h2>

                            <p class="template_sec_text">
                                Lorem ipsum dolor, sit amet consectetur
                                adipisicing elit. Hic, nemo nostrum?
                                Suscipit minima sequi accusantium atque,
                                culpa sunt eum incidunt aut omnis vel ipsum
                                maiores debitis eveniet aliquam, eius
                            </p>
                        </div>
                        <!-- End Template Section -->

                        <!-- Start Template Section -->
                        <div class="template_section">
                            <h2 class="template_sec_title bullet bullet-radius">Education</h2>

                            <!-- Start Template Section Info -->
                            <div class="template_sec_info">
                                <h4 class="template_sec_info_title">
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing
                                </h4>

                                <div class="template_sec_info_details">
                                    <span class="template_sec_info_details_part">Information System |
                                    </span>
                                    <span class="template_sec_info_details_part">10/2018 - 12/2022</span>
                                </div>

                                <p class="template_sec_text">
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing elit. Hic, nemo nostrum?
                                    Suscipit minima sequi accusantium atque,
                                    culpa sunt eum incidunt aut omnis vel
                                    ipsum maiores debitis eveniet aliquam,
                                    eius
                                </p>
                            </div>
                            <!-- End Template Section Info -->
                        </div>
                        <!-- End Template Section -->

                        <!-- Start Template Section -->
                        <div class="template_section">
                            <h2 class="template_sec_title bullet bullet-radius">Experience</h2>

                            <!-- Start Template Section Info -->
                            <div class="template_sec_info">
                                <h4 class="template_sec_info_title">
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing
                                </h4>

                                <div class="template_sec_info_details">
                                    <span class="template_sec_info_details_part">Web Developer |
                                    </span>
                                    <span class="template_sec_info_details_part">10/2018 - 12/2022</span>
                                </div>

                                <p class="template_sec_text">
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing elit. Hic, nemo nostrum?
                                    Suscipit minima sequi accusantium atque,
                                    culpa sunt eum incidunt aut omnis vel
                                    ipsum maiores debitis eveniet aliquam,
                                    eius
                                </p>
                            </div>
                            <!-- End Template Section Info -->

                            <div class="template_sec_info">
                                <h4 class="template_sec_info_title">
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing
                                </h4>
                                <div class="template_sec_info_details">
                                    <span class="template_sec_info_details_part">Backend |
                                    </span>
                                    <span class="template_sec_info_details_part">10/2018 - 12/2022</span>
                                </div>

                                <p class="template_sec_text">
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing elit. Hic, nemo nostrum?
                                    Suscipit minima sequi accusantium atque,
                                    culpa sunt eum incidunt aut omnis vel
                                    ipsum maiores debitis eveniet aliquam,
                                    eius
                                </p>
                            </div>
                        </div>
                        <!-- End Template Section -->

                        <!-- Start Template Section -->
                        <div class="template_section">
                            <h2 class="template_sec_title bullet bullet-radius">Projects</h2>

                            <!-- Start Template Section Info -->
                            <div class="template_sec_info">
                                <h4 class="template_sec_info_title">
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing
                                </h4>

                                <div class="template_sec_info_details">
                                    <span class="template_sec_info_details_part">Cv Maker |
                                    </span>
                                    <span class="template_sec_info_details_part">10/2018 - 12/2022</span>
                                </div>

                                <p class="template_sec_text">
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing elit. Hic, nemo nostrum?
                                    Suscipit minima sequi accusantium atque,
                                    culpa sunt eum incidunt aut omnis vel
                                    ipsum maiores debitis eveniet aliquam,
                                    eius
                                </p>
                            </div>
                            <!-- End Template Section Info -->

                            <div class="template_sec_info">
                                <h4 class="template_sec_info_title">
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing
                                </h4>
                                <div class="template_sec_info_details">
                                    <span class="template_sec_info_details_part">E-commerce |
                                    </span>
                                    <span class="template_sec_info_details_part">10/2018 - 12/2022</span>
                                </div>

                                <p class="template_sec_text">
                                    Lorem ipsum dolor, sit amet consectetur
                                    adipisicing elit. Hic, nemo nostrum?
                                    Suscipit minima sequi accusantium atque,
                                    culpa sunt eum incidunt aut omnis vel
                                    ipsum maiores debitis eveniet aliquam,
                                    eius
                                </p>
                            </div>
                        </div>
                        <!-- End Template Section -->
                    </div>
                    <!-- End Template Left Body -->

                    <!-- Start Template Right Body -->
                    <div class="template_right_area">
                        <!-- Start Template Small Section -->
                        <div class="template_sm_section">
                            <h5 class="template_sm_section_title">Email</h5>
                            <p class="template_sm_section_text">
                                youssef@gmail.com
                            </p>
                        </div>
                        <!-- End Template Small Section -->

                        <!-- Start Template Small Section -->
                        <div class="template_sm_section">
                            <h5 class="template_sm_section_title">Phone</h5>
                            <p class="template_sm_section_text">
                                01154214028
                            </p>
                        </div>
                        <!-- End Template Small Section -->

                        <!-- Start Template Small Section -->
                        <div class="template_sm_section">
                            <h5 class="template_sm_section_title">
                                Address
                            </h5>
                            <p class="template_sm_section_text">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Ducimus, quaerat.
                            </p>
                        </div>
                        <!-- End Template Small Section -->

                        <!-- Start Template Small Section -->
                        <div class="template_sm_section">
                            <h5 class="template_sm_section_title">
                                Birth Date
                            </h5>
                            <p class="template_sm_section_text">
                                11/04/2000
                            </p>
                            <p class="template_sm_section_text">Egypt</p>
                        </div>
                        <!-- End Template Small Section -->

                        <!-- Start Template Small Section -->
                        <div class="template_sm_section">
                            <h5 class="template_sm_section_title">
                                Nationality
                            </h5>
                            <p class="template_sm_section_text">Egyptian</p>
                        </div>
                        <!-- End Template Small Section -->

                        <!-- Start Template Small Section -->
                        <div class="template_sm_section">
                            <h5 class="template_sm_section_title">
                                Languages
                            </h5>

                            <!-- Start Template Small Section List -->
                            <ul class="template_sm_section_list">
                                <li class="template_sm_section_list_item">
                                    <span class="template_sm_section_list_item_key">Arabic</span>
                                    <span class="template_sm_section_list_item_value">Native</span>
                                </li>

                                <li class="template_sm_section_list_item">
                                    <span class="template_sm_section_list_item_key">English</span>
                                    <span class="template_sm_section_list_item_value">chat</span>
                                </li>

                                <li class="template_sm_section_list_item">
                                    <span class="template_sm_section_list_item_key">Key</span>
                                    <span class="template_sm_section_list_item_value">value</span>
                                </li>
                            </ul>
                            <!-- End Template Small Section List -->
                        </div>

                        <!-- Start Template Small Section -->
                        <div class="template_sm_section">
                            <h5 class="template_sm_section_title">
                                Skills
                            </h5>

                            <!-- Start Template Rating List -->
                            <ul class="template_rating_list">
                                <li class="template_rating_list_item bullet">
                                    <span class="template_rating_list_item_text">Laravel</span>

                                    <div class="template_rating_list_item_points bullet">
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet "></span>
                                    </div>
                                </li>

                                <li class="template_rating_list_item bullet">
                                    <span class="template_rating_list_item_text">Javascript</span>

                                    <div class="template_rating_list_item_points bullet">
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                    </div>
                                </li>

                                <li class="template_rating_list_item bullet">
                                    <span class="template_rating_list_item_text">Node Js</span>

                                    <div class="template_rating_list_item_points bullet">
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet "></span>
                                        <span class="template_rating_list_item_point bullet "></span>
                                    </div>
                                </li>

                                <li class="template_rating_list_item bullet">
                                    <span class="template_rating_list_item_text">React Js</span>

                                    <div class="template_rating_list_item_points bullet">
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet "></span>
                                    </div>
                                </li>

                                <li class="template_rating_list_item bullet">
                                    <span class="template_rating_list_item_text">Photoshop</span>

                                    <div class="template_rating_list_item_points bullet">
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet  active"></span>
                                        <span class="template_rating_list_item_point bullet "></span>
                                    </div>
                                </li>
                            </ul>
                            <!-- End Template Rating List -->
                        </div>
                        <!-- End Template Small Section -->
                        <!-- End Template Small Section -->
                    </div>
                    <!-- End Template Right Body -->
                </div>
                <!-- End Template Body -->
            </div>


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
