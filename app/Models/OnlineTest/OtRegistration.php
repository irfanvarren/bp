<?php

namespace App\Models\OnlineTest;

use Illuminate\Database\Eloquent\Model;

class OtRegistration extends Model
{
    protected $fillable = [
    	"id_calonsiswa","reseller_id","test_id","module_id","NAMA","KOTA_KELAHIRAN","TGL_LAHIR","REF_KTP","ALAMAT","EMAIL","ALASAN","KONTAK","token","tanggal_speaking","bukti_pembayaran","status",'upload_ktp','skills'
    ];
}
