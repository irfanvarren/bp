<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
  protected $fillable = [
      'id_karyawan', 'nama_pekerjaan','tempat_bekerja','tgl_mulai','tgl_selesai' ,'deskripsi'
  ];
  protected $table = "tb_portfolio_experience";  //    //
}
