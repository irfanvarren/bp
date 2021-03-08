@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<style type="text/css">
	.product-detail-content .container{
		max-width: 1250px;
	}
	.product-header{
		background:white;
		padding:15px;
	}
	.product-desc-wrapper{
		padding: 15px 0;
		display: flex;
		-moz-box-align: center;
		align-items: center;
		flex-wrap: wrap;
		justify-content: space-between;
	}
	.product-desc{
		padding: 0;
	}
	.brochure-btn{
		background:transparent;
		border:1px solid #bebebe;
		border-radius:30px;
	}
	.brochure-btn:hover{
		border:1px solid #333333;
	}
	.button-wrapper{
		display: inline-block;
		margin-top:5px;
		overflow: auto;
	}
	.register-btn{
		background:#3578c4;
		color:white;
		border-radius:30px;
	}
	.register-btn:hover{
		background:#548ed1;
		color:white;
	}
	.product-nav > ul{
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
	}
	.product-nav > ul li {
		display: block;float: left;
		margin-right:30px;
		max-width: 120px;
		padding:8px 0;
	}
	.product-nav > ul li a{
		color:#454545;
		text-decoration: none;
	}
	.product-nav .more button{
		background: none;
		border:none;
	}
	.product-nav .more:hover .more-dropdown,.product-nav .more:active .more-dropdown{
		display: block;
	}
	.product-nav .more-dropdown{
		position: absolute;
		padding:0;
		background:white;
		box-shadow:1px 1px 2px #bebebe;
		border-radius:5px;
		border:1px solid #f3f3f3;
		margin-top:5px;
		padding:12px;
		right: 0;
		z-index: 50;
		display: none;
	}



	.product-price{
		color:#aaaaaa;
	}

	.product-background{
		height:65vh;
		background-repeat: no-repeat;
		background-size:cover;
		background-position: top;	
	}
	.product-background::after{
		content: "";
		position: absolute;
		bottom:0;
		width: 100%;
		left: 0;
		height: 200px;
		background: linear-gradient( 180deg,rgba(0,0,0,0) 0%,rgba(0,0,0,0.6) 100% );
	}
	.product-content .detail-desc-wrapper{
		background:#eeeeee;
	}
	.product-title{
		position:absolute;bottom:30px;left:0;width:100%;font-size:56px;font-weight:bold;color:white;font-family: verdana;z-index: 11;overflow:hidden;
	}
	.product-content .title{
		overflow:hidden;
		text-overflow: ellipsis;
	}
	.course-detail-card{
		position: absolute;
		width: 100%;
		top:-60px;
		right:0;
		height:270px;
		box-shadow: 0 0 8px rgba(0,0,0,0.2);
		border:none;
	}
	.product-detail-content .country-wrapper{
		display: inline-flex;width: 100%;flex-wrap: wrap;
		justify-content: space-between;
	}
	.product-detail-content .country-wrapper .country{
		margin:12px auto ;
		width: 23%;
		box-shadow: 0 0 8px rgba(0,0,0,0.15);
	}

	.product-detail-content .country-wrapper .country .country-name{
		color:black;
		text-align: center;
		padding:15px;
		font-size:18px;
		border-top:1px solid #dedede;
	}
	.product-detail-content	.course-subprogram-title{
		padding:0 30px;
	}
	.sub-program.card{
		border:none;
		border-radius:10px;
		box-shadow: 0 0 8px rgba(0,0,0,0.15);
		margin-bottom:30px;
	}
	.sub-program.card .card-header{
		border-radius: 10px 10px 0 0;
		border-bottom:none;
	}
	.sub-program.card .category-title{
		line-height: 28px;

	}
	.swiper-container {
		width: 100%;
		height: 100%;
		margin:0 -15px;
		position: relative;	
	}
	.swiper-pagination{
		margin-bottom:-15px;
	}
	.swiper-button-next,.swiper-button-prev{
		width:38px;
		height: 38px;
		color:black;
		border-radius:50%;
		box-shadow:0 0 7px #cecece;
		text-align: center;
		background: white;

	}
	.swiper-button-next::after,.swiper-button-prev::after{
		line-height: 38px;
		font-size:22px;
		font-weight: bolder;
	}
	.swiper-button-prev{
		margin-left:-8px;
	}
	.swiper-button-next{
		margin-right:-8px;
	}
	#confirm-cart-modal{
		padding:0 !important;
	}
	#confirm-cart-modal .modal-content{
		border-radius:15px;
	}

	#confirm-cart-modal .success-message{
		position:absolute;top:0;left: 0;width: 100%;height: 100%;text-align: center;z-index:5;background:white;display:none;
	}

	#confirm-cart-modal .success-message > div {
		position: absolute;top:50%;left: 0;padding-top:-12.5%;margin-top:-15%;width: 100%;
	}

	#confirm-cart-modal .success-message > div i.fa-check{
		font-size:76px;padding:15px;border:3px solid #626262;border-radius:50%;margin-bottom: 15px;
	}

	.dot-loading-wrapper{
		position: absolute;top:0;left: 0;width:100%;height: 100%;font-size:64px;text-align: center;
		background-color: rgba(255,255,255,0.8);display: none;
	}
	.dot-loading-wrapper > div {
		position: absolute;top: 50%;margin-top: -0.5em;overflow: hidden;white-space: nowrap;width: 100%;text-overflow: ellipsis;line-height: 1;
	}

	@keyframes blink {50% { color: transparent }}
	.loader__dot { animation: 1.5s blink infinite }
	.loader__dot:nth-child(2) { animation-delay: 375ms }
	.loader__dot:nth-child(3) { animation-delay: 750ms }
	@media screen and (max-width:576px){
		.product-desc{
			width:100%;
			margin-bottom:15px;
		}
		.button-wrapper{
			float:none;
		}
		.product-nav .more-dropdown li{
			width: 100%;
			max-width: 100%;
		}
	}
	
	@media screen and (max-width:1024px) and (min-width:748px){
		.swiper-container{
			padding:0 30px !important;
			margin:0 auto;
		}
	}
	@media screen and (max-width:768px){
		.swiper-container{
			padding:0 20px !important;
			margin:0 auto;
		}
		.product-detail-content .country-wrapper .country{
			width:46%;
		}
		.course-detail-card{
			position: relative;
			top:auto;
			left:auto;
		}
		.course-subprogram-title{
			padding:0 15px;
		}
		.product-title{
			font-size:42px;
		}
	}
	@media screen and (max-width:578px){
		.product-detail-content .country-wrapper .country{
			width: 100%;

		}
	}
	.testt::after{
		content:"";
		display: block;
		clear: both;
	}
