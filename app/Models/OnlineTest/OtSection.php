<?php

namespace App\Models\OnlineTest;

use Illuminate\Database\Eloquent\Model;

class OtSection extends Model
{
    protected $fillable = [
        'name','instruction','text','image','test_section_id','type'
    ];
    public function test_section(){
        return $this->belongsTo('App\Models\OnlineTest\OtTestSection','test_section_id');
    }
    public function questions(){
    	return $this->hasMany('App\Models\OnlineTest\OtQuestion','section_id');
    }
    public function structures(){
    	return $this->hasMany('App\Models\OnlineTest\OtTestStructure','section_id','id');
    }
}
