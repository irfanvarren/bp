@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style type="text/css">
	.product-background{
		height:300px;
		background:url('{{asset('img/registration-background.png')}}');
		background-position: center;
		background-size: cover;
		background-repeat:no-repeat;
	}

	.inline-wrapper{
		position:absolute;top:0;left:0;width: 100%;z-index: 2;
		display: flex;
	}

	.inline {
		display: inline-block;
		width: 16.5%;
		margin: 0 auto;
		background:#f2f2f2;

	}
	.inline:hover{
		cursor: pointer;
	}
	.inline.active{
		background:#00B4D8;
		color:white;
	}

	.wrap {
		display: table;
		table-layout: fixed;
		word-wrap: break-word;
		font-size:0.9em;
		height:  66px;
		width:   100%;

	}
	.wrap p {
		font-size: 1em;
		display:        table-cell;
		vertical-align: middle;
		text-align: center;
	}


	.calendar-code-wrapper{
		margin-right:25px;
	}
	.calendar-code-color{
		padding:0px 8px;
		border:1px solid #dedede;
	}
	.calendar-code-color.selected{
		background: #2480bd;
	}
	.calendar-code-color.available{
		background: #e6e6e6;
	}


	@media screen and (min-width:1366px){
		.product-background{
			height: 350px;
		}
	}
	@media screen and (max-width:860px){
		.product-background{
			height:200px;
		}
		.wrap{
			font-size:1.1em;
		}
	}
	@media screen and (max-width:480px){
		.product-background{
			height:200px;
			background-size: cover;

		}
		.inline{
			width:50% !important;
			border:1px solid #dadada;
		}
		.inline:last-child{
			width: 100% !important;
		}
		.wrap{
			font-size:1em;
		}
		.wrap p {
			font-size: 0.9em;
		}
	}
	@media screen and (max-width: 990px){
		.inline{
			display: block;
			width:33.333333%;
			float:left;
		}
		.inline-wrapper{
			display: block;
			position:relative;
		}
	}
	@media screen and (min-width: 990px){
		.inline-wrapper{
			margin-top:-65px;
		}

	}
	.tab-wrapper{
		display: none;
	}
	.tab-wrapper.show{
		display: block;
	}

	.parsley-errors-list{
		padding:0 15px;
		color:red;
	}
	.selectize-control .parsley-errors-list{
		display: none;
	}
	
	.summary-label{
		width:27.5%;float:left;overflow:hidden;text-overflow: ellipsis;white-space: nowrap;line-height: 40px;
	}
	.summary-value{
		background: #F1F4F8;border-radius:10px;padding:15px 10px;margin-left:30%;line-height: 40px;height: 40px;
		padding:0 15px;
	}
	.payment-tab{
		min-height:300px;
	}

	.loading-wrapper{
		width:100vw;
		height:100vh;
		position:fixed;
		top:0;
		left:0;
		z-index:9999999;
		display: none;
		background:rgba(255,255,255,1);
	}
	.loading-wrapper img{
		display:block;
		margin:0 auto;
		width:500px;
		position:absolute;
		top:50%;
		left:50%;
		transform:translate(-50%,-50%);
	}
</style>
@endpush
@section('content')
<noscript>
	<div style="position: fixed;top:0;left:0;width: 100%;height: 100%;background: white;z-index: 999999">Please enable your javascript !</div>
