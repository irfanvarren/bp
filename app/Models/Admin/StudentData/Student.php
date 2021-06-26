<?php

namespace App\Models\Admin\StudentData;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "tb_siswa";
    protected $primaryKey = "KD";
    public $incrementing = false;
    protected $fillable = ['NO','KD','NAMA','ALAMAT','KODE_POS','RT_RW','DESA_KELURAHAN','DUSUN','KOTA','ID_NEGARA','KOTA_KELAHIRAN','TGL_LAHIR','AGAMA','JK','EMAIL','INSTAGRAM','KET','REF_NIK','REF_AKTA','REF_NPWP','REF_PASPOR','PIC_PATH','PIC','QRCODE','QRCODE_STR','KONTAK_1','KONTAK_2','KONTAK_3','REF_NEGARA','REF_PULAU','REF_PROVINSI','REF_KOTA','REF_KEC','REF_KEL','USER_BUAT','USER_EDIT','USER_SETUJU','TGL_BUAT','TGL_EDIT'
    ];
    const CREATED_AT = "TGL_BUAT";
    const UPDATED_AT = "TGL_EDIT";
}
