<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolOtherFees extends Model
{
	protected $table = "school_other_fees";
   	protected $fillable = [
   		'school_id','name','fee','details'
   	];
   	public function program(){
   		return $this->belongsTo('App\SchoolProgram');
   	}
}
