<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
   protected $fillable = [
   	'REF_PERUSAHAAN','nama','tgl','hp','email','sekolah','alamat','jurusan','keahlian','divisi','mulai','selesai','tahu','foto','surat'
   ];
}
