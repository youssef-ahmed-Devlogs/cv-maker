@extends('frontend.layout.app')


@section('styles')
    <link rel="stylesheet" href="{{ asset('cv_templates/template.css') }}">
    <link rel="stylesheet" href="{{ asset('cv_templates/template_1/style.css') }}">
@endsection

@section('content')
    <div class="download-page">
        <div class="container">
            <div class="actions">
                <button id="download-button" class="btn btn-xl btn-primary">
                    Download
                </button>
                <select id="download-options" class="form-control">
                    <option value="png">PNG</option>
                    <option value="jpeg">JPG</option>
                    <option value="pdf">PDF</option>
                </select>
            </div>

            <div class="template-view">
                <!-- Start Template Header -->
                <div class="template_header">
                    <!-- Start Template Person -->
                    <div class="template_person">
                        <div class="template_person_img">
                            <img class="icon" src="{{ auth()->user()->photo() }}" alt="" />
                        </div>
                        <div class="template_person_name_title">
                            <h2 class="template_name">Youssef Ahmed</h2>
                            <p class="template_person_title">Web Developer</p>
                        </div>
                    </div>
                    <!-- End Template Person -->

                    <!-- Start Template Header Contact -->
                    <div class="template_header_contact">
                        <span class="template_header_email">
                            <i class="fas fa-envelope"></i>
                            youssef@gmail.com
                        </span>
                        <span class="template_header_phone">
                            <i class="fas fa-phone"></i>
                            01154214028
                        </span>
                    </div>
                    <!-- End Template Header Contact -->
                </div>
                <!-- End Template Header -->

                <!-- Start Template Body -->
                <div class="template-body">
                    <!-- Start Template Left Body -->
                    <div class="template_left_area">
                        <!-- Start Template Section -->
                        <div class="template_section">
                            <h2 class="template_sec_title">About Me</h2>

                            <p class="template_sec_text">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic,
                                nemo nostrum? Suscipit minima sequi accusantium atque, culpa
                                sunt eum incidunt aut omnis vel ipsum maiores debitis eveniet
                                aliquam, eius
                            </p>
                        </div>
                        <!-- End Template Section -->

                        <!-- Start Template Section -->
                        <div class="template_section">
                            <h2 class="template_sec_title">Education</h2>

                            <!-- Start Template Section Info -->
                            <div class="template_sec_info">
                                <h4 class="template_sec_info_title">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                </h4>

                                <div class="template_sec_info_details">
                                    <span class="template_sec_info_details_part">Information System |
                                    </span>
                                    <span class="template_sec_info_details_part">10/2018 - 12/2022</span>
                                </div>

                                <p class="template_sec_text">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Hic, nemo nostrum? Suscipit minima sequi accusantium atque,
                                    culpa sunt eum incidunt aut omnis vel ipsum maiores debitis
                                    eveniet aliquam, eius
                                </p>
                            </div>
                            <!-- End Template Section Info -->
                        </div>
                        <!-- End Template Section -->

                        <!-- Start Template Section -->
                        <div class="template_section">
                            <h2 class="template_sec_title">Experience</h2>

                            <!-- Start Template Section Info -->
                            <div class="template_sec_info">
                                <h4 class="template_sec_info_title">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                </h4>

                                <div class="template_sec_info_details">
                                    <span class="template_sec_info_details_part">Web Developer |
                                    </span>
                                    <span class="template_sec_info_details_part">10/2018 - 12/2022</span>
                                </div>

                                <p class="template_sec_text">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Hic, nemo nostrum? Suscipit minima sequi accusantium atque,
                                    culpa sunt eum incidunt aut omnis vel ipsum maiores debitis
                                    eveniet aliquam, eius
                                </p>
                            </div>
                            <!-- End Template Section Info -->

                            <div class="template_sec_info">
                                <h4 class="template_sec_info_title">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                </h4>
                                <div class="template_sec_info_details">
                                    <span class="template_sec_info_details_part">Backend |
                                    </span>
                                    <span class="template_sec_info_details_part">10/2018 - 12/2022</span>
                                </div>

                                <p class="template_sec_text">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Hic, nemo nostrum? Suscipit minima sequi accusantium atque,
                                    culpa sunt eum incidunt aut omnis vel ipsum maiores debitis
                                    eveniet aliquam, eius
                                </p>
                            </div>
                        </div>
                        <!-- End Template Section -->

                        <!-- Start Template Section -->
                        <div class="template_section">
                            <h2 class="template_sec_title">Projects</h2>

                            <!-- Start Template Section Info -->
                            <div class="template_sec_info">
                                <h4 class="template_sec_info_title">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                </h4>

                                <div class="template_sec_info_details">
                                    <span class="template_sec_info_details_part">Cv Maker |
                                    </span>
                                    <span class="template_sec_info_details_part">10/2018 - 12/2022</span>
                                </div>

                                <p class="template_sec_text">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Hic, nemo nostrum? Suscipit minima sequi accusantium atque,
                                    culpa sunt eum incidunt aut omnis vel ipsum maiores debitis
                                    eveniet aliquam, eius
                                </p>
                            </div>
                            <!-- End Template Section Info -->

                            <div class="template_sec_info">
                                <h4 class="template_sec_info_title">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                </h4>
                                <div class="template_sec_info_details">
                                    <span class="template_sec_info_details_part">E-commerce |
                                    </span>
                                    <span class="template_sec_info_details_part">10/2018 - 12/2022</span>
                                </div>

                                <p class="template_sec_text">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Hic, nemo nostrum? Suscipit minima sequi accusantium atque,
                                    culpa sunt eum incidunt aut omnis vel ipsum maiores debitis
                                    eveniet aliquam, eius
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
                            <h5 class="template_sm_section_title">Address</h5>
                            <p class="template_sm_section_text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Ducimus, quaerat.
                            </p>
                        </div>
                        <!-- End Template Small Section -->

                        <!-- Start Template Small Section -->
                        <div class="template_sm_section">
                            <h5 class="template_sm_section_title">Birth Date</h5>
                            <p class="template_sm_section_text">11/04/2000</p>
                            <p class="template_sm_section_text">Egypt</p>
                        </div>
                        <!-- End Template Small Section -->

                        <!-- Start Template Small Section -->
                        <div class="template_sm_section">
                            <h5 class="template_sm_section_title">Nationality</h5>
                            <p class="template_sm_section_text">Egyptian</p>
                        </div>
                        <!-- End Template Small Section -->

                        <!-- Start Template Small Section -->
                        <div class="template_sm_section">
                            <h5 class="template_sm_section_title">Languages</h5>

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
                            <h5 class="template_sm_section_title">Skills</h5>

                            <!-- Start Template Rating List -->
                            <ul class="template_rating_list">
                                <li class="template_rating_list_item">
                                    <span class="template_rating_list_item_text">Laravel</span>

                                    <div class="template_rating_list_item_points">
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point"></span>
                                    </div>
                                </li>

                                <li class="template_rating_list_item">
                                    <span class="template_rating_list_item_text">Javascript</span>

                                    <div class="template_rating_list_item_points">
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point active"></span>
                                    </div>
                                </li>

                                <li class="template_rating_list_item">
                                    <span class="template_rating_list_item_text">Node Js</span>

                                    <div class="template_rating_list_item_points">
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point"></span>
                                        <span class="template_rating_list_item_point"></span>
                                    </div>
                                </li>

                                <li class="template_rating_list_item">
                                    <span class="template_rating_list_item_text">React Js</span>

                                    <div class="template_rating_list_item_points">
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point"></span>
                                    </div>
                                </li>

                                <li class="template_rating_list_item">
                                    <span class="template_rating_list_item_text">Photoshop</span>

                                    <div class="template_rating_list_item_points">
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point active"></span>
                                        <span class="template_rating_list_item_point"></span>
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
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('frontend/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('frontend/js/html2pdf.bundle.min.js') }}"></script>
@endsection
