<table class="table table-bordered">
	<tr>
		<th>No Invoice</th><th>Transaction Number</th><th>Total</th><th>Status</th><th>Date</th><th>Action</th>
	</tr>
	@if(count($cart_lists))
	@if(count($cart_lists[0]->payments))
	@foreach($cart_lists as $data)
	@if($data->status == 0)
	<tr>
		<th>INV#{{$data->invoice_no}}</th>
		<td>{{$data->payments[count($data->payments)-1]->trx_id}}</td>
		<th>Rp.{{number_format($data->items->sum('HARGA_PAKET'),2,',','.')}}</th>
		<th>
			<span class="py-1 px-2 badge badge-warning">Ongoing</span> <a style="font-size:13px;margin-left:5px;" href="{{url('products/registration-and-payment')}}">Sudah Membayar ? Klik disini</a>
		</th>
		<th>{{date('d/m/Y',strtotime($data->updated_at))}}</th>
		<th> @if($data->status == 0)<a href="javascript:void(0)" style="color:red;" onclick="cancel_payment()">Batalkan</a> @endif <!--|<a href="javascript:void(0)" onclick="open_detail()"> Lihat Detail</a> --></th>
	</tr>
	@else
	<tr>
		<th rowspan="{{count($data->payments) + 1}}">INV#{{$data->invoice_no}}</th>
	</tr>
	@foreach($data->payments as $payment)
	<tr>
		<td>{{$payment->trx_id}}</td>
		<th>Rp.{{number_format($data->items->sum('HARGA_PAKET'),2,',','.')}}</th>
		<th>
			@if($data->status == 1)
			@if($payment->status == 2)
			<span class="py-1 px-2 badge badge-success">Success</span>
			@elseif($payment->status == 8)
			<span class="py-1 px-2 badge badge-danger">Cancelled</span>
			@else
			<span class="py-1 px-2 badge badge-danger">Failed</span>
			@endif
			
			@elseif($data->status == 0)
			<span class="py-1 px-2 badge badge-warning">Ongoing</span> <a style="font-size:13px;margin-left:5px;" href="{{url('products/registration-and-payment')}}">Sudah Membayar ? Klik disini</a>
			@endif
		</th>
		<th>{{date('d/m/Y',strtotime($payment->updated_at))}}</th>
		<th> @if($data->status == 0)<a href="javascript:void(0)" style="color:red;" onclick="cancel_payment()">Batalkan</a> @endif <a href="javascript:void(0)" onclick="open_detail()"> Lihat Detail</a></th>
	</tr>
	
	@endforeach
	@endif
	@endforeach
	@else
	<tr>
		<td colspan="6">
			There aren't any success transactions
		</td>
	</tr>
	@endif
	@else
	<tr>
		<td colspan="6">
			There aren't any ongoing transactions
		</td>
	</tr>
	@endif
</table>
{{$cart_lists->links()}}