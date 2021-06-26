<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Model;

class RegistrationTempStudentDetail extends Model
{
    protected $table = "temp_daftarbimbel_dtlsiswa";
    protected $fillable = [
    	'KD_GABUNG','KD_1','KD_2','KD_2','KD_3','KD_4','REF_SISWA','ID_USER','TITLE','NAMA','JK','TGL_LAHIR','AGAMA','ALAMAT','REF_KOTA','REF_KELURAHAN','ZIP','KONTAK_1','KONTAK_2','KONTAK_3','EMAIL','NIK','NPWP','PASPOR','TIPE','OCCLVL','OCCSEC','OCCSEC_OTHER','EDUC','COUNTRY','YEAR_STUDY','YEAR_STUDY_TEXT','PURPOSE','DEGREE','COURSE','TOEFL_ISTAKEN','TOEFL_DATE_TEST','TOEFL_LOCATION','IELTS_ISTAKEN','IELTS_DATE_TEST','IELTS_LOCATION','USER_BUAT','USER_EDIT','USER_SETUJU','TGL_BUAT','TGL_EDIT'
    ];
    const CREATED_AT = "TGL_BUAT";
    const UPDATED_AT = "TGL_EDIT";
}
