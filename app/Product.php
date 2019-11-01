<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function image(){
    	return $this->hasMany('App\Product_image');
    }

    function category(){
    	return $this->belongsTo(Category::class);
    }
    
    function brand(){
    	return $this->belongsTo(Brand::class);
    }
}
