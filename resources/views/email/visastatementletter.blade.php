<h3>Data Surat Pernyataan Visa</h3>
@php
$nama = '';
if($email->nama_depan!=''){
$nama .= $email->nama_depan;
}
if($email->nama_tengah!=''){
$nama .= ' '.$email->nama_tengah;
}

if($email->nama_belakang!=''){
$nama .= ' '.$email->nama_belakang;
}
@endphp
<p>Nama : {{$nama}}</p>
<p>Tanggal Lahir : {{$email->tanggal_lahir.'/'.$email->bulan_lahir.'/'.$email->tahun_lahir}}</p>
<p>Jenis Kelamin : {{$email->jenis_kelamin}}</p>
<p>Alamat : {{$email->alamat}}</p>
<p>Kota : {{$email->kota}}, Provinsi : {{$email->provinsi}}</p>
<p>Kode Pos : {{$email->kode_pos}}, Negara : {{$email->country}}</p>
<p>Email : {{$email->email}}</p>
<p>No Telepon : {{$email->no_telepon}}</p>
<p>Jenis Visa : {{$email->jenis_visa}}</p>
<p>Negara Tujuan : {{$email->negara_tujuan}}</p>
<p>Nama Rekening : {{$email->nama_rekening}}</p>
<p>Nomor Rekening : {{$email->namor_rekening}}</p>
<p>Nama Bank : {{$email->nama_bank}}</p>
<p>Cabang Bank : {{$email->cabang_bank}}</p>
