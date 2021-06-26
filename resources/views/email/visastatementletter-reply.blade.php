<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p style="text-align:center;">
		Halo,{{$email->full_name}}. <br>
Terimakasih telah melakukan registrasi akun student dalam aplikasi visamu. <br>
Syarat dan Ketentuan yang telah kamu setujui juga terlampir bersama email ini. <br>
Jangan ragu untuk menghubungi admin apabila ada pertanyaan lebih lanjut <br>
<a href="{{url('enquiry')}}">Enquiry</a>
</p>

<p>
	Dengan mengisi form pendaftaran akun student ini maka anda telah menyetujui syarat dan ketentuan sebagai berikut :  
	<ol>
		<li><a href="{{$email->link_visa_statement_letter}}">Syarat dan ketentuan visa statement letter</a></li>
		<li><a href="{{$email->link_surat_pernyataan_testimony}}">Surat pernyataan testimony</a></li>
		<li><a href="{{$email->link_aturan_program}}">Syarat dan ketentuan program informasi sekolah</a></li>
		
	</ol>
	
</p>
</body>
</html>
