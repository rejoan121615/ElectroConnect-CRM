<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.sales.invoices', ['sales' => Sales::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // dd(Sales::find($id)->sale_details);
        return view('pages.invoice.show', ['sale' => Sales::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    /**
     * download invoice
     */

    public function download ($id) {
        // $sale = Sales::find($id);
        // dd($sale->getAttributes());
        // return view('invoice.invoice');
        // $pdf = Pdf::loadView('invoice.invoice');
        // return $pdf->download('invoice.pdf');
    }
}
