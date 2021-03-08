@if($type == "videos")
@if(count($content))
<div class="row">
	@if(count($content) > 1)
	<div class="col-md-12 px-4 py-1">
		<div class="row"> 
			<div class=" col-md-8 expo-video-wrapper"  id="expo-video-preview">

				<iframe class="d-block mx-auto" src="//www.youtube.com/embed/{{$content[0]->vid}}" width="100%" height="450px" frameborder="0" allowfullscreen></iframe>
			</div>	
			<div class="col-md-4" style="padding:0 30px;">
				<div class="row">
					@foreach($content as $video)

					<div class="col-md-12 expo-video" onclick="open_video(this,'{{$video->vid}}')">
						<div class="row">
							<div class="col-lg-5 col-md-12 col-5">
								<div class="expo-video-thumbnail">
									<img class="d-block mx-auto" style="width: 100%;height: 100px;" src="//img.youtube.com/vi/{{$video->vid}}/0.jpg" /> 
								</div>
							</div>
							<div class="col-lg-7 col-md-12 col-7 video-title-wrapper">
								<div class="title">
									{{$video->title}}
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	@else
	@foreach($content as $video)
	
	<div class=" col-md-12 large expo-video-wrapper">
		
		<iframe class="d-block mx-auto" src="//www.youtube.com/embed/{{$video->vid}}" width="100%" height="420px" frameborder="0" allowfullscreen></iframe>
	</div>	
	@endforeach
	@endif
</div>
@else
<div class="row">
	<div class="col-sm-12">
		Sorry, There aren't any videos...
	</div>
</div>
@endif
@elseif($type=="brochures")

@if(count($content))
<div class="row brochure-header">
	<div class="col-sm-9 brochure-column">
		File Name
	</div>
	<div class="col-sm-3 brochure-column">
		Action
	</div>
</div>
@foreach($content as $brochure)
<div class="row">
	<div class="col-sm-9 brochure-column cell">
		<a href="{{asset('events/'.$brochure->path)}}" class="brochure-link" download>{{$brochure->name}}</a>
	</div>
	<div class="col-sm-3 brochure-column cell">
		<a href="{{asset('events/'.$brochure->path)}}" target="_blank" class="btn btn-primary">View</a>
	</div>
</div>
@endforeach
@else
<div class="row">
	<div class="col-sm-12">
		Sorry, There aren't any brochures...
	</div>
</div>
@endif

@elseif($type=="photos")
@if(count($content))
<div class="row">
	<div class="col-md-12 photo-wrapper">
		<div class="swiper-container gallery-top mb-3">
			<div class="swiper-wrapper">
				@foreach($content as $photo)
				<div class="swiper-slide" style="background-image:url('{{asset('events/'.$photo->path)}}')"></div>
				@endforeach
			</div>
			<!-- Add Arrows -->
			<div class="swiper-button-next swiper-button-white"></div>
			<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs mb-3">
			<div class="swiper-wrapper">
				@foreach($content as $photo)
				<div class="swiper-slide" style="background-image:url('{{asset('events/'.$photo->path)}}')"></div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@else
<div class="row">
	<div class="col-sm-12">
		Sorry, There aren't any photos...
	</div>
</div>
@endif
@elseif($type == "about")
@if($content->about != "")
<div class="row">
	
	
	<div class="col-md-12" style="padding:30px 45px;overflow: hidden;">
		<div class="expo-about-bg" style="background-image:url('{{asset('img/events/expo-about-header.jpeg')}}');"></div>	
		<div class="row">
			<div style="width:90px;height:90px;line-height:90px;background:white;position:relative;z-index:10;border-radius: 10px;text-align: center;margin:0 auto;">
				<img src="@if($content->school_id != '') {{asset('img'.'/schools/logo_sekolah/'.$content->logo)}} @else {{asset('events'.'/'.$content->logo)}} @endif" style="width:auto;max-width:100%;max-height:100%;vertical-align: middle;display:inline;margin:0 auto;">
			</div>
			<div class="d-flex expo-about-desc">
				<div class="row">
					<div class="col-md-12 school-name"><h3><strong>{{$content->name}}</strong></h3></div>
					<div class="col-md-12 course">{{str_replace('|',', ',$content->course)}}</div>
				</div>
			</div>
		</div>

	</div>

</div>
<div class="row">
	<div class="col-md-12 py-3">
		<div class="row">
			<div class="col-md-8" style="border-right:1px solid #bebebe">
				{!!$content->about!!}
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="p-3 col-md-12" style="border-bottom:1px solid #dedede">
						{{$content->country_name}}	
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
@else
<div class="row">
	<div class="col-sm-12 py-3">
		Sorry, There aren't any information about this school / institution...
	</div>
</div>
@endif
@endif