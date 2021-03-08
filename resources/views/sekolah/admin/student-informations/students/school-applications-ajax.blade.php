<div class="table-responsive">
	<table class="table table-bordered">
		<colgroup>
			<col>
			<col>
			<col>
			<col style="width: 60px;">
		</colgroup>
		<thead>
			<tr>
				<th>Country</th><th>Schools</th>
				<th>Programs</th><th>Class Shift</th> <th>Agent Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($school_applications as $school_application)
			<tr>
				<td>{{$school_application->school_country}}</td>
				<td>
					{{$school_application->school_name}}
				</td>
				<td>{{$school_application->program_name}}</td>
				<td>{{$school_application->class_shift}}</td>
				<td>{{$school_application->agent}}</td>
				<td>
					<button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_sai('{{$school_application}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_sai({{$school_application->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>

				</td>
			</tr>				
			@endforeach
		</tbody>
	</table>
</div>