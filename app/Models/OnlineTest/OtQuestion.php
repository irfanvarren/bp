<?php

namespace App\Models\OnlineTest;

use Illuminate\Database\Eloquent\Model;

class OtQuestion extends Model
{
    protected $appends = ['question_num'];
    protected $fillable = [
        'test_structure_id','test_id','module_id','package_id','section_id','question','number','option_type'
    ];
    public function options(){
        return $this->hasMany('App\Models\OnlineTest\OtOption','question_id');
    }
    public function test_structure(){
        return $this->belongsTo('App\Models\OnlineTest\OtTestStructure');
    }
    public function getQuestionNumAttribute($test){
        return $test;
    }
    public function answers(){
             return $this->hasMany('App\Models\OnlineTest\OtTestAnswer','question_id');
    }
    /*public function newCollection(array $models = [])
    {
        return new QtQuestion($models);
    }*/
}
