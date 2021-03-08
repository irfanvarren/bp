@section('title', 'Contact Us')
@push('head-script')
<style type="text/css">
	.address-wrapper{
		min-height:150px;
		padding:30px;
		color:white;
		position: relative;
	}
</style>
@endpush
@extends('layouts.bp_wo_sidenav')
<style media="screen">
	input[type=number]::-webkit-inner-spin-button,
	input[type=number]::-webkit-outer-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}
	.contact-form input[type="text"],.contact-form input[type="number"],.contact-form input[type="email"]{
		background:none;
		border:none;
		padding:5px;
		outline:none;
		border-bottom:2px solid #8c76db;
	}
	.contact-form input:focus{
		border:none;
		border-bottom:2px solid #8c76db;
		box-shadow: inset 0 -1px 0 #ddd;
		outline:none !important;
	}
	.contact-form input[type="submit"]{
		color:#3e6db8;
		font-weight:bold;
		border-radius:30px;
		background:white;
	}
	.contact-form input[type="submit"]:hover{
		font-weight:bold;
		border-radius:30px;
		background:#3e6db8;
	}

	.contact-form{
		/*
		padding:30px !important;
		color:white;
		background:#3e6db8;
		*/
		background:white;
		border-radius:15px;
		box-shadow:0 0 10px #e3e3e3;
	}
	.contact-form label{
		font-size:17px;
		margin-bottom:0;	
	}
	.contact-form input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
		/* color:#dde3eb;*/
		opacity: 1; /* Firefox */
	}
	@media (max-width: 480px){
		.contact-form .form{
			padding-top:0px !important;
		}
	}
</style>
@section('content')
<div class="col-md-12 contact-wrapper">
	<div class="col-md-12">
		@if(session()->has('messages'))
		<div class="alert alert-success" style="text-align:center">
			{!! session()->get('messages') !!} <br>

			<button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
		</div>
		@endif
	</div>
	<div class="col-md-12 contact-form">
		<div class="row">
			<div class="col-lg-4" style="background:white;padding:15px; border-radius: 15px 0 0 15px;">
				<img src="{{asset('img/call-center.png')}}" style="display:block;max-width:90%;margin:0 auto;" alt="">
				<div style="padding:15px">
					<h2>Contact Us</h2>
					<p>Jika anda memiliki pertanyaan mengenai program dan acara BP silahkan isi form ini, staf kami akan segera menghubungi anda kembali.</p>
				</div>
			</div>
			<div class="col-lg-8 form" style="padding:30px 45px 30px 30px;">
				<form class="" action="{{url('/contact_us')}}" method="post">
					{{csrf_field()}}
					<div class="row form-group">
						<label class="col-md-12" ><strong> Nama Lengkap </strong> </label> 
						<div class="col-md-12">
							<input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" value="" required>
						</div>
					</div>
					<p>
						<label> <strong> Email</strong></label> <br>
						<input class="form-control" type="email" name="email" placeholder="Email" value="" required>
					</p>
					<p>
						<label> <strong> No Telpon / WA </strong> </label> <br>
						<input class="form-control" type="number" name="no_telepon" value="" placeholder="No Telpon" required>
					</p>
					<p>
						<label> <strong> Pesan : </strong> </label> <br>
						<textarea class="form-control" name="pesan" placeholder="Pesan..." wrap="soft" style="resize:none;" rows="5" required></textarea>
					</p>
					<input type="submit" class="btn btn-primary" style="float:right;padding:8px 40px;" name="submit" value="Submit">
				</form>
			</div>
		</div>

	</div>
</div>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-6 col-lg-3 address-wrapper" style="background:#0077B7;">
			<img src="{{asset('img/logo_putih.png')}}" style="max-width:70%;max-height: 50%;  
			position: absolute;  
			top: 0;  
			bottom: 0;  
			left: 0;  
			right: 0;  
			margin: auto;">
		</div>
		<div class="col-md-6 col-lg-3 address-wrapper" style="background:#0096C8">
			<h5><strong>Best Partner Education - Pontianak</strong></h5>
			<div>Jalan Prof. DR. Hamka No.29-30 (Depan Gg. Nilam 3) <br>
				Sungai Jawi. Kec. Pontianak Kota, Kota Pontianak <br>
			Kalimantan Barat 78115</div>
		</div>
		<div class="col-md-6 col-lg-3 address-wrapper" style="background:#00B4D7">
			<h5><strong>Best Partner Education - Singkawang</strong></h5>
			<div>
				Jalan M.Suni No.22, Condong, <br>
				Singkawang Tengah, Kota Singkawang, <br>
				Kalimantan Barat 79111 
			</div>
		</div>
		<div class="col-md-6 col-lg-3 address-wrapper" style="background:#48CAE4">
			<div class="mb-3">
				<h5><strong>Open Hours Pontianak</strong></h5>
				<div>
					<div>Senin - Jumat 08.00 - 21.00</div>
					<div>Sabtu 08.00 - 21.00</div>
				</div>
			</div>
			<div>
				<h5><strong>Open Hours Singkawang</strong></h5>
				<div>
					<div>Senin - Jumat 08.00 - 21.00</div>
					<div>Sabtu 08.00 - 21.00</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--
