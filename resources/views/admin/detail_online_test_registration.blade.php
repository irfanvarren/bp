@extends('layouts.app-auth', ['activePage' => 'ielts-regis','activeMenu' => 'data-management', 'titlePage' => __('Ielts Registration')])
<style media="screen">
  .loading-wrapper {
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999999;
    display: none;
    background: rgba(255, 255, 255, 1);
  }

  .loading-wrapper img {
    display: block;
    margin: 0 auto;
    width: 500px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

  }

  .form-group input[type=file] {
    position: relative !important;
    opacity: 1 !important;
  }

  .table {
    font-size: 14px;
  }

  .table th,
  .table td {
    padding: 6px 8px;
  }
</style>
<!-- nama tgl lahir tempat lahir pekerjaan sektor pekerjaan modul ielts tgl ielts  -->
@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
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
            <div class="col-md-6">

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
                  <tr>
                      <th colspan="2">Data Pendaftaran {{$detail->test_name}} {{$detail->module_name != "" ? '('.$detail->module_name.')' : ''}}</th>
                  </tr>
                  <tr>
                      <td>Test Module</td>
                      <td>{{$detail->test_module}}</td>
                  </tr>
                  <tr>
                      <td>Nama</td>
                      <td>{{$detail->NAMA}}</td>
                  </tr>
                  <tr>
                      <td>Kota Kelahiran</td>
                      <td>{{date("d/m/Y",strtotime($detail->KOTA_LAHIR))}}</td>
                  </tr>
                  <tr>
                      <td>Tanggal Lahir</td>
                      <td>{{date("d/m/Y",strtotime($detail->TGL_LAHIR))}}</td>
                  </tr>
                  <tr>
                      <td>Alamat</td>
                      <td>{{$detail->ALAMAT}}</td>
                  </tr>
              
                  <tr>
                      <td>No Telepon</td>
                      <td>{{$detail->KONTAK}}</td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>{{$detail->EMAIL}}</td>
                  </tr>
                  <tr>
                    
                    <td>NIK</td>
                    <td>{{$detail->REF_KTP}}</td>
                  </tr>

              </table>
              <br>

            </div>
            <div class="col-md-6">
                 <div class="row">
                <div class="col-md-12">

                  <h3>KTP</h3>
                </div>
                <div class="col-md-12">
                  <img style="width:300px;height:auto;" src="{{str_replace(url('public'),'',asset(Storage::disk('local')->url($detail->PATH_KTP))) }}" alt="Not Image">
                    <a href="{{asset(Storage::disk('local')->url($detail->PATH_KTP)) }}" download>Download</a>
                  
                  
                  
                </div>
                </div>
              <div class="row">
                <div class="col-md-12">

                  <h3>Bukti Pembayaran</h3>
                </div>
                <div class="col-md-12">
                  <img style="width:300px;height:auto;" src="{{asset(Storage::disk('local')->url($detail->bukti_pembayaran)) }}" alt="Not Image">
                    <a href="{{asset(Storage::disk('local')->url($detail->bukti_pembayaran)) }}" download>Download</a>
                  
                </div>
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
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
@endpush
