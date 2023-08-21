<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.supplier.index', ['suppliers' => Supplier::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        Supplier::create($request->all());
        return redirect()->route('supplier.index')->with('msg', "New supplier created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return view('pages.supplier.show', ['supplier' => $supplier]);        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('pages.supplier.edit',['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        // update data 
        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with(['msg' => 'Supplier updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('supplier.index')->with(['msg' => 'Supplier Deleted', 'alert' => 'fail']); 
    }
}
