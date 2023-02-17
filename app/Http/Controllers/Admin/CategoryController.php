<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create');
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
            'title_en' => ['required', 'min:2'],
            'title_ar' => ['required', 'min:2'],
        ]);

        Category::create([
            'title' =>  json_encode([
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ], JSON_UNESCAPED_UNICODE),
            'slug' => makeSlug($request->title_en),
            'created_by' => auth()->id(),
        ]);

        toastr()->success($request->title_en . ' category created successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.pages.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title_en' => ['required', 'min:2'],
            'title_ar' => ['required', 'min:2'],
        ]);

        $category->update([
            'title' =>  json_encode([
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ], JSON_UNESCAPED_UNICODE),
            'slug' => makeSlug($request->title_en),
        ]);

        toastr()->success($request->title_en . ' category updated successfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        toastr()->success($category->title_en . ' category deleted successfully.');
        return redirect()->back();
    }
}
