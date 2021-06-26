@extends('layouts.bp_wo_sidenav')
<style type="text/css">
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

		display: -webkit-box;
		-webkit-line-clamp:2;
		-webkit-box-orient: vertical;
		text-align:center;
		font-weight:bold;
		font-size:22px;
		text-overflow: ellipsis;	
		line-height:1.2em;
		height:2.4em;
		overflow:hidden;
		margin:auto;
	}
	.school-name{
		display: flex;
		line-height:1.2em;
		height:2.4em;
		font-weight: 100;
		overflow:hidden;
		align-items: center;	
	}
	.pagination{
		justify-content: center;
	}
</style>
@section('content')
<div class="col-md-12 content-wrapper" style="padding:15px;">
	<div class="row">
		<div class="col-md-12" style="background-image:url({{asset('img/schools/search-school-background.png')}});padding:30px;background-repeat: no-repeat;background-size: cover;background-color:#366096;">
			
			<div class="row justify-content-center">
				<div class="col-md-12">
				<h1 style="text-align:center;color:white"><strong>Search School</strong></h1>
				</div>
				<div class="col-md-7 search-wrapper">
					<div class="row">
					<div class="col-md-8">	
						<div class="row">
					<input type="text" id="kata_pencarian" placeholder="School's Name..." class="col-md-12 field_pencarian" onFocus="modal_jurusan()" onKeyUp="keyword()">
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
		@if($count)
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">

					<div style="padding:8px;font-size:18px;"> <div class="text-right"> <span id="count-result"> {{$count}} </span> Found</div></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-lg-4">

					<form name="myform" id="myform" action="{{route('search-course-filter')}}" method="POST">
						@csrf
						<input type="hidden" name="search_type" id="search_type" value="course">
						<input type="hidden" name="id_jurusan" id="id_jurusan">
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
				<div class="col-md-8 col-lg-9">	

					<div class="row">
						@foreach($searchResult as $key => $value)
						<div class="col-md-6 col-lg-6 search-result" style="margin:15px 0;">
							
							<div class="col-md-12" style="background:white;padding:15px;border: 1px solid #dedede;">
									<a href="{{url('cari-sekolah/search/school/'.$value->id.'/details')}}" style="color:black" target="_blank">
								<div class="col-md-12" style="padding:10px;height:250px;display: table;margin-bottom: 15px;">

									<div style="display: table-cell;vertical-align: middle;">
										<img src="{{asset('img/schools/logo_sekolah/'.$value->logo)}}" style="display:block;max-width:70%;max-height: 70%;margin: 0 auto;">
									</div>
								</div>
								<div class="col-md-12" style="border-top:1px solid #ccc;text-align:center;padding-top:15px">
										<h5 style="font-size:22px;"><strong>{{$value->name}}</strong></h5>
										<p>{{$value->address}}</p>
									<p>{{$value->country_name.', '.$value->region_name.', '.$value->city_name}}</p>
									
								</div>
								</a>
							</div>
							
						</div>
						
						@endforeach	
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="overflow:auto;text-align:center;">
				{{$searchResult->links()}}
				</div>
			</div>
		</div>
		@else
		<div class="col-md-12">
			<table style="height: 350px;width: 100%">
				<tbody>
					<tr>
						<td class="text-center align-middle"><strong><h2>No Result Found !</h2></strong></td>
					</tr>
				</tbody>
			</table>
		</div>
		@endif
	</div>
</div>

@endsection	


