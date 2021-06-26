<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class PacketPriceDetails extends Model
{
	protected $table = "tb_paket_bimbel_dtlharga";

	public function duration(){
		return $this->hasMany('App\PacketPriceDetails', 'REF_PAKET','REF_PAKET');
	}

	public function prices(){
		return $this->hasMany('App\PacketPriceDetails','REF_PAKET');
	}
}
