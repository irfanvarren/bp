@if($multiple_questions->isEmpty())
<div style="padding:15px;border:1px solid black;" class="col-md-12">
                                No Question, Please Add Question...
                            </div>
@else
<table class="table table-bordered">
	<tr>
		<th>No</th> <th>Question</th> <th>Action</th>
	</tr>
	@foreach($multiple_questions as $key => $value)
	<tr>
		<td>{{$key+=1}}</td> <th>{!!$value->question!!}</th> <th> <a href="" onclick="edit_multiple_question()"> Edit </a> | <a href="" onclick="delete_multiple_question()"> Delete </a> </th>
	</tr>
	@endforeach
</table>
@endif