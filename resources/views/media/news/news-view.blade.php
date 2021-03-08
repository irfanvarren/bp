@extends('layouts.bp_news')
<style type="text/css">
	.news-body ul,.news-body ol{
		padding-left:2rem;
	}
.views-counter{
	text-align: center;
	font-size:16px;
	margin-top: -12.5%;
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

<div class="col-md-12" style="background:white;box-shadow:0 0 10px #cecece;">
	<div class="row">
		<div class="col-md-8" style="border-right:1px solid #dedede;padding:30px 15px;">
			<div class="row">
				<div class="col-md-12" style="padding:0 30px;">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-2 col-sm-2">
									<div  style="width:100%;height:50%;">
									
									</div>
									<div class="views-counter">
									<span class="fa fa-eye"></span> 0
									</div>
								</div>
								<div class="col-md-10 col-sm-10" style="border-left:1px solid #dedede">

									<h2 style="font-family:'Open Sans',Arial,Tahoma,sans-serif;font-size:24px;">{{ucwords($news->title)}}</h2>
									<div> @if($news->author_name != ""){{$news->author_name}} | @endif {{date("l, d F Y",strtotime($news->created_at))}}</div>
								</div>
								<!-- facebook, wa, twitter, telegram, line-->
							</div>
						</div> 
						<div class="col-md-12" style="margin:15px 0;">
							<div class="row">
								
								<div class="col-md-2">

								</div>
								<div class="col-md-10">
									<div class="col-md-12" style="padding:0;">


										<img style="width:100%;float:right;display:block;" src="{{Storage::disk('news')->url($news->image)}}" alt="">

										<!-- Tanggal Promo dibawah gambar -->

									</div>
									@if($news->image_desc != "")
									<div class="col-md-12">{{$news->image_desc}}</div>
									@endif
								</div>
							</div>
						</div>
						
					</div>
				</div>

				<div class="col-md-12 news-body" style="margin-top:15px;padding:0 30px;text-align: justify;overflow-x:scroll;">
					{!!$news->body!!}
				</div>
				<div class="col-md-12" style="padding:15px 30px;">
					@foreach ($this_tags as $tag)
					<a class="news-tags" href="{{url('media/news/tags/'.$tag)}}">{{$tag}}</a>
					@endforeach
				</div>

					<div class="col-md-12" style="padding:0 30px;">
					<h4>Silahkan isi form dibawah ini untuk info lebih lanjut: </h4>
					<div>	
						<form class="" action="{{url('/contact_us')}}" method="post">
							{{csrf_field()}}
							<input type="hidden" value="News" name="subject">
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
							<input type="submit" class="btn btn-primary" style="float:right;padding:8px 40px;" name="submit" value="Submit">
						</form>
					</div>
				</div>

			</div>
		</div>

		<div class="col-md-4" style="background-color:#f9f9f9;padding:30px 15px;">
			<div class="col-md-12">
				<h5>POST LAINNYA</h5>

			</div>
			<div class="col-md-12">
				<div class="row">
					@foreach($new_news as $key => $value)

					<div class="col-md-12" style="padding:0px;background:white;border-right:4px solid blue;margin-bottom:15px;">
						<a href="{{url('media/news/'.date('Y/m',strtotime($value->created_at)).'/'.$value->slug)}}" style="display: block;color:black;">
							<div class="col-md-12">

								<div class="row">
									<!-- Gambar Disebelah Kiri -->
									<div class="col-md-3" style="padding:0;">
										<div style="width:100%;height:90px;overflow:hidden;background-image:url('{{'https://bestpartnereducation.com/public/news/'.$value->image}}');background-size:cover;background-position: center;">         	
										</div>
									</div>
									<div class="col-md-9" style="padding:8px 12px;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">
										<div style="line-height:1.8em;max-height:3.6em;overflow: hidden;border-bottom:1px solid #dedede">
											{{$value->title}}
										</div>
										<div style="color:gray">
											{{date("l, d F Y",strtotime($value->created_at))}}
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

<!-- contact us  dibawah sini data di kirim ke email marketing -->

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
