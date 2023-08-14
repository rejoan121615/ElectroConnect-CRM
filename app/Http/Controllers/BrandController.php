<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.brand.index')->with([
            'pageTitle' => "Brand Page",
            "brands" => Brand::all(), 'route' => route('brand.store')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.brand.index')
        ->with(['pageTitle' => "Brand Page", "brands" => Brand::all(), "route" => 'brand.store']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $formData = $request->all();

        // save data 
        Brand::create($formData);

        // redirect to page 
        return redirect()->route('brand.index')->with(['msg' => 'New brand created', 'type' => 'success']);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('pages.brand.index')->with([
            'route' => route('brand.update', $brand->id),
            'brands' => Brand::all(),
            'formType' => 'patch',
            'formValue' => $brand,
            'btn' => 'Update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        try {
            $formData = $request->all();
            // dd($formData); 

            $brand->update($formData);

            return redirect()->route('brand.index')->with(['msg' => 'Brand updated successfully', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect()->route('brand.index')->with(['msg' => 'Brand updated failed', 'type' => 'fail']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index')->with(['msg' => 'Brand deleted successfully', 'type' => 'success']);
      //
    }
}
