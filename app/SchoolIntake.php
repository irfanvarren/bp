<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolIntake extends Model
{
    protected $fillable = [
    	'term_id','program_id','intake_date','orientation_date','school_id','note'
    ];
    public function programs(){
    	return $this->belongsTo('App\SchoolProgram','program_id','id');
    }
    /*public function intake_programs(){
    	return $this->hasMany('App\SchoolIntake','term_id');
    }*/
}
