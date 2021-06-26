@extends('layouts.bp_wo_sidenav')
<style media="screen">

  .text-center{
    margin-top:auto;margin-bottom:auto;padding:0 70px;text-align:justify;
  }
  .tax-img{
background-size:70%;background-repeat:no-repeat;background-position: center; background-image:url('{{asset('/img/tax.png')}}');height:500px;
  }
  @media screen and (max-width:480px){
    .text-center{
      padding:0 30px;
    }
    .tax-img{
      background-size:60%;
      height:280px;
    }
  }
</style>
@section('title', 'Careers')
@section('content')
<div class="col-md-12 content-wrapper">
  <div class="row">

  <div class="col-md-5 tax-img" style=" ">
  </div>
  <div class="col-md-7 tax-text">


    <div class="text-center">
      <h2 style="text-align:center;">Tax Claim</h2>
      <p>
        Tahukah kalian bahwa kalian sebagai pelajar internasional yang kerja paruh waktu bisa mengajukan tax return untuk wages yang kalian dapatkan tiap bekerja 20 jam per minggu. Banyak sekali yang tidak tahu dan tidak mengerti bagaimana mengajukan tax return. BP saat ini bisa membantu kalian mengajukan tax return dengan biaya yang terjangkau dan tenaga professional.  Data pajak kalian akan dirahasiakan dari siapapun terkecuali anda dan tim pajak kami.
      </p>
      <p>Proses kerja untuk tax return 1-2 hari kerja dengan catatan dokumen yang diberikan sudah lengkap.</p>
      <p>So, Bayarlah pajak dan manfaatkan kebijakan pajak yang diberikan untuk bisa di maksimalkan kegunaannya.</p>
    </div>

  </div>
  </div>
</div>
@stop
