<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class ContactUs extends Model
{
  protected $fillable = [
    'nama','email','no_telepon','pesan','event_name','event_slug','subject'
  ];
  protected $table = "tb_contactus";  //
}
