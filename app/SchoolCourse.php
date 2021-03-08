<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolCourse extends Model
{
  protected $fillable = [
    'name'
  ];//
  public function programs(){
  	return $this->hasMany('App/SchoolProgram');
  }	
  public function school(){
  	return $this->hasMany('APP/School');
  }
}
