<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
// use carbon

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.product.index', [ 'pageTitle' => 'Products', 'products' => Product::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $formData = $request->all();
        
        // upload files 
        if ($request->has('image_url')) {
            $formData['image_url'] = $request->file('image_url')->store('products', 'public');
        }

        // create product 
        Product::create($formData);
        // dd($formData);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('pages.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Product $product)
    public function edit()
    {
        return view('pages.product.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
