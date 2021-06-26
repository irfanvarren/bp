<?php

namespace App\Form;

use Illuminate\Database\Eloquent\Model;

class RegisDocTranslate extends Model
{
    protected $table = "tb_dokumen_translate";
    protected $fillable = [
    	'users_id','nama','alamat','kode_pos','email','no_telepon','REF_PRICELIST','REF_PAKET','REF_LEVEL','REF_KATEGORI','permintaan','files'
    ];
}
