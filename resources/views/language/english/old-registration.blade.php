@extends('layouts.bp_wo_sidenav')

@push('head-script')

<style type="text/css">
  .portfolio-background{
    height:300px;
    background:url('{{asset('img/registration-background.png')}}');
    background-position: center;
    background-size: cover;
    background-repeat:no-repeat;
  }

  .inline-wrapper{
    white-space: nowrap;position:absolute;top:0;left:0;width: 100%;z-index: 2
  }

  .inline {
    display: inline-block;
    width: 20%;

    background:#f2f2f2;
  
  }
  .inline:hover{
    cursor: pointer;
  }
  .inline.active{
    background:#00B4D8;
      color:white;
  }

  .wrap {
    display: table;
    table-layout: fixed;
    word-wrap: break-word;
    height:  66px;
    width:   100%;
    padding: 10px;
  }
  .wrap p {
    font-size: 1em;
    display:        table-cell;
    vertical-align: middle;
    text-align: center;
  }


  @media screen and (min-width:1366px){
    .portfolio-background{
      height: 350px;
    }
  }
  @media screen and (max-width:860px){
    .portfolio-background{
      height:200px;
    }
  }
  @media screen and (max-width:480px){
    .portfolio-background{
      height:200px;
      background-size: cover;

    }
    .inline{
      width:50% !important;
    }
    .wrap p {
    font-size: 0.9em;
  }
  }
  @media screen and (max-width: 990px){
    .inline{
      display: block;
      width:33.333333%;
      float:left;
    }
    .inline-wrapper{
      display: block;
      position:relative;
    }
  }
  @media screen and (min-width: 990px){
    .inline-wrapper{
      margin-top:-65px;
    }

  }
</style>
@endpush
@section('content')
@if(session()->has('message'))

<div class="alert alert-success" style="text-align:center">
  {!! session()->get('message') !!} <br>

  <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
