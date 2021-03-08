<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolProgram extends Model
{ 
	protected $fillable = [
		'school_id','country_id','region_id','city_id','course_id','qualification_id','sector_id','name','enrollment_fee','material_fee','fee','fee_installment','duration','details','course_information'	
	];
	public function courses(){
		return $this->belongsTo('App\SchoolCourse','course_id','id');
	}
	public function intakes(){
		return $this->hasMany('App\SchoolIntake','program_id','program_id');	
		
	}
	public function timetables(){
		return $this->hasMany('App\SchoolTimeTable','program_id','id');
	}
	public function requirements(){
		return $this->hasMany('App\SchoolProgramRequirement','program_id','id');
	}
	public function course_units(){
		return $this->hasMany('App\SchoolCourseUnit','program_id','id');
	}
	public function other_fees(){
		return $this->hasMany('App\SchoolOtherFees','school_id','school_id');
	}
	public function galleries(){
		return $this->hasMany('App\SchoolGallery','school_id','school_id');
	}
}