<div class="col-md-12">
	<div class="row">
		<div class="col-lg-7">
			<div class="row">
				<div class="col-lg-12 address-top">
					<h1 class="location-title">Best Partner Education</h1>
					<div class="row">
						<div class="col-lg-5 col-md-5 col-sm-6 maps-info">
							<div class="row">
								<div class=" col-sm-2 location-pin">
									<img src="{{asset('img/location-pin.png')}}" class="location-pin-img">
								</div>
								<div class="col-sm-10 location-address-wrapper">
									<div class="row">
										<div class="location-address" >
											<strong>Australia</strong>
											<p>
												Level 33, Australia Square, <br>
												264 George Street Sydney <br>
												Australia 2000
											</p>	
											<p>Jam Buka: Buat janji dahulu</p>
										</div>
									</div>
								</div>
							</div> 
							
							
						</div>
						<div class="col-lg-7 col-md-7 col-sm-6 maps-info">
							<div class="row">
								<div class="col-sm-2 location-pin">
									<img src="{{asset('img/location-pin.png')}}" class="location-pin-img">
								</div>
								<div class="col-sm-10 location-address-wrapper">
									<div class="row">
										<div class="location-address">
											<strong>Sanggau</strong>
											<p>
												Jalan Gajah Mada No.19 <br>
												Kelurahan Beringin, Kecamatan Kapuas <br>
												Pasar Sentral, Kapuas <br>
												Kabupaten Sanggau <br>
												Kalimantan Barat <br>
											</p>
											<p>Jam buka: Buat janji dahulu</p>
										</div>
									</div>
								</div>
							</div>
							

						</div>

					</div>
				</div>
				<div class="col-lg-12">
					<div class="row">
						<div class="col-md-5 push-md-6 col-sm-12">
							<div class="row">
								<img class="location-img" src="{{asset('img/location.png')}}">
							</div>
						</div>
						<div class="col-md-7 pull-md-6 col-sm-12 address-bottom">

							<div class="row">
								<div class="col-md-12 col-sm-6 maps-info">
									<div class="row">
										<div class="col-sm-2 location-pin">
											<img src="{{asset('img/location-pin.png')}}" class="location-pin-img">
										</div>
										<div class="col-sm-10 location-address-wrapper">
											<div class="row">
												<div class="location-address">
													<strong>Pontianak</strong>
													<p>Jalan Prof. DR. Hamka No.29-30 (Depan Gg. Nilam 3) <br>
														Sungai Jawi. Kec. Pontianak Kota, Kota Pontianak <br>
														Kalimantan Barat 78115 <br>
													</p>
													<p>
													Telepon : +62 561 817 2583
													</p>
													<p>Jam Buka:<br>
														Senin - Jumat (08.00 - 21.00)<br>
														Sabtu (08.00 - 19.00)
													</p>
												</div>
											</div>
										</div>
									</div>
									
								</div>
								<div class="col-md-12 col-sm-6 maps-info">
									<div class="row">
										<div class="col-sm-2 location-pin">
											<img src="{{asset('img/location-pin.png')}}" class="location-pin-img">
										</div>
										<div class="col-sm-10 location-address-wrapper">
											<div class="row">
												<div class="location-address">
													<strong>Singkawang</strong>
													<p>Jalan M.Suni No.22, Condong, <br>
														Singkawang Tengah, Kota Singkawang, <br>
														Kalimantan Barat 79111 <br>
													</p>
													<p>Jam Buka:<br>
														Senin - Jumat (08.00 - 21.00)<br>
														Sabtu (08.00 - 18.00)
													</p>
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
	<div class="col-md-12 col-lg-5 map-wrapper">
		<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.818000937931!2d109.32262601475328!3d-0.022926199983269144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d58f6b4ce8ba3%3A0x2135d78ecb306a81!2sLes+Bahasa+Inggris+(Best+Partner+Education)!5e0!3m2!1sen!2sid!4v1564730700383!5m2!1sen!2sid"  frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
</div>
</div>
-->
@stop
