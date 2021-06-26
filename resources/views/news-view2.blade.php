@extends('layouts.bp_news')
<style media="screen">
	.news-article{
		box-shadow:0px 0px 3px #555;
		background:white;
		padding:30px 50px !important;
	}
	.news-article-wrapper{
		padding:40px 15px;
		max-width:87.5%;
		flex: 0 0 87.5%;
	}
	.news-tags:before{
		content:'# ';
	}


	@media screen and (max-width:480px){


	}
</style>
@section('news-title',implode(' ',array_map("ucfirst",explode('-',$news->slug))))
@section('news-image')
{{Storage::disk('news')->url($news->image)}}
@endsection
@section('news-desc')
{!!	str_limit(strip_tags($news->body),100,$end = "...")!!}
@endsection
@section('title',implode(' ',array_map("ucfirst",explode('-',$news->slug))))
@section('content')
<div class="col-md-12 content-wrapper ">
	<div class="row justify-content-center">
		<div class="col-md-11">
			<div class="row news-article">

				<div class="col-md-12">

					<h1>{{ucwords($news->title)}}</h1>
					<div>{{date("l, d F Y",strtotime($news->created_at))}}</div>
					<br>
				</div>
				<div class="col-md-12" style="margin-bottom:1rem;">
					<button class="btn btn-primary"> Share </button>

				</div>


				<div class="col-md-12" style="overflow:auto">


					<img style="width:400px;max-height:500px;padding-left:15px;float:right;display:block;" src="{{Storage::disk('news')->url($news->image)}}" alt="">

					{!!$news->body!!}
				</div>
				<div class="col-md-12">
					@foreach ($this_tags as $tag)
					<a class="news-tags" href="{{url('media/news/tags/'.$tag)}}">{{$tag}}</a>
					@endforeach
				</div>
			</div>
			<div class="row" style="margin-top:15px;">
				<div class="col-md-12" style="padding:15px 0 !important;">
		<h3>Newest News</h3>
					
				</div>
		<div class="row">
			@foreach($new_news as $key => $value)

			<div class="col-md-3">
				<a href="{{url('media/news/'.date('Y/m',strtotime($value->created_at)).'/'.$value->slug)}}" style="display: block;">
					<div class="col-md-12" style="box-shadow: 0 0 5px rgba(0,0,0,0.3)">

						<div class="row">
							<div style="width:100%;height:150px;overflow:hidden;">
								<img src="{{Storage::disk('news')->url($value->image)}}" style="width:100%;">                		
							</div>
							<div class="col-md-12" style="padding:15px;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">
								<div style="line-height:1.8em;max-height:3.6em;overflow: hidden;">
							{{$value->title}}
							</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			@endforeach
		</div>
		</div>
		</div>
		
	</div>
</div>
<!--<div class="col-md-8 content-wrapper news-article">
	<div class="col-md-12">
		<div class="row">

			<div class="col-md-12">

				<h1>{{ucwords($news->title)}}</h1>
				<div>{{date("l, d F Y",strtotime($news->created_at))}}</div>
				<br>
			</div>
			<div class="col-md-12" style="margin-bottom:1rem;">
				<button class="btn btn-primary"> Share </button>

			</div>
			<div class="col-md-12">
				<img style="width:100%;height:auto;" src="{{Storage::disk('news')->url($news->image)}}" alt="">
			</div>

			<div class="col-md-12" style="overflow:auto">
				<br>
				{!!$news->body!!}
			</div>
			<div class="col-md-12">
				@foreach ($this_tags as $tag)
				<a class="news-tags" href="{{url('media/news/tags/'.$tag)}}">{{$tag}}</a>
				@endforeach
			</div>
		</div>

	</div>
</div>-->
@section('more-script')

@endsection
@stop
