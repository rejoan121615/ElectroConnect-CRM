<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\Customer;
use App\Models\Product;
use App\Models\SaleDetails;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.sales.index')->with('sales', Sales::with(['customer', 'sale_details'])->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sales.create')->with(['customers' => Customer::all()]);
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalesRequest $StoreSales)
    {

        // check if user exists or create a new one 
        $userId = null;

        if (is_numeric($StoreSales->input('name')) && $StoreSales->input('name') >= 1) {
            $userId = $StoreSales->input('name');
        } else {
            $userData = [
                'name' => $StoreSales->input('name'),
                'email' => $StoreSales->input('email'),
                'phone' => $StoreSales->input('phone'),
                'address' => $StoreSales->input('address')
            ];
            $newUser = Customer::create($userData);
            $userId = $newUser->id;
        }


        // store in sales 
        $newSales = Sales::create([
            "customer_id" => $userId,
            "paid_amount" => $StoreSales->input('total_amount'),
            "payment_method" => $StoreSales->input('payment_method'),
            "trx_id" => $StoreSales->input('trx_id'),
            "discount" => null,
            "comment" => $StoreSales->input('comment')
        ]);
        

        // create all saledetails record
        foreach ($StoreSales->input('products') as $product) {
            list($productId, $productQuantity) = explode('|', $product);

            // get all the product based on id 
            $grabbedProduct = Product::find($productId);
            // create new record 
            SaleDetails::create([
                'sales_id' => $newSales->id,
                'product_id' => $productId,
                'quantity' => $productQuantity,
                'price' => $grabbedProduct->price,
                'cost_price' => $grabbedProduct->cost_price
            ]);
        }


        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sale)
    {

        // find customer 
        // $customer = $sale->customer->getAttributes();
        // dd($customer);
        // dd($sale->sale_details()->get());
        return view('pages.sales.edit', ['sale' => $sale]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalesRequest $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sale)
    {
        // dd($sale->getAttributes());
        $sale->delete();

        return redirect()->route('sales.index')->with(['msg' => 'Deleted successfully', 'alert' => 'alert-danger']);
    }
}
