@extends('layouts.bp_wo_sidenav')

@section('content')
<div class="col-md-12 content-wrapper">
  @if(session()->has('message'))
  <div class="alert alert-success" style="text-align:center">
    {!! session()->get('message') !!} <br>

    <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
  </div>
  @endif
  <div class="col-md-12" style="text-align:center;margin-bottom:25px;">

    <h2>Form Pendaftaran BEPT</h2>
    <p>Info Lebih lanjut dapat menghubungi no WA di bawah ini:
      <ol style="list-style-position:inside">
        <li>+62 895 1513 9224 (Gerald)</li>
        <li>+62 857 8761 8184 (Meichel)</li>
        <li>+62 895 6003 83701 (Yeran)</li>
        <li>+62 857 5436 8104 (Vindri) - Singkawang</li>
      </ol>
    </p>
  </div>
  <form action="{{url('products/bept')}}" method="post">
    @csrf
    <div class="col-md-12">
       <div class="row">

      <div class="col-md-6" id="cabang-wrapper" style="display:none">
        <p class="col-md-4" style="padding:0"> Pilih Cabang Best Partner</p>
        <p class="col-md-8" style="padding:0;">
          <select class="form-control" name="REF_PERUSAHAAN">
            <option value="">- Pilih Cabang -</option>
            @foreach($perusahaan as $value)
            <option value="{{$value->KD}}">{{ucwords(strtolower($value->NAMA))}}</option>
            @endforeach
          </select>
        </p>
      </div>
      </div>
    </div>
    <div class="col-md-12">
        <div class="row">
      <p class="col-md-6">
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="NAMA" value="" required>
      </p>
      <p class="col-md-6">
        <input type="email" class="form-control" name="EMAIL" value="" placeholder="Email" required>
      </p>
      </div>
    </div>
    <div class="col-md-12">
        <div class="row">
      <p class="col-md-6">
        <input type="text" name="KOTA_KELAHIRAN" class="form-control" placeholder="Tempat Kelahiran" required value="">
      </p>
      <div class="col-md-6">
        <div class="row">
          <p class="col-md-4">
            <input type="text" name="tgl_lahir" class="form-control" placeholder="Tanggal (dd)" pattern="[0-9]{2}" required value="">
            Tanggal Lahir
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
        </div>

      </div>
      </div>
    </div>
    <div class="col-md-12">
        <div class="row">
      <p class="col-md-6">
        <input type="text" class="form-control" name="KONTAK" placeholder="No. HP" value="" required pattern="[0-9]{10,13}">
      </p>
      <p class="col-md-6">
        <input type="text" class="form-control" placeholder="NIK" name="REF_KTP" value="" pattern="[0-9]{16}" required>
      </p>
      </div>
    </div>
    <div class="col-md-12">
        <div class="row">
      <p class="col-md-6">
        <textarea rows="3" name="ALAMAT" rows="3" class="form-control" required placeholder="Alamat"></textarea>
      </p>
      <p class="col-md-6">
        <textarea name="ALASAN" rows="3" class="form-control" placeholder="Tujuan Mengikuti BEPT" required></textarea>
      </p>
      </div>
    </div>
    <div class="col-md-12">
    <div class="row">
      <p class="col-md-12">
        <button type="submit" name="" value="Submit" class="btn btn-primary">Submit</button>
      </p>
      </div>
    </div>
  </form>
</div>

@stop
@push('more-script')
<script type="text/javascript">

  function close_alert(){
    $('.alert').hide();
  }
</script>
@endpush