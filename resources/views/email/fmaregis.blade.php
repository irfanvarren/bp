<h3>Data Pendaftaran FMA</h3>
<p>
Nama : {{$email->nama_depan.' '.$email->nama_belakang}}
</p>
<p>
Kode Referral : {{$email->kode_referral}}
</p>
<p>
Tanggal Lahir : {{$email->tanggal_lahir.'/'.$email->bulan_lahir.'/'.$email->tahun_lahir}}
</p>
<p>
No. KTP : {{$email->no_ktp}}
</p>
<p>
No. Paspor : {{$email->no_paspor}}
</p>
<p>
Alamat Sekarang : {{$email->alamat_sekarang}}, Kota : {{$email->kota_sekarang}}
</p>
<p>
Alamat KTP : {{$email->alamat_ktp}}, Kota : {{$email->kota_ktp}}
</p>
<p>
No. HP : {{$email->no_telepon}}
</p>
<p>
Email : {{$email->email}}
</p>
<h3>Informasi Akun / Rekening Tabungan</h3>
<h4>Indonesia</h4>
<p>Nama Bank : {{$email->nama_bank}}</p>
<p>Nama Akun Bank : {{$email->nama_akun_bank}}</p>
<p>No. Rekening : {{$email->nomor_rekening}}</p>
<h4>Australia</h4>

<p>Nama Bank : {{$email->nama_bank_australia}}</p>
<p>Nama Akun Bank : {{$email->nama_akun_bank_australia}}</p>
<p>No. Rekening : {{$email->nomor_rekening_australia}}</p>
<p>Nama BSB : {{$email->nama_bsb}}</p>
<p>Nama Swift Code : {{$email->swift_code}}</p>
<p>Nama Cabang : {{$email->nama_cabang}}</p>
