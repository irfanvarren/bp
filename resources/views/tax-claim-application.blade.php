@extends('layouts.bp_wo_sidenav')
@section('content')
  <div class="col-md-12 content-wrapper">
    <div class="col-md-12">



      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="card">
              <div class="card-body">


                <form class="col-md-12" action="{{url('products/tax-claim/application')}}" enctype="multipart/form-data" method="post">
@csrf
                  <div class="row form-group" style="text-align:center">

                    <h3>Tax - Claim</h3>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-md-12 col-form-label">Email</label>
                    <div class="col-md-12">

                      <input type="email" class="form-control" name="email" required value="">
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-md-12 col-form-label"> <b> Nama Lengkap </b></label>
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
                    <label for="" class="col-md-12"> <b> Tanggal Lahir</b></label>
                    <div class="col-md-12">
                      <input type="date" class="form-control" name="tgl_lahir" value="">

                    </div>

                  </div>
                  <div class="row form-group">
                    <label for="" class="col-md-12"> <b> Alamat Australia </b></label>
                    <div class="col-md-12">
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
                      <input type="text" name="no_telepon" required class="form-control" value="">
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-md-12"> <b>Nomor WA</b> </label>
                    <div class="col-md-6">
                      <input type="text" name="no_wa" required class="form-control" value="">
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-md-12"> <b>Akun My Gov</b> <br> <span>Jika sudah memiliki akun My Gov silahkan lampirkan </span> </label>
                    <div class="col-md-6">
                      <input type="text" name="id_mygov" placeholder="Id MyGov" class="form-control" value="">
                    </div>
                    <div class="col-md-6">
                      <input type="text" name="password_mygov" placeholder="Password MyGov" class="form-control" value="">

                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-md-12"> <b>Kode TFN </b> </label>
                    <div class="col-md-6">

                      <input type="text" name="kode_tfn" class="form-control" value="">
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-md-12"> <b> Detail Bank </b> <br> <span>Mohon Diisi dengan lengkap</span> </label>
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6 form-group">
                          <input type="text" class="form-control" name="nama_bank" value="" placeholder="Nama Bank">
                        </div>
                        <div class="col-md-6 form-group">
                          <input type="text" class="form-control" name="swift_code" value="" placeholder="Swift Code">
                        </div>
                        <div class="col-md-12 form-group">

                          <input type="text" name="nama_akun" class="form-control" placeholder="Nama Akun" value="">

                        </div>
                        <div class="col-md-6 form-group">
                          <input type="text" class="form-control" name="nomor_akun" value="" placeholder="Nomor Akun">
                        </div>
                        <div class="col-md-6 form-group">
                          <input type="text" class="form-control" name="bsb" value="" placeholder="bsb">
                        </div>

                      </div>

                    </div>

                  </div>

              <div class="form-group row">
                  <label for="" class="col-md-12"> <b>Upload Bukti Pembayaran *</b> </label>
                  <div class="col-md-6">

                    <input type="file" name="bukti_pembayaran" value="" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-md-12"> <b>Upload PAYG/Slip Pajak *</b> <br> <span>Dokumen ini didapatkan dari perusahaan tempat bekerja</span> </label>
                  <div class="col-md-6">

                    <input type="file" name="slip_pajak" value="" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="" class="col-md-12"> <b>Other</b> </label>
                  <div class="col-md-6">

                    <input type="file" name="file_lainnya[]" multiple value="">
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
  document.myform.submit();
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
