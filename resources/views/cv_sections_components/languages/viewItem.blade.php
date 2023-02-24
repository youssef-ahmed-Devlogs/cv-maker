<li class="template_sm_section_list_item_tags" id="template_languages_tags">

    @php
        $languages = $language->language_name != null ? explode(',', trim($language->language_name)) : [];
    @endphp

    @foreach ($languages as $language_name)
        <span class="template_sm_section_list_item_tag">{{ $language_name }}</span>
    @endforeach
</li>
