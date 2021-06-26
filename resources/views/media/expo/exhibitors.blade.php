@extends('layouts.bp_wo_sidenav')
@push('head-script')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style type="text/css">
	.expo-nav{
		height: 100px;
		background:white;
		box-shadow: 5px 0 15px #eeeeee;
	}
	.expo-nav li a{
		text-align: center;
		width:120px;
		color:black;
		border-right:1px solid #dedede;
		height: 100%;
		display: block;
		padding:18px 15px;
	}
	.expo-nav li a > i{
		font-size:38px;
	}
	.content-wrapper.expo{
		height: 76vh;
		overflow:hidden;
		background-image:url({{asset('events/booths/BG.jpg')}});
	}
	.expo-bg{
		/*background-size: 65%;*/
		background-position:center;background-repeat:no-repeat;height: 100%;
		/*background-color:#81CCF3;*/
		background-size:auto 100%;
		position: absolute;top:0;
		left:0;width: 100%;
	}
	.expo-btn{
		padding:10px 24px 10px 70px;
		font-size:1.2em;
		border:none;
		border-radius: 25px;
		background: #0E1B2A;
		position: relative;
	}
	.expo-btn:hover,.expo-btn:focus,.expo-btn:active{
		background-color:#0E1B2A !important;
	}
	.expo-btn i{
		position: absolute;border-radius: 50%;
		left:0;
		top:0;
		width:65px;
		height: 65px;
		font-size:36px;
		line-height: 55px;
		margin-top:-8px;
		margin-left:-10px;
		border:4px solid #0E1B2A;
		background:#0E1B2A;
	}
	.expo-btn.videos{
		position: absolute;
		top:7.5%;
		right:40%;
		
	}
	.expo-btn.brochures{
		position: absolute;
		top:12%;
		left:10%;
	}
	.expo-btn.photos{
		position: absolute;
		top:55%;
		left:16%;
	}
	.expo-btn.about{
		position: absolute;
		top:30%;
		right:5%;
	}
	.expo-btn.videos i{
		background: #F04851;
	}
	.expo-btn.brochures i{
		background: #FF9C00;
	}
	.expo-btn.photos i{
		background: #D75EFF;
	}
	.expo-btn.about i{
		font-size:40px;
		line-height: 58px;
		background: #25A2F9;
	}
	.expo-nav-wrapper{
		width: 100%;
		position:absolute;
		top:30px;
		left:0;
	}
	.expo-nav-btn.right{
		float: right;
	}
	.expo-content{
		width: 100%;
		overflow-x: hidden;
		display: none;
		border:0;
	}
	.modal-content{
		border:none;
	}
	.modal-content .modal-header{
		padding:10px 15px !important;
	}

	.modal-content.videos .modal-header{
		background-color:#F04851;
		color:white;
	}
	.modal-content.brochures .modal-header{
		background-color:#FF9C00;
		color:white;
	}
	.modal-content.photos .modal-header{
		background-color:#D75EFF;
		color:white;
	}
	.modal-content.about .modal-header{
		background-color:#25A2F9;
		color:white;
		border-bottom:0;
	}
	.modal-content.about .modal-body{
		padding:0 15px;
	}
	.modal-header-icon{
		display: none;
		margin-right:10px;
	}
	.modal-content.videos .modal-header-icon.videos{
		font-size:38px;
		display: inline-block;
	}
	.modal-title{
		white-space: nowrap;
	}
	.expo-video-wrapper.large{
		padding:0 10%;
	}
	.expo-video{
		margin:5px 0;
		padding:0;
		height: 100px;
		overflow: hidden;
		background:#EBEEF3;
	}
	.expo-video:hover{
		cursor:pointer;
	}
	.expo-video-thumbnail{
		background:black;
	}
	.video-title-wrapper{
		padding:15px;
		padding-left:0;
		max-height: 100px;
	}
	.video-title-wrapper .title{
		padding:0 15px;
		font-size:15px;
		padding-left:0 !important;
		line-height: 23px;
		max-height: 70px;
		overflow: hidden;
		display: -webkit-box;
		-webkit-line-clamp: 3;
		-webkit-box-orient: vertical;  
	}
	.brochure-column{
		font-size:16px;
		padding:0.7rem 1.2rem;
	}
	.brochure-column.cell{
		background:#efefef;
		font-size:20px;
		font-weight: bolder;
	}
	.brochure-link{
		color:black;
	}
	.brochure-link:hover{
		text-decoration: none;
	}

	.swiper-container {
		width: 100%;
		height: 300px;
		margin-left: auto;
		margin-right: auto;
	}
	.swiper-button-next,.swiper-button-prev{
		color:black;
	}
	.photo-wrapper{
		height:500px;
	}
	.swiper-slide {
		background-size: cover;
		background-position: center;
	}

	.gallery-top {
		height: 75%;
		width: 100%;
	}

	.gallery-thumbs {
		height: 25%;
		box-sizing: border-box;
		padding: 10px 0;
	}
	.gallery-top .swiper-slide{
		background-size:contain;
		background-repeat: no-repeat;
		background-position: center;
	}
	.gallery-thumbs .swiper-slide {
		height: 100%;
		opacity: 0.4;
	}

	.gallery-thumbs .swiper-slide-thumb-active {
		opacity: 1;
	}
	.expo-about-bg{
		background-size:cover;
		background-position:center;
		position: absolute;
		width: 105%;
		height: 105%;
		top:-5px;
		left:-5px;

		filter: blur(5px);
		-webkit-filter: blur(5px);
	}
	.expo-about-desc{
		flex:1;flex-direction:column;padding:0 20px;

	}
	.expo-about-desc .school-name{
		color:white;
	}
	.expo-about-desc .course{
		color:#dedede;
	}
	@media screen and (max-width: 992px){
		.expo-video{
			height: auto !important;
		}
		.video-title-wrapper{
			padding-left:15px;
			max-height: auto !important;
		}
		.video-title-wrapper .title{
			padding-left:15px !important;
		}
		.expo-btn.videos{
			top:7.5%;
			right:35%;

		}
		.expo-bg{
			background-size: 100% auto;
		}
	}
	@media screen and (max-width: 768px){
		.expo-video-wrapper iframe{
			height:300px;
		}	
		.expo-btn {
			padding: 8px 15px 10px 50px;
			font-size: 0.8em;
		}
		.expo-btn i{
			width: 50px;
			height: 50px;
			font-size: 25px;
			line-height: 45px;
			margin-top: -5px;
			margin-left: -10px;
			border: 3px solid #0E1B2A;
		}
		.expo-btn.about i {
			font-size: 30px;
			line-height: 45px;
		}
		.expo-btn.videos{
			top:22%;
			right:30%;

		}
		.expo-btn.brochures{
			top:22.5%;
			left:8%;

		}
		.expo-btn.photos{
			top:70%;
			left:10%;

		}
		.expo-btn.about{
			top:62.5%;
			right:5%;

		}
		.expo-bg{
			background-size: 100% auto;
		}
		.content-wrapper.expo{
			min-height: auto;
			height: 60vh;
		}
	}
	@media screen and (max-width: 576px){
		.expo-btn{
			position:relative !important;
			top:initial !important;
			right:initial !important;
			left:initial !important;
			bottom:initial !important;
			width:44%;
			margin:15px 3% !important;
			float: left;
			padding-left: 35px;
		}

		.expo-btn-wrapper{
			padding:0 15px;
		}
		.expo-nav{
			height:70px;
		}
		.expo-nav li{
			width:33.33333%;
		}
		.expo-nav li a{
			width: 100%;
			padding:10px 15px;
		}
		.expo-nav li a > i {
			font-size: 24px;
			margin-top:3px;
		}
		.expo-nav li a > div{
			font-size: 14px;
		}
	}
	@media screen and (max-width: 576px){
		.expo-video-wrapper iframe{
			height:200px;
		}
		.expo-btn{
			width:90%;
			display: block;
			margin:15px 5% !important;
			float: left;
		}
		.content-wrapper.expo{
			padding-top:30%;
			padding-bottom:15%;
			min-height: auto;
			height: auto;
		}
		.expo-bg{
			/*background-size: 200%;
			background-position: center bottom 27.5%;*/
			filter: blur(3px);
			-webkit-filter: blur(3px);
		}
		.expo-nav-btn{
			width: 47.5%;
			height: 100%;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		
		.expo-video-thumbnail{
			width:100%;
		}
	}
	@media screen and (max-width: 480px){
		.expo-video > .row > div{
			flex: 0 0 100%;
			max-width: 100%;
		}
		.expo-video .expo-video-thumbnail img{
			height:120px;
		}
		.expo-video{
			width:100% !important;
		}
		.expo-about-desc{
			flex:0 0 100%;
			padding:0;
			margin-top:15px;
		}
		.brochure-header{
			display: none;
		}
	}
</style>
@endpush
@section('modal')
<div class="modal fade p-0" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" data-backdrop="true">
	<div class="modal-dialog modal-dialog-centered mymodal mt-auto mx-auto" style="max-width:80%;pointer-events: all !important;" role="document">

		<div class="modal-content" id="modal-content">
			<div class="modal-header" >
				<h5 class="d-inline modal-title m-0" id="exampleModalLabel" style="line-height: 38px;display: inline;"> <i class="fa fa-youtube-play modal-header-icon videos align-middle" aria-hidden="true" style="vertical-align: middle;"></i> <span style="line-height: 38px;">Data Expo</span></h5>
				<button type="button" class="close" style="padding:0px 10px;color:white;line-height: 65px;" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background:white;z-index:50;">

				<div class="col-12 expo-content videos">
					videos
				</div>
				<div class="col-12 expo-content brochures">
					brochures
				</div>
				<div class="col-12 expo-content photos">
					photos
				</div>
				<div class="col-12 expo-content about">
					about
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content')
<ul class="nav expo-nav col-md-12 p-0">
	<li class="nav-item"><a href="{{url('media/events/expo/'.$event->kd)}}"><i class="fas fa-door-open"></i><div>Lobby</div></a></li>
	<li class="nav-item"><a href="{{url('media/events/expo/'.$event->kd.'/pavillions')}}"><i class="fas fa-store"></i><div>Pavillions</div></a></li>
	<li class="nav-item"><a href="{{url('media/events/expo/'.$event->kd.'/exhibitors')}}"><i class="fas fa-street-view"></i><div>Exhibitors</div></a></li>
</ul>
@csrf
@if(count($exhibitors))
<div class="col-md-12 p-3" style="border-top:1px solid #d0d0d0;">
	<p>
		<div style="width:80px;height:80px;line-height:75px;background:white;position:relative;z-index:10;border-radius: 10px;float:left;margin-right:15px;padding-bottom:2px;background:#dfdfdf;text-align:center;">
			<img id="exhibitor-logo" src="@if($exhibitors[0]->school_id != '') {{asset('img'.'/schools/logo_sekolah/'.$exhibitors[0]->logo)}} @else {{asset('events'.'/'.$exhibitors[0]->logo)}} @endif" style="width:auto;max-width:100%;max-height:100%;vertical-align: middle;display:inline;margin:0 auto 0 auto;">
		</div>

		<div class="d-inline" style="font-size:22px;"><strong id="exhibitor-name">{{$exhibitors[0]->name}}</strong></div>
		<div class="d-block" style="font-size:16px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
			<span id="exhibitor-country" class="text-primary">{{$exhibitors[0]->country_name}}</span> | <span id="exhibitor-course" title="{{str_replace('|',', ',$exhibitors[0]->course)}}" style="line-height: 20px;white-space: nowrap;">{{str_replace('|',', ',$exhibitors[0]->course)}}</span>
		</div>
	</p>
</div>	
@endif
<div class="col-md-12 content-wrapper expo">
	@php
	$booth = $exhibitors[0]->booth != "" ?  $exhibitors[0]->booth : rand(1,4);
	@endphp
	<div class="expo-bg"  style="background-image:url('{{asset('events/booths/'.$booth.'.png')}}');">	
	</div>

	<div class="expo-btn-wrapper">
		<button class="btn btn-primary expo-btn videos" onclick="open_modal('videos')"> <i class="fa fa-youtube-play"></i> Videos</button>
		<button class="btn btn-primary ml-2 expo-btn photos" onclick="open_modal('photos')"><i class="material-icons align-middle ">insert_photo</i>Photos</button>
		<button class="btn btn-primary ml-2 expo-btn brochures" onclick="open_modal('brochures')"><i class="material-icons align-middle ">insert_drive_file</i>Brochures</button>
		<button class="btn btn-primary ml-2 expo-btn about" onclick="open_modal('about')"><i class="material-icons align-middle ">info</i>About</button>
	</div>
	<div class="expo-nav-wrapper col-lg-12">
		<button class="btn btn-secondary expo-nav-btn left" type="button" id="prev-btn" onclick="prev_exhibitors()" disabled="">Previous Exhibitor</button> <button class="btn btn-secondary expo-nav-btn right" type="button" id="next-btn" @if(count(json_decode($exhibitors_json)) <= 1) disabled @endif onclick="next_exhibitors()">Next Exhibitor</button>
		
	</div>
</div>
@endsection
@push('more-script')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript">
	var token = $("input[name='_token']").val();
	var event_id = '{{$event_id}}';
	var exhibitors = {!!$exhibitors_json!!};
	var current_index = 0;
	var baseUrl = '{{asset('')}}';
	$(document).ready(function()
	{
		if (navigator.appName == "Opera")
		{
			$('#mymodal').removeClass('fade');
		}

		if(window.location.hash){
			current_index =  parseInt(location.hash.substr(1));
			open_exhibitors();
		}
	});
	$( window ).on( 'hashchange', function( e ) {
		current_index = parseInt(location.hash.substr(1));
		open_exhibitors();
	} );

	// $(document).on('focusin.modal', function (e) {
	// 	console.log(e)
	// 	if (that.$element[0] !== e.target && !that.$element.has(e.target).length) {
	// 		that.$element.focus();
	// 	}
	// });
	if(current_index == 0){
		document.getElementById('prev-btn').disabled = true;
	}
	function open_video(el,vid){
		var output = '<iframe class="d-block mx-auto" src="//www.youtube.com/embed/'+vid+'" width="100%" height="420px" frameborder="0" allowfullscreen></iframe>';
		$('#expo-video-preview').html(output);
	}
	function open_modal(type){
		$.ajax({
			url : "{{route('expo-content-ajax')}}",
			method: "POST",
			data:{
				_token: token,
				type:type,
				event_id:event_id,
				exhibitor_id:exhibitors[current_index].id
			},success:function(data){
				$('.expo-content.'+type).html(data);
				$('.expo-content.'+type).show();
				if(type == "photos"){
					var galleryThumbs = new Swiper('.gallery-thumbs', {
						spaceBetween: 10,
						slidesPerView: 3,
						loop: true,
						freeMode: true,
					    loopedSlides: 5, //looped slides should be the same
					    watchSlidesVisibility: true,
					    watchSlidesProgress: true,
					    navigation: {
					    	nextEl: '.swiper-button-next',
					    	prevEl: '.swiper-button-prev',
					    },
					    breakpoints:{
					    	480: {
					    		slidesPerView: 10,
					    	},
					    }
					});
					var galleryTop = new Swiper('.gallery-top', {
						spaceBetween: 10,
						loop: true,
						loopedSlides: 5, //looped slides should be the same
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						},
						thumbs: {
							swiper: galleryThumbs,
						},
					});
				}
			},error:function(error){
				alert('error');
			},complete:function(){
			}
		});
		$('#mymodal').modal('toggle');
		$('.expo-content').hide();
		$('#modal-content').removeClass();
		$('#modal-content').addClass("modal-content "+type);

		
		
	}

	function open_exhibitors(){

		if(current_index >= (exhibitors.length - 1)){
			document.getElementById('next-btn').disabled = true;
		}else{
			document.getElementById('next-btn').disabled = false;
		}
		if(current_index <= 0){
			document.getElementById('prev-btn').disabled = true;
		}else{
			document.getElementById('prev-btn').disabled = false;
		}
		var data_exhibitor = exhibitors[current_index];
		$('#exhibitor-name').html(data_exhibitor['name']);
		$('#exhibitor-country').html(data_exhibitor['country_name']);
		$('#exhibitor-course').attr('title',data_exhibitor['course'].replaceAll("|",", "));

		
		if(data_exhibitor['school_id'] != "" && data_exhibitor['school_id'] != null){
			var logo = baseUrl+"img/schools/logo_sekolah/"+data_exhibitor['logo'];
		}else{
			var logo =baseUrl+"events/"+data_exhibitor['logo'];
		}
		$('#exhibitor-logo').prop("src",logo);

		$('#exhibitor-course').html(data_exhibitor['course'].replace("|",", "));
	}

	function prev_exhibitors(){
		if(current_index < (exhibitors.length - 1)){
			document.getElementById('next-btn').disabled = false;
		}

		if(current_index > 0){
			current_index -= 1;

		}
		if(current_index == 0){
			document.getElementById('prev-btn').disabled = true;
		}
		var data_exhibitor = exhibitors[current_index];
		$('#exhibitor-name').html(data_exhibitor['name']);
		$('#exhibitor-country').html(data_exhibitor['country_name']);
		$('#exhibitor-course').attr('title',data_exhibitor['course'].replaceAll("|",", "));

		
		if(data_exhibitor['school_id'] != "" && data_exhibitor['school_id'] != null){
			var logo = baseUrl+"img/schools/logo_sekolah/"+data_exhibitor['logo'];
		}else{
			var logo =baseUrl+"events/"+data_exhibitor['logo'];
		}
		$('#exhibitor-logo').prop("src",logo);

		$('#exhibitor-course').html(data_exhibitor['course'].replace("|",", "));
		window.location.hash = current_index;

	}
	function next_exhibitors(){
		if(current_index < (exhibitors.length - 1)){
			current_index += 1;
			document.getElementById('next-btn').disabled = false;
		}
		if(current_index == (exhibitors.length - 1)){
			document.getElementById('next-btn').disabled = true;
		}
		if(current_index > 0){
			document.getElementById('prev-btn').disabled = false;
		}
		var data_exhibitor = exhibitors[current_index];
		$('#exhibitor-name').html(data_exhibitor['name']);
		$('#exhibitor-country').html(data_exhibitor['country_name']);
		$('#exhibitor-course').attr('title',data_exhibitor['course'].replaceAll("|",", "));
		if(data_exhibitor['school_id'] != "" && data_exhibitor['school_id'] != null){
			var logo = baseUrl+"img/schools/logo_sekolah/"+data_exhibitor['logo'];
		}else{
			var logo =baseUrl+"events/"+data_exhibitor['logo'];
		}
		$('#exhibitor-logo').prop("src",logo);
		$('#exhibitor-course').html(data_exhibitor['course'].replaceAll("|",", "));

		window.location.hash = current_index;
	}
</script>
@endpush