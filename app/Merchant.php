<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class Merchant extends Authenticatable implements MustVerifyEmail
{
	use Notifiable;
	use HasRoles;
	protected $guard_name = 'merchant';
	protected $table = "merchants";
	protected $fillable = [
		'name', 'email','no_telepon','alamat','slug','code','qrcode','google_maps','kode_pos','lokasi_logo','siup','password'
	];
	
	// public function sendEmailVerificationNotification(){
	// 	 $this->notify(new Merchant);
	// }
}
