<div class="row mb-3" id="languages_inputs_item_{{ $language->id }}">
    <div class="col-xl-12">
        <div class="form-item">
            <label for="language_name">Languages</label>
            <textarea class="form-control language_input" name="language_name" id="language_name" cols="30" rows="5"
                data-id="{{ $language->id }}" placeholder="Languages">{{ $language->language_name }}</textarea>
        </div>
    </div>
</div>
