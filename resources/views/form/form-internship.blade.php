<!DOCTYPE html>
<html>
<head>
	<title>Best Partner Intership Form</title><link href="" rel="shortcut icon">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset('img/favicon.ico')}}">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div>
		<img src="{{asset('img/form/back login 2.png')}}" width="100%">
	</div>
	<form class="w3-container w3-padding" style="max-width:70%;margin: 0 auto;min-height:800px;" action="{{url('careers/internship-and-job-vacancy')}}" method="POST" enctype="multipart/form-data">
		@csrf
		@if(session()->has('message'))
		<div class="w3-panel w3-green w3-display-container">
			<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-display-topright">&times;</span> 
			<h4>{!! session()->get('message') !!}</h4>
		</div>
		@endif
		<div style="text-align:center;">
			<h1 style="font-size:50px;">Kirim Lamaran</h1>
			<h6>Anda Melamar Sebagai Anak Magang</h6>
			<hr>
		</div>

		<div class="w3-half w3-padding">
			<label>Nama Lengkap*</label>
			<input type="text" name="nama" class="w3-input" value="{{auth()->check() ? auth()->user()->name : ''}}" required >
		</div>
		<div class="w3-half w3-padding">
			<label>Tanggal Lahir*</label>
			<input type="date" name="tgl" class="w3-input" value="{{auth()->check() ? auth()->user()->birth_date : ''}}" required >
		</div>
		<div class="w3-half w3-padding">
			<label>Nomor HP / Whatsapp*</label>
			<input type="text" name="hp" class="w3-input" value="{{auth()->check() ? auth()->user()->no_telepon : ''}}" required >
		</div>
		<div class="w3-half w3-padding">
			<label>E-Mail*</label>
			<input type="text" name="email" class="w3-input" value="{{auth()->check() ? auth()->user()->email : ''}}" required >
		</div>
		<div class="w3-half w3-padding">
			<label>Sekolah Asal*</label>
			<input type="text" name="sekolah" class="w3-input" required >
		</div>
		<div class="w3-half w3-padding">
			<label>Alamat Sekolah*</label>
			<input type="text" name="alamat" class="w3-input" required >
		</div>
		<div class="w3-half w3-padding">
			<label>Jurusan Sekolah yang Anda Tempuh Saat Ini*</label>
			<input type="text" name="jurusan" class="w3-input" required >
		</div>
		<div class="w3-half w3-padding">
			<label>Keahlian Yang Dimiliki Saat Ini*</label>
			<input type="text" name="keahlian" class="w3-input" required >
		</div>
		<div class="w3-padding">
			<label>Cabang</label>
			<select name="REF_PERUSAHAAN" class="w3-input" required>
				<option value="">Pilih Cabang</option>
				@foreach($companies as $company)
				<option value="{{$company->KD}}">{{$company->NAMA}}</option>
				@endforeach
			</select>
		</div>
		<div class="w3-padding">
			<label>Divisi*</label>
			<select name="divisi" class="w3-input" required>
				<option value="">Pilih Divisi</option>
				<option value="admin">Admin</option>
				<option value="marketing">Marketing</option>
				<option value="itdesign">IT & Design</option>
				<option value="akademik">Akademik</option>
			</select>
		</div>
		<div class="w3-padding">
			<label>Periode Internship</label><br><br>
			<label>Mulai*</label>
			<input type="date" name="mulai" class="w3-input" required ><br><br>
			<label>Selesai*</label>
			<input type="date" name="selesai" class="w3-input" required >
		</div>
		<div class="w3-padding">
			<label>Bagaimana Anda Mengetahui Best Partner*</label>
			<input type="text" name="tahu" class="w3-input" required >
		</div>
		<div class="w3-half w3-padding">
			<label>Upload Tanda Pengenal (KTP/KTM/Kartu Pelajar)* <i style="color:red;">(Max. 10 MB)</i> </label>
			<input type="file" id="file" name="file" required ><br><i id="fp" style="color:red;display:none;">File Terlalu Besar/File is too big</i>
		</div>
		<div class="w3-half w3-padding">
			<label>Upload Surat Pengantar Magang / Internship <i style="color:red;">(Max. 10 MB)</i></label>
			<input type="file" id="file1" name="file1"><br><i id="fp1" style="color:red;display:none;">File Terlalu Besar/File is too big</i>
		</div>
		<div class="w3-margin-top">
			<input type="checkbox" required class="w3-margin "><label>Dengan ini saya menyatakan bahwa data yang saya kirim adalah sebenar-benarnya dan siap menerima keputusan apapun dari Best Partner</label>
			<br>*Wajib diisi<br><br>
		</div>
		<div>
			<button class="w3-button w3-input w3-red w3-round-large">Kirim</button>
		</div>
	</form>
	<script>
		var uploadField = document.getElementById("file");

		uploadField.onchange = function() {
			if(this.files[0].size > 10485760){
				document.getElementById("fp").style.display="block";
				this.value = "";
			}else{
				document.getElementById("fp").style.display="none";
			}
		};

		var uploadField1 = document.getElementById("file1");

		uploadField1.onchange = function() {
			if(this.files[0].size > 10485760){
				document.getElementById("fp1").style.display="block";
				this.value = "";
			}else{
				document.getElementById("fp1").style.display="none";
			}
		};
	</script>
	<!--

	</body>
	</html>

-->

</body>
</html>