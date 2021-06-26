@extends('layouts.bp_wo_sidenav')
<style media="screen">
  form input{
    display:block !important;
    margin:0 auto;
    width:300px;
    padding:10px;
  }
  form input[type="file"]{

    background:#f7efa8;
  }
  form input[type="submit"]{
    padding:12px;
  }
  .upload-wrapper{
    margin-top:70px;
    padding:25px;
    background:#f0f0f0;
    box-shadow:2px 2px 3px #ccc;
  }
</style>
@section('content')

<div class="col-md-12 content-wrapper">
  <div class="row h-100">
    <div class="container h-100">
      <div class="row justify-content-center">
        @if($validasi->bukti_pembayaran != "")
        <div class="col-md-12 h-100 mt-5">
          <div class="alert alert-success text-center" style="position:relative;top:50%;transform: translateY(-50%);">
            Bukti pembayaran sudah terupload, kami akan mengirimkan link simulasi ke email anda setelah memverifikasi bukti pembayaran. <br>Proses ini paling lama membutuhkan waktu 1-2 hari.
          </div>
        </div>
        @else
        <div class="col-md-4 upload-wrapper">

          <h3 style="text-align:center;">Upload Bukti Pembayaran</h3> <br>
          <form action="{{url('/products/'.$test_name.'/simulation/upload-payment')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tgl_daftar" value="{{$tgl_daftar}}">
            <input type="hidden" name="token" value="{{$token}}">
            <div class="form-group row ">

              <div class="col-md-12">  <input type="file" name="bukti_pembayaran" value="" required></div>

            </div>
            <div class="form-group row">
              <div class="col-md-12"><input type="submit" name="" class="btn btn-primary" value="Submit"></div>

            </div>
          </form>

        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@stop
