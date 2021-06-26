<h3> Data Pendaftaran Mahasiswa </h3>
<p>
	<div> Nomor Pendaftaran :</div>
	<div>{{$email->nomor_pendaftaran}}</div>
</p>
<p>
	<div> Program Studi :</div>
	<div>{{$email->program_studi}}</div>
</p>
<p>
	<div> No KTP :</div>
	<div>{{$email->no_ktp}}</div>
</p>
<p>
	<div> Nama :</div>
	<div>{{$email->nama}}</div>
</p>
<p>
	<div> Tempat / Tgl Lahir:</div>
	@php
	$tgl_lahir = $email->tanggal_lahir.'/'.$email->bulan_lahir.'/'.$email->tahun_lahir;
	@endphp
	<div>{{$email->tempat_lahir.','.$tgl_lahir}}</div>
</p>
<p>
	<div>Alamat Asal :</div>
	<div>{{$email->alamat_asal.','.$email->kota_asal}}</div>
</p>
<p>
	<div> Alamat Sekarang :</div>
	<div> 
		RT / RW : {{$email->rt_sekarang}} / {{$email->rw_sekarang}} <br> 
		Kel. / Kec. : {{$email->kelurahan_sekarang}} / {{$email->kecamatan_sekarang}} <br> 
		Provinsi : {{$email->provinsi_sekarang}} <br> 
	</div>
</p>
<p>
	<div> Jenis Kelamin :</div>
	<div>{{$email->jenis_kelamin}}</div>
</p>
<p>
	<div> Agama :</div>
	<div>{{$email->agama}}</div>
</p>
<p>
	<div> Status Pernikahan :</div>
	<div>{{$email->status_pernikahan}}</div>
</p>
<p>
	<div> Pekerjaan :</div>
	<div>{{$email->pekerjaan}}</div>
</p>
<p>
	<div> No Handphone :</div>
	<div>{{$email->no_hp}}</div>
</p>
@if($email->asal_sekolah != "" && $email->asal_jurusan_sekolah != "")
<p>
	<div> Asal SMA / Jurusan :</div>
	<div>{{$email->asal_sekolah}} / {{$email->asal_jurusan_sekolah}}</div>
</p>
@endif
@if($email->asal_univ != "" && $email->asal_jurusan_univ != "")
<p>
	<div> Asal SMA / Jurusan :</div>
	<div>{{$email->asal_univ}} / {{$email->asal_jurusan_univ}} <br> Lulus Tahun : {{$email->lulus_tahun}}</div>
</p>
@endif
<p>
	<div> Nama Ayah / Ibu :</div>
	<div>{{$email->nama_ayah}} / {{$email->nama_ibu}} </div>
</p>
<p>
	<div> Pendidikan Ayah / Ibu :</div>
	<div>{{$email->pendidikan_ayah}} / {{$email->pendidikan_ibu}} </div>
</p>
<p>
	<div> Pekerjaan Ayah / Ibu :</div>
	<div>{{$email->pekerjaan_ayah}} / {{$email->pekerjaan_ibu}} </div>
</p>
<p>
	<div> Alamat Orang Tua :</div>
	<div>{{$email->alamat_orang_tua}}</div>
</p>
<p>
	<div> Pengelaman Berorganisasi :</div>
	<div>{{$email->pengalaman_beroganisasi}}</div>
</p>