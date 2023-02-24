<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function addSection(Request $request, Cv $cv)
    {
        $skillsCount = Skill::where('cv_id', $cv->id)->count();

        if ($skillsCount == 0) {
            $skill = Skill::create([
                'cv_id' => $cv->id,
            ]);

            return [
                'formSection' => view('cv_sections_components.skills.form.section', compact('skill'))->render(),
                'templateSection' => view('cv_sections_components.skills.view', compact('skill'))->render(),
            ];
        }

        return ['exists' => true];
    }

    public function removeSection(Request $request, Cv $cv)
    {
        foreach ($cv->skills as $skill) {
            $skill->delete();
        }

        return ['success' => true];
    }
}
