<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edubackground extends Model
{
  protected $fillable = [
      'id_karyawan', 'gelar','jurusan','tempat','tahun_masuk' ,'status'
  ];
  protected $table = "tb_portfolio_edubackground";  //
}
