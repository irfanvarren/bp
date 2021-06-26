<div class="table-responsive">
	<table class="table table-bordered">
		<colgroup>
			<col>
			<col>
			<col>
		</colgroup>
		<thead>
			<tr>
				<th>Passport Number</th><th>Name</th><th>Expired Date</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($passport_histories as $passport_history)
			<tr>
				<td>
					{{$passport_history->passport_number}}
				</td>
				<td>{{$passport_history->name}}</td>
				<td>{{date("d/m/Y",strtotime($passport_history->expired_date))}}</td>
				
				<td>
					<button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_ph(`{{$passport_history}}`)" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_ph({{$passport_history->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>

				</td>
			</tr>				
			@endforeach
		</tbody>
	</table>
</div>