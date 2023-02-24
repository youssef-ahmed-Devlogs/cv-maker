<div class="row mb-3" id="skills_inputs_item_{{ $skill->id }}">
    <div class="col-xl-12">
        <div class="form-item">
            <label for="skill_name">Skills</label>
            <textarea class="form-control skill_input" name="skill_name" id="skill_name" cols="30" rows="5"
                data-id="{{ $skill->id }}" placeholder="skills">{{ $skill->skill_name }}</textarea>
        </div>
    </div>
</div>
