<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Country</th> <th>Date Of Grant</th> <th>Length Of Stay</th> <th>TRN Number</th> <th>Actions</th>
		</tr>
		@foreach($visa_histories as $visa_history)
		<tr>
			<td>{{$visa_history->country_name}}</td> <td>{{$visa_history->date_of_grant}}</td> <td>{{$visa_history->length_of_stay}}</td>
			<td>{{$visa_history->trn_number}}</td>
			<td>
				<button type="button" class="btn-warning btn " data-original-title="" title="" onclick="edit_visa_history('{{$visa_history}}')">
					<i class="material-icons">edit</i>Edit

				</button>
				<button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? delete_visa_history({{$visa_history->id}}) : ''">
					<i class="material-icons">close</i>Delete
				</button>	

			</td>
		</tr>
		@endforeach
	</table>
</div>