<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;


// $template = Template::find(1);
// $templateView = Blade::render($template->template_code, ['name' => 'Fatma']);
// return view('admin.pages.templates.index', compact('templateView'));

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::all();
        return view('admin.pages.templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.templates.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => ['required', 'min:3'],
            'name_ar' => ['required', 'min:3'],
            'cover' => ['required', 'image'],
            'template_code' => ['required', 'min:10'],
            'category_id' => ['required'],
            'is_free' => ['required'],
        ]);

        $template = $request->all();
        $template['cover'] = $request->cover->store('templates', 'public');

        Template::create([
            ...$template,
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ], JSON_UNESCAPED_UNICODE),
            'created_by' => auth()->id()
        ]);

        toastr()->success('Template created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        //
    }
}
