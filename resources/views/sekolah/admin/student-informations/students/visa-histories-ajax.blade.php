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
				<th>Country</th><th>Date of Grant</th>
				<th>Length of Stay</th><th>TRN Number</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($visa_histories as $visa_history)
			<tr>
				<td>{{$visa_history->country_name}}</td>
				<td>
					{{$visa_history->date_of_grant}}
				</td>
				<td>{{$visa_history->length_of_stay}}</td>
				<td>{{$visa_history->trn_number}}</td>
				<td>
					<button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_vh('{{$visa_history}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_vh({{$visa_history->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>

				</td>
			</tr>				
			@endforeach
		</tbody>
	</table>
</div>