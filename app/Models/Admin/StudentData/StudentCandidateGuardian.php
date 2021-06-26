<?php

namespace App\Models\Admin\StudentData;

use Illuminate\Database\Eloquent\Model;

class StudentCandidateGuardian extends Model
{
    protected $table = "tb_calonsiswa_datawali";
    protected $fillable = ['KD','nama_wali','hubungan','no_hp_wali','email_wali','alamat_wali','pekerjaan','penghasilan','kebutuhan_khusus','created_at','updated_at'];
}
