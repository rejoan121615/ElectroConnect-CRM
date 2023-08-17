<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class AjaxApiController extends Controller
{
    // return customer list 
    public function customers()
    {
        return response()->json(Customer::all());
    }

    // return product list 
    public function products () {
        return response()->json(Product::all(), 200);
    }


}
