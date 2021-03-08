<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageType extends Model
{
	  use SoftDeletes;
    protected $fillable = [
    	'division_id','name'
    ];
    protected $primaryKey = "id";

    public function sub_types(){
    	return $this->hasMany('App\PageSubType','type_id','id');
    }
}
