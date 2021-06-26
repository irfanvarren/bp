@extends('products.registration-payment')
@push('head-script')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<style type="text/css">
	.parsley-errors-list{
		margin:0 !important;
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
	#ui-datepicker-div{
		width:300px !important;
	}
	.ui-datepicker{
		width:100% !important;
		border:none !important;
		line-height: 1.2em;
		height:300px;
		padding:0 !important;
	}

	.ui-datepicker-calendar thead tr th{
		color:black;
		font-family: arial;
	}
	.ui-datepicker-group{
		background:white !important;
		border-radius:0;
		width:49% !important;
		border:1px solid #bebebe;
		min-height: 280px;
		overflow: hidden;
	}
	.ui-datepicker-group-first{
		margin-right:1%;

	}
	.ui-datepicker-group-last{
		margin-left:1%;
	}

	.ui-datepicker-header{
		background:#454f52;
		color:white;  
		border-radius:0;
		padding:10px 0 !important;
		border:none;
		font-family: arial;
	}
	.ui-datepicker-prev{
		background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAMCAYAAACulacQAAAAUklEQVQYlXWPwQnAMAwDj9IBOlpH8CjdJLNksuujFIJjC/w6WUioFBcqJ7sGEAD5Y/hpqLRghRv4YQlUjqXI3Kql2MixraGbEhVcDXcFUR/1egEHNuTBpFW0NgAAAABJRU5ErkJggg==') !important;
		height: 12px !important;
		width: 7px !important;
		top:2px !important;
		left: 0px !important;
		background-color: transparent !important;
	}
	.ui-datepicker-next{
		background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAMCAYAAABfnvydAAAAVUlEQVQYlXWQ0Q3AIAhEL07gKI7kKN2kI3Wk1w9to3KQEELucQEECOizhhTQGHFnwOdgobWx0GkZILfYBhXl0STVbPoBarbkL7ozN/F8VBBXh8uJgF5r2hrI4GHUkAAAAABJRU5ErkJggg==') !important;
		height: 12px !important;
		width: 8px !important;
		top:2px !important;
		right: 0 !important;
		background-color: transparent !important;
	}
	.ui-datepicker-prev,.ui-datepicker-next{
		border:none !important;
		margin: 16px 10px;
	}
	.ui-corner-all{
		border:none !important;
	}
	.ui-datepicker-next:hover,.ui-datepicker-prev:hover{
		cursor: pointer;
	}
	.ui-datepicker-next span,.ui-datepicker-prev span {
		display: none !important;
	}


	.ui-datepicker-unselectable.ui-state-disabled .ui-state-default{
		background:white !important;
	}
	.ui-state-default{
		background:#e6e6e6 !important;
	}
	.ui-state-active, .ui-widget-content .ui-state-active{
		background: #2480bd !important;
		color:white;
	}


	@media screen and (min-width:1366px){

		.ui-datepicker{
			width:800px !important;
		}
	}
	@media screen and (max-width:576px){
		.ui-datepicker-group{
			width:100% !important;
			margin:0 0 15px 0 !important;
		}
		.calendar-code-wrapper{
			display: block;
			margin:0;
			width:100%;
		}
	}
