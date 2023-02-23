<div class="row" id="project_item_{{ $project->id }}">

    {{-- <span class="remove_project_item" data-id="{{ $project->id }}">
        <i class="fas fa-times"></i>
    </span> --}}

    <div class="col-xl-6">
        <div class="form-item">
            <label for="project_title">Project Title</label>
            <input type="text" class="form-control project_input" name="project_title" placeholder="Project Title"
                data-id="{{ $project->id }}" value="{{ $project->project_title }}">
        </div>
    </div>

    <div class="col-xl-6">
        <div class="form-item">
            <label for="project_name">Project Name</label>
            <input type="text" class="form-control project_input" name="project_name" placeholder="Project Name"
                data-id="{{ $project->id }}" value="{{ $project->project_name }}">
        </div>
    </div>

    <div class="col-xl-6">
        <div class="form-item">
            <label for="project_start_date">Start Date</label>
            <input type="date" class="form-control project_input" id="project_start_date" name="project_start_date"
                data-id="{{ $project->id }}" value="{{ $project->project_start_date }}">
        </div>
    </div>

    <div class="col-xl-6">
        <div class="form-item">
            <label for="project_end_date">End Date</label>
            <input type="date" class="form-control project_input" id="project_end_date" name="project_end_date"
                data-id="{{ $project->id }}" value="{{ $project->project_end_date }}">
        </div>
    </div>

    <div class="col-xl-12">
        <div class="form-item">
            <label for="project_description">Description</label>
            <textarea name="project_description" id="project_description" class="form-control project_input"
                placeholder="Description" cols="30" rows="5" data-id="{{ $project->id }}">{{ $project->project_description }}</textarea>
        </div>
    </div>
</div>
