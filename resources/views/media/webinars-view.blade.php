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
	.news-header{
		border-left:1px solid #dedede;
	}
	.time{
		width: 25%;
		float:left;
		text-align: center;
	}
	@media screen and (max-width:580px){
		.views-counter{
			display: none;
		}
		.news-header{
			border:none;
			text-align: center;
		}
	}
</style>
@section('news-title',implode(' ',array_map("ucfirst",explode('-',$news->slug))))
@section('news-image')
{{Storage::disk('events')->url($news->image)}}
@endsection
@section('news-desc')
{!!	str_limit(strip_tags($news->body),100,$end = "...")!!}
@endsection
@section('title',implode(' ',array_map("ucfirst",explode('-',$news->slug))))
@section('content')

<div class="col-md-12" style="background:white;box-shadow:0 0 10px #cecece;">
	<div class="row">
		<div class="col-lg-8 col-md-12" style="border-right:1px solid #dedede;padding:30px;">
			<div class="row">
				<div class="col-md-12" style="margin-bottom:15px;">
					<div class="row">
						<div class="col-md-12" style="margin-bottom:15px;">
							<div class="row">
								<div class="col-md-3 col-sm-3">
									<div  style="width:100%;height:50%;">

									</div>
									<div class="views-counter">
										<span class="fa fa-eye"></span> 0
									</div>
								</div>
								<div class="col-md-9 col-sm-10 news-header">

									<h2 style="font-family:'Open Sans',Arial,Tahoma,sans-serif;font-size:24px;">{{ucwords($news->title)}}</h2>
									<div style="font-size:14px;">{{date("l, d F Y",strtotime($news->created_at))}}</div>
								</div>
								<!-- facebook, wa, twitter, telegram, line-->
							</div>
						</div>
						
						<div class="col-md-12" style="margin:15px 0;padding:0 30px;">
							<div class="row">
								
								<div class="col-md-3">

								</div>
								<div class="col-md-9" style="padding:0;border:1px solid #dedede">
										<div style="padding:0;">
										<img style="width:100%;display:block;margin:0 auto;" src="{{Storage::disk('events')->url($news->image)}}" alt="">
										</div>
										<div style="padding:15px;border-top:1px solid #dedede;">
										<div style="color:#777">{{$news->image_desc}}</div>
										<!-- Tanggal Promo dibawah gambar -->
										@if($news->tgl_mulai != "" || $news->tgl_selesai != "")
										<div style="font-size:14px;">

											@if($news->tgl_mulai != "")<span>Tanggal Mulai : {{date("d/m/Y",strtotime($news->tgl_mulai))}}</span>@endif @if($news->tgl_selesai != "")<span style="float:right">Tanggal Berakhir: {{date("d/m/Y",strtotime($news->tgl_selesai))}}</span>@endif
										</div>
										@endif
										</div>

								</div>
							</div>
						</div>

						
					</div>
				</div>
				
				@if(strtotime($news->tgl_mulai) >= \Carbon\Carbon::now()->timestamp )
				<div class="col-md-12" style="margin-bottom:30px;">
				<div class="row">
					<div class="col-md-12" style="text-align:center;">
						<div style="background:#2E62A6;color:white;margin:0 auto;display: block;width:90%;padding:10px 0px;">
							
						<span style="font-size:18px;"><strong>Events Started In :</strong></span> <br>
						<span id="timer" style="font-size:32px;font-weight:bold;">
							00 d 00 h 00 m 00 s
						</span>

						</div>
					</div>
					</div>
				</div>
				@endif
				
				<div class="col-md-12 news-body" style="text-align: justify">
				
					{!!$news->body!!}
					
				</div>

				<div class="col-md-12" style="padding:15px;margin-bottom:30px;">
					@foreach ($this_tags as $tag)
					<a class="news-tags" href="{{url('media/promo/tags/'.$tag)}}">{{$tag}}</a>
					@endforeach
				</div>
				
				<div class="col-md-12">
					<h4>Silahkan isi form dibawah ini untuk info lebih lanjut: </h4>
					<div>	
						<form class="" action="{{url('/contact_us')}}" method="post">
							{{csrf_field()}}
							<input type="hidden" value="Webinars" name="subject">
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

		
		<div class="col-lg-4" style="background-color:#f9f9f9;padding: 15px;">
			<div class="col-md-12" style="padding:15px;">
				<h4 style="margin-bottom:0;">POST LAINNYA</h4>
			</div>
			<div class="col-md-12">
				@if($new_news->count())
				<div class="row">
					@foreach($new_news as $key => $value)

					<div class="col-md-12" style="padding:0px;background:white;border-right:4px solid blue;margin-bottom:15px;">
						<a href="{{url('media/events/'.$type.'/'.date('Y/m',strtotime($value->created_at)).'/'.$value->slug)}}" style="display: block;color:black;">
							<div class="col-md-12">

								<!-- Gambar Disebelah Kiri -->
								<div style="width:110px;float:left;">
									<div style="width:100%;height:90px;overflow:hidden;background-image:url('{{Storage::disk('events')->url($value->image)}}');background-size:cover;background-position: center;">         	
									</div>
								</div>
								<div style="padding:8px 12px;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;width:calc(100% - 110px);float:left;">
									<div style="line-height:1.8em;max-height:3.6em;overflow: hidden;border-bottom:1px solid #dedede">
										{{$value->title}}
									</div>
									<div style="color:gray;font-size:12px;">
										{{date("l, d F Y",strtotime($value->created_at))}}
									</div>
								</div>

							</div>
						</a>
					</div>

					@endforeach
				</div>
				@else
				No Recent Post !
				@endif
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
				<a class="news-tags" href="{{url('media/promo/tags/'.$tag)}}">{{$tag}}</a>
				@endforeach
			</div>
		</div>

	</div>
</div>-->


@push('more-script')
<script type="text/javascript">
	var now = "{{\Carbon\Carbon::now()->timestamp }}";
	var timeout = "{{strtotime($news->tgl_mulai)}}"; 
	var onloadTimer;
	var timerDisplay = $('#timer');
	function makeInteger(time,x,mod){
		var time = Math.floor(time/x) % mod;
		if(time < 10){
			time = "0" + time;
		}
		return time;
	}

	$( document ).ready(function() {
		if(timeout > 0 && timeout != null){	
			var timer = (timeout - now);
			onloadTimer =  setInterval(function() {
				if(timer > 0){
					timer--; 
				  var weeks = "00",
          days = makeInteger(timer,60 * 60 * 24 ,999),
          hours = makeInteger(timer,60 * 60,24),
          minutes = makeInteger(timer,60,60),
          seconds = makeInteger(timer,1,60);   
          if(weeks != "00"){
          var  output = weeks + " wk ";
          }else{
          var output = "";
          } 
          output += days + " d " + hours + " h " + minutes + " m " + seconds + " s ";
					
					timerDisplay.html(output);
				}else{
					clearInterval(onloadTimer);
				}	
			}, 1000);

		}
	});
</script>
@endpush
@stop