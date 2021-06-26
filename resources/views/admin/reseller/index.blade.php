@extends('layouts.app-auth')
@push('head-js')
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
						<h4 class="card-title ">{{ __('Reseller') }}</h4>
						<p class="card-category"> {{ __('Here you can manage resellers') }}</p>
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
									<col>
								</colgroup>
								<thead class=" text-primary">
									<th>
										{{ __('Nama') }}
									</th>
									<th>{{__('Email')}}</th>
									<th>
										{{ __('No Telepon') }}
									</th>
									<th>
										{{ __('Jumlah Produk') }}
									</th>
									<th>
										{{__('Jumlah Terdaftar')}}
									</th>
									<th>
										{{__('Status')}}
									</th>
									<th>
										{{__('Created At')}}
									</th>


									<th class="text-center">
										{{ __('Actions') }}
									</th>
								</thead>
								<tbody>
									@php
									$no = 1;
									@endphp
									@foreach($resellers as $reseller)
									<tr>
										<td>
											{{ $reseller->nama }}
										</td>
										<td>{{$reseller->email}}</td>
										<td>
											{{$reseller->no_telepon }}
										</td>
										<td>{{count($reseller->products)}}</td>
										<td>{{count($reseller->registration_data)}}</td>
										<td>
											<div class="togglebutton" >
												<label id="status-ajax">
													<input type="checkbox" id="status-{{$no}}" onchange="change_status('#status-label-{{$no}}','{{$reseller->id}}',this)" class="status_input" name="status" {{$reseller->status == 1 ? "checked" : ""}}>
													<span class="toggle"></span>
												</label><br>
												<span class="status-label" id="status-label-{{$no}}" for="status">{{$reseller->status == "1" ? "Active" : "Inactive"}}</span>
											</div>
										</td>
										<td>
											{{ $reseller->created_at->format('d-m-Y') }}
										</td>

										<td class="text-center">
											<form action="{{route('admin-reseller.destroy',$reseller)}}" method="post">
												@csrf
												@method('delete')
												<a rel="tooltip" class="btn btn-link" style="color:black;" href="{{route('admin-reseller-quota.index',$reseller)}}" data-original-title="" title="">
													<i class="material-icons">visibility</i>
													<div class="ripple-container"></div>
													Detail
												</a>
												<a rel="tooltip" class="btn btn-success btn-link" href="{{route('admin-reseller.edit',$reseller)}}" data-original-title="" title="">
													<i class="material-icons">edit</i>
													<div class="ripple-container"></div>
													Edit
												</a>
												<button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? this.parentElement.submit() : ''">
													<i class="material-icons">close</i>
													<div class="ripple-container"></div>
													Delete
												</button>
											</form>
										</td>
									</tr>
									@php
									$no++;
									@endphp
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
@push('js')
<script type="text/javascript">
	function change_status(label,id,evt){

		var status = evt.checked;
		var token = $("input[name='_token']").val();
		if(evt.checked == true){

			if(confirm("Are you sure want to change this status ?")){
				$('.loading-wrapper').show();
				$(label).html("Active");
				$.ajax({
					url: "{{route('admin-reseller.change-status')}}",
					method: 'POST',
					data: {
						_token: token,
						id:id,
						status: status
					},
					success: function(data) {
						$('#output').html(data);
					},
					error: function() {
          //handle errors
          alert('error...');
      },complete: function(){
      	$('.loading-wrapper').hide();
      }
  });
			}else{
				evt.checked = false;
			}
		}else{
			if(confirm("Are you sure want to change this status ?")){
				$('.loading-wrapper').show();
				$(label).html("Inactive");
				$.ajax({
					url: "{{route('admin-reseller.change-status')}}",
					method: 'POST',
					data: {
						_token: token,
						id:id,
						status: status
					},
					success: function(data) {
						$('#output').html(data);
					},
					error: function() {
                  //handle errors
                  alert('error...');
              },complete: function(){
              	$('.loading-wrapper').hide();
              }
          });
			}else{
				evt.checked = true;
			}


		}


	}
</script>
@endpush