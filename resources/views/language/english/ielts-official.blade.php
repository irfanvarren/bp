@extends('layouts.bp_wo_sidenav')
<style media="screen">
  .form-check-inline {
    margin-left: .75rem;
  }

  input[type="date"]:before {

    content: attr(placeholder) !important;
    width: 100%;
  }

  input[type="date"]:focus:before,
  input[type="date"]:not([value=""]):before {
    width: 0;
    display: none;
  }

  .alert {
    position: fixed;
    top: 50%;
    left: 50%;
    width: 450px;
    padding: 15px;
    transform: translate(-50%, -50%);
    background-color: #f2eee1;
    z-index: 99999;
  }

  .alert button {
    float: right;
  }

  .btn-primary.disabled,
  .btn-primary:disabled {
    cursor: not-allowed;
  }
  .ielts-official-form{
    width:80%;
    margin:0 auto;
  }
</style>
@section('content')
@if(session()->has('message'))
<div class="alert alert-success">
  {{ session()->get('message') }} <br>
  <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
</div>
@endif
<div class="col-md-12 content-wrapper">
  <div class="col-md-12">
    <h2>Ingin Kuliah di Luar Negeri ? Mulainya Dari Sini</h2>
    <p>Isi Formulir Registrasi di bawah ini, Staf kami akan segera menghubungi anda kembali</p>
  </div>

  <div class="ielts-official-form">
    <form name="myForm" action="/products/ielts-test/official" onsubmit="return mySubmitFunction(event)" method="post">
      {{csrf_field()}}
      <fieldset>
        <legend>Informasi Personal</legend>
        <div class="row">
          <div class="col-md-6" style="margin-bottom:1rem">
            <div class="row">
              <div class="col-md-3">
                Modul Tes :
              </div>
              <div class="col-md-9">

                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="test_module" id="ac" value="AC" required> <label class="form-check-label" for="">Academic</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" name="test_module" id="gt" value="GT" class="form-check-input" required>
                  <label class="form-check-label" for="">General Training</label>
                </div>

              </div>
            </div>
          </div>

          <div class="col-md-6" style="margin-bottom:1rem;">
            <div class="row">

              <div class="col-md-2">
                Gelar :
              </div>
              <div class="col-md-10">
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="title" value="Dr" required> <label class="form-check-label" for="">Dr</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="title" value="Mr" required> <label class="form-check-label" for="">Mr</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="title" value="Mrs" required> <label class="form-check-label" for="">Mrs</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="title" value="Miss" required> <label class="form-check-label" for="">Miss</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="title" value="Ms" required> <label class="form-check-label" for="">Ms</label>
                </div>

              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-6" style="margin-bottom:1rem;">
            <div class="row">

              <div class="col-md-3">
                Gender :
              </div>
              <div class="col-md-9">
                <div class="form-check-inline">
                  <input type="radio" class="form-check-input" name="gender" id="male" value="Male" required>
                  <label class="form-check-label" for="">Male</label>
                </div>
                <div class="form-check-inline">
                  <input type="radio" name="gender" id="female" value="Female" class="form-check-input" required>
                  <label class="form-check-label" for="">Female</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <p class="col-md-4">

            <input type="text" class="form-control" placeholder="Nama Depan" name="nama_depan" value="" required>
          </p>
          <p class="col-md-4">
            <input type="text" class="form-control" placeholder="Nama Belakang" name="nama_belakang" value="" required>
          </p>
          <p class="col-md-4">
            <input type="text" class="form-control col-md-4" name="tanggal_lahir" pattern="[0-9]{2}" placeholder="Tanggal (dd)" value="" required>
            <select class="form-control col-md-4" name="bulan_lahir" required>
              <option value="">Bulan (mm)</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>


            </select>
            <input type="text" class="form-control col-md-4" name="tahun_lahir" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="" required>

            <span style="font-size:14px;">Tanggal Lahir</span>
            <br />
          </p>


        </div>

        <div class="row">

          <p class="col-md-6">
            <textarea class="form-control" style="height:92px;resize:none;" placeholder="Alamat" name="alamat" value="" required></textarea>

          </p>
          <div class="col-md-6">
            <div class="row">
              <p class="col-md-12">
                <input type="text" class="form-control" placeholder="Kota" name="kota" value="" required>
              </p>
              <p class="col-md-12">
                <input type="text" class="form-control" placeholder="Kode Pos" name="kode_pos" value="" required>
              </p>
            </div>

          </div>



        </div>


        <div class="row">
          <p class="col-md-4">
            <select class="form-control" name="agama">
              <option value="">Agama</option>
              <option value="Budha">Budha</option>
              <option value="Katholik">Katolik</option>
              <option value="Kristen">Kristen</option>
              <option value="Kong Hu Cu">Kong Hu Cu</option>
              <option value="Hindu">Hindu</option>
              <option value="Islam">Islam</option>
            </select>

          </p>
          <p class="col-md-4">
            <input type="text" class="form-control" placeholder="No Telp" pattern="[0-9]{10,13}" name="no_telepon" value="" required>
          </p>
          <p class="col-md-4">
            <input type="email" class="form-control" placeholder="Email" name="email" value="" required>
          </p>


        </div>


        <div class="row">

          <div class="col-md-6" style="padding-top:8px;">
            <div class="row">


              <div class="col-md-3">
                Tipe Identifikasi :
              </div>
              <div class="col-md-9">
                <p class="form-check-inline">


                  <input type="radio" class="form-check-input" name="tipe_id" value="Paspor" required>
                  <label for="" class="form-check-label">Paspor</label>
                </p>
                <p class="form-check-inline">


                  <input type="radio" class="form-check-input" name="tipe_id" value="KTP" required>
                  <label for="" class="form-check-label">KTP</label>
                </p>
              </div>

            </div>


          </div>
          <div class="col-md-6">
            <input type="text" id="no_id" placeholder="No Identifikasi" class="form-control" value="">
            <input type="text" class="form-control" id="no_ktp" placeholder="No Ktp" name="no_ktp" value="" pattern="[0-9]{11,13}" required style="display:none;">
            <input type="text" class="form-control" id="no_paspor" placeholder="No Paspor" name="no_paspor" value="" required style="display:none;">
          </div>
        </div>
      </fieldset>
      <!--<fieldset>
      <legend>Pekerjaan & Pendidikan</legend>
      <p>
