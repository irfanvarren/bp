@extends('layouts.bp_wo_sidenav')
@push('head-script')
<style type="text/css">
  .regis-card{
      padding:30px 100px;
    }
  @media screen and (max-width: 480px){
    .regis-card{
      padding:30px;
    }
  }
</style>
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
            <h3>UNIVERSITAS WIDYA DHARMA PONTIANAK MASA PROMOSI PENDAFTARAN MABA (BISA VIA WA)</h3>
            <hr>
            <p>JADWAL PENDAFTARAN: SENIN TGL 20 JANUARI - 31 MARET 2020</p>
            <p>TEMPAT PENDAFTARAN: KAMPUS UNIVERSITAS WIDYA DHARMA <br> Jl. HOS COKROAMINOTO NO. 445 PONTIANAK</p>
            <p>ATAU WA NO. +62 895-7044-11898</p>
            <p>REKENING PEMBAYARAN NO: 171 121 1832 BCA <br> (DAFTAR DAN WA-KAN BUKTI PEMBAYARAN & SYARAT PENDAFTARAAN)</p>
            <p>FASILITAS DAFTAR MASA PROMOSI: (1) JALUR PRESTASI (BEBAS TES). <br> (2) CASH BACK 10% (JIKA BAYAR LUNAS SEMUA BIAYA PENDAFTARAN)</p>
            <p>SYARAT PENDAFTARAN (LULUSAN 2020): FOTOCOPY RAPOR KELAS XI DAN KTP <br> (LULUS 2019 DAN SEBELUMNYA) FOTOCOPY KTP, IJAZAH DAN SKHUN </p>
            <p>JADWAL DAFTAR ULANG: 12 MEI - 6 JUNI 2020 DI KAMPUS WD</p>
            <p>BERKAS DAFTAR ULANG: SEMUA BUKTI SETORAN/PEMBAYARAN DARI BCA <br>FOTOCOPY: 2x AKTA LAHIR (LEGALISIR), 3x KTP, 3x KK, <br> 2x SKUN SEMENTARA LULUS 2020, LEGALISIR), 2x IJAZAH DAN 2x SKHUN (LULUS 2019 DAN SEBELUMNYA, LEGALISIR), 2x METERAI RP.6000,-</p>
          </div>
          <div class="card-body regis-card">
            <form class="form-horizontal" action="{{url('demo/pendaftaran-mahasiswa-wd')}}" enctype="multipart/form-data" method="post">
              @csrf
              <div class="form-group row">
              <label for="" class="col-form-label col-md-3"> Nama </label>
              <div class="col-md-9">
              <input type="text" class="form-control" name="nama"  placeholder="Nama" required value="">
              <medium id="passwordHelpInline" class="text-muted">
                  (Sesuai Nama KTP / Rapor)
                 </medium>
             </div>

           </div>
          <div class="form-group row">
                <label for="" class="col-form-label col-md-3">No Kontak (MABA)</label>
                <div class="col-md-9">
                  <input type="text" name="no_kontak" placeholder="08xxxxxxxxxx"  class="form-control" required value="">
            </div>

          </div>
          <div class="form-group row">

                <label for="" class="col-form-label col-md-3">Asal Sekolah </label>
                <div class="col-md-9">
                  <input type="text" name="asal_sekolah" placeholder="SMA / SMK / Setara" required class='form-control' value="">
            </div>
          </div>
          <div class="form-group row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                  <input type="text" name="asal_jurusan" placeholder="Jurusan" class='form-control' required value="">
            </div>
          </div>
              <div class="form-group row">
            <label class="col-md-3 col-form-label">Jenis Kelamin (MABA)</label>
            <div class="col-md-9">
              <select class="form-control" name="jenis_kelamin" required>
                <option value="">-Pilih Jenis Kelamin-</option>
                <option value="Laki - laki">Laki - laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
        
          </div>
              <!--<div class="form-group row">
                <label class="col-form-label col-md-3">Perguruan Tinggi</label>
                <div class="col-md-9">
                  <select class="form-control" name="perguruan_tinggi" value="" >
                    <option value="">- Pilih Perguruan Tinggi -</option>
                  </select>
                </div>
              </div>-->
               <div class="form-group row">
                <label class="col-form-label col-md-3">Program Studi</label>
                <div class="col-md-9">
                  <select class="form-control" name="program_studi" value="" required>
                    <option value="">- Pilih Prodi -</option>
                    <option value="Manajemen Pagi (S1)">Manajemen Pagi (S1)</option>
                    <option value="Manajemen Sore (S1)">Manajemen Sore (S1)</option>
                    <option value="Akutansi Pagi (S1)">Akutansi Pagi (S1)</option>
                    <option value="Akutansi Sore (S1)">Akutansi Sore (S1)</option>
                    <option value="Manajemen Perkantoran Sore (S1)">Manajemen Perkantoran Sore (D3)</option>
                    <option value="Bahasa Inggris Sore (S1)">Bahasa Inggris Sore (D3)</option>
                    <option value="Sistem Informasi Pagi (S1)">Sistem Informasi Pagi (S1)</option>
                    <option value="Sistem Informasi Sore (S1)">Sistem Informasi Sore (S1)</option>
                    <option value="Teknik Informasi Pagi (S1)">Teknik Informasi Pagi (S1)</option>
                    <option value="Teknik Informasi Sore (S1)">Teknik Informasi Sore (S1)</option>
                      <option value="Bisnis Digital Sore (S1)">Bisnis Digital Sore (S1)</option>                    
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-form-label col-md-3">Lulusan Tahun</div>
                <div class=" col-md-9">
                  <select class="form-control" name="lulusan_tahun" id="lulusan_tahun">
                    <option>- Pilih Tahun -</option>
                    @for ($tahun = 2010; $tahun <= 2020 ;$tahun++)
                    <option value="{{$tahun}}">{{$tahun}}</option>
                    @endfor
                  </select>
                <!--  <div class="form-check-inline">
                  <input type="radio" name="lulusan_tahun" class="form-check-input" required value="2019 dan sebelumnya">
                  <label class="form-check-label">2019 dan sebelumnya</label>

                  </div>
                  <div class="form-check-inline">
                  <input type="radio" name="lulusan_tahun" class="form-check-input" required value="2020">
                  <label class="form-check-label">2020</label>
                  
                  </div>-->
                </div>
              </div>  
       
              <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Upload Bukti Pembayaran</label>
                <div class="col-md-9">
                  <input type="file" name="input_bukti_pembayaran" required value="" >
                </div>
              </div>
              <div class="form-group row lulus-show-hide lulus-2019" style="display:none;">
                <label for="" class="col-md-3 col-form-label">Upload Fotocopy Rapor</label>
                <div class="col-md-9">
                  <input type="file" class="input-lulus-2019" name="input_rapor" value="" >
                </div>
              </div>
              <div class="form-group lulus-show-hide lulus-2019 lulus-2020 row" style="display:none;">
                <label for="" class="col-md-3 col-form-label">Upload Fotocopy KTP </label>
                <div class="col-md-9">
                  <input type="file" class="input-lulus-2019 input-lulus-2020" name="input_ktp" value="" >
                </div>
              </div>
              <div class="form-group lulus-show-hide lulus-2020 row" style="display:none;">
                <label for="" class="col-md-3 col-form-label">Upload Fotocopy Ijazah</label>
                <div class="col-md-9">
                  <input type="file" class="input-lulus-2020" name="input_ijazah" value="" >
                </div>
              </div>
              <div class="form-group lulus-show-hide lulus-2020 row" style="display:none;">
                <label for="" class="col-md-3 col-form-label">Upload Fotocopy SKHUN</label>
                <div class="col-md-9">
                  <input type="file" class="input-lulus-2020" name="input_skhun" value="" >
                </div>
              </div>
              <!--<div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Upload File Syarat Pendaftaran</label>
                <div class="col-md-9">
                  <input type="file" name="input_file_syarat_pendaftaran" multiple value="" >
                  <medium id="passwordHelpInline" class="text-muted col-md-12" style="padding:0">
                  Bisa Lihat Dibawah
                 </medium>
                </div>

              </div>-->
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
  $('#lulusan_tahun').on('change',function(){
    if($(this).val() < 2020){
        $('.lulus-show-hide').hide();
             $('.lulus-show-hide input').removeAttr("required");
             $('.lulus-show-hide input').prop("value","");
                        $('.input-lulus-2019').attr("required","true");
      $('.lulus-2019').show();
    }else{
       $('.lulus-show-hide').hide();
          $('.lulus-show-hide input').removeAttr("required");
          $('.lulus-show-hide input').prop("value","");
          $('.input-lulus-2020').attr("required","true");
      $('.lulus-2020').show();
    }
  });
  
/*$('input[type=radio][name=lulusan_tahun]').change(function() {
    if (this.value == '2020') {
          $('.lulus-show-hide').hide();
          $('.lulus-show-hide input').removeAttr("required");
          $('.lulus-show-hide input').prop("value","");
          $('.input-lulus-2020').attr("required","true");
      $('.lulus-2020').show();
    }
    else {
            $('.lulus-show-hide').hide();
             $('.lulus-show-hide input').removeAttr("required");
             $('.lulus-show-hide input').prop("value","");
                        $('.input-lulus-2019').attr("required","true");
      $('.lulus-2019').show();
    }
});*/
</script>
  @endpush
  @stop
