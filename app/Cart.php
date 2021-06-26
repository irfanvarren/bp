<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   	public function items(){
   		return $this->hasMany('App\CartItem','cart_id','id');
   	}


   	public function payments(){
   		return $this->hasMany('App\CartPayment','cart_id','id');
   	}
}
