<table class="table table-bordered">
	<tr>
		<th>Name</th> <th>Details</th> <th>Galleries</th><th>Actions</th>
	</tr>
	@foreach($portfolios as $portfolio)
	<tr>
		<td>{{$portfolio->name}}</td><td>{!!$portfolio->description!!}</td>
		<td>
			@foreach($portfolio->galleries as $gallery)
			<img src="{{asset($gallery->image)}}" style="width: 80px;">
			@endforeach
		</td>
		<td>
			<button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" onclick="edit_portfolio('{{$portfolio->id}}','{{$portfolio->name}}',`{{$portfolio->description}}`)" data-original-title="Ubah">
				<i class="material-icons">edit</i> edit
			</button>
			<button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_portfolio('{{$portfolio->id}}')" data-original-title="Hapus">
				<i class="material-icons">close</i> delete
			</button>
		</td>
	</tr>
	@endforeach
</table>

##
{!!$galleries!!}