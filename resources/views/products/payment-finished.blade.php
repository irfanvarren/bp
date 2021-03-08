@extends('layouts.bp_wo_sidenav')
@push('head-script')
<style type="text/css">
	.flex-center {
		align-items: center;
		display: flex;
		justify-content: center;
	}

	.position-ref {
		position: relative;
	}
</style>
@endpush
@section('content')
<div class="col-md-12 content-wrapper">
	<div class="h-100 flex-center position-ref">
		@if(isset($cart))
		<div>
			<div style="box-shadow: 0 0 20px #dedede;text-align: center;border-radius:15px;width: 500px;">
				<div style="padding:30px;border-bottom:2px dashed #dedede">
					<i class="fa fa-check" style="font-size:54px;background:#2a81eb;padding:12px;color:white;border-radius:50%;"></i>
					<div style="font-family: 'Roboto';font-size:28px;font-weight: bold;margin-top:15px;color:#2a81eb">Payment Successful</div>
					<div style="margin-top:5px;">
						Transaction Number : #{{$cart->invoice_no}}
					</div>
				</div>
				<div style="padding:30px;text-align: left;position: relative;">
					<div style="position: absolute;top: 0;left: 0;width: 12px;height: 26px;border-radius: 0px 13px 13px 0px;background-color: #f0f0f0;margin: -13px 0 0 -1px;box-shadow: inset -2px 0 5px #f0f0f0;"></div>
					<div style="position: absolute;top: 0;right: 0;width: 12px;height: 26px;border-radius: 13px 0px 0px 13px;background-color: #f0f0f0;margin: -13px -1px 0 0;box-shadow: inset -2px 0 5px #f0f0f0;"></div>
					<div>
						Amount Paid : <span class="float-right">Rp.{{number_format($paid_amount,2,',','.')}}</span>
					</div>
				</div>

			</div>
			<div style="font-family: 'Roboto';font-size:18px;margin-top:15px;text-align: right;">
				<a href="{{url('products')}}" style="color:#1a61b8;">Go Back To Products</a>
			</div>
			<div class="mt-5 text-center">You will be redirected automatically in <span id="countdown">10</span>...</div>
		</div>
		@else
		@if($data_reseller != "")
		<div class="alert alert-success" style="text-align:center;margin-top:15px;">
			{!! $data_reseller !!} <br>

			<button type="button" class="btn btn-primary" onclick="this.parentElement.style.display = 'none';" name="button">Ok</button>
		</div>
		@endif
		@endif
	</div>	
</div>
@endsection
@push('more-script')
<script type="text/javascript">
	var timer = 10;
	onloadTimer =  new interval(1000, function(){
		if(timer >= 0){
			$('#countdown').html(timer);
			timer--;
		}else{
			onloadTimer.stop();
			location.href = "{{url('products')}}";
		}
	});
	onloadTimer.run();
	


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
</script>
@endpush