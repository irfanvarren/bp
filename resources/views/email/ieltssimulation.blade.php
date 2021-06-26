<h2>Data Pendaftaran Simulasi IELTS ({{$email->jenis_test}})</h2>
<p>Module : {{$email->NAMA_MODULE}}</p>
<p>
Tanggal Simulasi Yang dipilih : {{$email->TGL_SIMULASI != "" ? date("d/m/Y",strtotime($email->TGL_SIMULASI)) : ''}}
</p>
<p>Cabang : {{$email->REF_PERUSAHAAN}}</p>
<p>
Nama : {{$email->NAMA}}
</p>

<p>
  No HP : {{$email->KONTAK}}
</p>
<p>
Email : {{$email->EMAIL}}
</p>
<p>
NIK : {{$email->REF_KTP}}
</p>
<p>Alamat : {{$email->ALAMAT}}</p>
<p>
Tempat Kelahiran : {{$email->KOTA_KELAHIRAN}}
</p>
<p>
Tanggal Lahir : {{$email->tgl_lahir.'/'.$email->bulan_lahir.'/'.$email->tahun_lahir}}
</p>
<p>Tujuan Mengikuti Simulasi : {{$email->ALASAN}}</p>
