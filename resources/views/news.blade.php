@extends('layouts.bp_wo_sidenav')
<style media="screen">
	.news{
		margin:20px 0;
	}
	.news-tags::before{
		content:'# ';
	}
	.media-news ol, .media-news ul{
		list-style-position: inside;
	}
	.media-news .img-wrap{
		width: 100%;
		background:white;
		height: 200px;
		margin-bottom: 15px;
		padding: 0;
		overflow: hidden;
		display:flex;
		flex-direction:column;
		justify-content:center;
	}
	.media-news .img-wrap img{
		margin:auto;
	}
	
	/** Custom Select **/
	.custom-select-wrapper {
		position: relative;
		display: inline-block;
		user-select: none;
		cursor: pointer;
		height: 80px;
		width: 100%;
	}
	.custom-select-wrapper select {
		display: none;
	}
	.news-select {
		position: relative;
		display: inline-block;
		width: 100%;
		font: 13px/1.5 "Roboto", sans-serif;
	}
	.custom-select-trigger {
		position: relative;
		display: block;
		min-width: 130px;
		/*padding: 0 104px 0 25px;*/
		width: 100%;
		font-weight: 100;
		color: #6e7c83;
		background-color: #ffffff;
		border-radius: 3px;
		cursor: pointer;
		transition: all 0.2s ease-in-out;
		height:100%;
	}

	.custom-select-trigger:hover {
		-webkit-box-shadow: 0px 10px 50px 0px rgba(43, 111, 246, 0.1);
		box-shadow: 0px 10px 50px 0px rgba(43, 111, 246, 0.1);
	}
	.custom-select-trigger:before {
		position: absolute;
		display: none;
		content: "";
		width: 1px;
		height: 100%;
		top: 3px;
		right: 50px;
		margin-top: -3px;
		border-right: 1px solid #c7d1d6;
		transition: all 0.35s ease-out;
		transform-origin: 50% 0;
	}
	.custom-select-trigger:after {
		position: absolute;
		display: block;
		content: "";
		width: 10px;
		height: 10px;
		top: 50%;
		right: 20px;
		margin-top: -3px;
		border-bottom: 1px solid #c7d1d6;
		border-right: 1px solid #c7d1d6;
		transform: rotate(45deg) translateY(-50%);
		transition: all 0.35s ease-out;
		transform-origin: 50% 0;
	}
	.news-select.opened .custom-select-trigger:after {
		margin-top: 3px;
		transform: rotate(-135deg) translateY(-50%);
	}
	.custom-options {
		position: absolute;
		display: block;
		top: 100%;
		left: 0%;
		right: 0;
		width: 100%;
		z-index:99999;
		margin: 10px 0;
		border-radius: 5px;
		box-sizing: border-box;
		/*  box-shadow: 0 2px 1px rgba(0, 0, 0, .1); */

		background: #fff;
		transition: all 0.2s ease-in-out;

		opacity: 0;
		visibility: hidden;
		pointer-events: none;
		transform: translateY(-15px);
		border: 0;
	}
	.news-select.opened .custom-options {
		opacity: 1;
		visibility: visible;
		pointer-events: all;
		transform: translateY(-8px);

		-webkit-box-shadow: 0px 10px 50px 0px rgba(43, 111, 246, 0.1);
		box-shadow: 0px 10px 50px 0px rgba(43, 111, 246, 0.1);
	}
	.option-hover:before {
		background: #f9f9f9;
	}
	.custom-option {
		position: relative;
		display: block;
		padding: 0 22px;
		font: 13px/1.5 "Roboto", sans-serif;
		font-weight: 600;
		color: #b5b5b5;
		line-height: 47px;
		cursor: pointer;
		transition: all 0.05s ease-in-out;
	}
	.custom-option:first-of-type {
		border-radius: 4px 4px 0 0;

		border-top-right-radius: 5px;
		border-top-left-radius: 5px;
	}
	.custom-option:last-of-type {
		border-bottom: 0;
		border-radius: 0 0 4px 4px;
		border-bottom-right-radius: 5px;
		border-bottom-left-radius: 5px;
	}
	.custom-option:hover,
	.custom-option.selection {
		color: #fff;
		background-color: #49e2bb;
	}

	.news-select{
		height:80px;
	}


	@media screen and (max-width:768px){
		.custom-select-trigger .align-middle{
			border-left:1px solid #ddd !important;
		}

	}



	/*#fh5co-board .item {
  margin: 10px 10px 20px 10px;
  background: #fff;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  -ms-border-radius: 4px;
  border-radius: 4px;
  overflow: hidden;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07);
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07);
  }*/
