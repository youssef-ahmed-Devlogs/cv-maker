<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function addSection(Request $request, Cv $cv)
    {
        $languagesCount = Language::where('cv_id', $cv->id)->count();

        if ($languagesCount == 0) {
            $language = Language::create([
                'cv_id' => $cv->id,
            ]);

            return [
                'formSection' => view('cv_sections_components.languages.form.section', compact('language'))->render(),
                'templateSection' => view('cv_sections_components.languages.view', compact('language'))->render(),
            ];
        }

        return ['exists' => true];
    }

    public function removeSection(Request $request, Cv $cv)
    {
        foreach ($cv->languages as $language) {
            $language->delete();
        }

        return ['success' => true];
    }
}
