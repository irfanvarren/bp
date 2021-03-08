<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class MerchantAdmin extends Model
{
  use HasRoles;
  protected $guard_name = 'web';
  protected $table = "tb_merchant";
  protected $fillable = [
      'nama_merchant', 'email','no_telepon','alamat'
  ];  //
}
