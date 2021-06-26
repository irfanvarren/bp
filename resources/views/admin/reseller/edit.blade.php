@extends('layouts.app-auth')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="{{route('admin-reseller.update',$reseller)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
					@csrf
					@method('put')
					<div class="card ">
						<div class="card-header card-header-primary">
							<h4 class="card-title">{{ __('Edit Reseller') }}</h4>
							<p class="card-category"></p>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12 text-right">
									<a href="{{route('admin-reseller.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
								</div>
							</div>

							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Kode') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('kode') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('kode') ? ' is-invalid' : '' }}" name="kode" id="input-kode" type="text" placeholder="{{ __('Kode') }}" value="{{ old('kode',$reseller->kode) }}" />
										@if ($errors->has('kode'))
										<span id="harga-error" class="error text-danger" for="input-kode">{{ $errors->first('kode') }}</span>
										@endif
									</div>

								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Nama') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" id="input-nama" type="text" placeholder="{{ __('Nama') }}" value="{{ old('nama',$reseller->nama) }}" />
										@if ($errors->has('nama'))
										<span id="harga-error" class="error text-danger" for="input-nama">{{ $errors->first('nama') }}</span>
										@endif
									</div>

								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __('Email') }}" value="{{ old('email',$reseller->email) }}" />
										@if ($errors->has('email'))
										<span id="harga-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
										@endif
									</div>

								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('No Telepon') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('no_telepon') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('no_telepon') ? ' is-invalid' : '' }}" name="no_telepon" id="input-no_telepon" type="text" placeholder="{{ __('No Telepon') }}" value="{{ old('no_telepon',$reseller->no_telepon) }}" />
										@if ($errors->has('no_telepon'))
										<span id="harga-error" class="error text-danger" for="input-no_telepon">{{ $errors->first('no_telepon') }}</span>
										@endif
									</div>

								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Tempat Lahir') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('tempat_lahir') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" name="tempat_lahir" id="input-tempat_lahir" type="text" placeholder="{{ __('Tempat Lahir') }}" value="{{ old('tempat_lahir',$reseller->tempat_lahir) }}" />
										@if ($errors->has('tempat_lahir'))
										<span id="harga-error" class="error text-danger" for="input-tempat_lahir">{{ $errors->first('tempat_lahir') }}</span>
										@endif
									</div>

								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Tanggal Lahir') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" name="tanggal_lahir" id="input-tanggal_lahir" type="date" placeholder="{{ __('Tanggal Lahir') }}" value="{{ old('tanggal_lahir',$reseller->tanggal_lahir) }}" />
										@if ($errors->has('tanggal_lahir'))
										<span id="harga-error" class="error text-danger" for="input-tanggal_lahir">{{ $errors->first('tanggal_lahir') }}</span>
										@endif
									</div>

								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('No. KTP') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('no_ktp') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('no_ktp') ? ' is-invalid' : '' }}" name="no_ktp" id="input-no_ktp" type="text" placeholder="{{ __('No. KTP') }}" value="{{ old('no_ktp',$reseller->no_ktp) }}" />
										@if ($errors->has('no_ktp'))
										<span id="harga-error" class="error text-danger" for="input-no_ktp">{{ $errors->first('no_ktp') }}</span>
										@endif
									</div>

								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Alamat') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('alamat') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" id="input-alamat" type="text" placeholder="{{ __('Alamat') }}" value="{{ old('alamat',$reseller->alamat) }}" />
										@if ($errors->has('alamat'))
										<span id="harga-error" class="error text-danger" for="input-alamat">{{ $errors->first('alamat') }}</span>
										@endif
									</div>

								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Kota') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('kota') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('kota') ? ' is-invalid' : '' }}" name="kota" id="input-kota" type="text" placeholder="{{ __('Kota') }}" value="{{ old('kota',$reseller->kota) }}" />
										@if ($errors->has('kota'))
										<span id="harga-error" class="error text-danger" for="input-kota">{{ $errors->first('kota') }}</span>
										@endif
									</div>

								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Provinsi') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('provinsi') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('provinsi') ? ' is-invalid' : '' }}" name="provinsi" id="input-provinsi" type="text" placeholder="{{ __('Provinsi') }}" value="{{ old('provinsi',$reseller->provinsi) }}" />
										@if ($errors->has('provinsi'))
										<span id="harga-error" class="error text-danger" for="input-provinsi">{{ $errors->first('provinsi') }}</span>
										@endif
									</div>

								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Kode Pos') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('kode_pos') ? ' has-danger' : '' }}">
										<input class="form-control{{ $errors->has('kode_pos') ? ' is-invalid' : '' }}" name="kode_pos" id="input-kode_pos" type="text" placeholder="{{ __('Kode Pos') }}" value="{{ old('kode_pos',$reseller->kode_pos) }}" />
										@if ($errors->has('kode_pos'))
										<span id="harga-error" class="error text-danger" for="input-kode_pos">{{ $errors->first('kode_pos') }}</span>
										@endif
									</div>

								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
								<div class="col-sm-7">
									<div class="togglebutton form-group">
										<label id="status-ajax">
											<input type="checkbox" class="status_input" name="status" onchange="change_status(this)" {{$reseller->status == 1 ? "checked" : ""}}>
											<span class="toggle"></span>
										</label>
										<span class="status-label" id="status-label" for="status"> {{$reseller->status == "1" ? "Active" : "Inactive"}} </span>
									</div>

								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('File KTP') }}</label>
								<div class="col-sm-7">
									<img src="{{asset(Storage::disk('local')->url($reseller->file_ktp))}}" style="max-width: 300px;">
									
									
								</div>
							</div>
							
						</div>

						<div class="card-footer ml-auto mr-auto">
							<button type="submit" class="btn btn-primary">{{ __('Edit Reseller') }}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
@push('js')
<script type="text/javascript">
	$(document).on("change","#status-ajax input",function(){
    var status = this.checked;

    var id = $(this).val();

    if(status == true){
      $('.status-label').html("Active");
    }else if(status == false){
      $('.status-label').html("Non Active");
    }
  });
</script>
@endpush