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
    <div class="col-md-7 ">

      <div class="tutor_photo_wrapper">
        <img src="{{asset('img/avatar.png')}}" class="tutor_photo" alt="">
      </div>
      <div class="tutor_name_wrapper">
        <h2>Cristine Devi Claudia</h2>
        <h5 > <strong> IELTS Tutor </strong></h5>
      </div>

    </div>
    <div class="col-md-5">
      <div class="tutor-contact-wrapper">

        <div class="col-md-12 tutor-contact-list">
          <!--<i class="fa fa-birthday-cake icon"></i>
          <div class="text"> 11 Juli 1993 </div>
          <div class="icon">
             Tanggal Lahir :
          </div>-->
          Tanggal Lahir : 28 Desember 1998
        </div>
        <div class="col-md-12 tutor-contact-list">
        Tempat : Pontianak, Kalimantan Barat
        </div>
        <div class="tutor-contact-list col-md-12">
          Agama: Islam
        </div>
        <div class="tutor-contact-list col-md-12">Kewarganegaraan: Indonesia</div>
        <div class="tutor-contact-list col-md-12">Email: tutor4@bestpartnereducation.com</div>
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
          <div class="col-md-3">
            Gelar Diploma / Sarjana <span class="colon">:</span>
          </div>
          <div class="col-md-9">
            UNIVERSITAS TANJUNGPURA
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
            Tahun Masuk <span class="colon">:</span>
          </div>
          <div class="col-md-9">
          2015
          </div>


        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
  Gelar / Jurusan <span class="colon">:</span>
          </div>
          <div class="col-md-9">

          </div>


        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
  Status Lulus <span class="colon">:</span>
          </div>
          <div class="col-md-9">
            ongoing
          </div>


        </div>
      </div>
      <div>
        <div class="tutor-desc row">
          <div class="col-md-3">
            Gelar Associate <span class="colon">:</span>
          </div>
          <div class="col-md-9">
          Universitas Chatham Pittsburgh
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
            Tahun Masuk <span class="colon">:</span>
          </div>
          <div class="col-md-9">
          2017
          </div>


        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
  Gelar / Jurusan <span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Chatham University -
  Certificate of Completion <br>
  (Exchange Student
  Alumni)
          </div>


        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
  Status Lulus <span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Iya
          </div>


        </div>
      </div>
      <h3>Pengalaman Mengajar</h3>
      <div>
        <div class="tutor-desc row">
          <div class="col-md-3">
            Posisi Terbaru <span class="colon">:</span>
          </div>
          <div class="col-md-9">
        Tutor Private TOEFL

          </div>
        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
            Posisi Terbaru Kedua <span class="colon">:</span>
          </div>
          <div class="col-md-9">
      Tutor Private anak-anak
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
            Posisi Terbaru Ketiga <span class="colon">:</span>
          </div>
          <div class="col-md-9">
        Tutor Private BIPA (Bahasa Indonesia untuk Penutur Asing)
          </div>

        </div>


        </div>
        <h3>Pengalaman Lainnya</h3>


        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 1<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Peneliti Survey <br>
