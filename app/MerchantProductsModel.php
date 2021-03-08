<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantProductsModel extends Model
{
  protected $fillable = [
      'nama_produk', 'harga','id_merchant','lokasi_gambar' ,'status'
  ];
  protected $table = 'tb_merchantproduct';  //
}
