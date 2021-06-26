@extends('layouts.app-auth')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">{{ __('Recruitments') }}</h4>
						<p class="card-category"> {{ __('Here you can manage recruitments') }}</p>
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
						@csrf
						<div class="table-responsive">
							<table class="table">
								<colgroup>
									<col>
									<col>
									<col>
									<col>
								</colgroup>
								<thead class=" text-primary">
									<th>
										{{ __('Nama') }}
									</th>
									<th>{{__('Source')}}</th>
									<th>
										{{ __('Alamat') }}
									</th>

									<th>
										{{ __('Email') }}
									</th>

									<th>
										{{__('No Telepon')}}
									</th>
									<th>{{__('About')}}</th>
									<th>{{__('Tanggal Daftar')}}</th>
									<th class="text-center">
										{{__('Action')}}
									</th>
								</thead>
								<tbody>
									@foreach($recruitments as $recruitment)
									<tr>
										<td>
											{{$recruitment->nama}}
										</td>
										<td>
											@if($recruitment->id_promo != "")

											@else
											
											@endif
										</td>
										<td>
											{{$recruitment->alamat}}
										</td>
										<td>
											{{$recruitment->email}}
										</td>
										<td>
											{{$recruitment->no_telepon}}
										</td>
										<td>
											{{$recruitment->about}}
										</td>
										<td>
											{{date('d/m/Y',strtotime($recruitment->created_at))}}
										</td>
										<td>
											<a href="{{url('admin/recruitments/'.$recruitment->id.'/detail')}}">Detail</a>
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
@endsection