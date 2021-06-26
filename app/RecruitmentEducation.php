<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecruitmentEducation extends Model
{
    protected $table = "recruitment_educations";
    protected $fillable = [
        'ref','nama_institusi','tahun_lulus','gelar_akademik','jurusan_kualifikasi','nilai_akhir_ipk','informasi_tambahan'
    ];
    public $timestamps = false;
}
