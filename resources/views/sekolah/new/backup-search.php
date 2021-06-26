@extends('layouts.search-school')
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
					<h1 style="text-align:center;color:white"><strong>Search Course</strong></h1>
				</div>
				<div class="col-md-7 search-wrapper">
					<div class="row">
						<div class="col-md-8">	
							<div class="row">
								@csrf
								<input type="text" id="keyword" value="" placeholder="Course..." class="col-md-12 field_pencarian" >
							</div>
						</div>
						<div class="col-md-4">
							<div class="row">
								<input type="button" class="search-btn col-md-12" value="Search" onClick="filter_search()">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12" style="padding:15px;">

			<div class="row">
				<div class="col-md-12 col-lg-4">

					<form name="myform" id="myform" action="{{route('search-course-filter')}}" method="POST">
						@csrf
						<input type="hidden" name="search_type" id="search_type" value="course">
						<input type="hidden" name="id_jurusan" id="id_jurusan">
						<input type="hidden" name="filter_result" id="filter_result" value="{{$result != '' ? $result : 'programs'}}">
						<input type="hidden" name="keyword" id="keyword" value="">
						<div class="col-md-12" style="padding:15px;">
							<div class="row">
								<div class="col-md-12">

									<h3> <strong> Filter Your Search </strong> </h3>
									<div class=" col-md-12">
										<div class="row mb-2">
											<label class="col-form-label">Search By Country</label>
											<select class="form-control selectize" name="country_id" id="country_id" class="">
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
											<select class="form-control selectize" name="region_id" id="region_id" class="">
												<option value="">Select Country First</option>


											</select>
										</div>
										<div class="row mb-2">
											<label class="col-form-label">Search By City</label>
											<select class="form-control selectize" name="city_id" id="city_id" class="">
												<option value="">Select Region First</option>


											</select>
										</div>
										<div class="row mb-2">
											<label class="col-form-label">Search By Qualification</label>
											<select class="form-control selectize" name="qualification_id" id="qualification_id" class="">
												<option value="">Select Qualification</option>
												@foreach($qualifications as $qualification)
												<option value="{{$qualification->id}}">{{$qualification->name}}</option>
												@endforeach
											</select>	
										</div>
										<div class="row form-group">

											<!-- harga total -->
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
			<div class="col-md-12 col-lg-8">	
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

						@foreach($searchResult as $key => $value)
						<div class="col-md-12 col-lg-12 search-result" title="{{$value['name']}}" style="margin-bottom:15px;">

							<div class="col-md-12" style="padding:0 15px 15px 15px;border-bottom: 1px solid #dedede;min-height:180px;padding-bottom:30px;">
								<a href="{{url('cari-sekolah/search/program/'.$value['id'].'/details')}}" style="color:black" target="_blank">
									<div class="col-md-12" style="margin-bottom: 10px;">
										<div class="row">
											<div class="col-lg-2">
												<div style="height:80px;width:80px;border:1px solid #c9c9c9;border-radius: 50%;margin:0 15px;overflow: hidden;white-space:nowrap;text-align:center;padding-right:8px;float:left;">
													<span style="display: inline-block;height:100%;vertical-align: middle;"></span>
													<img src="{{asset('img/schools/logo_sekolah/'.$value['logo'])}}" style="max-height:100%;max-width:100%;vertical-align: middle;">

												</div>
											</div>
											<div class="col-lg-10 school-wrapper">
												<h4 class="school-name"><strong>{{$value['school_name']}}</strong></h4>
												<p>{{$value['city_name'].', '.$value['region_name'].', '.$value['country_name']}}</p>
											</div>
										</div>


									</div>
									<div class="col-md-12">
										<h5 class="course-name">
											{{$value['name']}}

										</h5>
									</div>
									<div class="col-md-12">
										<div class="fee-details"> <strong>TUITION FEE:</strong> <br> {{$value['curr_symbol'].' '.$value['fee'].' '.$value['curr_code']}}</div>
										<div class="fee-details"> <strong>APPLICATION FEE:</strong> <br>@if($value['enrollment_fee'] != "" ) {{$value['curr_symbol'].' '.$value['enrollment_fee'].' '.$value['curr_code']}} @else  @endif</div>


									</div> 
								</a>
							</div>

						</div>

						@endforeach

						@elseif($result == "programs")
						@foreach($searchResult->where('programs','!=',[]) as $key => $value)
<div class="col-md-12 col-lg-12 search-result" title="{{$value['name']}}" style="margin-bottom:15px;">
	<div class="row">
		<div class="col-md-12" style="margin-bottom:15px;border-bottom: 1px solid #dedede;">

			<div class="col-md-12" style="margin-bottom: 25px;">
				<div class="row">
					<div class="col-lg-2">
						<div style="height:80px;width:80px;border:1px solid #c9c9c9;border-radius: 50%;margin:0 15px;overflow: hidden;white-space:nowrap;text-align:center;padding-right:8px;float:left;">
							<span style="display: inline-block;height:100%;vertical-align: middle;"></span>
							<img src="{{asset('img/schools/logo_sekolah/'.$value['logo'])}}" style="max-height:100%;max-width:100%;vertical-align: middle;">

						</div>
					</div>
					<div class="col-lg-10 school-wrapper">
						<h4 style="margin-bottom:5px;"><strong style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;display: block;">{{$value['name']}}</strong></h4>
						<div>{{$value['address']}}</div>
						<p>{{$value['city_name'].', '.$value['region_name'].', '.$value['country_name']}}</p>
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
									<div class="col-md-12">
										<div class="fee-details"> <strong>TUITION FEE:</strong> <br> {{$value['curr_symbol'].' '.$program['fee'].' '.$value['curr_code']}}</div>
										<div class="fee-details"> <strong>APPLICATION FEE:</strong> <br>@if($program['enrollment_fee'] != "" ) {{$value['curr_symbol'].' '.$program['enrollment_fee'].' '.$value['curr_code']}} @else - @endif</div>
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
										<div class="fee-details"> <strong>TUITION FEE:</strong> <br> {{$value['curr_symbol'].' '.$program['fee'].' '.$value['curr_code']}}</div>
										<div class="fee-details"> <strong>APPLICATION FEE:</strong> <br>@if($program['enrollment_fee'] != "" ) {{$value['curr_symbol'].' '.$program['enrollment_fee'].' '.$value['curr_code']}} @else - @endif</div>
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
		margin-top: 15px;
		font-size: 22px;
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
		var keyword = $('#keyword').val();

		var result = $('#filter_result').val();

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
		var keyword = $('#keyword').val();
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
</script>
@endpush