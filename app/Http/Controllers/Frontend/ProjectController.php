<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function addSection(Request $request, Cv $cv)
    {
        $projectsCount = Project::where('cv_id', $cv->id)->count();

        if ($projectsCount == 0) {
            $project = Project::create([
                'cv_id' => $cv->id,
            ]);

            return [
                'formSection' => view('cv_sections_components.projects.form.section', compact('project'))->render(),
                'templateSection' => view('cv_sections_components.projects.view', compact('project'))->render(),
            ];
        }

        return ['exists' => true];
    }

    public function removeSection(Request $request, Cv $cv)
    {
        foreach ($cv->projects as $project) {
            $project->delete();
        }

        return ['success' => true];
    }
}
