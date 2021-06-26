<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolHasAgent extends Model
{
    protected $fillable = [
    	'school_id','agent_id'
    ];

    public function agent_contracts(){
    	return $this->hasOne('App\SchoolContract','school_id','school_id')->withDefault();
    }

    public function marketing_commissions(){
    	return $this->hasMany('App\SchoolMarketingCommission','school_id','school_id');
    }
  
}
