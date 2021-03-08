@extends('layouts.bp_wo_sidenav')
<style media="screen">
  .vertical-text{
    position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);text-align:center;
  }
  @media screen and (max-width:770px){
    .vertical-text{
position:relative;
padding:30px;
    }
  }

  .ielts-text{
    text-align:justify !important;padding:50px;
  }

  @media screen and (max-width:960px){
    .ielts-text{
padding:30px;
    }
  }
</style>
@section('title', 'IELTS Test')
@section('content')
<!--<div class="content-header col-md-12" style="background-image:url('/img/about.jpg');">
	<h1>About Us</h1>
</div>-->
<div class="col-md-12 content-header product-ielts" >
    <div class="row"> 
  <div class="col-md-6 test-desc">
 

    <div class="ielts-text">
        <h2 style="text-align:center;margin:15px 0;">Apa itu IELTS ?</h2>
      <p>International English Language Testing System (IELTS) adalah sistem tes Bahasa Inggris internasional yang terpopuler di dunia untuk keperluan studi, bekerja dan imigrasi. Tes IELTS menilai empat aspek bahasa yaitu listening, reading, writing dan speaking dalam konteks penggunaan bahasa Inggris dalam kehidupan sehari-hari.<!--  IELTS kini telah tersedia dalam dua jenis tes yaitu Paper-based dan Computer-delivered (CD-IELTS).-->Untuk Informasi Lebih Lanjut dapat mengakses file booklet. </p>
      <a style="margin:0 auto;" class="btn btn-primary" href="{{asset('doc/ielts-information-for-candidates-english-uk.pdf')}}">Download</a>
    </div>
  </div>
  <div class="col-md-6 test-header" style="background-image:url('{{asset('img/ielts test/ieltss.png')}}');background-size:contain;height:300px;background-position:top 30px center;">

  </div>
</div>
</div>

<div class="content-wrapper ielts-test col-md-12">

  <div class="col-md-12 ialf-certificate">
<div class="row">

    <div class="col-md-6" style="background-image:url('{{asset('img/CERTIFICATE IALF.jpg')}}');background-size:contain;height:450px;background-repeat:no-repeat;background-position:center;">
   </div>
    <div class="col-md-6">
      <div class="vertical-text">
        <h2>IELTS Test Center</h2>
        <p>Best Partner merupakan salah satu IELTS Test Center yang sudah tersertifikasi oleh IALF</p>
      </div>
    </div>

    </div>
  </div>

  <div class="col-md-12 product-skills">
    <h2 style="text-align:center;"><strong>Skills</strong></h2>
    <div class="row"> 
    <div class="col-sm-6 col-md-3">
      <div class="col-md-12 product-skill">
        <img src="{{asset('img/ielts test/1.png')}}" alt="">
        <h3><strong>Listening</strong> </h3>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="col-md-12 product-skill">
        <img src="{{asset('img/ielts test/2.png')}}" alt="">
            <h3><strong>Reading</strong> </h3>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="col-md-12 product-skill">
        <img src="{{asset('img/ielts test/4.png')}}" alt="">
            <h3><strong>Writing</strong> </h3>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="col-md-12 product-skill">
        <img src="{{asset('img/ielts test/3.png')}}" alt="">
            <h3><strong>Speaking</strong> </h3>
      </div>
    </div>
    </div>
  </div>
  <div class="col-md-12 ielts-type-wrapper">
      <div class="row">
    <div class="col-md-6">
      <div class="col-md-12 ielts-type">
        <div class="ielts-type-img" style="background-image:url('{{asset('img/ielts test/forman ielts academicc.png')}}');">

        </div>
        <div class="col-md-12 desc">
        <h2>IELTS Academic</h2>
        <p>
 IELTS Academic diperuntukkan bagi seseorang yang ingin kuliah di tingkat bachelor, master maupun doctoral yang proses pembelajarannya menggunakan bahasa Inggris.IELTS Academic juga bersifat universal, dimana bisa diaplikasikan untuk mendaftar pekerjaan maupun imigrasi. </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="col-md-12 ielts-type">
        <div class="ielts-type-img" style="background-image:url('{{asset('/img/ielts test/format ielts general.png')}}');">

        </div>
        <div class="col-md-12 desc">
        <h2>IELTS General Training</h2>
        <p>
