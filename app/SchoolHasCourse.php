<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolHasCourse extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'school_id','course_id','details'
	];
	public function courses(){
		return $this->hasMany('App\SchoolCourse','id');		
	}
	public function programs(){
		return $this->hasMany('App\SchoolProgram','course_id');
	}
}
