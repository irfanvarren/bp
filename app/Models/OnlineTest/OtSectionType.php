<?php

namespace App\Models\OnlineTest;

use Illuminate\Database\Eloquent\Model;

class OtSectionType extends Model
{
    protected $fillable = [
        'name'
    ];
    public function sections(){
        return $this->hasMany('App\Models\OnlineTest\OtSection','section_type_id');
    }
    public function test(){
    	return $this->belongsTo('App\Models\OnlineTest\OtTest');
    }
}
