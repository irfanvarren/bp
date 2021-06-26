<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
			public $incrementing = false;
    protected $table = "tb_divisi";
    protected $primaryKey = "KD";
    protected $fillable = [
    	'NAMA'
    ];
}