</style>
@endpush
@section('registration-payment-content')
<div class="col-md-12" style="margin-top:65px;">
	<div class="row justify-content-center" id="registration-wrapper">
		<div class="col-md-10 p-3">
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
			<div class="row form-group">
				<div class="card col-md-12" style="overflow:hidden;text-overflow: ellipsis;">
					<div class="card-body">
						<form class="myform" id="registrationForm"  action="{{url('products/registration')}}" enctype="multipart/form-data" method="post" autocomplete="on">
							@csrf

							<!-- referral dan admin referral (fma) -->

							@if(isset($data_reseller))
							<input type="hidden" name="kode_reseller" value="{{$data_reseller['kode_reseller']}}">
							<input type="hidden" name="slug" value="{{$data_reseller['slug']}}">
							<input type="hidden" name="REF_PAKET" value="{{$data_reseller['REF_PAKET']}}">
							<input type="hidden" name="REF_LEVEL" value="{{$data_reseller['REF_LEVEL']}}">
							<input type="hidden" name="REF_KATEGORI" value="{{$data_reseller['REF_KATEGORI']}}">
							<input type="hidden" name="REF_PRICELIST" value="{{$data_reseller['REF_PRICELIST']}}">
							<input type="hidden" name="JUMLAH_JAM" value="{{$data_reseller['JUMLAH_JAM']}}">
							<input type="hidden" name="JUMLAH_PERTEMUAN" value="{{$data_reseller['JUMLAH_PERTEMUAN']}}">
							<input type="hidden" name="ONLINE_TEST_MODULE" value="{{$data_reseller['ONLINE_TEST_MODULE']}}">
							@endif
							<input type="hidden" name="offer_letter_settings" value="{{$offer_letter_settings}}">
							<div class="row tab-wrapper office-wrapper show">

								<div class="form-group row">
									<div class="col-md-12">
										<strong>Silahkan memilih Kantor cabang tempat anda ingin mengambil kursus / test</strong>
									</div>
									<label class="col-form-label col-md-12">Cabang BP / Branch Name</label>
									<div class="col-md-6">
										<select class="form-control" name="cabang" value="" data-parsley-required="true" data-regis-form="Cabang / Branch Name" required>
											<option value="">- Pilih Cabang -</option>
											@foreach($perusahaan as $data)
											<option value="{{$data->KD}}" {{ $registration_data ? $registration_data->REF_PERUSAHAAN == $data->KD ? 'selected' : '' : ''}}>{{ucwords(strtolower($data->NAMA))}}</option>
											@endforeach
										</select>
									</div>
								</div>
								@if($cart_data)
								@if(count($cart_data->items))
								@foreach($cart_data->items as $item)
								@if(count($item->course_events))
								
								<div class="row form-group">
									<div class="col-md-12"><h4 class="mt-3"><strong>{{$item->NAMA_PAKET}} ({{$item->NAMA_LEVEL}})</strong></h4></div>
									<div class="col-md-12 pb-2">
										<strong> Please select your preferred test date </strong> / Silahkan pilih tanggal tes yang anda inginkan 
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="datepicker" data-available-dates="{{$item->course_events->pluck('tgl_mulai')}}"></div>
												<input type="text" class="TGL_TEST d-none" name="TGL_TEST[{{$item->REF_PAKET.$item->REF_LEVEL}}]" data-regis-form="Tanggal TEST / TEST Date" required>
											</div>
											<div class="col-md-12 mt-3">
												<span class="calendar-code-wrapper"><span class="calendar-code-color available">&emsp;</span> Test Available</span> <span class="calendar-code-wrapper"><span class="calendar-code-color">&emsp;</span> Test Not Available</span> <span class="calendar-code-wrapper"><span class="calendar-code-color selected">&emsp;</span> Selected Date</span>
											</div>
										</div>
									</div>
								</div>
								@endif
								@endforeach
								@endif
								@else
								@if(isset($data_reseller))
								@if(count($data_reseller['course_events']) && $data_reseller['ONLINE_TEST_MODULE'] == "")
								<div class="row form-group">
									<div class="col-md-12 pb-2">
										<strong> Please select your preferred test date </strong> / Silahkan pilih tanggal tes yang anda inginkan 
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<div class="datepicker" data-available-dates="{{$data_reseller['course_events']}}"></div>
												<input type="text" class="TGL_TEST d-none" name="TGL_TEST[{{$data_reseller['REF_PAKET'].$data_reseller['REF_LEVEL']}}]" data-regis-form="Tanggal TEST / TEST Date" required>
											</div>
											<div class="col-md-12 mt-3">
												<span class="calendar-code-wrapper"><span class="calendar-code-color available">&emsp;</span> Test Available</span> <span class="calendar-code-wrapper"><span class="calendar-code-color">&emsp;</span> Test Not Available</span> <span class="calendar-code-wrapper"><span class="calendar-code-color selected">&emsp;</span> Selected Date</span>
											</div>
										</div>
									</div>
								</div>
								@endif
								@endif
								@endif


								<div class="row form-group">
									<div class="col-md-12">
										<p class="form-check-inline">
											<label class="form-check-label" for="">
												<input type="checkbox" name="agree" id="registration-agree" class="form-check-input" required value=""> Setuju dengan <a href="{{url('/products/term-and-condition')}}" target="blank">Syarat & Ketentuan</a>
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
									$first_name = "";
									$last_name = "";
									$middle_name = "";
									if(session()->has('registration_data')){

									$arr_name = explode(" ",session('registration_data.name'));
									if(count($arr_name) == 1){
									$first_name = $arr_name[0];

								}
								else if(count($arr_name) > 2){
								$first_name = $arr_name[0];
								$middle_name = implode(" ",array_slice($arr_name,1,count($arr_name)-2));
								$last_name = $arr_name[count($arr_name)-1];
							}else{
							$first_name = $arr_name[0];
							$last_name = $arr_name[count($arr_name)-1];
						}
					}else{
					if($registration_data){
					$nama = $registration_data->NAMA;

					$nama_arr = explode(' ',$nama);
					$first_name = $nama_arr[0];
					$last_name = $nama_arr[count($nama_arr)-1];
					$middle_name = implode(" ",array_splice($nama_arr,1,count($nama_arr)-2));
				}
			}
			@endphp
			<label for="" class="col-form-label col-md-12"> Nama Peserta* </label>
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

		<div class="row">
			<div class="col-md-4">
				<div class="row mb-3">
					<label for="" class="col-form-label col-md-12">Alamat Email / Email Address*</label>
					<div class="col-md-12">
						<input type="email" name="email" id="email" placeholder="Email"  data-regis-form="Alamat Email / Email Address" data-parsley-type="email" required class="form-control" value="{{session()->has('registration_data') ? session('registration_data.email') : ($registration_data ? $registration_data->EMAIL : auth()->user()->email)}}">
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row mb-3">
					<label for="" class="col-form-label col-md-12">No. HP / WA*</label>
					<div class="col-md-12">
						<input type="text" name="no_telepon" id="no_telepon" data-regis-form="No. HP / WA" placeholder="08xxxxxxxxxx" Required class='form-control' value="{{session()->has('registration_data') ? session('registration_data.phone') : ($registration_data ? $registration_data->KONTAK : '')}}">
					</div>

				</div>
			</div>
			<div class="col-md-4">
				<div class="row mb-3">
					<label class="col-form-label col-md-12">Instagram</label>
					<div class="col-md-12">
						<input type="text" name="instagram" class="form-control" id="instagram" data-regis-form="Instagram" value="{{$registration_data ? $registration_data->INSTAGRAM : ''}}" placeholder="instagram">
					</div>
				</div>
			</div>
		</div>
		<div class=" row">
			<div class="col-md-8">
				<div class="row mb-3">
					<label for="" class="col-form-label col-md-12">Alamat saat ini / Address</label>
					<div class="col-md-12">
						<input type="text" name="alamat" id="alamat" data-regis-form="Alamat / Address" placeholder="Alamat saat ini" required class="form-control" value="{{$registration_data ? $registration_data->ALAMAT : ''}}">
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="row mb-3">
					<label class="col-form-label col-md-12">
						Dusun
					</label>
					<div class="col-md-12">
						<input type="text" name="dusun" id="dusun" class="form-control" value="{{$registration_data ? $registration_data->DUSUN : ''}}" placeholder="Dusun">
					</div>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="row">
					<label class="col-form-label col-md-12">
						RT / RW
					</label>
					<div class="col-md-12">
						@php
						$rt = "";
						$rw = "";

						if($registration_data){
						$arr_rt_rw = explode('/',$registration_data->RT_RW);
						if(isset($arr_rt_rw[0])){
						$rt = $arr_rt_rw[0];
					}
					if(isset($arr_rt_rw[1])) {
					$rw = $arr_rt_rw[1];
				}
			}
			@endphp
			<div class="row">
				<div class="col-md-6 mb-3">
					<input type="text" name="rt" id="rt" class="form-control" value="{{$registration_data ? $rt : ''}}" placeholder="RT">
				</div>
				<div class="col-md-6">
					<input type="text" name="rw" id="rw" class="form-control" value="{{$registration_data ? $rw : ''}}" placeholder="RW">
				</div>
			</div>

		</div>
	</div>

