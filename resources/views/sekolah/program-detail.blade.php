@extends('layouts.search-school')
@push('head-script')
<style type="text/css">
	ul{
		list-style-position: inside;
	}
	.school-logo{
		width: auto; display: block;margin: 0 auto; max-height: 120px;margin-bottom:30px;
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
	.school-header{
		height:450px;
		background-position: center center;
		background-size: cover;
		background-repeat:no-repeat;
	}
	.school-name-wrapper{
		margin-left:30px;
	}
	.school-name-wrapper{
		float:left;
	}
	.photo-wrapper{
		display: inline;

	}
	.photo{
		width: 150px;
		height: 150px;
		background:#aaa;
		/*margin-top:-100px;*/
		border-radius: 50%;
		box-shadow: 0 0 2px #f0f0f0;
		overflow: hidden;
		border:5px solid white;
	}
	.school-name{
		color:white;
		text-shadow: 0px 0px 4px #333;
		font-size:2.2em !important;
		text-align: left !important;
		position: absolute;top:50%;
		transform:translateY(-50%);
	}
	@media screen and (max-width: 768px) {
		.school-name-wrapper{
			margin-left:15px;
		}
		.school-name{
			font-size:1.8em !important;
		}
	}
	@media screen and (max-width: 480px) {
		.school-detail-wrapper{
			padding:0px !important;
		}
		.photo{
			width:100px;
			height: 100px;
		}
		.school-name-wrapper{
			margin-left:5%;
		}
		.school-name{
			font-size:1.5em !important;
		}
	}
</style>
@endpush
@section('sidebar-content')
<div class="col-md-12">
	<div class="row">
		<div class="col-md-12 school-header" style="@if(!empty($program['galleries']) )background-image:url({{asset('img/schools/'.$program['school_id'].'/'.$program['galleries'][0]['image'])}});@else background-image:url({{asset('img/schools/no-gallery.jpeg')}});  @endif;">
			<div class="row" style="width: 100%;overflow: hidden;text-overflow: ellipsis;position: absolute;bottom:0;padding:30px 15px;">
				<div class="photo-wrapper" style="float:left">
					<div class="photo" style="background:url('{{asset('img/schools/logo_sekolah/'.$program['logo'])}}');background-size:cover;background-position:center;background-color:#aaa;">
					</div>
				</div>

				<span class="school-name-wrapper" style="display: inline;float:left;">
					<h2 class="school-name" style="display: inline;">{{$program['name']}} - {{$program['school_name']}}</h2>
				</span>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col-md-12 school-detail-wrapper" style="padding:30px;">
			<!--<button onclick="notifyMe()">Notify me!</button>-->
			<div class="row">
				<div class="col-md-9">

					<div class="card" style="border:none;box-shadow:0 0 15px #eee;border-radius:15px;">
						<div class="card-body" style="padding:1.25rem 15px;">

							<div class="row mb-3" style="border-bottom:1px solid #eee;padding:8px 15px;">
								<div class="col-md-12 mb-2"><h5><strong>{{$program['name']}}</strong></h5></div>
								<div class="col-md-12 mb-3">
									<i> {{$program['city_name'] != "" ? $program['city_name'] : ''}} {{$program['region_name'] != "" ? ", ".$program['region_name'] : ''}}
									{{$program['country_name'] != "" ? ", ".$program['country_name'] : ''}}</i>
								</div>
							</div>
							@if($program['course_information'] != "")
							<div class="row" style="padding:8px 15px;">
								<div class="col-md-12 mb-2"><h5><strong>Program Description</strong></h5></div>
								<div class="col-md-12 mb-3">
									{{$program['course_information']}}
								</div>
							</div>
							@endif
							@if(count($program['requirements']))
							<div class="row" style="padding:8px 15px;">
								<div class="col-md-12 mb-2"><h5><strong>Admission Requirements</strong></h5></div>
								<div class="col-md-12">
									<ul class="p-3 m-0">
										@foreach($program['requirements'] as $requirement)
										<li>{{$requirement['name']}}</li>	
										@endforeach
									</ul>
								</div>
							</div>
							@endif
							@if(count($program['other_fees']))
							<div class="row" style="padding:8px 15px;">
								<div class="col-md-12 mb-2"><h5><strong>Other Fees</strong></h5></div>
								<div class="col-md-12 mb-3">
									<ul class="p-3 m-0">
										@foreach($program['other_fees'] as $other_fee)
										<li>{{$other_fee['name']}} : {{$other_fee['fee'] != "" ? $other_fee['fee'] : '-'}}</li>
										@endforeach
									</ul>
								</div>
							</div>
							@endif

							@if(count($program['course_units']))
							<div class="row" style="padding:8px 15px;">
								<div class="col-md-12 mb-2"><h5><strong>Course Units</strong></h5></div>
								<div class="col-md-12 mb-3">
									<ul class="p-3 m-0">
										@foreach($program['course_units'] as $course_unit)
										<li>{{$course_unit['name']}}</li>
										@endforeach
									</ul>
								</div>
							</div>
							@endif
						</div>
					</div>

				</div>
				<div class="col-md-3">

					<div class="card" style="border:none;box-shadow:0 0 15px #eee;border-radius:15px;">
						<div class="card-body" style="padding:1.25rem 15px;">
							<div class="row mb-2" style="border-bottom:1px solid #eee;padding:8px 15px;">
								<div class="col-md-12 mb-2"><h5><strong>Details</strong></h5></div>

							</div>
							<div class="row" style="padding:8px 15px;">
								<div class="col-md-12 mb-3">
									<h5>
										Program Level : <strong  style="background:#ddd;padding:8px 12px;">{{$program['qualification_name']}}</strong>
									</h5>
								</div>
								<div class="col-md-12 mb-3">
									<h5>
										Length : <strong>{{$program['duration']}}</strong>
									</h5>
								</div>


								<div class="col-md-12 mb-3">
									<h5>
										Application Fee : 
										@if($program['enrollment_fee'] != "" && $program['enrollment_fee'] != 0)
										<strong>{{$program['enrollment_fee']}} {{$program['currency_code']}} <!--/  {{number_format($program['enrollment_fee'] / json_encode($ex_rate_usd[$program['currency_code']]),2,',','.')}} USD / {{number_format($program['enrollment_fee'] / json_encode($ex_rate_idr[$program['currency_code']]),2,',','.')}} IDR  -->
										</strong>
										@else
										-
										@endif
									</h5>
								</div>
								<div class="col-md-12 mb-3">
									<h5>
										Tuition Fee : 
										@if($program['fee'] != "" && $program['fee'] != 0)

										<strong>{{$program['fee']}} {{$program['currency_code']}} <!-- /  {{number_format($program['fee'] / json_encode($ex_rate_usd[$program['currency_code']]),2,',','.')}} USD / {{number_format($program['fee'] / json_encode($ex_rate_idr[$program['currency_code']]),2,',','.')}} IDR-->
										</strong>
										@else
										-
										@endif
									</h5>
								</div>
								<div class="col-md-12 mb-2">
									<h5>
										Material Fee : 
										@if($program['material_fee'] != "" && $program['material_fee'] != 0)

										<strong>{{$program['material_fee']}} {{$program['currency_code']}} <!--/ {{number_format($program['material_fee'] / json_encode($ex_rate_usd[$program['currency_code']]),2,',','.')}} USD / {{number_format($program['material_fee'] / json_encode($ex_rate_idr[$program['currency_code']]),2,',','.')}} IDR-->
										</strong>
										@else
										-
										@endif
									</h5>
								</div>

							</div>
							@if(count($program['intakes']))
							<div class="row" style="padding:8px 15px;">
								<div class="col-md-12 mb-2"><h5><strong>Intake Dates</strong></h5></div>

								<div class="col-md-12 mb-3">
									<table class="table">
										<tr>
											<th>Intake Date</th> <th> Orientation Date</th>
										</tr>
										@foreach($program['intakes'] as $intake)
										<tr>
											<td>
												<span style="background:#ddd;padding:8px 12px;">{{date("d/m/Y",strtotime($intake->intake_date))}}</span>
											</td>
											<td><span style="background:#ddd;padding:8px 12px;">{{$intake->orientation_date != "" ? date("d/m/Y",strtotime($intake->orientation_data)) : '-'}}</span></td>
										</tr>
										@endforeach
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
	function notifyMe() {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
  	alert("This browser does not support desktop notification");
  }

  // Let's check whether notification permissions have already been granted
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
    var notification = new Notification("Hi there!");
}

  // Otherwise, we need to ask the user for permission
  else if (Notification.permission !== "denied") {
  	Notification.requestPermission().then(function (permission) {
      // If the user accepts, let's create a notification
      if (permission === "granted") {
      	var notification = new Notification("Hi there!");
      }
  });
  }

  // At last, if the user has denied notifications, and you 
  // want to be respectful there is no need to bother them any more.
}
</script>
@endpush