</style>
@section('title', ucwords($title))
@section('content')

<div class="content-wrapper media-news col-md-12">
	<div class="row">
		<div class="col-md-12" style="max-height:540px;overflow: hidden;padding:0;">
			<img src="{{asset('img/news.jpg')}}" style="width: 100%;">
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-9 news-search-wrapper">
			<form class="" id="myform" name="myform" action="{{url('media/news')}}" enctype="multipart/form-data" method="get">
				@csrf
				

				<div class="row">
					<div class="search-input">
						<div class="row">
							<input type="text" name="q" class="form-control" placeholder="Cari Artikel, Penulis, dan Lainnya" style="height:80px;border-radius: 0;border:none;border:1px solid #ddd" value="{{request('q')}}" name="">
						</div>
					</div>
					<div class="search-category">
						<div class="row">
							<select name="category" style="width:100%;height:80px;border-radius:0;border:none;text-align:center;float: left;z-index: 1;" class="news-select" placeholder="Kategori" value="@if(request('category') != ''){{request('category')}}@elseif(isset($category))@if($category != '' && request('category') == ''){{$category}}@endif @endif">
								<option value="1">News</option>
								{{--
									@foreach($news_types as $news_type)
									<option value="{{$news_type->id}}" @if($news_type->id == request('category')){{'selected'}}@elseif(isset($category)) @if($news_type->id == $category) {{'selected'}}@endif @endif>{{$news_type->name}}</option>
									@endforeach
									--}}
								</select>

							</div>
						</div>
						<div class="search-btn">
							<div class="row">
								<button style="width: 100%;height: 80px;border-radius:0;border:none;background:#2b61b3;border:1px solid #ddd;color:white;font-size:36px;outline:none;" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>
								</button>		
							</div>		
						</div>
					</div>
					<div class="row">

						<div class="col-md-12" style="padding:0;font-size:18px;font-weight: bold">
							Ketikkan # untuk mencari dengan tag (contoh : #ielts). Hanya bisa 1 tag.
						</div>

					</div>
				</form>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12" style="padding:0 30px;">

				<div class="row">
					@if (!empty($recent_news) || $recent_news != null)

@if($news->count())

@foreach($news as $data_news)
@php
if($data_news->type_id == 1){
$link = "news";
}else{
$link = "info-lowker";
}
@endphp
<a style="color:black;border-radius:30px;" target="_blank" class="news-link col-md-6 col-lg-4" href="{{url("media/".$link."/".date("Y/m",strtotime($data_news->created_at)).'/'.$data_news->slug)}}">


	<div class="news" style="padding:0 20px;">
		<div class="col-md-12 news-border">
			<div class="img-wrap">
					@if($data_news->image != "")
						<div style="background:white;width: 100%;height:100%;display:inline-flex;">
						<img src="{{ Storage::disk('news')->url($data_news->image) }}">
			            </div>
						@else
						<div style="background:white;width: 100%;height:100%;">
						<img src="{{ asset('img/no-img.jpg') }}" style="height:100%;width:auto;display: block;margin:0 auto;">
							</div>
						@endif
			</div>
			<div class="col-md-12 news-bottom">
				<div class="row">
				<div class="col-md-12 news-info">
					<ul class="col-md-12">
						<li><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{{date("l, d M Y",strtotime($data_news->created_at))}}</li>
					</ul>
				</div>
				<h5 class="col-md-12 "> 
					<div class="news-title">
						<span style="line-height:1.7rem;max-height:3.4rem">{{$data_news->title}}</span>
					</div> 
				</h5>
				<div class="col-md-12 news-desc">
					<p>{!! str_limit(strip_tags($data_news->body),300,$end = "...") !!}</p>
				</div>
				</div>
			</div>
		</div>
	</div>
</a>

@endforeach
</div>
<div class="col-md-12" style="overflow: auto;margin:20px 0;font-size:16px;">
	<div class="row justify-content-center">
		{{$news->links('news-pagination')}}
	</div>
</div>

@else

