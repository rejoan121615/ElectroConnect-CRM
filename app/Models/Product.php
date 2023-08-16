<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id', 'brand_id', 'price', 'cost_price', 'stock_quantity', 'image_url', 'specifications', 'availability','weight', 'dimensions', 'supplier_id', 'supplier_product_id', 'tags'];

    
}
