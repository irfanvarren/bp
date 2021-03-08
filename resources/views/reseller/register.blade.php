@extends('layouts.bp_wo_sidenav')
@section('content')

<div class="content-wrapper col-md-12 py-0">
	@if(session()->has('error'))
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<i class="material-icons">close</i>
				</button>
				<span>{{ session('error') }}</span>
			</div>
		</div>
	</div>
	@endif
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card mt-3 p-4 mb-5">
				<form action="{{url('reseller/register')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="col-md-12 text-center mb-4">
						<h3>Pendaftaran Reseller</h3>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-3">
										Nama Lengkap
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="{{auth()->user()->name}}" required>
									</div>
								</div>

							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-3">Email</div>
									<div class="col-md-9">
										<input type="email" class="form-control" name="email" value="{{auth()->user()->email}}" placeholder="Email" required>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-3">Kota Kelahiran</div>
									<div class="col-md-9"> <input type="text" name="tempat_lahir" class="form-control" placeholder="Kota Kelahiran" required value=""></div>
								</div>

							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-3">   Tanggal Lahir</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-4">
												<select class="form-control" name="tgl_lahir" required>
													<option value="">Tanggal (dd)</option>
													@for($x = 1; $x <= 31; $x++)
													<option value="{{str_pad($x,2,'0',STR_PAD_LEFT)}}">{{$x}}</option>
													@endfor
												</select>
											</div>
											<div class="col-md-4">
												<select class="form-control" name="bulan_lahir" required>
													<option value="">Bulan (mm)</option>
													<option value="01">Januari</option>
													<option value="02">Februari</option>
													<option value="03">Maret</option>
													<option value="04">April</option>
													<option value="05">Mei</option>
													<option value="06">Juni</option>
													<option value="07">Juli</option>
													<option value="08">Agustus</option>
													<option value="09">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>


												</select>
											</div>
											<div class="col-md-4">
												<input type="text" class="form-control" name="tahun_lahir" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="" required>
											</div>
										</div>
									</div>

								</div>

							</div>
						</div>

					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-3">No Telepon</div>
									<div class="col-md-9">
										<input type="text" class="form-control" name="no_telepon" placeholder="No. Telepon" value="" required>
									</div>
								</div>

							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-3">
										No. KTP
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" placeholder="No. KTP" name="no_ktp" value="" pattern="[0-9]{16}" required>
									</div>
								</div>

							</div>
						</div>

					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-6">
								<div class="row h-100">
									<div class="col-md-3">
										Alamat
									</div>
									<div class="col-md-9 h-100">
										<textarea name="alamat" rows="3" class="form-control h-100" required placeholder="Alamat"></textarea>
									</div>
								</div>

							</div>
							<div class="col-md-6">

								<div class="row mb-3">
									<label class="col-md-3">
										Kota
									</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="kota" id="kota" placeholder="Kota">
									</div>
								</div>
								<div class="row">
									<label class="col-md-3">
										Provinsi
									</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi">
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-3">
										Upload KTP
									</div>
									<div class="col-md-9">

										<input type="file"  name="file_ktp" required>
										<div style="color:red">
											*Dokumen dalam bentuk hasil scan
										</div>

									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<label class="col-md-3">
										Kode Pos
									</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos">
									</div>
								</div>
							</div>
							
						</div>

					</div>

					<div class="col-md-12">

						<button type="submit" name="" value="Submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
		
	</div>
</div>
@endsection