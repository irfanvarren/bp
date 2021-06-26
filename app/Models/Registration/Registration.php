<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = "tb_daftarbimbel_hdr";
    const CREATED_AT = "TGL_BUAT";

    const UPDATED_AT = "TGL_EDIT";
    protected $fillable = [
        'KD_1','KD_2','KD_3','KD_4','QRCODE','QRCODE_STR','TGL','REF_PERUSAHAAN','DEFAULT_CUR','REF_SALES','KET','TOTAL_NETO','TOTAL_BAYAR','TOTAL_BAYAR','REF_BUKTI','REF_AKUN_KAS','REF_AKUN_PIUTANG','REF_AKUN_PENDAPATAN','TOTAL_KAS','TOTAL_PIUTANG','TOTAL_PENDAPATAN','USER_BUAT','USER_EDIT','USER_SETUJU','TGL_BUAT','TGL_EDIT'
    ];    
}
