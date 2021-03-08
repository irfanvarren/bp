@extends('layouts.app-auth')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<a href="{{route('admin-reseller-quota.index',['reseller_id' =>$reseller_id]) }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">{{ __('Registration Data') }}</h4>
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
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No.</th><th>Nama</th><th>Email</th><th>No. Telepon</th><th>No. KTP</th><th>Tempat/Tanggal Lahir</th><th>Jenis Kelamin</th><th>Tanggal Pendaftaran</th>
									</tr>
								</thead>
								<tbody>
									@foreach($registration_data as $key => $data)
									<tr>
										<td>{{$key += 1}}</td>
										<td>
											{{ucwords($data->NAMA)}}
										</td> 
										<td>{{$data->EMAIL}}</td>
										<td>{{$data->KONTAK}}</td>
										<td>{{$data->REF_KTP}}</td>
										<td>{{ucwords($data->KOTA_KELAHIRAN)}}/{{date("d-m-Y",strtotime($data->TGL_LAHIR))}}</td>
										<td>{{$data->JK}}</td>
										<td>{{date("d-m-Y",strtotime($data->created_at))}}</td>
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
@endsection