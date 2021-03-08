<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
      protected $fillable = [
        'name','country_code','cca2','cca3','currency_name','currency_symbol','currency_code'
      ];//

      public function slug(){
      	return null;
      }

}
