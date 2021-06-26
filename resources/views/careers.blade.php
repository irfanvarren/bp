@extends('layouts.bp_wo_sidenav')
@section('title', 'Careers')
@section('content')
<div class="col-md-12 content-wrapper" style="background-image:url('{{asset('/img/career/gradient1.png')}}');background-repeat: no-repeat;background-size: cover;padding:85px 20px">
  <div class="row">
  <div class="col-md-6 careers-img" style="background-image:url('{{asset('/img/career.png')}}')">
  </div>
  <div class="col-md-6 careers-desc" >
    <div >

    <h2 style="color: white"><strong>Join Us</strong></h2>
    <p style="color: white">Bagi kamu yang tertarik menjadi seorang tenaga pendidik yang memiliki karir cemerlang bergabunglah dengan Best Partner Education. Mengajar di Best Partner Education, kami pastikan anda memiliki jenjang karir yang membawa anda kepada masa depan yang lebih baik.

Sebelum itu, daftarkan dulu diri anda dan ikuti seleksi kami terlebih dahulu di link di bawah ini. <br>

     </p>
     <p>
    <a href="{{ url('/careers/application') }}">  <button type="button" name="button">Apply Now</button></a> 
    </p>
  <a href="{{ url('form/internship-and-job-vacancy') }}">  <button type="button" name="button">Internships</button></a>
         </div>
  </div>
</div>
</div>
@stop
