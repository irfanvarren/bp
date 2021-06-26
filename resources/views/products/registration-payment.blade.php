@extends('layouts.bp_wo_sidenav')
@push('head-script')
<style type="text/css">
	.product-background{
		height:300px;
		background:url('{{asset('img/registration-background.png')}}');
		background-position: center;
		background-size: cover;
		background-repeat:no-repeat;
	}
	#price-table tr td,#price-table tr th{
		padding:10px 5px;
	}
	#price-table tr td:nth-child(2),#price-table tr td:nth-child(3){
		font-size:13px;
	}

	.price-summary{
		max-width:1000px;
		margin:0 auto;
		background:#F1F4F8;
		border:none;
		border-radius:30px;
	}

	
	.price-summary table tr td,.price-summary table tr th{
		border:none;
	}
	.price-summary table tr.fee td{
		border-bottom:1px solid #aaaaaa;
	}
	.price-summary table tr{
		position: relative;
	}
	.price-summary table #table-header-overlay{
		display: none;
		position: absolute;
		top:0;
		width: 100%;background: #178ceb;
		color:white;
		padding-right:10px;
	}
	.price-summary table #table-header-overlay td{
		display: block;
	}
	#check-all{
		border:2px solid white;
	}
	.cart-btn:hover{
		cursor: pointer;
	}
	.mobile-cart-action{
		display: none;
	}
	.circle-wrapper{
		width: 35%;
		margin:0 auto;
		white-space: nowrap;
	}
	.circle{
		margin:0 auto;
		position: relative;
		padding-top:60%;
		max-width: 60%;
		min-height: 50px;
		min-width: 50px;
		background:#aaa;
		border-radius:50%;
		font-size:1.65em;
		color:white;
	}
	.circle-icon{
		position: absolute;top:50%;line-height: 1;margin-top: -11px;width: 100%;text-align: center;
	}
	.circle-icon .fa-clock-o{
		font-size: 1.4em;
		line-height: 1;
		margin-top:-5px;
	}

	.payment-status.active .circle{
		background: #3F7360;
	}
	.payment-status{
		width: 100%;
	}
	.payment-status:hover{
		cursor: pointer;
	}
	.line-wrapper{
		display: block;
		position: absolute;
		top: 25%;
		width: 112.5%;
		right: 50%;
	}
	.line{
		width: 60%;
		height: 2px;
		background: #888;
		margin:0 auto;
	}
	.payment-status-header{
		position: relative;
		width: 100%;
	}
	.payment-status-text{
		width: 100%;
		font-size:20px;
		padding:15px 0;
	}
	.payment-btn{
		background: #156abf;
		border-radius:30px;
		border: none;
		padding:10px 20px;
	}
	#redirect-countdown{
		font-size:18px;
	}
	#payment-status{
		font-size:20px;
		font-weight: bold;
		line-height: 1;
	}
	@keyframes blink {50% { color: transparent }}
	.loader__dot { animation: 1.5s blink infinite }
	.loader__dot:nth-child(2) { animation-delay: 375ms }
	.loader__dot:nth-child(3) { animation-delay: 750ms }


	/*registration styles*/

	.inline-wrapper{
		position:absolute;top:0;left:0;width: 100%;z-index: 2;
		display: flex;
	}

	.inline {
		display: inline-block;
		width: 19.75%;
		margin: 0 auto;
		background:#f2f2f2;

	}
	.inline:hover{
		cursor: pointer;
	}
	.inline.active{
		background:#00B4D8;
		color:white;
	}

	.wrap {
		display: table;
		table-layout: fixed;
		word-wrap: break-word;
		font-size:0.9em;
		height:  66px;
		width:   100%;

	}
	.wrap p {
		font-size: 1em;
		display:        table-cell;
		vertical-align: middle;
		text-align: center;
	}
	
	.calendar-code-wrapper{
		margin-right:25px;
	}
	.calendar-code-color{
		padding:0px 8px;
		border:1px solid #dedede;
	}
	.calendar-code-color.selected{
		background: #2480bd;
	}
	.calendar-code-color.available{
		background: #e6e6e6;
	}


	@media screen and (min-width:1366px){
		.product-background{
			height: 350px;
		}
	}
	@media screen and (max-width:860px){
		.product-background{
			height:200px;
		}
		.wrap{
			font-size:1.1em;
		}
	}
	@media screen and (max-width:480px){
		.product-background{
			height:200px;
			background-size: cover;

		}
		.inline{
			width:50% !important;
			border:1px solid #dadada;
		}
		.inline:last-child{
			width: 100% !important;
		}
		.wrap{
			font-size:1em;
		}
		.wrap p {
			font-size: 0.9em;
		}
	}
	@media screen and (max-width: 990px){
		.inline{
			display: block;
			width:33.333333%;
			float:left;
		}
		.inline-wrapper{
			display: block;
			position:relative;
		}
	}
	@media screen and (min-width: 990px){
		.inline-wrapper{
			margin-top:-65px;
		}

	}
	.tab-wrapper{
		display: none;
	}
	.tab-wrapper.show{
		display: block;
	}

	.parsley-errors-list{
		padding:0 15px;
		color:red;
	}
	.selectize-control .parsley-errors-list{
		display: none;
	}
	
	.summary-label{
		width:27.5%;float:left;overflow:hidden;text-overflow: ellipsis;white-space: nowrap;line-height: 40px;
	}
	.summary-value{
		background: #F1F4F8;border-radius:10px;padding:15px 10px;margin-left:30%;line-height: 40px;height: 40px;
		padding:0 15px;
	}
	.payment-tab{
		min-height:300px;
	}
	.price-summary .address{
		text-align:right;
	}
	.price-summary .address > div{
		max-width: 200px;
		float: right;
	}

	/*registration styles*/

	@media screen and (min-width:1366px){
		.product-background{
			height: 350px;
		}
	}


	@media screen and (max-width:768px){
		.product-background{
			height:200px;
		}
		.text-header{
			display: none;
		}
		.payment-status-text{
			font-size:18px;
		}
	}
	@media screen and (max-width:576px){
		.product-background{
			height:200px;
			background-size: cover;
		}
		.payment-status-text{
			font-size:16px;
		}
		.line-wrapper{
			display: none;
		}
		.circle-wrapper{
			white-space:normal;
			width: 100%;
		}
		.price-summary .address{
			text-align: left;
			word-break: break-all;
		}
		.price-summary .address > div{
			max-width:100%;
			float: none;
		}
		.price-summary table tr{
			display: block;
		}
		#price-table thead{
			display: none;
		}
		#price-table tbody tr td:first-child{
			display: none;
		}
		#price-table tbody tr td{
			display: block;
			float:right;
			width: 100%;
			padding-left:30%;
			text-align: right;
			border:none;
		}
		#price-table tbody tr td:last-child{
			border-bottom:1px solid #bebebe;
		}
		#price-table tbody tr td:before{
			display: block;
			width: 50%;
			position: absolute;
			left: 0;
			text-align: left;
		}

		#price-table tbody tr td:nth-child(2):before{
			content:"Kode";
		}
		#price-table tbody tr td:nth-child(3):before{
			content:"Deskripsi";
		}
		#price-table tbody tr td:nth-child(4):before{
			content:"Jumlah";
		}
		#price-table tbody tr td:nth-child(5):before{
			content:"Harga";
		}
		.mobile-cart-action{
			display: block;
		}
	}

	@media screen and (max-width:420px){
		.payment-status-text{
			font-size:13px;
		}
	}
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


