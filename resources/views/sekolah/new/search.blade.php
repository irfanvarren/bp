@extends('layouts.search-school')
@push('head-script')
<style type="text/css">
	.keyword-wrapper {
		display:none;
		padding:0 !important;

	}
	.keyword-wrapper > div{
		background:white;
		padding:8px 10px 8px 10px;
		box-shadow:0px 0px 3px #ccc;
		z-index:10;
	}
	.keyword-wrapper .suggestion{
		padding:8px 12px;
		border-bottom:1px solid #ccc;
	}
	.keyword-wrapper .suggestion:hover{
		cursor:pointer;
		background: #ededed;
	}
	.keyword-wrapper .suggestion.selected{
		background: #ededed;
	}
</style>
@endpush
@section('sidebar-content')
<div class="loading">
	<div>
		Loading...
	</div>
</div>
<div class="col-md-12 content-wrapper" style="padding:0 15px;">
	<div class="row">
		<div class="col-md-12" style="background-image:url({{asset('img/schools/search-school-background.png')}});padding:30px;background-repeat: no-repeat;background-size: cover;background-color:#366096;">
			
			<div class="row justify-content-center">
				<div class="col-md-12">
					<h1 style="text-align:center;color:white;font-size:36px;"><strong>Search <span id="search-type-name">{{$result != "schools" ? 'Courses' : 'Schools'}}</span></strong></h1>
				</div>
				<!-- <div class="col-md-7 search-wrapper">
					<div class="row">
						<div class="col-md-8">	
							<div class="row">
								@csrf
								<input type="text" id="keyword_programs" name="keyword_programs" value="" placeholder="Programs..." class="col-md-12 field_pencarian keyword  {{$result != "programs" ? 'hide' : ''}}">
								
								<input type="text" id="keyword_schools" name="keyword_schools" value="" placeholder="Schools..." class="col-md-12 field_pencarian keyword {{$result != "schools" ? 'hide' : ''}}" >
							</div>
						</div>
						<div class="col-md-4">
							<div class="row">
								<input type="button" class="search-btn col-md-12" value="Search" onClick="filter_search()">
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
		<div class="col-md-12" style="padding:15px;">

			<div class="row">
				<div class="col-md-12 col-lg-3">

					<form name="myform" id="myform" action="{{route('search-course-filter')}}" method="POST">
						@csrf
						<input type="hidden" name="search_type" id="search_type" value="course">
						<input type="hidden" name="id_jurusan" id="id_jurusan">
						<input type="hidden" name="filter_result" id="filter_result" value="{{$result}}" autocomplete="off">
						<div class="col-md-12" style="padding:15px;">
							<div class="row">
								<div class="col-md-12">
									<h3> <strong> Filter Your Search </strong> </h3>
									<div class=" col-md-12">
										<div class="row mb-2">
											<label class="col-form-label">Search By Country</label>
											<select class="form-control selectize" name="country_id" id="country_id">
												<option value="">Select Country</option>
												@if(isset($country))

												@foreach($country as $key => $value)
												<option value="{{$value->id}}">{{$value->name}}</option>

												@endforeach
												@endif

											</select>
										</div>
										<div class="row mb-2">
											<label class="col-form-label">Search By Region</label>
											<select class="form-control selectize" name="region_id" id="region_id">
												<option value="">Select Country First</option>


											</select>
										</div>
										<div class="row mb-2">
											<label class="col-form-label">Search By City</label>
											<select class="form-control selectize" name="city_id" id="city_id">
												<option value="">Select Region First</option>


											</select>
										</div>
										<div class="row mb-2">
											<label class="col-form-label">Search By Qualification</label>
											<select class="form-control selectize" name="qualification_id" id="qualification_id">
												<option value="">Select Qualification</option>
												@foreach($qualifications as $qualification)
												<option value="{{$qualification->id}}">{{$qualification->name}}</option>
												@endforeach
											</select>	
										</div>
										<div class="row mb-2">
											<label class="col-form-label">Course</label>
											<select class="form-control selectize" name="course_id" id="course_id">
												<option value="">Select Course</option>
												@foreach($courses as $course)
												<option value="{{$course->id}}">{{$course->name}}</option>
												@endforeach
											</select>
										</div>
										<div class="row mb-2">
											<label class="col-form-label">{{ucwords($result)}}'s Name</label>
											<input type="text" id="keyword_programs" name="keyword_programs" value="" placeholder="Programs..." class="col-md-12 field_pencarian keyword   {{$result != "programs" ? 'hide' : ''}}" autocomplete="off">

											<input type="text" id="keyword_schools" name="keyword_schools" value="" placeholder="Schools..." class="col-md-12 field_pencarian keyword {{$result != "schools" ? 'hide' : ''}}"  autocomplete="off">
											<div class="col-md-12 keyword-wrapper">
												<div class="col-md-12 " id="output-jurusan" style="max-height:185px; overflow:auto;position:absolute;">
													@if(isset($keyword))
													@foreach($keyword as $data_keyword)
													@php
													$id_jurusan = $data_keyword->id;
													$nama_jurusan = $data_keyword->name;
													@endphp

													<div class="col-md-12 suggestion-list suggestion" data-value="{{$id_jurusan.'|'.$nama_jurusan}}" onClick="pilih_suges('{{$id_jurusan}}','{{$nama_jurusan}}')">{{$nama_jurusan }}</div>
													@endforeach
													@endif
												</div>

											</div>
										</div>
										<div class="row form-group">
											
											<label class="col-form-label col-md-12">
												<div class="row">
													Search By Course Fee
												</div>	
											</label>
											<div class="col-md-6" style="padding: 0 !important">
												<input type="text" class="form-control" name="min_fee" id="min_fee" placeholder="Harga Min" value="{{session('min_fee')}}">
											</div>
											<div class="col-md-6" style="padding:0 !important">
												<input type="text" class="form-control" name="max_fee" id="max_fee" placeholder="Harga Max" value="">
											</div>
										</div>
										<div class="row"> <div> <button type="button" onclick="filter_search();" style="padding: 5px 24px" class="btn btn-primary">Search</button></div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</form>


			</div>
			<div class="col-md-12 col-lg-9">	
				<div class="not-found"> <div>Not Found</div> </div>
				<div class="row" id="output">
					<div class="col-md-12">
						<div class="tab">
							
							@if(!isset($result))
							@php
							$result = "";
							@endphp
							@endif
							<button class="tablinks {{$result == 'programs' ? 'active' : ''}}" onclick="openTab(event, 'programs')">Programs</button>
							<button class="tablinks {{$result == 'schools' ? 'active' : ''}}" onclick="openTab(event, 'schools')">Schools</button>
						</div>
					</div>
					<div class="col-md-12" id="search-result-wrapper" style="height:75vh;overflow:auto;padding-top:30px;	">
						@if(isset($searchResult))
						@if(count($searchResult))

						@if($result == "schools")
						<div class="row">
							@foreach($searchResult as $school)
							<a class="col-md-6" href="{{url('search-schools/school/'.$school->id.'/details')}}" style="color:black;text-decoration: none;">
								<div style="padding:15px;">
									<div style="display: grid;grid-template-columns: 120px auto;border:1px solid #bebebe; border-radius:10px;padding:15px;height: 125px;">
										<div style="height:80px;width:80px;border:1px solid #c9c9c9;border-radius: 50%;margin:0 15px;overflow: hidden;white-space:nowrap;text-align:center;padding-right:8px;float:left; align-self: center">
											<span style="display: inline-block;height:100%;vertical-align: middle;"></span>
											<img src="{{asset('img/schools/logo_sekolah/'.$school->logo)}}" style="max-height:100%;max-width:100%;vertical-align: middle;">
										</div>
										<div style="align-self: center;">
											<div style="font-size:1.1rem;font-weight: bold;" class="search-school-name">
												{{$school->name}}
											</div>
											<div>
												{{$school->city_name}}, {{$school->region_name}}, {{$school->country_name}}	
											</div>
										</div>
									</div>
								</div>
							</a>
							@endforeach
						</div>
						@elseif($result == "programs")
						@foreach($searchResult->where('programs','!=',[]) as $key => $value)
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
									@if(count($value['programs']) > 1)
									<div class="col-md-12">
										@foreach(array_chunk(array_slice($value['programs'],0,4),2) as $program_chunk)
										<div class="row">
											@foreach($program_chunk as $program)
											<a href="{{url('cari-sekolah/search/program/'.$program['id'].'/details')}}" class="col-md-6" style="color:black;margin-bottom:15px;padding:0 22.5px;" target="_blank">
												<div class="row">
													<div class="col-md-12" style="border:1px solid #cecece;border-radius:5px;padding:15px;">
														<div class="row">
															<div class="col-md-12"><h5 title="{{$program['course_name']}} - {{$program['name']}}" style="color:blue;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{$program['course_name']}} - {{$program['name']}}</h5></div>
															<div class="col-md-12 school-price-wrapper"  aria-describedby="tooltip">
																<div class="fee-details"> <strong>TUITION FEE:</strong> <br> {{$value['curr_symbol'].' '.$program['fee'].' '.$value['curr_code']}}
																</div>
																<div class="fee-details"> <strong>APPLICATION FEE:</strong> <br>@if($program['enrollment_fee'] != "" ) 
																	{{$value['curr_symbol'].' '.$program['enrollment_fee'].' '.$value['curr_code']}} 
																	@else
																	-
																	@endif
																</div>
															</div>
															<div class="tooltip" id="tooltip" role="tooltip" style="opacity: auto !important">
																My Tooltip
																<div id="arrow" data-popper-arrow></div>
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
																<div class="col-md-12"><h5 title="{{$program['course_name']}} - {{$program['name']}}" style="color:blue;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{$program['course_name']}} - {{$program['name']}}</h5></div>
																<div class="col-md-12">
																	<div class="fee-details"> <strong>TUITION FEE:</strong> <br> {{$value['curr_symbol'].' '.$program['fee'].' '.$value['curr_code']}}
																	</div>
																	<div class="fee-details"> <strong>APPLICATION FEE:</strong> <br>@if($program['enrollment_fee'] != "" ) 
																		{{$value['curr_symbol'].' '.$program['enrollment_fee'].' '.$value['curr_code']}} 
																		@else
																		-
																		@endif
																	</div>
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
						@endif


						@else

						<h1> No Result Found ! </h1>

						@endif



						@else
						<div class="col-md-12" style="border-bottom:1px solid #aaa;padding-bottom:15px;margin-bottom:15px">
							<div class="row">
								<div style="width:48px;height:48px;border-radius:50%;background-color:#e0e0e0;margin-right:48px;background-size: 50%;background-repeat: no-repeat;"></div>
								<div style="min-width:80%;height: 24px;background-color:#e0e0e0"></div>
								<div style="width:80%;height: 24px;background-color:#e0e0e0;margin:15px 0 10px 0;"></div>
								<div style="width:70%;height: 24px;background-color:#e0e0e0;margin:15px 0 10px 0;"></div>
							</div>
						</div>
						<div class="col-md-12" style="border-bottom:1px solid #aaa;padding-bottom:15px;margin-bottom:15px">
							<div class="row">
								<div style="width:48px;height:48px;border-radius:50%;background-color:#e0e0e0;margin-right:48px;background-size: 50%;background-repeat: no-repeat;"></div>
								<div style="min-width:80%;height: 24px;background-color:#e0e0e0"></div>
								<div style="width:80%;height: 24px;background-color:#e0e0e0;margin:15px 0 10px 0;"></div>
								<div style="width:70%;height: 24px;background-color:#e0e0e0;margin:15px 0 10px 0;"></div>
							</div>
						</div>
						<div class="col-md-12" style="border-bottom:1px solid #aaa;padding-bottom:15px;margin-bottom:15px">
							<div class="row">
								<div style="width:48px;height:48px;border-radius:50%;background-color:#e0e0e0;margin-right:48px;background-size: 50%;background-repeat: no-repeat;"></div>
								<div style="min-width:80%;height: 24px;background-color:#e0e0e0"></div>
								<div style="width:80%;height: 24px;background-color:#e0e0e0;margin:15px 0 10px 0;"></div>
								<div style="width:70%;height: 24px;background-color:#e0e0e0;margin:15px 0 10px 0;"></div>
							</div>
						</div>
						<div class="col-md-12" style="border-bottom:1px solid #aaa;padding-bottom:15px;margin-bottom:15px">
							<div class="row">
								<div style="width:48px;height:48px;border-radius:50%;background-color:#e0e0e0;margin-right:48px;background-size: 50%;background-repeat: no-repeat;"></div>
								<div style="min-width:80%;height: 24px;background-color:#e0e0e0"></div>
								<div style="width:80%;height: 24px;background-color:#e0e0e0;margin:15px 0 10px 0;"></div>
								<div style="width:70%;height: 24px;background-color:#e0e0e0;margin:15px 0 10px 0;"></div>
							</div>
						</div>
						<div class="col-md-12" style="border-bottom:1px solid #aaa;padding-bottom:15px;margin-bottom:15px">
							<div class="row">
								<div style="width:48px;height:48px;border-radius:50%;background-color:#e0e0e0;margin-right:48px;background-size: 50%;background-repeat: no-repeat;"></div>
								<div style="min-width:80%;height: 24px;background-color:#e0e0e0"></div>
								<div style="width:80%;height: 24px;background-color:#e0e0e0;margin:15px 0 10px 0;"></div>
								<div style="width:70%;height: 24px;background-color:#e0e0e0;margin:15px 0 10px 0;"></div>
							</div>
						</div>

						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="overflow:auto;text-align:center;" id="result-pagination">
				@if(isset($searchResult))
				{{$searchResult->links('sekolah.search-course-pagination')}}
				@endif
			</div>
		</div>
	</div>

