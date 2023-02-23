<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function addSection(Request $request, Cv $cv)
    {
        $educationsCount = Education::where('cv_id', $cv->id)->count();

        if ($educationsCount == 0) {
            $education = Education::create([
                'cv_id' => $cv->id,
            ]);

            return [
                'formSection' => view('cv_sections_components.educations.form.section', compact('education'))->render(),
                'templateSection' => view('cv_sections_components.educations.view', compact('education'))->render(),
            ];
        }

        return ['exists' => true];
    }

    public function removeSection(Request $request, Cv $cv)
    {
        foreach ($cv->educations as $education) {
            $education->delete();
        }

        return ['success' => true];
    }

    public function addItem()
    {
        return view('cv_sections_components.educations.form.item');
    }

    public function removeItem()
    {
    }
}
