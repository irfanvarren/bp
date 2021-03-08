<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = "tb_bahasa";

    public function slug(){
    }

    public function products(){
    return $this->hasMany('App\CoursePacket','REF_BAHASA','KD');
    }
}
