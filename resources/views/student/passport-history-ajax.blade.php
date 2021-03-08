<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>Passport Number</th> <th>Name</th> <th>Expired Date</th><th>Actions</th>
							</tr>
							@foreach($passport_histories as $passport_history)
							<tr>
								<td>{{$passport_history->passport_number}}</td> <td>{{$passport_history->name}}</td> <td>{{$passport_history->expired_date}}</td>
								<td>
									  <button type="button" class="btn-warning btn " data-original-title="" title="" onclick="edit_passport('{{$passport_history}}')">
                                                <i class="material-icons">edit</i>Edit
                                                    
                                            </button>
                                            <button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? delete_passport({{$passport_history->id}}) : ''">
                                                <i class="material-icons">close</i>Delete
                                            </button>	
								</td>
							</tr>
							@endforeach
						</table>
					</div>