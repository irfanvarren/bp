<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>Policy Number</th> <th>Insurance Provider</th> <th>Start Date</th> <th>End Date</th><th>Agents</th><th>Actions</th>
		</tr>
		@foreach($insurance_providers as $insurance_provider)
		<tr>
			<td>{{$insurance_provider->policy_number}}</td> 
			<td>{{$insurance_provider->name}}</td> 
			<td>{{$insurance_provider->start_date}}</td>
			<td>{{$insurance_provider->end_date}}</td>
			<td>{{$insurance_provider->agent}}</td>
			<td>

				<button type="button" class="btn-warning btn " data-original-title="" title="" onclick="edit_insurance_provider('{{$insurance_provider}}')">
					<i class="material-icons">edit</i>Edit

				</button>
				<button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? delete_insurance_provider({{$insurance_provider->id}}) : ''">
					<i class="material-icons">close</i>Delete
				</button>	

			</td>
		</tr>
		@endforeach
	</table>
</div>