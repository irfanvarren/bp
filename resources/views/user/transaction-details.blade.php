@extends('layouts.user-dashboard')
@section('user-content')
@csrf
<div class="col-md-12">
	<h3 class="mb-3">Transaction Details</h3>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="ongoing-tab" data-toggle="tab" href="#transaction-ongoing" onclick="change_tab('ongoing')" role="tab" aria-controls="ongoing" aria-selected="true">Ongoing</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="success-tab" data-toggle="tab" href="#transaction-success" onclick="change_tab('success')" role="tab" aria-controls="success" aria-selected="false">Success</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="cancelled-tab" data-toggle="tab" href="#transaction-cancelled" onclick="change_tab('cancelled')" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</a>
		</li>
	</ul>
	<div id="transaction-details-output">
	<table class="table table-bordered">
		<tr>
			<th>No Invoice</th><th>Total</th><th>Status</th><th>Date</th><th>Action</th>
		</tr>
		@if(count($cart_lists))
		@foreach($cart_lists as $data)
		<tr>
			
			<th>INV#{{$data->invoice_no}}</th>
			<th>Rp.{{number_format($data->items->sum('HARGA_PAKET'),2,',','.')}}</th>
			<th>
				@if($data->status == 1)
				<span class="py-1 px-2 badge badge-success">Success</span>
				@elseif($data->status == 0)
				<span class="py-1 px-2 badge badge-warning">Ongoing</span> <a style="font-size:13px;margin-left:5px;" href="{{url('products/registration-and-payment')}}">Sudah Membayar ? Klik disini</a>
				@endif
			</th>
			<th>{{date('d/m/Y',strtotime($data->updated_at))}}</th>
			<th> @if($data->status == 0)<a href="javascript:void(0)" style="color:red;" onclick="cancel_payment()">Batalkan</a> |@endif <a href="javascript:void(0)" onclick="open_detail()"> Lihat Detail</a></th>
		</tr>
		@endforeach
		@else
		<tr>
			<td colspan="5">
			There aren't any ongoing transactions
			</td>
		</tr>
		@endif
	</table>
	{{$cart_lists->links()}}
	</div>
</div>
@endsection

@push('more-script')
<script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
<script type="text/javascript">
	var token = $("input[name='_token']").val();
	function cancel_payment(){
		Swal.fire({
			title: 'Are you sure want to cancel this payment?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
		}).then((result) => {
			if (result.value) {
				location.href ="{{route('back-to-billing')}}";
			}
		});
	}
	function change_tab(type){
		$.ajax({
			url: "{{route('transaction-details-ajax')}}",
			method: "GET",
			data:{
				_token : token,
				type : type
			},success:function(data){
				$('#transaction-details-output').html(data);
			},error:function(){

			}
		});
	}
</script>
@endpush