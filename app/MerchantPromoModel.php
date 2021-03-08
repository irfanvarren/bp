<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantPromoModel extends Model
{
  protected $fillable = [
    'id_produk','id_merchant','nama_promo','tgl_berlaku','tgl_kadaluarsa','potongan_persen','potongan_harga','jlh_peruser','jlh','lokasi_gambar','kode_promo'
  ];
    protected $table = "tb_merchantpromo";//
}
