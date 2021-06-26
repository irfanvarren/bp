<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbDetProperti extends Model
{
    //
    protected $table = 'tb_det_properti';
    protected $primaryKey = 'id_det';

    public function detail(){
    	return $this->belongsTo('\App\TbProperti','id_properti');
    }
}
