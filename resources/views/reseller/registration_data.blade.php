@extends('layouts.bp_wo_sidenav')
@push('head-js')
<style type="text/css">

</style>
@endpush
@section('content')
<div class="container content-wrapper">
	<div class="col-md-12 mb-3">
		<a href="{{url('reseller')}}">Back</a>
	</div>
	<div class="card" style="border:none;border-radius:15px;box-shadow : 0 0 10px #cecece;padding:15px;">

		<div class="card-body">
			<div class="row">
				
				<div class="col-md-12">
					<h3><strong>Registration Data</strong></h3>
				</div>
				<div class="col-md-12">
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
@endsection