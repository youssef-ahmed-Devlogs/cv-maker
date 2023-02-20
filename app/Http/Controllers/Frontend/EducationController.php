<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function addSection(Cv $cv)
    {
        if (request()->get('ajax')) {
            $educationsCount = Education::where('cv_id', $cv->id)->count();

            if ($educationsCount == 0) {
                $education = Education::create([
                    'cv_id' => $cv->id,
                ]);

                return [
                    'formSection' => view('template_components.educations.form.section', compact('education'))->render(),
                    'templateSection' => view('template_components.educations.view', compact('education'))->render(),
                ];
            }

            return ['exists' => true];
        }

        abort('404', 'Not Found');
    }

    public function addItem()
    {
        return view('template_components.educations.form.item');
    }

    public function removeSection()
    {
    }

    public function removeItem()
    {
    }
}
