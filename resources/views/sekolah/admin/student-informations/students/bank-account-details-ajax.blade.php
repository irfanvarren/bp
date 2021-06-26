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
				<th>Bank Name</th><th>Account Name</th><th>Account Number</th>
				<th>BSB</th><th>Swift Code</th> <th>Bank Address</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($bank_account_details as $bank_account_detail)
			<tr>
				<td>{{$bank_account_detail->bank_name}}</td>
				<td>{{$bank_account_detail->account_name}}</td>
				<td>
					{{$bank_account_detail->account_number}}
				</td>
				<td>{{$bank_account_detail->bsb}}</td>
				<td>{{$bank_account_detail->swift_code}}</td>
				<td>{{$bank_account_detail->address}}</td>
				<td>
					<button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_bad('{{$bank_account_detail}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_bad({{$bank_account_detail->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>

				</td>
			</tr>				
			@endforeach
		</tbody>
	</table>
</div>