</div>
</div>

@endsection
@push('head-script')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style type="text/css">
	.tab {
		overflow: hidden;
		border-bottom:1px solid #b0b0b0;
	}

	/* Style the buttons inside the tab */
	.tab button {
		background-color: inherit;
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		outline: none;
		font-weight:bold;
		padding: 8px 40px;
		font-size: 17px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		/* background-color: #ddd;*/
	}

	/* Create an active/current tablink class */
	.tab button.active {
		border-bottom:2px solid #2075ba;
	}
	.field_pencarian {
		border: 1px solid #bbb !important;
		height: 40px !important;
		color: black;
	}
	.search-btn {
		color: white;
		font-size: 20px;
		height: 40px;
		background-color: #444444;
		border:none;
		margin: 15px 0;
	}
	.search-result:hover{
		cursor:pointer;
	}

	.search-btn:hover {
		cursor: pointer;
	}
	.loading{
		position: fixed;
		top:0;
		width: 100%;
		height: 100%;
		left: 0;
		font-size:28px;
		text-align: center;
		background: rgba(255,255,255,0.8);
		z-index: 20;
		display: table;
		visibility: hidden;
	}
	.loading > div {
		display: table-cell;
		vertical-align: middle;
	}

	.not-found{
		display:none;
		width: 100%;
		height: 100%;
	}
	.not-found > div {
		text-align: center;
		display: table-cell;
		vertical-align: middle;
	}
	.course-name{
		color:#193470;
		text-align:left;
		font-weight:bold;
		margin-bottom:10px;
	}
	.school-wrapper{
		padding:0 30px;	
		float:left;
	}

	.school-name{
		display: flex;
		line-height:1.2em;
		height:2.4em;
		color:#193470;
		margin-bottom:0 !important	;
		font-weight: bold;
		overflow:hidden;
		align-items: center;	
	}
	.search-school-name{
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;  
		overflow: hidden;
		line-height: 1.2em;
		max-height: 2.4em;
	}
	.pagination{
		margin-top:30px;
		justify-content: center;
	}
	.fee-details{
		float:left;
		margin-right:30px;
	}
