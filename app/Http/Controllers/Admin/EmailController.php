<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Email;
use App\DataMurid;
use App\DataEmail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller
{
	public function email_bulk(Request $request){
		$emails = Email::get();
		$kode_email = $request->i;
		$daftar_email_murid = DataMurid::where('email','!=','')->get();
		return view('admin.email.email-bulk.index',compact('emails','kode_email','daftar_email_murid'));
	}

	public function email_bulk_sendmail(Request $request){

		$judul = $request->judul;
		$isi = $request->isi;
		$kodeemail = $request->kodeemail;
		$isi_str = str_replace("uploads","uploads",$isi);
		date_default_timezone_set("Asia/Jakarta");
		$s = DataEmail::selectRaw('nama,email')->where('email','!=','')->groupBy('nama','email')->get();
		foreach($s as $r){
		$nama_lengkap = $r->nama;
		$nama = explode(" ",$r->nama);
		$email = $r->email;
		$mail = new PHPMailer;
		$mail->SMTPDebug = 0;                               
		$mail->isSMTP();            
			$mail->Host = "email-smtp.us-east-2.amazonaws.com"; //host mail server
			$mail->SMTPAuth = true;                          
			$mail->Username = 'AKIA2UWPTHY3F7G3XWH7';   //nama-email smtp          
			$mail->Password = 'BPnp+SNlQw6TBRvV8TGRT2RQlD5InMPb/12dMnHaIbpx' ;           //password email smtp
			$mail->SMTPSecure = "tls";                           
			$mail->Port = 587;                                   

			$mail->From = 'no-reply@bestpartnereducation.com'; //email pengirim
			$mail->FromName = "Best Partner Education's Team"; //nama pengirim
			$mail->addAddress($email);//email murid
			$mail->isHTML(true);
			$mail->Subject = $judul; //subject
			$mail_body = "Dear,".$nama[0]."<br><br>".$isi;
			$isi = str_replace("{{ nama }}",$nama[0],$isi);
			$isi = str_replace("{{ nama lengkap }}",$nama_lengkap,$isi);
			$mail_body = $isi;
		    $mail->Body    = $mail_body; //isi email

		    if(!$mail->send()) 
		    {
		    	echo "Mailer Error: " . $mail->ErrorInfo;
		    }
		}
		    $judulsql = addslashes($judul);
		    $isisql = addslashes($isi);

		    if($kodeemail != ""){
		    	$update = Email::where('kd_email',$kodeemail)->update(['judul' => $judulsql,'isi' => $isisql ]);
		    }else{
		    	$insert = Email::insert(['judul' => $judulsql,'isi' => $isisql ]);
		    }
		    return redirect('admin/email-bulk')->withStatus('Email berhasil terkirim');



		}

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
