@extends('layouts.bp_wo_sidenav')
@push('head-script')
@endpush
@section('content')
<div class="col-md-12 content-wrapper" id="app">
	<div class="row">
		<div class="col-md-12">
			<qrcode-scanner style="width:500px;display: block;margin:0 auto;"></qrcode-scanner>

		</div>
		<div class="col-md-12 visible-print text-center" style="padding-top:25px;">
			<h1>Scan This Qr Code</h1>
			<div>
				<img style="width:300px;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->merge('https://bestpartnereducation.com/public/img/logo-qrcode.png', .3, true)->generate(url('promo-scan/'.$kode_promo))) !!} ">			</div>
			</div>
		</div>
	</div>
	@endsection
	@push('more-script')

	<script type="text/javascript">
	</script>
	@endpush
