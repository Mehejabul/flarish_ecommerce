<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function catalogue(){
        return $this->belongsTo(Catalogue::class,'catalogue_id')->select('id','name');
    }
    public function parentcategory(){
        return $this->belongsTo(Category::class,'parent_id')->select('id','name');
    }
    public function subcategories(){
        return $this->hasmany(Category::class,'parent_id')->with('subcategories');
    }
    public function product(){
        return $this->hasmany(Product::class,'category_id');
    }
}
