<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
	protected $fillable = ['id_karyawan','image','name','description'];
    protected $table = "tb_portfolio";
}
