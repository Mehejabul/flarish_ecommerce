<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
    public function variation()
    {
        return $this->belongsTo(ProductVariation::class,'product_variations_id')->withDefault();
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id')->with('productvariation');
    }
}
