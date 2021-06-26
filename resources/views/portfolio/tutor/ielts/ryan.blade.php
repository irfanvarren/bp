@extends('layouts.portfolio')
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
    <div class="col-md-7 col-sm-3">

      <div class="tutor_photo_wrapper">
        <img src="{{asset('img/avatar.png')}}" class="tutor_photo" alt="">
      </div>
      <div class="tutor_name_wrapper">
        <h2>Ryan Cipta Julianda</h2>
        <h5 > <strong> IELTS Tutor </strong></h5>
      </div>

    </div>
    <div class="col-md-5 col-sm-9">
      <div class="row tutor-contact-wrapper">

        <div class="col-md-12 tutor-contact-list">
          <!--<i class="fa fa-birthday-cake icon"></i>
          <div class="text"> 11 Juli 1993 </div>
          <div class="icon">
             Tanggal Lahir :
          </div>-->
          Tanggal Lahir : 11 Juli 1993
        </div>
        <div class="col-md-12 tutor-contact-list">
        Tempat : Pontianak, Kalimantan Barat
        </div>
        <div class="tutor-contact-list col-md-12">
          Agama: Islam
        </div>
        <div class="tutor-contact-list col-md-12">Kewarganegaraan: Indonesia</div>
        <div class="tutor-contact-list col-md-12">Email: tutor1@bestpartnereducation.com</div>
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
          2011
          </div>


        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
  Gelar / Jurusan <span class="colon">:</span>
          </div>
          <div class="col-md-10">
            Sarjana Pendidikan (S.Pd.)/ <br>
            Program pendidikan <br>
            Bahasa Inggris
          </div>


        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
  Status Lulus <span class="colon">:</span>
          </div>
          <div class="col-md-10">
            Iya
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
          <strong>  IKIP-PGRI Pontianak (15 Juli 2019 – Sekarang) </strong> <br>
<strong>Jabatan:</strong> Asisten Dosen (Elly Susanti, SS., MA.) <br>
  <strong>Deskripsi Pekerjaan :</strong> Membantu dosen dalam proses belajar dan <br>
  mengajar mahasiswa prodi Bahasa Inggris IKIP-PGRI Pontianak.

          </div>
        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
            Posisi Terbaru Kedua <span class="colon">:</span>
          </div>
          <div class="col-md-10">
          <strong>  CV. Best Partner/ Best Partner Education (2 Juni 2018 – Sekarang)</strong> <br>
          <strong>Jabatan:</strong> English Tutor dan Academic Division <br>
          <strong>Deskripsi Pekerjaan :</strong> Instruktur program persiapan IELTS, mengawasi <br>
          proses berjalannya tes IELTS serta dipercaya untuk mengurus hal-hal <br>
          akademik di Best Partner Education.
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
            Posisi Terbaru Ketiga <span class="colon">:</span>
          </div>
          <div class="col-md-10">
          <strong> SMP Negeri 3 Sungai Raya Kepulauan (18 Juli 2017 – 30 Januari 2018)</strong> <br>

  <strong>Jabatan:</strong>  Instruktur ekstrakulikuler Pencak Silat <br>
  <strong>Deskripsi Pekerjaan :</strong> Melatih dan mempersiapkan atlit remaja pencak <br>
  silat khususnya untuk kompetisi laga.
          </div>

        </div>

        <div class="tutor-desc row">
          <div class="col-md-2">
          Posisi Terbaru keempat <span class="colon">:</span>
          </div>
          <div class="col-md-10">
            <strong>SD Pemersatu Singkawang (18 Juli 2016 – 16 Desember 2017)</strong> <br>
  <strong>Jabatan:</strong> Guru Kelas and salah satu pendiri <br>
  <strong>Deskripsi Pekerjaan :</strong> Membantu mendirikan sekolah dan juga dipercaya <br>
  untuk menjadi guru kelas yang pertama untuk kelas 2 dan kelas 3
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
          Posisi Terbaru kelima <span class="colon">:</span>
          </div>
          <div class="col-md-10">
          <strong>  SETC – Kampung Inggris Singkawang (16 Desember 2015- 31 May 2018)</strong> <br>
          <strong>Jabatan :</strong>  Instruktur Bahasa Inggris dan IELTS Trainer <br>
          <strong>Deskripsi Pekerjaan :</strong> Mengajar bahasa Inggris umum untuk kelas anak- <br>
  anak, remaja dan dewasa serta dipercaya sebagai pembimbing latihan dan
  simulasi IELTS.
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
          Posisi Terbaru keenam <span class="colon">:</span>
          </div>
          <div class="col-md-10">
          <strong>  SMK Muhammadiyah 1 Pontianak (27 Juli 2015- 18 Juli 2016)</strong> <br>
          <strong> Jabatan:</strong> Guru Mata Pelajaran Bahasa Inggris untuk kelas 11 jurusan <br>
    Akuntansi dan Administrasi Perkantoran serta Instruktur Ekstrakulikuler <br>
    Pencak Silat <br>
    <strong>  Deskripsi Pekerjaan :</strong> Mengajar Bahasa Inggris khusus bidang akuntansi <br>
    dan administrasi perhotelan serta melatih dan mempersiapkan atlit untuk <br>
    pertandingan pencak silat tingkat kota.
          </div>

        </div>
        <h3>Konferensi Dan Seminar</h3>


        <div class="tutor-desc row">
          <div class="col-md-2">
          Konferensi & seminar 1<span class="colon">:</span>
          </div>
          <div class="col-md-10">
            16 Marer 2018. Peserta seminar internasional yang diselenggarakan oleh <br>
  Universitas Malaysia Sarawak dan Pemerintah Kota Singkawang <br> <br>
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
          Konferensi & Seminar 2<span class="colon">:</span>
          </div>
          <div class="col-md-10">
            7 Maret 2018, Peserta Seminar “Pentingnya Kualitas Pendidik Bagi <br>
      Kemajuan LKP Era Kompetensi” di kampung Inggris SETC Kota <br>
      Singkawang Provinsi Kalimantan Barat. <br>
          </div>

        </div>
        <h3>Pelatihan dan Lokakarya</h3>


        <div class="tutor-desc row">
          <div class="col-md-2">
            Pelatihan danlokakarya 1<span class="colon">:</span>
          </div>
          <div class="col-md-10">
            19 August – 14 September 2019, Telah mengikuti pelatihan intensif <br>
  selama 4 minggu untuk mendapatkan sertifikasi Trinity College London’s <br>
  CertTESOL (Certification in Teaching English to Speaker of Other <br>
  Language) di IALF Bali.
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
            Pelatihan dan lokakarya 2<span class="colon">:</span>
          </div>
          <div class="col-md-10">
            12-13 November 2018, Mengikuti kegiatan pelatihan untuk menjadi <br>
  asesor dari tes kompetensi kemampuan Bahasa Inggris nasional oleh <br>
  IECTA (Indonesia English Course Teacher Association) dan LSK-BIG <br>
  (Lembaga Sertifikasi Kompetensi Bahasa Inggris).
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
            Pelatihan dan lokakarya 3<span class="colon">:</span>
          </div>
          <div class="col-md-10">
            2017, Pelatihan Kader Perguruan Seni Bela Diri Tapak Suci Indonesia oleh <br>
