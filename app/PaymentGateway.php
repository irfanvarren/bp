<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
	public $incrementing = false;
	public $timestamps = false;
    public $fillable = ['pg_code','pg_name','transaction_fee'];
}
