<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Awobaz\Compoships\Compoships;
class CartItem extends Model
{
	use Compoships;
    protected $fillable = [];

    public function intakes(){
    	return $this->hasMany('App\CourseIntake','course_id','REF_PAKET');
    }

    public function schedules(){
    	return $this->hasMany('App\CourseSchedule','course_id','REF_PAKET');
    }
    public function course_events(){
    	return $this->hasMany('App\CourseEvent',['REF_PAKET','REF_LEVEL'],['REF_PAKET','REF_LEVEL']);
    }
}
