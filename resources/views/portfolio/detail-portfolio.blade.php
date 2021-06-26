@extends('layouts.bp_wo_sidenav')
@section('content')
@push('head-script')

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style type="text/css">
	.portfolio-detail-slideshow-wrapper{
		height: 100%;
		border-radius:10px;
		min-height: 450px;
		overflow:hidden;
	}
	.portfolio-detail-slideshow{
		height:100%;
		display: block;
		margin: 0 auto;
	}
	.portfolio-detail-slideshow-img{
		max-height: 450px;
		display: block;
		margin:0 auto;
		max-width:100%;
	}
	.portfolio-detail-image-wrapper{
		height:120px;
		padding:0;
		margin:0;
		margin-bottom:15px;
		border-radius:10px;
		display: block;
		position: relative;
		overflow:hidden;
		background:black;
	}
	.portfolio-detail-image-wrapper > figure{
		width: 100%;
		height:100%;
		margin:0;
	}
	.portfolio-detail-image{
		max-height:100%;
		max-width:100%;
		display:block;
		margin:0 auto;
	}

	.swiper-container {
		width: 100%;
		height: 100%;
	}

	.swiper-slide {
		text-align: center;
		font-size: 18px;
		background: black;
		color:white;
		/* Center slide text vertically */
		display: -webkit-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		-webkit-justify-content: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		-webkit-align-items: center;
		align-items: center;
	}

</style>
@endpush
@php
$galleries = $galleries->toArray();
@endphp
<div class="col-lg-12 content-wrapper">	
	<div class="row">
		<div class="container" style="max-width:1280px !important;">	
			<div class="col-lg-12" style="margin-bottom:15px; " itemscope itemtype="http://schema.org/ImageGallery" itemscope itemtype="http://schema.org/ImageGallery">
				<div class="row">
					<div class="col-lg-8" style="padding-bottom:15px;">		
						<div class="portfolio-detail-slideshow-wrapper">	
							<div class="swiper-container">
								<div class="swiper-wrapper">
									@if(count($galleries))

									@foreach($galleries as $gallery)

									<div class="swiper-slide">
										<a href="{{asset($gallery['image'])}}"  data-fslightbox="gallery" data-type="image">
											<img class="portfolio-detail-slideshow-img" src="{{asset($gallery['image'])}}">
										</a>
									</div>
									@endforeach
									@endif
								</div>

								<div class="swiper-scrollbar"></div>
								<!-- Add Pagination -->
								<div class="swiper-pagination"></div>
								<!-- Add Arrows -->
								<div class="swiper-button-next"></div>
								<div class="swiper-button-prev"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="row" style="margin:0 -30px;">	

							@if(count($galleries) > 2)
							@php
							$galleries_count = 1;
							@endphp
							<div class="col-lg-12">	
								<figure class="portfolio-detail-image-wrapper"  onclick="open_lightbox(1)" style="height:200px;" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
									<a href="#" itemprop="contentUrl" data-size="" data-type="image">
										<img src="{{asset($galleries[1]['image'])}}" itemprop="thumbnail" alt="Image description" class="portfolio-detail-image" />
									</a>

								</figure>
							</div>
							@else
							<div class="col-lg-12">	
								<figure class="portfolio-detail-image-wrapper"  onclick="open_lightbox(0)" style="height:200px;" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">

									<a href="#" itemprop="contentUrl" data-size="">
										<div style="position: absolute;top:0;left:0;width: 100%;height:100%;line-height:200px;text-align:center;margin-left:0px;background:rgba(0,0,0,0.7);font-size:22px;color:white;">
											({{count($galleries)}})	
										</div>
										<img src="{{asset($galleries[1]['image'])}}" itemprop="thumbnail" alt="Image description" class="portfolio-detail-image" />
									</a>


								</figure>
							</div>
							@endif

							@if(count($galleries)  > 2)

							<div class="col-lg-12">	
								<div class="row">	
									@php
									$galleries2 = $galleries;
									$galleries2 = array_splice($galleries2,2,2);

									@endphp
									@foreach($galleries2 as $key => $gallery)
									@php
									$galleries_count += 1;
									@endphp
									<div class="col-lg-6" >
										<div class="portfolio-detail-image-wrapper">		
											<figure itemprop="associatedMedia" itemscope onclick="open_lightbox({{$galleries_count}})" itemtype="http://schema.org/ImageObject">
												<a href="#" itemprop="contentUrl" data-size="">
													@if($galleries_count == (count($galleries2) + 1)  && count($galleries) <= 4)
													<div style="position: absolute;top:0;left:0;width: 100%;height:100%;line-height:120px;text-align:center;margin-left:0px;background:rgba(0,0,0,0.7);font-size:22px;color:white;">

														({{count($galleries)}})

													</div>
													@endif
													<img src="{{asset($gallery['image'])}}" itemprop="thumbnail" alt="Image description" class="portfolio-detail-image" />
												</a>

											</figure>
										</div>
									</div>
									@endforeach
								</div>

							</div>

							@endif

							@if(count($galleries)  > 3)
							<div class="col-lg-12">	
								<div class="row">	
									@php
									$galleries3 = $galleries;
									$galleries3 = array_splice($galleries3,4,2);

									@endphp
									@foreach($galleries3 as $key => $gallery)
									@php
									$galleries_count += 1;
									@endphp

									<div class="col-lg-6" >
										<div class="portfolio-detail-image-wrapper">		
											<figure itemprop="associatedMedia" itemscope onclick="open_lightbox({{$galleries_count}})" itemtype="http://schema.org/ImageObject">
												<a href="#" itemprop="contentUrl" data-size="">
													@if($galleries_count == (count($galleries3) + 3))
													<div style="position: absolute;top:0;left:0;width: 100%;height:100%;line-height:120px;text-align:center;margin-left:0px;background:rgba(0,0,0,0.7);font-size:22px;color:white;">
														({{count($galleries)}})
													</div>
													@endif
													<img src="{{asset($gallery['image'])}}" itemprop="thumbnail" alt="Image description" class="portfolio-detail-image" />
												</a>

											</figure>
										</div>
									</div>
									@endforeach
								</div>

							</div>

							@endif
						</div>
					</div>
				</div>



			</div>
			@if($details != "")
			<div class="col-lg-12">
				<div> <h2 style="color:#4476d4;"> <strong>{{$details->name}}</strong></h2></div>
				<div style="font-size:18px;margin-top:15px;">
					{!!$details->description!!}
				</div>

			</div>
			@endif
		</div>
	</div>

</div>

@endsection
@push('more-script')
<script type="text/javascript" src="{{asset('js/fslightbox.js')}}"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript">
	var swiper = new Swiper('.swiper-container', {
		pagination: {
			el: '.swiper-pagination',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

	});
	function open_lightbox(index){
		fsLightboxInstances['gallery'].open(index);
}
</script>

@endpush