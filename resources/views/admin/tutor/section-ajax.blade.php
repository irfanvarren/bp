
@if($sections->isEmpty())
No Section
@else
@foreach($sections as $key2 => $section)
@php
$key2 += 1;
@endphp
<div class="col-md-12 section-list">
	<div class="col-md-12">
		{{$key2}}. {{$section->name}} <br>	
	         @php
	         $count = 0;
	         @endphp
	         @foreach($section->structures as $structures)
	         @foreach($structures->questions as $questions)
	         @php $count ++; @endphp
	         @endforeach
	         @endforeach
	         @if($section->type == "introduction")
	         Introduction : {{$section->structures->count()}}
	         @else
	         Total Question : {{$count}}
	         @endif
	         ,Type : {{ucwords($section->type)}}
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-4"> 
				<input type="button" class="col-md-12 btn-primary btn" onclick="add_question('{{$test_id}}','{{$module_id}}','{{$package_id}}','{{$section->id}}','{{$test_section_id}}')" value="Questions">
			</div>
			<div class="col-md-4">
				<input type="button" class="col-md-12 btn-info btn" value="Details">
			</div>
			<div class="col-md-4">
				<input type="button" class="col-md-12 btn-danger btn" onclick="delete_section('{{$test_section_id}}','{{$section->id}}','{{$section_index}}')" value="Delete">
			</div>
		</div>
	</div>
</div>




@endforeach
@endif  