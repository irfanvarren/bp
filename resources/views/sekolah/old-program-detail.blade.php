@extends('layouts.bp_wo_sidenav')
@push('head-script')
<style type="text/css">
	ul{
		list-style-position: inside;
	}
	.school-logo{
		width: auto; display: block;margin: 0 auto; max-height: 120px;margin-bottom:30px;
	}
	.accordion {
		background-color: #2E62A6;
		border-bottom:1px solid white !important;
		color: white;
		cursor: pointer;
		padding: 18px;
		width: 100%;
		border: none;
		text-align: left;
		outline: none;
		font-size: 15px;
		transition: 0.4s;
	}

	.active, .accordion:hover {
		background-color: #3d7ed4;
	}


	.accordion:after {
		content: '\002B';
		color: white;
		font-weight: bold;
		float: right;
		margin-left: 5px;
	}

	.active:after {
		content: "\2212";
	}

	.panel {
		padding: 0 18px;
		background-color: white;
		max-height: 0;
		overflow: hidden;
		transition: max-height 0.2s ease-out;
	}
	.panel-content{
		padding:15px;
	}
	.program-detail-wrapper ul{
		margin-bottom:0;
	}
	.program-detail-wrapper{
		padding:0;
	}
</style>
@endpush
@section('content')

<div class="col-md-12 content-wrapper" style="background-image:url({{asset('img/course-gradient.jpg')}});background-size:cover;background-repeat: no-repeat;">

	<div class="row">
		<div class="col-md-1">
		</div>

		<div class="col-md-3">
			<div class="row">

				<img src="{{asset('img/schools/logo_sekolah/'.$program['logo'])}}" class="school-logo">
			</div>
			<div class="row card" style="padding: 15px;">

				<div class="container" style="text-align: center;">

					<h5 style="color: blue"> Fee</h5>
					<table>
						<tr>
							<td></td>
						</tr>
					</table>
					<p> <span class="text-left"> Course Fee : </span>	{{$program['fee'].' '.$program['currency_code']}}</p>
					<p>Material Fee :	{{$program['material_fee'].' '.$program['currency_code']}}</p>
					<p>Enrollment Fee :	{{$program['enrollment_fee'].' '.$program['currency_code']}}</p>
					<p>Total Fee :	{{$program['total_fee'].' '.$program['currency_code']}}</p>
					@if(isset($program['note']))
					<p >All fees inclusive of prevailing GST</p>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-6" >
			<div class="row">
			<div class="col-md-12 card" style="padding:15px;">
				<p style="color: blue;font-size: 30px;text-align: center;">{{$program['name']}}</p>

				<p style="padding: 20px">{{$program['course_information']}}</p>
			</div>		
			<div class="col-md-12 program-detail-wrapper">
				<div class="row">
					<div class="col-md-12">
						@if(count($program['requirements']) != 0)
						<div class="accordion">Requirements</div>
						<div class="panel">
							<div class="panel-content">
								<ul>
									@foreach($program['requirements'] as $key => $value)
									<li>{{$value['name']}}</li>
									@endforeach
								</ul>
							</div>
						</div>
						@endif
						@if(count($program['course_units']) != 0)
						<div class="accordion">Course Unit</div>
						<div class="panel">
							<div class="panel-content">
								<table class="table table-bordered">
									@foreach($program['course_units'] as $key => $value)

									<tr><td>{{$value['period_name']}}</td><td>{{$value['name']}}</td></tr>
									@endforeach
									</table>
								
							</div>
						</div>
						@endif
						@if(count($program['other_fees']) != 0)
						<div class="accordion">Other Fees</div>
						<div class="panel">
							<div class="panel-content">
								<table>
									<thead>
										<tr>
											<th>Name</th> <th>Fee</th> <th>Details</th>
										</tr>
										@foreach($program['other_fees'] as $key => $value)
										<tr>
											<td>{{$value['name']}}</td> <td>{{$value['fee']}}</td> <td>{{urldecode($value['details'])}}</td>
										</tr>
										@endforeach
									</thead>
								</table>		
							</div>
						</div>
						@endif
					</div>	
				</div>
			</div>	
			
		</div>		
</div>
	</div>
</div>
@endsection
@push('more-script')

<script type="text/javascript">
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight) {
				panel.style.maxHeight = null;
			} else {
				panel.style.maxHeight = panel.scrollHeight + "px";
			} 
		});
	}
	function read_more(read_more, triangle) {
		$('#' + triangle).toggleClass('open');
		$('#' + read_more).slideToggle(450, function() {});

	}
</script>
@endpush