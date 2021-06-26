<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Model;

class RegistrationTempDetail extends Model
{
    protected $table = "temp_daftarbimbel_dtl";
    protected $fillable = [
    	   'KD_GABUNG','KD_1','KD_2','KD_2','KD_3','KD_4','REF_SISWA','REF_PAKET','REF_LEVEL','REF_KAT','JUMLAH_JAM','JUMLAH_PERTEMUAN','HARGA_PAKET','JUMLAH_PAKET','DPP','PPN','PPH','TOTAL','REF_AKUN_PENDAPATAN','REF_AKUN_PPN','REF_AKUN_PPH','KET','USER_BUAT','USER_EDIT','USER_SETUJU','TGL_BUAT','TGL_EDIT'
    ];
    const CREATED_AT = "TGL_BUAT";
    const UPDATED_AT = "TGL_EDIT";
}