Universitas Gajahmada (Pusat Penelitian), Jogjakarta (Indonesia) <br>
Peneliti survey oleh Riset “Minyak Sawit” berkolaborasi <br>
Fakultas Ekonomi dan Bisnis Gajah Mada <br>
Universitas, dan Fakultas Ilmu Sosial dan Politik <br>
Universitas Sains Tanjungpura di Sintang, 2018
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 2<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Marketing Komunikasi di Gencil (Government and smart city landmark) 2018
          </div>

        </div>
        <h3>Konferensi Dan Seminar</h3>


        <div class="tutor-desc row">
          <div class="col-md-3">
          konferensi & <br> seminar 1<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Pembawa acara yang diundang oleh Konferensi Internasional <br>
  Universitas ZAMAN, Phnom Penh, Kamboja 2017.
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          konferensi & <br> Seminar 2<span class="colon">:</span>
          </div>
          <div class="col-md-9">
          Peserta Indonesia Model United Nation di Universitas Indonesia 2016
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          konferensi & <br> Seminar 3<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Tamu undangan kehormatan dengan Kementerian Pemuda dan <br>
    Olahraga Indonesia, 2019 <br>
    Tamu undangan kehormatan dengan Kementerian Jender dan <br>
    Keluarga Korea Selatan, 2019
          </div>

        </div>
        <h3>Pelatihan dan Lokakarya</h3>


        <div class="tutor-desc row">
          <div class="col-md-3">
            Pelatihan dan lokakarya 1<span class="colon">:</span>
          </div>
          <div class="col-md-9">
          Workshop Pembelajaran Global di Washington DC, USA 2017
          </div>

        </div>

        <h3>Pengalaman Organisasi</h3>


        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 1<span class="colon">:</span>
          </div>
          <div class="col-md-9">
        Kepala Mobilitas Internasional dalam JOINT UNTAN 2018/2019
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 2<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Penerima beasiswa Program Pertukaran Sarjana Global (Global  <br>
  UGRAD Program) <br>
  disponsori oleh Departemen Urusan Pendidikan dan Kebudayaan AS <br>
  Departemen 2017
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 3<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Anggota dari Philosophy Club di Chatham University, Pittsburgh, <br>
  Pennsylvania, USA Fall Semester <br>
  2017
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 4<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Anggota International Student Club di Chatham University, Pittsburgh,  <br>
Pennsylvania, USA Fall <br>
Semester 2017
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 5<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Pendiri bersama organisasi nirlaba yang memfokuskan lingkungan  <br>
  dan kreatif ekonomi untuk perempuan di Indonesia <br>
  rural area #PIPETKITE (Jerami Kami) Harta Karun #PIPETKITE <br>
  2017/2018
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 6<span class="colon">:</span>
          </div>
          <div class="col-md-9">
        Salah satu pendiri UNTAN Model United Nations Club
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 7<span class="colon">:</span>
          </div>
          <div class="col-md-9">
        Sekretaris Jenderal Untan Model United Nations Club 2016/2017
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 8<span class="colon">:</span>
          </div>
          <div class="col-md-9">
        Relawan di Perpustakaan Prancis Universitas Tanjungpura 2017/2018 <br>
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 9<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Pengahargaan (Jaringan Internasional) Universitas Tanjungpura <br>

      2016/2017
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 10<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Anggota di KOMAHI (Korps Mahasiswa Hubungan Internasional) <br>
    2015/2016
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 11<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Anggota dari Khatulistiwa English Community (Key) 2016/2017
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 12<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Anggota Rohis FKMI Nuruddin FISIP Tanjungpura University <br>
2015/2016
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Pengalaman 13<span class="colon">:</span>
          </div>
          <div class="col-md-9">
          Sukarelawan di Lembaga Pendidikan Al-Qadrie Center since 2015
          </div>

        </div>

        <h3>Prestasi</h3>


        <div class="tutor-desc row">
          <div class="col-md-3">
          Prestasi 1<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Delegasi Program Pertukaran Pemuda Indonesia-Korea (IKYEP) 2019
            </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Prestasi 2<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Peserta yang dipilih dari Ekspendisi Nusantara Jaya (ENJ) disponsori <br>
  oleh Kementerian Kelautan 2019
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Prestasi 3<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Penerima beasiswa Program Pertukaran Sarjana Global (Global <br>
      UGRAD Program) yang disponsori oleh Departemen Luar Negeri AS, <br>
      Biro Urusan Pendidikan dan Kebudayaan 2017
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Prestasi 4<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Duta Besar Indonesia untuk acara “THE YEAR OF INDONESIA” di <br>

  Chatham University, Pittsburgh, Pennsylvania, AS
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Prestasi 5<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Peserta Kejuaraan Debat Bahasa Inggris Universitas Nasional (NUDC) <br>

  Universitas Mercu Buana, Jakarta Barat 2016
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Prestasi 6<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Juara II Kejuaraan Debat Bahasa Inggris Universitas Nasional (NUDC) <br>

  Banjarmasin 2016
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Prestasi 7<span class="colon">:</span>
          </div>
          <div class="col-md-9">
            Pembicara Terbaik Pertama Kejuaraan Debat Bahasa Inggris UNTAN <br>

  2016
          </div>

        </div>
        <div class="tutor-desc row">
          <div class="col-md-3">
          Prestasi 8<span class="colon">:</span>
          </div>
          <div class="col-md-9">
        Peserta dari Gajahmada pertandingan debat (GMDT) 2016
          </div>

        </div>


        </div>
      </div>
    </div>

@endsection
