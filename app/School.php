<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
      'country_id','region_id','city_id','postal_code','abbreviation','logo','name','address','phone_number','email','website','working_days','description','enrollment_fee','intake'
    ];//
    public function contacts(){
    	return $this->hasMany('App\SchoolContact','school_id','id')->selectRaw('school_contacts.*,school_divisions.name as division_name')->join('school_divisions','school_contacts.division_id','school_divisions.id');
    }
    public function has_courses(){
    	return $this->hasMany('App\SchoolHasCourse','school_id','id')->join('school_courses','school_has_courses.course_id','school_courses.id');
    }
    public function programs(){
    return $this->hasManyThrough(
        'App\SchoolHasCourse', 
        'App\SchoolProgram',
        'school_id',
        'course_id',
        'id',
        'course_id'
    );
  /*  return dd($this->hasManyThrough(
        'App\SchoolHasCourse', 
        'App\SchoolProgram',
        'course_id',
        'school_id',
        'id',
        'school_id'
    )->toSql());*/
    }
    public function galleries(){
    	return $this->hasMany('App\SchoolGallery','school_id','id');
    }
    public function intakes(){
    	return $this->hasMany('App\SchoolIntake','school_id','id');
    }
    public function time_tables(){
    	return $this->hasMany('App\SchoolTimeTable','school_id','id');
    }
    public function other_fees(){
    	return $this->hasMany('App\SchoolOtherFees','school_id','id');
    }
    public function refunds(){
    	return $this->hasMany('App\SchoolRefund','school_id','id');
    }
    public function promos(){
        return $this->hasMany('App\SchoolPromo','school_id','id');
    }
    public function student_informations(){
        return $this->hasMany('App\SchoolStudentInformation','school_id','id');
    }
}
