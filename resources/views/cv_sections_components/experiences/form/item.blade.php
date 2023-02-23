<div class="row" id="experience_item_{{ $experience->id }}">

    {{-- <span class="remove_experience_item" data-id="{{ $experience->id }}">
        <i class="fas fa-times"></i>
    </span> --}}

    <div class="col-xl-6">
        <div class="form-item">
            <label for="company">Company</label>
            <input type="text" class="form-control experience_input" name="company" placeholder="company"
                data-id="{{ $experience->id }}" value="{{ $experience->company }}">
        </div>
    </div>

    <div class="col-xl-6">
        <div class="form-item">
            <label for="company_job_title">Job Title</label>
            <input type="text" class="form-control experience_input" name="company_job_title" placeholder="Job Title"
                data-id="{{ $experience->id }}" value="{{ $experience->company_job_title }}">
        </div>
    </div>

    <div class="col-xl-6">
        <div class="form-item">
            <label for="company_start_date">Start Date</label>
            <input type="date" class="form-control experience_input" id="company_start_date"
                name="company_start_date" data-id="{{ $experience->id }}" value="{{ $experience->company_start_date }}">
        </div>
    </div>

    <div class="col-xl-6">
        <div class="form-item">
            <label for="company_end_date">End Date</label>
            <input type="date" class="form-control experience_input" id="company_end_date" name="company_end_date"
                data-id="{{ $experience->id }}" value="{{ $experience->company_end_date }}">
        </div>
    </div>

    <div class="col-xl-12">
        <div class="form-item">
            <label for="company_description">Description</label>
            <textarea name="company_description" id="company_description" class="form-control experience_input"
                placeholder="Description" cols="30" rows="5" data-id="{{ $experience->id }}">{{ $experience->company_description }}</textarea>
        </div>
    </div>
</div>
