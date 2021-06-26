@extends('layouts.bp_wo_sidenav')

@section('content')

<div class="col-md-12 content-wrapper">
  <div class="col-md-12">


  @if(session()->has('message'))
  <div class="alert alert-success" style="text-align:center">
    {!! session()->get('message') !!} <br>

    <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
  </div>
  @endif
  @if(session()->has('warning'))
  <div class="alert alert-danger" style="text-align:center">
    {!! session()->get('warning') !!} <br>

    <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
  </div>
  @endif
  <div class="row form-group">

    <div class="col-md-12" style="text-align:center;margin-bottom:20px;">

      <h2>Form Pendaftaran Simulasi IELTS di <span style="text-transform:uppercase">{{$nama_sekolah}}</span></h2>
      <p>Harap Mengisi Data Dengan Benar Karena Akan Dikirimkan E-Certificate
      </p>
    </div>
  </div>
<form action="{{url('/ielts-simulation-school')}}" method="post">
  {{csrf_field()}}
<input type="hidden" name="ref_event" value="{{$nama_sekolah}}">
  <input type="hidden" name="tgl_simulasi" value="6 September 2019">
  <div class="row form-group">
    <div class="col-md-12">
      <p class="col-md-6">
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="" required>
      </p>
      <p class="col-md-6">
        <input type="email" class="form-control" name="email" value="" placeholder="Email" required>
      </p>
    </div>
  </div>

  <div class="row form-group">
    <div class="col-md-12">

      <p class="col-md-6">
          <input type="text" name="tempat_kelahiran" class="form-control" placeholder="Tempat Kelahiran" required value="">
      </p>
      <div class="col-md-6">
        <div class="row">
        <p class="col-md-4">
            <input type="text" name="tgl_lahir" class="form-control " placeholder="Tanggal (dd)" pattern="[0-9]{2}" required value=""> <label for="">Tanggal Lahir</label>

      </p>
    <p class="col-md-4">
    <select class="form-control" name="bulan_lahir" required>
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
    </p>
    <p class="col-md-4">
    <input type="text" class="form-control" name="tahun_lahir" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="" required>
    </p>
        </div> </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-md-12">


      <div class="col-md-6">
        <div class="row form-group">
          <div class="col-md-12">


        <input type="text" class="form-control" name="no_hp" placeholder="No. HP" value="" required pattern="[0-9]{10,13}">

      </div>
          </div>
    </div>
      <div class="col-md-6 ">

        <div class="row">


      <div class="col-md-3">Jenis Kelamin</div>
      <div class="col-md-9">
        <div class="form-check-inline col-md-4">


      <input type="radio" name="jk" class="form-check-input" value="Laki - laki" required> <label for="" class="form-check-label">Laki - laki</label>
  </div>
  <div class="form-check-inline col-md-4">

       <input type="radio" name="jk" class="form-check-input" value="Perempuan" required> <label for="" class="form-check-label"> Perempuan</label>
     </div>
      </div>
    </div>
  </div>
        </div>
  </div>
  <div class="row form-group">

  <div class="col-md-12">
    <p class="col-md-6">
      <textarea rows="3" name="alamat" rows="3" class="form-control" required placeholder="Alamat"></textarea>
    </p>
    <div class="col-md-6">

      <input type="text" name="kelas" class="form-control" placeholder="Kelas (10 AK 1, 11 AK 2,dll...) " value="">
    </div>
  </div>

    </div>
    <div class="row form-group">


  <div class="col-md-12">

    <p class="col-md-12">
      <input type="submit" name="" value="Submit" class="btn btn-primary">
    </p>
  </div>
    </div>
</form>
  </div>
</div>
<script type="text/javascript">
function close_alert() {
  $('.alert').hide();
}
$("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 5000 ); // 5 secs

});
</script>
@stop
