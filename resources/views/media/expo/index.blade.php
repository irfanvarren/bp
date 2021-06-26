@extends('layouts.bp_wo_sidenav')

@section('content')

@if(count($expo))
<div class="col-md-12 content-wrapper">
	<div class="row justify-content-center">
		@foreach($expo as $data_expo)
		<div style="height:100vh;position: relative;display: flex;align-items: center;text-align:center;width: 45%;">
			<ul class="list-group col-md-12" style="margin-top:-25vh;">
				<li class="list-group-item list-group-item-primary">List Expo</li>
				<li class="list-group-item list-group-item-action"><a href="{{url('media/events/expo/').'/'.$data_expo->kd}}">{{$data_expo->nama}}</a></li>
			</ul>

		</div>
		@endforeach
	</div>
</div>
@else
<div class="col-md-12" style="padding:80px 15px;margin-bottom: 60px;">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<img src="{{asset('img/not-found.png')}}" style="display: block;margin:0 auto;max-width: 80%;">
			<h1 class="text-center">No Expo</h1>
		</div>
	</div>
</div>
@endif
@endsection