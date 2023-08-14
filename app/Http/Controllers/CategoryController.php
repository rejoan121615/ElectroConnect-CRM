<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.category.index')->with([
            'pageTitle' => "Category Page",
            "categories" => Category::all(), 'route' => route('category.store')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.category.index')->with(['pageTitle' => "Category Page", "categories" => Category::all(), "route" => 'category.store']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $formData = $request->all();

        // save data 
        Category::create($formData);

        // redirect to page 
        return redirect()->route('category.index')->with(['msg' => 'New category created', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // dd($category);
        return view('pages.category.index')->with([
            'route' => route('category.update', $category->id),
            'categories' => Category::all(),
            'formType' => 'patch',
            'formValue' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        try {
            $formData = $request->all();
            // dd($formData); 

            $category->update($formData);

            return redirect()->route('category.index')->with(['msg' => 'Category updated successfully', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with(['msg' => 'Category updated failed', 'type' => 'fail']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with(['msg' => 'Category deleted successfully', 'type' => 'success']);
    }
}
