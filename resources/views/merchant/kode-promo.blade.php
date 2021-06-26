@extends('layouts.bp_wo_sidenav')
@push('head-script')
@endpush
@section('content')
<input type="text" name="kode_promo" value="{{$kode_promo}}">
<div class="col-md-12 content-wrapper" id="app">
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
			<h3>Scan Merchant QR Code</h3>
			</div>
			<qrcode-scanner style="width:500px;display: block;margin:0 auto;"></qrcode-scanner>
		</div>
	</div>
</div>
@endsection
@push('more-script')

<script type="text/javascript">
</script>
@endpush
