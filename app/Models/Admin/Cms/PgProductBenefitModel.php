<?php

namespace App\Admin\Cms;

use Illuminate\Database\Eloquent\Model;

class PgProductBenefitModel extends Model
{
    protected $fillable= [
    'product_id','image','title','desc'    
    ];
    protected $table = "pg_product_benefit";//
}