IELTS General Training diperuntukkan bagi seseorang yang ingin bekerja, bermigrasi, atau mengikuti pelatihan non-gelar di negara yang menggunakan bahasa Inggris sebagai alat komunikasi. </p>
        </div>
      </div>
    </div>
    </div>
  </div>
  <div class="col-md-12 language-content ">
      <div class="row">
    <div class="col-md-6">
      <div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/ielts test/persiapan sebelum tes.png')}}');height: 360px;background-size:contain;background-position:top 15px center;">
      </div>
    </div>
    <div class="col-md-6 desc" style="margin-top:45px;">
      <h1> <strong>Apa yang dipersiapkan sebelum tes IELTS?</strong> </h1>
      <p style="margin-bottom:0;">
        Best Partner Education menyedia kan IELTS Preparation Class sesuai kebutuhan kamu dengan jadwal yang sangat flexible.
  Untuk mempersiapkan diri lebih matang, kamu sebaiknya sering-sering berlatih dan melakukan simulasi soal-soal IELTS. Best Partner Education juga menyediakan IELTS Mock test dengan soal dan suasana yang autontik seperti test resmi.
  Jadi, terus update tanggal tes dan ketersediaan kelas untukmu. Informasi selanjutnya dapat menghubungi ke nomor berikut :
  <ul class="dash-list">
    @foreach(config('constants.marketing') as $marketing)
    <li>{{$marketing['no_telepon']}} ({{$marketing['nama']}})</li>
    @endforeach
  </ul>
      </p>

    </div>
    </div>
  </div>
  <div class="col-md-12 language-content ">
    <div class="row">
    <div class="col-md-6 desc" style="margin-top:45px;">
      <h1> <strong>Pelaksanaan Tes IELTS</strong> </h1>
      <p>
    Dengan mengikuti tes IELTS resmi di Best Partner yang bekerjasama dengan IALF, kamu akan mengerjakan keempat modul aspek bahasa dalam satu hari. 3 aspek (listening, reading dan writing) akan diujikan di pagi hari, diikuti dengan tes speaking di siang hari. Anda harus tiba di lokasi 15 menit sebelum tes dimulai, lalu menunjukkan kartu identitas Anda kepada petugas. Kartu identitas yang Anda bawa harus sama dengan identitas yang Anda gunakan saat mengisi formulir aplikasi. Anda perlu membawa peralatan menulis (pensil, bolpoin, peraut pensil, dan penghapus). Saat memasuki ruang tes, Anda tidak diizinkan membawa tas, buku, atau peralatan elektronik apa punDi ruang tes, sudah ada tempat duduk yang ditentukan untuk Anda.
      </p>
    </div>
    <div class="col-md-6">
      <div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/ielts test/pelaksaan test ielts.png')}}');height: 340px;background-size:contain;background-position:top 15px center;">
      </div>
    </div>
    </div>
  </div>
  <div class="col-md-12 language-content ielts-result">

    <div class="col-md-12 ielts-result-desc">
   <h1>  <strong> Hasil Test IELTS</strong></h1>
      <p>Untuk hasil CD-IELTS akan terserdia 5-7 hari setelah tanggal tes. Sedangkan, hasil Paper-based IELTS dapat diterima 13-14 hari setelah tes dilaksanakan.   </p>
    </div>
    <div class="col-md-12 band-score-wrapper">
<div class="row">
       <div class="band-score" style="background-color:#bbdefb;color:black;">
        <h4>Band 1 (Non User)</h4>
        <p>Tidak memiliki kemampuan menggunakan bahasa Inggris. Hanya bisa menggunakan beberapa kata secara acak.</p>

      </div>
      <div class="band-score" style="background-color:#90caf9;color:black;">
        <h4>Band 2 (Intermittent User)</h4>
        <p>Sangat kesulitan memahami bahasa Inggris lisan dan tertulis. Mustahil membangun komunikasi kecuali untuk informasi yang sangat mendasar atau memenuhi kebutuhan yang bersifat urgen.</p>

      </div>
      <div class="band-score" style="background-color:#64b5f6;color:black;">
        <h4>Band 3 (Extremely Limited User)</h4>
        <p>Hanya bisa memahami dan menyampaikan makna umum dalam situasi yang sangat familier. Sering mengalami kegagalan komunikasi.</p>

      </div>
      <div class="band-score" style="background-color:#42a5f5;color:black;">
        <h4>Band 4 (Limited User)</h4>
        <p>Memiliki Kompetensi yang mendasar tapi hanya terbatas pada situasi-situasi yang familier. Sering mengalami masalah dalam memahami dan mengekspresikan informasi atau ide. Tidak mampu menggunakan bahasa yang kompleks.</p>

      </div>
      <div class="band-score" style="background-color:#2196f3;color:#efefef">
          <h4>Band 5 (Modest User)</h4>
          <p>Telah menguasai sebagian kemampuan bahasa Inggris. Memahami makna yang bersifat umum dalam banyak situasi meski cenderung sering membuat kesalahan.

</p>
      </div>
      <div class="band-score" style="background-color:#1e88e5;color:white;">
        <h4>Band 6 (Competent User)</h4>
        <p>Secara umum telah efektif menguasai kemampuan bahasa Inggris meskipun sering terjadi ketidaksesuaian, ketidak tepatan, dan ketidakpahaman. Bisa memahami dan menggunakan bahasa yang kompleks secara memadai, terutama dalam situasi-situasi yang familier.</p>

      </div>
      <div class="band-score" style="background-color:#1976d2;color:white;">
        <h4>Band 7  (Good User)</h4>
        <p>Telah menguasai kemampuan berbahasa Inggris, hanya kadang terjadi ketidaksesuaian, ketidaktepatan, dan ketidakpahaman dalam situasi-situasi tertentu. Secara umum telah menguasai bahasa yang kompleks secara baik dan memahami penalaran yang mendetail.</p>

      </div>
      <div class="band-score" style="background-color:#1565c0;color:white;">
        <h4>Band 8 (Very Good User)</h4>
        <p>Telah sepenuhnya menguasai kemampuan berbahasa Inggris, hanya kadang terjadi ketidaksesuaian atau ketidaktepatan. Kadang terjadi ketidak pahaman dalam situasi yang asing. Mampu menguasai argumentasi yang kompleks dan mendetail secara baik.</p>
      </div><div class="band-score" style="background-color:#0d47a1;color:white;">
        <h4>Band 9 (Expert User)</h4>
        <p>Telah sepenuhnya menguasai kemampuan berbahasa Inggris: mampu menggunakannya secara sesuai, tepat, lancar, dan dengan pemahaman yang penuh.</p>
      </div><div class="band-score" style="background-color:#F8FAFE">

      </div>
    </div>
  </div>
  </div>

</div>


@stop
