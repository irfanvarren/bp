@extends('layouts.bp_wo_sidenav')
@push('head-script')
<style type="text/css">
	.expo-nav{
		display: flex !important;
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
	.pavillion:hover{
		cursor:pointer;
	}
	@media screen and (max-width: 576px){
	
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
</style>
@endpush
@section('content')
<ul class="nav expo-nav col-md-12 p-0">
	<li class="nav-item"><a href="{{url('media/events/expo/'.$event->kd)}}"><i class="fas fa-door-open"></i><div>Lobby</div></a></li>
	<li class="nav-item"><a href="{{url('media/events/expo/'.$event->kd.'/pavillions')}}"><i class="fas fa-store"></i><div>Pavillions</div></a></li>
	<li class="nav-item"><a href="{{url('media/events/expo/'.$event->kd.'/exhibitors')}}"><i class="fas fa-street-view"></i><div>Exhibitors</div></a></li>
</ul>
<div class="col-md-12 content-wrapper">
	<div class="row px-3">


		@foreach($exhibitors as $key => $exhibitor)
		<a href="{{url('media/events/expo/'.$event->kd.'/exhibitors#'.$key)}}" class="col-md-6 col-xl-3 my-3 pavillion">
			<img class="mb-3" src="{{$exhibitor->booth != "" ? asset('events/booths/'.$exhibitor->booth.'.png') : asset('events/booths/'.rand(1,4).'.png')}}"  style="width:100%">
			<div class="text-center p-3">
				<div><h4 style="color:black;">{{ucwords($exhibitor->name)}}</h4></div>
				<div>{{$exhibitor->country_name}}</div>
			</div>
		</a>
		@endforeach

	</div>

</div>
@endsection