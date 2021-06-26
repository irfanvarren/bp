<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IeltsSimulationEvent extends Model
{
  	protected $table = 'event_daftardtlsiswa';  //
  	protected $primaryKey = 'KD';
	const CREATED_AT = 'TGL_BUAT';
	const UPDATED_AT = 'TGL_EDIT';
}
