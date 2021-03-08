<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolProgramRequirement extends Model
{
   protected $fillable = [
   	'school_id','program_id','name'
   ];

   public function program(){
   	return $this->belongsTo('App\SchoolProgram');
   }
}
