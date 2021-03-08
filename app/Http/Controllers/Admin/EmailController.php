<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Email;
use App\DataMurid;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller
{
	public function student_birthday(){
		$email = Email::first();
		$email = array_values($email->toArray());
		date_default_timezone_set("Asia/Jakarta");
		$r = DataMurid::where('tgl_lahir','like','%'.date("m-d").'%')->get();
		$r = $r->toArray();
		return view('admin.email.student-birthday.index',compact('email','r'));
	}
	public function sendmail(Request $request){
		$judul = $request->judul;
		$isi = $request->isi;
		date_default_timezone_set("Asia/Jakarta");
		$s = DataMurid::where('tgl_lahir','like','%'.date("m-d").'%')->get();
		foreach($s as $r){
			$nama = explode(" ",$r->nama);
			$email = $r->email;
			$mail = new PHPMailer;
			$mail->SMTPDebug = 0;                               
			$mail->isSMTP();            
			$mail->Host = "smtp.hostinger.co.id"; //host mail server
			$mail->SMTPAuth = true;                          
			$mail->Username = 'counselor2@bestpartnereducation.com';   //nama-email smtp          
			$mail->Password = '12345678' ;           //password email smtp
			$mail->SMTPSecure = "tls";                           
			$mail->Port = 587;                                   

			$mail->From = 'counselor2@bestpartnereducation.com'; //email pengirim
			$mail->FromName = "Best Partner Education's Team"; //nama pengirim
			$mail->addAddress($email);

			$mail->isHTML(true);
			$mail->Subject = $judul; //subject
			$mail_body = "Dear,".$nama[0]."<br><br>".$isi;
		    $mail->Body    = $mail_body; //isi email

		    $mail->AltBody = "Ucapan Ulang Tahun"; //body email (optional)

		    if(!$mail->send()) 
		    {
		    	echo "Mailer Error: " . $mail->ErrorInfo;
		    }
		}
		$cek = Email::first();
		$judulsql = addslashes($judul);
		$isisql = addslashes($isi);
		if($cek){
			$cek->judul = $judulsql;
			$cek->isi = $isisql;
			$cek->save();
		}else{
			$insert = Email::insert(['judul' => $judulsql,'isi' => $isisql ]);
		}
		return redirect('admin/email-marketing')->withStatus('Email berhasil terkirim');
	}
	public function upload(Request $request){
		$upload_path = "email";
		if ($request->hasfile('file')){
			$file = $request->file('file');
			$ext = $file->getClientOriginalExtension();
			$file_name = time().'.'.$ext;
			$path = $file->storeAs($upload_path, $file_name,'public');

			$responseText = "Sukses";
			$location = asset($upload_path).'/'.$file_name;
		}else{
			$responseText = "Gagal";
			$location = "";
		}
		return response()->json(compact('responseText','location'));
	}
}
