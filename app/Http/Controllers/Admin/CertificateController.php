<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Certificate;
use App\CertificateDetail;
use App\Models\Admin\StudentData\Student;
use App\CoursePacket;
use App\Level;

class CertificateController extends Controller
{
    public function index(){
    	$certificates = Certificate::get();
    	return view('admin.certificates.index',compact('certificates'));
    }
    public function create(){
        $students = Student::get();
        $packets = CoursePacket::get();
        $levels = Level::get();
        $certificate_num = Certificate::where('KD_4',date('Y'))->where('KD_5',date('m'))->value('KD_6');

        if($certificate_num == "" || $certificate_num == null){

            $certificate_num = "0001";
        }
        return view('admin.certificates.create',compact('students','packets','levels','certificate_num'));
    }

    public function store(Request $request){
        $certificate = Certificate::create($request->all());
        $certificate_detail = CertificateDetail::create(json_decode($request->DATA_NILAI));
        return redirect()->route('admin-certificate.index');
    }
}
