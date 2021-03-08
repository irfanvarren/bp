<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolCourseUnit extends Model
{
    protected $fillable = [
    	'school_id','program_id','period_id','name'
    ];

    public function program(){
    	return $this->belongsTo('App\SchoolProgram');
    }
}
