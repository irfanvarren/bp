@extends('layouts.bp-new')
@push('head-script')
<style type="text/css">
	
</style>
@endpush
@section('title', ucwords($title))
@section('content')
<div class="martop8 container-fluid">
	<div class="row">
		<div class="col-sm-6 pr-5 pl-5">
			<img src="{{$news[0]->image != '' ? Storage::disk('news')->url($news[0]->image) : ''}}" width="100%">
		</div>
		<div class="col-sm-6 pr-5 pl-5 pt-4 ">
			<input type="text" placeholder="Cari Artikel, Penulis, dan lainnya" style="width:100%;" class="boxround-5 pl-2">
			<button style="position:absolute;right:50px;background-color:rgba(0,0,0,0);border-style: none;"><i class="fa fa-search"></i></button>
			<h3 class="martop3">{{$news[0]->title}}</h3>
			<p>
					{!! str_limit(strip_tags($news[0]->body),252,$end = "...") !!}
			</p>
			<a href="{{url("media/news/".date("Y/m",strtotime($news[0]->created_at)).'/'.$news[0]->slug)}}">See More</a>
		</div>
		<div class="col-sm-12">
			<hr>
		</div>
		<div class="col-lg-12">
		<div class="row px-5 py-4">
			@foreach($news->splice(1,3) as $data_news)
			
			<div class="col-md-4">
				<div style="height: 330px;display: flex;vertical-align: middle">
				<img src="{{$data_news->image != '' ? Storage::disk('news')->url($data_news->image) : ''}}" style="max-width: 100%;max-height: 330px;margin:0 auto;display: block;">
				</div>
				<h2>{{$data_news->title}}</h2>
				<a href="{{url("media/news/".date("Y/m",strtotime($data_news->created_at)).'/'.$data_news->slug)}}">See More</a>
			</div>
			@endforeach
			
		</div>
		</div>
		<div class="col-sm-12">
			<h2 class="ml-3 px-3"><b>Latest News</b></h2>
			<hr>
		</div>
		<div class="row p-4">
			@foreach($news as $data_news)
			<div class="col-sm-6 pr-5 pl-5 pt-4 ">
				<h3 class="martop3">{{$data_news->title}}</h3>
				<p>
					{!! str_limit(strip_tags($data_news->body),252,$end = "...") !!}
				</p>
				<a href="{{url("media/news/".date("Y/m",strtotime($data_news->created_at)).'/'.$data_news->slug)}}">See More</a>
			</div>
			<div class="col-sm-6 pr-5 pl-5 pt-3" style="height: 350px;overflow: hidden;">
				<img src="{{$data_news->image != '' ? Storage::disk('news')->url($data_news->image) : ''}}" style="display: block;margin:0 auto;max-height: 100%;max-width: 100%">
			</div>
			@endforeach
		</div>
	</div>
</div>
@stop

@push('more-script')
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