@extends('layouts.bp_wo_sidenav')
@section('content')

<div class="col-md-12 content-wrapper">
  @if(session()->has('message'))
  <div class="alert alert-success" style="text-align:center">
    {!! session()->get('message') !!} <br>

    <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
  </div>
  @endif
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="col-md-12 card">
          <div class=" card-body">
            <form class="" id="myform" name="myform" action="{{url('form-study-tour-kuching')}}" onsubmit="add_signature()" enctype="multipart/form-data" method="post">
              @csrf
              <div class="row">
                <div class="col-md-12">

                  <h2>Surat Pernyataan Study Tour - Kuching</h2>
                  <p>Saya yang bertanda tangan di bawah ini :</p>
                </div>
              </div>
              <div class="row form-group">

                <label for="" class="col-md-12 col-form-label">Nama Lengkap*</label>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <input type="text" class="form-control" name="nama_lengkap" required placeholder="Nama Depan" value="">                              
                    </div>
                  </div>

                </div>
              </div>
              <div class="row form-group">

                <label for="" class="col-md-12 col-form-label">Tanggal Lahir*</label>
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
                  <input type="text" class="form-control" name="tahun_lahir" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="@if(Session::has('ielts_form')){{session('ielts_form.tahun_lahir')}}@endif" required>
                </div>
              </div>

            </div>
          </div>
          
          <div class="row form-group">

            <label for="" class="col-md-12 col-form-label">Alamat*</label>
            <div class="col-md-12">
              <textarea name="alamat" rows="2"  class="form-control" placeholder="Alamat" required></textarea>
            </div>
          </div>

          
          <div class="row form-group">
            <div class="col-md-12">


              <input type="checkbox"  name="agree" id="agree" value="" required> &nbsp; Dengan ini menyatakan bahwa saya telah membaca dan menyetujui<a href="{{url('form-study-tour-kuching/term-and-condition')}}"> syarat dan ketentuan </a> yang berlaku di Best Partner Education. *
            </div>
          </div>
          <div class="row form-group">
            <label for="" class="col-md-12 col-form-label">Signature
              <br>
              <span>*Mohon ttd disesuaikan dengan kartu identitas</span>
              <input type="button" name="" class="btn btn-warning" onclick="reset_signature()" style="float:right" value="Clear"> </label>
              <canvas id="canvas"  height="200" width="350" style="background:#ddd;margin:0 auto;margin-top:15px;"></canvas>

              <input type="hidden" name="signature" id="signature" value="">
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <input type="submit" name="" id="submit" disabled class="btn btn-primary" value="Submit">
              </div>
            </div>
          </form>
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
