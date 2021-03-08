@extends('layouts.app-auth')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<a href="{{route('admin-reseller.index',$reseller_id) }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">{{ __('Reseller Product Quota') }}</h4>
						<p class="card-category"> {{ __("Here you can manage reseller's products") }}</p>
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
						<div class="col-12 text-right">
							<a href="{{ route('admin-reseller-quota.create',$reseller_id) }}" class="btn btn-sm btn-primary">{{ __('Add Product') }}</a>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table">
										<colgroup>
											<col>
											<col>
											<col>
											<col>
											<col>
										</colgroup>
										<thead class=" text-primary">
											<th>
												{{ __('No.') }}
											</th>
											<th>{{__('Ref. Pricelist')}}</th>
											<th>
												{{ __('Ref. Produk') }}
											</th>
											<th>{{__('Link Pendaftaran')}}</th>
											<th>
												{{__('Jumlah Terdaftar')}}
											</th>
											<th>
												{{__('Sisa Quota')}}
											</th>

											<th class="text-center">
												{{ __('Actions') }}
											</th>
										</thead>
										<tbody>
											@foreach($reseller_quotas as $key => $data)
											<tr>
											<td>{{$key+=1}}</td>
											<td>{{$data->REF_PRICELIST}}</td>
											<td>{{$data->NAMA_PAKET}}</td>
											<td><a href="{{url('products/registration-and-payment/'.$reseller->kode.'/'.$data->slug)}}" target="_blank"> Buka Link</a></td>
											<td>{{count($data->registration_data)}} | <a href="{{url('admin/reseller/registration-data/'.$data->slug)}}">Lihat Data</a></td>
											<td>{{$data->quota}}</td>
											<td class="text-center">
												<form action="{{ route('admin-reseller-quota.destroy',['reseller_id' => $reseller_id,'reseller' =>$data]) }}" method="post">
													@csrf
													@method('delete')

													<a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin-reseller-quota.edit',['reseller_id' => $reseller_id,'reseller' =>$data]) }}" data-original-title="" title="">
														<i class="material-icons">edit</i>
														<div class="ripple-container"></div>
													</a>
													<button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this Banner?") }}') ? this.parentElement.submit() : ''">
														<i class="material-icons">close</i>
														<div class="ripple-container"></div>
													</button>
												</form>
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
</div>
@endsection