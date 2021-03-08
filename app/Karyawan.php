<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
	public $incrementing = false;
	protected $table = "tb_karyawan";
	protected $primaryKey = "ID_KARYAWAN";

	public function user($employee_id){
		return User::where('employee_id',$employee_id)->first();
	}
}
