@extends('layouts.bp_wo_sidenav')
@push('head-script')
@endpush
@section('content')
<div class="col-md-12 content-wrapper" style="background-image:url({{asset('pendaftaran-mahasiswa/background/wd.jpg')}});background-size:cover;background-repeat: no-repeat;">
  @if(session()->has('message'))

  <div class="alert alert-success" style="text-align:center">
    {!! session()->get('message') !!} <br>

    <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
  </div>
  @endif
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header text-center">
            <h3>Form Pendaftaran Mahasiswa Baru</h3>
          </div>
          <div class="card-body">
            <form class="" action="{{url('demo/pendaftaran-mahasiswa')}}" enctype="multipart/form-data" method="post">
              @csrf
               <div class="form-group row">
                <label class="col-form-label col-md-12">Nomor Pendaftaran</label>
                <div class="col-md-6">
                  <input type="text" name="nomor_pendaftaran" class="form-control">
                </div>
              </div>
             <!-- <div class="form-group row">
                <label class="col-form-label col-md-12">Perguruan Tinggi</label>
                <div class="col-md-6">
                  <select class="form-control" name="perguruan_tinggi" value="" >
                    <option value="">- Pilih Perguruan Tinggi -</option>
                  </select>
                </div>
              </div>-->
               <div class="form-group row">
                <label class="col-form-label col-md-12">Program Studi</label>
                <div class="col-md-6">
                  <select class="form-control" name="program_studi" value="" >
                    <option value="">- Pilih Prodi -</option>
                    <option value="Manajemen Pagi (S1)">Manajemen Pagi (S1)</option>
                    <option value="Manajemen Sore (S1)">Manajemen Sore (S1)</option>
                    <option value="Akutansi Pagi (S1)">Akutansi Pagi (S1)</option>
                    <option value="Akutansi Sore (S1)">Akutansi Sore (S1)</option>
                    <option value="Manajemen Perkantoran Sore (S1)">Manajemen Perkantoran Sore (D3)</option>
                    <option value="ahasa Inggris Sore (S1)">Bahasa Inggris Sore (D3)</option>
                    <option value="Sistem Informasi Pagi (S1)">Sistem Informasi Pagi (S1)</option>
                    <option value="Sistem Informasi Sore (S1)">Sistem Informasi Sore (S1)</option>
                    <option value="Teknik Informasi Pagi (S1)">Teknik Informasi Pagi (S1)</option>
                    <option value="Teknik Informasi Sore (S1)">Teknik Informasi Sore (S1)</option>
                      <option value="Bisnis Digital Sore (S1)">Bisnis Digital Sore (S1)</option>                    
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <strong>Informasi Pribadi</strong>
                </div>
                <label for="" class="col-form-label col-md-12"> Nomor KTP </label>
                <div class="col-md-6">
                 <input type="text" name="no_ktp" id="no_ktp" placeholder="No KTP" pattern="[0-9]{16}"  class="form-control" value="">

               </div>
             </div>
             <div class="form-group row">

              <label for="" class="col-form-label col-md-12"> Nama Calon Mahasiswa </label>
              <div class="col-md-6">
               <input type="text" class="form-control" name="nama"  placeholder="Nama" value="">

             </div>
           </div>
           <div class="form-group row">
            <div class="col-md-6">
              <div class="row">

                <label for="" class="col-form-label col-md-12">Tempat Lahir</label>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <input type="text" class="form-control" name="tempat_lahir"  placeholder="Tempat Lahir" value="">
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="row">

                <label for="" class="col-form-label col-md-12">Tanggal Lahir</label>
              </div>


              <div class="row">

                <div class="col-md-4">
                  <input type="text" class="form-control" name="tanggal_lahir" pattern="[0-9]{2}" placeholder="dd" value="@if(Session::has('ielts_form')){{session('ielts_form.tanggal_lahir')}}@endif" >

                </div>
                <div class="col-md-4">
                  <select class="form-control" id="bulan_lahir" name="bulan_lahir" >
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
                  <input type="text" class="form-control" name="tahun_lahir" placeholder="yyyy" pattern="[0-9]{4}" value="@if(Session::has('ielts_form')){{session('ielts_form.tahun_lahir')}}@endif" >
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <div class="row">
                <label for="" class="col-form-label col-md-12">Alamat Asal</label>
                <div class="col-md-12">
                  <input type="text" name="alamat_asal" placeholder="Alamat Asal"  class="form-control" value="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">

                <label for="" class="col-form-label col-md-12">Kota / Kabupaten</label>
                <div class="col-md-12">
                  <input type="text" name="kota_asal" placeholder="Kota Alamat Asal"  class='form-control' value="">
                </div>

              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <div class="row">
                <label for="" class="col-form-label col-md-12">Alamat Sekarang (Pontianak dan sekitar)</label>
                <div class="col-md-12">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <input type="text" name="rt_sekarang" placeholder="- RT -"  class="form-control" value="">
                    </div>
                    <div class="col-md-6">
                      <input type="text" name="rw_sekarang" placeholder="- RW -"  class="form-control" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <input type="text" name="kelurahan_sekarang" placeholder="Kelurahan"  class="form-control" value="">
                    </div>
                    <div class="col-md-6">
                      <input type="text" name="kecamatan_sekarang" placeholder="Kecamatan"  class="form-control" value="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input type="text" name="provinsi_sekarang" placeholder="Provinsi"  class="form-control" value="">
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-12 col-form-label">Jenis Kelamin / Agama</label>
            <div class="col-md-6">
              <select class="form-control" name="jenis_kelamin">
                <option value="">-Pilih Jenis Kelamin-</option>
                <option value="Laki - laki">Laki - laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="col-md-6">

              <select class="form-control" id="agama" name="agama" >
                <option value="">- Pilih Agama -</option>
                <option value="Islam" {{ session('ielts_form.agama')=="Islam" ? 'selected' : '' }}>Islam</option>
                <option value="Kristen" {{ session('ielts_form.agama')=="Kristen" ? 'selected' : '' }}>Kristen</option>
                <option value="Katholik" {{ session('ielts_form.agama')=="Katholik" ? 'selected' : '' }}>Katolik</option>
                <option value="Buddha" {{ session('ielts_form.agama')=="Budha" ? 'selected' : '' }}>Budha</option>
                <option value="Kong Hu Cu" {{ session('ielts_form.agama')=="Kong Hu Cu" ? 'selected' : '' }}>Kong Hu Cu</option>
                <option value="Hindu" {{ session('ielts_form.agama')=="Hindu" ? 'selected' : '' }}>Hindu</option>

              </select>
            </div>
          </div>
             <div class="form-group row">
            <label class="col-md-12 col-form-label">Status Pernihkahan / Pekerjaan</label>
            <div class="col-md-6 ">
             <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="status_pernikahan" id="status_pernikahan" value="Belum Menikah">
  <label class="form-check-label" for="inlineRadio1">Belum Menikah</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="status_pernikahan" id="status_pernikahan" value="Sudah Menikah">
  <label class="form-check-label" for="inlineRadio2">Sudah Menikah</label>
