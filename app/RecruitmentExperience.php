<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecruitmentExperience extends Model
{
    protected $fillable = [
        'ref','posisi','nama_perusahaan','bidang_usaha','tahun_bergabung','tahun_selesai','gaji','deskripsi_pekerjaan','aktif'
    ];
    public $timestamps = false;
}
