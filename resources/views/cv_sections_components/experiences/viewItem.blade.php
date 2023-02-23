<div class="experience_item">
    <h4 class="template_sec_info_title" id="template_company">
        {{ $experience->company }}
    </h4>

    <div class="template_sec_info_details">
        <span class="template_sec_info_details_part template_sec_info_details_part_first">
            <span id="template_company_job_title">{{ $experience->company_job_title }}</span> |
        </span>
        <span class="template_sec_info_details_part template_sec_info_details_part_second">
            <span class="start" id="template_company_start_date">{{ $experience->company_start_date }}</span> -
            <span class="end" id="template_company_end_date">{{ $experience->company_end_date }}</span>
        </span>
    </div>

    <p class="template_sec_text" id="template_company_description">
        {{ $experience->company_description }}
    </p>
</div>
