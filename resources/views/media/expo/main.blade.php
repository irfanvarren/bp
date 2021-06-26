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
	}
	.expo-bg{
		background-size: 65%;background-position:center;background-repeat:no-repeat;height: 100%;background-color:#81CCF3;
		
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
		top:30%;
		left:20%;
		
	}
	.expo-btn.brochures{
		position: absolute;
		top:63.5%;
		left:12.5%;
	}
	.expo-btn.photos{
		position: absolute;
		top:22.5%;
		right:22.5%;
	}
	.expo-btn.about{
		position: absolute;
		top:75%;
		right:15%;
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
		margin-right:35px;
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
	.expo-lobby{
		background:rgba(0,0,0,0.6);display: block;margin:0 auto;width:80%;min-height: 275px;margin-top:120px;padding:45px;color:white;text-align:center;font-family: 'Roboto';margin-bottom:80px;
	}
	.expo-lobby .title{
		font-size:58px;margin-bottom:20px;
	}
	.expo-lobby .description{
		font-size:26px;
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
		.expo-lobby{
			min-height: auto;
			height: auto;
			padding:30px 15px;
		}
		.expo-lobby .title{
			font-size:42px;margin-bottom:20px;
		}
		.expo-lobby .description{
			font-size:22px;
		}
	}
	@media screen and (max-width: 768px){
		.expo-video-wrapper iframe{
			height:300px;
		}	
	}
	@media screen and (max-width: 576px){
		.content-wrapper{
			min-height: auto !important;
			height:500px;
		}
		.expo-lobby{
			margin-top:80px;
			padding:15px;
		}
		.expo-lobby .title{
			font-size:32px;margin-bottom:10px;
		}
		.expo-lobby .description{
			font-size:16px;
		}
		.expo-btn{
			position:relative !important;
			top:initial !important;
			right:initial !important;
			left:initial !important;
			bottom:initial !important;
			width:44%;
			margin:15px 3% !important;
			float: left;
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
		}
		.expo-bg{
			background-size: 200%;
			background-position: center bottom 27.5%;
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
		.expo-nav-btn.right{
			margin:0 0 0 2.5% !important;
		}
		.expo-nav-btn.right{
			margin-right:2.5%;
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

@section('content')

<div class="content-wrapper px-0 py-0 col-md-12" style="background:url('{{$lobby != '' ? $lobby->background != '' ? asset('events/'.$lobby->background) : asset('events/empty-mall.jpg') : ''}} ');background-size:cover;background-position:center;">
	<ul class="nav expo-nav col-md-12 p-0">
		<li class="nav-item"><a href="{{url('media/events/expo/'.$event->kd)}}"><i class="fas fa-door-open"></i><div>Lobby</div></a></li>
		<li class="nav-item"><a href="{{url('media/events/expo/'.$event->kd.'/pavillions')}}"><i class="fas fa-store"></i><div>Pavillions</div></a></li>
		<li class="nav-item"><a href="{{url('media/events/expo/'.$event->kd.'/exhibitors')}}"><i class="fas fa-street-view"></i><div>Exhibitors</div></a></li>
	</ul>
	<div  class="expo-lobby">
		<h1 class="title" >{{$lobby->title}}</h1>
		<div class="description">
			{{$lobby->description}}
		</div>
	</div>
</div>
@endsection