<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = "tb_kontrak";
        protected $fillable = [
    	'no','id_karyawan','judul','isi','file','tgl_mulai','tgl_berakhir','status'
    ];

}