</div>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-12 portfolio-background">

    </div>

  </div>

  <div class="row justify-content-center">

    <div class="col-md-10">
      <div class="row">
        <div class="col-md-12" style="padding:0;">
       <div class="inline-wrapper">
         <div class="inline active">
          <div class="wrap">
            <p>Office Branch</p>
          </div>
        </div><div class="inline">
          <div class="wrap">
            <p>Personal Information</p>
          </div>
        </div><div class="inline">
          <div class="wrap">
            <p>Occupation & <br>Education</p>
          </div>
        </div><div class="inline">
          <div class="wrap">
            <p>Course Selection & <br> Documents Upload</p>
          </div>
        </div><div class="inline">
          <div class="wrap">
            <p>Guardian Contact</p>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="row">

      <div class="card col-md-12">
        <div class="card-body">

          <form class="" action="{{url('products/language/english/registration')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group row">
              <div class="col-md-12">
                <h3>Form Pendaftaran Les</h3>
                <p>Pastikan anda menginput informasi pribadi anda dibawah ini dengan benar dan valid.
                </p>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <strong>Silahkan memilih Kantor cabang tempat anda ingin mengambil kursus</strong>
              </div>
              <label class="col-form-label col-md-12">Cabang BP</label>
              <div class="col-md-6">
                <select class="form-control" name="cabang" value="" required>
                  <option value="">- Pilih Cabang -</option>
                  @foreach($perusahaan as $data)
                  <option value="{{$data->KD}}">{{ucwords(strtolower($data->NAMA))}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <strong>Informasi Pribadi</strong>
              </div>
              <label for="" class="col-form-label col-md-12"> Nama Peserta </label>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">

                    <input type="text" class="form-control" name="nama_depan" required placeholder="Nama Depan" value="">
                  </div>

                  <div class="col-md-4">
                    <input type="text" class="form-control" name="nama_belakang" placeholder="Nama Belakang" value="">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-8">
                <div class="row">

                  <label for="" class="col-form-label col-md-12">Tempat Lahir</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">

                  <label for="" class="col-form-label col-md-12">Tanggal Lahir</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="tempat_lahir" required placeholder="Tempat Lahir" value="">
                  </div>
                  <div class="col-md-4">
                    <div class="row">

                      <div class="col-md-4">
                        <input type="text" class="form-control" name="tanggal_lahir" pattern="[0-9]{2}" placeholder="dd" value="@if(Session::has('ielts_form')){{session('ielts_form.tanggal_lahir')}}@endif" required>

                      </div>
                      <div class="col-md-4">
                        <select class="form-control" id="bulan_lahir" name="bulan_lahir" required>
                          <option value="">mm</option>
                          <option value="01" {{ session('ielts_form.bulan_lahir')=="01" ? 'selected' : '' }}>01</option>
                          <option value="02" {{ session('ielts_form.bulan_lahir')=="02" ? 'selected' : '' }}>02</option>
                          <option value="03" {{ session('ielts_form.bulan_lahir')=="03" ? 'selected' : '' }}>03</option>
                          <option value="04" {{ session('ielts_form.bulan_lahir')=="04" ? 'selected' : '' }}>04</option>
                          <option value="05" {{ session('ielts_form.bulan_lahir')=="05" ? 'selected' : '' }}>05</option>
                          <option value="06" {{ session('ielts_form.bulan_lahir')=="06" ? 'selected' : '' }}>06</option>
                          <option value="07" {{ session('ielts_form.bulan_lahir')=="07" ? 'selected' : '' }}>07</option>
                          <option value="08" {{ session('ielts_form.bulan_lahir')=="08" ? 'selected' : '' }}>08</option>
                          <option value="09" {{ session('ielts_form.bulan_lahir')=="09" ? 'selected' : '' }}>09</option>
                          <option value="10" {{ session('ielts_form.bulan_lahir')=="10" ? 'selected' : '' }}>10</option>
                          <option value="11" {{ session('ielts_form.bulan_lahir')=="11" ? 'selected' : '' }}>11</option>
                          <option value="12" {{ session('ielts_form.bulan_lahir')=="12" ? 'selected' : '' }}>12</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="tahun_lahir" placeholder="yyyy" pattern="[0-9]{4}" value="@if(Session::has('ielts_form')){{session('ielts_form.tahun_lahir')}}@endif" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-12 col-form-label">Jenis Kelamin</label>
              <div class="col-md-8">
                <select class="form-control" name="jk">
                  <option value="">-Pilih Jenis Kelamin-</option>
                  <option value="Laki - laki">Laki - laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-md-12 col-form-label">Kewarganegaraan</label>
              <div class="col-md-8">
                <input type="text" name="kewarganegaraan" class="form-control" placeholder="Kewarganegaraan" value="">

              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-8">
                <div class="row">
                  <label for="" class="col-form-label col-md-12">No. KTP</label>
                  <div class="col-md-12">
                    <input type="text" name="no_ktp" placeholder="No KTP" pattern="[0-9]{16}" required class="form-control" value="">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">

                  <label for="" class="col-form-label col-md-12">No. Passport</label>
                  <div class="col-md-12">
                    <input type="text" name="no_paspor" placeholder="No Paspor" class='form-control' value="">
                  </div>

                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-8">
                <div class="row">
                  <label for="" class="col-form-label col-md-12">Alamat saat ini</label>
                  <div class="col-md-12">
                    <input type="text" name="alamat" placeholder="Alamat saat ini" required class="form-control" value="">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">

                  <label for="" class="col-form-label col-md-12">Kota / Kabupaten</label>
                  <div class="col-md-12">
                    <input type="text" name="kota" placeholder="Kota Tempat Tinggal" Required class='form-control' value="">
                  </div>

                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-8">
                <div class="row">
                  <label for="" class="col-form-label col-md-12">Alamat Email</label>
                  <div class="col-md-12">
                    <input type="email" name="email" placeholder="Email" required class="form-control" value="">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">

                  <label for="" class="col-form-label col-md-12">Agama</label>
                  <div class="col-md-12">
                    <select class="form-control" id="agama" name="agama" required>
                      <option value="">Agama</option>
                      <option value="Buddha" {{ session('ielts_form.agama')=="Budha" ? 'selected' : '' }}>Budha</option>
                      <option value="Katholik" {{ session('ielts_form.agama')=="Katholik" ? 'selected' : '' }}>Katolik</option>
                      <option value="Kristen" {{ session('ielts_form.agama')=="Kristen" ? 'selected' : '' }}>Kristen</option>
                      <option value="Kong Hu Cu" {{ session('ielts_form.agama')=="Kong Hu Cu" ? 'selected' : '' }}>Kong Hu Cu</option>
                      <option value="Hindu" {{ session('ielts_form.agama')=="Hindu" ? 'selected' : '' }}>Hindu</option>
                      <option value="Islam" {{ session('ielts_form.agama')=="Islam" ? 'selected' : '' }}>Islam</option>
                    </select>
                  </div>

                </div>
              </div>
            </div>
            <div class="form-group row">

              <div class="col-md-8">
                <div class="row">

                  <label for="" class="col-form-label col-md-12">No. HP / WA</label>
                  <div class="col-md-12">
                    <input type="text" name="no_telepon" placeholder="08xxxxxxxxxx" Required class='form-control' value="">
                  </div>

                </div>
              </div>
            </div>

            <div class="form-group row">

              <div class="col-md-12">
                <strong>Informasi Latar Belakang Pendidikan</strong>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label for="" class="col-md-12 col-form-label">Pendidikan Terakhir</label>
                  <div class="col-md-12">
                    <select class="form-control" name="pendidikan_terakhir">
                      <option value="">- Pilih -</option>
                      <option value="S3">S3</option>
                      <option value="S2">S2</option>
                      <option value="S1">S1</option>
                      <option value="Diploma">Diploma</option>
                      <option value="SMA/SMK/Setara">SMA/SMK/Setara</option>
                      <option value="SMP/Setara">SMP/Setara</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label for="" class="col-md-12 col-form-label">Jurusan</label>
                  <div class="col-md-12">
                    <input type="text" name="jurusan"  placeholder="Jurusan" class="form-control" value="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6">
                <div class="row">
                  <label for="" class="col-md-12 col-form-label">Universitas / Sekolah</label>
                  <div class="col-md-12">
                    <input type="text" name="ref_universitas" placeholder="Nama Universitas / Sekolah" class="form-control" value="">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label for="" class="col-md-12 col-form-label">Bahasa yang digunakan dirumah</label>
                  <div class="col-md-12">
                    <input type="text" name="bahasa_sehari_hari" placeholder="Bahasa" class="form-control" value="">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">

              <div class="col-md-12">
                <strong>Informasi Latar Belakang Pekerjaan</strong>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label for="" class="col-md-12 col-form-label">Pekerjaan saat ini</label>
                  <div class="col-md-12">
                    <select class="form-control" name="pekerjaan">
                      <option value="Pelajar">Pelajar</option>
                      <option value="Mahasiswa">Mahasiswa</option>
                      <option value="Karyawan">Karyawan</option>
                      <option value="Pemilik usaha">Pemilik usaha</option>
                      <option value="Wirausaha">Wirausaha</option>
                      <option value="Wiraswasta">Wiraswasta</option>
                      <option value="Pedagang">Pedagang</option>
                      <option value="Buruh lepas">Buruh lepas</option>
                      <option value="Mengurus rumah tangga">Mengurus rumah tangga</option>
                      <option value="Tidak bekerja">Tidak bekerja</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <label for="" class="col-md-12 col-form-label">Bidang Pekerjaan</label>
                  <div class="col-md-12">
                    <select class="form-control" name="bidang_pekerjaan" required>
                      <option value="">- Pilih Bidang Pekerjaan-</option>
                      <option value="Petugas Administrasi">Petugas Administrasi</option>
                      <option value="Pertanian, Perikanan, Perhutanan, Pertambangan">Pertanian, Perikanan, Perhutanan, Pertambangan</option>
                      <option value="Hiburan dan Seni">Hiburan dan Seni</option>
                      <option value="Perbankan & Asuransi">Perbankan & Asuransi</option>
                      <option value="Katering & Rekreasi">Katering & Rekreasi</option>
                      <option value="Industri Konstruksi">Industri Konstruksi</option>
                      <option value="Kerajinan Tangan & Design">Kerajinan Tangan & Design</option>
                      <option value="Pendidikan">Pendidikan</option>
                      <option value="Pelayanan Sosial & Kesehatan">Pelayanan Sosial & Kesehatan</option>
                      <option value="Jasa Pemasangan, Pemeliharaan dan Perbaikan">Jasa Pemasangan, Pemeliharaan dan Perbaikan </option>
                      <option value="Hukum & Jasa Hukum">Hukum & Jasa Hukum</option>
                      <option value="Pabrik & Perakitan">Pabrik & Perakitan</option>
                      <option value="Layanan Personal">Layanan Personal</option>
                      <option value="Perdagangan Eceran">Perdagangan Eceran</option>
                      <option value="Mesin & Ilmu Ilmiah">Mesin & Ilmu Ilmiah</option>
                      <option value="Media & Telekomnuikasi">Media & Telekomnuikasi</option>
                      <option value="Transportasi">Transportasi</option>
                      <option value="Utilitas (gas,listrik,air,dll)">Utilitas (gas,listrik,air,dll)</option>
                      <option value="Perdagangan Grosir">Perdagangan Grosir</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <strong>Pemilihan Kursus yang anda minati</strong>
              </div>
              <div class="col-md-8">
                <div class="row">
                  <label for="" class="col-form-label col-md-12">Course</label>
                  <div class="col-md-12">
                    <input type="hidden" name="jenis_les" id="jenis-les" value="">

                    <select class="form-control" id="course" name="id_course">
                      <option value="">- Pilih Course -</option>

                      @foreach($paket_bimbel as $data_paket_bimbel)
                      <option value="{{$data_paket_bimbel->KD}}">{{ucwords(strtolower($data_paket_bimbel->NAMA))}}</option>
                      @endforeach
                       <!-- <option value="P/09/IC.OT.ST" data="online">IELTS Class - Online</option>
                        <option value="P/09/IC.OT.ST" data="online-listening">IELTS Class - Online - Listening</option>
                        <option value="P/09/IC.OT.ST" data="online-reading">IELTS Class - Online - Reading</option>
                        <option value="P/09/IC.OT.ST" data="online-writing">IELTS Class - Online - Writing</option>
                        <option value="P/09/IC.OT.ST" data="online-speaking">IELTS Class - Online - Speaking</option>-->
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 ielts-module-wrapper" style="display:none;">
                  <div class="row">


                    <label for="" class="col-form-label col-md-12">Module</label>
                    <div class="col-md-12">
                      <select name="ielts_module" id="ielts_module" class="form-control" value="">
                        <option value="">- Pilih -</option>
                        <option value="AC">Academic</option>
                        <option value="GT">General Training</option>
                      </select>
                    </div>

                  </div>
                </div>

              </div>
              <div class="form-group row ielts-module-wrapper" style="display:none;">
                <div class="col-md-8">
                  <div class="row">
                    <label for="" class="col-form-label col-md-12">Course Type</label>
                    <div class="col-md-12">
                      <select class="form-control" id="course_type"  name="course_type">
                        <option value="">- Pilih Jenis Les -</option>
                        <option value="online"> Online </option>
                        <option value="offline"> Offline </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">

                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-md-8">
                  <div class="row">
                    <label for="" class="col-form-label col-md-12">Level</label>
                    <div class="col-md-12">
                      <select class="form-control" id="level"  name="id_level" required>
                        <option value="">- Harus Memilih Course -</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">

                    <label for="" class="col-form-label col-md-12">Kelompok Kelas</label>
                    <div class="col-md-12">
                      <select class="form-control" name="id_kelompok_kelas" required>
                        <option value="">- Pilih Kelompok Kelas -</option>
                        @foreach($kategori as $data_kategori)
                        <option value="{{$data_kategori->KD}}">{{ucwords(strtolower($data_kategori->NAMA))}}</option>
                        @endforeach
                      </select>
                    </div>

                  </div>
                </div>

              </div>
              <!--  <div class="form-group row">
                <div class="col-md-8">
                  <div class="row">
                    <label for="" class="col-form-label col-md-12">Module (Khusus yang memilih IELTS Prep.Class)</label>
                    <div class="col-md-12">
                      <select class="form-control" name="module">
                        <option value="">- Pilih Module -</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="form-group row">
                <label for="" class="col-form-label col-md-8">Tujuan Pelatihan</label>
                <label for="" class="col-form-label col-md-4">Durasi Kelas</label>
                <div class="col-md-8">
                  <div class="row">

                    <div class="col-md-12">
                      <select class="form-control" id="tujuan" name="tujuan_pelatihan" required>
                        <option value="">- Pilih Tujuan -</option>
                        <option value="Sekolah Keluar negeri">Sekolah Keluar negeri </option>
                        <option value="Beasiswa">Beasiswa</option>
                        <option value="Mendaftar WHV">Mendaftar WHV</option>
                        <option value="Mendaftar pekerjaan">Mendaftar pekerjaan </option>
                        <option value="Mendaftar kenaikan pangkat">Administrasi kenaikan jabatan </option>
                        <option value="Bekerja">Bekerja </option>
                        <option value="Mengukur kemampuan pribadi ">Mengukur kemampuan pribadi  </option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">


                    <div class="col-md-12">
                      <select class="form-control" id="duration" name="durasi_kelas" required>
                        <option value="">- Harus Memilih Level -</option>
                      </select>
                    </div>

                  </div>
                </div>

              </div>
              <div class="form-group row">
                <div class="col-md-4">
                  <input type="hidden" class="form-control" placeholder="Tujuan Lainnya" id="tujuan_lainnya" name="tujuan_lainnya" value="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <strong>Informasi kontak wali</strong>
                </div>
                <label for="" class="col-md-12 col-form-label">Nama</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="nama_wali" placeholder="Nama Wali" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">Hubungan</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="hubungan" placeholder="Keluarga/Kerabat, Orang Tuan, Kenalan, dll.." value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">No. HP</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="no_hp_wali" placeholder="No. HP" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">Email</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="email_wali" placeholder="Email" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">Alamat</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="alamat_wali" placeholder="Alamat" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">Upload KTP</label>
                <div class="col-md-12">
                  <input type="file" name="ktp" value="" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">Upload KK</label>
                <div class="col-md-12">
                  <input type="file" name="kk" value="" required>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">

                  <p class="form-check-inline">

                    <input type="checkbox" name="agree" id="agree" class="form-check-input" required value=""> <label class="form-check-label" for=""> Setuju dengan <a href="{{url('/products/term-and-condition')}}" target="blank">Syarat & Ketentuan</a>
                    </p>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <input type="submit" id="submit" name="" class="btn btn-primary" disabled value="Submit">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">

    function close_alert() {
      $('.alert').hide();
    }
    document.getElementById('agree').addEventListener('change', function() {
      if (this.checked) {
        document.getElementById('submit').disabled = false;
      } else {
        document.getElementById('submit').disabled = true;
      }
    });
    $("document").ready(function(){
      setTimeout(function(){
       $("div.alert").remove();
    }, 5000 ); // 5 secs

    });
    $('#tujuan').change(function(){
      if($(this).val() == 'Lainnya'){
       $("#tujuan_lainnya").prop('type', "text");
       $("#tujuan_lainnya").prop('required', true);
     }else{
      $("#tujuan_lainnya").prop('type', "hidden");
      $("#tujuan_lainnya").prop('required', false);
    }
    /*  $("#no_ktp").prop('required', true);*/
  });
    $('#course').change(function(){
      if($('option:selected',this).attr('data') == "online"){
        document.getElementById('jenis-les').value = "Online";
      }else if($('option:selected',this).attr('data') == "online-listening"){
        document.getElementById('jenis-les').value = "Online - Listening";
      }else if($('option:selected',this).attr('data') == "online-reading"){
        document.getElementById('jenis-les').value = "Online - Reading";
      }else if($('option:selected',this).attr('data') == "online-writing"){
        document.getElementById('jenis-les').value = "Online - Writing";
      }else if($('option:selected',this).attr('data') == "online-speaking"){
        document.getElementById('jenis-les').value = "Online - Speaking";
      }else{
        document.getElementById('jenis-les').value = "";
      }

      $("#level .select-ajax").remove();

      var course_id = $(this).val();

      if(course_id == "P/09/IC.OT.ST" || course_id == "P/12/IC+2IST" || course_id == "P/12/IC+2IST.R" || course_id == "P/13/IC.2IST.I2"){
        $('.ielts-module-wrapper').show();
      }else{
        $('.ielts-module-wrapper').hide();
        $('#ielts_module').val("");
      }
      var token = $("input[name='_token']").val();
      $.ajax({
       url: "<?php echo route('select-course') ?>",
       method: 'POST',
       data: {course_id:course_id, _token:token},
       success: function(data) {
         $('#duration').val('');
         $('#level').append(data);
       },   error: function()
       {
         //handle errors
         alert('error...');
       }
     });
    });
    $('#level').change(function(){
      $("#duration .select-ajax").remove();
      var arr_level = $(this).val().split('##');
      var level_id = arr_level[0];
      var course_id = arr_level[1];
      var token = $("input[name='_token']").val();
      $.ajax({
       url: "<?php echo route('select-level') ?>",
       method: 'POST',
       data: {level_id:level_id,course_id:course_id, _token:token},
       success: function(data) {
         if($('#jenis-les').val() != ""){   
           $('#duration').html("");
           $('#duration').append("<option value='0##30'>30 Jam</option><option value='0##60'>60 Jam</option>");
         }else{
          $('#duration').html("");
          $('#duration').append(data);
        }
      },   error: function()
      {
         //handle errors
         alert('error...');
       }
     });
    });
  </script>
  @stop
