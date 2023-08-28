<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\SaleDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalCustomer = Customer::all()->count();
        $totalQuantity = SaleDetails::sum('quantity');
        $totalSells = Customer::join('sales', 'customers.id', '=', 'sales.customer_id')
            ->join('sale_details', 'sales.id', '=', 'sale_details.sales_id')
            ->sum(DB::raw('(sale_details.price)'));
        $totalProfit = Customer::join('sales', 'customers.id', '=', 'sales.customer_id')
            ->join('sale_details', 'sales.id', '=', 'sale_details.sales_id')
            ->sum(DB::raw('(sale_details.price - sale_details.cost_price)'));

        // generate date 
        $currentDate = Carbon::now();
        $formattedDates = [];
        for ($i = 0; $i < 7; $i++) {
            // Calculate the date by subtracting $i days from the current date
            $date = $currentDate->subDays($i);
        
            // Format the date as "m/d/Y T" (e.g., "01/01/2011 GMT")
            $formattedDate = $date->format('m/d/Y T');
        
            // Add the formatted date to the array
            $formattedDates[] = $formattedDate;
        
            // Reset the date to the original current date for the next iteration
            $currentDate->addDays($i);
        }
        // dd($formattedDates);
        return view('pages.home', ['week' => $formattedDates, 
        'customer' => $totalCustomer,
         'profit' => $totalProfit, 'soldAmount' => $totalQuantity, 'totalSell' => $totalSells]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($fR)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($fR)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $fR)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($fR)
    {
        //
    }
}
