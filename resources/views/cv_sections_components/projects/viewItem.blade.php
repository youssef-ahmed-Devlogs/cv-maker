<div class="project_item">
    <h4 class="template_sec_info_title" id="template_project_title">
        {{ $project->project_title }}
    </h4>

    <div class="template_sec_info_details">
        <span class="template_sec_info_details_part template_sec_info_details_part_first">
            <span id="template_project_name">{{ $project->project_name }}</span> |
        </span>
        <span class="template_sec_info_details_part template_sec_info_details_part_second">
            <span class="start" id="template_project_start_date">{{ $project->project_start_date }}</span> -
            <span class="end" id="template_project_end_date">{{ $project->project_end_date }}</span>
        </span>
    </div>

    <p class="template_sec_text" id="template_project_description">
        {{ $project->project_description }}
    </p>
</div>
