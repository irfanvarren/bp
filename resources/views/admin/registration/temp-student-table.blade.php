	<div class="table-responsive">
		<table class="table table-bordered">
			@if($cmd == "select")
			<thead>
			<tr>
				<th>Kode</th><th>Nama</th><th>Action</th>
			</tr>
			</thead>
			<tbody>
			@foreach($temp_student_detail as $key => $temp)
			<tr>
				<td>{{$temp->REF_SISWA}}</td><td>{{$temp->NAMA}}</td><td><button type="button" class="btn btn-primary" onclick="select_student('{{$parent}}','{{$temp->REF_SISWA}}','{{$key}}')">Pilih</button></td>
			</tr>
			@endforeach
			</tbody>
			@else
			<thead>
			<tr>
				<th>No Siswa</th><th>Title</th><th>Nama</th><th>JK</th><th>Tgl Lahir</th><th>Agama</th><th>Alamat</th><th>Kota</th><th>Action</th>
			</tr>
			</thead>
			<tbody>
			@foreach($temp_student_detail as $temp)
			<tr>
				<th>{{$temp->REF_SISWA}}</th><th>{{$temp->TITLE}}</th><th>{{$temp->NAMA}}</th><th>{{$temp->JK}}</th><th>{{$temp->TGL_LAHIR}}</th><th>{{$temp->AGAMA}}</th><th>{{$temp->ALAMAT}}</th><th>{{$temp->REF_KOTA}}</th><th><button class="btn btn-danger" type="button" onclick="delete_temp_student('{{$temp->KD_GABUNG}}','{{$temp->REF_SISWA}}')">Delete</button></th>
			</tr>
			@endforeach
			</tbody>
			@endif
		</table>
	</div>