<?php

namespace App\Models\OnlineTest;

use Illuminate\Database\Eloquent\Model;

class OtTestSection extends Model
{
protected $fillable = [
    'test_id','package_id','module_id','section_type_id','duration'
];
public function section_type(){
    return $this->belongsTo('App\Models\OnlineTest\OtSectionType','section_type_id');
    }
    public function sections(){
        return $this->hasMany('App\Models\OnlineTest\OtSection','test_section_id');
    }
    public function total_questions(){
    	return $this->hasManyThrough('App\Models\OnlineTest\OtQuestion','App\Models\OnlineTest\OtSection','test_section_id','section_id');
    }	
    public function structures(){
    	return $this->hasMany('App\Models\OnlineTest\OtTestStructure','test_section_id','id');
    }
}
