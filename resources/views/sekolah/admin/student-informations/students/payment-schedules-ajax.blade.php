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
				<th>Schools</th><th>Programs</th><th>Tuition</th><th>Discount Tuition</th><th>Material</th>
			<th>Total</th> <th>Due Date</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($payment_schedules as $payment_schedule)
			<tr>
				<td>{{$payment_schedule->school_name}}</td>
				<td>{{$payment_schedule->program_name}}</td>
				
				<td>
					{{$payment_schedule->tuition_fee}} <!--(Ini berhubungaan dengan agent commission, Ini kena Komisi Agent)-->
				</td>
				<td>
					@if($payment_schedule->discount_percents != "")
					{{$payment_schedule->discount_percents}}%
					@else
					@if($payment_schedule->discount_amounts != 0)
					{{$payment_schedule->discount_amounts}}$
					@endif
					@endif
				</td>
				<td>{{$payment_schedule->material_fee}}</td>
				
				
				<td>@php
					if($payment_schedule->discount_percents){
					$amount = $payment_schedule->tuition_fee - ($payment_schedule->tuition_fee * $payment_schedule->discount_percents / 100);	
					}else if($payment_schedule->discount_amounts){
					$amount = $payment_schedule->tuition_fee - $payment_schedule->discount_amounts;	
					}else{
					$amount = $payment_schedule->tuition_fee;
					}

					if($payment_schedule->material_fee ==""){
						$material = 0;
						}else{
						$material = $payment_schedule->material_fee;
					}

					$total = $amount + $material;
					@endphp
					{{$total}}</td>
				<td>{{date("d/m/Y",strtotime($payment_schedule->due_date))}}</td>
				<td>
					<button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_ps('{{$payment_schedule}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_ps({{$payment_schedule->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>

				</td>
			</tr>				
			@endforeach
		</tbody>
	</table>
</div>