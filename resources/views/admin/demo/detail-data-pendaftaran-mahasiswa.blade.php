@extends('layouts.app-auth', ['activePage' => 'data-pendaftaran','activeMenu' => 'demo-management', 'titlePage' => __('Pendaftaran Mahasiswa')])
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
.form-group input[type=file]{
  position:relative !important;
  opacity:1 !important;
}
.table{
  font-size:14px;
}
.table th,.table td{
  padding:6px 8px;
}
.file-pendaftaran{
  width:auto;height:300px;
}
@media screen and (max-width:480px){
  .file-pendaftaran{
    width:80%; height:auto;
  }
}
</style>
<!-- nama tgl lahir tempat lahir pekerjaan sektor pekerjaan modul ielts tgl ielts  -->
@section('content')
 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __("Details") }}</h4>
          </div>
          <div class="card-body">
            <div class="row">
            <div class="col-md-12">

              <head>
                  <style media="screen">
                      table,
                      th,
                      td {
                          border</td><td>1px solid black;
                          border-collapse</td><td>collapse;
                          text-align</td><td>center;
                          vertical-align</td><td>center;
                      }

                      th,
                      td {
                          padding</td><td>6px 8px;
                      }
                  </style>
              </head>

              <a href="{{URL::previous()}}">Back</a>
              <table class="table table-bordered">
                <colgroup>
                  <col style="width:30%;">
                  <col>
                </colgroup>
                  <tr>
                      <th colspan="2">Data Pendaftaran Mahasiswa</th>
                  </tr>
                  <tr>
                      <td>Nama</td>
                      <td>{{$data_pendaftaran->nama}}</td>
                  </tr>
                  <tr>
                      <td>No Kontak</td>
                      <td>{{$data_pendaftaran->no_kontak}}</td>
                  </tr>
                  <tr>
                      <td>Asal Sekolah / Jurusan</td>
                      <td>{{$data_pendaftaran->asal_sekolah.' / '.$data_pendaftaran->asal_jurusan}}</td>
                  </tr>
                  <tr>
                      <td>Jenis Kelamin</td>
                      <td>{{$data_pendaftaran->jenis_kelamin}}</td>
                  </tr>
                  <tr>
                      <td>Program Studi</td>
                      <td>{{$data_pendaftaran->program_studi}}</td>
                  </tr>
                    <tr>
                      <td>Terdaftar Tanggal</td>
                      <td>{{$data_pendaftaran->created_at}}</td>
                  </tr>
             

              </table>
              
            </div>
            <div class="col-md-12">
              <div class="row">
                @if($data_pendaftaran->bukti_pembayaran != "")
                <div class="col-md-6">
                <div class="col-md-12">

                  <h3>Bukti Pembayaran</h3>
                </div>
                <div class="col-md-12">
                  <img class="file-pendaftaran" src="{{asset(Storage::disk('public')->url($data_pendaftaran->bukti_pembayaran)) }}">
        
                </div>
                </div>
                @endif
                @if($data_pendaftaran->fotocopy_ktp != "")
                <dir class="col-md-6">
                  <div class="col-md-12">

                  <h3>Foto KTP</h3>
                </div>
                <div class="col-md-12">
                  <img class="file-pendaftaran" src="{{asset(Storage::disk('public')->url($data_pendaftaran->fotocopy_ktp)) }}">
                  

                </div>
                </dir>
                @endif
                @if($data_pendaftaran->fotocopy_rapor != "")
                <dir class="col-md-6">
                  <div class="col-md-12">

                  <h3>Foto Rapor</h3>
                </div>
                <div class="col-md-12">
                  <img class="file-pendaftaran" src="{{asset(Storage::disk('public')->url($data_pendaftaran->fotocopy_rapor)) }}">
                  

                </div>
                </dir>
                @endif
                @if($data_pendaftaran->fotocopy_ijazah != "")
                <dir class="col-md-6">
                   <div class="col-md-12">

                  <h3>Foto Ijazah</h3>
                </div>
                <div class="col-md-12">
                  <img class="file-pendaftaran" src="{{asset(Storage::disk('public')->url($data_pendaftaran->fotocopy_ijazah)) }}">
                  

                </div>
                </dir>
                @endif
                @if($data_pendaftaran->fotocopy_skhun != "")
                <dir class="col-md-6">
                     <div class="col-md-12">

                  <h3>Foto SKHUN</h3>
                </div>
                <div class="col-md-12">
                  <img class="file-pendaftaran" src="{{asset(Storage::disk('public')->url($data_pendaftaran->fotocopy_skhun)) }}">
                  

                </div>
                </dir>
                @endif
                </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
$(document).ready( function () {
  $('#myTable').DataTable();
} );
</script>
@endpush
