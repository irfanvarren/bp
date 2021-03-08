@extends('layouts.app-auth')
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
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
						<h4 class="card-title ">{{ __('Transaction Lists') }}</h4>
						<p class="card-category"> {{ __('Transaction Lists') }}</p>
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
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" id="myTable">
										<colgroup>
											<col>
											<col>
											<col>
										</colgroup>
										<thead class=" text-primary">
											<th>
												{{__('Membership')}}
											</th>
											<th>
												{{__('Minimal Transaksi')}}
											</th>
											<th>
												{{__('Maksimal Transaksi')}}
											</th>
											<th class="text-center">
												{{ __('Actions') }}
											</th>
										</thead>
										<tbody>
											@foreach($memberships as $key => $membership)
											<tr>
												<td>{{$membership->roles}}</td>
												<td>{{$membership->min_transaction}}</td>
												<td>{{$membership->max_transaction}}</td>
												<td>
													<form action="{{route('admin-membership.destroy')}}" method="post">
														@csrf
														@method('delete')

														<a rel="tooltip" class="btn btn-success btn-link" href="" data-original-title="" title="">
															<i class="material-icons">edit</i>
															<div class="ripple-container"></div>
														</a>
														<button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this news?") }}') ? this.parentElement.submit() : ''">
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