</div>
<div class="col-md-4">
	<div class="row mb-3">
		<label class="col-form-label col-md-12">
			Desa / kelurahan
		</label>
		<div class="col-md-12">
			<input type="text" name="desa_kelurahan" id="desa_kelurahan" class="form-control" value="{{$registration_data ? $registration_data->DESA_KELURAHAN : ''}}" placeholder="Desa / Kelurahan">
		</div>
	</div>

</div>
<div class="col-md-4">
	<div class="row mb-3">
		<label for="" class="col-form-label col-md-12">Kabupaten atau Kota / Regency or City</label>
		<div class="col-md-12">
			<input type="text" name="kota" id="kota" data-regis-form="Kota / City" placeholder="Kota Tempat Tinggal" required class='form-control' value="{{$registration_data ? $registration_data->REF_KOTA : ''}}">
		</div>

	</div>
</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="row mb-3">
			<label for="" class="col-form-label col-md-12">Provinsi / Region</label>
			<div class="col-md-12">
				<input type="text" class="form-control" id="provinsi" name="provinsi" data-regis-form="Provinsi / Region" value="{{$registration_data ? $registration_data->REF_PROVINSI : ''}}" placeholder="Provinsi" required>
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
					<option value="{{$country->id}}" {{ $registration_data ? $registration_data->ID_NEGARA == $country->id ? 'selected' : '' : ''}}>{{$country->name}}</option>
					@endforeach
				</select>
			</p>
		</div>
	</div>
	<div class="col-md-4">
		<div class="row">

			<label class="col-md-12 col-form-label">Kode Pos / Postal Code</label>
			<p class="col-md-12">
				<input type="text" class="form-control" placeholder="Kode Pos" name="kode_pos" id="kode_pos" pattern="^[0-9]*$" value="{{$registration_data ? $registration_data->POSTAL_CODE : ''}}" required>
			</p>

		</div>	
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="row mb-3">
			<label class="col-form-label col-md-12">Jenis Tinggal*</label>
			<div class="col-md-12">
				<select class="form-control" name="jenis_tinggal" id="jenis_tinggal" data-regis-form="Jenis Tinggal" onchange="ganti_jenis_tinggal(this)" required>
					<option value="">- Pilih Salah Satu -</option>
					<option value="Bersama Orang Tua" {{$registration_data ? $registration_data->JENIS_TINGGAL == 'Bersama Orang Tua' ? 'selected' : '' : ''}}>Bersama Orang Tua</option>
					<option value="Wali" {{$registration_data ? $registration_data->JENIS_TINGGAL == 'Wali' ? 'selected' : '' : ''}}>Wali</option>
				</select>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="row mb-3">
			<label class="col-form-label col-md-12">Alat Transportasi*</label>
			<div class="col-md-12">
				<select type="text" name="alat_transportasi" id="alat_transportasi" data-regis-form="Alat Transportasi" class="form-control" onchange="if(this.value == 'Lainnya'){ document.getElementById('alat_transportasi_lainnya').style.display = 'block' } else { document.getElementById('alat_transportasi_lainnya').style.display = 'none'}" placeholder="Alat Transportasi">
					<option value="Jalan kaki" {{$registration_data ? $registration_data->ALAT_TRANSPORTASI == 'Jalan kaki' ? 'selected' : '' : ''}}>Jalan kaki</option>
					<option value="Kendaraan pribadi"  {{$registration_data ? $registration_data->ALAT_TRANSPORTASI == 'Kendaraan pribadi' ? 'selected' : '' : ''}}>Kendaraan pribadi</option>
					<option value="Angkutan umum / bus / pete-pete"  {{$registration_data ? $registration_data->ALAT_TRANSPORTASI == 'Angkutan umum / bus / pete-pete' ? 'selected' : '' : ''}}>Angkutan umum / bus / pete-pete</option>
					<option value="Mobil / bus antar jemput"  {{$registration_data ? $registration_data->ALAT_TRANSPORTASI == 'Mobil / bus antar jemput' ? 'selected' : '' : ''}}>Mobil / bus antar jemput</option>
					<option value="Kereta api"  {{$registration_data ? $registration_data->ALAT_TRANSPORTASI == 'Kereta api' ? 'selected' : '' : ''}}>Kereta api</option>
					<option value="Ojek"  {{$registration_data ? $registration_data->ALAT_TRANSPORTASI == 'Ojek' ? 'selected' : '' : ''}}>Ojek</option>
					<option value="Perahu penyebrangan / rakit / getek"  {{$registration_data ? $registration_data->ALAT_TRANSPORTASI == 'Perahu penyebrangan / rakit / getek' ? 'selected' : '' : ''}}>Perahu penyebrangan / rakit / getek</option>
					<option value="Kuda"  {{$registration_data ? $registration_data->ALAT_TRANSPORTASI == 'Kuda' ? 'selected' : '' : ''}}>Kuda</option>
					<option value="Sepeda"  {{$registration_data ? $registration_data->ALAT_TRANSPORTASI == 'Sepeda' ? 'selected' : '' : ''}}>Sepeda</option>
					<option value="Sepeda motor"  {{$registration_data ? $registration_data->ALAT_TRANSPORTASI == 'Sepeda motor' ? 'selected' : '' : ''}}>Sepeda motor</option>
					<option value="Mobil pribadi"  {{$registration_data ? $registration_data->ALAT_TRANSPORTASI == 'Mobil pribadi' ? 'selected' : '' : ''}}>Mobil pribadi</option>
					<option value="Lainnya"  {{$registration_data ? $registration_data->ALAT_TRANSPORTASI == '' ? 'selected' : '' : ''}}>Lainnya</option>
				</select>
				<input type="text" @if($registration_data) @if($registration_data->ALAT_TRANSPORTASI != '') style="display: none" @endif @endif class="form-control mt-2" name="alat_transportasi_lainnya" id="alat_transportasi_lainnya" value="{{$registration_data ? $registration_data->ALAT_TRANSPORTASI : '' }}" placeholder="Lainnya">
			</div>
		</div>
	</div>

