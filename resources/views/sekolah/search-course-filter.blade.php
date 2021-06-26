@if(isset($schools))
@if($schools->count())
<div class="row">
@foreach($schools as $school)
<div class="col-md-6" style="padding:15px;">
	<a href="{{url('search-schools/school/'.$school->id.'/details')}}" style="color:black;text-decoration: none;">
		<div style="display: grid;grid-template-columns: 120px auto;border:1px solid #bebebe; border-radius:10px;padding:15px;height: 125px;">
			<div style="height:80px;width:80px;border:1px solid #c9c9c9;border-radius: 50%;margin:0 15px;overflow: hidden;white-space:nowrap;text-align:center;padding-right:8px;float:left; align-self: center">
				<span style="display: inline-block;height:100%;vertical-align: middle;"></span>
				<img src="{{asset('img/schools/logo_sekolah/'.$school->logo)}}" style="max-height:100%;max-width:100%;vertical-align: middle;">

			</div>
			<div style="align-self: center;" class="search-school-name">
				<div style="font-size:1.1rem;font-weight: bold;">
					{{$school->name}}
				</div>
				<div>
					{{$school->city_name}}, {{$school->region_name}}, {{$school->country_name}}	
				</div>

			</div>
		</div>
	</a>
</div>
@endforeach
</div>
@else
<h1> No Results Found ! </h1>	
@endif
##
{{$schools->links('sekolah.search-course-pagination')}}
@else
@if($schoolPrograms->where('programs','!=',[])->count())
@foreach($schoolPrograms->where('programs','!=',[]) as $key => $value)
<div class="col-md-12 col-lg-12 search-result" title="{{$value['name']}}" style="margin-bottom:15px;">
	<div class="row">
		<div class="col-md-12" style="margin-bottom:15px;border-bottom: 1px solid #dedede;">
			<div class="col-md-12" style="margin-bottom: 25px;">
				<div class="row">
					<div class="col-lg-2" style="padding:0;">
						<div style="height:80px;width:80px;border:1px solid #c9c9c9;border-radius: 50%;margin:0 15px;overflow: hidden;white-space:nowrap;text-align:center;padding-right:8px;float:left;">
							<span style="display: inline-block;height:100%;vertical-align: middle;"></span>
							<img src="{{asset('img/schools/logo_sekolah/'.$value['logo'])}}" style="max-height:100%;max-width:100%;vertical-align: middle;">

						</div>
					</div>
					<div class="col-lg-10 school-wrapper">
						<a href="{{url('search-schools/school/'.$value['id'].'/details')}}" class="school-link">
							<h4 style="margin-bottom:5px;"><strong style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;display: block;">{{$value['name']}}</strong></h4>
							<div style="color:black;">{{$value['address']}}</div>
							<p style="color:black;">{{$value['city_name'].', '.$value['region_name'].', '.$value['country_name']}}</p>
						</a>
					</div>
				</div>


			</div>

			@if(count($value['programs']) >= 1)
			<div class="col-md-12">
				

				@foreach(array_chunk(array_slice($value['programs'],0,4),2) as $program_chunk)
				<div class="row">
					@foreach($program_chunk as $program)
					<a href="{{url('cari-sekolah/search/program/'.$program['id'].'/details')}}" class="col-md-6" style="color:black;margin-bottom:15px;padding:0 22.5px;" target="_blank">
						<div class="row">
							<div class="col-md-12" style="border:1px solid #cecece;border-radius:5px;padding:15px;">
								<div class="row">
									<div class="col-md-12"><h5 title="{{$program['course_name']}} - {{$program['name']}}" class="school-link" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{$program['course_name']}} - {{$program['name']}}</h5></div>
									<div class="col-md-12">
										<div class="fee-details"> <strong>TUITION FEE:</strong> <br> {{$value['curr_symbol'].' '.$program['fee'].' '.$value['curr_code']}}
										</div>
										<div class="fee-details"> <strong>APPLICATION FEE:</strong> <br>@if($program['enrollment_fee'] != "" ) {{$value['curr_symbol'].' '.$program['enrollment_fee'].' '.$value['curr_code']}} 
										@else - @endif</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					@endforeach
				</div>
				@endforeach
				@if(count(array_slice($value['programs'],4)))
				<div style="margin-bottom:15px;" onclick="toggleMore('#more{{$key}}')">
					<h5>
						Show {{count(array_slice($value['programs'],4))}} More
					</h5>
				</div>

				<div id="more{{$key}}" style="display:none;" >
					@foreach(array_chunk(array_slice($value['programs'],4),2) as $program_chunk)
					<div class="row">
						@foreach($program_chunk as $program)
						<a href="{{url('cari-sekolah/search/program/'.$program['id'].'/details')}}" class="col-md-6" style="color:black;margin-bottom:15px;padding:0 22.5px;" target="_blank">
							<div class="row">
								<div class="col-md-12" style="border:1px solid #cecece;border-radius:5px;padding:15px;">
									<div class="row">
										<div class="col-md-12"><h5 title="{{$program['course_name']}} - {{$program['name']}}" class="school-link" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{$program['course_name']}} - {{$program['name']}}</h5></div>
										<div class="col-md-12">
											<div class="fee-details"> <strong>TUITION FEE:</strong> <br> {{$value['curr_symbol'].' '.$program['fee'].' '.$value['curr_code']}}
												<br>
												$ {{number_format($program['fee'] / json_encode($ex_rate_usd[$value['curr_code']]),2,',','.')}} USD
												<br>
												Rp. {{number_format($program['fee'] / json_encode($ex_rate_idr[$value['curr_code']]),2,',','.')}} IDR
											</div>
											<div class="fee-details"> <strong>APPLICATION FEE:</strong> <br>@if($program['enrollment_fee'] != "" ) {{$value['curr_symbol'].' '.$program['enrollment_fee'].' '.$value['curr_code']}}
												<br>
												$ {{number_format($program['enrollment_fee'] / json_encode($ex_rate_usd[$value['curr_code']]),2,',','.')}} USD
												<br>
												Rp. {{number_format($program['enrollment_fee'] / json_encode($ex_rate_idr[$value['curr_code']]),2,',','.')}} IDR
											@else - @endif</div>
										</div>
									</div>
								</div>
							</div>
						</a>
						@endforeach



					</div>
					@endforeach
				</div>
				@endif
				
			</div>
			@else
			<div class="col-md-12" style="margin-bottom:15px;"><h1>No Programs With Requested Fee</h1></div>

			@endif
		</div>
	</div>

</div>

@endforeach
@else
<h1>
	No Results Found !
</h1>
@endif
##
@if($schoolPrograms->where('programs','!=',[])->count())
{{$schoolPrograms->links('sekolah.search-course-pagination',['result' => 'programs'])}}
@endif
@endif
