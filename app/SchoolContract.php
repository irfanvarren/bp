<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolContract extends Model
{
    protected $fillable = [
    	'school_id','agent_id','parent_id','start_date','end_date','status','note'
    ];

    public function parent_agent(){
    	return $this->hasOne('App\SchoolAgent','id','parent_id');
    }

    public function agent_commission(){
    	return $this->hasMany('App\SchoolCommission','school_id','school_id')->where('commission_for','School');
    }
    public function marketing_commission(){
    	return $this->hasMany('App\SchoolCommission','school_id','school_id')->where('commission_for','Marketing');
    }
    public function subagent_commission(){
    	return $this->hasMany('App\SchoolCommission','school_id','school_id')->where('commission_for','Sub-Agent');
    }
}
