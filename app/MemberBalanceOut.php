<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberBalanceOut extends Model
{
    protected $table = "member_balance_out";
     protected $fillable = [
    'user_id','product_id','promo_id','merchant_id','product_price','promo_price','promo_price_percent','total_promo','amount','remaining_fee','description','date'
  ];
}
