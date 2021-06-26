@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style type="text/css">
	.tab {
		overflow: hidden;
		border-bottom:2px solid gray;
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
		border-bottom:2px solid #193470;
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

@section('content')
<div class="loading">
	<div>
		Loading...
	</div>
</div>
<div class="col-md-12 content-wrapper" style="padding:15px;">
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
								<input type="text" id="keyword" value="{{$keyword}}" placeholder="Jurusan..." class="col-md-12 field_pencarian" >
							</div>
						</div>
						<div class="col-md-4">
							<div class="row">
								<input type="button" class="search-btn col-md-12" value="Search" onClick="cari('course')">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<!--<div class="row">
				<div class="col-md-12">

					<div style="padding:8px;font-size:18px;"> <div class="text-right"> <span id="count-result"> {{$count}} </span> Found</div></div>
				</div>
			</div>
		-->
		<div class="row">
			<div class="col-md-4 col-lg-4">

				<form name="myform" id="myform" action="{{route('search-course-filter')}}" method="POST">
					@csrf
					<input type="hidden" name="search_type" id="search_type" value="course">
					<input type="hidden" name="id_jurusan" id="id_jurusan">
					<input type="hidden" name="filter_result" id="filter_result" value="programs">
					<input type="hidden" name="keyword" id="keyword" value="{{$keyword}}">
					<div class="col-md-12" style="padding:30px;border: 1px solid #dedede;">
						<div class="row">
							<div class="col-md-12">

								<h3> <strong> Filter Your Search </strong> </h3>
								<div class=" col-md-12">
									<div class="row">
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
									<div class="row">
										<label class="col-form-label">Search By Region</label>
										<select class="form-control selectize" name="region_id" id="region_id" class="">
											<option value="">Select Country First</option>


										</select>
									</div>
									<div class="row">
										<label class="col-form-label">Search By City</label>
										<select class="form-control selectize" name="city_id" id="city_id" class="">
											<option value="">Select Region First</option>


										</select>
									</div>
									<div class="row">
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
		<div class="col-md-8 col-lg-8">	
			<div class="not-found"> <div>Not Found</div> </div>
			<div class="row" id="output">
				<div class="col-md-12">
					<div class="tab">
						<button class="tablinks {{$result == 'programs' ? 'active' : ''}}" onclick="openTab(event, 'programs')">Programs</button>
						<button class="tablinks {{$result == 'schools' ? 'active' : ''}}" onclick="openTab(event, 'schools')">Schools</button>
					</div>
				</div>
				<div class="col-md-12" id="search-result-wrapper" style="height:520px;overflow:auto;padding-top:30px;	">
					@if(count($searchResult))
					@foreach($searchResult as $key => $value)
					<div class="col-md-12 col-lg-12 search-result" title="{{$value['name']}}" style="margin-bottom:15px;">

						<div class="col-md-12" style="padding:0 15px 15px 15px;border-bottom: 1px solid #dedede;min-height:180px;">
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
									<div class="fee-details"> <strong>TUITION FEE:</strong> <br> {{$value['curr_symbol'].' '.$value['fee'].' '.$value['curr_code']}}
										<br>
										$ {{number_format($value['fee'] / json_encode($ex_rate_usd[$value['curr_code']]),2,',','.')}} USD
										<br>
										Rp. {{number_format($value['fee'] / json_encode($ex_rate_idr[$value['curr_code']]),2,',','.')}} IDR
									</div>
									<div class="fee-details"> <strong>APPLICATION FEE:</strong> <br>@if($value['enrollment_fee'] != "" ) {{$value['curr_symbol'].' '.$value['enrollment_fee'].' '.$value['curr_code']}} @else  @endif</div>


								</div> 
							</a>
						</div>

					</div>

					@endforeach
					@else

					<h1> No Result Found ! </h1>

					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" style="overflow:auto;text-align:center;" id="result-pagination">
			{{$searchResult->links('sekolah.search-course-pagination')}}
		</div>
	</div>
</div>

</div>
</div>

@endsection	
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
				//$.each(data,function(k,v){
					/*
					output+= '<div class="col-md-12 col-lg-12 search-result" title="'+v.name+'" style="margin-bottom:15px;">' +
					'<div class="col-md-12" style="padding:0 15px 15px 15px;border-bottom: 1px solid #dedede;">'+
							'<a href="'+url+v.id+'/details')" style="color:black" target="_blank">'+
								'<div class="col-md-12">' +
									'<div class="row">' +
										'<div class="col-lg-2">' +
										'<div style="height:80px;width:80px;border:1px solid #c9c9c9;border-radius: 50%;margin:0 15px;overflow: hidden;white-space:nowrap;text-align:center;float:left;">'+
																					'<span style="display: inline-block;height:100%;vertical-align: middle;"></span>'+
																					'<img src="'+url+v.logo+'" style="max-height:100%;max-width:100%;vertical-align: middle;">' +
									
										'</div>' +
										'</div>' +
										'<div class="col-lg-10 school-wrapper">' +
											'<h4 class="school-name"><strong>'+v.name+'</strong></h4>' +
											'<div>'+v.address+'</div>'+
											'<p>'+v.city_name+', '+v.region_name+', ' +v.country_name+'</p>' +
										'</div>' +
									'</div>' +

									
								'</div>'+
							'</div>'+
					'</div>'
					*/
			//	});
				//$('#search-result-wrapper').html(output);
			},
			error: function(error){
				console.log(error);
				alert('error');
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
					alert(error);
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
					alert(error);
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
				alert(error);
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
				alert(error);
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
				alert(error);
			}
		});

	});