<div class="col-md-12 content-wrapper" id="app" style="padding:0 15px;">

	<div class="loading-wrapper">
		<img src="{{asset('/img/loading.gif')}}" alt="">
	</div>

	<div class="row">
		<div class="col-md-12 product-background">

			@if(session()->has('message'))
			<div class="alert alert-success" style="text-align:center;margin-top:15px;">
				{!! session()->get('message') !!} <br>

				<button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
			</div>
			@endif

			<div class="col-md-12 text-header" style="text-align:center;color:black;font-weight: bold;margin-top:15px;padding:50px 50px 70px 50px;">

				<h2>Form Pendaftaran / Registration Form </h2>
				<div>Info Lebih lanjut dapat menghubungi no WA di bawah ini:
					<ul class="p-0 dash-list">
						@foreach(config('constants.marketing') as $marketing)
						<li>{{$marketing['no_telepon']}} ({{$marketing['nama']}})</li>
						@endforeach
					</ul>
				</div>
			</div>

		</div>
	</div>
	@if($cart_data != "")
	<div class="row justify-content-center" id="invoice-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12 py-4">
					<div class="row justify-content-center">
						@php
						$col_count = 3;
						if($offer_letter_settings == "false"){
						$col_count = 4;
					}

					@endphp

					<div class="col-{{$col_count}}">
						<div class="payment-status {{$cart_data->current_process == 0 ? 'active' : ''}}">
							<div class="payment-status-header">
								<div class="circle-wrapper">
									<div class="circle">
										<div class="circle-icon">
											<i class="fa fa-usd" ></i>
										</div>
									</div>
								</div>
								<div class="text-center payment-status-text">
									Transaction Detail
								</div>
							</div>
						</div>	
					</div>
					<div class="col-{{$col_count}}">
						<div class="payment-status {{$cart_data->current_process == 1 ? 'active' : ''}}">
							<div class="payment-status-header">
								<div class="circle-wrapper">
									<div class="line-wrapper">
										<div class="line"></div>
									</div>
									<div class="circle">
										<div class="circle-icon">
											<i class="fa fa-database" ></i>
										</div>
									</div>

								</div>
								<div class="text-center payment-status-text">
									Registration Data
								</div>
							</div>


						</div>	
					</div>
					@if($offer_letter_settings != "false")
					<div class="col-{{$col_count}}">
						<div class="payment-status {{$cart_data->current_process == 2 ? 'active' : ''}}" >
							<div class="payment-status-header">
								<div class="circle-wrapper">
									<div class="line-wrapper">
										<div class="line"></div>
									</div>

									<div class="circle">
										<div class="circle-icon">
											<i class="fa fa-file-text" aria-hidden="true"></i>

										</div>
									</div>

								</div>
								<div class="text-center payment-status-text">
									Letter of Offer
								</div>
							</div>


						</div>	
					</div>
					@endif
					<div class="col-{{$col_count}}">
						<div class="payment-status {{$cart_data->current_process == 3 ? 'active' : ''}}" >
							<div class="payment-status-header">
								<div class="circle-wrapper">
									<div class="line-wrapper">
										<div class="line"></div>
									</div>

									<div class="circle">
										<div class="circle-icon">
											<i class="fa fa-clock-o" ></i>
										</div>
									</div>

								</div>
								<div class="text-center payment-status-text">
									Waiting for Payment
								</div>
							</div>


						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	@yield('registration-payment-content')
