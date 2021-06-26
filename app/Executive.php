<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Executive extends Model
{
	public $incrementing = false;
	protected $primaryKey = "ID_KARYAWAN";
  protected $table = "tb_executive";  //
}