/*
On Typing Search All Course - Tak Jelas Barang Ini !
---------------------------------------------------------------------

var typingTimer;                //timer identifier
var doneTypingInterval = 900;
	var url = '{{url('cari-sekolah/search/program/')}}';
	var asset_url = '{{asset('img/schools/logo_sekolah/')}}';
	function search_ajax(){
			$('.loading').css({
			'visibility' : 'visible'
		});
			var keyword = $('#keyword').val();
		var token = $("input[name='_token']").val();
		$.ajax({
			url : "{{route('search-result-course-ajax')}}",
			method: "POST",
			data : {
				_token : token,
				keyword : keyword
			},success: function(data){
			
				var data = JSON.parse(data);
				if(data.length > 0){
					$.each(data,function(k,v){
						$('.not-found').css({
						'display' : 'none'
					});
						$('#output').html(
							'<div class="col-md-6 search-result" style="margin:15px 0;">'+
							'<div class="col-md-12" style="background:white;padding:15px;border: 1px solid #dedede">' +
							'<a href="'+ url + '/' +v.id+'/details" style="color:black" target="_blank">' +
							'<div class="col-md-12" style="padding:10px;height:150px;display: table">'+
							'<div style="display: table-cell;vertical-align: middle;">'+
							'<img src="'+asset_url +'/'+ v.logo +'" style="display:block;max-width:75%;max-height: 100%;margin: 0 auto;">'+
							'</div>'+
							'</div>'+
							'<div class="col-md-12" style="padding-bottom:8px;">' +
							'<h5 style="text-align:center;font-size:22px;"><strong>'+v.name+'</strong></h5>' +
							'<span>Course Fee: '+ v.curr_code+' '+v.fee+', Total Fee: '+ v.curr_code + ' ' + parseInt(v.fee+v.enrollment_fee+v.material_fee)+'</span>' +


							'</div>'+
							'<div class="col-md-12" style="border-top:1px solid #ccc;padding-top:15px">'+
							'<strong><h5>'+v.school_name+'</h5></strong>'+
							'<p>'+v.country_name+', '+v.region_name+', '+v.city_name+'</p>'+
							'</div>'+
							'</a>'+
							'</div>'+
							
							'</div>'
							);
					});
					
					$('#count-result').html(data.length);
				}else{
					$('#count-result').html("0");
					$('.not-found').css({
						'display' : 'table'
					});
					$('#output').html("");
				}
				$('.loading').css({
			'visibility' : 'hidden'
		});
			},error: function(){
				alert('error');
			}
		});
	}
	$('#keyword').keyup(function(){
		clearTimeout(typingTimer);
  		typingTimer = setTimeout(search_ajax, doneTypingInterval);
	});
	$('#keyword').keydown(function(){
		clearTimeout(typingTimer);
	});*/
</script>
@endpush