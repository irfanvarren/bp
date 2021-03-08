<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherExperience extends Model
{
    protected $fillable = ['id_karyawan', 'pengalaman','jenis_pengalaman'];
    protected $table = "tb_portfolio_other_experience";//
    public function detail(){
    	return $this->hasMany('App\OtherExperience','');
    }
}
