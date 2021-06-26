@extends('layouts.bp_wo_sidenav')
<style media="screen">
  ul {
    padding: 0 20px !important;
    display: inline-block;
    text-align: justify;

  }

  ul li div,
  ol li div {
    padding-bottom: 8px;
  }
  ol{margin-top:8px !important;}

  .justify {
    text-align: justify;
  }
</style>
@section('content')
<div class="col-md-12 content-wrapper">
  <div class="col-md-12"><h3>Syarat Dan Ketentuan</h3>
  <ol class="col-md-12">
    <li><div class="justify">Data yang telah terdaftar kemudian akan menjadi bagian dari hak kepemilikan data di Best Partner Education</div></li>
    <li><div class="justify">Kami mengumpulkan dan memproses informasi dan Data Pribadi anda seperti nama, alamat, nomor kartu identitas, nomor telepon, dan alamat surat elektronik anda dan kami berhak menggunakan data yang terdaftar untuk kepentingan Best Partner Education.</div></li>
    <li><div class="justify">Anda mengerti dan memahami bahwa dengan memberikan data pribadi maka anda mematuhi syarat ketentuan yang diberikan oleh Best Partner Education  </div></li>
  </ol></div>

<div class="col-md-12">
  <a href="{{URL::previous()}}">Kembali Ke Halaman Sebelumnya</a>
</div>
</div>
@stop
