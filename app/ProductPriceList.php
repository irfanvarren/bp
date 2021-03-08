<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPriceList extends Model
{
	protected $primaryKey = "KD";
	public $incrementing = false;
	protected $table = "pricelists";
	protected $fillable = ['KD','priority','status','name','type'];

	public function packets(){
		return $this->hasManyThrough('App\CoursePacket','App\PacketPriceDetails','KD','KD','KD','REF_PAKET');
	}

	public function categories(){
		return $this->hasMany('App\PacketPriceDetails','KD','KD');
	}


}
