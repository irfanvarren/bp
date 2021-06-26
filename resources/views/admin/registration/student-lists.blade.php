
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Kode</th><th>User</th><th>Nama</th><th>Tanggal Lahir</th> <th>Agama</th><th>JK</th><th>NIK</th>
			@if($type == "student-candidate")
			<th>Paket</th>
			<th>Level</th>
			<th>Kategori</th>
			@endif
			<th>Action</th>
		</tr>
		@foreach($students as $student)
		<tr>
			<td>
				{{$student->KD}}
			</td>
			<td>{{$student->user_email}}</td>
			<td>
				{{$student->NAMA}}
			</td>
			<td>
				{{$student->TGL_LAHIR}}
			</td>
			<td>
				{{$student->AGAMA}}
			</td>
			<td>
				{{$student->JK}}
			</td>
			<td>
				{{$student->REF_NIK}}
			</td>
			@if($type == "student-candidate")
			<td>{{$student->REF_PAKET}}</td>
			<td>{{$student->REF_LEVEL}}</td>
			<td>{{$student->REF_KATEGORI}}</td>
			@endif
			<td>
				@php
				$data_student = $student->toArray();
				unset($data_student['PIC']);
				unset($data_student['QRCODE']);
				@endphp
				@if($type == "student-candidate")
				<button class="btn btn-primary" type="button" onclick="select_student_list(this,true)" data-student="{{json_encode($data_student)}}">Tambah Murid</button>
				@else
				<button class="btn btn-primary" type="button" onclick="select_student_list(this,false)" data-student="{{json_encode($data_student)}}">Select</button>
				@endif
			</td>
		</tr>
		@endforeach
	</table>
	{{$students->links('admin.registration.student-lists-pagination')}}
</div>