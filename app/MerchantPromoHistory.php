<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantPromoHistory extends Model
{
  protected $fillable = [
    'id_user','id_promo','id_merchant'
  ];
  protected $table = "tb_merchantpromohistory";  //
}
