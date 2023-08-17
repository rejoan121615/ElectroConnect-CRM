<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class AjaxApiController extends Controller
{
    // send json formate data for ajax 
    public function customers()
    {
        return response()->json(Customer::all());
    }
}
