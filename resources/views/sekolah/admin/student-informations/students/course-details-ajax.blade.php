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
				<th>Schools</th><th>Programs</th><th>Study Period</th><th>Application Fee</th>
				<th>Material Fee</th><th>CoE Fee</th> <th>Start Date</th><th>End Date</th><th>Total Tuition</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@php
			$total_tuition = 0;
			@endphp
			@foreach($course_details as $course_detail)
			@php 
			$total_tuition += $course_detail->tuition_fee;
			@endphp
			<tr>
				<td>{{$course_detail->school_name}}</td>
				<td>{{$course_detail->program_name}}</td>
				<td>{{$course_detail->program_duration}}</td>
				<td>
					{{$course_detail->tuition_fee}}
				</td>
				<td>{{$course_detail->material_fee}}</td>
				<td>{{$course_detail->coe_fee}}</td>
				<td>{{date("d/m/Y",strtotime($course_detail->start_date))}}</td>
				<td>{{date("d/m/Y",strtotime($course_detail->end_date))}}</td>
				<td>{{$course_detail->tuition_fee + $course_detail->material_fee + $course_detail->coe_fee}}</td>
				<td>
					<a href="#payment-schedule-wrapper" class="btn btn-sm btn-info" type="button" onclick="open_payment_schedules('{{$course_detail->school_id}}','{{$course_detail->program_id}}')">Payment Schedules</a>

					<button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_cd('{{$course_detail}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_cd({{$course_detail->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>

				</td>
			</tr>				
			@endforeach
		</tbody>
	</table>
</div>