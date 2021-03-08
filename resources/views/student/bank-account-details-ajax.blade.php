<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>Bank Name</th> <th>Account Name</th> <th>Account Number</th> <th>BSB</th> <th>Swift Code</th> <th>Bank Address</th> <th>Actions</th>
							</tr>
							@foreach($bank_accounts as $bank_account)
							<tr>
								<td>{{$bank_account->bank_name}}</td> <td>{{$bank_account->account_name}}</td> <td>{{$bank_account->account_number}}</td>
								<td>{{$bank_account->bsb}}</td>
								<td>{{$bank_account->swift_code}}</td>
								<td>{{$bank_account->address}}</td>
								 <td>

									<button type="button" class="btn-warning btn " data-original-title="" title="" onclick="edit_bank_account('{{$bank_account}}')">
										<i class="material-icons">edit</i>Edit

									</button>
									<button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? delete_bank_account({{$bank_account->id}}) : ''">
										<i class="material-icons">close</i>Delete
									</button>	

								</td>
							</tr>
							@endforeach
						</table>
					</div>