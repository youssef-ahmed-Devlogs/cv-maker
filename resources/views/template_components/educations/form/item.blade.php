<div class="row" id="education_item_{{ $education->id }}">

    <span class="remove_education_item" data-id="{{ $education->id }}">
        <i class="fas fa-times"></i>
    </span>

    <div class="col-xl-6">
        <div class="form-item">
            <label for="university">University</label>
            <input type="text" class="form-control education_input" name="university" placeholder="University"
                data-id="{{ $education->id }}" value="{{ $education->university }}">
        </div>
    </div>

    <div class="col-xl-6">
        <div class="form-item">
            <label for="university_specialization">Specialization</label>
            <input type="text" class="form-control education_input" name="university_specialization"
                placeholder="university_specialization" data-id="{{ $education->id }}"
                value="{{ $education->university_specialization }}">
        </div>
    </div>

    <div class="col-xl-6">
        <div class="form-item">
            <label for="university_start_date">Start Date</label>
            <input type="date" class="form-control education_input" id="university_start_date"
                name="university_start_date" data-id="{{ $education->id }}"
                value="{{ $education->university_start_date }}">
        </div>
    </div>

    <div class="col-xl-6">
        <div class="form-item">
            <label for="university_end_date">End Date</label>
            <input type="date" class="form-control education_input" id="university_end_date"
                name="university_end_date" data-id="{{ $education->id }}" value="{{ $education->university_end_date }}">
        </div>
    </div>

    <div class="col-xl-12">
        <div class="form-item">
            <label for="university_description">Description</label>
            <textarea name="university_description" id="university_description" class="form-control education_input"
                placeholder="Description" cols="30" rows="5" data-id="{{ $education->id }}">{{ $education->university_description }}</textarea>
        </div>
    </div>
</div>