<div class="col-md-12" style="padding:80px 15px;margin-bottom: 60px;">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<img src="{{asset('img/not-found.png')}}" style="display: block;margin:0 auto;max-width: 80%;">
			<div>
				<h1 style="font-family:'truenoBd';text-align: center;margin-top:30px;">Whoops, No Result With Keyword "{{request('q')}}"</h1>
			</div>
		</div>
	</div>
</div>

@endif
@else


<div class="col-md-12" style="padding:80px 15px;margin-bottom: 60px;">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<img src="{{asset('img/not-found.png')}}" style="display: block;margin:0 auto;max-width: 80%;">
			<div>
				<h2 style="font-family:'truenoBd';text-align: center;margin-top:30px;">	No {{$title}}</h2>

			</div>
		</div>
	</div>
</div>

@endif
</div>
</div>
</div>
<script type="text/javascript">
	var x = 0;

	function see_more_news() {

		$(".news-headline").toggleClass("open");
		if (x == 0) {
			$(".see-more-news").html("<i class='fa fa-minus'></i>");
			x = 1;
		} else if (x == 1) {

			$(".see-more-news").html("<i class='fa fa-plus'></i>");
			x = 0;
		}
	}

	(function() {
		function logElementEvent(eventName, element) {
			console.log(
				Date.now(),
				eventName,
				element.getAttribute("data-src")
				);
		}
		var callback_enter = function(element) {
			logElementEvent("🔑 ENTERED", element);
		};
		var callback_exit = function(element) {
			logElementEvent("🚪 EXITED", element);
		};
		var callback_reveal = function(element) {
			logElementEvent("👁️ REVEALED", element);
		};
		var callback_loaded = function(element) {
			logElementEvent("👍 LOADED", element);
		};
		var callback_error = function(element) {
			logElementEvent("💀 ERROR", element);
			element.src =
			"https://via.placeholder.com/440x560/?text=Error+Placeholder";
		};
		var callback_finish = function() {
			logElementEvent("✔️ FINISHED", document.documentElement);
		};
		var ll = new LazyLoad({
			elements_selector: ".lazy",
			// Assign the callbacks defined above
			callback_enter: callback_enter,
			callback_exit: callback_exit,
			callback_reveal: callback_reveal,
			callback_loaded: callback_loaded,
			callback_error: callback_error,
			callback_finish: callback_finish
		});
	})();


	$(".news-select").each(function() {
		var classes = $(this).attr("class"),
		id = $(this).attr("id"),
		name = $(this).attr("name"),
		value = $(this).attr("value"),
		placeholder = $(this).attr('placeholder');
		;
		if(value != ""){
			if($(this).find("option[value="+value+"]").length){
				placeholder = $(this).find("option[value="+value+"]").text();

			}
		}
		var template = '<div class="' + classes + '">';
		template +=
		'<span class="custom-select-trigger">' +
		'<div class="align-middle" style="display:inline-block;height:100%;width: 100%;padding: 30px 10px;border:1px solid #ddd;border-left:none;">'+
		placeholder +
		'</div>'+
		"</span>";
		template += '<div class="custom-options">';
		$(this)
		.find("option")
		.each(function() {
			template +=
			'<span class="custom-option ' +
			$(this).attr("class") +
			'" data-value="' +
			$(this).attr("value") +
			'">' +
			$(this).html() +
			"</span>";
		});
		template += "</div></div>";

		$(this).wrap('<div class="custom-select-wrapper"></div>');
		$(this).hide();
		$(this).after(template);
	});
	$(".custom-option:first-of-type").hover(
		function() {
			$(this)
			.parents(".custom-options")
			.addClass("option-hover");
		},
		function() {
			$(this)
			.parents(".custom-options")
			.removeClass("option-hover");
		}
		);
	$(".custom-select-trigger").on("click", function() {
		$("html").one("click", function() {
			$(".news-select").removeClass("opened");
		});
		$(this)
		.parents(".news-select")
		.toggleClass("opened");
		event.stopPropagation();
	});
	$(".custom-option").on("click", function() {
		$(this)
		.parents(".custom-select-wrapper")
		.find("select")
		.val($(this).data("value"));
		$(this)
		.parents(".custom-options")
		.find(".custom-option")
		.removeClass("selection");
		$(this).addClass("selection");
		$(this)
		.parents(".news-select")
		.removeClass("opened");
		$(this)
		.parents(".news-select")
		.find(".custom-select-trigger div")
		.text($(this).text());
	});

</script>

@stop
