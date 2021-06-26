@extends('layouts.bp-new')
<style type="text/css">
	.news-body ul,.news-body ol{
		padding-left:2rem;
	}
	.views-counter{
		margin-top:15px;
		font-size:16px;
	}
	.views-counter span{
		font-size:20px;
		margin-right:10px;
	}
	table[cellpadding]:not([celpadding="0"]) tr td{
		padding:15px;
	}
	table{
		display: block;
		height:auto !important;
		overflow-x:auto;
		overflow-y:hidden;
	}
	@media screen and (max-width:580px){
		.views-counter{
			display: none;
		}
		#main{
			padding:30px 20px !important;
		}
	}
	ul  {
		list-style: disc inside url("{{asset('/img/news/list.png')}}");
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






<div class="martop5 container-fluid">
	<div class="row">
		<div class="col-sm-8 pr-5 pl-5">
			<h1 >{{ucwords($news->title)}}</h1>
			<div>@if($news->author_name != ""){{$news->author_name}} | @endif {{date("l, d F Y",strtotime($news->created_at))}}</div> 
			<div class="views-counter">
				<span class="fa fa-eye"></span> {{$news->views}}
			</div>
			<img src="{{Storage::disk('news')->url($news->image)}}" class="martop3">
			@if($news->image_desc != "")
			<div class="col-md-12">{{$news->image_desc}}
			</div>
			@endif
			<p class="martop3">
				{!!$news->body!!}
			</p>
			@php
			if($news->type_id == 1){
			$link = "news";
		}else{
		$link = "info-lowker";
	}
	@endphp
	@foreach ($this_tags as $tag)

	<a class="news-tags" href="{{url('media/'.$link.'/tags/'.$tag)}}">{{$tag}}</a>
	@endforeach
</div>
<div class="col-sm-4 pr-5 pl-5 pt-4 ">
	<ul>
		@foreach($new_news as $key => $value)
		@php
		if($value->type_id == 1){
		$link = "news";
	}else{
	$link = "info-lowker";
}


@endphp
<li><a href="{{url('media/'.$link.'/'.date('Y/m',strtotime($value->created_at)).'/'.$value->slug)}}" class="w3-xlarge">{{$value->title}}</a><hr></li>
@endforeach
</ul>
</div>
</div>
</div>

<div class="container-fluid martop5 mb-5" style="padding:0 30px;">
	<h4>Silahkan isi form dibawah ini untuk info lebih lanjut: </h4>
	<div class="row">
	<div class="col-md-8">	
		<form class="" action="{{url('/contact_us')}}" method="post">
			{{csrf_field()}}
			@if($news->type_id == 1)
			@php
			$subject = "News";
			@endphp
			@elseif($news->type_id == 2)
			@php
			$subject = "Info-Lowker";
			@endphp
			@endif
			<input type="hidden" value="{{$subject}}" name="subject">
			<input type="hidden" value="{{$news->title}}" name="event_name">
			<input type="hidden" value="{{$news->slug}}" name="event_slug">
			<div class="row form-group">
				<label class="col-md-12" ><strong> Nama Lengkap </strong> </label> 
				<div class="col-md-12">
					<input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" value="" required>
				</div>
			</div>
			<p>
				<label> <strong> Email</strong></label> <br>
				<input class="form-control" type="email" name="email" placeholder="Email" value="" required>
			</p>
			<p>
				<label> <strong> No Telpon / WA </strong> </label> <br>
				<input class="form-control" type="number" name="no_telepon" value="" placeholder="No Telpon" required>
			</p>
			<p>
				<label> <strong> Pesan : </strong> </label> <br>
				<textarea class="form-control" name="pesan" placeholder="Pesan..." wrap="soft" style="resize:none;" rows="5" required></textarea>
			</p>
			<div>
			<input type="submit" class="btn btn-primary" style="float:right;padding:8px 40px;" name="submit" value="Submit">
			</div>
		</form>
	</div>
	</div>
</div>


@section('more-script')

@endsection
@stop
