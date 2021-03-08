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
	.product-nav .more:hover .more-dropdown{
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
		z-index: 10;
		display: none;
	}

	.product-price{
		color:#aaaaaa;
	}
	@media screen and (max-width:576px){
		.product-desc{
			width:100%;
			margin-bottom:15px;
		}
		.button-wrapper{
			float:none;
		}
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
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLongTitle"><strong>Confirmation</strong></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						
						<p>Are you sure you want to add this course ?</p>
						<div>
							<div>
								Course : <span>Nama Course</span>
							</div>
							<div>
								Level : <span>Nama Level</span>
							</div>
							<div>
								Kelompok Kelas : <span>Kelompok Kelas</span>
							</div>
							<div>
								Jumlah Pertemuan : 
								<select>
									<option value=""> Pilih Jumlah Pertemuan </option>	
								</select>
							</div>
							<div>
								Jumlah Jam : 
								<select>
									<option value=""> Pilih Jumlah Jam</option>
								</select>
							</div>
							<div>
								Harga : Rp.0,00
							</div>
						</div>
						<div class="text-right">
							
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary"  data-dismiss="modal">Cancel</button>
				<button Class="btn btn-primary">Confirm</button>
			</div>
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
										Deskripsi singkat bla bla bla bla bla bla bla
									</div>
								</div>
								<div class="button-wrapper">
									<a class="btn register-btn" href="#detail-product">Daftar Sekarang</a>
									<button class="btn brochure-btn">Brosur Gratis</button>
								</div>
							</div>

						</div>
						<div class="col-sm-12 product-nav">
							@php
							$menuItems =[];
							for($x = 1; $x <= 15;$x++){
							array_push($menuItems,[
							'id' => $x,
							'href' => 'tes',
							'name' => 'Menu '.$x
							]);
						}
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
							<div class="col-md-8">
								<h2 class="title"><strong>Deskripsi 2 abcedfghijklmnopqrstuvwxyz</strong></h2>
							</div>
							<div class="col-md-4">
								<div class="card course-detail-card">
									<div class="card-body">
										<h3>Course Details</h3>
										<div>Jumlah Jam: </div>
										<div>Jumlah Pertemuan: </div>
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
								<h2 class="mb-4"><strong>Sub Program {{$course->NAMA}}</strong></h2>
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
												<div class="card-header" style="vertical-align: top;white-space: nowrap;font-size:1.2rem;overflow-x: hidden;text-overflow: ellipsis;">
													<div class="m-0"><strong>{{$level->first()->NAMA_LEVEL != "" ? $level->first()->NAMA_LEVEL : $REF_LEVEL}}</strong></div>
												</div>
												<div class="card-body">

													<p style="line-height: 1.8em;max-height:10.8em;overflow: hidden;text-align: justify;">
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
														tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
														quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
														consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
													</p>
													<div>
														@foreach($course->prices->where('REF_LEVEL',$REF_LEVEL)->sortByDesc('HARGA_PAKET')->groupBy('REF_KATEGORI') as $REF_KATEGORI => $kategori)
														<div style="padding:10px 15px;width: 100%;display: block;border-bottom:1px solid #bebebe;height: auto;overflow-y:hidden;position: relative;" onclick="$('.product-{{$REF_LEVEL}}').hide();$('#{{$REF_LEVEL."-".$REF_KATEGORI}}-price').toggle()">

															<div class="row">
																<div class="col-md-12 p-0">
																	<h5 class="d-inline m-0">{{$kategori->first()->NAMA_KATEGORI}}
																	</h5>
																	<u class="float-right">Register</u>
																</div>
																@php
																$prices = $kategori->first()->selectRaw('tb_paket_bimbel_dtlharga.KD,tb_paket_bimbel_dtlharga.REF_PERUSAHAAN,tb_paket_bimbel_dtlharga.REF_KATEGORI,tb_paket_bimbel_dtlharga.REF_LEVEL,tb_paket_bimbel_dtlharga.REF_KATEGORI,tb_paket_bimbel_dtlharga.REF_PAKET,tb_paket_bimbel_dtlharga.HARGA_PAKET,tb_paket_bimbel_dtlharga.JUMLAH_JAM,tb_paket_bimbel_dtlharga.JUMLAH_PERTEMUAN,SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) as type')->leftJoin('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_PAKET',$course->KD)->where('REF_LEVEL',$REF_LEVEL)->where('REF_KATEGORI',$REF_KATEGORI)->get();
																@endphp
																@if(count($prices))
																<div class="col-md-12 mt-2 product-price product-{{$REF_LEVEL}}" id="{{$REF_LEVEL.'-'.$REF_KATEGORI}}-price" style="display: none;">
																	<div class="row">
																		@foreach($prices->groupBy('HARGA_PAKET') as $HARGA_PAKET => $price_type)
																		@if($HARGA_PAKET > 0)
																		@foreach($price_type as $price)
																		<div class="col-md-12 my-2">
																			<div class="row">
																				<div class="col-md-12 p-0">
																					<div style="line-height: 28px;white-space: nowrap;text-overflow: ellipsis;overflow:hidden;display: inline;width:50px;">Rp.{{number_format($HARGA_PAKET,2)}} ({{$price->type == "ONLINE" ? "Online" : "Offline"}})
																					</div>
																					<button class="btn btn-sm btn-primary float-right" style="" onclick="add_to_cart('{{$price->KD}}','{{$course->KD}}','{{$REF_LEVEL}}','{{$REF_KATEGORI}}')">Add to Cart</button>
																				</div>
																			</div>
																		</div>
																		@endforeach
																		@endif
																		@endforeach		
																	</div>
																</div>
																@endif
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
											<h2><strong>Tempat Tujuan Menarik</strong></h2>
										</div>
										<div class="col-md-12 ">
											<div class="country-wrapper">
												@foreach($countries as $country)
												<div class="country" onclick="location.href='../study-abroad/australia'">
													<div class="col-md-12" style="overflow: hidden;">
														<div class="row">

															<div class="col-md-12" style="background-image: url('{{asset('img/countries/lama/'.$country->name.'.jpg')}}');background-size: cover;height:200px;" >
															</div>

														</div>
													</div>
													<div class="col-md-12 country-name">
														{{$country->name}}
													</div>
												</div>
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

	function add_to_cart(REF_PRICELIST,REF_PAKET,REF_LEVEL,REF_KATEGORI){
		$('#confirm-cart-modal').modal();
	}
</script>
@endpush