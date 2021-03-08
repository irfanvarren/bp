<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $fillable = [
    	'id_perusahaan','id_promo','nama','nama_panggilan','kota','provinsi','tempat_lahir','tanggal_lahir','agama','kewarganegaraan','about','alamat','email','no_telepon','sd','smp','sma','universitas','keahlian_illustrator','keahlian_bahasa','keahlian_lainnya','level_bahasa_inggris','kemampuan_bahasa_inggris','penghargaan','pengalaman_sejenis','konferensi_dan_seminar','pengalaman_organisasi','pelatihan_dan_workshop','no_ktp','ktp','kk','ijazah','transkrip_nilai','link_portofolio','gambar_portofolio','pas_foto','surat_keterangan_tidak_mampu'
    ];
}
