@extends('layouts.student-dashboard')
@push('head-script')
<style type="text/css">
	.dataTables_filter{
		float: right;
	}
	.dataTables_filter input,.dataTables_length select{
		display: inline !important;
		width: auto !important;
	}
	.dataTables_filter input{
		margin-left: 15px;
	}
	.dataTables_length select{
		margin: 0 5px;
	}
</style>
@endpush
@section('student-content')
<div class="card">
	<div class="card-body">
		<table  class="table table-bordered table-hover dataTable no-footer dtr-inline" id="myTable">
			<thead>
			<tr>
				<th>No</th> <th>Paket</th> <th>Jumlah</th> <th>Tanggal</th>
			</tr>
			</thead>
			<tbody>
				@foreach($transactions as $key => $transaction)
			<tr>
				<td>{{$key + 1}}</td>
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
													
													@elseif($count == 1)
													@if(!$transaction->items->first())
														{{dd($transaction->items)}}
													
													@endif
													{{$transaction->items->first()->REF_PAKET}}{{$transaction->items->first()->REF_LEVEL}} - {{$transaction->items->first()->REF_KATEGORI}}
													@endif
				</td>
				<td>Rp.{{number_format($transaction->items->sum('HARGA_PAKET'),2,',','.')}}</td>
				<td>{{date("d/m/Y",strtotime($transaction->created_at))}}</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@push('more-script')
<script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	
  $(document).ready( function () {
    $('#myTable').DataTable({
      "paging":true
    });
  } );
</script>
@endpush