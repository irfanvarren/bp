@extends('layouts.bp_wo_sidenav', ['activePage' => '','activeMenu' => '', 'titlePage' => __('Certificate Tracking')])
@push('head-script')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">

<script>
	function cn(){
		var cn = document.getElementById('cn').value;
		var link = btoa(cn);
		location.href="{{url('certificate-tracking')}}/cn?aasdawcn="+encodeURIComponent(link)
	}
	function cnik(){
		var cn = document.getElementById('nik').value;
		var link = btoa(cn);
		location.href="{{url('certificate-tracking')}}/cnik?aasdawcn="+encodeURIComponent(link)
	}
</script>
@endpush
@section('content')
<div class="col-md-12" style="background:#F5F9FF">
	<div class="row py-5">
		<div class="col-md-6">
			<img style="max-height: 100%;max-width: 60%;margin-left:45px;" src="{{asset('img/certificates/home.png')}}">
		</div>
		<div class="col-md-6">
			
			<div class="card p-4" style="border-radius:30px;box-shadow:0 0 15px #efefef;border:none;margin:30px 45px;">
				<div class="card-body">
					@if(session()->has('error'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<i class="material-icons">close</i>
						</button>
						{!! session('error') !!}
					</div>
					@endif
					<div class="row">
						<div class="col-md-3 col-form-label">
							Certificate Code
						</div>
						<div class="col-md-6">
							<input type="text" id="cn" class="form-control">

						</div>
						<div class="col-md-3">
							<input type="button" onclick ="cn()" class="btn btn-primary" value="Search">
						</div>


					</div>
					<div class="text-center mt-5"><h4><strong>ALTERNATIVE</strong></h4></div>
					<div class="row" >
						<div class="col-md-3 col-form-label">
							NIK
						</div>
						<div class="col-md-6">
							<input type="text" id="nik" class="form-control">
						</div>
						<div class="col-md-3">
							<input type="button" onclick ="cnik()" class="btn btn-primary" value="Search">
						</div>



					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection

