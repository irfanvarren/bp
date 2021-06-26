<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Awobaz\Compoships\Compoships;
class CourseLevelSetting extends Model
{
	use Compoships;
    protected $primaryKey = "KD";
    public $incrementing = false;

    public $fillable = [
    	'KD','REF_PAKET','REF_PRICELIST','description','online_test_id'
    ];

    public function online_test_modules(){
    	return $this->hasMany('App\Models\OnlineTest\OtModule','test_id','online_test_id');
    }
}
