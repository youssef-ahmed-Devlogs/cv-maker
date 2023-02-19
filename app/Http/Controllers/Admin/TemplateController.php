<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'cover' => ['required', 'image'],
            'template_code' => ['required', 'min:10'],
            'category_id' => ['required'],
            'is_free' => ['required'],
        ]);

        $template = $request->all();
        $template['cover'] = $request->cover->store('templates', 'public');
        $template['created_by'] = auth()->id();

        Template::create($template);

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
        $categories = Category::all();
        return view('admin.pages.templates.edit', compact('categories', 'template'));
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
        $request->validate([
            'cover' => ['nullable', 'image'],
            'template_code' => ['required', 'min:10'],
            'category_id' => ['required'],
            'is_free' => ['required'],
        ]);

        $updatedTemplate = $request->all();

        if ($request->hasFile('cover'))
            $updatedTemplate['cover'] = $request->cover->store('templates', 'public');

        $template->update($updatedTemplate);

        toastr()->success('Template created successfully');
        return back();
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
