@extends('layouts.app-auth', ['dashboard' => 'tutor','activePage' => 'Monitoring', 'titlePage' => __('Monitoring'),'activeMenu' => 'content-management'])
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						@foreach($current_test as $section_type)
						<div>{{$section_type['section_type_name']}}</div>
						@foreach($section_type['sections'] as $section)
						<div>{{$section['name']}}</div>
						@foreach($section['structures'] as $structure)

						@if(isset($structure['questions']))
						@foreach($structure['questions'] as $question)
						<div>{!!$question['question']!!}</div>
						@endforeach
						@endif
						@endforeach
						@endforeach
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop