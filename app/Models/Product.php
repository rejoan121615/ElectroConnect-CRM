<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id', 'brand_id', 'price', 'cost_price', 'stock_quantity', 'image_url', 'specifications', 'availability','weight', 'dimensions', 'supplier_id', 'supplier_product_id', 'tags'];


    public function category():BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function brand():BelongsTo {
        return $this->belongsTo(Brand::class);
    }
    
}
