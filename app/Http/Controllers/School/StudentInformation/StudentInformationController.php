<?php

namespace App\Http\Controllers\School\StudentInformation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentInformationController extends Controller
{
	protected $dashboard = 'sekolah';
    public function index(){
    	$students = [];
    	return view("sekolah.admin.student-informations.index",['dashboard' => $this->dashboard,'students' => $students]);
    }

    public function student_information(){
    	return "test";	
    }
}