</style>
@endpush
@section('content')


<div class="modal fade" id="confirm-cart-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form action="" method="POST" id="select-course-form" onsubmit="add_course(event)">
				@csrf
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLongTitle"><strong>Confirmation</strong></h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="success-message"> 
						<div>
							<i class="fa fa-check" aria-hidden="true"></i>
							<h4>Product successfully added to cart !</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="dot-loading-wrapper" ><div><span class="loader__dot">&#183;</span><span class="loader__dot">&#183;</span><span class="loader__dot">&#183;</span></div></div>
							<p>Are you sure want to select this course ?</p>
							<input type="hidden" name="course_id" id="course-id">
							<input type="hidden" name="level_id" id="level-id" >
							<input type="hidden" name="category_id" id="category-id" >
							<p>
								<span class="mr-2">Course</span> : <span class="ml-2" id="course-name">Nama Course</span>
							</p>
							<p>
								<span class="mr-2">Level </span>: <span class="ml-2" id="level-name">Nama Level</span>
							</p>
							<p>
								<span class="mr-2">Class Group</span> : <span class="ml-2" id="category-name">Kelompok Kelas</span>
							</p>
							<p>
								<span class="mr-2">Course Type</span> :
								<select class="ml-2" id="course-type" onchange="select_course_type(this)" required>
									<option value=""> - Select -</option>
								</select>
							</p> 
							<p>
								<span class="mr-2">Meetings</span> : 
								<select class="ml-2" id="meetings" onchange="select_meeting(this)" title="Select course type first" required>
									<option value="">- Select - </option>	
								</select>
								<i class="fa fa-question-circle" aria-hidden="true" title="Select course type first"></i>
							</p>
							<p>
								<span class="mr-2">Hours</span> : 
								<select class="ml-2" id="hours" onchange="select_hour(this)"  title="Select number of meetings first" required>
									<option value="">- Select -</option>
								</select>
								<i class="fa fa-question-circle" aria-hidden="true" title="Select number of meetings first"></i>
							</p>
							<p>
								<span class="mr-2">Price</span> : <span class="ml-2" id="price">Rp.0,00</span>
							</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary btn-cancel"  data-dismiss="modal">Cancel</button>
					<button Class="btn btn-primary btn-submit" onclick="submit_to_cart()">Add To Cart</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-12 product-detail-content" id="app" style="min-height: 100vh;">
	<div class="row">
		<div class="col-md-12 product-header">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="product-desc-wrapper">
								<div class="product-desc ">
									<h4 class="m-0 d-inline"> <strong>{{$course->NAMA}} </strong> </h4> 
									<div>
										{{$course->short_description != "" ? $course->short_description : "No Description"}}
									</div>
								</div>
								<div class="button-wrapper">
									<a class="btn register-btn" href="#detail-product">Register Now</a>
									<button class="btn brochure-btn">Free Brochure</button>
								</div>
							</div>

						</div>
						<div class="col-sm-12 product-nav">
							@php
							$menuItems =[];
							/* for($x = 1; $x <= 15;$x++){
							array_push($menuItems,[
							'id' => $x,
							'href' => 'tes',
							'name' => 'Menu '.$x
							]);
						} */
						@endphp
						<product-nav :nav="{{json_encode($menuItems)}}"></product-nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	@php
	$bg_array = array('test-background.jpg','test-background2.jpg','test-background3.webp');
	shuffle($bg_array);

	@endphp
	<div class="col-md-12 product-background" style="background-image: url('{{asset("img/products/".$bg_array[0])}}');">

		<div class="product-title">
			<div class="col-sm-12">
				<div class="container">

					{{$course->NAMA}}
				</div>
			</div>
		</div>
		<div class=""></div>
	</div>
	<div class="col-md-12 product-content">
		<div class="row">

			<div class="col-md-12 p-4 detail-desc-wrapper" style="font-family: verdana;min-height: 270px;">
				<div class="row">
					<div class="container">
						<div class="row">
							<div class="col-md-7 col-lg-8 pb-3">
								<h2 class="title"><strong>{{$course->description != "" ? $course->description : "No Description"}}</strong></h2>
							</div>
							<div class="col-md-5 col-lg-4">
								<div class="card course-detail-card">
									<div class="card-body" style="line-height: 2em;">
										<h3>Course Details</h3>
										<div>
											@php
											$min_hour = number_format($course->prices->min('JUMLAH_JAM'));
											$max_hour = number_format($course->prices->max('JUMLAH_JAM'));	
											@endphp
											Jumlah Jam: {{$min_hour}} @if($max_hour > $min_hour) - {{ number_format($max_hour)}} @endif Hours
										</div>
										<div>
											@php
											$min_meets = number_format($course->prices->min('JUMLAH_PERTEMUAN'));
											$max_meets = number_format($course->prices->max('JUMLAH_PERTEMUAN'));	
											@endphp
											Jumlah Pertemuan: {{$min_meets}} @if($max_meets > $min_meets) - {{ number_format($max_meets)}} @endif Meets
										</div>
										<div>
											Course Type :
											@php
											$kd_pricelist = $course->prices->groupBy('KD')->keys();
											@endphp
											@foreach($kd_pricelist as $key => $course_type)
											@php 
											$course_type_arr = explode('.',$course_type);
											$course_type = array(); 
											@endphp
											{{in_array(end($course_type_arr),["ONLINE"]) ? end($course_type_arr) : "OFFLINE" }}@if($key !== count($kd_pricelist) - 1),@endif
											@endforeach
										</div>
										<div>
											Price Range : Rp.{{number_format($course->prices->min('HARGA_PAKET'),2,',','.')}} - Rp.{{number_format($course->prices->max('HARGA_PAKET'),2,',','.')}}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-12 p-4 detail-product-wrapper" id="detail-product" style="min-height: 400px;border-bottom:1px solid #eeeeee">
				<div class="row">
					<div class="container" style="max-width: 1280px;">
						<div class="row">
							@if($course->prices->count())
							<div class="col-md-12 course-subprogram-title" style="font-family: verdana;">
								<h2 class="mb-4 px-2"><strong>Sub Program {{$course->NAMA}}</strong></h2>
							</div>
							@endif
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="swiper-container" style="padding:0 42px;">
									<div class="swiper-wrapper">
										@foreach($course->prices->groupBy('REF_LEVEL') as $REF_LEVEL => $level)
										<div class="swiper-slide">
											<div class="sub-program card">
												<div class="card-header" >
													<div style="overflow-x: hidden;text-overflow: ellipsis;line-height: 1.4em;height: 2.8em;">
														<span style="display: inline-block;vertical-align: middle;height: 100%;width: 0;"></span>
														<strong>{{$level->first()->NAMA_LEVEL != "" ? $level->first()->NAMA_LEVEL : $REF_LEVEL}}</strong>
													</div>
												</div>
												<div class="card-body">

													<p style="line-height: 1.8em;max-height:10.8em;overflow: hidden;text-align: justify;">
														
														No Description
														
													</p>
													<div>
														@foreach($course->prices->where('REF_LEVEL',$REF_LEVEL)->where('HARGA_PAKET','!=',0)->sortByDesc('HARGA_PAKET')->groupBy('REF_KATEGORI') as $REF_KATEGORI => $kategori)
														<div style="padding:10px 15px;width: 100%;display: block;border-bottom:1px solid #bebebe;height: auto;overflow-y:hidden;position: relative;" >

															<div class="row">
																<div class="col-md-12 p-0">
																	<h5 class="d-inline m-0 category-title">{{ucwords(strtolower($kategori->first()->NAMA_KATEGORI))}}
																	</h5>
																	@php
																	$send_data_to_cart = array();
																	@endphp
																	@foreach($kategori->groupBy('KD') as $REF_PRICELIST => $kategori)
																	@php
																	$send_data_to_cart[$REF_PRICELIST]  = array();
																	@endphp
																	@foreach($kategori->groupBy('JUMLAH_PERTEMUAN') as $JUMLAH_PERTEMUAN => $meeting)

																	@php
																	$send_data_to_cart[$REF_PRICELIST][$JUMLAH_PERTEMUAN] = $meeting;
																	@endphp
																	@endforeach
																	@endforeach
																	<button class="float-right btn btn-danger btn-sm "  onclick="add_to_cart('{{$course->KD}}','{{$course->NAMA}}','{{$level->first()->REF_LEVEL}}','{{$level->first()->NAMA_LEVEL}}','{{$kategori->first()->REF_KATEGORI}}','{{$kategori->first()->NAMA_KATEGORI}}','{{json_encode($send_data_to_cart)}}')">Select</button>
																</div>


															</div>
															@php 
															$url_paramater['categories'] = $REF_KATEGORI;
															$url_paramater['levels'] = $REF_LEVEL;
															@endphp

															<!-- <div style="display: block;position: absolute;
																top:50%;right: 0;margin-top:-20px;width: 40%;"></div> -->
															</div>
															@endforeach
														</div>

													</div>
												</div>
											</div>

											@endforeach



										</div>
										<!-- Add Pagination -->
										<div class="swiper-pagination"></div>
										<!-- Add Arrows -->
										<div class="swiper-button-next"></div>
										<div class="swiper-button-prev"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12" style="font-family: verdana;">
							<div class="row">
								<div class="container">
									<div class="row">
										<div class="col-md-12 pt-4">
											<h2 class="px-2"><strong>Our Destinations</strong></h2>
										</div>
										<div class="col-md-12 ">
											<div class="country-wrapper">
												@foreach($countries as $country)
												<a class="country" href="{{url('/study-abroad/australia')}}">
													<div class="col-md-12" style="overflow: hidden;">
														<div class="row">
															<div class="col-md-12" style="background-image: url('{{asset('img/countries/lama/'.$country->name.'.jpg')}}');background-size: cover;height:200px;" >
															</div>
														</div>
													</div>
													<div class="col-md-12 country-name">
														{{$country->name}}
													</div>
												</a>
												@endforeach

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('more-script')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
<script type="text/javascript">

	var data_pricelist;
	var supported_course_types = ['ONLINE'];
	var swiper = new Swiper('.swiper-container', {
		slidesPerView:3,
		loop:false,
		spaceBetween:30,
		freeMode: true,
		pagination: {
			el: '.swiper-pagination',
			clickable:true
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		}, breakpoints: {
			0: {
				slidesPerView: 1,
				spaceBetween: 30,
			},
			768: {
				slidesPerView: 2,
				spaceBetween: 40,
			},
			1024 : {
				slidesPerView:3,
				spaceBetween: 55
			}
		}

	});



	function submit_to_cart(){
		$('.dot-loading-wrapper').show();
		$.ajax({ 
			url : "{{route('add-to-cart')}}",
			method : "POST",
			data : {
				_token : $("input[name='_token']").val(),
				course_id : $('#course-id').val(),
				level_id : $('#level-id').val(),
				category_id : $('#category-id').val(),
				pricelist_type : $('#course-type').val(),
				pricelist_id : $('#course-type').val(),
				duration : $('#hours').val(),
				cmd : "add"
			},success:function(data){
				data = JSON.parse(data);
				var items = data.items;
				render_cart(items);
				$('#confirm-cart-modal .success-message').show();
				$('#select-course-form .btn-submit').hide();
				$('#select-course-form .btn-cancel').html("Ok");
				$('.dot-loading-wrapper').hide();
			},error:function(){

			}
		});
	}



	function add_to_cart(course_id,course_name,level_id,level_name,category_id,category_name,data){

		var logged_in = "{{auth()->check() ? true : false}}";
		if(logged_in != 1){
			alert('Please log in first to register');
			window.location = "{{route('login')}}";
			return false;
		}
		document.getElementById('course-id').value = course_id;
		document.getElementById('level-id').value = level_id;
		document.getElementById('category-id').value = category_id;
		document.getElementById('course-name').innerHTML = course_name;
		document.getElementById('level-name').innerHTML = level_name;
		document.getElementById('category-name').innerHTML = category_name;
		
		data_pricelist = JSON.parse(data);
		var course_types = Object.keys(data_pricelist);

		document.getElementById('select-course-form').reset();
		document.getElementById('course-type').innerHTML = "<option value=''> - Select -</option>";
		document.getElementById('meetings').innerHTML = "<option value=''> - Select -</option>";
		document.getElementById('hours').innerHTML = "<option value=''> - Select -</option>";
		document.getElementById('price').innerHTML = formatRupiah(0,"Rp.");

		populate_select('course-type',course_types);
		$('#confirm-cart-modal .success-message').hide();
		$('#select-course-form .btn-submit').show();
		$('#select-course-form .btn-cancel').html("Cancel");
		$('#confirm-cart-modal').modal();
		
	}

	function add_course(e){
		e.preventDefault();
		console.log(e);
	}

	function select_course_type(el){
		var meetings
		if(data_pricelist[el.value]){
			meetings = Object.keys(data_pricelist[el.value]);
		}else{
			meetings = [];
		}
		document.getElementById('hours').innerHTML = "<option value=''> - Select -</option>";
		document.getElementById('price').innerHTML = formatRupiah(0,"Rp.");
		populate_select('meetings',meetings);
	}

	function select_meeting(el){
		var course_type = document.getElementById('course-type').value;
		document.getElementById('price').innerHTML = formatRupiah(0,"Rp.");
		populate_select('hours',data_pricelist[course_type][el.value],'JUMLAH_JAM','JUMLAH_JAM');
	}

	function select_hour(el){
		var price = get_price(el);
		document.getElementById('price').innerHTML = formatRupiah(price,"Rp.");
	}

	function get_price(el){
		var course_type = document.getElementById('course-type').value;
		var meeting = document.getElementById('meetings').value;
		var data = data_pricelist[course_type][meeting];
		for(var i = 0; i < data.length;i++){
			if(data[i].JUMLAH_JAM == el.value){
				return data[i].HARGA_PAKET;
			}
		}
		return 0;
	}

	function populate_select(id,data,value = null, text = null){
		var select_input = document.getElementById(id);
		select_input.innerHTML = "<option value=''> - Select -</option>";
		if(data instanceof Array){


			for(var i = 0; i < data.length; i++){
				var opt = document.createElement("option");
				if(data[i] instanceof Object){
					opt.value = data[i][value];
					opt.innerHTML = data[i][text];	
				}else{
					opt.value = data[i];
					var text = data[i];
					if(id == 'course-type'){
						var type_arr = data[i].split('.');
						text = type_arr[(type_arr.length - 1)];
						if(supported_course_types.indexOf(text) < 0){
							text = "OFFLINE";
						}
					}
					opt.innerHTML = text;
				}
				select_input.appendChild(opt);
			}
		}	
	}

	
</script>
@endpush