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
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" id="myTable">
										<colgroup>
											<col>
											<col>
											<col>
											<col>
											<col>
											<col>
											<col>
											<col>
											<col>
											<col>
										</colgroup>
										<thead class=" text-primary">
											<th>
												{{__('No')}}
											</th>
											<th>
												{{__('User')}}
											</th>
											<th>{{__('Product')}}</th>
											<th>
												{{ __('Bill Total') }}
											</th>
											<th>{{__('Paid Total')}}</th>
											<th>{{__('Transaction Status')}}</th>
											<th>
												{{ __('Date') }}
											</th>
											<th class="text-center">
												{{ __('Actions') }}
											</th>
										</thead>
										<tbody>
											@foreach($transactions as $key => $transaction)
											<tr>
												<td>{{$key + 1}}</td>
												<td>{{$transaction->user_name}}</td>
												<td>
													@php
													$count = count($transaction->items);
													@endphp
													@if($count > 1)
													<a data-toggle="collapse" href="#collapse{{$key}}">
														{{$count}} Products <i class="fa fa-caret-down"></i>
													</a>
													<div class="collapse" id="collapse{{$key}}">
														@foreach($transaction->items as $item) {{$item->REF_PAKET}}{{$item->REF_LEVEL}} - {{$item->REF_KATEGORI}}<br> @endforeach
													</div>
													
													@else
													{{$transaction->items->first()->REF_PAKET}}{{$transaction->items->first()->REF_LEVEL}} - {{$transaction->items->first()->REF_KATEGORI}}
													@endif

												</td>
												<td>Rp.{{number_format($transaction->items->sum('HARGA_PAKET'),2,',','.')}}</td>
												<td>
													@php
													$paid_total = 0;
													@endphp
													@foreach($transaction->payments as $payment)
													@if(is_numeric($payment->payment_total))
													@php $paid_total += $payment->payment_total @endphp
													@endif
													@endforeach
													Rp.{{number_format($paid_total,2,',','.')}}
												</td>
												<td>{{$transaction->status == 1 ? "Finished" : "Ongoing"}}</td>
												<td>{{date("d/m/Y",strtotime($transaction->created_at))}}</td>
												<td>
													<button class="btn btn-primary">Details</button>
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
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
</script>
@endpush