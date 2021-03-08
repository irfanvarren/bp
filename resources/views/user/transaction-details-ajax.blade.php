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