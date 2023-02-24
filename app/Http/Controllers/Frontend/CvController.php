<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Project;
use App\Models\Skill;
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

        if ($request->experience != null) {
            Experience::where('id', $request->experience['id'])->update($request->experience);
        }

        if ($request->project != null) {
            Project::where('id', $request->project['id'])->update($request->project);
        }

        if ($request->language != null) {
            Language::where('id', $request->language['id'])->update($request->language);
        }

        if ($request->skill != null) {
            Skill::where('id', $request->skill['id'])->update($request->skill);
        }

        $cvData = json_encode([
            'mainFormData' => $cv,
            'educations' => $cv->educations,
            'experiences' => $cv->experiences,
            'projects' => $cv->projects,
            'languages' => $cv->languages->count() > 0 ? explode(',', trim($cv->languages[0]->language_name)) : [],
            'skills' => $cv->skills->count() > 0 ? explode(',', trim($cv->skills[0]->skill_name)) : [],
        ], JSON_UNESCAPED_UNICODE);

        return json_decode($cvData, JSON_UNESCAPED_UNICODE);
    }

    public function download(Cv $cv)
    {
        $templateView = Blade::render($cv->template->template_code, ['cv' => $cv]);
        return view('frontend.pages.download', compact('cv', 'templateView'));
    }

    public function share(Cv $cv)
    {
        $templateView = Blade::render($cv->template->template_code, ['cv' => $cv]);
        return view('frontend.pages.share', compact('cv', 'templateView'));
    }

    public function destroy(Cv $cv)
    {
        $cv->delete();
        toastr()->success('Cv has been deleted');
        return redirect()->back();
    }
}
