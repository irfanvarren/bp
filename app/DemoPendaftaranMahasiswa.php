<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemoPendaftaranMahasiswa extends Model
{
    protected $table = "tb_pendaftaran_mahasiswa";
    protected $fillable = [
    	'nama','no_kontak','asal_sekolah','asal_jurusan','jenis_kelamin','program_studi','bukti_pembayaran','file_syarat_pendaftaran','fotocopy_rapor','fotocopy_ktp','fotocopy_skhun','fotocopy_ijazah','lulusan_tahun'
    ];
}
