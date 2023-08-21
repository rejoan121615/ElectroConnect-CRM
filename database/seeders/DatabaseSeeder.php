<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\CustomerTransection;
use App\Models\PurchasedProduct;
use App\Models\SaleDetails;
use App\Models\Sales;
use App\Models\Supplier;
use App\Models\Task;
use App\Models\Tasks;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Product::factory(50)->create();
        Category::factory(50)->create();
        Brand::factory(50)->create();
        Customer::factory(50)->create();

        CustomerTransection::factory(50)->create();
        PurchasedProduct::factory(50)->create();
        Sales::factory(50)->create();
        SaleDetails::factory(100)->create();
        Supplier::factory(50)->create();
        Tasks::factory(10)->create();
        
     
     
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
