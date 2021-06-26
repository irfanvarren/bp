@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="https://bestpartnereducation.com/public/css/slick.css">
<link rel="stylesheet" href="https://bestpartnereducation.com/public/css/slick-theme.css">
<style type="text/css">
	@media screen and (max-width: 480px) {
		.gallery-slider .gallery-image{
			width:100% !important;
			height:auto;
		}

		
	}
	.time-table-wrapper{
		padding:0 70px;
	}	
	.time-table tr td{
		padding: 15px;
	}
	.other-fees-wrapper .nav-tabs>li>a{
		background:#4180b0;
		color:white;
		border-bottom:2px solid white;
	}
	.other-fees-wrapper .nav-tabs>li>a.active{
		background:#34a8eb;
	}
	.tabcontent,.program-tabcontent {
		display:none;
	}
	.tablinks{
		transition:0.4s all;
	}
	.tablinks:hover{
		cursor:pointer;
		color:#454243;
	}
	.program-tablinks{
		background:#3490dc;
		color:white;
		text-align:center;
		margin-bottom:10px;
	}
	.program-tablinks:hover{
		cursor:pointer;
	}
</style>
@endpush
@section('content')
<div class="col-md-12 content-wrapper" style="background-image:url({{asset('img/course-gradient.jpg')}});background-size:cover;background-repeat: no-repeat;">

	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10 ">
			<div class="row">
				<div class="col-md-3" style="padding: 0">
					<img src="{{asset('img/schools/logo_sekolah/'.$school->logo)}}" style="max-width: 200px; max-height: 150px;display:block;margin:10px 0;">
					<h3>
						{{$school->name}}
					</h3>	

					<div class="col-md-12" style="margin-top: 20px;padding:0;">
					<a href="https://www.google.com/"> <button type="button" class="btn btn-primary">Video</button></a>
					<a href="https://www.google.com/"> <button type="button" class="btn btn-primary">Website</button></a>
					<a href="https://www.google.com/"> <button type="button" class="btn btn-primary">Apply</button></a>
				</div>
				</div>
				<div class="col-md-1"></div>			
				<div class="col-md-8 country-wrapper">			
					<!--<div class="col-md-12 sa-country-list">
						<div class="col-md-12 sa-country-desc" onclick="read_more('read-more1','triangle1')">
							<div class="triangle"><span id="triangle1">&#9654;</span></div>
							<div class="desc-title">
								New Classes
							</div>

						</div>
						<div class="col-md-12 read-more" id="read-more1" style="background-color:   white;color : black;padding: 10px">
							<p>Class available in weekdays and weekend </p>
							<p>New Evening class are available in our new campus in (location)</p>
						</div>
					</div>
					<div class="col-md-12 sa-country-list">
						<div class="col-md-12 sa-country-desc" onclick="read_more('read-more2','triangle2')">
							<div class="triangle"><span id="triangle2">&#9654;</span></div>
							<div class="desc-title">
								New Courses 
							</div>

						</div>
						<div class="col-md-12 read-more" id="read-more2" style="background-color:   white;color : black;padding: 10px">
							<table style="text-align: center;">
								<tr>
									<th style="width: 283px">Course Name</th>
									<th style="width: 283px">Duration </th> 
									<th style="width: 283px">Tuition fee</th>
								</tr>
								<tr>
									<td style="width: 283px">Certificate IV marketing </td>
									<td style="width: 283px">104 weeks </td>
									<td style="width: 283px">AUD$ 12,000.00</td>
								</tr>
								<tr>
									<td style="width: 283px">Certificate IV marketing </td>
									<td style="width: 283px">104 weeks </td>
									<td style="width: 283px">AUD$ 12,000.00</td>
								</tr>
								<tr>
									<td style="width: 283px">Certificate IV marketing </td>
									<td style="width: 283px">104 weeks </td>
									<td style="width: 283px">AUD$ 12,000.00</td>
								</tr>
							</table>

						</div>
					</div>
					<div class="col-md-12 sa-country-list">
						<div class="col-md-12 sa-country-desc"  onclick="read_more('read-more3','triangle3')">
							<div class="triangle"><span id="triangle3">&#9654;</span></div>
							<div class="desc-title">
								Tuition Fees Update 
							</div>

						</div>
						<div class="col-md-12 read-more" id="read-more3" style="background-color:   white;color : black;padding: 10px">
							<table style="text-align: center;">
								<tr>
									<th style="width: 420px">Course </th>
									<th style="width: 420px">New tuition fee</th> 
								</tr>
								<tr>
									<td style="width: 420px">Certificate IV marketing </td>
									<td style="width: 420px">AUD$ 1,900.00 </td>
								</tr>
								<tr>
									<td style="width: 420px">Certificate IV marketing </td>
									<td style="width: 420px">AUD$ 1,900.00 </td>
								</tr>
								<tr>
									<td style="width: 420px">Certificate IV marketing </td>
									<td style="width: 420px">AUD$ 1,900.00 </td>
								</tr>
							</table>
						</div>
					</div>-->
					@php
					$x = 1;

					@endphp
					<!--
						ini aku tak perlu buat tabel promo baru
						tambahkan kolom harga jual 
						kolom harga beli
					-->
					@foreach($school->promos->groupBy('type') as $key => $promo)
					<div class="col-md-12 sa-country-list">
						<div class="col-md-12 sa-country-desc"  onclick="read_more('read-more{{$x}}','triangle{{$x}}')">
							<div class="triangle"><span id="triangle{{$x}}">&#9654;</span></div>
							<div class="desc-title">
								{{$key}}
							</div>

						</div>

						<div class="col-md-12 read-more" id="read-more{{$x}}" style="background-color: white;color : black;padding: 10px">
							<div>
								@foreach($promo as $value)
								<p><h3>{{$value->name}}</h3></p>
								@if($value->special_offer != "")<p>Special Offer: {{$value->special_offer}} </p>@endif
								@if($value->total_offer != "" && $value->total_offer != 0 )<p>	Total Offer : {{$value->total_offer}} </p>@endif
								@if($value->intake != "" && $value->intake != 0 )<p>Intake : {{$value->intake}}</p>@endif
								@if($value->term_and_conditions != "")<p>Term & Conditions : {!! nl2br($value->term_and_conditions) !!}</p>	@endif
								@if($value->date_terminated != "" && $value->date_terminated != 0 )<p>Date Terminated : {{$value->date_terminated}}</p>@endif
								@endforeach

							</div>
						</div>

					</div>
					@php
					$x++;
					@endphp
					@endforeach
					
					<script type="text/javascript">
						function read_more(read_more, triangle) {
							$('#' + triangle).toggleClass('open');
							$('#' + read_more).slideToggle(450, function() {});

						}
					</script>
				</div>
				<!-----------------------------------------------------1111111111111111111111111111111111111111111-------------------------------->
				
				<div class="col-md-12 card" style="margin-top: 25px;padding:15px;">
					<div class="row" style="padding: 15px;">
						<div class="col-md-9" style="padding:0 30px;">
							<p> <h3> <strong>About {{$school->name}}</strong> </h3> </p>
							<p>{!!$school->description!!}</p>
						</div>
						<div class="col-md-3">
							<p> <h3> <strong> Address </strong> </h3> </p>
							<p>{{$school->address}}</p>
							<p>{{$school->city_name}}</p>
							<p>{{$school->region_name}}</p>
							<p>{{$school->country_name}},</p>
							<p>{{$school->postal_code}}</p>
						</div>
					</div>
				</div>
				<!-----------------------------------------------------222222222222222222222222222222222222222222------------------------------
				@if($school->contacts->count() != 0)
				<div class="col-md-12 card" style="margin-top: 20px;padding: 15px">
					<div class="row" style="margin: 0;margin-bottom: 10px">
						<div class="col-md-12" style="text-align: center;font-size: 20px;padding:15px;"><strong>Contact</strong></div>
						@foreach($school->contacts->groupBy('division_id') as $key => $division)
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12" style="margin-top: 10px"><strong>{{$division->first()->division_name}}</strong></div>
							</div>
							@foreach($school->contacts->where('division_id',$key) as $key => $value)
							<div class="form-group row">	

								@if($value->name != "")
								<div class="col-md-3">Name</div>
								<div class="col-md-8">{{$value->name}}</div>
								@endif
								@if($value->email != "")
								<div class="col-md-3">Email</div>
								<div class="col-md-8">{{$value->email}}</div>
								@endif
								@if($value->phone_number != "")
								<div class="col-md-3">Phone Number</div>
								<div class="col-md-8">{{$value->phone_number}}</div>
								@endif
								@if($value->skype_id != "")
								<div class="col-md-3">Skype</div>
								<div class="col-md-8">{{$value->skype_id}}</div>
								@endif
							</div>
							@endforeach
						</div>
						@endforeach
					</div>
				</div>
				@endif
				-->
				<!-----------------------------------------------------333333333333333333333333333333333333333333-------------------------------->
				@if($school->has_courses->count() != 0)
				<div class="col-md-12 card" style="margin-top: 20px;padding:15px;">
					<div class="row" style="margin: 0;margin-bottom: 10px">
						<div class="col-md-12" style="text-align: center;"> <h4><strong>Programme Available</strong></h4></div>
					</div>
					<div class="row form-group">
						<div class="col-md-3 offset-md-1" style="max-height:330px;overflow: auto;border-right:3px solid #999999;">
							@foreach($school->has_courses as $keyCourse => $course)
							<div class="form-group row">
								
								<div class="col-md-12 tablinks" onclick="openTabs(event,'tab{{$keyCourse}}','{{$course->id}}')" >{{$course->name}}</div>

							</div>

							@endforeach
						</div>
						<div class="col-md-7" style="padding:0 50px;max-height: 330px;overflow: auto;border-right:3px solid #999999;">
							<div class="row">
								@foreach($school->has_courses as $keyCourse => $course)
								<div class="col-md-12 tabcontent" id="tab{{$keyCourse}}">
									<div class="row">
										@foreach($course->programs as $keyProgram => $program)
										<div class="col-md-12 ">	
											<div class="program-tablinks" style="padding:8px;" onclick="openProgramTabs(event,'programTab{{$program->id}}-{{$keyCourse}}')"> <strong> {{$program->name}} </strong> </div>
											<div class="program-tabcontent" id="programTab{{$program->id}}-{{$keyCourse}}">

												<table class="table table-bordered">
													<tr>
														<th colspan="2"> Fees </th> <th>Duration</th>
													</tr>
													<tr>
														<td>Course Fee </td> <td> {{$school->curr_symbol}} {{$program->fee}} / Cicilan {{$program->fee_installment}}x </td> <td rowspan="4" style="vertical-align: middle;text-align: center;">{{$program->duration}}</td>
													</tr>
													<tr>
														<td>Enrollment Fee </td> <td>{{$school->curr_symbol}} {{$program->enrollment_fee}}</td>
													</tr>
													<tr>
														<td>Material Fee </td> <td> {{$school->curr_symbol}} {{$program->material_fee}}</td>
													</tr>
													<tr>
														<td>Total</td> <td>{{$school->curr_symbol}} {{$program->fee + $program->enrollment_fee + $program->material_fee}}</td>
													</tr>
												</table>
												<p> Course Information : <div style="text-align:justify"> {!! $program->course_information !!} </div></p>
												<p class="text-right" style="font-size:17px;"> <a href="{{url('cari-sekolah/search/program/'.$program->id.'/details')}}" target="_blank">Details >></a></p>
											</div>
										</div>
										
										@endforeach
									</div>
								</div>
								@endforeach
							</div>
							
						</div>
					</div>
				</div>
				@endif
				<!-----------------------------------------------------444444444444444444444444444444444444444444------------------------------
				<div class="col-md-12 card" style="margin-top: 20px;padding: 10px;height: 300px;overflow: auto;">
					<div class="row" style="margin: 0;margin-bottom: 10px">
						<div class="col-md-4"></div>
						<div class="col-md-4" style="text-align: center;font-size: 20px"><strong>Facilities</strong></div>
						<div class="col-md-4"></div>
					</div>
					<div class="col-md-12 " style="max-height: auto">
						<div class="col-md-4"><img src="img/studentlounge.jpg" style="width: 350px;height: 200px"></div>
						<div class="col-md-2" style="font-size: 20px;height: 200px;text-align: center;">Student Lounge</div>
						<div class="col-md-6" style="overflow: auto;height: 200px"><p>Excelsia College’s Student Centre provides a place of retreat for students between classes. The Student Centre is fitted with modern furniture and lounge areas, creating a relaxed atmosphere for students to catch up, study or have lunch. Facilities include vending machines, massage chairs, game tables, and a kitchen area equipped with free coffee machines and microwave ovens. Throughout the year, the Student Centre is used for various student and alumni events and functions.</p>
							<p>Excelsia College’s Student Centre provides a place of retreat for students between classes. The Student Centre is fitted with modern furniture and lounge areas, creating a relaxed atmosphere for students to catch up, study or have lunch. Facilities include vending machines, massage chairs, game tables, and a kitchen area equipped with free coffee machines and microwave ovens. Throughout the year, the Student Centre is used for various student and alumni events and functions.</p>
						</div>	
					</div>
					<div class="col-md-12 " style="max-height: auto;padding-top: 30px">
						<div class="col-md-4"><img src="img/audit.jpg" style="width: 350px;height: 200px"></div>
						<div class="col-md-2" style="font-size: 20px;height: 200px;text-align: center;">Auditorium</div>
						<div class="col-md-6" style="overflow: auto;height: 200px"><p>Excelsia College’s auditorium provides a professional rehearsal and performance space for our drama and music courses. It houses audiences of 150, with the ability to be converted into a formal event venue.
						The auditorium features comfortable tiered seating and state-of-the-art audio-visual and lighting equipment. The lighting system is equipped with hot power and 36 dimmers, with 72 patch points throughout the space. 24 are accessible in the wings for floor package, and 48 points are on 4 lighting bars in the rigging above the stage. DMX and Data points can be found throughout the space, allowing flexible setup and routing.</p>
						<p>Excelsia College’s auditorium provides a professional rehearsal and performance space for our drama and music courses. It houses audiences of 150, with the ability to be converted into a formal event venue.
						The auditorium features comfortable tiered seating and state-of-the-art audio-visual and lighting equipment. The lighting system is equipped with hot power and 36 dimmers, with 72 patch points throughout the space. 24 are accessible in the wings for floor package, and 48 points are on 4 lighting bars in the rigging above the stage. DMX and Data points can be found throughout the space, allowing flexible setup and routing.</p>
					</div>	
				</div>
			</div>
		-->
		<!-----------------------------------------------------555555555555555555555555555555555555555555-------------------------------->
		@if($school->galleries->count() > 0)
		<div class="col-md-12 card" style="margin-top: 20px;padding:15px;">
			<div class="row" style="margin: 0;margin-bottom: 10px">
				<div class="col-md-4"></div>
				<div class="col-md-4" style="text-align: center;"> <h4><strong>Gallery</strong></h4></div>
				<div class="col-md-4"></div>
			</div>
				<div class="row">
					<div class="col-md-12 slick-slider gallery-slider">
						@foreach($school->galleries as $key => $value)
						<div class="slick-slide">
							<div class="col-md-12" style="background-color:#444;">
								<div class="row">
									<img src="{{asset('img/schools/').'/'.$value->school_id.'/'.$value->image}}" class="gallery-image" style="width:auto;height: auto;max-height:450px;display: block;margin:0 auto;" alt="">
								</div>
							</div>
						</div>	
						@endforeach

					</div>
				</div>

		</div>
		@endif
		<!-----------------------------------------------------666666666666666666666666666666666666666666------------------------------
		<div class="col-md-12 card" style="margin-top: 20px;padding: 15px;">
			<div class="row" style="margin: 0;margin-bottom: 10px">
				<div class="col-md-12" style="text-align: center;font-size: 20px"><strong>	</strong></div>
				
			</div>

		</div>
	-->
		<!-----------------------------------------------------666666666666666666666666666666666666666666------------------------------
		<div class="col-md-12 country-wrapper" style="margin-top: 20px;padding: 10px;">
			<div class="row" style="margin: 0;margin-bottom: 10px">
				<div class="col-md-4"></div>
				<div class="col-md-4" style="text-align: center;font-size: 20px"><strong>Academic Calendar</strong></div>
				<div class="col-md-4"></div>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-10"><img src="img/Academic Calendar.jpg" style="width:80%;height: auto"></div>
		</div>
	-->
	<!-----------------------------------------------------777777777777777777777777777777777777777777-------------------------------->
	@if($school->time_tables->count() != 0)
	<div class="col-md-12 card" style="margin-top: 20px;padding:15px;">
		<div class="row" style="margin: 0;margin-bottom: 10px">
			<div class="col-md-4"></div>
			<div class="col-md-4" style="text-align: center;"><h4><strong>Time Table</strong></h4></div>
			<div class="col-md-4"></div>
		</div>
		<div class="row form-group">
		
			<div class="col-md-12 time-table-wrapper" style="max-height: 450px;overflow-y: auto;">
				<div class="row">
				@foreach($school->time_tables->groupBy('program_name') as $key => $timetableProgram)

				<div class="{{ $key != '' ? 'col-md-6' : 'col-md-12'}}" @if($school->time_tables->groupBy('program_name')->count() == 1) style="display:block;margin: 0 auto;" @endif>
					<div class="col-md-12 text-center">
						<div class="row">
							<div class="col-md-12" > <h5 style="display: table;width: 100%"><strong style="line-height: 1.4em;height:2.8em;display: table-cell;vertical-align: middle;">{{$key}}</strong></h5></div>

							<table class="table table-bordered">	
								@foreach($timetableProgram->groupBy('type') as $type => $timeTable)

								@if($type != "")
								<tr> <td colspan="2">{{$type}}</td> </tr>
								@endif	
								
								@foreach($timeTable as $data)
								<tr> <td>{{$data->days}}</td> <td>{{$data->time}}</td></tr>
								@endforeach
								@endforeach
							</table>
						</div>
					</div>


				</div>


				@endforeach
			</div>
			</div>
		</div>
		
	</div>
	@endif
	@if($school->intakes->count() != 0)
	<div class="col-md-12 card" style="margin-top: 20px;padding:15px;">
		<div class="row" style="margin: 0;margin-bottom: 10px">
			<div class="col-md-4"></div>
			<div class="col-md-4" style="text-align: center;"><h4><strong>School Intakes</strong></h4></div>
			<div class="col-md-4"></div>
		</div>
		<div class="row form-group">
		
			<div class="col-md-12 time-table-wrapper" style="max-height: 450px;overflow-y: auto;">
				<div class="row">
					@php
					/*$month = array("January" => 1,"February" => 2,"March" => 3,"April" => 4, "May" => 5,"June" => 6,"July" => 7,"August" => 8, "September" => 9,"October" => 10, "November" =>11 , "December" => 12);
					
					
					$array = $school->intakes->where("term","!=","")->where("program_id","!=","")->groupBy("term");

					$x=0;
					$new_array = array();
					foreach($array->toArray() as $key => $data){
					
					$new_array[$month[$key]] = $key;
					$x++;
					}
					ksort($new_array);
					$school_intakes = collect(array_flip($new_array))->merge($array);
					*/


					/*uksort($array,function($a,$b) use ($month,$x){

					 echo $month[$a].'-'.$month[$b].'<br>';
					 if($month[$a] > $month[$b]){
					 $new_array[$x] = $month[$b];
						}
					});*/
					@endphp

					<div class="{{ $key != '' ? 'col-md-12' : 'col-md-12'}}">
					<div class="col-md-12 text-center">
						<div class="row">
							
					<!-- @if($key != "") <div class="col-md-12" > <h5 style="display: table;width: 100%"><strong style="line-height: 1.4em;height:2.8em;display: table-cell;vertical-align: middle;">{{$key}}</strong></h5></div> 		@endif-->
				 		

				 		@if($school->intakes->where("term","")->count())
				 		<div class="col-md-12 text-center"> No Term - Intakes</div>
						<table class="table table-bordered">
						
						@foreach($school->intakes->where("term","")->groupBy("year") as $key => $intakeTerm)	

							<tr><th colspan="3">{{$key}}</th></tr>
							<tr><td>Term</td><td>Program</td> <td>Intake Date</td> <td>Orientation Date</td> <td>Note</td> </tr>
							@foreach($intakeTerm as $data)
							<tr>
								<td>{{$data->term}}</td><td>{{$data->program_name}}</td><td>{{$data->intake_date != "" ? date("d F Y",strtotime($data->intake_date)) : "To be confirmed"}}</td> <td>{{$data->orientation_date != "" ? date("d F Y",strtotime($data->orientation_date)) : "To be confirmed"}}</td> <td>{{$data->note}}</td>
							</tr>
							@endforeach
						@endforeach

						</table>
						@endif



						@if($school->intakes->where("term","!=","")->where("program_id","=",""))
						<div class="col-md-12 text-center">All Programs</div>
						<table class="table table-bordered">
						@foreach ($school->intakes->where("term","!=","")->where("program_id","=","")->groupBy("year") as $key => $intakeTerm)

							<tr><th colspan="3">{{$key}}</th></tr>
								<tr> <td>Term</td><td>Intake Date</td> <td>Orientation Date</td> </tr>
								@foreach($intakeTerm as $data)
								<tr>
									<td>{{$data->term}}</td><td>{{$data->intake_date != "" ? date("d F Y",strtotime($data->intake_date)) : "To be confirmed"}}</td> <td>{{$data->orientation_date != "" ? date("d F Y",strtotime($data->orientation_date)) : "To be confirmed"}}</td>
									
								</tr>
								@endforeach
						@endforeach
						</table>
						@endif


						@if($school->intakes->where("term","!=","")->where("program_id","!=",""))
						<div class="col-md-12 text-center">Programs Intake</div>
						<table class="table table-bordered">
						@foreach ($school->intakes->where("term","!=","")->where("program_id","!=","")->groupBy("year") as $key => $intakeTerm)

							<tr><th colspan="4">{{$key}}</th></tr>
								<tr> <td>Term</td><td>Program</td><td>Intake Date</td> <td>Orientation Date</td> </tr>
								@foreach($intakeTerm as $data)
								<tr>
									<td>{{$data->term}}</td>
									<td>{{$data->program_name}}</td>
									<td>{{$data->intake_date != "" ? date("d F Y",strtotime($data->intake_date)) : "To be confirmed"}}</td> <td>{{$data->orientation_date != "" ? date("d F Y",strtotime($data->orientation_date)) : "To be confirmed"}}</td>
									
								</tr>
								@endforeach
						@endforeach
						</table>
						@endif
						</div>
					</div>
				</div>

			</div>
			</div>
		</div>
		
	</div>
	@endif
	<!------------------------------------------------777777777777777777777777777777777777777777-------------------------------->
	@if($school->other_fees->count() > 0)
	<div class="col-md-12 card" style="margin-top: 20px;padding: 15px;">
		<div class="row" style="margin: 0;margin-bottom: 10px">
			<div class="col-md-4"></div>
			<div class="col-md-4" style="text-align: center;"><h4><strong>Other Fees</strong></h4></div>
			<div class="col-md-4"></div>
		</div>
		<div class="row form-group">
			<div class="col-md-12" style="max-height: 450px;overflow-y: auto;margin-bottom:15px;">
			<table class="table table-bordered">
				<colgroup>
					<col>
					<col style="min-width:100px;">
					<col>
				</colgroup>
				<thead>
				<tr> <th>Name</th> <th>Fee</th> <th>Details</th></tr>
				</thead>
				<tbody>
				@foreach($school->other_fees as $key => $value)
				<tr>
					<td>{{$value->name}}</td> <td>{{ $value->fee != "" ? $school->curr_symbol.' '.$value->fee : ""}}</td> <td>{{urldecode($value->details)}}</td>
				</tr>
				@endforeach
				</tbody>
			</table>
			</div>
		</div>
	</div>
	@endif
	<!------------------------------------------------777777777777777777777777777777777777777777-------------------------------->
	@if($school->refunds->count() != 0)
	<div class="col-md-12 card" style="margin-top: 20px;padding: 15px;">
		<div class="row" style="margin: 0;margin-bottom: 10px">

			<div class="col-md-12" style="text-align: center;"><h4><strong>Refund Policy</strong></h4></div>
		</div>
		<div class="row form-group">
		<div class="col-md-12">
			<table class="table table-bordered">
				@foreach($school->refunds as $value)
				<tr>
					<td>{{$value->name}}</td> <td> {{$value->jlh_refund_persen != "" ? $value->jlh_refund_persen.'%' : $value->jlh_refund_total}} </td><td>
						{{urldecode($value->details)}}</td>
					</tr>
					@endforeach
				</table>
			</div>
			</div>
		</div>
		@endif	

	@if($school->student_informations->count() != 0)
	@php
	$student_informations = $school->student_informations->first();
	$obligations = explode('|',$student_informations->obligations);
	$rights = explode('|',$student_informations->rights);
	@endphp
	<div class="col-md-12 card" style="margin-top: 20px;padding:15px;">
		<div class="row" style="margin: 0;margin-bottom: 10px">

			<div class="col-md-12" style="text-align: center;"><h4><strong>Student Information</strong></h4></div>
		</div>
			<div class="row form-group">
				<div class="col-md-6" style="max-height: 450px;overflow-y: auto;">
						<table class="table table-bordered">
							<tr><th>Rights</th></tr>
				@foreach($rights as $key=> $value)
				<tr><td>{{$value}}</td></tr>
				@endforeach
			</table>

				</div>
				<div class="col-md-6" style="max-height: 450px;overflow-y: auto;">
						<table class="table table-bordered">
							<tr> <th>Obligations</th> </tr>
				@foreach($obligations as $value)
				<tr><td>{{$value}}</td></tr>
				@endforeach
			</table>

				</div>
			</div>
</div>
@endif
</div>
</div>
</div>
</div>

@stop	
@push('more-script')
<script src="https://bestpartnereducation.com/public/js/slick.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.slick-slider').slick({
			infinite: true,
			slidesToScroll: 1,
			slidesToShow: 1,
			lazyLoad: 'ondemand',
			rows: 1,
			prevArrow: '<a class="myslick-prev myslick-nav myslick-nav2" ><i class="fa fa-angle-left"></i></a>',
			nextArrow: '<a class="myslick-next myslick-nav myslick-nav2"> <i class="fa fa-angle-right"></i> </a>',
			autoplay: true,
			autoplaySpeed: 4500,

			responsive: [{
				breakpoint: 600,
				settings: {
					arrows: false,
					adaptiveHeight: true,
				}
			}]
		});
	});
	function openTabs(evt,tabid,id_jurusan){
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(tabid).style.display = "block";
		evt.currentTarget.className += " active";
	}
	function openProgramTabs(evt,tabid){
		$('#'+tabid).toggle();
		
	}
</script>
@endpush
