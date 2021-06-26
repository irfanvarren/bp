<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartPayment extends Model
{
	use SoftDeletes;
	public function paid_total(){
		dd($this);
	}
}
