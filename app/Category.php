<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent(){
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products(){
    	return $this->hasMany(Product::class);
    }


    public static function ParentOrNorCategory($parent_id, $child_id){
    	$categorys = Category::where('id', $parent_id)->where('id', $child_id)->get();
    	if (!is_null($categorys)) {
    		return true;
    	}else{
    		return false;
    	}
    }
}
