@extends('products.registration-payment')
@section('registration-payment-content')
<div class="container">
	<div class="row">
		<div class="col-md-12 pb-4">
			<div class="row justify-content-center">
				<div class="col-md-9">
					<form method="POST" action="{{route('post-registration-loo')}}" onsubmit="add_signature()">
						@csrf
						<div class="row">
							<div class="col-md-12">

								<div class="row">
									<div class="col-md-12 text-center" style="padding:15px;">
										<h2 class="m-0">Surat Persetujuan</h2>
										<div class="row form-group">
											<label for="" class="col-md-12 col-form-label">
												Tanda Tangan
												<br>
												<span>*Mohon ttd disesuaikan dengan kartu identitas</span>
											</label>
											<div style="width: 380px;display: block;margin: 0 auto;">
												<canvas id="signature-canvas"  height="180" width="380" style="background:#ddd;margin:0 auto;margin-top:15px;"></canvas>
												<div class="col-md-12 text-right p-0">
													<button type="button" class="btn btn-secondary" onclick="undo_signature()">Undo</button>
													<button type="button" class="btn btn-warning" onclick="reset_signature()">Clear</button>
													<input type="hidden" name="signature" id="signature" required value="">	
												</div>	
											</div>
										</div>
									</div>

								</div>
								<div class="row form-group">
									<div class="col-md-12">dengan menandatangani surat persetujuan, anda telah bersedia mengikuti <!-- <a href="javascript:void(0)">syarat dan ketentuan</a> --> syarat dan ketentuan yang berlaku</div>	
									<div class="col-md-12">
										<a href="{{asset('storage/files/registration/'.$cart_data->calonsiswa_kd.'/offer-letter.pdf')}}" target="_blank">Lihat Surat Pernyataan</a> / <a href="{{asset('storage/files/registration/'.$cart_data->calonsiswa_kd.'/offer-letter.pdf')}}" download="{{asset('storage/files/registration/'.$cart_data->calonsiswa_kd.'/offer-letter.pdf')}}"> Download </a>
									</div>
								</div>
								<div class="row">

									<div class="col-md-12 text-center">

										<a class="btn btn-secondary float-left" id="cancel-payment-btn"  href="{{url('products/cancel-payment')}}">Tidak Setuju / Kembali</a>

										<button class="btn btn-primary float-right">Setuju dan lanjut</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('more-script')

<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script type="text/javascript">
	var canvas = document.getElementById("signature-canvas");
	var signaturePad = new SignaturePad(canvas);
	function add_signature(){
		var signature = signaturePad.toDataURL();
		$('#signature').val(signature);
		document.myform.submit();
	}

	function reset_signature(){
		signaturePad.clear();
	}

	function undo_signature(){
		var data = signaturePad.toData();
		if (data) {
			data.pop(); 
			signaturePad.fromData(data);
		}
	}
</script>
@endpush