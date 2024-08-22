<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function catalogue(){
        return $this->belongsTo(Catalogue::class,'catalogue_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function viewSection(){
        return $this->belongsTo(ViewSection::class,'view_section');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function stock(){
        return $this->hasOne(Stock::class,'product_id');
    }
    public function productvariation(){
        return $this->hasMany(ProductVariationDetails::class,'product_id')->with('productvariation');
    }
    public function images(){
        return $this->hasMany(MultiImages::class,'product_id');
    }
}
