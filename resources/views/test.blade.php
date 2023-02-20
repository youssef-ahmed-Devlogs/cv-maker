<style>
    .template_header {
        background-color: var(--template-primary-color);
        padding-top: var(--template-padding-y);
        padding-bottom: var(--template-padding-x);
        padding-left: var(--template-padding-x);
        padding-right: var(--template-padding-x);
        position: relative;
    }

    .template_person {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .template_person_img,
    .template_person_img img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
    }

    .template_person_name_title {
        display: flex;
        flex-direction: column;
    }

    .template_person_name {
        font-size: calc(var(--template-primary-fontsize) - 15px);
        font-weight: bold;
        color: var(--template-white-color);
    }

    .template_person_title {
        font-size: calc(var(--template-primary-fontsize) - 30px);
        color: var(--template-gray-color);
    }

    .template_header_contact {
        background-color: var(--template-gray-color);
        color: var(--template-second-color);
        padding: 10px 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 60%;
        position: absolute;
        right: 0px;
        bottom: -20px;
        border-color: var(--template-white-color);
        border-top-style: solid;
        border-left-style: solid;
        border-top-width: 3px;
        border-left-width: 3px;
    }

    .template_header_email {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: calc(var(--template-primary-fontsize) - 35px);
    }

    .template_header_phone {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: calc(var(--template-primary-fontsize) - 35px);
    }

    .template-body {
        display: flex;
        gap: 25px;
        padding-left: var(--template-padding-x);
        padding-right: var(--template-padding-x);
        margin-top: 40px;
    }

    .template_left_area {
        width: 70%;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .template_section {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .template_sec_title {
        font-weight: bold;
        font-size: calc(var(--template-primary-fontsize) - 25px);
        color: var(--template-second-color);
        position: relative;
    }

    .template_sec_title.underline {
        border-bottom: 2px solid var(--template-primary-color);
    }

    .template_sec_title.bullet {
        padding-left: 22px;
    }

    .template_sec_title.bullet::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        background-color: var(--template-gray-color);
        width: 13px;
        height: 13px;
        display: block;
    }

    .template_sec_title.bullet-radius::before {
        border-radius: 50%;
    }

    .template_sec_text {
        font-size: calc(var(--template-primary-fontsize) - 36px);
        color: var(--template-second-color);
    }

    .template_sec_info {
        display: flex;
        flex-direction: column;
    }

    .template_sec_info_title {
        font-size: calc(var(--template-primary-fontsize) - 36px);
        color: var(--template-second-color);
        font-weight: bold;
    }

    .template_sec_info_details {
        padding: 0 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .template_sec_info_details_part {
        font-size: calc(var(--template-primary-fontsize) - 38px);
        color: var(--template-second-color);
    }

    .template_right_area {
        width: 30%;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .template_sm_section {
        display: flex;
        flex-direction: column;
    }

    .template_sm_section_title {
        font-size: calc(var(--template-primary-fontsize) - 34px);
        color: var(--template-second-color);
        font-weight: bold;
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .template_sm_section_text {
        font-size: calc(var(--template-primary-fontsize) - 36px);
        color: var(--template-second-color);
        line-height: 1.1;
    }

    .template_sm_section_list {
        display: flex;
        flex-direction: column;
    }

    .template_sm_section_list_item {
        display: flex;
        justify-content: space-between;
        line-height: 1.1;
    }

    .template_sm_section_list_item_key {
        font-weight: bold;
        font-size: calc(var(--template-primary-fontsize) - 36px);
        color: var(--template-second-color);
    }

    .template_sm_section_list_item_value {
        font-size: calc(var(--template-primary-fontsize) - 36px);
        color: var(--template-second-color);
    }

    .template_rating_list {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .template_rating_list_item {
        display: flex;
        flex-direction: column;
    }

    .template_rating_list_item.bullet {
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .template_rating_list_item_text {
        font-size: calc(var(--template-primary-fontsize) - 36px);
        color: var(--template-second-color);
        margin-top: 4px;
        margin-bottom: 4px;
    }

    .template_rating_list_item_points {
        display: flex;
        gap: 5px;
    }

    .template_rating_list_item_points.bullet {
        gap: 10px;
    }

    .template_rating_list_item_point {
        display: block;
        width: calc(100% / 4);
        height: 5px;
        border-radius: 10px;
        background-color: var(--template-gray-color);
    }

    .template_rating_list_item_point.active {
        background-color: var(--template-primary-color);
    }

    .template_rating_list_item_point.bullet {
        width: 12px;
        height: 12px;
    }
</style>

<div class="template-view">
    <!-- Start Template Header -->
    <div class="template_header">
        <!-- Start Template Person -->
        <div class="template_person">
            <div class="template_person_img">
                <img class="icon" src="{{ auth()->user()->photo() }}" alt="" id="template_person_photo" />
            </div>
            <div class="template_person_name_title">
                <h2 class="template_person_name" id="template_person_name">
                    {{ $cv->name }}
                </h2>
                <p class="template_person_title" id="template_person_title">
                    {{ $cv->job_title }}
                </p>
            </div>
        </div>
        <!-- End Template Person -->

        <!-- Start Template Header Contact -->
        <div class="template_header_contact">
            <span class="template_header_email">
                <i class="fas fa-envelope"></i>
                <span id="template_person_email">{{ $cv->email }}</span>
            </span>
            <span class="template_header_phone">
                <i class="fas fa-phone"></i>
                <span id="template_person_phone">{{ $cv->phone }}</span>
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

                <p class="template_sec_text" id="template_about_me">
                    {{ $cv->about_me }}
                </p>
            </div>
            <!-- End Template Section -->
        </div>
        <!-- End Template Left Body -->

        <!-- Start Template Right Body -->
        <div class="template_right_area">
            <!-- Start Template Small Section -->
            <div class="template_sm_section">
                <h5 class="template_sm_section_title">Address</h5>
                <p class="template_sm_section_text" id="template_person_address">
                    {{ $cv->address }}
                </p>
            </div>
            <!-- End Template Small Section -->

            <!-- Start Template Small Section -->
            <div class="template_sm_section">
                <h5 class="template_sm_section_title">Birth Date</h5>
                <p class="template_sm_section_text" id="template_person_date_of_birth">
                    {{ $cv->date_of_birth }}
                </p>
            </div>
            <!-- End Template Small Section -->

            <!-- Start Template Small Section -->
            <div class="template_sm_section">
                <h5 class="template_sm_section_title">Country</h5>
                <p class="template_sm_section_text" id="template_person_country">
                    {{ $cv->country }}
                </p>
            </div>
            <!-- End Template Small Section -->

            <!-- Start Template Small Section -->
            <div class="template_sm_section" id="template_skills_section">
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

            <!-- Start Template Small Section -->
            <div class="template_sm_section" id="template_languages_section">
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
            <!-- End Template Small Section -->
        </div>
        <!-- End Template Right Body -->
    </div>
    <!-- End Template Body -->
</div>
