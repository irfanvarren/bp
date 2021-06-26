<?php

namespace App\Http\Controllers;
use Request;
class BaseController extends Controller
{
	public function __construct(){

		$this->admin = "";
		if(Request::segment(1) == 'admin'){
			if(Request::segment(2) == 'berdayakan'){
				$this->admin = 'berdayakan';
			}
		}
		
	}
}
