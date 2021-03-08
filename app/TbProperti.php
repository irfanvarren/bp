<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbProperti extends Model
{
    protected $table = 'tb_properti';
    protected $primaryKey = 'id_properti';//
       public function idJenis(){
    return $this->belongsTo(TbJenis::class);
	}
	   public function idKota(){
    return $this->belongsTo(Regency::class,'id_kota');
	}
}