</div>
            </div>
            <div class="col-md-6">
              <input type="text" name="pekerjaan" placeholder="Pekerjaan"  class="form-control" value="">
            
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <div class="row">
                <label for="" class="col-form-label col-md-12">Nomor Handphone</label>
                <div class="col-md-12">
                  <input type="text" name="no_hp" placeholder="08xxxxxxxxxx"  class="form-control" value="">
                </div>
              </div>
            </div>

          </div>
          <div class="form-group row">

            <div class="col-md-6">
              <div class="row">

                <label for="" class="col-form-label col-md-12">Asal SMA </label>
                <div class="col-md-12">
                  <input type="text" name="asal_sekolah" placeholder="SMA / SMK / Setara" class='form-control' value="">
                </div>

              </div>
            </div>
                 <div class="col-md-6">
              <div class="row">

                <label for="" class="col-form-label col-md-12">Jurusan </label>
                <div class="col-md-12">
                  <input type="text" name="asal_jurusan_sekolah" placeholder="Jurusan" class='form-control' value="">
                </div>

              </div>
            </div>
          </div>
                    <div class="form-group row">

            <div class="col-md-4">
              <div class="row">

                <label for="" class="col-form-label col-md-12">Asal Univ. D3 </label>
                <div class="col-md-12">
                  <input type="text" name="asal_univ" placeholder="Nama Universitas" class='form-control' value="">
                </div>

              </div>
            </div>
                 <div class="col-md-4">
              <div class="form-horizontal row">

                <label for="" class="col-form-label col-md-12">Jurusan </label>
                <div class="col-md-12">
                  <input type="text" name="asal_jurusan_univ" placeholder="Jurusan" class='form-control' value="">
                </div>

              </div>
            </div>
             <div class="col-md-4">
              <div class="form-horizontal row">

                <label for="" class="col-form-label col-md-12">Lulus Tahun </label>
                <div class="col-md-12">
                  <input type="text" name="lulus_tahun" placeholder="Lulus Tahun" class='form-control' value="">
                </div>

              </div>
            </div>
          </div>
       
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">Nama Ayah / Ibu</label>
                
                <div class="col-md-12">
                  <dir class="row">
                <div class="col-md-6">
                
                  <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah" value="">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu" value="">
                </div>
                </dir>
                </div>
              </div>
                <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">Pendidikan Ayah / Ibu</label>
                
                <div class="col-md-12">
                  <dir class="row">
                <div class="col-md-6">
                
                  <input type="text" class="form-control" name="pendidikan_ayah" placeholder="Pendidikan Ayah" value="">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" name="pendidikan_ibu" placeholder="Pendidikan Ibu" value="">
                </div>
                </dir>
                </div>
              </div>
                  <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">Pekerjaan Ayah / Ibu</label>
                
                <div class="col-md-12">
                  <dir class="row">
                <div class="col-md-6">
                
                  <input type="text" class="form-control" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" value="">
                </div>
                <div class="col-md-6">
                
                  <input type="text" class="form-control" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" value="">
                </div>
                </dir>
                </div>
              </div>
           
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">Alamat Orang Tua</label>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="alamat_orang_tua" placeholder="Alamat Orang Tua" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">Pengalaman Berorganisasi</label>
                <div class="col-md-12">
                  <textarea class="form-control" name="pengalaman_beroganisasi" placeholder="Pengalaman Bergorganisasi"></textarea>
                </div>
              </div>
             
              <div class="form-group row">
                <label for="" class="col-md-12 col-form-label">Upload Foto</label>
                <div class="col-md-12">
                  <input type="file" name="foto" value="" >
                </div>
              </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <input type="submit" id="submit" name="" class="btn btn-primary" value="Submit">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('more-script')
  <script type="text/javascript">
    
  function close_alert() {
    $('.alert').hide();
  }
  </script>
  @endpush
  @stop
