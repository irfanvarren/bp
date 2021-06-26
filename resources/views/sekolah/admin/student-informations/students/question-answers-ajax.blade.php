<div class="table-responsive">
	<table class="table table-bordered">
		<colgroup>
			<col>
			<col style="width:25%">
			<col style="width: 25%">
			<col style="width:25%">
			<col>
		</colgroup>
		<thead>
			<tr>
				<th>Date</th><th>Discussion</th><th>Solution</th><th>Progress</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($question_answers as $question_answer)
			<tr>
				<td>{{date("d/m/Y",strtotime($question_answer->date))}}</td>
				<td>{{$question_answer->discussion}}</td>
				
				<td>
					{!!$question_answer->solution!!}
				</td>
				<td>
					{!!$question_answer->progress !!}
				</td>
				<td>
					<button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_qna(`{!!addslashes(htmlspecialchars($question_answer))!!}`)" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_qna({{$question_answer->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>

				</td>
			</tr>				
			@endforeach
		</tbody>
	</table>
</div>