Pimpinan Wilayah Tapak Suci Kalimantan Barat.
          </div>

        </div>
        <h3>Pengalaman Organisasi</h3>


        <div class="tutor-desc row">
          <div class="col-md-2">
          Pengalaman 1<span class="colon">:</span>
          </div>
          <div class="col-md-10">
            Saat ini menjabat sebagai anggota kepengurusan Pimpinan Wilayah Tapak <br>
    Suci Putera Muhammadiyah (TSPM) Kalimantan Barat masa jabatan 2019- <br>

    2024. Dipilih sebagai coordinator publikasi dan komunikasi. Deskripsi <br>
    pekerjaannya adalah untuk mempublikasikan dan mengkomunikasikan <br>
    kegiatan TSPM Kalimantan Barat di berbagai media.
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
          Pengalaman 2<span class="colon">:</span>
          </div>
          <div class="col-md-10">
            Kemampuan organisasi sejak SMA (OSIS dan cabang Tapak Suci di SMA <br>
    Muhammadiyah 1 Pontianak dari tahun 2008-2009) dan kuliah <br>
    (himpunan mahasiswa bahasa Inggris “SESCO” sebagai kepala divisi <br>
    advokasi dari tahun 2013-2014).
          </div>

        </div>
        <h3>Prestasi</h3>


        <div class="tutor-desc row">
          <div class="col-md-2">
          Prestasi 1<span class="colon">:</span>
          </div>
          <div class="col-md-10">
            Meraih beasiswa dari Best Partner Education untuk mengikuti pelatihan <br>
  intensif Trinity CertTESOL (Teaching English to Speakers of Other <br>
  Language) di IALF (Indonesia Australia Language Foundation) Bali dari <br>
  tanggal 19 Agustus – 14 September 2019. <br>
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
          Prestasi 2<span class="colon">:</span>
          </div>
          <div class="col-md-10">
            Salah satu peserta yang meraih posisi top 5 pada PTE-A Mock Test <br>
Competition yang di adakan di Universitas Tanjungpura Kalimantan Barat <br>
pada tanggal 20 Juli 2019 <br>
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-2">
          Prestasi 3<span class="colon">:</span>
          </div>
          <div class="col-md-10">
            Diberikan penghargaan sebagai mahasiswa lulusan prodi Pendidikan <br>
  Bahasa Inggris yang memiliki IPK tertinggi (3.84) di acara wisuda IKIP- <br>
  PGRI Pontianak pada tanggal 21 Desember 2015. <br>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>
@endsection
