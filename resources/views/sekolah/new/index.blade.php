@extends('layouts.search-school')
@section('sidebar-content')
<div class="col-md-12" style="padding:30px;">
<div class="col-md-12" style="padding:30px;">
<h3>Dashboard</h3>
<div>
	<img src="{{asset('img/schools/dashboard.svg')}}" style="display: block;margin:0 auto;">
</div>
</div>
<div class="col-md-12" style="padding: 30px">
	<div class="row">
		<div class="col-md-8">
			<div class="mb-3">
				<h3>Find a Program</h3>
			</div>
			<div class="row">
				<div class="col-md-6 mb-4 mt-4" style="filter:blur(5px);-webkit-filter:blur(5px)">
					
				<img src="{{asset('img/schools/blur.png')}}" >
				<span class="ml-4">Program A</span>
				
				</div>
				<div class="col-md-6 mb-4 mt-4" style="filter:blur(5px);-webkit-filter:blur(5px)">
					
				<img src="{{asset('img/schools/blur.png')}}" >
				<span class="ml-4">Program B</span>
				</div>
				<div class="col-md-6 mb-4 mt-4" style="filter:blur(5px);-webkit-filter:blur(5px)">
					
				<img src="{{asset('img/schools/blur.png')}}">
				<span class="ml-4">Program C</span>
				</div>
				<div class="col-md-6 mb-4 mt-4" style="filter:blur(5px);-webkit-filter:blur(5px)">
					
				<img src="{{asset('img/schools/blur.png')}}">
				<span class="ml-4">Program D</span>
				</div>
				<div class="col-md-12 text-center">
					<a class="btn btn-primary" style="margin:40px 0 0 -15px;font-size:18px;" href="{{url('search-schools/search/programs')}}">Search All Programs</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="mb-3"><h3>More Info</h3></div>
			
			<div class="card">
				<div class="card-body" style="padding:45px;">
					<div class="text-center" style="color:#666;font-size:20px;font-family: calibri">Your Account Manager</div>
					<div>
						<img src="{{asset('img/logo3.png')}}" style="width:80px;display: block;margin:30px auto 30px auto;">
					</div>
					<div class="text-center"><strong><h4>Best Partner Education</h4></strong></div> <br>
					<p>	Email <br>
					info@bestpartnereducation.com </p>
					<p>
						Phone number <br>
+62 561 8172583
				</div>
					</p>
				

			</div>
		</div>
	</div>
</div>
</div>
@endsection