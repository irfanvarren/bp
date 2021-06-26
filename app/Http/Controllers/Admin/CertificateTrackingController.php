<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Certificate;
use App\CertificateImage;
use App\CertificateDetail;


class CertificateTrackingController extends Controller
{
	public function index(){
		return view('admin.certificate-tracking.index');
	}

	public function show(Request $request,$search){
		$redirect_back = "";
		if($request->redirect_back != ""){
			$redirect_back = $request->redirect_back;
		}
		if($search == "cn"){
		$enc = $request->aasdawcn;
		$dec = base64_decode($enc);
		$ex = explode("/",$dec);
		$bt = count($ex);
		$cn = '';
		for($i = 0; $i< $bt ;$i++){
			if($i == 1){
				$cn .= $ex[$i]."//"; 
			}if($i == $bt-1){
				$cn .= $ex[$i];
			}if($i != 1 && $i != $bt-1){
				$cn .= $ex[$i]."/";
			}
		}
		$certificate = Certificate::where('KD_GABUNG',$cn)->first();


		if(!$certificate){
			return redirect('certificate-tracking')->withError("Sertifikat Tidak Ditemukan");
		}
		$certificate_images = CertificateImage::where('KD_GABUNG',$cn)->get();
		$certificate_details = CertificateDetail::where('KD_GABUNG',$cn)->get();
		return view('admin.certificate-tracking.result',compact('certificate','cn','dec','certificate_images','certificate_details','redirect_back'));
		}else if($search == "cnik"){
			$enc = $request->aasdawcn;
			$cnik = base64_decode($enc);
			$certificates = Certificate::where('SISWA_NIK',$cnik)->get();
			if(!count($certificates)){
				return redirect('certificate-tracking')->withError("NIK Tidak Ditemukan");
			}
			return view('admin.certificate-tracking.result',compact('cnik','certificates','redirect_back'));
		}
	
	}
}
