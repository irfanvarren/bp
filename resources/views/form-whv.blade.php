@extends('layouts.bp_wo_sidenav')
@section('content')
<div class="col-md-12 content-wrapper">
  <div class="col-md-12">



    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="card">
            <div class="card-body">


              <form class="col-md-12" action="{{url('whv/application')}}" onsubmit="return add_signature()" enctype="multipart/form-data" method="post">
@csrf

                <div class="row form-group" style="text-align:center">

                  <h3>Form SRPI - WHV</h3>
                  <p>Harap melihat keseluruhan tabel dan kolom dahulu sebelum memulai pengisian</p>
                </div>

                <div class="row form-group">
                  <label for="" class="col-md-12 col-form-label"> <b> Nama </b></label>
                  <div class="col-md-6">

                    <input type="text" class="form-control" name="nama_depan" required value="">
                    <label for="">Nama Depan</label>
                  </div>
                  <div class="col-md-6">

                    <input type="text" class="form-control" name="nama_belakang" required value="">
                    <label for="">Nama Belakang</label>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="" class="col-md-12"> <b> Alamat </b></label>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-12 form-group">

                        <textarea class="form-control" name="alamat" value=""></textarea>
                        <label for="">Nama Jalan</label>
                      </div>
                      <div class="col-md-6 form-group">
                        <input type="text" class="form-control" name="kota" value="">
                        <label for="">Kota</label>
                      </div>
                      <div class="col-md-6 form-group">
                        <input type="text" class="form-control" name="provinsi" value="">
                        <label for="">Provinsi</label>
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="kode_pos" class="form-control" value="">
                        <label for="">Kode Pos</label>
                      </div>
                    </div>

                  </div>

                </div>
                <div class="row form-group">
                  <label for="" class="col-md-12"> <b>Nomor Telepon</b> </label>
                  <div class="col-md-6">
                    <input type="text" name="no_telepon" class="form-control" value="">
                  </div>
                </div>
                <div class="row form-group">
                  <label for="" class="col-md-12"> <b> Nilai IELTS Overall </b> </label>
                  <div class="col-md-6">

                    <input type="text" name="nilai_ielts" placeholder="cth: 6.5" class="form-control" value="">
                  </div>
                </div>
                <div class="row form-group">
                  <label for="" class="col-md-6 col-form-label">Signature     </label>
                  <div class="col-md-7">
                    <div class="row">
                      <div class="col-md-12" >

                          <canvas id="canvas"  height="150" width="360" style="background:white;border:1px solid #999;width:100%;margin-top:15px;"></canvas>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">

    <input type="button" name=""  onclick="reset_signature()" value="Clear" style="border:none;background:none;float:right;text-transform:underline;">
                    </div>

                  </div>
                  </div>

              <input type="hidden" name="signature" id="signature" value="">
            </div>

            <div class="form-group row">
                <label for="" class="col-md-12"> <b>Pas Foto Latar Putih *</b> </label>
                <div class="col-md-6">

                  <input type="file" name="pas_foto" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-12"> <b>Paspor *</b> </label>
                <div class="col-md-6">

                  <input type="file" name="paspor" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-12"> <b>KTP *</b> </label>
                <div class="col-md-6">

                  <input type="file" name="ktp" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-12"> <b>IELTS *</b> </label>
                <div class="col-md-6">

                  <input type="file" name="file_ielts" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-12"> <b>SKCK *</b> </label>
                <div class="col-md-6">

                  <input type="file" name="skck" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-12"> <b>Ijazah *</b> </label>
                <div class="col-md-6">

                  <input type="file" name="ijazah" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-12"> <b>Transkrip Nilai</b> </label>
                <div class="col-md-6">

                  <input type="file" name="transkrip_nilai" value="" >
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-12"> <b>Jika Mahasiswa Aktif</b> </label>
                <div class="col-md-6">

                  <input type="file" name="file_mahasiswa[]" value="" multiple> <br>
                  <span style="font-size:12px;">Mohon lampirkan Surat keterangan mahasiswa aktif, KTM, KHS setiap semester, KTM</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-12"> <b>Referensi Bank *</b> </label>
                <div class="col-md-6">

                  <input type="file" name="referensi_bank" required value="" >
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-12"> <b>Dokumen Pemakai Sponsor</b> </label>
                <div class="col-md-6">

                  <input type="file" name="doc_sponsor[]" value="" multiple> <br>
                  <span style="font-size:12px;">jika disponsori oleh orang lain, lampirkan surat jaminan bermaterai 6000, KTP, KK sponsor</span>
                </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">

              <p class="form-check-inline">

                <input type="checkbox" name="agree" id="agree" class="form-check-input" value=""> <label class="form-check-label" for=""> Dengan ini saya telah membaca dan menyetujui semua Syarat dan Ketentuan yang berlaku.</a>
              </p>
              </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-12"> <b>Bukti Pembayaran Aplikasi Visa WHV</b> </label>
                <div class="col-md-6">

                  <input type="file" name="bukti_pembayaran" value=""> <br>
                  <span style="font-size:12px;">Harga Rp. 8.000.000</span>
                </div>
            </div>
            <div class="row form-group row">
              <div class="col-md-12">
                  <input type="submit" name="" value="Submit" class="btn btn-primary">
              </div>
            </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script type="text/javascript">
var canvas = document.querySelector("canvas");

var signaturePad = new SignaturePad(canvas);
function add_signature(){
var signature = signaturePad.toDataURL();
$('#signature').val(signature);
}
function reset_signature(){
  signaturePad.clear();
}

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

</script>
@stop
