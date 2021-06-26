@extends('layouts.bp_wo_sidenav')
@push('head-script')
<style type="text/css">
  .tab-form{
    display: none;
  }
</style>
@endpush
@section('content')
<div class="col-md-12 content-wrapper" style="padding:30px;">

  @if(session()->has('message'))
  <div class="alert alert-success" style="text-align:center">
    {!! session()->get('message') !!} <br>

    <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
  </div>
  @endif
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12"> <span style="background:white;border: 1px solid black;padding:5px 10px;font-size:24px;">  {{ucwords($type)}} Visa - {{$country == 'aus' ? 'Australia' : ''}} </span></div>
    </div>
    <div class="row form-group justify-content-center">
      <div class="col-md-11">
       <div class="row form-group">
         <div class="col-md-4 col-form-label text-right">Tanggal rencana melakukan kunjungan : </div>
         <div class="col-md-7"><input class="form-control" type="date" name="tgl_kunjungan"></div>
       </div> 
       <div class="row form-group">
         <div class="col-md-4 col-form-label text-right">Apakah aplikasi diajukan bagian dari :  </div>
         <div class="col-md-7">
          <div class="form-check-inline">
            <label class="form-check-label col-form-label"> <input type="radio" class="form-check-input" name="aplikasi_diajukan_dari" value="Perseorangan"> Perseorangan </label>
          </div>
          <div class="form-check-inline">
           <label class="form-check-label col-form-label"> <input type="radio" class="form-check-input" name="aplikasi_diajukan_dari" value="Grup Keluarga"> Grup Keluarga </label>
         </div>
         <div class="form-check-inline">
          <label class="form-check-label col-form-label"> <input type="radio" class="form-check-input" name="aplikasi_diajukan_dari" value="Grup Teman"> Grup Teman </label>
        </div>
        <div class="form-check-inline">
         <label class="form-check-label col-form-label"> <input type="radio" class="form-check-input" name="aplikasi_diajukan_dari" value="Grup Pekerja"> Grup Pekerja </label>
       </div>
       <div class="form-check-inline">
         <label class="form-check-label col-form-label"> <input type="radio" class="form-check-input" name="aplikasi_diajukan_dari" value="Grup Tour"> Tour </label>
       </div>
     </div>
   </div> 
   <div class="row form-group">
     <div class="col-md-4 col-form-label text-right">Tujuan kunjungan : </div>
     <div class="col-md-7"><input class="form-control" type="text" name="tujuan_kunjungan" placeholder="Kunjungan Bisnis / Liburan / Kunjungan Sekolah"></div>
   </div> 
 </div>
</div>

