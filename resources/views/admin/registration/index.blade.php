@extends('layouts.app-auth')
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.multidatespicker.css')}}">
<style media="screen">
	.loading-wrapper{
		width:100vw;
		height:100vh;
		position:fixed;
		top:0;
		left:0;
		z-index:9999999;
		display:none;
		background:rgba(255,255,255,1);
	}
	.loading-wrapper img{
		display:block;
		margin:0 auto;
		width:500px;
		position:absolute;
		top:50%;
		left:50%;
		transform:translate(-50%,-50%);

	}
</style>
@endpush
@section('content')
<div class="loading-wrapper">
	<img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">{{ __('Registration Data') }}</h4>
						<p class="card-category"> {{ __('Registration Data') }}</p>
					</div>
					<div class="card-body">
						@if (session('status'))
						<div class="row">
							<div class="col-sm-12">
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<i class="material-icons">close</i>
									</button>
									<span>{{ session('status') }}</span>
								</div>
							</div>
						</div>
						@endif
						<div class="row mb-3">
							<div class="col-md-6">
								<div class="row">
									<label class="col-md-3">
										<div style="display: inline-block;height: 100%;vertical-align: bottom;width: 0px;"></div>
										Kode 
									</label>
									<div class="d-flex">
										<div class="mr-2">
											<div>Perusahaan</div>
											<select class="form-control" data-style="select-with-transition" style="height: 36px;">
												<option value=""> - Pilih Perusahaan - </option>
												@foreach($companies as $company)
												<option value="{{$company->KD}}">{{$company->NAMA}}</option>
												@endforeach
											</select>
										</div>
										<div class="mr-2">
											<div>Tahun Bulan</div>
											<input type="text" class="form-control monthPicker" placeholder="yyyy mm" value="{{date('Y m')}}" name="">
										</div>
										<div>
											<div>Urutan</div>
											<input type="number" class="form-control" value="0000" name="">
										</div>

									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<label class="col-md-3">
										<div style="display: inline-block;height: 100%;vertical-align: bottom;width: 0px;"></div>
										Perusahaan
									</label>
									<div class="col-md-9">
										<select class="form-control" data-style="select-with-transition" style="height: 36px;">
											<option value=""> - Pilih Perusahaan - </option>
											@foreach($companies as $company)
											<option value="{{$company->KD}}">{{$company->NAMA}}</option>
											@endforeach
										</select>
										<div>
											<input type="text" class="form-control" name="" value="IDR" style="max-width:50%;height:24px;">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<div class="row">
									<label class="col-md-3 pt-2">Tgl Daftar</label>
									<div class="col-md-9 p-0">
										<input type="date" class="form-control" value="{{date('d/m/Y')}}" name="">
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-4">
								<div class="row">
									<label class="col-md-4 pt-2">
										Sales
									</label>
									<div class="col-md-8" style="padding-left: 20px;">
										<select class="form-control">
											<option value=""> - Pilih Sales - </option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="row">
									<label class="col-md-3 pt-2">
										Keterangan
									</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="keterangan">
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-12">
								<div class="card card-nav-tabs card-plain">
									<div class="card-header card-header-danger">
										<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
										<div class="nav-tabs-navigation">
											<div class="nav-tabs-wrapper">
												<ul class="nav nav-tabs" data-tabs="tabs">
													<li class="nav-item">
														<a class="nav-link active" href="#student" data-toggle="tab">Siswa</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="#packet" data-toggle="tab">Paket</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="#parent" data-toggle="tab">Wali</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="#certificate" data-toggle="tab">Sertifikat</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="#document" data-toggle="tab">Dokumen</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="#system" data-toggle="tab">Sistem</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="tab-content text-center">
											<div class="tab-pane active" id="student">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-3">
																
															</div>
															<div class="col-md-9">
																<div class="row">
																	<div class="col-md-8">
																		<div class="row">
																			<div class="col-md-12 text-left">
																				<label class="pl-0 col-form-label">
																					Siswa
																				</label>
																			</div>
																			<div class="col-md-12">
																				<input type="text" class="form-control" name="siswa">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="row">
																			<div class="col-md-12 text-left">
																				<label class="pl-0 col-form-label">
																					Title
																				</label>
																			</div>
																			<div class="col-md-12">
																				<input type="text" class="form-control" name="">
																			</div>
																		</div>
																	</div>

																</div>
																<div class="row">
																	<div class="col-md-8">
																		<div class="row">
																			<div class="col-md-12 text-left">
																				<label class="pl-0 col-form-label">
																					Nama
																				</label>
																			</div>
																			<div class="col-md-12">
																				<input type="text" class="form-control" name="siswa">
																			</div>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="row">
																			<div class="col-md-12 text-left">
																				<label class="pl-0 col-form-label">
																					JK
																				</label>
																			</div>
																			<div class="col-md-12">
																				<input type="text" class="form-control" name="">
																			</div>
																		</div>
																	</div>

																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																
															</div>
															<div class="col-md-6">
																
															</div>
														</div>
													</div>
													<div class="col-md-6">
														
													</div>
												</div>
												
											</div>
											<div class="tab-pane" id="packet">
												<p> I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. </p>
											</div>
											<div class="tab-pane" id="parent">
												<p>3 I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-sm-12">
								<table class="table table-striped table-no-bordered table-hover datatable mdl-data-table dataTable dtr-inline collapsed" id="dataTable">
									<thead>
										<tr>
											<th>Kode</th> 
											<th>Tanggal</th>
											<th>Perusahaan</th>
											<th>Sales</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach($registrations as $registration)
										<tr>
											<td>{{$registration->KD_GABUNG}} </td>
											<td>{{$registration->TGL}}</td>
											<td>{{$registration->REF_PERUSAHAAN}}</td>
											<td>{{$registration->REF_SALES}}</td>
											<td>
												<button class="btn btn-edit">Edit</button>
												<button class="btn btn-delete">Delete</button>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('js')
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$(".monthPicker").datepicker({ 
			dateFormat: 'yy mm',
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,

			onClose: function(dateText, inst) {  
				var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val(); 
				var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val(); 
				$(this).datepicker('setDate', new Date(year, month, 1)); 
			}
		});

		$(".monthPicker").focus(function () {
			$(".ui-datepicker-calendar").hide();
			$("#ui-datepicker-div").position({
				my: "center top",
				at: "center bottom",
				of: $(this)
			});

		});

	});
</script>
@endpush