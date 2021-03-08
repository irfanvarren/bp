<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolTimeTable extends Model
{
    protected $fillable = [
    	'school_id','type_id','program_id','days','time'
    ];
    public function program(){
    	return $this->belongsTo('App\SchoolProgram','program_id','id');
    }
}
