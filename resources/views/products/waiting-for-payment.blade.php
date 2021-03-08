@extends('products.registration-payment')
@section('registration-payment-content')
@php
$payment_method = $cart_data->payments->first();
@endphp
<div class="modal fade show" id="redirect-modal" tabindex="-1" role="dialog" @if(!session()->has('payment-gateway-redirected') && $payment_method) style="display: block;padding-right: 17px;" @endif>
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Redirect Payment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('redirect-modal').style.display = 'none';">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Mohon tunggu beberapa saat anda akan dialihkan ke halaman pembayaran dalam <span id="redirect-countdown">5</span>.... <br>
			</div>
		</div>
	</div>
</div>

@csrf

<div class="container">
	<div class="row">	
		<div class="col-md-12 py-4">
			<div class="row justify-content-center">
				<div class="col-md-9">
					<h2 class="text-center mb-3">Detail Transaksi</h2>
					<div class="row">
						<div class="col-6">
							<div class="row form-group">
								<div class="col-md-12">
									<div>No. Invoice</div>
									<div><strong>{{$cart_data->invoice_no}}</strong></div>
								</div>
							</div>	
							<div class="row form-group">
								<div class="col-md-12">
									<div>Jumlah Tagihan</div>
									@php
									$billed_amount = 0;
									if($payment_method){
									$billed_amount = $payment_method->details->bill_total /100;
								}
								@endphp
								<div><strong> Rp.{{number_format($billed_amount,2,',','.')}}</strong></div>
							</div>
						</div>	
						<div class="row form-group">
							<div class="col-md-12">
								<div>Jumlah Terbayar</div>
								<div>
									@php
									$payment_status = "";
									if($payment_method){
									$payment_total = $payment_method->payment_total;
									if($payment_method->payment_total == "" || $payment_method->status != 2){
									$payment_total = 0;
								}
								$payment_status = ($billed_amount - $payment_total) <= 0;
								$payment_total = number_format($payment_total,2,',','.');
								
							}
							@endphp
							<strong><span class="mr-2">Rp.<span id="paid-total"> {{$payment_total}}</span>
							</span>


							<span class="badge badge-sm badge-success" id="paid-status" style="padding:6px 15px;font-size:16px;@if($payment_status) display:inline; @else display: none; @endif">Lunas</span>
							
						</strong>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="row form-group">
				<div class="col-md-12">
					<div>Metode Pembayaran</div>
					<div><strong>{{$payment_method ? ucwords($payment_method->payment_method) : "-"}}</strong></div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<div>Payment Gateway <span class="show-cancel-payment">| <a href="javascript:void(0)" onclick="cancel_payment()">Ganti</a></span> </div>
					@php
					$payment_channels = collect($daftar_payment_channel->payment_channel);
					@endphp
					<div><strong>
						@if($payment_method)
						@php
						$search_channel = $payment_channels->where('pg_code',$payment_method->details->payment_channel)->first();
						if($search_channel){
						@endphp
						{{$search_channel->pg_name}}
						@php
					}else{
					echo e("-");
				}
				@endphp
				@endif
			</strong></div>
		</div>
	</div>
</div>

