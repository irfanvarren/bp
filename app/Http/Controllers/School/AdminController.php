<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
  protected $dashboard = 'sekolah';
    public function dashboard(){
      return view('school-dashboard',['dashboard' => $this->dashboard]);
    }//
}
