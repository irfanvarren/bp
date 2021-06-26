<?php

namespace App\Models\Admin\Cms;

use Illuminate\Database\Eloquent\Model;

class PgProductTargetModel extends Model
{
  protected $fillable= [
  'product_id','image','title','desc'
  ];
  protected $table = "pg_product_target";//
}