</style>
@endpush

@push('more-script')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>

<script type="text/javascript">
	var courseAjaxTimer;
	var pointer = 0;
	function toggleMore(id){
		$(id).toggle();
	}
	var url = '{{url('cari-sekolah/search/program/')}}';
	var token = $("input[name='_token']").val();

	function filter_search(page = null,pagination_type = null,getResult = null){
		var country_id = $('#country_id').val();
		var region_id = $('#region_id').val();
		var city_id = $('#city_id').val();
		var qualification_id = $('#qualification_id').val();
		var min_fee = $('#min_fee').val();
		var max_fee = $('#max_fee').val();
		var result = $('#filter_result').val();
		var keyword = $('#keyword_'+result).val();
		if(getResult != "" && getResult != null){

			result = getResult;
		}
		$('.loading').css({
			'visibility' : 'visible'
		});
		$.ajax({
			url : "{{route('search-course-filter')}}",
			method: "GET",
			data : {
				_token : token,
				id_jurusan : "",
				country_id : country_id,
				region_id : region_id,
				city_id : city_id,
				qualification_id : qualification_id,
				min_fee : min_fee,
				max_fee : max_fee,
				keyword : keyword,
				page: page,
				pagination_type:pagination_type,
				q : "filter",
				result : result
			},
			success: function(data){
				var data = data.split("##");
				$('#search-result-wrapper').html(data[0]);
				$('#result-pagination').html(data[1]);
			},
			error: function(){

			},complete: function(){
				$('.loading').css({
					'visibility' : 'hidden'
				});
			}
		});

	}

	function openTab(evt, tabName) {
		$('#search-type-name').html(tabName[0].toUpperCase()+tabName.slice(1));
		$('.keyword').hide();
		$('#keyword_'+tabName).show();
		var i, tabcontent, tablinks;
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		evt.currentTarget.className += " active";
		var country_id = $('#country_id').val();
		var region_id = $('#region_id').val();
		var city_id = $('#city_id').val();
		var qualification_id = $('#qualification_id').val();
		var min_fee = $('#min_fee').val();
		var max_fee = $('#max_fee').val();
		if(tabName == "programs"){
			var keyword = $('#keyword_programs').val();
		}else if(tabName == "schools"){
			var keyword = $('#keyword_schools').val();
		}
		$('#filter_result').val(tabName);
		$('.loading').css({
			'visibility' : 'visible'
		});
		$.ajax({
			url : "{{route('search-course-filter')}}",
			method: "GET",
			data : {
				_token : token,
				id_jurusan : "",
				country_id : country_id,
				region_id : region_id,
				city_id : city_id,
				qualification_id : qualification_id,
				min_fee : min_fee,
				max_fee : max_fee,
				keyword : keyword,
				result : tabName
			},
			success: function(data){
				var data = data.split("##");
				$('#search-result-wrapper').html(data[0]);
				$('#result-pagination').html(data[1]);

			},
			error: function(error){
				console.log(error);
			},complete: function(){
				$('.loading').css({
					'visibility' : 'hidden'
				});
			}
		});
	}



	$('.selectize').selectize({
		width : 'resolve'
	});

	
	$(document).ready(function(){
		var country_id = $('#country_id').val();
		if(country_id){
			$.ajax({
				url : "{{route('search-course-country-ajax')}}",
				method: "GET",
				data : {
					_token : token,
					country_id : country_id
				},
				success: function(data){
					var data = JSON.parse(data);
					var $select = $('#region_id').selectize();
					var selectize = $select[0].selectize;
					selectize.destroy();
					$('#region_id').selectize({
						valueField: 'id',
						labelField: 'name',
						searchField: 'name',
						options: data
					});
				},
				error: function(error){
					console.log(error);
				}
			});	

			$.ajax({
				url : "{{route('search-course-region-ajax')}}",
				method: "GET",
				data : {
					_token : token,
					country_id : country_id
				},
				success: function(data){
					var data = JSON.parse(data);
					var $select = $('#city_id').selectize();
					var selectize = $select[0].selectize;
					selectize.destroy();
					$('#city_id').selectize({
						valueField: 'id',
						labelField: 'name',
						searchField: 'name',
						options: data
					});	
				},
				error: function(error){
					console.log(error);
				}
			});
		}
		
		
	});

	$('#country_id').on('change',function(){
		var country_id = $(this).val();
		$.ajax({
			url : "{{route('search-course-country-ajax')}}",
			method: "GET",
			data : {
				_token : token,
				country_id : country_id
			},
			success: function(data){
				var data = JSON.parse(data);
				var $select = $('#region_id').selectize();
				var selectize = $select[0].selectize;
				selectize.destroy();
				$('#region_id').selectize({
					valueField: 'id',
					labelField: 'name',
					searchField: 'name',
					options: data
				});
			},
			error: function(error){
				console.log(error);
			}
		});
		$.ajax({
			url : "{{route('search-course-region-ajax')}}",
			method: "GET",
			data : {
				_token : token,
				country_id : country_id
			},
			success: function(data){
				var data = JSON.parse(data);
				var $select = $('#city_id').selectize();
				var selectize = $select[0].selectize;
				selectize.destroy();
				$('#city_id').selectize({
					valueField: 'id',
					labelField: 'name',
					searchField: 'name',
					options: data
				});	
			},
			error: function(error){
				console.log(error);
			}
		});

	});

	$('#region_id').on('change',function(){
		var region_id = $(this).val();
		var country_id = $("#country_id").val();
		$.ajax({
			url : "{{route('search-course-region-ajax')}}",
			method: "GET",
			data : {
				_token : token,
				region_id : region_id,	
				country_id : country_id
			},
			success: function(data){
				var data = JSON.parse(data);
				var $select = $('#city_id').selectize();
				var selectize = $select[0].selectize;
				selectize.destroy();
				$('#city_id').selectize({
					valueField: 'id',
					labelField: 'name',
					searchField: 'name',
					options: data
				});	
			},
			error: function(error){
				console.log(error);
			}
		});

	});

	$(document).mouseup(function(e) 
	{
		var container = $(".field_pencarian");
		var outputJurusan = $("#output-jurusan");

		if (!container.is(e.target) && !outputJurusan.is(e.target) && container.has(e.target).length === 0) 
		{
			$('.keyword-wrapper').hide();
			$('#output-sekolah').attr('data-show','hide');
			pointer = 0;
		}
	});
	$(document).ready(function(){
		$('.keyword').on('click',function(){
			var keyword = $(this).val();
			var token = $("input[name='_token']").val();
			$.ajax({
				url : "{{route('search-course-ajax')}}",
				method: "POST",
				data : {
					_token : token,
					keyword : keyword
				},success: function(data){
					var arr_data = data.split('##');
					if(arr_data[1] > 0 ){
						$('#output-jurusan').html(arr_data[0]);
					}else{

						$('#output-jurusan').html("no result");
					}
				},error: function(){
				}
			});
			$('.keyword-wrapper').show(); 
		});
		$('.keyword').keyup(function(e){
			clearTimeout(courseAjaxTimer);
			$('.keyword-wrapper').show();
			var suges = document.getElementsByClassName('suggestion-list');
			switch(e.which) {
				case 13:

				if($('#keyword').val() != ""){
					if($('#id_jurusan').val() != ""){
						var selected_pointer = pointer - 1;
						var id_jurusan = $(suges[selected_pointer]).attr("data-value");
						var arr_jurusan = id_jurusan.split('|');
						$('#id_jurusan').val(arr_jurusan[0]);
						$('.keyword').val(arr_jurusan[1]);
						$('.keyword-wrapper').hide();
						$('.suggestion-list').removeClass("selected");
						pointer = 0;

					}else{

						document.getElementById('myform').submit();

					}
				}else{
					if(pointer > 0){
						$('#output-jurusan').scrollTop((pointer-1) * 42.6);
					}else{
						$('#output-jurusan').scrollTop(pointer * 42.6);
						suges[pointer].classList.add('selected');
					}
					suges[pointer-1].classList.add('selected');
				} 

				break;



        case 38: // up
        if(pointer > 0){
        	pointer = pointer - 1;
        	var prev = pointer;
        	prev--;
        	$('#output-jurusan').scrollTop(prev * 42.6);
        	suges[pointer].classList.remove('selected');
        	if(pointer >= 0){

        		suges[prev].classList.add('selected');            
        	}
        }
        break;


        case 40: // down
        $('#output-jurusan').scrollTop(pointer * 43);
        suges[pointer].classList.add('selected');
        if(pointer > 0){
        	var prev = pointer;
        	prev--;
        	suges[prev].classList.remove('selected');            
        }
        pointer = pointer + 1;
        break;


        default: 
        courseAjax();
        return; // exit this handler for other keys
    }
    e.preventDefault();
});


	});
	function courseAjax(){
		var keyword = $('#keyword_programs').val();
		var token = $("input[name='_token']").val();
		$.ajax({
			url : "{{route('search-course-ajax')}}",
			method: "POST",
			data : {
				_token : token,
				keyword : keyword
			},success: function(data){
				var arr_data = data.split('##');
				if(arr_data[1] > 0 ){
					$('#output-jurusan').html(arr_data[0]);
				}else{
					$('#output-jurusan').html("no result");
				}
			},
			complete:function(data){
				courseAjaxTimer = setTimeout(courseAjax,10000);
			},error: function(){
				alert('error');
			}
		});
	}
	function pilih_suges(id_jurusan,nama_jurusan){
		$('#id_jurusan').val(id_jurusan);
		$('#keyword_programs').val(nama_jurusan);
		alert(nama_jurusan);
		alert(id_jurusan);
		$('.keyword-wrapper').hide();
		$('.suggestion-list').removeClass("selected");
		pointer = 0;
	}
</script>
@endpush