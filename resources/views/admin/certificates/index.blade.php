@extends('layouts.app-auth', ['activePage' => '','activeMenu' => '', 'titlePage' => __('Certificate Tracking')])

@section('content')
<div class="content">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">{{ __('Certificates') }}</h4>
						<p class="card-category"> {{ __('Here you can manage certificates') }}</p>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12 text-right">
								<a href="{{route('admin-certificate.create')}}" class="btn btn-sm btn-primary">{{ __('Add Banner') }}</a>
							</div>
						</div>						

						<table class="table table-bordered">
							<tr>
								<th>Kode Sertifikat</th><th>Paket</th><th>Level</th><th>Cabang</th><th>Murid</th><th>Action</th>
							</tr>
							@foreach($certificates as $certificate)
							<tr>
								<td>{{$certificate->KD_GABUNG}}</td><td>{{$certificate->REF_PAKET}}</td><td>{{$certificate->REF_LEVEL}}</td><td>{{$certificate->REF_PERUSAHAAN}}</td><td>{{$certificate->SISWA_NAMA}}</td>
								<td>
									<form action="" method="post">
										@csrf
										@method('delete')

										<a rel="tooltip" class="btn btn-success btn-link" href="" data-original-title="" title="">
											<i class="material-icons">edit</i>
											<div class="ripple-container"></div>
										</a>
										<button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? this.parentElement.submit() : ''">
											<i class="material-icons">close</i>
											<div class="ripple-container"></div>
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

