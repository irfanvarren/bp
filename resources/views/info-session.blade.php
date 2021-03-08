@extends('layouts.bp_wo_sidenav')
@section('content')
<div class="col-md-12 content-wrapper">
  <h3 style="text-align:center">Form Info Session / Expo</h3>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <form class="" action="{{url('info-session/registration')}}" enctype="multipart/form-data" method="post">
<div class="card-body">
  @csrf
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">Nama</label>
                      <input type="text"  class="form-control" name="nama"  required value="">
                  </div>
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">Pendidikan Saat Ini</label>
                    <select class="form-control" name="pendidikan_saat_ini">
                      <option value="">- Pilih Pendidikan -</option>
                      <option value="Sarjana / S1">Sarjana / S1</option>
                      <option value="Diploma / Kejuruan"> Diploma / Kejuruan</option>
                      <option value="SMA / Kelas 12"> SMA / Kelas 12</option>
                      <option value="SMA / Kelas 11">SMA / Kelas 11</option>
                      <option value="SMA / Kelas 10">SMA / Kelas 10</option>
                      <option value="Level O">Level O</option>
                      <option value="Level A">Level A</option>
                      <option value="Doctoral / S3">Doctoral / S3</option>
                      <option value="Foundation">Foundation</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">No HP / WA</label>
                      <input type="text"  class="form-control" name="no_telepon"  required value="">
                  </div>
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">Nama Sekolah / Universitas Terakhir</label>
                      <input type="text"  class="form-control" name="nama_sekolah_terakhir"  required value="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">Alamat Email</label>
                      <input type="email"  class="form-control" name="email"  required value="">
                  </div>
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">Jurusan Yang Diminati</label>
                      <input type="text"  class="form-control" name="minat_jurusan"  required value="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <div class="row">


                    <label for="" class="col-md-12 col-form-group">Tanggal Lahir</label>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="tanggal_lahir" pattern="[0-9]{2}" placeholder="Tanggal (dd)" value="@if(Session::has('ielts_form')){{session('ielts_form.tanggal_lahir')}}@endif" required>
                            </div>
                            <div class="col-md-4">
                              <select class="form-control" id="bulan_lahir" name="bulan_lahir" required>
                                  <option value="">Bulan (mm)</option>
                                  <option value="01" {{ session('ielts_form.bulan_lahir')=="01" ? 'selected' : '' }}>Januari</option>
                                  <option value="02" {{ session('ielts_form.bulan_lahir')=="02" ? 'selected' : '' }}>Februari</option>
                                  <option value="03" {{ session('ielts_form.bulan_lahir')=="03" ? 'selected' : '' }}>Maret</option>
                                  <option value="04" {{ session('ielts_form.bulan_lahir')=="04" ? 'selected' : '' }}>April</option>
                                  <option value="05" {{ session('ielts_form.bulan_lahir')=="05" ? 'selected' : '' }}>Mei</option>
                                  <option value="06" {{ session('ielts_form.bulan_lahir')=="06" ? 'selected' : '' }}>Juni</option>
                                  <option value="07" {{ session('ielts_form.bulan_lahir')=="07" ? 'selected' : '' }}>Juli</option>
                                  <option value="08" {{ session('ielts_form.bulan_lahir')=="08" ? 'selected' : '' }}>Agustus</option>
                                  <option value="09" {{ session('ielts_form.bulan_lahir')=="09" ? 'selected' : '' }}>September</option>
                                  <option value="10" {{ session('ielts_form.bulan_lahir')=="10" ? 'selected' : '' }}>Oktober</option>
                                  <option value="11" {{ session('ielts_form.bulan_lahir')=="11" ? 'selected' : '' }}>November</option>
                                  <option value="12" {{ session('ielts_form.bulan_lahir')=="12" ? 'selected' : '' }}>Desember</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="tahun_lahir" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="@if(Session::has('ielts_form')){{session('ielts_form.tahun_lahir')}}@endif" required></p>
                            </div>
                        </div>
                    </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">Negara Tujuan</label>
                      <select  class="form-control" name="negara_tujuan"  required>
                        <option value="">- Pilih Negara -</option>
                        <option value="Australia">Australia</option>
                        <option value="Canada">Canada</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Irlandia">Irlandia</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Singapura">Singapura</option>
                        <option value="Korea Selatan">Korea Selatan</option>
                        <option value="Swiss">Swiss</option>
                        <option value="Inggris">Inggris</option>
                        <option value="Amerika">Amerika</option>
                      </select>
                  </div>

                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                      <option value="">- Pilih Jenis Kelamin -</option>
                      <option value="Laki - laki">Laki - laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">Tingkat Studi Tujuan</label>
                      <Select class="form-control" name="tingkat_studi_tujuan"  required>
                        <option value="">- Pilih Tingkat - </option>
                        <option value="Sekolah Menengah Atas">Sekolah Menengah Atas</option>
                        <option value="Diploma / Kejuruan">Diploma / Kejuruan</option>
                        <option value="Sarjana / S1">Sarjana / S1</option>
                        <option value="Pasca Sarjana / S2">Pasca Sarjana / S2</option>
                        <option value="Doctoral / S3">Doctoral / S3</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">Nama Orang Tua</label>
                      <input type="text"  class="form-control" name="nama_ortu"  required value="">
                  </div>
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">Tahun Masuk</label>
                      <input type="text"  class="form-control" name="tahun_masuk"  required value="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">No. HP Orang Tua</label>
                      <input type="text"  class="form-control" name="no_telepon_ortu"  required value="">
                  </div>
                  <div class="col-md-6">
                    <label for="" class="col-md-12 col-form-group">Tahu Event Ini Dari?</label>
                    <select class="form-control" name="tahu_event_dari" name="">
                      <option value="">- Pilih Sumber Referensi -</option>
                      <option value="Menghadiri Expo sekolah">Menghadiri Expo sekolah</option>
                      <option value="Papan Iklan">Papan Iklan</option>
                      <option value="Sebaran Informasi Melalui Email">Sebaran Informasi Melalui Email</option>
                      <option value="Acara Info Session">Acara Info Session</option>
                      <option value="Facebook">Facebook</option>
                      <option value="Selebaran Brosur">Selebaran Brosur</option>
                      <option value="Dari IALF / IELTS">Dari IALF / IELTS</option>
                      <option value="Iklan Di Internet / Website">Iklan Di Internet / Website</option>
                      <option value="Instagram">Instagram</option>
                      <option value="Surat Kabar/ Koran">Surat Kabar/ Koran</option>
                      <option value="Poster">Poster</option>
                      <option value="Saran dari Keluarga / Teman">Saran dari Keluarga / Teman</option>
                      <option value="Website">Website</option>
                      <option value="Informasi Dari Whatsapp">Informasi Dari Whatsapp</option>
                      <option value="Youtube">Youtube</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                      <label for="" class="col-md-12 col-form-label">Alamat Rumah</label>
                      <input type="text" name="alamat" class="form-control" required value="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                      <label for="" class="col-md-12 col-form-label">Kode Pos</label>
                      <input type="text" name="kode_pos" class="form-control" required value="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                      <label for="" class="col-md-12 col-form-label">Nomor Telepon Rumah</label>
                      <input type="text" name="no_telepon_rumah" class="form-control" required value="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <input type="submit" name="" value="Daftar" class="btn btn-primary">
                  </div>
                </div>
                                </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
@stop
