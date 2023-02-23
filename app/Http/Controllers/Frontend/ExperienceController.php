<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function addSection(Request $request, Cv $cv)
    {
        $experiencesCount = Experience::where('cv_id', $cv->id)->count();

        if ($experiencesCount == 0) {
            $experience = Experience::create([
                'cv_id' => $cv->id,
            ]);

            return [
                'formSection' => view('cv_sections_components.experiences.form.section', compact('experience'))->render(),
                'templateSection' => view('cv_sections_components.experiences.view', compact('experience'))->render(),
            ];
        }

        return ['exists' => true];
    }

    public function removeSection(Request $request, Cv $cv)
    {
        foreach ($cv->experiences as $experience) {
            $experience->delete();
        }

        return ['success' => true];
    }
}
