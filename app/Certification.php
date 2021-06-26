<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $table = "tb_portfolio_certification";
    protected $fillable = [
    	'id_karyawan','name','year','duration','periode','keterangan','nilai'
    ];
}
