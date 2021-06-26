<?php

namespace App\Models\Admin\StudentData;

use Illuminate\Database\Eloquent\Model;

class StudentGuardian extends Model
{
    protected $table = "tb_siswa_datawali";
    protected $fillable = ['KD','nama_wali','hubungan','no_hp_wali','email_wali','alamat_wali','pekerjaan','penghasilan','kebutuhan_khusus','created_at','updated_at'];
}
