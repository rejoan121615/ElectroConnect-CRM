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


    public function store(Request $request)
    {


        // Handle customer info
        $customerName = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        // Handle product info
        $productData = json_decode($request->input('products'));

        // Now you can loop through $productData and process each product
        foreach ($productData as $product) {
            $productId = $product->productId;
            $quantity = $product->quantity;
            $price = $product->price;

            // Perform necessary operations for each product
            // For example, store product details in the database
        }

        // Handle other parts of your form submission
        // ...

        // Return a response
        return response()->json($request->input('products'));
    }


}