</div>
@elseif(isset($data_reseller))

<div class="row justify-content-center" id="invoice-wrapper">
	@if(!$data_reseller['cek_exist'])
	<div class="container">
		<div class="row">
			<div class="col-md-12 py-4">
				<div class="row justify-content-center">
					@php
					$col_count = 4;
					@endphp

					<div class="col-{{$col_count}}">
						<div class="payment-status {{$data_reseller['current_process'] == 0 ? 'active' : ''}}">
							<div class="payment-status-header">
								<div class="circle-wrapper">
									<div class="circle">
										<div class="circle-icon">
											<i class="fa fa-usd" ></i>
										</div>
									</div>
								</div>
								<div class="text-center payment-status-text">
									Product Detail
								</div>
							</div>
						</div>	
					</div>
					<div class="col-{{$col_count}}">
						<div class="payment-status {{$data_reseller['current_process'] == 1 ? 'active' : ''}}">
							<div class="payment-status-header">
								<div class="circle-wrapper">
									<div class="line-wrapper">
										<div class="line"></div>
									</div>
									<div class="circle">
										<div class="circle-icon">
											<i class="fa fa-database" ></i>
										</div>
									</div>

								</div>
								<div class="text-center payment-status-text">
									Registration Data
								</div>
							</div>


						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
	@yield('registration-payment-content')
</div>

@else
<div class="col-md-12 text-center">
	<div style="margin:100px 0;">
		<img src="{{asset('img/products/empty_cart.png')}}" style="max-width: 80%;">
		<div class="text-center">
			<a class="btn btn-primary" href="{{url('products')}}">Back to products</a>
		</div>
	</div>
</div>

@endif
</div>
@endsection

@push('more-script')
<script type="text/javascript">
	var token = $("input[name='_token']").val();
	function formatRupiah(angka, prefix) {

		//var number_string = angka.replace(/[^,\d]/g, '').toString();

		var number_string = angka.toString();
		var split = number_string.split('.');
		var sisa = split[0].length % 3;
		var rupiah = split[0].substr(0, sisa);
		var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah + ',00';
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
</script>
@endpush