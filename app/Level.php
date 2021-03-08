<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Awobaz\Compoships\Compoships;
class Level extends Model
{
	use Compoships;
	protected $table = "tb_level";
	protected $primaryKey = "KD";	
	public $incrementing = false;

	public function settings(){
		return $this->hasOne('App\CourseLevelSetting','KD','KD');
	}
}
