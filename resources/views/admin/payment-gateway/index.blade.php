@extends('layouts.app-auth')
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style media="screen">
	.loading-wrapper{
		width:100vw;
		height:100vh;
		position:fixed;
		top:0;
		left:0;
		z-index:9999999;
		display:none;
		background:rgba(255,255,255,1);
	}
	.loading-wrapper img{
		display:block;
		margin:0 auto;
		width:500px;
		position:absolute;
		top:50%;
		left:50%;
		transform:translate(-50%,-50%);

	}
</style>

@endpush
@section('content')
<div class="loading-wrapper">
	<img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">{{ __('Payment Gateway') }}</h4>
						<p class="card-category"> {{ __('Payment Gateway') }}</p>
					</div>
					<div class="card-body">
						@if (session('status'))
						<div class="row">
							<div class="col-sm-12">
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<i class="material-icons">close</i>
									</button>
									<span>{{ session('status') }}</span>
								</div>
							</div>
						</div>
						@endif
						<table class="table table-bordered">
							<tr>
								<th>Payment Code</th><th>Payment Name</th><th>Transaction Fee</th><th>Action</th>
							</tr>
						
						@foreach($payment_gateways as $payment_gateway)
						<tr>
							<td>{{$payment_gateway->pg_code}}</td><td>{{$payment_gateway->pg_name}}</td><td>{{$payment_gateway->transaction_fee}}</td>
							<td>
								    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin.payment-gateway.edit', ['pg_code' => $payment_gateway->pg_code,'pg_name' => $payment_gateway->pg_name]) }}" data-original-title="" title="">
                                  <i class="material-icons">edit</i>
                                  <div class="ripple-container"></div>
                                </a>
							</td>
						</tr>
						@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection