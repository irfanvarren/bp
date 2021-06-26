@if($student_informations && $student_informations->obligations != "" && $student_informations->obligations != null && $student_informations->count())
@php
$obligations = explode('|',$student_informations->obligations);
@endphp
<table class="table table-bordered">
	<tr>
		<th colspan="2">obligations</th>
	</tr> 
	@foreach($obligations as $key => $right)

	<tr>
		<td>{{$right}}</td>
		<td>
			<button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
			onclick="edit_student_obligations('{{$student_informations->id}}','{{$student_informations->school_id}}','{{$student_informations->obligations}}','{{$key}}')" data-original-title="Ubah">
			<i class="material-icons">edit</i>
			Edit
		</button>
		<button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_student_obligations('{{$student_informations->id}}','{{$student_informations->school_id}}','{{$student_informations->obligations}}','{{$key}}')" data-original-title="Hapus">
			<i class="material-icons">close</i>
			Delete
		</button>
	</td>
</tr>
@endforeach
</table>
@endif
