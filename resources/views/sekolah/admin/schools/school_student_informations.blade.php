@if($student_informations && $student_informations->rights != "" && $student_informations->rights != null && $student_informations->count())
@php
$rights = explode('|',$student_informations->rights);
@endphp
<table class="table table-bordered">
	<tr>
		<th colspan="2">Rights</th>
	</tr> 
	@foreach($rights as $key => $right)

	<tr>
		<td>{{$right}}</td>
		<td>
			<button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
			onclick="edit_student_rights('{{$student_informations->id}}','{{$student_informations->school_id}}','{{$student_informations->rights}}','{{$key}}')" data-original-title="Ubah">
			<i class="material-icons">edit</i>
			Edit
		</button>
		<button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_student_rights('{{$student_informations->id}}','{{$student_informations->school_id}}','{{$student_informations->rights}}','{{$key}}')" data-original-title="Hapus">
			<i class="material-icons">close</i>
			Delete
		</button>
	</td>
</tr>
@endforeach
</table>
@endif
