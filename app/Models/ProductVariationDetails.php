<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariationDetails extends Model
{
    use HasFactory;
    public function productvariation(){
        return $this->belongsTo(ProductVariation::class,'product_variations_id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id')->with('productvariation','stock');
    }
}
