<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = "tb_kontrak";
        protected $fillable = [
    	'no','ref_perusahaan','id_karyawan','judul','isi','file','tgl_mulai','tgl_berakhir','status'
    ];

}
