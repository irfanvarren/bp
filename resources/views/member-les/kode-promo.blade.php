@extends('layouts.bp_wo_sidenav')
@section('content')
  <div class="col-md-12 content-wrapper">

  <div class="col-md-12 visible-print text-center" style="padding-top:25px;">

    	<h1>Scan This Qr Code</h1>
    <div class="" style="background:black;margin: 0 auto;margin-top:25px;width:270px;padding:10px 5px;">


    {!! QrCode::size(250)->generate(url('promo-scan/'.$kode_promo)); !!}
    </div>
</div>

</div>
@endsection
