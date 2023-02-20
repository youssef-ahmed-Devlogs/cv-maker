<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Models\Education;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class CvController extends Controller
{
    public function create(Template $template)
    {
        $cv = Cv::create([
            'user_id' => auth()->id(),
            'template_id' => $template->id,
        ]);

        return redirect()->route('frontend.cvs.edit', $cv);
    }

    public function edit(Cv $cv)
    {
        $templateView = Blade::render($cv->template->template_code, ['cv' => $cv]);
        return view('frontend.pages.create', compact('cv', 'templateView'));
    }

    public function update(Request $request, Cv $cv)
    {
        $mainFormData = $request->except(['education', 'experience', 'project', 'language', 'skill']);

        $cv->update($mainFormData);

        if ($request->education != null) {
            Education::where('id', $request->education['id'])->update($request->education);
        }

        $data = json_encode([
            'mainFormData' => $cv,
            'educations' => $cv->educations,
            'experiences' => [],
            'projects' => [],
            'languages' => [],
            'skills' => [],
        ], JSON_UNESCAPED_UNICODE);

        return json_decode($data, JSON_UNESCAPED_UNICODE);
    }
}
