@extends('layouts.bp_wo_sidenav')
@section('title', 'Products')
@push('head-script')
<style type="text/css">
	.product-search-wrapper{
		padding:50px 15px;
	}
	@media screen and (max-width: 576px){
		.product-search-wrapper{
			padding:30px 45px;
		}
	}
</style>
@endpush
@section('content')
<div class="content-wrapper col-md-12 pt-0">
	<div class="row">
		<div class="col-md-12 p-0">
			<div class="language-wrapper">
				@foreach($languages as $language)
				<a href="{{url('products/'.$language->KD)}}" class="language">
					<img src="{{asset('img/language/icons/'.$language->KD.'.png')}}" class="flag">
					<h5 class="d-inline" class="text">{{$language->NAMA}}</h5>
				</a>
				@endforeach
			</div>
			@if(session('error'))
			<div class="alert alert-danger mt-3">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<i class="fa fa-close"></i>
				</button>
				<span>{{ session('error') }}</span>
			</div>
			@endif
		</div>
		<!--
		<div class="col-md-12 product-search-wrapper">
			<div class="row">
				<div class="container">
					<div class="row">
						<input type="text" class="form-control" name="" placeholder="Masukkan Nama Produk / Kode Produk" style="display: flex;flex-grow: 1;width: auto;"> <button class="btn btn-primary" style="width: 20%;border-radius: 0;">Search</button>
					</div>
				</div>
			</div>
		</div>
	-->
		<div class="col-md-12 pt-5 px-5" >
			<div class="row">
				@foreach($products as $product)
				<div class="col-12 col-sm-6 col-lg-4 col-xl-3 py-3 text-center">
					<a  href="{{url('products/'.$product->REF_BAHASA.'/'.$product->KD)}}" style="box-shadow: 0 0 10px #e8e8e8;display: block;">
						<div style="display: table;height: 100px;width: 100%;">
						
							<span style="vertical-align:middle;display: table-cell;height:100%;color:black;width: 100%;font-size:1.2em;">
								{{$product->NAMA}}
							</span>
						</div>
						<div class="text-left p-2 px-3" style="border-top:1px solid #dedede;">
							Language : {{$product->REF_BAHASA}}
						</div>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@stop
