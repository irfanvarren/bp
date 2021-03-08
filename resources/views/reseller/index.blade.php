@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="container content-wrapper">
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
	@if($message != "")
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-danger">
				<span>{{ $message }}</span>
			</div>
		</div>
	</div>
	@else
	@csrf
	<div class="col-md-12 py-3 text-center">
		<h2>Welcome, {{$reseller->nama}}</h2>
		<div><h5>Here is your reseller portal</h5></div>
	</div>
	<div class="card" style="border:none;border-radius:15px;box-shadow : 0 0 10px #cecece;padding:15px;">
		<div class="card-body">
			<div class="row mb-3">
				<div class="col-md-12">
					<h3><strong>Data Pendaftaran</strong></h3>
				</div>
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No.</th><th>Produk</th><th>Link</th><th>Sisa Quota</th><th>Jumlah Terdaftar</th><th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($quotas as $key => $data)
								<tr>
									<td>{{$key += 1}}</td> <td>{{$data->REF_PAKET}}</td><td><a href="{{url('products/registration-and-payment/'.$reseller->kode.'/'.$data->slug)}}" target="_blank">Buka Link</a> | <a onclick="copyURI(event)" href="{{url('products/registration-and-payment/'.$reseller->kode.'/'.$data->slug)}}">copy</a></td><td>{{$data->quota}}</td><td>{{count($data->registration_data)}}</td><td> <a href="{{url('reseller/registration-data/'.$data->slug)}}"> Lihat Data Pendaftaran </a> </td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div>
							{!!$quotas->links()!!}
						</div>
					</div>
				</div>
			</div>
			@if(count($online_test_registrations))
			<div class="row mb-3">
				<div class="col-md-12">
					<h3><strong>Approve Online Test</strong></h3>
				</div>
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped table-bordered" style="width: 100%" id="myTable">
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
									{{__('Test')}}
								</th>
								<th>
									{{__('Nama')}}
								</th>
								<th>
									{{ __('No Telepon') }}
								</th>
								<th>{{ __('Email') }}</th>
								<th>Skills</th>

								<th>{{__('Bukti Pembayaran')}}</th>

								<th>{{__('Approved')}}</th>
								<th>{{__('Registered At')}}</th>
							</thead>

							<tbody>
								@php
								$no = 1;
								@endphp
								@foreach($online_test_registrations as $data)
								<tr>
									<td> {{$no++}} </td>
									<td> {{$data->test_name}} {{$data->module_name != "" ? "(".$data->module_name.")" : ""}} </td>
									<td>  
										{{ $data->NAMA }}
									</td>
									<td>{{$data->KONTAK}}</td>
									<td>{{$data->EMAIL}}</td>
									<td>
										@if($data->skills != "")
										@php
										$array = explode(',',$data->skills);
										foreach ($array as $key => $id){
										$type = collect($section_types)->where('id',$id)->first();
										@endphp
										@if($key > 0)
										, 
										@endif
										{{$type->name}}
										@php
									}
									@endphp

									@endif
								</td>
								<td><img style="max-width:180px;" src="{{asset(Storage::disk('local')->url($data->bukti_pembayaran))}}"></td>
								<td>
									<div class="togglebutton" >
										<label id="status-ajax">
											<input type="checkbox" id="status-{{$no}}" onchange="approve('#status-label-{{$no}}','{{$data->id}}',this)" class="status_input" name="status" {{$data->status == "approved" ? "checked" : ""}}>
											<span class="toggle"></span>
										</label><br>
										<span class="status-label" id="status-label-{{$no}}" for="status">{{$data->status == "approved" ? "Approved" : "Not Approved"}}</span>
									</div>

								</td>
								<td>
									{{date("d F Y",strtotime($data->created_at))}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

				</div>
			</div>
		</div>
		@endif
			<!--<div class="row">
				<div class="col-md-12">
					<h3><strong>Tambah Produk</strong></h3>
					<div>Tambahkan Produk Lainnya</div>
				</div>
				<div class="col-md-12" >
					<div class="row">
						@foreach($products as $product)
						<div class="col-12 col-sm-6 col-lg-4 col-xl-3 py-3 text-center">
							<div style="border:1px solid #d0d0d0;display: block;padding-bottom:10px;">
								<div style="display: table;height: 75px;width: 100%;">

									<span style="vertical-align:middle;display: table-cell;height:100%;color:black;width: 100%;font-size:1.2em;">
										{{$product->NAMA}}
									</span>
								</div>
								<a href="#" class="text-left py-2 px-3 " style="border-top:1px solid #dedede;">
									Description
								</a>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>-->
		</div>
	</div>
	@endif
	
	
</div>
@endsection
@push('more-script')
<script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
	function copyURI(evt) {
		evt.preventDefault();
		navigator.clipboard.writeText(evt.target.getAttribute('href')).then(() => {
			/* clipboard successfully set */
			alert('Text copied to clipboard');
		}, () => {
			/* clipboard write failed */
			alert('Could not copy text: ', err);
		});
	}

	function approve(label,id,evt){

		var status = evt.checked;
		var token = $("input[name='_token']").val();
		if(evt.checked == true){

			if(confirm("Are you sure want to approve this ?")){
				$('.loading-wrapper').show();
				$(label).html("Approved");
				$.ajax({
					url: "{{route('admin.approve_online_test_registration')}}",
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
			if(confirm("Are you sure want to disapprove this ?")){
				$('.loading-wrapper').show();
				$(label).html("Not Approved");
				$.ajax({
					url: "{{route('admin.approve_online_test_registration')}}",
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