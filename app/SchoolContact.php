<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolContact extends Model
{
    protected $fillable = [
      'school_id','division_id','name','email','phone_number','skype_id'
    ];
    protected $table = "school_contacts";//
    public function school(){
    	return $this->belongsTo('App\School');
    }
}
