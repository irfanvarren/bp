<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbHakMilik extends Model
{
	protected $table = 'tb_hak_milik';
   protected $primaryKey = 'id_hak_milik'; //

   public function idJenis(){
    return $this->belongsTo(TbJenis::class);
	}
}