</noscript>
<div class="loading-wrapper">
	<img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="col-md-12 content-wrapper" style="padding:0 15px;">
	<div class="row">
		<div class="col-md-12 product-background">
			@if(count($current_regis))
			<div class="alert alert-warning" style="text-align:center;margin-top:15px;">
				Anda sudah mendaftar paket ini, apakah anda ingin mendaftar lagi?
				<button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
			</div>
			@endif
			@if(session()->has('message'))
			<div class="alert alert-success" style="text-align:center;margin-top:15px;">
				{!! session()->get('message') !!} <br>

				<button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
			</div>
			@endif

			<div class="col-md-12 text-header" style="text-align:center;color:black;font-weight: bold;margin-top:15px;padding:50px 50px 70px 50px;">

				<h2>Form Pendaftaran / Registration Form </h2>
				<div>Info Lebih lanjut dapat menghubungi no WA di bawah ini:
					<ul class="dash-list">
						@foreach(config('constants.marketing') as $marketing)
						<li>{{$marketing['no_telepon']}} ({{$marketing['nama']}})</li>
						@endforeach
					</ul>
				</div>
			</div>

		</div>
	</div>
	<div class="row justify-content-center" id="registration-wrapper">
		<div class="col-md-10 P-3" style="padding-bottom:80px;">
			<div class="row">
				<div class="col-md-12" style="padding:0;">
					<div class="inline-wrapper">
						<div class="inline active">
							<div class="wrap">
								<p>Office Branch</p>
							</div>
						</div>
						<div class="inline" onclic="openTab('')">
							<div class="wrap">
								<p>Personal Information</p>
							</div>
						</div>
						<div class="inline">
							<div class="wrap">
								<p>Occupation & <br>Education</p>
							</div>
						</div>
						<div class="inline">
							<div class="wrap">
								<p>Course Selection</p>
							</div>
						</div>
						<div class="inline">
							<div class="wrap">
								<p>Guardian Contact & <br> Documents Upload</p>
							</div>
						</div>
						<div class="inline">
							<div class="wrap">
								<p>Summary</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="card col-md-12" style="overflow:hidden;text-overflow: ellipsis;">
					<div class="card-body">
						<form class="myform" id="myform"  action="{{url('products/registration')}}" enctype="multipart/form-data" method="post" autocomplete="on">
							@csrf
							<div class="row tab-wrapper office-wrapper show">

								<div class="form-group row">
									<div class="col-md-12">
										<strong>Silahkan memilih Kantor cabang tempat anda ingin mengambil kursus</strong>
									</div>
									<label class="col-form-label col-md-12">Cabang BP / Branch Name</label>
									<div class="col-md-6">
										<select class="form-control" name="cabang" value="" data-parsley-required="true" data-regis-form="Cabang / Branch Name" required>
											<option value="">- Pilih Cabang -</option>
											@foreach($perusahaan as $data)
											<option value="{{$data->KD}}">{{ucwords(strtolower($data->NAMA))}}</option>
											@endforeach
										</select>
									</div>
								</div>

								@if(isset($tgl_test))
								<div class="row form-group" @if($tgl_test == "") style="display:none;" @endif>
									<div class="col-md-12 pb-2">
										<strong> Please select your preferred test date </strong> / Silahkan pilih tanggal tes yang anda inginkan 
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<input placeholder="Please Select Date" class="form-control" name="TGL_TEST" id="TGL_TEST" data-regis-form="Tanggal TEST / TEST Date" style="background:none;"  @if($tgl_test != "") required @endif>
											</div>
											<div class="col-md-12 mt-3">
												<span class="calendar-code-wrapper"><span class="calendar-code-color available">&emsp;</span> Test Available</span> <span class="calendar-code-wrapper"><span class="calendar-code-color">&emsp;</span> Test Not Available</span> <span class="calendar-code-wrapper"><span class="calendar-code-color selected">&emsp;</span> Selected Date</span>
											</div>
										</div>
									</div>
								</div>
								@endif

								<div class="row form-group">
									<div class="col-md-12">
										<p class="form-check-inline">
											<label class="form-check-label" for="">
												<input type="checkbox" name="agree" id="agree" class="form-check-input" required value=""> Setuju dengan <a href="{{url('/products/term-and-condition')}}" target="blank">Syarat & Ketentuan</a>
											</label>
										</p>
									</div>
								</div>
							</div>
							<div class="row tab-wrapper personal-information">
								<div class="form-group row">
									<div class="col-md-12">
										<strong>Informasi Pribadi</strong>
									</div>
									@php
									if($registration_data){
									$nama = $registration_data->NAMA;
									$nama_arr = explode(' ',$nama);
									$first_name = $nama_arr[0];
									$last_name = $nama_arr[count($nama_arr)-1];
									$middle_name = implode(" ",array_splice($nama_arr,1,count($nama_arr)-2));
								}
								@endphp
								<label for="" class="col-form-label col-md-12"> Nama Peserta </label>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-4 mb-1">

											<input type="text" class="form-control" id="nama_depan" name="nama_depan" required placeholder="Nama Depan"  data-regis-form="Nama Depan / First Name" value="{{ucwords($first_name)}}">
										</div>
										<div class="col-md-4 mb-1">
											<input type="text" class="form-control" id="nama_tengah" name="nama_tengah" placeholder="Nama Tengah"  data-regis-form="Nama Tengah / Middle Name" value="{{$middle_name}}">
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" id="nama_belakang" name="nama_belakang"  data-regis-form="Nama Belakang / Last Name" placeholder="Nama Belakang" value="{{ucwords($last_name)}}">
										</div>
									</div>
								</div>
							</div>
							<div class=" row">
								<div class="col-md-6 col-lg-8">
									<div class="row">

										<label for="" class="col-form-label col-md-12">Tempat Lahir</label>
									</div>
									<div class="row mb-3">
										<div class="col-md-12">
											<input type="text" class="form-control" name="tempat_lahir" required placeholder="Tempat Lahir"  data-regis-form="Tempat Lahir / Place of Birth" value="{{$registration_data->KOTA_KELAHIRAN}}">
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-4">
									<div class="row">

										<label for="" class="col-form-label col-md-12">Tanggal Lahir</label>
									</div>

									<div class="row mb-3">

										<div class="col-md-12">
											@php
											$tanggal_lahir_arr = explode('-',$registration_data->TGL_LAHIR);
											$tanggal_lahir = $tanggal_lahir_arr[2];
											$bulan_lahir = $tanggal_lahir_arr[1];
											$tahun_lahir = $tanggal_lahir_arr[0];
											@endphp
											<div class="row">

												<div class="col-md-4 mb-1">
													<input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" pattern="[0-9]{2}"  data-regis-form="tanggal_lahir" placeholder="dd" value="{{$tanggal_lahir}}" required>

												</div>
												<div class="col-md-4 mb-1">
													<select class="form-control" id="bulan_lahir" name="bulan_lahir" required>
														<option value="">mm</option>
														@for($x = 1; $x<= 12 ; $x++)
														<option value="{{str_pad((string)$x, 2, "0", STR_PAD_LEFT)}}" {{$bulan_lahir == str_pad($x,2,"0",STR_PAD_LEFT) ? 'selected' : ''}}>
															{{str_pad((string)$x, 2, "0", STR_PAD_LEFT)}}
														</option>
														@endfor
													</select>
												</div>
												<div class="col-md-4 mb-1">
													<input type="text" class="form-control" id="tahun_lahir" name="tahun_lahir" placeholder="yyyy" pattern="[0-9]{4}" value="{{$tahun_lahir}}" required>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">

								<label class="col-md-12 col-form-label">Jenis Kelamin / Gender</label>
								<div class="col-md-8">
									<select class="form-control"  data-regis-form="Jenis Kelamin / Gender" name="jk" required>
										<option value="">-Pilih Jenis Kelamin-</option>
										<option value="Laki - laki" {{$registration_data -> JK == 'Laki - laki' ? 'selected' : ''}}>Laki - laki</option>
										<option value="Perempuan" {{$registration_data -> JK == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="" class="col-md-12 col-form-label">Kewarganegaraan / Nationality</label>
								<div class="col-md-8">
									<input type="text" name="kewarganegaraan"  data-regis-form="Kewarganegaraan / Nationality" class="form-control" placeholder="Kewarganegaraan" value="{{$registration_data->KEWARGANEGARAAN}}" required>
								</div>
							</div>
							<div class=" row">
								<div class="col-md-8">
									<div class="row mb-3">
										<label for="" class="col-form-label col-md-12">No. KTP / ID-card Number</label>
										<div class="col-md-12">
											<input type="text" name="no_ktp" placeholder="No KTP" data-regis-form="No. KTP / ID-card Number" pattern="[0-9]{16}" required class="form-control" value="{{$registration_data->REF_KTP}}">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row mb-3">

										<label for="" class="col-form-label col-md-12">No. Passport / Passport Number</label>
										<div class="col-md-12">
											<input type="text" name="no_paspor" data-regis-form="No. Passport / Passport Number" placeholder="No Paspor" class='form-control' value="{{$registration_data->REF_PASPOR}}">
										</div>

									</div>
								</div>
							</div>
							
							<div class=" row">
								<div class="col-md-8">
									<div class="row mb-3">
										<label for="" class="col-form-label col-md-12">Alamat saat ini / Address</label>
										<div class="col-md-12">
											<input type="text" name="alamat" id="alamat" data-regis-form="Alamat / Address" placeholder="Alamat saat ini" required class="form-control" value="{{$registration_data->ALAMAT}}">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row mb-3">
										<label for="" class="col-form-label col-md-12">Kota / City</label>
										<div class="col-md-12">
											<input type="text" name="kota" id="kota" data-regis-form="Kota / City" placeholder="Kota Tempat Tinggal" required class='form-control' value="{{$registration_data->KOTA_KELAHIRAN}}">
										</div>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="row">
										<label for="" class="col-form-label col-md-12">Provinsi / Region</label>
										<div class="col-md-12">
											<input type="text" class="form-control" id="provinsi" name="provinsi" data-regis-form="Provinsi / Region" placeholder="Provinsi" required>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">
										<label class="col-md-12 col-form-label"> Negara / Country </label>
										<p class="col-md-12">
											<select class="form-control" name="negara" id="negara" data-regis-form="Negara / Country" required>
												<option value="">- Pilih Negara -</option>
												@foreach($countries as $country)
												<option value="{{$country->id}}">{{$country->name}}</option>
												@endforeach
											</select>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row">

										<label class="col-md-12">Kode Pos / Postal Code</label>
										<p class="col-md-12">
											<input type="text" class="form-control" placeholder="Kode Pos" name="kode_pos" id="kode_pos" pattern="^[0-9]*$" value="@if(Session::has('ielts_form')){{session('ielts_form.kode_pos')}}@endif" required>
										</p>

									</div>	
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="row mb-3">
										<label for="" class="col-form-label col-md-12">Alamat Email / Email Address</label>
										<div class="col-md-12">
											<input type="email" name="email" id="email" placeholder="Email"  data-regis-form="Alamat Email / Email Address" value="{{Auth::user()->email}}" data-parsley-type="email" required class="form-control" value="{{$registration_data->EMAIL}}">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="row mb-3">

										<label for="" class="col-form-label col-md-12">Agama / Religion</label>
										<div class="col-md-12">
											<select class="form-control" id="agama" data-regis-form="Agama / Religion" name="agama" required>
												<option value="">Agama</option>
												<option value="Buddha" {{$registration_data->AGAMA == 'Buddha' ? 'selected' : ''}}>Budha</option>
												<option value="Katholik" {{$registration_data->AGAMA == 'Katholik' ? 'selected' : ''}}>Katolik</option>
												<option value="Kristen" {{$registration_data->AGAMA == 'Kristen' ? 'selected' : ''}}>Kristen</option>
												<option value="Kong Hu Cu" {{$registration_data->AGAMA == 'Kong Hu Cu' ? 'selected' : ''}}>Kong Hu Cu</option>
												<option value="Hindu" {{$registration_data->AGAMA == 'Hindu' ? 'selected' : ''}}>Hindu</option>
												<option value="Islam" {{$registration_data->AGAMA == 'Islam' ? 'selected' : ''}}>Islam</option>
											</select>
										</div>

									</div>
								</div>
							</div>
							<div class="form-group row">

								<div class="col-md-8">
									<div class="row">

										<label for="" class="col-form-label col-md-12">No. HP / WA</label>
										<div class="col-md-12">
											<input type="text" name="no_telepon" id="no_telepon" data-regis-form="No. HP / WA" placeholder="08xxxxxxxxxx" Required class='form-control' value="{{$registration_data->KONTAK}}">
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="row tab-wrapper occupation-education">
							<div class="form-group row">
								<div class="col-md-12">
									<strong>Informasi Latar Belakang Pendidikan</strong>
								</div>
								<div class="col-md-6">
									<div class="row">
										<label for="" class="col-md-12 col-form-label">Pendidikan Terakhir</label>
										<div class="col-md-12">
											<select class="form-control" name="pendidikan_terakhir">
												<option value="">- Pilih -</option>
												<option value="S3" {{$registration_data->TINGKAT_PENDIDIKAN == 'S3' ? 'selected' : ''}}>S3</option>
												<option value="S2" {{$registration_data->TINGKAT_PENDIDIKAN == 'S2' ? 'selected' : ''}}>S2</option>
												<option value="S1" {{$registration_data->TINGKAT_PENDIDIKAN == 'S1' ? 'selected' : ''}}>S1</option>
												<option value="Diploma" {{$registration_data->TINGKAT_PENDIDIKAN == 'Diploma' ? 'selected' : ''}}>Diploma</option>
												<option value="SMA/SMK/Setara" {{$registration_data->TINGKAT_PENDIDIKAN == 'SMA/SMK/Setara' ? 'selected' : ''}}>SMA/SMK/Setara</option>
												<option value="SMP/Setara" {{$registration_data->TINGKAT_PENDIDIKAN == 'SMP/Setara' ? 'selected' : ''}}>SMP/Setara</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<label for="" class="col-md-12 col-form-label">Jurusan</label>
										<div class="col-md-12">
											<input type="text" name="jurusan"  placeholder="Jurusan" class="form-control" value="{{$registration_data->TINGKAT_PENDIDIKAN == 'S3' ? 'selected' : ''}}">
										</div>
									</div>
								</div>
							</div>
							<div class="row form-group mb-4">
								<div class="col-md-6">
									<div class="row">
										<label for="" class="col-md-12 col-form-label">Universitas / Sekolah</label>
										<div class="col-md-12">
											<input type="text" name="ref_universitas" placeholder="Nama Universitas / Sekolah" class="form-control" value="{{$registration_data->UNIVERSITAS_TERAKHIR}}">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<label for="" class="col-md-12 col-form-label">Bahasa yang digunakan dirumah</label>
										<div class="col-md-12">
											<input type="text" name="bahasa_sehari_hari" placeholder="Bahasa" class="form-control" value="{{$registration_data->BAHASA_SEHARI_HARI}}">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">

								<div class="col-md-12">
									<strong>Informasi Latar Belakang Pekerjaan</strong>
								</div>
								<div class="col-md-6">
									<div class="row">
										<label for="" class="col-md-12 col-form-label">
											Pekerjaan saat ini
										</label>
										<div class="col-md-12">
											<select class="form-control" name="pekerjaan">
												<option value="Pelajar" {{$registration_data->TINGKAT_PEKERJAAN == 'Pelajar' ? 'selected' : ''}}>Pelajar</option>
												<option value="Mahasiswa" {{$registration_data->TINGKAT_PEKERJAAN == 'Mahasiswa' ? 'selected' : ''}}>Mahasiswa</option>
												<option value="Karyawan" {{$registration_data->TINGKAT_PEKERJAAN == 'Karyawan' ? 'selected' : ''}}>Karyawan</option>
												<option value="Pemilik usaha" {{$registration_data->TINGKAT_PEKERJAAN == 'Pemilik usaha' ? 'selected' : ''}}>Pemilik usaha</option>
												<option value="Wirausaha" {{$registration_data->TINGKAT_PEKERJAAN == 'Wirausaha' ? 'selected' : ''}}>Wirausaha</option>
												<option value="Wiraswasta" {{$registration_data->TINGKAT_PEKERJAAN == 'Wiraswasta' ? 'selected' : ''}}>Wiraswasta</option>
												<option value="Pedagang" {{$registration_data->TINGKAT_PEKERJAAN == 'Pedagang' ? 'selected' : ''}}>Pedagang</option>
												<option value="Buruh lepas" {{$registration_data->TINGKAT_PEKERJAAN == 'Buruh lepas' ? 'selected' : ''}}>Buruh lepas</option>
												<option value="Mengurus rumah tangga" {{$registration_data->TINGKAT_PEKERJAAN == 'Mengurus rumah tangga' ? 'selected' : ''}}>Mengurus rumah tangga</option>
												<option value="Tidak bekerja" {{$registration_data->TINGKAT_PEKERJAAN == 'Tidak bekerja' ? 'selected' : ''}}>Tidak bekerja</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<label for="" class="col-md-12 col-form-label">Bidang Pekerjaan</label>
										<div class="col-md-12">
											<select class="form-control" name="bidang_pekerjaan" required>
												<option value="">- Pilih Bidang Pekerjaan-</option>
												<option value="Petugas Administrasi" {{$registration_data->SEKTOR_PEKERJAAN == 'Petugas Administrasi' ? 'selected' : ''}}>Petugas Administrasi</option>
												<option value="Pertanian, Perikanan, Perhutanan, Pertambangan" {{$registration_data->SEKTOR_PEKERJAAN == 'Pertanian, Perikanan, Perhutanan, Pertambangan' ? 'selected' : ''}}>Pertanian, Perikanan, Perhutanan, Pertambangan</option>
												<option value="Hiburan dan Seni"  {{$registration_data->SEKTOR_PEKERJAAN == 'Hiburan dan Seni' ? 'selected' : ''}}>Hiburan dan Seni</option>
												<option value="Perbankan & Asuransi" {{$registration_data->SEKTOR_PEKERJAAN == 'Perbankan & Asuransi' ? 'selected' : ''}}>Perbankan & Asuransi</option>
												<option value="Katering & Rekreasi" {{$registration_data->SEKTOR_PEKERJAAN == 'Katering & Rekreasi' ? 'selected' : ''}}>Katering & Rekreasi</option>
												<option value="Industri Konstruksi" {{$registration_data->SEKTOR_PEKERJAAN == 'Industri Konstruksi' ? 'selected' : ''}}>Industri Konstruksi</option>
												<option value="Kerajinan Tangan & Design" {{$registration_data->SEKTOR_PEKERJAAN == 'Kerajinan Tangan & Design' ? 'selected' : ''}}>Kerajinan Tangan & Design</option>
												<option value="Pendidikan" {{$registration_data->SEKTOR_PEKERJAAN == "Pendidikan" ? 'selected' : ''}}>Pendidikan</option>
												<option value="Pelayanan Sosial & Kesehatan"  {{$registration_data->SEKTOR_PEKERJAAN == 'Pelayanan Sosial & Kesehatan' ? 'selected' : ''}}>Pelayanan Sosial & Kesehatan</option>
												<option value="Jasa Pemasangan, Pemeliharaan dan Perbaikan" {{$registration_data->SEKTOR_PEKERJAAN == 'Jasa Pemasangan, Pemeliharaan dan Perbaikan' ? 'selected' : ''}}>Jasa Pemasangan, Pemeliharaan dan Perbaikan </option>
												<option value="Hukum & Jasa Hukum" {{$registration_data->SEKTOR_PEKERJAAN == 'Hukum & Jasa Hukum' ? 'selected' : ''}}>Hukum & Jasa Hukum</option>
												<option value="Pabrik & Perakitan" {{$registration_data->SEKTOR_PEKERJAAN == 'Pabrik & Perakitan' ? 'selected' : ''}}>Pabrik & Perakitan</option>
												<option value="Layanan Personal" {{$registration_data->SEKTOR_PEKERJAAN == 'Layanan Personal' ? 'selected' : ''}}>Layanan Personal</option>
												<option value="Perdagangan Eceran" {{$registration_data->SEKTOR_PEKERJAAN == 'Perdagangan Eceran' ? 'selected' : ''}}>Perdagangan Eceran</option>
												<option value="Mesin & Ilmu Ilmiah" {{$registration_data->SEKTOR_PEKERJAAN == 'Mesin & Ilmu Ilmiah' ? 'selected' : ''}}>Mesin & Ilmu Ilmiah</option>
												<option value="Media & Telekomunikasi" {{$registration_data->SEKTOR_PEKERJAAN == 'Media & Telekomunikasi' ? 'selected' : ''}}>Media & Telekomnuikasi</option>
												<option value="Transportasi" {{$registration_data->SEKTOR_PEKERJAAN == 'Transportasi' ? 'selected' : ''}}>Transportasi</option>
												<option value="Utilitas (gas,listrik,air,dll)" {{$registration_data->SEKTOR_PEKERJAAN == 'Utilitas (gas,listrik,air,dll)' ? 'selected' : ''}}>Utilitas (gas,listrik,air,dll)</option>
												<option value="Perdagangan Grosir" {{$registration_data->SEKTOR_PEKERJAAN == 'Perdagangan Grosir' ? 'selected' : ''}}>Perdagangan Grosir</option>
												<option value="Tidak Bekerja" {{$registration_data->SEKTOR_PEKERJAAN == 'Tidak Bekerja' ? 'selected' : ''}}>Tidak Bekerja</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row tab-wrapper course-wrapper">
							<div class="form-group row">
								<div class="col-md-12">
									<strong>Detail Kursus</strong>
								</div>
								<div class="col-md-8">
									<div class="row">
										<label for="" class="col-form-label col-md-12">Paket Bimbel / Course
										</label>
										<div class="col-md-12">
											<input type="hidden" name="jenis_les" id="jenis-les" value="">
											<div></div>
											<input type="hidden" class="form-control" name="id_course" id="course" value="{{$products.'-'.$levels}}">
											<input type="text" class="form-control" name="course" value="{{$products_name.' - '.$levels_name}}" data-regis-form="Paket Bimbel / Course" disabled>
											<!--<select class="form-control" id="course" name="id_course">
												<option value="">- Pilih Course -</option>
												@foreach($paket_bimbel as $data_paket_bimbel)
												<option value="{{$data_paket_bimbel->REF_PAKET.'-'.$data_paket_bimbel->REF_LEVEL}}" {{$data_paket_bimbel->REF_PAKET.'-'.$data_paket_bimbel->REF_LEVEL == $products.'-'.$levels ? 'selected' : '' }}>

													{{$data_paket_bimbel->REF_PAKET.$data_paket_bimbel->REF_LEVEL." "." ".$data_paket_bimbel->PAKET." - ".$data_paket_bimbel->LEVEL}}
												</option>
												@endforeach
											</select>-->
										</div>
									</div>
								</div>

								<div class="col-md-4 ielts-module-wrapper" @if($products != "LT815") style="display:none; @endif">
									<div class="row">
										<label for="" class="col-form-label col-md-12">Module</label>
										<div class="col-md-12">
											<select name="ielts_module" id="ielts_module" data-regis-form="Module" class="form-control" value="">
												<option value="">- Pilih -</option>
												<option value="AC" {{$registration_data->TEST_MODULE == 'AC' ? 'selected' : ''}}>Academic</option>
												<option value="GT" {{$registration_data->TEST_MODULE == 'GT' ? 'selected' : ''}}>General Training</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-4">
									<div class="row">

										<label for="" class="col-form-label col-md-12">Class Group / Kelompok Kelas</label>

										<div class="col-md-12">
											<select class="form-control" data-regis-form="Class Group / Kelompok Kelas" name="id_kelompok_kelas" id="id_kelompok_kelas" required >
												<option value="">- Pilih Kelompok Kelas -</option>
												@foreach($kategori as $data_kategori)
												<option value="{{$data_kategori->KD}}" {{$data_kategori->KD == $categories ? 'selected' : ''}} >

													{{ucwords(strtolower($data_kategori->NAMA))}}</option>
													
													
													@endforeach
												</select>
											</div>

										</div>
									</div>
									<div class="col-md-4">
										<div class="row">

											<label for="" class="col-form-label col-md-12">Tipe Kursus / Course Type</label>
											<div class="col-md-12">
												<select class="form-control" data-regis-form="Tipe Kursus / Course Type" name="tipe_kelas" id="course-types" required>
													<option value="">- Pilih Tipe -</option>
												</select>
											</div>

										</div>
									</div>
									<div class="col-md-4">
										<div class="row">
											<label for="" class="col-form-label col-md-12">Durasi Kelas / Duration</label>
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-12">
														<select class="form-control" id="duration" name="durasi_kelas" data-regis-form="Durasi / Duration" required>
															<option value="">- Pilih Durasi -</option>
														</select>
														<small>Pilih course terlebih dahulu</small>
													</div>

												</div>
											</div>
										</div>
									</div>

								</div>
								<div class=" row">
									<div class="col-md-8">
										<div class="row ">
											<label for=""  class="col-form-label col-md-12">Tujuan Pelatihan / Registration Purposes</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8 mb-1">
												<select class="form-control" data-regis-form="Tujuan Pelatihan / Registration Purposes" id="tujuan" name="tujuan_pelatihan" required>
													<option value="">- Pilih Tujuan -</option>
													<option value="Sekolah Keluar negeri">Sekolah Keluar negeri </option>
													<option value="Beasiswa">Beasiswa</option>
													<option value="Mendaftar WHV">Mendaftar WHV</option>
													<option value="Mendaftar pekerjaan">Mendaftar pekerjaan </option>
													<option value="Mendaftar kenaikan pangkat">Administrasi kenaikan jabatan </option>
													<option value="Bekerja">Bekerja </option>
													<option value="Mengukur kemampuan pribadi ">Mengukur kemampuan pribadi  </option>
													<option value="Lainnya">Lainnya</option>
												</select>
											</div>
											<div class="col-md-4">
												<input type="hidden" class="form-control" placeholder="Tujuan Lainnya" id="tujuan_lainnya" name="tujuan_lainnya" value="">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row tab-wrapper office-wrapper">
								<div class="form-group row">
									<div class="col-md-12">
										<strong>Informasi kontak wali</strong>
									</div>
									<label for="" class="col-md-12 col-form-label">Nama</label>
									<div class="col-md-12">
										<input type="text" class="form-control" name="nama_wali" placeholder="Nama Wali" value="">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-md-12 col-form-label">Hubungan</label>
									<div class="col-md-12">
										<input type="text" class="form-control" name="hubungan" placeholder="Keluarga/Kerabat, Orang Tuan, Kenalan, dll.." value="">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-md-12 col-form-label">No. HP</label>
									<div class="col-md-12">
										<input type="text" class="form-control" name="no_hp_wali" placeholder="No. HP" value="">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-md-12 col-form-label">Email</label>
									<div class="col-md-12">
										<input type="text" class="form-control" name="email_wali" placeholder="Email" value="">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-md-12 col-form-label">Alamat</label>
									<div class="col-md-12">
										<input type="text" class="form-control" name="alamat_wali" placeholder="Alamat" value="">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-md-12 col-form-label">Upload KTP</label>
									<div class="col-md-12">
										<input type="file" name="ktp" value="" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-md-12 col-form-label">Upload KK</label>
									<div class="col-md-12">
										<input type="file" name="kk" value="" required>
									</div>
								</div>
							</div>
							<div class="row tab-wrapper">
								<div class="col-md-12">
									<div class="row">
										

										<div class="col-md-12 mt-3 summary">

											<div class="row mb-3">
												<div class="col-12">
													<h2 class="text-center mb-3">
														Registration Data
													</h2>
												</div>
												<div class="col-12">
													<div class="row" id="summary">
													</div>
												</div>


											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12 text-right">
									<input type="button" class="btn btn-secondary" name="btn-prev" id="btn-prev" value="Previous" onclick="prevTab()" style="display:none">
									<input type="button" class="btn btn-primary" name="btn-next" id="btn-next" value="Next" onclick="nextTab()" disabled>
									<input type="submit" id="btn-submit" name="btn-submit" class="btn btn-primary" value="Submit" style="display:none">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('more-script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript" src="{{asset('js/parsley.js')}}"></script>
<script type="text/javascript">

	var availableDates = {!!json_encode($tgl_test)!!};
	var course_id = '{{$products}}';
	var level_id = '{{$levels}}';
	var invoice_no = '';
	var product_items;
	if(availableDates != ""){
		flatpickr("#TGL_TEST", {
		//maxDate:"+1y",
		enable: [
		function(date){
			//return (date.getMonth() % 2 === 0 && date.getDate() < 15);
			dmy = ('0'+date.getDate()).slice(-2) + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
			if ($.inArray(dmy, availableDates) != -1) {
				return true;
			} else {
				return false;
			}
		}
		],
		onChange:function(selectedDates,dateStr,instance){
			$('#TGL_TEST').val(selectedDates);
		}
	});
	}
	var $select = $('#id_kelompok_kelas').selectize();
	var selectize = $select[0].selectize;
	selectize.setValue("{{$categories}}");
	var currentTab = 0;
	var tabs = $('.tab-wrapper');
	var tab_indicator = $('.inline');

	tabs.each(function(index, section) {
		$(section).find(':input').attr('data-parsley-group', 'block-' + index);
	});
	function close_alert() {
		$('.alert').hide();
	}
	function prevTab(){
		if(currentTab> 0){
			currentTab -= 1;
			if(currentTab == 0){
				$('#btn-prev').hide();
			} 
			$(tabs).hide();
			$(tab_indicator).removeClass('active');
			$(tab_indicator[currentTab]).addClass('active');
			$(tabs[currentTab]).show();
		}

		if(currentTab < (tabs.length - 1)){
			$('#btn-next').show();
			$('#submit').hide();
		}
	}

	$('#id_kelompok_kelas').parsley().on('field:error', function() {
	//$('#id_kelompok_kelas').after("This Field is required");	
});

	function nextTab(){

		$('#myform').parsley().whenValidate({
			group: 'block-' + currentTab
		}).done(function() {
			if(currentTab < (tabs.length - 1)){
				currentTab += 1;
				if(currentTab > 0){
					$('#btn-prev').show();
				}
				$(tabs).hide();
				$(tab_indicator).removeClass('active');
				$(tab_indicator[currentTab]).addClass('active');
				$(tabs[currentTab]).show();
			}
			if(currentTab == (tabs.length - 1)){
				var elements = document.getElementById('myform').elements;

				var output_summary = '';
				for(var i = 0; i < elements.length; i++){

					if(elements[i].dataset.regisForm && elements[i].value != ""){
						if(elements[i].dataset.regisForm == "tanggal_lahir"){
							var tanggal_lahir = $('#tanggal_lahir').val()+"/"+$('#bulan_lahir').val()+"/"+$('#tahun_lahir').val();
							output_summary += '<div class="col-12 mb-3">'+
							'<strong class="summary-label">Tanggal Lahir / Brithdate</strong>'+
							'<div class="summary-value">'+tanggal_lahir+'</div>'+
							'</div>';	
						}else{
							output_summary += '<div class="col-12 mb-3">'+
							'<strong class="summary-label">'+elements[i].dataset.regisForm+'</strong>'+
							'<div class="summary-value">'+elements[i].value+'</div>'+
							'</div>';
						}

					}
				}

				var token = $("input[name='_token']").val();

				$('#summary').html(output_summary);
				$('#btn-submit').show();
				$('#btn-next').hide();
			}
		});
	}

	function formatRupiah(angka, prefix) {

		//var number_string = angka.replace(/[^,\d]/g, '').toString();

		var number_string = angka.toString();
		var split = number_string.split('.');
		var sisa = split[0].length % 3;
		var rupiah = split[0].substr(0, sisa);
		var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah + ',00';
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
	
	function proceed_to_payment(){
		$('.payment-tab').hide();
		$('#payment-method-tab').show();
	}
	function payment_back(){
		$('.payment-tab').hide();
		$('#invoice-tab').show();
	}

	$('#payment-method').on('change',function(){
		var payment_channel = this.value;
		var nama_depan = $('#nama_depan').val();
		var nama_tengah = $('#nama_tengah').val();
		var nama_belakang = $('#nama_belakang').val();
		var nama = nama_depan;
		if(nama_tengah != ""){
			nama+= nama_tengah;
		}
		if(nama_belakang != ""){
			nama += nama_belakang;
		}

		var msisdn = document.getElementById('no_telepon').value;
		var email = document.getElementById('email').value;
		var address = document.getElementById('alamat').value;
		var city = document.getElementById('kota').value;
		var postcode = document.getElementById('kode_pos').value;
		var state = "";
		var region = "";
		$.ajax({
			url : "{{route('api-product-transaction')}}",
			method : "POST",
			data:{
				bill_no:invoice_no,
				bill_reff:invoice_no,
				bill_date:invoice_date,
				bill_expired:invoice_expired,
				cust_name : nama,
				payment_channel: payment_channel,
				msisdn: msisdn,
				email: email,
				billing_address: address,
				billing_address_city: city,
				billing_address_region: region,
				billing_address_state: state,
				billing_address_postcode: postcode,
				billing_address_country_code:"ID",
				receiver_name_for_shipping : nama,
				shipping_address: address,
				shipping_address_city: city,
				shipping_address_region: region,
				shipping_address_state: state,
				shipping_address_postcode: postcode,
				shipping_address_country_code:"ID",
				item: product_items
			},
			success:function(data){
				console.log(data);
				alert(data.redirect_url);
			},
			error:function(){
				alert('error');
			}
		});
	})


	document.getElementById('btn-submit').addEventListener('click',function(e){
		e.preventDefault();	
		Swal.fire({
			title: 'Are you sure want to submit registration data ?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
		}).then((result) => {
			if (result.value) {
				$('.loading-wrapper').show();
				document.getElementById('myform').submit();
			}
		});
	});

	$(document).ready(function(){
		if(document.getElementById('agree').checked){
			document.getElementById('btn-next').disabled = false;
		}else{
			document.getElementById('btn-next').disabled = true;
		}
	});
	document.getElementById('agree').addEventListener('change', function() {
		if (this.checked) {
			document.getElementById('btn-next').disabled = false;
		} else {
			document.getElementById('btn-next').disabled = true;
		}
	});
	$("document").ready(function(){
		setTimeout(function(){
			$("div.alert").remove();
    }, 5000 ); // 5 secs

	});
	$('#tujuan').change(function(){
		if($(this).val() == 'Lainnya'){
			$("#tujuan_lainnya").prop('type', "text");
			$("#tujuan_lainnya").prop('required', true);
		}else{
			$("#tujuan_lainnya").prop('type', "hidden");
			$("#tujuan_lainnya").prop('required', false);
		}
	});

	$(document).ready(function(){
		
		if($('#course').val() != ""){
			var arr_kd = $('#course').val().split("-");
			var course_id = arr_kd[0];
			var level_id = arr_kd[1];
			if(course_id == "PT615"){
				$('.ielts-module-wrapper').show();
			}else{
				$('.ielts-module-wrapper').hide();
			};

			var token = $("input[name='_token']").val();
			$.ajax({
				url: "<?php echo route('select-course') ?>",
				method: 'POST',

				data: {course_id:course_id,level_id:level_id,_token:token},
				success: function(data) {
					data = JSON.parse(data);
					let dropdown = $('#duration');
					let dropdown2 = $('#course-types');
					//let dropdown3 = $('#id_kelompok_kelas');
					//console.log(dropdown3);

					dropdown.empty();
					dropdown2.empty();
					//dropdown3.empty();
					dropdown.append('<option selected="true" disabled>- Pilih Durasi -</option>');
					dropdown.prop('selectedIndex', 0);
					$.each(data.durations,function(k,v){
						dropdown.append($('<option></option>').attr('value', v.JUMLAH_JAM).text(v.JUMLAH_JAM));
					});

					dropdown2.append('<option value="" disabled selected="true">- Pilih Tipe -</option>');
					dropdown2.append('<option value="OFFLINE">Offline</option>');
					dropdown2.prop('selectedIndex', 0);
					$.each(data.types,function(k,v){
						text = v.type.toLowerCase();
						dropdown2.append($('<option></option>').attr('value', v.type).text(text[0].toUpperCase()+ text.slice(1)));
					});

    /*dropdown3.append('<option value="" disabled>- Pilih Kelompok Kelas -</option>');
    dropdown3.prop('selectedIndex', 0);
    $.each(data.groups,function(k,v){
    	dropdown3.append($('<option></option>').attr('value', v.REF_KATEGORI).text(v.NAMA));
    });*/

},   error: function()
{
	alert('error...');
}
});
		}
	});

	$("#course").change(function(){
		var arr_kd = $(this).val().split("-");
		var course_id = arr_kd[0];
		var level_id = arr_kd[1];
		if(course_id == "PT615"){
			$('.ielts-module-wrapper').show();
		}else{
			$('.ielts-module-wrapper').hide();
		};

		var token = $("input[name='_token']").val();
		$.ajax({
			url: "<?php echo route('select-course') ?>",
			method: 'POST',
			data: {course_id:course_id,level_id:level_id,_token:token},
			success: function(data) {
				data = JSON.parse(data);
				let dropdown = $('#duration');
				let dropdown2 = $('#course-types');
				let dropdown3 = $('#id_kelompok_kelas');
				console.log(dropdown3);

				dropdown.empty();
				dropdown2.empty();
				dropdown3.empty();
    /*<option value="">- Pilih Tipe -</option>
    */
    dropdown.append('<option selected="true" disabled>- Pilih Durasi -</option>');
    dropdown.prop('selectedIndex', 0);
    $.each(data.durations,function(k,v){
    	dropdown.append($('<option></option>').attr('value', v.JUMLAH_JAM).text(v.JUMLAH_JAM));
    });

    dropdown2.append('<option value="" disabled selected="true">- Pilih Tipe -</option>');
    dropdown2.append('<option value="OFFLINE">Offline</option>');
    dropdown2.prop('selectedIndex', 0);
    $.each(data.types,function(k,v){
    	text = v.type.toLowerCase();
    	dropdown2.append($('<option></option>').attr('value', v.type).text(text[0].toUpperCase()+ text.slice(1)));
    });

    dropdown3.append('<option value="" disabled selected="true">- Pilih Kelompok Kelas -</option>');
    dropdown3.prop('selectedIndex', 0);
    $.each(data.groups,function(k,v){
    	dropdown3.append($('<option></option>').attr('value', v.REF_KATEGORI).text(v.NAMA));
    });

},   error: function()
{
	alert('error...');
}
});
	});
	$('#level').change(function(){
		$("#duration .select-ajax").remove();
		var arr_level = $(this).val().split('##');
		var level_id = arr_level[0];
		var course_id = arr_level[1];
		var token = $("input[name='_token']").val();
		$.ajax({
			url: "<?php echo route('select-level') ?>",
			method: 'POST',
			data: {level_id:level_id,course_id:course_id, _token:token},
			success: function(data) {
				if($('#jenis-les').val() != ""){   
					$('#duration').html("");
					$('#duration').append("<option value='0##30'>30 Jam</option><option value='0##60'>60 Jam</option>");
				}else{
					$('#duration').html("");
					$('#duration').append(data);
				}
			},   error: function()
			{
         //handle errors
         alert('error...');
     }
 });
	});
</script>
@endpush