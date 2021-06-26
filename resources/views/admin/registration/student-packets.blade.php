<table class="table table-bordered">
	<tr>
		<th>SISWA</th><th>PAKET</th><th>KATEGORI</th><th>LEVEL</th>
		<th>JUMLAH JAM/PERTEMUAN</th><th>HARGA PAKET</th><th>DPP</th><th>PPN</th><th>PPH</th><th>KETERANGAN</th><th>Action</th>
	</tr>
	@php
	$total = 0;
	@endphp
	@if(count($temp_student_packet_detail))
	@foreach($temp_student_packet_detail as $data)
	@php
	$total+= $data->HARGA_PAKET;
	@endphp
	<tr>
		<td>{{$data->REF_SISWA}}</td><td>{{$data->REF_PAKET}}</td><td>{{$data->REF_KAT}}</td><td>{{$data->REF_LEVEL}}</td><td>{{$data->JUMLAH_JAM}} / {{$data->JUMLAH_PERTEMUAN}}</td><td>{{$data->HARGA_PAKET}}</td><td>{{$data->DPP}}</td><td>{{$data->PPN}}</td><td>{{$data->PPH}}</td><td>{{$data->KET}}</td><td><button class="btn btn-warning" data-regis="{{$data}}" type="button" onclick="edit_packet(this)">Edit</button><button class="btn btn-danger" type="button" onclick="delete_packet('{{$data->KD_GABUNG}}')">Delete</button></td>
	</tr>
	@endforeach
	@else
	@for($x = 1; $x <= 15 ; $x ++)
	<tr>
		<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	</tr>
	@endfor
	@endif
</table>
###
{{$total}}