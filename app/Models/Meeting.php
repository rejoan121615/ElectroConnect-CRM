<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'supplier_id', 'date', 'time'];

    public function supplier () {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
