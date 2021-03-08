<table class="table table-bordered">
	<tr>
		<th>Role</th> <th>Permissions</th> <th>Action</th>
	</tr>
	@foreach($permissions as $permission)
	<tr>
		<td>Admin</td> <td>{{$permission->name}}</td> <td>
			<button rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
				<i class="material-icons">edit</i>
				<div class="ripple-container"></div>
				edit
			</button>
			<button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this role?") }}') ? this.parentElement.submit() : ''">
				<i class="material-icons">close</i>
				<div class="ripple-container"></div>
				delete
			</button>
		</td>
	
	</tr>
		@endforeach
</table>