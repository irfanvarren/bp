<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SK extends Model
{
    protected $table = "tb_sk";
    protected $fillable = [
    	'no','ref_perusahaan','id_karyawan','judul','kode_jenis','isi','file','tgl_mulai','tgl_berakhir','status'
    ];
}
