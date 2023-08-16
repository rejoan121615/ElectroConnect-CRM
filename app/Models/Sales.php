<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'paid_amount',
     'payment_method', 'trx_id', 'discount', 'comment'];

    public function customer() {
       return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function sale_details() {
        return $this->hasMany(SaleDetails::class, 'sales_id');
    }
    
}
