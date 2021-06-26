@extends('layouts.app-auth')
@push('head-js')
<style type="text/css">
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
						<h4 class="card-title ">{{ __("Member's Balance") }}</h4>
						<p class="card-category"> {{ __("Member's Balance") }}</p>
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
								<div>Nama : {{$user->name}}</div>
								<div>Email : {{$user->email}}</div>
								<div>No Telepon : {{$user->no_telepon}}</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<a class="btn btn-warning" href="#">Balance In</a>
								<a class="btn btn-warning" href="#">Balance Out</a>
								<div class="row">
									<div class="col-12 text-right">
										<a href="{{ route('admin-member-balance.create',['user_id' => $user_id]) }}" class="btn btn-sm btn-primary">{{ __('Add Balance') }}</a>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" id="myTable">
										<colgroup>
											<col>
											<col>
											<col>
										</colgroup>
										<thead class=" text-primary">
											<th>
												{{__('Balance Type')}}
											</th>
											<th>
												{{__('Amount')}}
											</th>
											<th>
												{{__('Description')}}
											</th>
											<th class="text-center">
												{{ __('Actions') }}
											</th>
										</thead>
										<tbody>
											@foreach($member_balances as $key => $member_balance)
											<tr>
												<td>In</td>
												<td>{{$member_balance->amount}}</td>
												<td>{{$member_balance->description}}</td>
												<td class="text-center">
													<form action="{{route('admin-member-balance.destroy',['id' => $member_balance,'user_id' => $user_id])}}" method="post">
														@csrf
														@method('delete')
														<input type="hidden" name="user_id" value="{{$user_id}}">
														<a rel="tooltip" class="btn btn-success btn-link" href="{{route('admin-member-balance.edit',$member_balance)}}" data-original-title="" title="">
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