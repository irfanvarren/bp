@extends('layouts.bp_wo_sidenav')
@push('head-script')
<style>
	@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
</style>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style type="text/css">

	.portfolio-background{
		height:300px;
		background-position: center top 40%;
		background-size:cover ;
		background-repeat:no-repeat;
	}
	.photo-container{
		margin-bottom: 50px;
	}

	.photo{
		width: 200px;
		height: 200px;
		background:#aaa;
		margin-top:-70px;	
		border-radius: 50%;
		overflow: hidden;
		border:5px solid white;
	}
	.portfolio-wrapper{
		font-family: "Roboto";
		padding:0 5%;
		padding-bottom: 5%;
	}
	.profile{
		padding: 30px;
		font-size:21px;
	}
	.profile .name{
	}
	.swiper-container {
		width: 100%;
		height: 180px;
	}
	.ellipse{
		float: left;
		width:36px;
		height:36px;
		background:#aaa;
		border-radius:50%;
	}
	.profile-type.active .ellipse{
		background: #3F7360;
	}
	.profile-type.active{
		color:black;
	}
	.profile-type{
		color:#aaa;
	}
	.profile-type:hover{
		cursor: pointer;
	}
	.line{
		float: right;
		width:85%;
		height:2px;
		background: #888;
	}
	.profile-type-header{
		margin-bottom:20px;
	}
	.profile-type-text{
		font-size:20px;
		padding-right:30px;
	}
	.colon {
		float: right;

	}
	.portfolio-content{
		display: none;
	}
	.portfolio-content.active{
		display: block;
	}

	@media screen and (min-width:1366px){
		.portfolio-background{
			height: 350px;
		}
		.photo{
			width:270px;
			height: 270px;
		}
	}
	@media screen and (max-width: 1000px){
		.colon{
			float:none;
		}
	}
	@media screen and (max-width:860px){
		.portfolio-background{
			height:200px;
		}
		.photo{
			width: 120px;
			height: 120px;
			margin: 0;
			margin-top:15px;
		}
		.profile{
			margin-top:12px;
		}
	}
	@media screen and (max-width:480px){
		.portfolio-background{
			height:200px;
			background-size: cover;
		}
		.photo-container{
			margin-bottom:20px;
		}
		.photo{
			margin:0 auto;
			width:18vw;
			height: 18vw;
			margin-top:25px;
			border:2px solid white;
		}
		.photo-wrapper{
			width: 28vw;
		}
		.profile{
			padding:0;
			margin-top:6vw;
			font-size:4vw !important;
		}
		.profile .name strong{
			font-size:5vw !important;
		}
	}
	@media screen and (max-width:280px){
		.photo{
			margin: 10px;
		}
		.profile{
			margin:0;
		}
	}
