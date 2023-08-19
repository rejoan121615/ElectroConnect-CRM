<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\Customer;
use App\Models\Product;
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

        // dd($StoreSales->all());

        $userId = null;

        if (is_numeric($StoreSales->input('name')) && $StoreSales->input('name') >= 1) {
            // Handle numeric input within the range 1-1000
            $userId = $StoreSales->input('name');
        } else {
            // new name so generate customer 
            $userData = [
                'name' => $StoreSales->input('name'),
                'email' => $StoreSales->input('email'),
                'phone' => $StoreSales->input('phone'),
                'address' => $StoreSales->input('address')
            ];
            $newUser = Customer::create($userData);
            $userId = $newUser->id;
        }

        // array:10 [▼ // app\Http\Controllers\SalesController.php:40
        //     "_token" => "KcWUwlkCNxBCXBFJF8CwZL44emJNfhdWzmqzAmSn"
        //     "name" => "2"
        //     "email" => "jaiden87@yahoo.com"
        //     "phone" => "(551) 297-6344"
        //     "address" => "5652 Casimer FreewayArjunshire, SD 17601"
        //     "payment_method" => "1"
        //     "trx_id" => null
        //     "comment" => null
        //     "products" => array:3 [▶]
        //     "total_amount" => "1326658"
        //     ]


        // store in sales 
        $saleList = Sales::create([
            "customer_id" => $userId,
            "paid_amount" => $StoreSales->input('total_amount'),
            "payment_method" => $StoreSales->input('payment_method'),
            "trx_id" => $StoreSales->input('trx_id'),
            "discount" => null,
            "comment" => $StoreSales->input('comment')
        ]);

        // dd($saleList);
        // dd($StoreSales->input('name'));
        // dd($StoreSales->all());

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
    public function edit(Sales $sales)
    {
        //
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
    public function destroy(Sales $sales)
    {
        //
    }
}