<label>Pekerjaan : </label> <br>
<input type="radio" name="pekerjaan" value="">
      </p>
    </fieldset>-->
      <div class="col-md-12" style="padding:0;">
        <div class="row">
          <p class="form-check-inline">

            <input type="checkbox" name="agree" id="agree" class="form-check-input" value=""> <label class="form-check-label" for=""> Setuju dengan <a href="{{url('/products/ielts-test/term-and-condition')}}" target="blank">Syarat & Ketentuan</a>
          </p>
        </div>

      </div>
      <input type="submit" name="" value="Submit" id="submit" class="btn btn-primary" disabled>
    </form>
  </div>
</div>
<script type="text/javascript">
  function mySubmitFunction() {
    someBug()
    return false;
  }
  var rad = document.myForm.tipe_id;
  var prev = null;
  for (var i = 0; i < rad.length; i++) {
    rad[i].addEventListener('change', function() {
      $('#no_id').hide();
      var cek = $(this).val();
      if (cek == "KTP") {
        $('#no_paspor').hide();
        $('#no_ktp').show();
        $("#no_ktp").prop('required', true);
      } else {
        $('#no_ktp').hide();
        $('#no_paspor').show();
        $("#no_paspor").prop('required', true);
      }
    });
  }
  document.getElementById('agree').addEventListener('change', function() {
    if (this.checked) {
      document.getElementById('submit').disabled = false;
    } else {

      document.getElementById('submit').disabled = true;
    }
  });

  function close_alert() {
    $('.alert').hide();
  }
</script>

@stop
