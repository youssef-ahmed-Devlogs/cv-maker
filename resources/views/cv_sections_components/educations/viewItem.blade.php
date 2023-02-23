<div class="education_item">
    <h4 class="template_sec_info_title" id="template_university">
        {{ $education->university }}
    </h4>

    <div class="template_sec_info_details">
        <span class="template_sec_info_details_part template_sec_info_details_part_first">
            <span id="template_university_specialization">{{ $education->university_specialization }}</span> |
        </span>
        <span class="template_sec_info_details_part template_sec_info_details_part_second">
            <span class="start" id="template_university_start_date">{{ $education->university_start_date }}</span> -
            <span class="end" id="template_university_end_date">{{ $education->university_end_date }}</span>
        </span>
    </div>

    <p class="template_sec_text" id="template_university_description">
        {{ $education->university_description }}
    </p>
</div>
