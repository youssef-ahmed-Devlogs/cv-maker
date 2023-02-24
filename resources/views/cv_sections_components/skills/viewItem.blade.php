<li class="template_sm_section_list_item_tags" id="template_skills_tags">

    @php
        $skills = $skill->skill_name != null ? explode(',', trim($skill->skill_name)) : [];
    @endphp

    @foreach ($skills as $skill_name)
        <span class="template_sm_section_list_item_tag">{{ $skill_name }}</span>
    @endforeach
</li>
