@extends('layouts.bp_wo_sidenav')
<style media="screen">
  ol,
  ul {
    list-style-position: inside;
  }

  ol li,
  ul li {
    padding-bottom: 7px;
  }

  h5 {
    margin-bottom: 7px;
    font-weight: bolder;
  }
</style>
@section('content')
<div class="col-md-12 content-wrapper">
  <div class="col-md-12">
    <div class="row justify-content-center">
      <div class="col-md-7">

        <div class="card-header" style="background:none;border:none;">
          <div class="" style="padding:30px 0 15px 0;">

            <h2 style="text-align:center;color:#368ca8">SURAT PERNYATAAN STUDY TOUR - KUCHING</h2>
          </div>
        </div>
        <div class="card">

          <div class="card-body" style="padding:30px;">
            <div>
            Menyatakan bahwa saya setuju dengan aturan yang telah berlaku di Best Partner yakni : <br>  
            </div>
            <div class="col-md-12">
            <ol>
              <li style="text-align:justify;">Saya menyetujui biaya Study Tour-Kuching yang telah ditetapkan oleh Best Travel.</li>
              <li style="text-align:justify;">Saya menyetujui susunan perjalanan dan prosedur yang telah dibuat oleh pihak Best Travel. </li>
              <li>Saya menyetujui untuk mematuhi syarat dan ketentuan yang berlaku selama perjalanan dan ikut dalam setiap kegiatan yang berlangsung selama Study Tour.</li>
              <li style="text-align:justify;">Apabila terjadi  pembatalan  sewaktu-waktu dari pihak Best Travel sebelum periode Study Tour, maka saya setuju untuk mendapatkan pengembalian uang secara penuh dengan proses 7 hari kerja dari tanggal pembatalan</li>
              <li style="text-align:justify;">Apabila terjadi  pembatalan  sewaktu-waktu dari pihak saya  sendiri sebelum  periode Study Tour, maka saya setuju untuk mendapatkan pengembalian uang secara penuh dengan proses 7 hari kerja dari tanggal pembatalan.</li>
              <li style="text-align:justify;">Apabila saya  tidak  memberikan informasi dan  tidak  mengikuti  perjalanan sampai hari  H keberangkatan untuk Study Tour, maka saya setuju tidak akan menerima pengembalian uang terkait biaya yang telah saya bayarkan.</li>
              <li style="text-align:justify;">Saya berjanji tidak akan melakukan postingan yang merugikan pihak manapun.</li>
            </ol>
           

            </div>
            <div>
             Saya telah membaca dan dengan sadar menandatangani surat pernyataan ini. Demikian pernyataan ini saya buat. <br>
            </div>
            
            <a class="btn btn-primary" style="width:100%;padding:10px;margin-top:15px;" href="{{url('form-study-tour-kuching')}}">
            Back </a> </div> </div> </div> </div> </div> </div> @stop
