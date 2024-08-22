<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;

    public function category(){
        return $this->hasMany(Category::class,'catalogue_id')->where(['parent_id'=>0])->with('subcategories');
    }
}
