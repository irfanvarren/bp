<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageSubType extends Model
{
	  use SoftDeletes;
    protected $fillable = ['type_id','division_id','name'];

    public function pages(){
    	return $this->hasMany('App\Pages','sub_type_id','id');
    }
}
