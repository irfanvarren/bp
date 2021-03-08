<?php

namespace App\Form;

use Illuminate\Database\Eloquent\Model;

class RegisPaketDataWali extends Model
{
    protected $table = "tb_calonsiswa_datawali";
    protected $fillable = ['KD','nama_wali','hubungan','no_hp_wali','email_wali','alamat_wali','pekerjaan','penghasilan','kebutuhan_khusus'];
}
