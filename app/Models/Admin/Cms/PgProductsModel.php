<?php

namespace App\Admin\Cms;

use Illuminate\Database\Eloquent\Model;

class PgProductsModel extends Model
{
    protected $fillable = [
      'product_id','title','desc','ref_paket'
    ];
    protected $table = "pg_product";//
}
