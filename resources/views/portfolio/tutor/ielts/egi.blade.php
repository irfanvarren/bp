@extends('layouts.portfolio')
@section('style')
  @section('style')
  <style media="screen">

    header{
      padding:15px;
      padding-top:45px;
    }

    .tutor_name_wrapper {
      padding-top: 10px;

      float: left;
    }

    .tutor_photo_wrapper {
      float: left;
      padding-right: 20px;
    }

    .tutor_photo {
      width: 160px;
      margin: 0 auto;
      height: auto;
    }

    .tutor-contact-wrapper {
      padding-right: 15px;
      padding-top: 10px;
    }

    .tutor-contact-wrapper ul {
      list-style-type: none;
      float: right;
    }

    .tutor-contact-list {
      padding-bottom: 7px;
      text-align: right;
    }

    .tutor-contact-list .text {
      padding-left: 15px;
      float: right;
    }

    .tutor-contact-list .icon {
      float: right;
      line-height: 20px;
      /*font-size:40px;*/
    }

    .content-wrapper {
      padding: 30px 60px;
      font-size:18px;
    }

    .colon {
      float: right;
    }

    .tutor-desc {
      padding-bottom: 15px;
    }

  @media screen and (max-width:520px) {
    .tutor_photo{
      width:90px;
    }
    .tutor-contact-list{
      text-align: left;
    }
    .content-wrapper {
      padding: 30px 40px;
    }
  }
    @media screen and (max-width:1180px) {

      div#main {
        margin-top: 0 !important;
      }

      header {
        position: relative;
        top: auto;
        height: auto;
        box-shadow:none;

      }
  </style>
@endsection
@section('portfolio-header')
<div class="col-md-12 portfolio_header">
  <div class="row">
    <div class="col-md-7">

      <div class="tutor_photo_wrapper">
        <img src="{{asset('img/avatar.png')}}" class="tutor_photo" alt="">
      </div>
      <div class="tutor_name_wrapper">
        <h2>Egidius Elian Rama</h2>
        <h5> <strong>IELTS Tutor</strong></h5>
      </div>

    </div>
    <div class="col-md-5">
      <div class="tutor-contact-wrapper">

        <div class="col-md-12 tutor-contact-list">
          <!--<i class="fa fa-birthday-cake icon"></i>-->
          <div class="text"> 19 September 2019 </div>
          <div class="icon">
            Tanggal Lahir :
          </div>
        </div>
        <div class="col-md-12 tutor-contact-list">
        Tempat :  Pontianak, Kalimantan Barat
        </div>
        <div class="tutor-contact-list col-md-12">
          Agama: Katholik
        </div>
        <div class="tutor-contact-list col-md-12">Kewarganegaraan: Indonesia</div>
        <div class="tutor-contact-list col-md-12">Email: tutor3@bestpartnereducation.com</div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="col-md-12 content-wrapper">
  <div class="row">

    <div class="col-md-12 tutor-content-title">
      <h2>Latar Belakang Pendidikan</h2> <br>
      <h3>Gelar Diploma / Sarjana</h3>
      <div>
        <div class="tutor-desc row">
          <div class="col-md-2">
            Gelar Diploma / Sarjana <span class="colon">:</span>
          </div>
          <div class="col-md-10">
            IKIP - PGRI Pontianak
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
            Tahun Masuk <span class="colon">:</span>
          </div>
          <div class="col-md-10">
            2014
          </div>


        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
  Gelar / Jurusan <span class="colon">:</span>
          </div>
          <div class="col-md-10">
Sarjana Pendidikan (S.Pd) / Program pendidikan Bahasa Inggris
          </div>


        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
  Status Lulus <span class="colon">:</span>
          </div>
          <div class="col-md-10">
            ongoing
          </div>


        </div>
      </div>
      <h3>Pengalaman Mengajar</h3>
      <div>
        <div class="tutor-desc row">
          <div class="col-md-2">
            Posisi Terbaru <span class="colon">:</span>
          </div>
          <div class="col-md-10">
            CV. Best Partner Education, May 2019 - sekarang <br> Tutor General English dan tutor Persiapan IELTS <br>

          </div>
        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
            Posisi Terbaru Kedua <span class="colon">:</span>
          </div>
          <div class="col-md-10">
            ELI Training Center, 2017 - April 2019 <br>
            Tutor Bahasa inggris untuk kelas remaja <br>
            learners & adults
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
            Posisi Terbaru Ketiga <span class="colon">:</span>
          </div>
          <div class="col-md-10">
            BCLC Tanjungpura University, 2017
          </div>

        </div>

        <div class="tutor-desc row">
          <div class="col-md-2">
          Posisi Terbaru keempat <span class="colon">:</span>
          </div>
          <div class="col-md-10">
            Bimbel Gajah Mada, 2015 –2017 <br>
English Tutor untuk kelas remaja <br>
Dan SMA <br>
          </div>

        </div>
        <h3>Pengalaman Organisasi</h3>


        <div class="tutor-desc row">
          <div class="col-md-2">
          Pengalaman 1<span class="colon">:</span>
          </div>
          <div class="col-md-10">
          Divisi Advokat di SESCo IKIP PGRI Pontianak from 2015-2016
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
          Pengalaman 2<span class="colon">:</span>
          </div>
          <div class="col-md-10">
        Sekertaris di SESCo IKIP PGRI Pontianak from 2016-2017
          </div>

        </div>
        <h3>Prestasi</h3>


        <div class="tutor-desc row">
          <div class="col-md-2">
          Prestasi 1<span class="colon">:</span>
          </div>
          <div class="col-md-10">
            English Debating Week IKIP PGRI <br>
    Pontianak, 2015 <br>
    1st Winner of Best Team
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
          Prestasi 2<span class="colon">:</span>
          </div>
          <div class="col-md-10">
            Poetry Competition PON TV, 2013 <br>
      1st Winner of Best Poet
          </div>

        </div>
      </div>
    </div>

  </div>
</div>
@endsection
