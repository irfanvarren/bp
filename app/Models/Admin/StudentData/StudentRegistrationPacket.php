<?php

namespace App\Models\Admin\StudentData;

use Illuminate\Database\Eloquent\Model;

class StudentRegistrationPacket extends Model
{
 const CREATED_AT = "TGL_BUAT";

 const UPDATED_AT = "TGL_EDIT";
 protected $fillable =[
  'reseller_id','reseller_quota_id','REF_PRICELIST','KD','REF_PAKET','REF_LEVEL','REF_KATEGORI','JUMLAH_JAM','JUMLAH_PERTEMUAN','TIPE_KELAS','IELTS_MODULE','TGL_TEST'
];
    protected $table = "tb_siswa_dtlpaket";//
  }
