@extends('layouts.bp-new')
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

<div class="container-fluit row p-5 martop8">
			<div class="col-sm-7 p-5">
				<h1 class="w3-jumbo"><b>Lorem Ipsum is simply</b></h1>
				<p class="w3-xlarge">
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</p>
			</div>
			<div class="col-sm-5">
				<img src="{{asset('/img/products/index.png')}}">
			</div>
		</div>
		<div class="container row" style="margin:auto">
			@foreach($languages as $language)
			<a class="col-sm-4 p-3 w3-hover-opacity" href="{{url('products/'.$language->KD)}}" style="cursor:pointer;">
				<img src="{{asset('img/language/'.strtolower($language->NAMA).'.png')}}" width="100%" class="boxround-10" style="max-height: 290px">
				<div class="boxround-10" style="margin-top:-50px;position:absolute;z-index:2;background-color:#0077B6;width:91.5%;">
					<center style="color:white;"><h2 style="width:100%;"><b>{{$language->NAMA}}</b></h2></center>
				</div>
			</a>
			@endforeach
			
		</div>
@stop
@push('more-script')
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="css/slick-1.8.1/slick/slick.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			$('.a').slick({
				infinite: false,
				slidesToScroll: 1,
				slidesToShow: 1,
				rows: 1,
				autoplay: true,
				autoplaySpeed: 2500,
				arrows: true,
				prevArrow: '<button class="slide-arrow prev-arrow"></button>',
				nextArrow: '<button class="slide-arrow next-arrow"></button>',
				
			});
			$('.b').slick({
				infinite: false,
				slidesToScroll: 2,
				slidesToShow: 4,
				rows: 1,
				autoplay: true,
				autoplaySpeed: 2500,
				arrows: false,
				prevArrow: '<button class="slide-arrow prev-arrow"></button>',
				nextArrow: '<button class="slide-arrow next-arrow"></button>',
				responsive: [{
					breakpoint: 1280,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				},
				{
					breakpoint: 1080,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 2,
						infinite: true,
					}
				},
				{
				breakpoint: 745,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						arrows: false,
					}
				}
				]
				});
			$('.c').slick({
				infinite: false,
				slidesToScroll: 2,
				slidesToShow: 6,
				rows: 1,
				autoplay: true,
				autoplaySpeed: 2500,
				arrows: false,
				prevArrow: '<button class="slide-arrow prev-arrow"></button>',
				nextArrow: '<button class="slide-arrow next-arrow"></button>',
				responsive: [{
					breakpoint: 1280,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				},
				{
					breakpoint: 1080,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 2,
						infinite: true,
					}
				},
				{
				breakpoint: 745,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						arrows: false,
					}
				}
				]
				});
			$('.d').slick({
				infinite: false,
				slidesToScroll: 1,
				slidesToShow: 3,
				rows: 1,
				autoplay: true,
				autoplaySpeed: 2500,
				arrows: false,
				prevArrow: '<button class="slide-arrow prev-arrow"></button>',
				nextArrow: '<button class="slide-arrow next-arrow"></button>',
				responsive: [{
					breakpoint: 1280,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				},
				{
					breakpoint: 1080,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 2,
						infinite: true,
					}
				},
				{
				breakpoint: 745,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						arrows: false,
					}
				}
				]
				});
			
			});
		</script>
@endpush
