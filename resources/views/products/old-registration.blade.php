@extends('products.registration-payment')
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
							@if(isset($data_reseller))
							<input type="hidden" name="kode_reseller" value="{{$data_reseller['kode_reseller']}}">
							<input type="hidden" name="slug" value="{{$data_reseller['slug']}}">
							<input type="hidden" name="REF_PAKET" value="{{$data_reseller['REF_PAKET']}}">
							<input type="hidden" name="REF_LEVEL" value="{{$data_reseller['REF_LEVEL']}}">
							<input type="hidden" name="REF_KATEGORI" value="{{$data_reseller['REF_KATEGORI']}}">
							<input type="hidden" name="REF_PRICELIST" value="{{$data_reseller['REF_PRICELIST']}}">
							<input type="hidden" name="JUMLAH_JAM" value="{{$data_reseller['JUMLAH_JAM']}}">
							<input type="hidden" name="JUMLAH_PERTEMUAN" value="{{$data_reseller['JUMLAH_PERTEMUAN']}}">
							@endif
							<input type="hidden" name="offer_letter_settings" value="{{$offer_letter_settings}}">
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
											<option value="{{$data->KD}}" {{ $registration_data ? $registration_data->REF_PERUSAHAAN == $data->KD ? 'selected' : '' : ''}}>{{ucwords(strtolower($data->NAMA))}}</option>
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
			<label for="" class="col-form-label col-md-12"> Nama Peserta </label>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4 mb-1">

						<input type="text" class="form-control" id="nama_depan" name="nama_depan" required placeholder="Nama Depan"  data-regis-form="Nama Depan / First Name" value="{{ucwords($first_name)}}">
					</div>
					<div class="col-md-4 mb-1">
						<input type="text" class="form-control" id="nama_tengah" name="nama_tengah" placeholder="Nama Tengah"  data-regis-form="Nama Tengah / Middle Name" value="{{ucwords($middle_name)}}">
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
						<input type="text" class="form-control" name="tempat_lahir" required placeholder="Tempat Lahir"  data-regis-form="Tempat Lahir / Place of Birth" value="{{$registration_data ? $registration_data->KOTA_KELAHIRAN : ''}}">
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
						$tanggal_lahir = $bulan_lahir = $tahun_lahir = "";
						if($registration_data){
						$tanggal_lahir_arr = explode('-',$registration_data->TGL_LAHIR);
						$tanggal_lahir = $tanggal_lahir_arr[2];
						$bulan_lahir = $tanggal_lahir_arr[1];
						$tahun_lahir = $tanggal_lahir_arr[0];
					}
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
				<option value="Laki - laki" {{$registration_data ? $registration_data->JK == 'Laki - laki' ? 'selected' : '' : ''}}>Laki - laki</option>
				<option value="Perempuan" {{$registration_data ? $registration_data->JK == 'Perempuan' ? 'selected' : '' : ''}}>Perempuan</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Kewarganegaraan / Nationality</label>
		<div class="col-md-8">
			<input type="text" name="kewarganegaraan"  data-regis-form="Kewarganegaraan / Nationality" class="form-control" placeholder="Kewarganegaraan" value="{{$registration_data ? $registration_data->KEWARGANEGARAAN : ''}}" required>
		</div>
	</div>
	<div class=" row">
		<div class="col-md-8">
			<div class="row mb-3">
				<label for="" class="col-form-label col-md-12">No. KTP / ID-card Number</label>
				<div class="col-md-12">
					<input type="text" name="no_ktp" placeholder="No KTP" data-regis-form="No. KTP / ID-card Number" pattern="[0-9]{16}" required class="form-control" value="{{$registration_data ? $registration_data->REF_KTP : ''}}">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row mb-3">

				<label for="" class="col-form-label col-md-12">No. Passport / Passport Number</label>
				<div class="col-md-12">
					<input type="text" name="no_paspor" data-regis-form="No. Passport / Passport Number" placeholder="No Paspor" class='form-control' value="{{$registration_data ? $registration_data->REF_PASPOR : ''}}">
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
				<label for="" class="col-form-label col-md-12">Kota / City</label>
				<div class="col-md-12">
					<input type="text" name="kota" id="kota" data-regis-form="Kota / City" placeholder="Kota Tempat Tinggal" required class='form-control' value="{{$registration_data ? $registration_data->REF_KOTA : ''}}">
				</div>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="row">
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
		<div class="col-md-8">
			<div class="row mb-3">
				<label for="" class="col-form-label col-md-12">Alamat Email / Email Address</label>
				<div class="col-md-12">
					<input type="email" name="email" id="email" placeholder="Email"  data-regis-form="Alamat Email / Email Address" data-parsley-type="email" required class="form-control" value="{{$registration_data ? $registration_data->EMAIL : auth()->user()->email}}">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row mb-3">

				<label for="" class="col-form-label col-md-12">Agama / Religion</label>
				<div class="col-md-12">
					<select class="form-control" id="agama" data-regis-form="Agama / Religion" name="agama" required>
						<option value="">Agama</option>
						<option value="Buddha" {{$registration_data ? $registration_data->AGAMA == 'Buddha' ? 'selected' : '' : ''}}>Budha</option>
						<option value="Katholik" {{$registration_data ? $registration_data->AGAMA == 'Katholik' ? 'selected' : '' : ''}}>Katolik</option>
						<option value="Kristen" {{$registration_data ? $registration_data->AGAMA == 'Kristen' ? 'selected' : '' : ''}}>Kristen</option>
						<option value="Kong Hu Cu" {{$registration_data ? $registration_data->AGAMA == 'Kong Hu Cu' ? 'selected' : '' : ''}}>Kong Hu Cu</option>
						<option value="Hindu" {{$registration_data ? $registration_data->AGAMA == 'Hindu' ? 'selected' : '' : ''}}>Hindu</option>
						<option value="Islam" {{$registration_data ? $registration_data->AGAMA == 'Islam' ? 'selected' : '' : ''}}>Islam</option>
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
					<input type="text" name="no_telepon" id="no_telepon" data-regis-form="No. HP / WA" placeholder="08xxxxxxxxxx" Required class='form-control' value="{{$registration_data ? $registration_data->KONTAK : ''}}">
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
					<input type="text" name="jurusan"  placeholder="Jurusan" class="form-control" value="{{$registration_data ? $registration_data->TINGKAT_PENDIDIKAN == 'S3' ? 'selected' : '' : ''}}">
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
					<select class="form-control" name="pekerjaan">
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
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label" style="color:red">Nama Ayah *</label>
		<div class="col-md-12">
			<input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">No. HP</label>
		<div class="col-md-12">
			<input type="text" class="form-control" name="no_hp_ayah" placeholder="No. HP" value="">
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Email</label>
		<div class="col-md-12">
			<input type="text" class="form-control" name="email_ayah" placeholder="Email" value="">
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Pekerjaan Ayah</label>
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
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label" style="color:red">Nama Ibu Kandung *</label>
		<div class="col-md-12">
			<input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ayah" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">No. HP</label>
		<div class="col-md-12">
			<input type="text" class="form-control" name="no_hp_ibu" placeholder="No. HP" value="">
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Email</label>
		<div class="col-md-12">
			<input type="text" class="form-control" name="email_ibu" placeholder="Email" value="">
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Pekerjaan Ibu</label>
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

	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Alamat Orang Tua</label>
		<div class="col-md-12">
			<input type="text" class="form-control" name="alamat_orang_tua" placeholder="Alamat" value="">
		</div>
	</div>
	<hr>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Nama Wali</label>
		<div class="col-md-12">
			<input type="text" class="form-control" name="nama_wali" placeholder="Nama Wali">
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
		<label for="" class="col-md-12 col-form-label">Alamat Wali</label>
		<div class="col-md-12">
			<input type="text" class="form-control" name="alamat_wali" placeholder="Alamat" value="">
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Pekerjaan Wali</label>
		<div class="col-md-12">
			<input type="text" class="form-control" name="pekerjaan_wali" placeholder="Pekerjaan Wali">
		</div>
	</div>
	<div class="form-group row">
		<label for="" class="col-md-12 col-form-label">Penghasilan Wali</label>
		<div class="col-md-12">
			<input type="text" class="form-control" name="penghasilan_wali" placeholder="Penghasilan Wali">
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
<!-- <div class="row form-group">
	<div class="col-md-12 p-0">
		<a href="{{url('products/cancel-payment')}}" class="btn btn-secondary">Back to Cart</a>
	</div>
</div> -->
</div>
</div>

</div>


@endsection

@push('more-script')
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
								el_text = elements[i].options[elements[i].selectedIndex].text;
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