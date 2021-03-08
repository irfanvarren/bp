<?php

namespace App\Models\OnlineTest;

use Illuminate\Database\Eloquent\Model;

class OtTestAnswer extends Model
{
    protected $fillable = [
    	'test_id','package_id','module_id','section_id','question_id','answer_type','option_answer_id','answers','explanation'
    ];

    public function questions(){
    	return $this->belongsTo('App\Models\OnlineTest\OtQuestion','question_id');
    }
    public function structures(){
    	return $this->belongsTo('App\Models\OnlineTest\OtTestStructure','test_structure_id');
    }
}
