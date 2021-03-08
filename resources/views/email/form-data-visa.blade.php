<head>
	<style type="text/css">
		.col-md-12{
			width:100%;
			float:left;
			margin-bottom:15px;
		}
		.table{
			width:100%;
			border-collapse:collapse;
		}
		.table tr td,.table tr th{
			border:1px solid black;
			padding:5px;
		}
	</style>
</head>
@php
$tgl_lahir = $email->tanggal_lahir.'/'.$email->bulan_lahir.'/'.$email->tahun_lahir
@endphp
<h3>Form Data Visa Turis - Australia</h3>
<div class="col-md-12">
	<table class="table table-bordered">
		<tr>
			<th colspan="2">Data Pemohon</th>
		</tr>
		<tr>
			<td>Nama Lengkap</td> <td>{{$email->nama_lengkap}}</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td> <td>{{$email->jenis_kelamin}}</td>
		</tr>
		<tr>
			<td>Tempat / Tanggal Lahir</td> <td>{{$email->tempat_lahir}},{{$tgl_lahir}}</td>
		</tr>
		<tr>
			<td>Status Perkawinan</td> <td>{{$email->status_perkawinan}}</td>
		</tr>
	</table>
</div>
<div class="col-md-12">
<table class="table table-bordered">
	<tr>
		<th colspan="2">Domisili</th>
	</tr>
	<tr>
		<td>Alamat</td> <td>{{$email->alamat}}</td>
	</tr>
	<tr>
		<td>Kota</td> <td>{{$email->kota}}</td>
	</tr>
	<tr>
		<td>Provinsi</td> <td>{{$email->provinsi}}</td>
	</tr>

</table>
</div>
<div class="col-md-12">
<table class="table table-bordered">
	<tr>
		<th colspan="2">Kontak</th>
	</tr>
	<tr>
		<td>Handphone</td> <td>{{$email->handphone}}</td>
	</tr>
	<tr>
		<td>Handphone</td> <td>{{$email->email}}</td>
	</tr>
</table>
</div>
@php
$tgl_lahir_dibawah_umur = $email->tanggal_lahir_dibawah_umur.'/'.$email->bulan_lahir_dibawah_umur.'/'.$email->tahun_lahir_dibawah_umur;
@endphp
<div class="col-md-12">
<table class="table table-bordered">
	<tr>
		<th colspan="2">Data Pemohon Di Bawah Umur</th>
	</tr>
	<tr>
		<td>Nama Lengkap</td> <td>{{$email->nama_lengkap_dibawah_umur}}</td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td><td>{{$email->jenis_kelamin_dibawah_umur}}</td>
	</tr>
	<tr>
		<td>Tempat / Tanggal Lahir</td> <td>{{$email->tempat_lahir_dibawah_umur}}, {{$tgl_lahir_dibawah_umur}}</td>
	</tr>
	<tr>
		<td>Jumlah Pendamping</td> <td>{{$email->jlh_pendamping}}</td>
	</tr>
</table>
</div>
@php
$tgl_lahir_pendamping1 = $email->tanggal_lahir_pendamping1.'/'.$email->bulan_lahir_pendamping1.'/'.$email->tahun_lahir_pendamping1;
@endphp
<div class="col-md-12">
<table class="table table-bordered">
	<tr>
		<th colspan="2">
			Data Pendamping (i)
		</th>
	</tr>
	<tr>
		<td>Nama Lengkap</td> <td>{{$email->nama_lengkap_pendamping1}}</td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td> <td>{{$email->jenis_kelamin_pendamping1}}</td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td><td>{{$tgl_lahir_pendamping1}}</td>	
	</tr>
	<tr>
		<td>Hubungan</td> <td>{{$email->hubungan_pendamping1}}</td>
	</tr>
</table>
</div>

@php
$tgl_lahir_pendamping2 = $email->tanggal_lahir_pendamping2.'/'.$email->bulan_lahir_pendamping2.'/'.$email->tahun_lahir_pendamping2;
@endphp

<div class="col-md-12">
<table class="table table-bordered">
	<tr>
		<th colspan="2">
			Data Pendamping (ii)
		</th>
	</tr>
	<tr>
		<td>Nama Lengkap</td> <td>{{$email->nama_lengkap_pendamping2}}</td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td> <td>{{$email->jenis_kelamin_pendamping2}}</td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td><td>{{$tgl_lahir_pendamping2}}</td>	
	</tr>
	<tr>
		<td>Hubungan</td> <td>{{$email->hubungan_pendamping2}}</td>
	</tr>
