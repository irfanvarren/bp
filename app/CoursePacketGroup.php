<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursePacketGroup extends Model
{
    protected $table = "tb_kelompokpaket";

    public function courses(){
    	return $this->hasMany('App\CoursePacket','REF_KELOMPOK','KD');
    }
}
