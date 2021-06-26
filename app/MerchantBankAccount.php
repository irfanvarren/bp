<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantBankAccount extends Model
{
    protected $table = "tb_merchant_rekening_bank";
    protected $fillable = ['id_merchant','bank','no_rek','nama_pemilik'];
}
