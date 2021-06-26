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
				<th>Policy Number</th><th>Insurance Providers Name</th>
				<th>Start Date</th><th>End Date</th> <th>Agent</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($insurance_providers as $insurance_provider)
			<tr>
				<td>{{$insurance_provider->policy_number}}</td>
				<td>
					{{$insurance_provider->name}}
				</td>
				<td>{{$insurance_provider->start_date}}</td>
				<td>{{$insurance_provider->end_date}}</td>
				<td>{{$insurance_provider->agent}}</td>
				<td>
					<button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_cipd('{{$insurance_provider}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_cipd({{$insurance_provider->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>

				</td>
			</tr>				
			@endforeach
		</tbody>
	</table>
</div>