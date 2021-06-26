<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsType extends Model
{
    protected $table = "tb_event_types";
    protected $fillable = ['name'];

     public function course_events(){
  	return $this->hasMany('App\CourseEvent','REF_EVENT_TYPE','id');
  }
}
