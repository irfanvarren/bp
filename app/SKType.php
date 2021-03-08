<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKType extends Model
{
    protected $table = "tb_jenis_sk";
    protected $primaryKey = "kode";
    public $incrementing = false;
    protected $fillable = [
    	'kode','jenis'
    ];
}
