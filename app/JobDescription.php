<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDescription extends Model
{
	protected $primaryKey = "id_karyawan";
    protected $table ="tb_deskripsi_pekerjaan";
    protected $fillable = [
    	'id_karyawan','deskripsi','preview'
    ];
}
