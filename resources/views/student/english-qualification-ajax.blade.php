@if(count($english_qualifications))
@foreach($english_qualifications->groupBy('products') as $key => $english_qualification_products)
<div class="col-md-6 mb-3 table-responsive">
	<div class="text-center">
		<h4><strong>{{$key}}</strong></h4> <br>
	</div>
	<table class="table table-bordered">
		@foreach($english_qualification_products as $english_qualification)
		<tr>
			
			<th>{{$english_qualification->qualification_name}}</th><td>{{$english_qualification->qualification_score}}</td>

			<th><button type="button" class="btn btn-warning" data-original-title="" title="" onclick="edit_qualification('{{$english_qualification}}')">
				<i class="material-icons">edit</i>Edit

			</button>
			<button type="button" class="btn btn-danger"  data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? delete_qualification({{$english_qualification->id}}) : ''">
				<i class="material-icons">close</i>Delete
			</button></th>
		</tr>
		@endforeach


	</table>
</div>

@endforeach
@endif