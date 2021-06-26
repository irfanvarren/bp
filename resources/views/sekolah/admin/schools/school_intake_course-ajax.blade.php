<div class="col-md-12" style="margin-bottom:10px;">
@foreach($school_courses as $course)
	<div style="margin:8px 0;"><h5><strong>{{$course->name}}</strong></h5></div>
	<div>
		@foreach($course->programs as $key => $program)
		<div class="form-check-inline">    
			<input type="checkbox" name="school_intake_programs" class="school_intake_programs" class="form-check-input" id="school_intake_program{{$program->id}}" value="{{$program->id}}" style="margin-right:5px;"> <label class="form-check-label">{{$program->name}}</label>
		</div>
		@endforeach
	</div>
@endforeach
</div>