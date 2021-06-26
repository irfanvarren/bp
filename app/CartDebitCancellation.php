<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDebitCancellation extends Model
{
    protected $primaryKey = "trx_id";
    public $incrementing = false;
}
