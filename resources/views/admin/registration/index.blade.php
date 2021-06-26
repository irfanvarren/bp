@extends('layouts.app-auth')
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.multidatespicker.css')}}">
<style media="screen">
.loading-wrapper{
	width:100vw;
	height:100vh;
	position:fixed;
	top:0;
	left:0;
	z-index:9999999;
	display:none;
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
.desc-title{
	font-size:12px;
	color:black;
}
.sales-input{
	padding-left:35px;
}
@media screen and (max-width: 1200px){
	.sales-input{
		padding-left: 15px;
	}
}
.left{
	width:140px;
}
.right{
	flex-grow: 1;
}
.myBtn{
	text-align: center;
	line-height: 1 !important;
	padding:10px;
}
.myBtn > .material-icons{
	font-size:38px;
	line-height: 1;
}


@media screen and (max-width: 480px){
	.mobile-pl3{
		padding-left: 15px !important;
	}
}
</style>
@endpush
@section('content')
<div class="loading-wrapper">
	<img src="{{asset('/img/loading.gif')}}" alt="">
</div>
@csrf	
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered mymodal" style="max-width:1200px !important" role="document">

		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Students Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="" action="" id="form-input">
					
					<div class="row">
						<div class="card">
							<div class="card-header card-header-tabs card-header-rose">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<span class="nav-tabs-title">Select:</span>
										<ul class="nav nav-tabs" data-tabs="tabs">

											<li class="nav-item">
												<a class="nav-link" href="#student-list" data-toggle="tab" onclick="load_student_list()" id="open-student-list">
													<i class="material-icons">person</i> Siswa
													<div class="ripple-container"></div>
													<div class="ripple-container"></div>
												</a>

											</li>
										<!-- 	<li class="nav-item">
												<a class="nav-link" href="#student-candidate-list" data-toggle="tab" onclick="load_student_candidate_list()" id="open-student-candidate-list">
													<i class="material-icons">person</i> Calon Siswa
													<div class="ripple-container"></div>
													<div class="ripple-container"></div>
												</a>

											</li> -->
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body" >
								<div class="d-flex mb-3">
									<span class="pt-2">Cari</span><div style="flex-grow: 1;" class="mx-2"><input type="text" class="form-control" name="filter_keyword" id="filter_keyword" value=""></div><button class="btn btn-primary" type="button" id="filter-btn">search</button>
								</div>
								<div id="student-list-output"></div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">{{ __('Registration Data') }}</h4>
						<p class="card-category"> {{ __('Registration Data') }}</p>
					</div>
					<div class="card-body">
						@if (session('status'))
						<div class="row">
							<div class="col-sm-12">
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<i class="material-icons">close</i>
									</button>

									<span>{{ session('status') }}</span>
								</div>
							</div>
						</div>
						@endif
						<form action="{{url('admin/registration')}}" onsubmit="submit_registration_form(event)" id="registration-form" method="POST">
							@csrf
							<div class="row">
								<div class="col-md-12 mb-3">
									<div style="background:#cedbf2;" class="p-3">
										<button class="myBtn" type="submit" name="cmd" value="add"><span  class="material-icons-outlined material-icons">save</span></button>
										<!-- <button class="myBtn" type="submit" name="cmd" value="delete"><span  class="material-icons-outlined material-icons">delete</span></button>
											<button class="myBtn" type="submit" name="cmd" value="edit"><span  class="material-icons-outlined material-icons" >edit</span></button> -->
										</div>
									</div>
									<div class="col-md-12 col-lg-7">
										<div class="row mb-3">
											<label class="col-md-12 col-xl-3 m-0 d-flex align-items-center">
												Kode 
											</label>
											<div class="col-md-12 col-xl-9">
												<div class="row">
													<div class="d-flex col-lg-12">
														<div class="w-100 mr-2">
															<div class="desc-title">Perusahaan</div>
															<select class="form-control" data-style="select-with-transition" name="KD_PERUSAHAAN" id="KD_PERUSAHAAN" style="height: 36px;" required>
																@foreach($companies as $company)
																<option value="{{$company->INISIAL}}">{{$company->INISIAL}}</option>
																@endforeach
															</select>
														</div>
														<div class="w-100 mr-2">
															<div class="desc-title">Tahun Bulan</div>
															<input type="text" class="form-control monthPicker" placeholder="yyyy mm" value="{{date('Y m')}}" name="TAHUN_BULAN" id="TAHUN_BULAN" required>
														</div>
														<div class="w-100">
															<div class="desc-title">Urutan</div>
															<input type="number" class="form-control" value="{{$no}}" name="NO" id="NO" required readonly>
														</div>
														<div class="d-flex">
															<button type="button" class="mt-auto mx-1" style="height: 36px;">...</button>
															<button type="button" class="mt-auto" style="height: 36px;">BARU</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="row mb-3">
											<label class="col-md-12 col-xl-4 m-0 d-flex align-items-center">
												Perusahaan
											</label>
											<div class="col-md-12 col-xl-8">
												<select class="form-control" data-style="select-with-transition" name="REF_PERUSAHAAN" id="REF_PERUSAHAAN" style="height: 36px;" required>
													<option value=""> - Pilih Perusahaan - </option>
													@foreach($companies as $company)
													<option value="{{$company->KD}}">{{$company->NAMA}}</option>
													@endforeach
												</select>
												<div>
													<input type="text" class="form-control" name="DEFAULT_CURR" id="DEFAULT_CURR" value="IDR" style="max-width:50%;height:24px;">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-7 ">
										<div class="row">
											<label class="col-xl-3 pt-2" required>Tgl Daftar</label>
											<div class="col-xl-9">
												<input type="date" class="form-control" value="{{date('d/m/Y')}}" id="TGL" name="TGL">
											</div>
										</div>
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-md-4">
										<div class="row">
											<label class="col-lg-12 col-xl-4 pt-2">
												Sales
											</label>
											<div class="col-lg-12 col-xl-8 sales-input">
												<select class="form-control" name="REF_SALES" id="REF_SALES" required>
													<option value=""> - Pilih Sales - </option>
													@foreach($sales as $data_sales)
													<option value="{{$data_sales->KD}}">{{$data_sales->KD}} - {{$data_sales->NAMA}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-7">
										<div class="row">
											<label class="col-xl-3 pt-2">
												Keterangan
											</label>
											<div class="col-xl-9">
												<input type="text" class="form-control" id="KET" name="KET">
											</div>
										</div>
									</div>
								</div>
							</form>
							<div class="row mb-3">
								<div class="col-md-12">
									<div class="card card-nav-tabs card-plain">
										<div class="card-header card-header-danger">
											<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
											<div class="nav-tabs-navigation">
												<div class="nav-tabs-wrapper">
													<ul class="nav nav-tabs" data-tabs="tabs">
														<li class="nav-item">
															<a class="nav-link student active" href="#student" onclick="openTab('student')">Siswa</a>
														</li>
														@if(count($temp_student_detail))
														<li class="nav-item">
															<a class="nav-link packet" href="#packet" onclick="openTab('packet')">Paket</a>
														</li>
													<!-- <li class="nav-item">
														<a class="nav-link parent" href="#parent" onclick="openTab('parent')">Wali</a>
													</li> -->
													@endif
													@if(count($student_detail))
													<li class="nav-item">
														<a class="nav-link certificate" href="#certificate" onclick="openTab('certificate')">Sertifikat</a>
													</li>
													<li class="nav-item">
														<a class="nav-link document" href="#document" onclick="openTab('document')">Dokumen</a>
													</li>
													<li class="nav-item">
														<a class="nav-link system" href="#system" onclick="openTab('system')">Sistem</a>
													</li>
													@endif
												</ul>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="tab-content">
											<div class="tab-pane active" id="student">
												<form onsubmit="submit_form_siswa(event)" id="form-siswa" method="POST" enctype="multipart/form-data">
													@csrf
													<div class="row">
														<div class="col-md-6">
															<div class="row">
																<div class="col-md-12">
																	<div class="d-flex">
																		<div class="mr-3 left">
																			<span style="position: absolute;left: 20px;top: 3px;background:white;">Gambar</span>
																			<div style="border:1px dotted black;width: 140px;height: 140px;margin-top:15px;"></div>
																		</div>
																		<div class="right">
																			<div class="row">
																				<div class="col-md-8">
																					<div class="row">
																						<div class="col-md-12 text-left">
																							<label class="pl-0 col-form-label">
																								Siswa
																							</label>
																						</div>
																						<div class="col-md-12">
																							<div class="d-flex">
																								<div style="flex-grow:1">
																									<input type="text" class="form-control" name="REF_SISWA" id="REF_SISWA" required>
																								</div>
																								<button type="button" onclick="open_student_list()">...</button>
																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="col-md-4">
																					<div class="row">
																						<div class="col-md-12 text-left">
																							<label class="pl-0 col-form-label">
																								Title
																							</label>
																						</div>
																						<div class="col-md-12">
																							<input type="text" class="form-control" name="TITLE" id="TITLE" required>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-md-8">
																					<div class="row">
																						<div class="col-md-12 text-left">
																							<label class="pl-0 col-form-label">
																								Nama
																							</label>
																						</div>
																						<div class="col-md-12">
																							<input type="text" class="form-control" name="NAMA" id="NAMA" required>
																						</div>
																					</div>
																				</div>
																				<div class="col-md-4">
																					<div class="row">
																						<div class="col-md-12 text-left">
																							<label class="pl-0 col-form-label">
																								JK
																							</label>
																						</div>
																						<div class="col-md-12">
																							<input type="text" class="form-control" name="JK"  id="JK" required>
																						</div>
																					</div>
																				</div>

																			</div>
																		</div>
																	</div>
																	<div class="mt-3 d-flex">
																		<div class="left mr-3">
																			<label class="col-form-label pl-0">
																				Tgl Lahir
																			</label>
																		</div>
																		<div class="right">
																			<input type="date" class="form-control" name="TGL_LAHIR" id="TGL_LAHIR" required>
																		</div>
																	</div>
																	<div class="mt-3 d-flex">
																		<div class="left mr-3">
																			<label class="col-form-label pl-0">
																				Alamat
																			</label>
																		</div>
																		<div class="right">
																			<input type="text" class="form-control" name="ALAMAT" id="ALAMAT" required>
																		</div>
																	</div>
																	<div class="mt-3 d-flex">
																		<div class="left mr-3">
																			<label class="col-form-label pl-0">
																				Kontak
																			</label>
																		</div>
																		<div class="right">
																			<div class="row">
																				<div class="col-lg-4">
																					<input type="text" class="form-control" name="KONTAK_1" id="KONTAK_1" placeholder="Kontak 1" required>
																				</div>
																				<div class="col-lg-4">
																					<input type="text" class="form-control" name="KONTAK_2" id="KONTAK_2" placeholder="Kontak 2">
																				</div>
																				<div class="col-lg-4">
																					<input type="text" class="form-control" name="KONTAK_3" id="KONTAK_3" placeholder="Kontak 3">
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="mt-3 d-flex">
																		<div class="left mr-3">
																			<label class="col-form-label pl-0">
																				Email
																			</label>
																		</div>
																		<div class="right">
																			<input type="text" class="form-control" name="EMAIL" id="EMAIL" required>
																		</div>
																	</div>
																	<div class="mt-3 d-flex">
																		<div class="left mr-3">
																			<label class="col-form-label pl-0">
																				NIK
																			</label>
																		</div>
																		<div class="right">
																			<input type="text" name="REF_NIK" id="REF_NIK" class="form-control" required>
																		</div>
																	</div>
																	<div class="mt-3 d-flex">
																		<div class="left mr-3">
																			<label class="col-form-label pl-0">
																				NPWP
																			</label>
																		</div>
																		<div class="right">
																			<input type="text" name="REF_NPWP" id="REF_NPWP" class="form-control">
																		</div>
																	</div>
																	<div class="mt-3 d-flex">
																		<div class="left mr-3">
																			<label class="col-form-label pl-0">
																				Paspor
																			</label>
																		</div>
																		<div class="right">
																			<input type="text" name="REF_PASPOR" id="REF_PASPOR" class="form-control">
																		</div>
																	</div>
																</div>
															</div>

														</div>
														<div class="col-md-6 pl-5 mobile-pl3">
															<div class="row mb-3">
																<label class="col-form-label col-lg-4 text-left">
																	Occupation Level
																</label>
																<div class="col-lg-8">
																	<select class="form-control" name="OCCLVL" id="OCCLVL" required>
																		<option value="Pelajar">Pelajar</option>
																		<option value="Mahasiswa">Mahasiswa</option>
																		<option value="Karyawan">Karyawan</option>
																		<option value="Pemilik usaha">Pemilik usaha</option>
																		<option value="Wirausaha">Wirausaha</option>
																		<option value="Wiraswasta">Wiraswasta</option>
																		<option value="Pedagang">Pedagang</option>
																		<option value="Buruh lepas">Buruh lepas</option>
																		<option value="Mengurus rumah tangga">Mengurus rumah tangga</option>
																		<option value="Tidak bekerja">Tidak bekerja</option>
																	</select>
																</div>
															</div>
															<div class="row mb-3">
																<label class="col-form-label col-lg-4 text-left">
																	Occupation Sector
																</label>
																<div class="col-lg-8">
																	<select class="form-control" name="OCCSEC" id="OCCSEC" required>
																		<option value="">- Pilih Bidang Pekerjaan-</option>
																		<option value="Petugas Administrasi">Petugas Administrasi</option>
																		<option value="Pertanian, Perikanan, Perhutanan, Pertambangan">Pertanian, Perikanan, Perhutanan, Pertambangan</option>
																		<option value="Hiburan dan Seni">Hiburan dan Seni</option>
																		<option value="Perbankan & Asuransi">Perbankan & Asuransi</option>
																		<option value="Katering & Rekreasi">Katering & Rekreasi</option>
																		<option value="Industri Konstruksi">Industri Konstruksi</option>
																		<option value="Kerajinan Tangan & Design">Kerajinan Tangan & Design</option>
																		<option value="Pendidikan">Pendidikan</option>
																		<option value="Pelayanan Sosial & Kesehatan">Pelayanan Sosial & Kesehatan</option>
																		<option value="Jasa Pemasangan, Pemeliharaan dan Perbaikan">Jasa Pemasangan, Pemeliharaan dan Perbaikan </option>
																		<option value="Hukum & Jasa Hukum">Hukum & Jasa Hukum</option>
																		<option value="Pabrik & Perakitan">Pabrik & Perakitan</option>
																		<option value="Layanan Personal">Layanan Personal</option>
																		<option value="Perdagangan Eceran">Perdagangan Eceran</option>
																		<option value="Mesin & Ilmu Ilmiah">Mesin & Ilmu Ilmiah</option>
																		<option value="Media & Telekomunikasi">Media & Telekomnuikasi</option>
																		<option value="Transportasi">Transportasi</option>
																		<option value="Utilitas (gas,listrik,air,dll)">Utilitas (gas,listrik,air,dll)</option>
																		<option value="Perdagangan Grosir">Perdagangan Grosir</option>
																		<option value="Tidak Bekerja">Tidak Bekerja</option>
																	</select>
																</div>
															</div>
															<div class="row mb-3">
																<label class="col-form-label col-lg-4 text-left">
																	Education Level
																</label>
																<div class="col-lg-8">
																	<select class="form-control" name="EDUC" id="EDUC" required>
																		<option value="">- Pilih -</option>
																		<option value="S3">S3</option>
																		<option value="S2">S2</option>
																		<option value="S1">S1</option>
																		<option value="Diploma">Diploma</option>
																		<option value="SMA/SMK/Setara">SMA/SMK/Setara</option>
																		<option value="SMP/Setara">SMP/Setara</option>
																	</select>
																</div>
															</div>

															<div class="row mb-3">
																<label class="col-form-label col-lg-4 text-left">
																	Target Country
																</label>
																<div class="col-lg-8">
																	<input type="text" class="form-control" name="COUNTRY" id="COUNTRY" required>

																</div>
															</div>
															<div class="row mb-3">
																<label class="col-form-label col-lg-4 text-left">
																	Years of english study
																</label>
																<div class="col-lg-8">
																	<input type="text" class="form-control" name="YEAR_STUDY_TEXT" id="YEAR_STUDY_TEXT">
																</div>
															</div>
															<div class="row mb-3">
																<label class="col-form-label col-lg-4 text-left">
																	Purpose
																</label>
																<div class="col-lg-8">
																	<input type="text" class="form-control" name="PURPOSE" id="PURPOSE">
																	<div class="row">
																	<div class="col-lg-12">
																		<div class="row">
																			<label class="col-lg-3 col-form-label text-left">
																				Degree
																			</label>
																			<div class="col-lg-9">
																				<input type="text" class="form-control" name="DEGREE" id="DEGREE">
																			</div>
																		</div>
																		<div class="row">
																			<label class="col-lg-3 col-form-label text-left">
																				Course
																			</label>
																			<div class="col-lg-9">
																				<input type="text" class="form-control" name="COURSE" id="COURSE">
																			</div>
																		</div>
																	</div>
																	</div>
																</div>
															</div>
															<div class="row mb-3">
																<label class="col-form-label col-lg-4 text-left">
																	Have you taken IELTS before
																</label>
																<div class="col-lg-8 pt-3">
																	<div class="form-check-inline">
																		<label class="form-check-label">
																			<input type="radio" name="IELTS_ISTAKEN" id="IELTS_ISTAKEN-YES" value="1" required> YES
																		</label>
																	</div>
																	<div class="form-check-inline">
																		<label class="form-check-label">
																			<input type="radio" name="IELTS_ISTAKEN" id="IELTS_ISTAKEN-NO" value="0" required checked> NO
																		</label>
																	</div>
																	<div class="col-lg-12">
																		<div class="row">
																			<label class="col-lg-3 col-form-label text-left">
																				Date of test 	
																			</label>
																			<div class="col-lg-9">
																				<input type="date" class="form-control" name="DATE_TEST" id="DATE_TEST">
																			</div>
																		</div>
																		<div class="row">
																			<label class="col-lg-3 col-form-label text-left">
																				Location
																			</label>
																			<div class="col-lg-9">
																				<input type="text" class="form-control" name="LOCATION" id="LOCATION">
																			</div>
																		</div>
																	</div>
																</div>
															</div>


														</div>
													</div>
													<div class="row  mt-3">
														<div class="col-sm-8">
															<button class="btn btn-primary w-100">Tambah Murid</button>
														</div>
														<div class="col-sm-4">
															Total Item : {{count($temp_student_detail)}}
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-12" id="temp-student-output">
															<div class="table-responsive">
																<table class="table table-bordered">
																	<thead>
																		<tr>
																			<th>No Siswa</th><th>Title</th><th>Nama</th><th>JK</th><th>Tgl Lahir</th><th>Agama</th><th>Alamat</th><th>Kota</th><th>Action</th>
																		</tr>
																	</thead>
																	<tbody>
																		@foreach($temp_student_detail as $temp)
																		<tr>
																			<th>{{$temp->REF_SISWA}}</th><th>{{$temp->TITLE}}</th><th>{{$temp->NAMA}}</th><th>{{$temp->JK}}</th><th>{{$temp->TGL_LAHIR}}</th><th>{{$temp->AGAMA}}</th><th>{{$temp->ALAMAT}}</th><th>{{$temp->REF_KOTA}}</th><th><button class="btn btn-danger" type="button" onclick="delete_temp_student('{{$temp->KD_GABUNG}}','{{$temp->REF_SISWA}}')">Delete</button></th>
																		</tr>
																		@endforeach
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</form>
											</div>
											<div class="tab-pane" id="packet">
												<form onsubmit="submit_form_packet(event)" id="form-packet" method="POST" enctype="multipart/form-data">
													@csrf
													<input type="hidden" name="REF_SISWA" id="REF_SISWA" value="">
													<div class="row mb-3">
														<div class="col-md-3">
															<div>Pricelist</div>
															<select class="form-control selectize" name="REF_PRICELIST" id="REF_PRICELIST" onchange="select_pricelist(this)">
																<option value="">- Pilih Pricelist -</option>
																@foreach($pricelists as $pricelist)
																<option value="{{$pricelist->REF_PRICELIST}}">{{$pricelist->name}}</option>
																@endforeach
															</select>
														</div>
														<div class="col-md-3">
															<div>Paket</div>
															<select class="form-control selectize" name="REF_PAKET" id="REF_PAKET" onchange="select_course(this)">
																<option value="">- Pilih Paket - </option>

															</select>
														</div>
														<div class="col-md-3">
															<div>Level</div>
															<select class="form-control selectize" name="REF_LEVEL" id="REF_LEVEL" onchange="select_level(this)">
																<option value="">- Pilih Level - </option>
															</select>
														</div>
														<div class="col-md-3">
															<div>Kategori</div>
															<select class="form-control selectize" name="REF_KAT" id="REF_KAT" onchange="select_category(this)">
																<option value="">- Pilih Kategori - </option>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-5" >
															<div id="temp-student-output"></div>
															<div class="row mb-3">
																<div class="col-md-8">
																	<div>Jumlah Jam / Pertemuan</div>
																	<div>
																		<select class="form-control" name="JUMLAH_JAM_PERTEMUAN" id="JUMLAH_JAM_PERTEMUAN" onchange="select_duration(this)" required>
																			<option value=""> - Pilih Jumlah Jam / Pertemuan -</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-4">
																	<div>Harga Paket</div>
																	<div>
																		<input type="text" class="form-control" name="HARGA_PAKET" id="HARGA_PAKET" readonly>
																	</div>
																</div>
															</div>
															<div class="row mb-3">
																<div class="col-md-4">
																	<div>DPP</div>
																	<div>
																		<input type="text" class="form-control" name="DPP" id="DPP">
																	</div>
																</div>
																<div class="col-md-4">
																	<div>PPN</div>
																	<div>
																		<input type="text" class="form-control" name="PPN" id="PPN" value="0">
																	</div>
																</div>
																<div class="col-md-4">
																	<div>PPH</div>
																	<div>
																		<input type="text" class="form-control" name="PPH" id="PPH" value="0">
																	</div>
																</div>

															</div>
															<div class="row mb-3">
																<div class="col-md-12">
																	<div>Total</div>
																	<div>
																		<input type="text" class="form-control" name="TOTAL" id="TOTAL">
																	</div>
																</div>

															</div>
															<div class="row mb-3">
																<div class="col-md-12">
																	<div>Keterangan</div>
																	<div>
																		<input type="text" class="form-control" name="KET" id="KET">
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-1 text-center">
															<button class="btn btn-primary h-100 w-100 text-center" type="submit" style="padding:0 !important;max-width:45px;"> > </button>
														</div>
														<div class="col-lg-6 ">
															<div id="detail-packet-output"  style="overflow-x:auto">
																
															</div>
															<div class="row mt-3">
																<div class="col-md-3">
																	<h5>TOTAL :</h5>
																</div>
																<div class="col-md-9 text-right">
																	<h5 id="total-text">0</h5>
																</div>
															</div>
															<div class="row">
																<div class="col-md-3">
																	<h5>Bayar :</h5>
																</div>
																<div class="col-md-9 text-right">
																	<div class="row">
																		<div class="col-md-6">
																			<select class="form-control" onchange="select_akun(this)">
																				<option value=""> - Pilih Akun -</option>
																				@foreach($accounts as $account)
																				<option value="{{$account->KD}}"> {{$account->KD}} -  {{$account->NAMA}}</option>
																				@endforeach
																			</select>
																		</div>
																		<div class="col-md-6">
																			<select class="form-control">
																				<option value=""> - Bukti Pembayaran - </option>
																			</select>
																			<input type="file" class="mt-2" name="">
																		</div>
																	</div>

																</div>
															</div>
														</div>
													</div>
												</form>
											</div>
											<div class="tab-pane" id="parent">
												<div class="row">
													<div class="col-md-6">
														<div class="row mb-3">
															<div class="col-md-12">
																<div>Kode Wali</div>
																<div>
																	<input type="text" class="form-control" name="KD_WALI">
																</div>
															</div>
														</div>
														<div class="row mb-3">
															<div class="col-md-12">
																<div>Nama Wali</div>
																<div>
																	<input type="text" class="form-control" name="KD_WALI">
																</div>
															</div>
														</div>
														<div class="row mb-3">
															<div class="col-md-12">
																<div>NIK</div>
																<div>
																	<input type="text" class="form-control" name="KD_WALI">
																</div>
															</div>
														</div>
														<div class="row mb-3">
															<div class="col-md-12">
																<div>KONTAK</div>
																<div>
																	<input type="text" class="form-control" name="KD_WALI">
																</div>
															</div>
														</div>
														<div class="row mb-3">
															<div class="col-md-12">
																<div>EMAIL</div>
																<div>
																	<input type="text" class="form-control" name="KD_WALI">
																</div>
															</div>
														</div>
													</div>
													<div  class="col-md-6"></div>
												</div>

											</div>
											<div class="tab-pane" id="certificate">

											</div>
											<div class="tab-pane" id="document">

											</div>
											<div class="tab-pane" id="system">
												
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
						
						
						<!-- <div class="row mb-3">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-striped table-no-bordered table-hover datatable mdl-data-table dataTable dtr-inline collapsed" id="dataTable">
										<thead>
											<tr>
												<th>Kode</th> 
												<th>Tanggal</th>
												<th>Perusahaan</th>
												<th>Sales</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											@foreach($registrations as $registration)
											<tr>
												<td>{{$registration->KD_GABUNG}} </td>
												<td>{{$registration->TGL}}</td>
												<td>{{$registration->REF_PERUSAHAAN}}</td>
												<td>{{$registration->REF_SALES}}</td>
												<td>
													<button class="btn btn-edit">Edit</button>
													<button class="btn btn-delete">Delete</button>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>

							</div>
						</div> -->

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$('.selectize').selectize();
	var token = $("input[name='_token']").val();
	var type = "student";
	var page = null;
	var confirm_student_input = "false";
	function debounce(func, wait, immediate) {
		var timeout;
		return function() {
			var context = this, args = arguments;
			var later = function() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	};

	function open_student_list(){
		$('#mymodal').modal('toggle');
		$('#filter_keyword').val("");
		$('#open-student-list').click();
	}

	function load_student_list(){
		type = "student";
		var keyword = $('#filter_keyword').val();
		$.ajax({
			url:"{{route('admin-student.lists')}}",
			method:"GET",
			data: {
				_token: token,
				type:type,
				keyword:keyword
			},
			success: function(data) {
				$('#student-list-output').html(data);
			},
			error:function(){

			}
		});

	}

	function load_student_candidate_list(){
		type = "student-candidate";
		var keyword = $('#filter_keyword').val();
		$.ajax({
			url:"{{route('admin-student.lists')}}",
			method:"GET",
			data: {
				_token: token,
				type:type,
				keyword:keyword
			},
			success: function(data) {
				$('#student-list-output').html(data);
			},
			error:function(){

			}
		});
	}


	var filter_func = function(){
		var keyword = $('#filter_keyword').val();
		$.ajax({
			url : "{{route('admin-student.lists')}}",
			method: "GET",
			data : {
				_token : token,
				keyword : keyword,
				page:page,
				type: type
			},
			success: function(data){
				$('#student-list-output').html(data);
			},
			error: function(){

			},complete: function(){
				
			}
		});

	};
	var keyword_keyup = debounce(filter_func, 350);

	document.getElementById('filter_keyword').addEventListener('keyup', keyword_keyup);
	document.getElementById('filter-btn').addEventListener('click', filter_func);



	function filter_func_pagination(no){
		page = no;
		filter_func();
	}

	function openTab(tab){
		if(tab == "packet"){
			load_temp_student('#'+tab,'select');
			load_regis_detail();
		}
		$('.nav-link.'+tab).tab('show');
	}

	function load_temp_student(parent = null,cmd = null){
		$.ajax({
			url : "{{route('admin-temp-student.show')}}",
			method : "POST",
			data:{
				_token : token,
				cmd: cmd,
				parent : parent
			},
			success:function(data){
				if(parent != null){
					$(parent+' #temp-student-output').html(data);
				}else{
					$('#temp-student-output').html(data);
				}
			},error:function(){}
		});
	}

	function load_regis_detail(){
		var TAHUN_BULAN = $('#TAHUN_BULAN').val();
		var KD_PERUSAHAAN = $('#KD_PERUSAHAAN').val();
		var NO = $('#NO').val();
		$.ajax({
			url : "{{route('admin-temp-student-packet.show')}}",
			method : "POST",
			data:{
				_token : token,
				TAHUN_BULAN : TAHUN_BULAN,
				KD_PERUSAHAAN : KD_PERUSAHAAN,
				NO : NO
			},
			success:function(data){
				var arr_data = data.split('###');
				var html_output = arr_data[0];
				var total = arr_data[1];
				$('#detail-packet-output').html(html_output);
				$('#total-text').html(total);
			},error:function(){}
		});
	}

	function select_student(parent = null, REF_SISWA = null,index){
		if(parent != null && REF_SISWA != null){
			$(parent+' #temp-student-output table tbody tr').css({
				'background' : 'white'
			});
			$(parent+' #temp-student-output table tbody tr')[index].style.background = "#ededed";
			$(parent+' #REF_SISWA').val(REF_SISWA);

		}
	}

	function select_student_list(e,check){
		var data_student = JSON.parse(e.getAttribute("data-student"));
		if(check == true){
			$.ajax({
				url : "{{route('admin-student.check-student-exist')}}",
				method : "GET",
				data:{
					_token:token,
					NAMA : data_student.NAMA,
					REF_NIK : data_student.REF_NIK,
					EMAIL : data_student.EMAIl
				},success:function(data){
					if(data.exist){
						if(confirm(data.message)){
							$('#mymodal').modal('toggle');
							fill_data_student(data_student);
						}
					}else{
						$('#mymodal').modal('toggle');
						fill_data_student(data_student);
					}
				},error:function(){
				}
			});
		}else{
			$('#mymodal').modal('toggle');
			fill_data_student(data_student);
		}
	}

	function fill_data_student(data_student){
		$('#REF_SISWA').val(data_student.KD);
		$('#NAMA').val(data_student.NAMA);
		$('#JK').val(data_student.JK);
		$('#EMAIL').val(data_student.EMAIL);
		$('#KONTAK_1').val(data_student.KONTAK_1);
		$('#KONTAK_2').val(data_student.KONTAK_2);
		$('#KONTAK_3').val(data_student.KONTAK_3);
		$('#REF_NIK').val(data_student.REF_NIK);
		$('#TGL_LAHIR').val(data_student.TGL_LAHIR);
		$('#ALAMAT').val(data_student.ALAMAT);
		$('#REF_NPWP').val(data_student.REF_NPWP);
		$('#OCCLVL').val(data_student.TINGKAT_PEKERJAAN);
		$('#OCCSEC').val(data_student.SEKTOR_PEKERJAAN);
		$('#OCCSEC').val(data_student.SEKTOR_PEKERJAAN);
		$('#EDUC').val(data_student.TINGKAT_PENDIDIKAN);
		$('#COUNTRY').val(data_student.NEGARA_TUJUAN);
		$('#PURPOSE').val(data_student.ALASAN);
		if(data_student.KONTAK != ""){
			$('#KONTAK_1').val(data_student.KONTAK);
		}
	}

	function select_pricelist(e){
		var pricelist_id = $(e).val();
		$('#REF_LEVEL').selectize()[0].selectize.clearOptions();
		$('#REF_KAT').selectize()[0].selectize.clearOptions();
		$.ajax({
			url : "{{url('select-pricelist')}}",
			method : "POST",
			data : {
				_token : token,
				pricelist_id : pricelist_id
			},success:function(data){
				data = JSON.parse(data);
				$('#REF_PAKET').selectize()[0].selectize.destroy();

				var $select = $('#REF_PAKET').selectize({
					options : data.courses,
					valueField: 'KD',
					labelField: 'NAMA',
					searchField: 'NAMA',
				});
				var selectize = $select[0].selectize;
			},error:function(){

			}

		});
	}


	function select_course(e){
		var course_id = $(e).val();
		var pricelist_id = $('#REF_PRICELIST').val();
		$('#REF_KAT').selectize()[0].selectize.clearOptions();
		$.ajax({
			url : "{{url('select-course')}}",
			method : "POST",
			data : {
				_token : token,
				type : "level_only",
				course_id : course_id,
				pricelist_id : pricelist_id
			},success:function(data){
				data = JSON.parse(data);
				$('#REF_LEVEL').selectize()[0].selectize.destroy();

				var $select = $('#REF_LEVEL').selectize({
					options : data.levels,
					valueField: 'KD',
					labelField: 'NAMA',
					searchField: 'NAMA',
				});
				var selectize = $select[0].selectize;
			},error:function(){

			}
		});
	}

	function select_level(e){
		var level_id = $(e).val();
		var course_id = $('#REF_PAKET').val();
		var pricelist_id = $('#REF_PRICELIST').val();
		$.ajax({
			url : "{{url('select-course')}}",
			method : "POST",
			data : {
				_token : token,
				level_id : level_id,
				course_id : course_id,
				pricelist_id : pricelist_id
			},success:function(data){
				data = JSON.parse(data);
				$('#REF_KAT').selectize()[0].selectize.destroy();

				var $select = $('#REF_KAT').selectize({
					options : data.groups,
					valueField: 'REF_KATEGORI',
					labelField: 'NAMA',
					searchField: 'NAMA',
				});
				var selectize = $select[0].selectize;
			},error:function(){

			}
		});
	}

	function select_category(e){
		var category_id = $(e).val();
		var level_id = $('#REF_LEVEL').val();
		var course_id = $('#REF_PAKET').val();
		var pricelist_id = $('#REF_PRICELIST').val();
		$.ajax({
			url : "{{url('select-category')}}",
			method : "POST",
			data : {
				_token : token,
				category_id:category_id,
				level_id : level_id,
				course_id : course_id,
				pricelist_id : pricelist_id
			},success:function(data){
				data = JSON.parse(data);
				console.log(data);
				$('#JUMLAH_JAM_PERTEMUAN').selectize()[0].selectize.destroy();

				var $select = $('#JUMLAH_JAM_PERTEMUAN').selectize({
					options : data,
					valueField: 'JUMLAH_JAM_PERTEMUAN',
					labelField: 'LABEL',
					searchField: 'LABEL',
				});
				var selectize = $select[0].selectize;
			},error:function(){

			}
		});
	}

	function select_duration(e){
		var duration = $(e).val();
		var duration_arr = duration.split('|');
		var jumlah_jam = duration_arr[0];
		var jumlah_pertemuan = duration_arr[1];
		var category_id = $('#REF_KAT').val();
		var level_id = $('#REF_LEVEL').val();
		var course_id = $('#REF_PAKET').val();
		var pricelist_id = $('#REF_PRICELIST').val();
		$.ajax({
			url : "{{url('select-duration')}}",
			method : "POST",
			data : {
				_token : token,
				category_id:category_id,
				level_id : level_id,
				course_id : course_id,
				pricelist_id : pricelist_id,
				jumlah_jam : jumlah_jam,
				jumlah_pertemuan : jumlah_pertemuan
			},success:function(data){
				data = JSON.parse(data);
				$('#DPP').val(data);
				$('#HARGA_PAKET').val(data);
				$('#TOTAL').val(data);
			},error:function(){

			}
		});
	}

	function submit_form_siswa(e){
		e.preventDefault();

		var formData = new FormData(document.getElementById('form-siswa'));
		var TAHUN_BULAN = $('#TAHUN_BULAN').val();
		var KD_PERUSAHAAN = $('#KD_PERUSAHAAN').val();
		var NO = $('#NO').val();
		formData.append('TAHUN_BULAN',TAHUN_BULAN);
		formData.append('KD_PERUSAHAAN',KD_PERUSAHAAN);
		formData.append('NO',NO);
		formData.append('confirm',confirm_student_input);
		$.ajax({
			url : "{{route('admin-temp-student.add')}}",
			method : "POST",
			processData: false,
			contentType: false,
			data:formData,
			success:function(data){
				
				try {
					data = JSON.parse(data);
					if(data.status == "confirm"){
						if(confirm(data.message)){
							confirm_student_input = "true";
							submit_form_siswa(e);
						}
					}else if(data.status == "exist"){
						alert(data.message);
					}
				} catch(e) {
					document.getElementById('form-siswa').reset();
					$('#temp-student-output').html(data);
				}


			},error:function(){}
		});
	}
	$(document).ready(function(){

		$(".monthPicker").datepicker({ 
			dateFormat: 'yy mm',
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,

			onClose: function(dateText, inst) {  
				var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val(); 
				var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val(); 
				$(this).datepicker('setDate', new Date(year, month, 1)); 
			}
		});

		$(".monthPicker").focus(function () {
			$(".ui-datepicker-calendar").hide();
			$("#ui-datepicker-div").position({
				my: "center top",
				at: "center bottom",
				of: $(this)
			});

		});

	});

	function delete_temp_student(KD_GABUNG,REF_SISWA){
		$.ajax({
			url : "{{route('admin-temp-student.delete')}}",
			method : "POST",
			data:{
				_token : token,
				KD_GABUNG: KD_GABUNG,
				REF_SISWA: REF_SISWA
			},
			success:function(data){
				$('#temp-student-output').html(data);
			},error:function(){}
		});
	}

	function submit_registration_form(e){
		e.preventDefault();
		if(confirm("Apakah anda yakin ingin menambah data murid ini ?")){
			document.getElementById('registration-form').submit();
		}
	}

	function submit_form_packet(e){
		e.preventDefault();
		console.log($('#form-packet #REF_SISWA').val());
		var REF_SISWA = $('#form-packet #REF_SISWA').val() 
		if(REF_SISWA == null || REF_SISWA == undefined || REF_SISWA == ""){
			alert('Tolong pilih murid terlebih dahulu !');
			return false;
		}
		var formData = new FormData(document.getElementById('form-packet'));
		var TAHUN_BULAN = $('#TAHUN_BULAN').val();
		var KD_PERUSAHAAN = $('#KD_PERUSAHAAN').val();
		var NO = $('#NO').val();
		formData.append('TAHUN_BULAN',TAHUN_BULAN);
		formData.append('KD_PERUSAHAAN',KD_PERUSAHAAN);
		formData.append('NO',NO);
		$.ajax({
			url : "{{route('admin-temp-student-packet.add')}}",
			method : "POST",
			processData: false,
			contentType: false,
			data:formData,
			success:function(data){
				if(data == "error:exists"){
					alert('Data sudah ada ! Silahkan inputkan data yang berbeda')
				}else{
					var arr_data = data.split('###');
					var html_output = arr_data[0];
					var total = arr_data[1];
					$('#detail-packet-output').html(html_output);
					$('#total-text').html(total);
				}
			},error:function(){}
		});
	}

	function select_akun(e){
		alert(e.value);
	}
</script>
@endpush