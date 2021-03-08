@extends('layouts.bp_wo_sidenav')
@section('title', $language->NAMA.' Products')
@section('content')
<div class="content-wrapper language-list-content col-md-12" >
	<div class="row" style="height: 100%">
		<div class="container">
			<div class="row">
				@if(count($products))
				@foreach($products as $product)
				<div class="col-lg-6">
				<div class="product">
					<span class="product-title">{{$product->NAMA}}</span>
					<div class="row mt-3">
						@php
						$product_img = asset('/img/'.$language->KD.'/'.$product->KD.'.jpg');
						@endphp
						<div class="col-md-5 product-img" style="background-size:400px auto;height:auto;background-image: url('{{ file_exists($product_img) ? $product_img : asset('img/no-img.jpg') }}');">
						</div>
						<div class="col-md-7 product-desc">
							<p>
								{{$product->desc != "" ? $product->desc : "No Description"}}
							</p>
							<p><b>Location: </b> {{$product->locations}}</p>
							<div class="col-md-12" style="padding:0;">
								<a class="btn product-btn" href="{{url('products/'.$language->KD.'/'.$product->KD)}}">Read More</a>
							</div>
						</div>
					</div>
				</div>
				</div>
				@endforeach
				@else
				<div class="col-md-12" style="padding:80px 15px;margin-bottom: 60px;margin-top:12.5%">
					<div class="row justify-content-center">
						<div class="col-md-6">
							<img src="{{asset('img/not-found.png')}}" style="display: block;margin:0 auto;max-width: 80%;">
							<div>
								<h1 style="font-family:'truenoBd';text-align: center;">Whoops no result was found </h1>
							</div>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>

@stop