</div>
<div class="row">
	<div>
		<div class="float-left mb-3">
			<label class="col-form-label col-md-12">Penerima KPS (Kartu Perlindungan Sosial)</label>
			<div class="col-md-12">
				<input type="checkbox" data-width="150px" onchange="if(this.checked){ this.value='Ya' }else{ this.value='Tidak' }" data-toggle="toggle" data-regis-form="Penerima KPS" data-on="Ya" data-off="Tidak" value="{{$registration_data ? $registration_data->PENERIMA_KIP : 'Tidak'}}" name="penerima_kps" {{$registration_data ? $registration_data->PENERIMA_KPS == 'Ya' ? 'checked' : '' : ''}} >
			</div>
		</div>
		<div class="float-left mb-3">
			<label class="col-form-label col-md-12">Layak PIP (Program Indonesia Pintar)</label>
			<div class="col-md-12">
				<input type="checkbox" data-width="150px" onchange="if(this.checked){ this.value='Layak' }else{ this.value='Tidak Layak' }" data-toggle="toggle" data-regis-form="Penerima PIP" data-on="Layak" data-off="Tidak Layak" value="{{$registration_data ? $registration_data->LAYAK_PIP : 'Tidak Layak'}}" name="layak_pip"  {{$registration_data ? $registration_data->LAYAK_PIP == 'Layak' ? 'checked' : '' : ''}}>
			</div>
		</div>
		<div class="float-left mb-3">
			<label class="col-form-label col-md-12">Penerima KIP (Kartu Indonesia Pintar)</label>
			<div class="col-md-12">
				<input type="checkbox" data-width="150px" onchange="if(this.checked){ this.value='Ya' }else{ this.value='Tidak' }" data-toggle="toggle" data-regis-form="Penerima KIS" data-on="Ya" data-off="Tidak" value="{{$registration_data ? $registration_data->PENERIMA_KIP : 'Tidak'}}" name="penerima_kip" {{$registration_data ? $registration_data->PENERIMA_KIP == 'Ya' ? 'checked' : '' : ''}}>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="row mb-3">
			<label class="col-form-label col-md-12">Kebutuhan Khusus *jika ada</label>
			<div class="col-md-12">
				<select class="form-control" name="kebutuhan_khusus" data-regis-form="Kebutuhan Khusus" id="kebutuhan_khusus">
					<option value="">- Pilih Salah Satu -</option>
					<option value="A" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'A' ? 'selected' : '' : ''}}> A - Tuna netra </option>
					<option value="B" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'B' ? 'selected' : '' : ''}}> B - Tuna rungu </option>
					<option value="C" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'C' ? 'selected' : '' : ''}}> C - Tuna grahita ringan </option>
					<option value="C1" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'C1' ? 'selected' : '' : ''}}> C1 - Tuna grahita sedang</option>
					<option value="D" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'D' ? 'selected' : '' : ''}}> D - Tuna daksa ringan </option>
					<option value="D1" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'D1' ? 'selected' : '' : ''}}> D1 - Tuna daksa sedang </option>
					<option value="E" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'E' ? 'selected' : '' : ''}}> E - Tuna laras </option>
					<option value="F" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'F' ? 'selected' : '' : ''}}> F - Tuna wicara </option>
					<option value="H" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'H' ? 'selected' : '' : ''}}> H - Hiperaktif </option>
					<option value="I" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'I' ? 'selected' : '' : ''}}> I - Cerdas Istimewa </option>
					<option value="J" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'J' ? 'selected' : '' : ''}}> J - Bakat Istimewa </option>
					<option value="K" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'K' ? 'selected' : '' : ''}}> K - Kesulitan Belajar </option>
					<option value="N" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'N' ? 'selected' : '' : ''}}> N - Narkoba</option>
					<option value="O" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'O' ? 'selected' : '' : ''}}> O - Indigo</option>
					<option value="P" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'P' ? 'selected' : '' : ''}}> P - Down Syndrome</option>
					<option value="Q" {{$registration_data ? $registration_data->KEBUTUHAN_KHUSUS == 'Q' ? 'selected' : '' : ''}}> Q - Autis</option>
				</select>
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
					<select class="form-control" name="pendidikan_terakhir" required>
						<option value="">- Pilih -</option>
						<option value="S3" {{ $registration_data ?$registration_data->TINGKAT_PENDIDIKAN == 'S3' ? 'selected' : '' : ''}}>S3</option>
						<option value="S2" {{ $registration_data ?$registration_data->TINGKAT_PENDIDIKAN == 'S2' ? 'selected' : '' : ''}}>S2</option>
						<option value="S1" {{ $registration_data ?$registration_data->TINGKAT_PENDIDIKAN == 'S1' ? 'selected' : '' : ''}}>S1</option>
						<option value="Diploma" {{ $registration_data ?$registration_data->TINGKAT_PENDIDIKAN == 'Diploma' ? 'selected' : '' : ''}}>Diploma</option>
						<option value="SMA/SMK/Setara" {{ $registration_data ?$registration_data->TINGKAT_PENDIDIKAN == 'SMA/SMK/Setara' ? 'selected' : '' : ''}}>SMA/SMK/Setara</option>
						<option value="SMP/Setara" {{ $registration_data ? $registration_data->TINGKAT_PENDIDIKAN == 'SMP/Setara' ? 'selected' : '' : ''}}>SMP/Setara</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<label for="" class="col-md-12 col-form-label">Jurusan</label>
				<div class="col-md-12">
					<input type="text" name="jurusan"  placeholder="Jurusan" class="form-control" value="{{$registration_data ? $registration_data->TINGKAT_PENDIDIKAN : ''}}">
				</div>
			</div>
		</div>
	</div>
	<div class="row form-group mb-4">
		<div class="col-md-6">
			<div class="row">
				<label for="" class="col-md-12 col-form-label">Universitas / Sekolah</label>
				<div class="col-md-12">
					<input type="text" name="ref_universitas" placeholder="Nama Universitas / Sekolah" class="form-control" value="{{$registration_data ? $registration_data->UNIVERSITAS_TERAKHIR : ''}}">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<label for="" class="col-md-12 col-form-label">Bahasa yang digunakan dirumah</label>
				<div class="col-md-12">
					<input type="text" name="bahasa_sehari_hari" placeholder="Bahasa" class="form-control" value="{{$registration_data ? $registration_data->BAHASA_SEHARI_HARI : ''}}">
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
					<select class="form-control" name="pekerjaan" required>
						<option value="Pelajar" {{$registration_data ? $registration_data->TINGKAT_PEKERJAAN == 'Pelajar' ? 'selected' : '' : ''}}>Pelajar</option>
						<option value="Mahasiswa" {{$registration_data ? $registration_data->TINGKAT_PEKERJAAN == 'Mahasiswa' ? 'selected' : '' : ''}}>Mahasiswa</option>
						<option value="Karyawan" {{$registration_data ? $registration_data->TINGKAT_PEKERJAAN == 'Karyawan' ? 'selected' : '' : ''}}>Karyawan</option>
						<option value="Pemilik usaha" {{$registration_data ? $registration_data->TINGKAT_PEKERJAAN == 'Pemilik usaha' ? 'selected' : '' : ''}}>Pemilik usaha</option>
						<option value="Wirausaha" {{$registration_data ? $registration_data->TINGKAT_PEKERJAAN == 'Wirausaha' ? 'selected' : '' : ''}}>Wirausaha</option>
						<option value="Wiraswasta" {{$registration_data ? $registration_data->TINGKAT_PEKERJAAN == 'Wiraswasta' ? 'selected' : '' : ''}}>Wiraswasta</option>
						<option value="Pedagang" {{$registration_data ? $registration_data->TINGKAT_PEKERJAAN == 'Pedagang' ? 'selected' : '' : ''}}>Pedagang</option>
						<option value="Buruh lepas" {{$registration_data ? $registration_data->TINGKAT_PEKERJAAN == 'Buruh lepas' ? 'selected' : '' : ''}}>Buruh lepas</option>
						<option value="Mengurus rumah tangga" {{$registration_data ? $registration_data->TINGKAT_PEKERJAAN == 'Mengurus rumah tangga' ? 'selected' : '' : ''}}>Mengurus rumah tangga</option>
						<option value="Tidak bekerja" {{$registration_data ? $registration_data->TINGKAT_PEKERJAAN == 'Tidak bekerja' ? 'selected' : '' : ''}}>Tidak bekerja</option>
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
						<option value="Petugas Administrasi" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Petugas Administrasi' ? 'selected' : '' : ''}}>Petugas Administrasi</option>
						<option value="Pertanian, Perikanan, Perhutanan, Pertambangan" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Pertanian, Perikanan, Perhutanan, Pertambangan' ? 'selected' : '' : ''}}>Pertanian, Perikanan, Perhutanan, Pertambangan</option>
						<option value="Hiburan dan Seni"  {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Hiburan dan Seni' ? 'selected' : '' : ''}}>Hiburan dan Seni</option>
						<option value="Perbankan & Asuransi" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Perbankan & Asuransi' ? 'selected' : '' : ''}}>Perbankan & Asuransi</option>
						<option value="Katering & Rekreasi" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Katering & Rekreasi' ? 'selected' : '' : ''}}>Katering & Rekreasi</option>
						<option value="Industri Konstruksi" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Industri Konstruksi' ? 'selected' : '' : ''}}>Industri Konstruksi</option>
						<option value="Kerajinan Tangan & Design" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Kerajinan Tangan & Design' ? 'selected' : '' : ''}}>Kerajinan Tangan & Design</option>
						<option value="Pendidikan" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == "Pendidikan" ? 'selected' : '' : ''}}>Pendidikan</option>
						<option value="Pelayanan Sosial & Kesehatan"  {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Pelayanan Sosial & Kesehatan' ? 'selected' : '' : ''}}>Pelayanan Sosial & Kesehatan</option>
						<option value="Jasa Pemasangan, Pemeliharaan dan Perbaikan" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Jasa Pemasangan, Pemeliharaan dan Perbaikan' ? 'selected' : '' : ''}}>Jasa Pemasangan, Pemeliharaan dan Perbaikan </option>
						<option value="Hukum & Jasa Hukum" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Hukum & Jasa Hukum' ? 'selected' : '' : ''}}>Hukum & Jasa Hukum</option>
						<option value="Pabrik & Perakitan" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Pabrik & Perakitan' ? 'selected' : '' : ''}}>Pabrik & Perakitan</option>
						<option value="Layanan Personal" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Layanan Personal' ? 'selected' : '' : ''}}>Layanan Personal</option>
						<option value="Perdagangan Eceran" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Perdagangan Eceran' ? 'selected' : '' : ''}}>Perdagangan Eceran</option>
						<option value="Mesin & Ilmu Ilmiah" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Mesin & Ilmu Ilmiah' ? 'selected' : '' : ''}}>Mesin & Ilmu Ilmiah</option>
						<option value="Media & Telekomunikasi" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Media & Telekomunikasi' ? 'selected' : '' : ''}}>Media & Telekomnuikasi</option>
						<option value="Transportasi" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Transportasi' ? 'selected' : '' : ''}}>Transportasi</option>
						<option value="Utilitas (gas,listrik,air,dll)" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Utilitas (gas,listrik,air,dll)' ? 'selected' : '' : ''}}>Utilitas (gas,listrik,air,dll)</option>
						<option value="Perdagangan Grosir" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Perdagangan Grosir' ? 'selected' : '' : ''}}>Perdagangan Grosir</option>
						<option value="Tidak Bekerja" {{$registration_data ? $registration_data->SEKTOR_PEKERJAAN == 'Tidak Bekerja' ? 'selected' : '' : ''}}>Tidak Bekerja</option>
					</select>
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
	</div>
	<div id="orang-tua-wrapper">
		<div class="row">
			<div for="" class="col-md-12"> <h3 class="m-0">Data Ayah</h3></div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label" style="color:red">Nama Ayah *</label>
			<div class="col-md-12">
				<input type="text" class="form-control" name="nama_ayah" data-regis-form="Nama Ayah" placeholder="Nama Ayah" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">No. HP</label>
			<div class="col-md-12">
				<input type="text" class="form-control" name="no_hp_ayah" placeholder="No. HP" value="">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-md-12 col-form-label"> Pekerjaan Ayah</label>
			<div class="col-md-12">
				<input type="text" class="form-control" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">Penghasilan Ayah</label>
			<div class="col-md-12">
				<input type="text" class="form-control" name="penghasilan_ayah" placeholder="Penghasilan Ayah">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">Kebutuhan Khusus Ayah</label>
			<div class="col-md-12">
				<input type="text" class="form-control" name="kebutuhan_khusus_ayah" placeholder="Kebutuhan Khusus Ayah">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12"> <h3 class="m-0">Data Ibu</h3> </div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label" style="color:red">Nama Ibu Kandung *</label>
			<div class="col-md-12">
				<input type="text" class="form-control" name="nama_ibu" data-regis-form="Nama Ibu" placeholder="Nama Ibu" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">No. HP</label>
			<div class="col-md-12">
				<input type="text" class="form-control" name="no_hp_ibu" placeholder="No. HP" value="">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-md-12 col-form-label"> Pekerjaan Ibu</label>
			<div class="col-md-12">
				<input type="text" class="form-control" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">Penghasilan Ibu</label>
			<div class="col-md-12">
				<input type="text" class="form-control" name="penghasilan_ibu" placeholder="Penghasilan Ibu">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">Kebutuhan Khusus Ibu</label>
			<div class="col-md-12">
				<input type="text" class="form-control" name="kebutuhan_khusus_ibu" placeholder="Kebutuhan Khusus Ibu">
			</div>
		</div>
	</div>
	<div id="wali-wrapper">
		<hr>
		<div class="row">
			<div class="col-md-12"> <h3 class="m-0">Data Wali</h3> </div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">Nama Wali</label>
			<div class="col-md-12">
				<input type="text" class="form-control data-wali" name="nama_wali" placeholder="Nama Wali">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">Hubungan</label>
			<div class="col-md-12">
				<input type="text" class="form-control data-wali" name="hubungan" placeholder="Keluarga/Kerabat, Orang Tuan, Kenalan, dll.." value="">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">No. HP</label>
			<div class="col-md-12">
				<input type="text" class="form-control data-wali" name="no_hp_wali" placeholder="No. HP" value="">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">Email</label>
			<div class="col-md-12">
				<input type="text" class="form-control data-wali" name="email_wali" placeholder="Email" value="">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">Alamat Wali</label>
			<div class="col-md-12">
				<input type="text" class="form-control data-wali" name="alamat_wali" placeholder="Alamat" value="">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">Pekerjaan Wali</label>
			<div class="col-md-12">
				<input type="text" class="form-control data-wali" name="pekerjaan_wali" placeholder="Pekerjaan Wali">
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-12 col-form-label">Penghasilan Wali</label>
			<div class="col-md-12">
				<input type="text" class="form-control data-wali" name="penghasilan_wali" placeholder="Penghasilan Wali">
			</div>
		</div>
	</div>

	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Upload KTP</label>
		<div class="col-md-12">
			<input type="file" name="ktp" value="" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Upload Paspor *jika ada</label>
		<div class="col-md-12">
			<input type="file" name="paspor" value="">
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Upload KK</label>
		<div class="col-md-12">
			<input type="file" name="kk" value="" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Akta Lahir</label>
		<div class="col-md-12">
			<input type="file" name="akta_lahir" value="" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Kartu Keluarga Sejahtera (KKS) *jika ada</label>
		<div class="col-md-12">
			<input type="file" name="kks" value="">
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Ijazah (bisa lebih dari satu) </label>
		
		<div class="col-md-12">
			<input type="file" name="ijazah[]" multiple value="" required>
			<div style="color:red">Keterangan : Izajah terakhir</div>
		</div>
	</div>

				<!-- 	<div class="form-group row">
						<label class="col-md-12 col-form-label">
							
						</label>
						<div class="col-md-12">
							<div
							class="dropzone dz-clickable"
							id="my-dropzone">

							<div class=" dz-message d-flex flex-column" style="display: flex;" onclick="dropzone_file_dialog()">
								<i class="material-icons text-muted">cloud_upload</i>
								Drag &amp; Drop here or click
							</div>

							<div class="fallback">
								<input name="file" type="file" multiple />
							</div>
						</div>
					</div>
				</div> -->
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
				<div class="col-md-12 text-right p-0">
					<input type="button" class="btn btn-secondary" name="btn-prev" id="btn-prev" value="Previous" onclick="prevTab()" style="display:none">
					<input type="button" class="btn btn-primary" name="btn-next" id="btn-next" value="Next" onclick="nextTab()" disabled>
					<input type="submit" id="registration-submit-btn" name="registration-submit-btn" class="btn btn-primary" value="Submit" style="display:none">
				</div>
			</div>
		</form>
	</div>
</div>
</div>
@if(isset($data_reseller))
<div class="row form-group">
	<div class="col-md-12 p-0">
		<a href="{{url('products/registration-and-payment'.'/'.$data_reseller['kode_reseller'].'/'.$data_reseller['slug'].'/cancel')}}" class="btn btn-secondary">Back to previous step</a>
		
	</div>
</div>
@endif
</div>
</div>

</div>
@endsection
@push('more-script')
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript" src="{{asset('js/parsley.js')}}"></script>
<script type="text/javascript">
	var currentTab = 0;
	var tabs = $('.tab-wrapper');
	var tab_indicator = $('.inline');
	tabs.each(function(index, section) {
		$(section).find(':input').attr('data-parsley-group', 'block-' + index);
	});
	$(document).ready(function(){
		if(document.getElementById('registration-agree').checked){
			document.getElementById('btn-next').disabled = false;
		}else{
			document.getElementById('btn-next').disabled = true;
		}
	});
	document.getElementById('registration-agree').addEventListener('change', function() {
		if (this.checked) {
			document.getElementById('btn-next').disabled = false;
		} else {
			document.getElementById('btn-next').disabled = true;
		}
	});

	if($(document).width() <= 576){
		$('.datepicker').datepicker({
			numberOfMonths: 1,
			showButtonPanel : false,
			dateFormat: 'yy-mm-dd',
			minDate : "+0d",
			maxDate: "+1y",
			beforeShowDay:check_available_date,
			onSelect: function(date) {
				console.log(date);
				$(this).next(".TGL_TEST").val(date);
			}
		});
	}else{
		$('.datepicker').datepicker({
			numberOfMonths: 2,
			showButtonPanel : false,
			dateFormat: 'yy-mm-dd',
			minDate : "+0d",
			maxDate: "+1y",
			beforeShowDay:check_available_date,
			onSelect: function(date) {
				console.log(date);
				$(this).next(".TGL_TEST").val(date);
			}
		});
	}

	$('.ui-datepicker-current-day.ui-datepicker-today > a').removeClass('ui-state-active');
	$('.ui-datepicker-current-day.ui-datepicker-today > a').removeClass('ui-state-highlight');
	var x = window.matchMedia("(max-width: 576px)");
	x.addListener(function(x){
    if (x.matches) { // If media query matches
    	$( ".datepicker" ).datepicker( "option", "numberOfMonths", 1 );
    } else {
    	$( ".datepicker" ).datepicker( "option", "numberOfMonths", 2 );
    }
});

	
	function check_available_date(date){
		var availableDates = JSON.parse(this.dataset.availableDates);
		dmy = ('0'+date.getDate()).slice(-2) + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
		if ($.inArray(dmy, availableDates) != -1) {
			return [true, "","Available"];
		} else {
			return [false,"","unAvailable"];
		}
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
			$('#registration-submit-btn').hide();
		}
	}
	function nextTab(){
		$('#registrationForm').parsley().whenValidate({
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
				var elements = document.getElementById('registrationForm').elements;

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
							var label = elements[i].dataset.regisForm;
							var el_text = elements[i].value;

							if(elements[i].tagName == "SELECT"){
								if(el_text != ""){
									el_text = elements[i].options[elements[i].selectedIndex].text;
								}else{
									el_text = "-";
								}
							}
							output_summary += '<div class="col-12 mb-3">'+
							'<strong class="summary-label">'+label+'</strong>'+
							'<div class="summary-value">'+el_text+'</div>'+
							'</div>';
						}

					}
				}

				var token = $("input[name='_token']").val();

				$('#summary').html(output_summary);
				$('#registration-submit-btn').show();
				$('#btn-next').hide();
			}
		});
	}

	$('#cancel-payment-btn').bind('click',function(e){
		e.preventDefault();
		if(confirm("Are you sure want to go back ?")){
			window.location.href = $(this).attr('href');
		}
	});


	function ganti_jenis_tinggal(e){
		if(e.value == 'Wali'){
			$('input.data-wali').prop("required",true);
		}else{
			$('input.data-wali').removeAttr("required");
		}
	}
	

	function proceed_to_payment(){
		var phone_input = document.getElementById('msisdn').__vue__;
		var phone_result = phone_input.results;
		var phone_number;
		if(phone_result.isValid){
			phone_number = phone_result.countryCallingCode+phone_result.nationalNumber;
		}
	}

</script>
@endpush