</style>
@endpush
@section('content')
<div class="col-md-12">
	<div class="row">
		<div class="col-md-12 portfolio-background"  style="background-image:url('{{asset('img/portfolio/'.$perusahaan.'.jpg')}}');">
		</div>

	</div>
	<div class="row">
	    	  
		<div class="col-md-12 portfolio-wrapper">
			<div class="row photo-container" >
				<div class="photo-wrapper">
					<div class="photo" style="background:url({{asset(Storage::disk('public')->url($portfolio->image)) }});background-size:cover;background-position:center;background-color:#aaa;">
				
					    <img src=""></img>
					</div>
				</div>
				<div class="profile">
					<h3 class="name">
						<strong>{{$karyawan->NAMA}}</strong>
					</h3>
					<div>{{$karyawan->REF_JABATAN}}</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="swiper-container" style="margin: 15px 0;">
						<!-- Additional required wrapper -->
						<div class="swiper-wrapper">
							<!-- Slides -->
							<div class="swiper-slide">
								<div class="profile-type active" onclick="change_type(0)" onmouseover="change_type(0)">
									<div class="profile-type-header">
										<div class="ellipse"></div>
										<div style="padding:18px 0;width: 80%;margin:0 auto; display: block;">
											<div class="line"></div>
										</div>
									</div>
									<div class="profile-type-text">
										Latar Belakang <br> Pendidikan
									</div>
								</div>
							</div>
							<div class="swiper-slide" onclick="change_type(1)" onmouseover="change_type(1)">
								<div class="profile-type">
									<div class="profile-type-header">
										<div class="ellipse"></div>
										<div style="padding:18px 0;width: 80%;margin:0 auto; display: block;">
											<div class="line"></div>
										</div>
									</div>
									<div class="profile-type-text">
										Pengalaman <br> Bekerja
									</div>
								</div>
							</div>
							@php
							$no = 2;
							@endphp	
							@foreach($other as $other_experience)
						


							<div class="swiper-slide" onclick="change_type({{$no}})" onmouseover="change_type({{$no}})">
								<div class="profile-type">
									<div class="profile-type-header">
										<div class="ellipse"></div>
										<div style="padding:18px 0;width: 80%;margin:0 auto; display: block;">
											<div class="line"></div>
										</div>
									</div>
									<div class="profile-type-text">
										{{$other_experience->jenis_pengalaman}}
									</div>
								</div>
							</div>
							@php
							$no += 1;
							@endphp
							@endforeach
							

						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
				<div class="col-md-12" style="min-height: 600px;background:#EDF4FF;border-radius: 20px;padding:40px 50px;">
					<div class="portfolio-content active">
						<h4 style="margin-bottom:20px;"><strong>Latar Belakang Pendidikan</strong></h4>
						@foreach($edu as $edubackground)
						<div class="row">
							<div class="col-md-2 text-center"><div><strong>{{$edubackground->tahun_masuk}}</strong></div></div>
							<div class="col-md-10" style="border-bottom:1px solid #bebebe;margin-bottom: 15px;">
								@if($edubackground->jurusan != "")
								<div class="row mb-3">
									<div class="col-md-2">
										Jurusan <span class="colon">:</span>
									</div>
									<div class="col-md-10">
										{{$edubackground->jurusan}}
									</div>
								</div>
								@endif
								@if($edubackground->gelar != "")
								<div class="row mb-3">
									<div class="col-md-2">
										Gelar <span class="colon">:</span>
									</div>
									<div class="col-md-10">
										{{$edubackground->gelar}}
									</div>
								</div>
								@endif
								@if($edubackground->tempat != "")
								<div class="row mb-3">
									<div class="col-md-2">
										Tempat <span class="colon">:</span>
									</div>
									<div class="col-md-10">
										{{$edubackground->tempat}}
									</div>
								</div>
								@endif
								@if($edubackground->status != "")
								<div class="row mb-3">
									<div class="col-md-2">
										Status <span class="colon">:</span>
									</div>
									<div class="col-md-10">
										{{$edubackground->status}}
									</div>
								</div>
								@endif
							</div>
						</div>
						@endforeach
					</div>
					<div class="portfolio-content">
						<h4 style="margin-bottom:20px;"><strong>Pengalaman Bekerja</strong></h4>
						@foreach($exp as $experience)
						<div class="row">
							<div class="col-md-12" style="border-bottom:1px solid #bebebe;margin-bottom: 15px;">
								@if($experience->nama_pekerjaan != "")
								<div class="row mb-3">
									<div class="col-md-2">
										Pekerjaan <span class="colon">:</span>
									</div>
									<div class="col-md-10">
										{{$experience->nama_pekerjaan}}
									</div>
								</div>
								@endif
								@if($experience->tempat_bekerja != "")
								<div class="row mb-3">
									<div class="col-md-2">
										Tempat Bekerja <span class="colon">:</span>
									</div>
									<div class="col-md-10">
										{{$experience->tempat_bekerja}}
									</div>
								</div>
								@endif
								@if($experience->tgl_mulai != "")
								<div class="row mb-3">
									<div class="col-md-2">
										Tempat <span class="colon">:</span>
									</div>
									<div class="col-md-10">
										{{$experience->tgl_mulai}}
									</div>
								</div>
								@endif
								@if($experience->tgl_selesai != "")
								<div class="row mb-4">
									<div class="col-md-2">
										Status <span class="colon">:</span>
									</div>
									<div class="col-md-10">
										{{$experience->tgl_selesai}}
									</div>
								</div>
								@endif
							</div>
						</div>
						@endforeach
					</div>
					@foreach($other as $other_experience)
						<div class="portfolio-content">
							<h4 style="margin-bottom:20px;"><strong>{{$other_experience->jenis_pengalaman}}</strong></h4>
							<ul style="padding: 0 25px;">
							@foreach($other_experience->detail as $detail)
							<li class="col-md-12" style="padding-bottom:15px;">
								<div class="col-md-12">{!!urldecode($detail->pengalaman)!!}</div>
							</li>
							
							@endforeach
							</ul>
						</div>
					@endforeach
					

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@push('more-script')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript">
	var mySwiper = new Swiper('.swiper-container', {
		direction: 'horizontal',
		freeMode: true,
		pagination: {
			el: '.swiper-pagination',
		},
		freeModeSticky:true,
		breakpoints: {
			1024: {
				slidesPerView: 5,
			},

			768: {
				slidesPerView: 4,
			},
			480: {
				slidesPerView: 3,
			},

		}
	})
	
	function change_type(index){
		var types = $('.profile-type');
		$('.profile-type').removeClass('active');
		$(types[index]).addClass('active');
		var contents = $('.portfolio-content');

		$('.portfolio-content').removeClass('active');
		$(contents[index]).addClass('active');

	}
</script>
@endpush