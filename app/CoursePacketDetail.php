<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Awobaz\Compoships\Compoships;

class CoursePacketDetail extends Model
{
	use Compoships;
    protected $table = "tb_paket_bimbel_dtlharga";

    public function course_level_settings(){
    	return $this->hasMany('App\CourseLevelSetting',['KD','REF_PAKET','REF_PRICELIST'],['REF_LEVEL','REF_PAKET','KD']);
    }
}
