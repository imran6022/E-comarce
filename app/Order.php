<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function cart(){
    	return $this->hasMany(Cart::class);
    }

    public function payment(){
    	return $this->belongsTo(Payment::class, 'payment_id');
    }
}
