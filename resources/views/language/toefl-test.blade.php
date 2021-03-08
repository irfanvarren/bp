@extends('layouts.bp_wo_sidenav')
@section('title', 'TOEFL ITP Test')
@section('content')
<!--<div class="content-header col-md-12" style="background-image:url('/img/about.jpg');">
	<h1>About Us</h1>
</div>-->
<div class="col-md-12 content-header product-ielts" >
    <div class="row">
  <div class="col-md-6">
    <div class="content-title" style="font-size:16px;margin-top:30px;">
      <h2>Apa itu TOEFL ITP ?</h2>
      <p>Test of English as a Foreign Languange – Institutional Test in Purposes (TOEFL ITP)  merupakan tes yang mengukur kemampuan seseorang yang tidak menggunakan bahasa Inggris sebagai bahasa nasional atau bahasa kesehariannya. TOEFL tes dilakukan oleh mereka yang berencana akan belajar ke luar negeri terutama yang proses belajar-mengajarnya menggunakan bahasa Inggris, orang-orang yang akan menjadi pegawai suatu instansi pemerintah (CPNS/PNS), para calon penerima beasiswa dan para mahasiswa yang akan menjalani proses kelulusan (calon sarjana). </p>
    </div>
  </div>
  <div class="col-md-6 test-header" style="background-image:url('{{asset('img/toefl test/toefl itp.png')}}');background-size:contain;height:300px;background-position:top 30px center;">

  </div>
  </div>
</div>
<div class="content-wrapper toefl-test col-md-12">
      <h1><strong>Materi</strong></h1>
  <div class="col-md-12 product-skills">
    <div class="row">
    <div class="col-md-4">
      <div class="col-md-12 product-skill">
        <img src="{{asset('img/toefl test/listening comprehension.png')}}" alt="">
        <div class="col-md-12 product-desc">

          <h4>Listening Comprehension</h4>
          <p>peserta tes harus mendengarkan percakapan native speaker dalam rekaman. Kemudian, mereka harus menjawab pertanyaan berdasarkan apa yang mereka dengar dalam rekaman tersebut.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="col-md-12 product-skill">
        <img src="{{asset('img/toefl test/structure and written expression.png')}}" alt="">
        <div class="col-md-12 product-desc">

          <h4>Structure and Written Expression</h4>
          <p>peserta tes harus melengkapi rangkaian kalimat atau mengidentifikasi struktur kalimat yang tidak lengkap atau kurang tepat.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="col-md-12 product-skill">
        <img src="{{asset('img/toefl test/reading comprehension.png')}}" alt="">
        <div class="col-md-12 product-desc">

          <h4>Reading Comprehension</h4>
          <p>para peserta tes harus memahami beberapa bacaan dan memberikan jawaban yang berkaitan dengan bacaan-bacaan tersebut.</p>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="col-md-12 language-content ">
      <div class="row">
    <div class="col-md-6">
      <div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/toefl test/biaya.png')}}');height: 440px;background-size:90%;background-position:top 80px left;">
      </div>
    </div>
    <div class="col-md-6 desc" style="margin-top:45px;">
      <h1> <strong>Biaya Tes TOEFL ITP</strong> </h1>
      <p style="margin-bottom:0;">
        Dengan mengambil tes TOEFL ITP di Best Partner Education, kamu akan mengeluarkan dana sebesar Rp 475.000 untuk satu kali tes.
Skor tes TOEFL ITP
Masa berlaku (validitas) sertifikat nilai tes TOEFL adalah selama dua tahun. Secara umum, tingkatan pencapaian terbagi menjadi 4, yaitu:
  <ol class="col-md-12">
    <li>Tingkat Dasar (Elementary): 310 s.d. 420</li>
<li>Tingkat Menengah Bawah (Low Intermediate): 420 s.d. 480</li>
<li>Tingkat Menengah Atas (High Intermediate): 480 s.d. 520</li>
<li>Tingkat Mahir (Advanced): 525 s.d 677</li>
</ol>
      </p>
      <p>Sistem penilaian TOEFL tersebut menggunakan konversi dari setiap jawaban yang benar. Sebagai tambahan informasi, biasanya untuk bisa diterima di program SI, skor yang umumnya dibutuhkan adalah sekitar 475 s.d. 550, sedangkan untuk masuk program S2 dan S3 persyaratan skor TOEFL-nya lebih tinggi lagi, yaitu sekitar 550 s.d. 600. Adapun jenis lainnya yang masuk dalam kategori International TOEFL ialah TOEFL CBT dan TOEFL iBT.</p>

    </div>
    </div>
  </div>
  <div class="col-md-12 language-content ">
    <div class="row">
    <div class="col-md-6 desc" style="margin-top:45px;">
      <h1> <strong>Apa yang dipersiapkan sebelum tes TOEFL?</strong> </h1>
      <p>
        Best Partner Education menyediakanTOEFL Preparation Class sesuai kebutuhan kamu dengan jadwal yang sangat flexible.
      Untuk mempersiapkan diri lebih matang, kamu sebaiknya sering-sering berlatih dan melakukan simulasi soal-soal TOEFL. Best Partner Education juga menyediakan TOEFL simulation test dengan soal dan suasana yang autontik seperti test resmi.
      Jadi, terus update tanggal tes dan ketersediaan kelas untukmu. Informasi selanjutnya dapat menghubungi ke nomor berikut:

      </p>
      <ul class="dash-list">
    @foreach(config('constants.marketing') as $marketing)
    <li>{{$marketing['no_telepon']}} ({{$marketing['nama']}})</li>
    @endforeach
  </ul>
    </div>
    <div class="col-md-6">
      <div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/toefl test/yang dipersiapkan.png')}}');height: 340px;background-size:contain;background-position:top 15px center;">
      </div>
    </div>
    </div>
  </div>

</div>


@stop
