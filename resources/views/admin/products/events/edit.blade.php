@extends('layouts.app-auth', ['activePage' => 'events','activeMenu' => 'data-management', 'titlePage' => __('Events')])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
@endpush
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="{{route('admin.course-events.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
					@csrf
					@method('post')
					<div class="card ">
						<div class="card-header card-header-primary">
							<h4 class="card-title">{{ __('Add Events') }}</h4>
							<p class="card-category"></p>
						</div>
						<div class="card-body ">
							<div class="row">
								<div class="col-md-12 text-right">
									<a href="{{route('admin.course-events.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
								</div>
							</div>

							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Event Type') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('event_type') ? ' has-danger' : '' }}">
										<select class="selectize form-control" name="event_type" id="event-type">
											<option value="">- Select Event Type -</option>
											@foreach($event_types as $event)
											<option value="{{$event->id}}">{{$event->name}}</option>
											@endforeach
										</select>
										@if ($errors->has('event_type'))
										<span id="event_type-error" class="error text-danger" for="input-title">{{ $errors->first('event_type') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">{{ __('Courses') }}</label>
								<div class="col-sm-7">
									<div class="form-group{{ $errors->has('courses') ? ' has-danger' : '' }}">
										<input type="text" class="selectize form-control" name="courses" id="course-events"> 

										@if ($errors->has('courses'))
										<span id="courses-error" class="error text-danger" for="input-title">{{ $errors->first('courses') }}</span>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer ml-auto mr-auto">
							<button type="submit" class="btn btn-primary">{{ __('Add Events') }}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
	$('#event-type').selectize({
		width : 'resolve'
	});
	var course_options = [
	@foreach($courses as $course)
	{KD : "{{$course->REF_PAKET.'|'.$course->REF_LEVEL}}",NAMA : "{{$course->PAKET.' ('.$course->LEVEL.')'}}"},
	@endforeach
	]
	$('#course-events').selectize({
		delimiter: '###',
		persist: false,
		valueField: 'KD',
		labelField: 'NAMA',
		searchField: 'NAMA',
		options: course_options,  
		create: false
	});

	console.log($('#course-events'));
</script>
@endpush