<div class="row">
  <form class="" id="myform" name="myform" action="{{url('form-data-visa/'.$type.'/'.$country)}}"  enctype="multipart/form-data" method="post">
    <div class="col-md-12 mb-3">Mohon diisi menggunakan <strong> KAPITAL </strong></div>

    <div class="col-md-12 tab-form">
      <div class="card">
        <div class="card-body">

          @csrf
          <div class="col-md-6">

            <div class="row form-group">
              <div class="col-md-12">
                <h4>DATA PEMOHON</h4>
              </div>
              <label for="" class="col-md-4 col-form-label">Nama Lengkap</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="">

              </div>
            </div>
            <div class="row form-group">

              <div class="col-md-4">
                Jenis Kelamin <span class="colon">:</span>
              </div>
              <div class="col-md-8">
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="jenis_kelamin" id="male" value="Laki - laki">
                  <label class="form-check-label" for="">Laki - laki</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" name="jenis_kelamin" id="female" value="Perempuan" class="form-check-input">
                  <label class="form-check-label" for="">Perempuan</label>
                </div>
              </div>
            </div>
            <div class="row form-group">

              <div class="col-md-4">
                Tanggal Lahir <span class="colon">:</span>
              </div>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="tahun_lahir" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="@if(Session::has('ielts_form')){{session('ielts_form.tahun_lahir')}}@endif"></div>
                    <div class="col-md-4"> <select class="form-control" id="bulan_lahir" name="bulan_lahir">
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
                    </select></div>
                    <div class="col-md-4"> <input type="text" class="form-control" name="tanggal_lahir" pattern="[0-9]{2}" placeholder="Tanggal (dd)" value="@if(Session::has('ielts_form')){{session('ielts_form.tanggal_lahir')}}@endif"></div>

                  </div>
                </div>



              </div>
              <div class="row form-group">

                <label for="" class="col-md-4 col-form-label">Tempat Lahir :</label>
                <div class="col-md-8">
                  <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-4 col-form-label"> Status Perkawinan<span class="colon">:</span> </div>
                <div class="col-md-8">
                  <select class="form-control" id="status_perkawinan" name="status_perkawinan">
                    <option value="">- Pilih Status Perkawinan -</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Cerai">Cerai</option>
                    <option value="Janda">Janda</option>
                    <option value="Duda">Duda</option>
                  </select>

                </div >
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <h4>DOMISILI</h4>
                </div>
                <label for="" class="col-md-4 col-form-label">Alamat :</label>
                <div class="col-md-8">
                  <textarea class="form-control" name="alamat" placeholder="Alamat" rows="3" style="resize:none;">
                  </textarea>

                </div>
              </div>
              <div class="row form-group">

                <label for="" class="col-md-4 col-form-label">Kota :</label>
                <div class="col-md-8">
                  <input type="text" name="kota" class="form-control" placeholder="Email" value="">
                </div>
              </div>
              <div class="row form-group">

                <label for="" class="col-md-4 col-form-label">Provinsi :</label>
                <div class="col-md-8">
                  <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" value="">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <h4>KONTAK</h4>
                </div>

              </div>
              <div class="row form-group">

                <label for="" class="col-md-4 col-form-label">Handphone :</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="handphone" placeholder="Handphone" value="">

                </div>
              </div>
              <div class="row form-group">

                <label for="" class="col-md-4 col-form-label">Email :</label>
                <div class="col-md-8">
                  <input type="email" name="email" class="form-control" placeholder="Email" value="">
                </div>
              </div>
            </div>
            


            <div class="col-md-6">

              <div class="row form-group">
                <div class="col-md-12">
                  <h4>DATA PEMOHON DI BAWAH UMUR</h4>
                </div>
                <label for="" class="col-md-4 col-form-label">Nama Lengkap</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="nama_lengkap_dibawah_umur" placeholder="Nama Lengkap" value="">

                </div>
              </div>
              <div class="row form-group">

                <div class="col-md-4">
                  Jenis Kelamin <span class="colon">:</span>
                </div>
                <div class="col-md-8">
                  <div class="form-check-inline">
                    <input type="radio" class="form-check-input" name="jenis_kelamin_dibawah_umur" id="male" value="Laki - laki">
                    <label class="form-check-label" for="">Laki - laki</label>
                  </div>
                  <div class="form-check-inline">
                    <input type="radio" name="jenis_kelamin_dibawah_umur" id="female" value="Perempuan" class="form-check-input">
                    <label class="form-check-label" for="">Perempuan</label>
                  </div>
                </div>
              </div>
              <div class="row form-group">

                <div class="col-md-4">
                  Tanggal Lahir <span class="colon">:</span>
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="tahun_lahir_dibawah_umur" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="@if(Session::has('ielts_form')){{session('ielts_form.tahun_lahir')}}@endif"></div>
                      <div class="col-md-4"> <select class="form-control" id="bulan_lahir" name="bulan_lahir_dibawah_umur">
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
                      </select></div>
                      <div class="col-md-4"> <input type="text" class="form-control" name="tanggal_lahir_dibawah_umur" pattern="[0-9]{2}" placeholder="Tanggal (dd)" value="@if(Session::has('ielts_form')){{session('ielts_form.tanggal_lahir')}}@endif"></div>

                    </div>
                  </div>



                </div>
                <div class="row form-group">

                  <label for="" class="col-md-4 col-form-label">Tempat Lahir :</label>
                  <div class="col-md-8">
                    <input type="text" name="tempat_lahir_dibawah_umur" class="form-control" placeholder="Tempat Lahir" value="">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-4 col-form-label"> Jumlah Pendamping<span class="colon">:</span> </div>
                  <div class="col-md-8">
                    <input type="number" name="jlh_pendamping" class="form-control">
                  </div >
                </div>
                <div class="row form-group">
                  <div class="col-md-12">
                    <h4>DATA PENDAMPING (i)</h4>
                  </div>
                  <label for="" class="col-md-4 col-form-label">Nama Lengkap</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="nama_lengkap_pendamping1" placeholder="Nama Lengkap" value="">

                  </div>
                </div>
                <div class="row form-group">

                  <div class="col-md-4">
                    Jenis Kelamin <span class="colon">:</span>
                  </div>
                  <div class="col-md-8">
                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" name="jenis_kelamin_pendamping1" id="male" value="Laki - laki">
                      <label class="form-check-label" for="">Laki - laki</label>
                    </div>
                    <div class="form-check-inline">
                      <input type="radio" name="jenis_kelamin_pendamping1" id="female" value="Perempuan" class="form-check-input">
                      <label class="form-check-label" for="">Perempuan</label>
                    </div>
                  </div>
                </div>
                <div class="row form-group">

                  <div class="col-md-4">
                    Tanggal Lahir <span class="colon">:</span>
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-4">
                        <input type="text" class="form-control" name="tahun_lahir_pendamping1" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value=""></div>
                        <div class="col-md-4"> <select class="form-control" id="bulan_lahir" name="bulan_lahir_pendamping1">
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
                        </select></div>
                        <div class="col-md-4"> <input type="text" class="form-control" name="tanggal_lahir_pendamping1" pattern="[0-9]{2}" placeholder="Tanggal (dd)" value="@if(Session::has('ielts_form')){{session('ielts_form.tanggal_lahir')}}@endif"></div>

                      </div>
                    </div>



                  </div>  
                  <div class="row form-group">
                    <div class="col-md-4 col-form-label"> Hubungan<span class="colon">:</span> </div>
                    <div class="col-md-8">
                      <input type="text" name="hubungan_pendamping1" placeholder="hubungan" class="form-control">
                    </div >
                  </div>
                  <div class="row form-group">
                    <div class="col-md-12">
                      <h4>DATA PENDAMPING (ii)</h4>
                    </div>
                    <label for="" class="col-md-4 col-form-label">Nama Lengkap</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="nama_lengkap_pendamping2" placeholder="Nama Lengkap" value="">

                    </div>
                  </div>
                  <div class="row form-group">

                    <div class="col-md-4">
                      Jenis Kelamin <span class="colon">:</span>
                    </div>
                    <div class="col-md-8">
                      <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin_pendamping2" id="male" value="Laki - laki">
                        <label class="form-check-label" for="">Laki - laki</label>
                      </div>
                      <div class="form-check-inline">
                        <input type="radio" name="jenis_kelamin_pendamping2" id="female" value="Perempuan" class="form-check-input">
                        <label class="form-check-label" for="">Perempuan</label>
                      </div>
                    </div>
                  </div>
                  <div class="row form-group">

                    <div class="col-md-4">
                      Tanggal Lahir <span class="colon">:</span>
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-4">
                          <input type="text" class="form-control" name="tahun_lahir_pendamping2" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value=""></div>
                          <div class="col-md-4"> <select class="form-control" id="bulan_lahir" name="bulan_lahir_pendamping2">
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
                          </select></div>
                          <div class="col-md-4"> <input type="text" class="form-control" name="tanggal_lahir_pendamping2" pattern="[0-9]{2}" placeholder="Tanggal (dd)"></div>

                        </div>
                      </div>



                    </div>  
                    <div class="row form-group">
                      <div class="col-md-4 col-form-label"> Hubungan<span class="colon">:</span> </div>
                      <div class="col-md-8">
                        <input type="text" name="hubungan_pendamping2" placeholder="hubungan" class="form-control">
                      </div >
                    </div>

                  </div>

                </div>
              </div>
            </div>


            <div class="col-md-12 tab-form" >
              <div class="card">
                <div class="card-body">

                  <div class="col-md-6">

                    <div class="row form-group">
                      <div class="col-md-12">
                        <h4>DATA KERABAT DI AUSTRALIA</h4>
                      </div>
                      <label for="" class="col-md-4 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_lengkap_kerabat" placeholder="Nama Lengkap" value="">

                      </div>
                    </div>
                    <div class="row form-group">

                      <div class="col-md-4">
                        Jenis Kelamin <span class="colon">:</span>
                      </div>
                      <div class="col-md-8">
                        <div class="form-check-inline">
                          <input type="radio" class="form-check-input" name="jenis_kelamin_kerabat" id="male" value="Laki - laki">
                          <label class="form-check-label" for="">Laki - laki</label>
                        </div>
                        <div class="form-check-inline">
                          <input type="radio" name="jenis_kelamin_kerabat" id="female" value="Perempuan" class="form-check-input">
                          <label class="form-check-label" for="">Perempuan</label>
                        </div>
                      </div>
                    </div>
                    <div class="row form-group">

                      <div class="col-md-4">
                        Tanggal Lahir <span class="colon">:</span>
                      </div>
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-4">
                            <input type="text" class="form-control" name="tahun_lahir_kerabat" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="@if(Session::has('ielts_form')){{session('ielts_form.tahun_lahir')}}@endif"></div>
                            <div class="col-md-4"> <select class="form-control" id="bulan_lahir" name="bulan_lahir_kerabat">
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
                            </select></div>
                            <div class="col-md-4"> <input type="text" class="form-control" name="tanggal_lahir_kerabat" pattern="[0-9]{2}" placeholder="Tanggal (dd)" value="@if(Session::has('ielts_form')){{session('ielts_form.tanggal_lahir')}}@endif"></div>

                          </div>
                        </div>



                      </div>
                      <div class="row form-group">

                        <label for="" class="col-md-4 col-form-label">Alamat :</label>
                        <div class="col-md-8">
                          <textarea class="form-control" name="alamat_kerabat" placeholder="Alamat" rows="3" style="resize:none;">
                          </textarea>

                        </div>
                      </div>
                      <div class="row form-group">

                        <label for="" class="col-md-4 col-form-label">Kota :</label>
                        <div class="col-md-8">
                          <input type="text" name="kota_kerabat" class="form-control" placeholder="Kota" value="">
                        </div>
                      </div>
                      <div class="row form-group">

                        <label for="" class="col-md-4 col-form-label">Negara Bagian :</label>
                        <div class="col-md-8">
                          <input type="text" name="negara_bagian_kerabat" class="form-control" placeholder="Negara Bagian" value="">
                        </div>
                      </div>
                      <div class="row form-group">

                        <label for="" class="col-md-4 col-form-label">Kode Pos :</label>
                        <div class="col-md-8">
                          <input type="text" name="kode_pos_kerabat" class="form-control" placeholder="Kode Pos" value="">
                        </div>
                      </div>  
                      <div class="row form-group">
                        <div class="col-md-4 col-form-label"> Status Kewarganegaraan<span class="colon">:</span> </div>
                        <div class="col-md-8">

                          <input type="text" name="status_kewarganegaraan_kerabat" id="status_kewarganegaraan_kerabat" placeholder="Status Kewarganegaraan" class="form-control">
                          <span style="font-size:13px;">Penduduk Asli / Permanen Residen / Student Visa / Working Visa / Tourist Visa / Lainnya</span>
                        </div >
                      </div>

                      <div class="row form-group">

                        <label for="" class="col-md-4 col-form-label">Handphone :</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="handphone_kerabat" placeholder="Handphone" value="">

                        </div>
                      </div>
                      <div class="row form-group">

                        <label for="" class="col-md-4 col-form-label">Email :</label>
                        <div class="col-md-8">
                          <input type="email" name="email_kerabat" class="form-control" placeholder="Email" value="">
                        </div>
                      </div>

                      <div class="row form-group">
                        <div class="col-md-12">
                          <h4>Bukti Keuangan</h4>
                        </div>
                        <label for="" class="col-md-4 col-form-label">Nama Lengkap</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="nama_lengkap_bukti_keuangan" placeholder="Nama Lengkap" value="">

                        </div>
                      </div>
                      <div class="row form-group">

                        <label for="" class="col-md-4 col-form-label">Hubungan Sponsor :</label>
                        <div class="col-md-8">
                          <input type="text" name="hubungan_sponsor" class="form-control" placeholder="Kerabat/Orang Tua/Diri Sendiri/Organisasi/Lainnya" value="">
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-md-4 col-form-label"> Jumlah Saldo<span class="colon">:</span> </div>
                        <div class="col-md-8">
                          <input type="text" name="jlh_saldo" class="form-control">
                        </div >
                      </div>
                      <div class="row form-group">
                        <div class="col-md-4 col-form-label">Status Pekerjaan<span class="colon">:</span> </div>
                        <div class="col-md-8">
                          <input type="text" name="status_pekerjaan_bukti_keuangan" placeholder="Wirausaha / Wiraswasta / Lainnya" class="form-control">
                        </div >
                      </div>

                      <div class="row form-group">
                        <div class="col-md-12">
                          <h4>Organisasi</h4>
                        </div>
                        <label for="" class="col-md-4 col-form-label">Nama Organisasi</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="nama_organisasi" placeholder="Nama Organisasi" value="">

                        </div>
                      </div>
                      <div class="row form-group">

                        <label for="" class="col-md-4 col-form-label">Alamat :</label>
                        <div class="col-md-8">
                          <textarea class="form-control" name="alamat_organisasi" placeholder="Alamat" rows="3" style="resize:none;">
                          </textarea>

                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-md-4 col-form-label"> Jumlah Saldo<span class="colon">:</span> </div>
                        <div class="col-md-8">
                          <input type="text" name="jlh_saldo_organisasi" class="form-control">
                        </div >
                      </div>

                    </div>



                    <div class="col-md-6">

                      <div class="row form-group">
                        <div class="col-md-12">
                          <h4>STATUS PEKERJAAN</h4>
                        </div>
                        <label for="" class="col-md-4 col-form-label">Pekerjaan</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" value="">

                        </div>
                      </div> 
                      <div class="row form-group">
                        <div class="col-md-4 col-form-label"> Nama Perusahaan<span class="colon">:</span> </div>
                        <div class="col-md-8">
                          <input type="text" name="nama_perusahaan" placeholder="Nama Perusahaan" class="form-control">
                        </div >
                      </div>
                      <div class="row form-group">
                        <div class="col-md-4 col-form-label"> Tanggal Bekerja <span class="colon">:</span> </div>
                        <div class="col-md-8">
                          <input type="date" name="tgl_bekerja" class="form-control">
                        </div >
                      </div>
                       <div class="row form-group">
                        <div class="col-md-4 col-form-label"> Alamat :   <span class="colon">:</span> </div>
                        <div class="col-md-8">
                            <textarea class="form-control" name="alamat_bekerja" placeholder="Alamat" rows="3" style="resize:none;"></textarea>
                        </div >
                      </div>
                       <div class="row form-group">

                <label for="" class="col-md-4 col-form-label">Kota :</label>
                <div class="col-md-8">
                  <input type="text" name="kota_bekerja" class="form-control" placeholder="Email" value="">
                </div>
              </div>
              <div class="row form-group">

                <label for="" class="col-md-4 col-form-label">Provinsi :</label>
                <div class="col-md-8">
                  <input type="text" name="provinsi_bekerja" class="form-control" placeholder="Provinsi" value="">
                </div>
              </div>
              <div class="row form-group">

                <label for="" class="col-md-4 col-form-label">Nomor Telefon :</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="nomor_telefon_bekerja" placeholder="Nomor Telefon" value="">

                </div>
              </div>
                     <div class="row form-group">

                <label for="" class="col-md-4 col-form-label">Email :</label>
                <div class="col-md-8">
                  <input type="email" name="email_bekerja" class="form-control" placeholder="Email" value="">
                </div>
              </div>

                      <div class="row ">
                        <div class="col-md-12">
                          <h4>INFORMASI TAMBAHAN</h4>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-md-12 col-form-label">
                          Apakah sebelumnya pernah mengajukan visa Australia ?
                        </div>
                        <div class="col-md-12">
                          <input type="text" class="form-control" name="informasi_tambahan1">
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-md-12 col-form-label">
                          Apakah pernah mengalami penolakan visa ?
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="informasi_tambahan2">
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-md-12 col-form-label">
                        Apakah pernah melanggar kondisi visa ?
                        </div>
                        <div class="col-md-12">
                          <input type="text" class="form-control" name="informasi_tambahan3">
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-md-12 col-form-label">
                          Apakah pernah melakukan medical check up (kesehatan) dalam 12 bulan terakhir ?
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="informasi_tambahan4">
                        </div>
                      </div>
                    
                       <div class="row form-group">
                        <div class="col-md-12 col-form-label">
                            Apakah pernah terlibat dalam aksi ilegal dan melanggar Hukum ?
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="informasi_tambahan5">
                        </div>
                      </div>
                    </div>


                  </div>
                </div>

              </div>  
              <div class="col-md-12 mt-3" >
               <button class="btn btn-primary" id="prevBtn" type="button" onclick="nextPrev(-1)"> Previous </button>
               <button class="btn btn-primary" id="nextBtn" type="button" onclick="nextPrev(1)" style="float: right"> Next </button>

             </div>  
           </form>
         </div>
       </div>
     </div>

     @endsection
     @push('more-script')
     <script type="text/javascript">

  var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab-form");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
 // fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab-form");
  // Exit the function if any field in the current tab is invalid:
   // Hide the current tab:
   x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("myform").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}
function close_alert() {
  $('.alert').hide();
}
</script>
@endpush