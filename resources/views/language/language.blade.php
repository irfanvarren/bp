@extends('layouts.bp_wo_sidenav')
@section('title', 'About Us')
@section('content')
<!--
<div class="content-header col-md-12" style="background-image:url('/img/bp_services.jpg');">
	<h1>Our Services</h1>
</div>
-->
<div class="content-wrapper language-list-content col-md-12" >

	<div class="col-md-12 products-wrapper">
		<div class="row">
		<a href="/products/language/english"  class="col-md-4">
		<div>
			<div class="col-md-12 product">
				<div class="col-md-12 product-top" style="background-image: url('{{asset('/img/language/english.jpg')}}')">
					<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 30%;"></div>

				</div>
				<div class="col-md-12 product-bottom">
					<h1>English</h1>
				</div>

			</div>
		</div>
		</a>
		<a href="/products/language"  class="col-md-4">
		<div>
			<div class="col-md-12 product">
				<div class="col-md-12 product-top" style="background-image: url('{{asset('/img/language/mandarin.jpg')}}')">
					<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 30%;"></div>

				</div>
				<div class="col-md-12 product-bottom">
					<h1>Mandarin</h1>
				</div>

			</div>
		</div>
		</a>
		<a href="/products/language"  class="col-md-4">
		<div>
			<div class="col-md-12 product">
				<div class="col-md-12 product-top" style="background-image: url('{{asset('/img/language/french.jpg')}}')">
					<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 30%;"></div>
				</div>
				<div class="col-md-12 product-bottom">
					<h1>French</h1>
				</div>

			</div>
		</div>
		</a>
		<a href="/products/language"  class="col-md-4">
		<div>
			<div class="col-md-12 product">
				<div class="col-md-12 product-top" style="background-image: url('{{asset('/img/language/german.jpg')}}')">
					<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 30%;"></div>
				</div>
				<div class="col-md-12 product-bottom">
					<h1>German</h1>
				</div>

			</div>
		</div>
		</a>
		<a href="/products/language"  class="col-md-4">
		<div>
			<div class="col-md-12 product">
				<div class="col-md-12 product-top" style="background-image: url('{{asset('/img/language/korean.jpeg')}}')">
					<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 30%;"></div>
				</div>
				<div class="col-md-12 product-bottom">
					<h1>Korean</h1>
				</div>

			</div>
		</div>
		</a>
		<a href="/products/language"  class="col-md-4">
		<div>
			<div class="col-md-12 product">
				<div class="col-md-12 product-top" style="background-image: url('{{asset('/img/language/japan.jpg')}}')">
					<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 30%;"></div>
				</div>
				<div class="col-md-12 product-bottom">
					<h1>Japanese</h1>
				</div>

			</div>
		</div>
		</a>
	</div>
	</div>
</div>

@stop
