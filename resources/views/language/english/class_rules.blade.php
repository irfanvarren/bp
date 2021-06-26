@extends('layouts.bp_wo_sidenav')
<style media="screen">
  ol{
    list-style-position:inside;

  }
  ol li{
    padding-bottom:8px;
  }
</style>
@section('content')
<div class="col-md-12 content-wrapper" style="padding:30px 60px;">
  <h2>ATURAN KELAS DI BEST PARTNER EDUCATION</h2>
  <ol>
    <li>Siswa harus hadir tepat waktu / hadir 15 menit sebelum jam les atau test di mulai.
</li>
<li>Berpakaian rapi dan sopan.
</li>
<li>Tidak melakukan tindakan yang merugikan Best Partner Education</li>
<li>Siswa harus menjaga Ketertiban , Keamanan , Keindahan dan Kenyamanan di kelas.</li>
<li>Siswa dilarang membawa barang – barang berbahaya seperti senjata tajam , bahan kimia , dll </li>
<li>Siswa dilarang membawa dan menggunakan handphone di dalam kelas, terkecuali dalam situasi yang mendadak seperti di telephone oleh keluarga / hal mendesak lainnya. </li>
<li>Siswa di larang makan didalam kelas.</li>
<li>Tidak membawa pulang asset milik Best Partner Education</li>
<li>Tidak merusak aset milik Best Partner Education , jika merusak maka sanksi nya harus mengganti barang yang rusak tersebut.</li>
<li>	 Siswa tidak diperkenankan mengganggu peserta didik yang lain.</li>
<li>	 Siswa tidak diperkenankan melakukan corat – coret pada bagian manapun didalam ruangan kelas dan test IELTS.</li>
  </ol>
  <a href="{{URL::previous()}}">Kembali ke halaman sebelumnya</a>
</div>

@stop