</table>
</div>

@php
$tgl_lahir_kerabat = $email->tanggal_lahir_kerabat.'/'.$email->bulan_lahir_kerabat.'/'.$email->tahun_lahir_kerabat;
@endphp

<div class="col-md-12">
<table class="table table-bordered">
	<tr>
		<th colspan="2">
			Data Kerabat Di Australia
		</th>
	</tr>
	<tr>
		<td>Nama Lengkap</td> <td>{{$email->nama_lengkap_kerabat}}</td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td> <td>{{$email->jenis_kelamin_kerabat}}</td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td><td>{{$tgl_lahir_kerabat}}</td>	
	</tr>
	<tr>
		<td>Alamat</td><td>{{$email->alamat_kerabat}}</td>
	</tr>
	<tr>
		<td>Kota</td> <td>{{$email->kota_kerabat}}</td>
	</tr>
	<tr>
		<td>Negara Bagian</td><td>{{$email->negara_bagian_kerabat}}</td>
	</tr>
	<tr>
		<td>Kode Pos</td> <td>{{$email->kode_pos_kerabat}}</td>
	</tr>
	<tr><td>Status Kewarganegaraan</td><td>{{$email->status_kewarganegaraan_kerabat}}</td></tr>
	<tr><td>Handphone</td><td>{{$email->handphone_kerabat}}</td></tr>
	<tr><td>Email</td><td>{{$email->email_kerabat}}</td></tr>
</table>
</div>

<div class="col-md-12">
<table class="table table-bordered">
	<tr>
		<th colspan="2">
			Bukti Keuangan
		</th>
	</tr>
	<tr>
		<td>Nama Lengkap</td> <td>{{$email->nama_lengkap_bukti_keuangan}}</td>
	</tr>
	<tr>
		<td>Hubungan Sponsor</td> <td>{{$email->hubungan_sponsor}}</td>
	</tr>
	<tr>
		<td>Jumlah Saldo</td><td>{{$email->jlh_saldo}}</td>	
	</tr>
	<tr>
		<td>Status Pekerjaan</td><td>{{$email->status_pekerjaan_bukti_keuangan}}</td>
	</tr>
</table>
</div>
<div class="col-md-12">
<table class="table table-bordered">
	<tr>
		<th colspan="2">
			Organisasi
		</th>
	</tr>
	<tr>
		<td>Nama Organsisasi</td> <td>{{$email->nama_organisasi}}</td>
	</tr>
	<tr>
		<td>Alamat</td> <td>{{$email->alamat_organisasi}}</td>
	</tr>
	<tr>
		<td>Jumlah Saldo</td> <td>{{$email->jlh_saldo_organisasi}}</td>
	</tr>
	

</table>
</div>

<div class="col-md-12">
<table class="table table-bordered">
	<tr>
		<th colspan="2">
			Status Pekerjaan
		</th>
	</tr>
	<tr>
		<td>Pekerjaan</td> <td>{{$email->pekerjaan}}</td>
	</tr>
	<tr>
		<td>Tanggal Bekerja</td> <td>{{$email->tgl_bekerja}}</td>
	</tr>
		<td>Alamat</td><td>{{$email->alamat_bekerja}}</td>
	</tr>
	<tr>
		<td>Kota</td> <td>{{$email->kota_bekerja}}</td>
	</tr>
	<tr>
		<td>Provinsi</td><td>{{$email->provinsi_bekerja}}</td>
	</tr>
	<tr>
		<td>Telefon</td> <td>{{$email->nomor_telefon_bekerja}}</td>
	</tr>
</table>
</div>

<p>
	Apakah sebelumnya pernah mengajukan visa Australia ? <br>
	{{$email->informasi_tambahan1}}
</p>
<p>
	Apakah pernah mengalami penolakan visa ? ? <br>
	{{$email->informasi_tambahan2}}
</p>
<p>
	Apakah pernah melanggar kondisi visa ? <br>
	{{$email->informasi_tambahan3}}
</p>
<p>
	Apakah pernah melakukan medical check up (kesehatan) dalam 12 bulan terakhir ? <br>
	{{$email->informasi_tambahan4}}
</p>
<p>
	Apakah pernah terlibat dalam aksi ilegal dan melanggar Hukum ? <br>
	{{$email->informasi_tambahan5}}
</p>