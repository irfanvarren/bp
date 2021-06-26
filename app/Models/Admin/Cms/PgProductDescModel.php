<?php

namespace App\Models\Admin\Cms;

use Illuminate\Database\Eloquent\Model;

class PgProductDescModel extends Model
{
  protected $fillable = [
    'product_id','title','desc'
  ];
    protected $table = "pg_product_desc";//
}
