<?php

namespace App\Models\OnlineTest;

use Illuminate\Database\Eloquent\Model;

class OtTestStructure extends Model
{
    protected $fillable = [
        'test_id','package_id','module_id','section_id','question_type','option_type','section_id','number','instruction','title','description','audio','image','text','multiple_questions'
    ];
    public function single_questions(){
        return $this->hasMany('App\Models\OnlineTest\OtQuestion','test_structure_id');
    }
    public function questions(){
    	return $this->hasMany('App\Models\OnlineTest\OtQuestion','test_structure_id');
    }
    public function test_sections(){
    	return $this->belongsTo('App\Models\OnlineTest\OtSection');
    }
}