</div>
<div class="row justify-content-center">
	<div class="col-md-11">
		<hr>
	</div>
	<div class="col-md-12">
		<div class="row form-group">
			<div class="col-md-6">
				<div>
					Kadaluarsa pada tanggal
				</div>
				<div>
					<h5><strong>{{date('d/m/Y',strtotime($cart_data->due_date))}}</strong></h5>

				</div>
			</div>
			<div class="col-md-6">
				<div class="float-right text-right">
					<span>Checking your payment status </span><span class="loader__dot">.</span><span class="loader__dot">.</span><span class="loader__dot">.</span>
					<div id="payment-status">{{$payment_method ? $payment_method->status_desc != "" ? $payment_method->status_desc : 'Belum diproses' : "Error"}}</div>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="mb-5 mt-4">
					<strong>Harap untuk membayar tagihan sebelum waktu habis</strong>
					<div>Anda dapat mengulangi proses pembayaran apabila waktu yang disediakan telah habis</div>
					<div>
						<a href="{{$payment_method ? $payment_method->details->redirect_url : ''}}" target="_blank">Klik disini apabila anda tidak dialihkan ke halaman pembayaran</a>
					</div>
				</div>
				<div>
					<div class="form-group">
						@if(!$payment_status)
						<a style="color:red;line-height: 43px;" id="cancel-payment-btn"  href="javascript:void(0)" onclick="cancel_payment()" class="show-cancel-payment">Batalkan Pembayaran</a>
						@endif
						<a class="btn btn-primary payment-btn float-right" href="{{route('payment-finished')}}">Akhiri Transaksi</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>				
</div>
</div>
</div>

</div>
</div>
@endsection

@push('more-script')
<script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
<script type="text/javascript">
	var onloadTimer;
	var checkPaymentTimer;
	var billed_amount = '{{$billed_amount}}';

	function interval(duration, fn){
		var _this = this
		this.baseline = undefined

		this.run = function(){
			if(_this.baseline === undefined){
				_this.baseline = new Date().getTime()
			}
			fn()
			var end = new Date().getTime()
			_this.baseline += duration

			var nextTick = duration - (end - _this.baseline)
			if(nextTick<0){
				nextTick = 0
			}

			_this.timer = setTimeout(function(){
				_this.run(end)
			}, nextTick)
		}

		this.stop = function(){
			clearTimeout(_this.timer);
			_this = null;
		}
	}

	function cancel_payment(){
		Swal.fire({
			title: 'Are you sure want to cancel this payment?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
		}).then((result) => {
			if (result.value) {
				location.href ="{{route('back-to-billing')}}";
			}
		});
	}


	$(document).ready(function(){
		var payment_timer_duration = 10 * 1000; // dalam detik
		checkPaymentTimer = new interval(payment_timer_duration, function(){
			$.ajax({
				url: "{{route('check-payment-status')}}",
				method: "POST",
				dataType: "json",
				data:{
					_token : token,
					trx_id : "{!!$payment_method ? $payment_method->details->trx_id : ''!!}",
					bill_no : "{{ $payment_method ? $payment_method->details->bill_no : ''}}"
				},
				success:function(data){
					$('#payment-status').html(data.payment_status_desc);
					
					$('#paid-total').html(formatRupiah(paid_total));
					if(data.payment_status_code == 2){
						checkPaymentTimer.stop();
						$('.loader__dot').hide();

						var paid_total = 0;
						if(data.payment_total != ""){
							paid_total = data.payment_total;
						}

						if((billed_amount - paid_total) <= 0){
							$('.show-cancel-payment').remove();
							$('#paid-status').css({display: "inline"});
						}
					}
				},
				error:function(){
					console.log('check payment status : error');
				}
			});
		});
		checkPaymentTimer.run();
		
		var timer = 5;
		var URL = "{!! !session()->has('payment-gateway-redirected') ? $payment_method ? $payment_method->details->redirect_url : '' : '' !!}";
		if(URL != ""){
			onloadTimer =  new interval(1000, function(){
				if(timer >= 0){
					document.getElementById('redirect-countdown').innerHTML = timer;
					timer--;
				}else{
					onloadTimer.stop();
					document.getElementById('redirect-modal').style.display = "none";

					var strWindowFeatures = "location=yes,height=640,width=580,scrollbars=yes,status=yes";
					var win = window.open(URL, "_blank", strWindowFeatures);
					$.ajax({
						url : "{{route('payment-redirected')}}",
						method: "GET",
						success:function(){
							console.log('user redirected to payment gateway');
						},error:function(){

						}
					});
				}
			});
			onloadTimer.run();
		}
		
	});


</script>

@endpush