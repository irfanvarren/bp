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
				<th>Products</th><th>Score</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			@foreach($english_qualifications as $english_qualification)
			<tr>
				<td>{{$english_qualification->products}}</td>
				<td>
					@if($english_qualification->qualification_name != ""){{$english_qualification->qualification_name}} : @endif{{$english_qualification->qualification_score}}
				</td>
				<td>
					<button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_seq('{{$english_qualification}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_seq({{$english_qualification->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>

				</td>
			</tr>				
			@endforeach
		</tbody>
	</table>
</div>