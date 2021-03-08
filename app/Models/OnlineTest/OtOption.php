<?php

namespace App\Models\OnlineTest;

use Illuminate\Database\Eloquent\Model;

class OtOption extends Model
{
	protected $fillable = [
		'question_id','option'
	];	
    public function question(){
        return $this->belongsTo('App\Models\OnlineTest\OtQuestion');
    }
}
