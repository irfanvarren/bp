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
				<th>Personal Informations</th><th>Home Country</th>
				
				<th>Home Residence</th><th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($personal_informations as $personal_information)
			<tr>
				<td>
					<p>Visa Country : {{$personal_information->visa_country_name}}</p>
					<p>Title : {{$personal_information->title}}</p>
					<p>Date Of Birth: {{$personal_information->date_of_birth}}</p>
					<p>Status: {{$personal_information->status}}</p>
					<p>Phone Number: {{$personal_information->phone_number}}</p>
					<p>Primary Email: {{$personal_information->primary_email}}</p>
					<p>Secondary Email: {{$personal_information->secondary_email}}</p>
					<p>USI: {{$personal_information->usi}}</p>
					<p>TFN: {{$personal_information->tfn}}</p>
					<p>No KTP: {{$personal_information->ktp}}</p>
					<p>Signature: <img src="{{asset($personal_information->signature)}}">
					</p>
				</td>
				<td>
					@if($personal_information->homecountry_country != "")
					<p>

						<div>Country: </div><div>{{$personal_information->homecountry_country_name}}
						</div>

					</p>
					@endif<p>
						<div>Address:</div><div> {{$personal_information->homecountry_address}}
						</div>
					</p><p>
						<div>Suburb: </div><div>{{$personal_information->homecountry_suburb}}
						</div>
					</p><p>
						<div>State: </div><div>{{$personal_information->homecountry_state}}
						</div>
					</p><p>
						<div>Post Code: </div><div>{{$personal_information->homecountry_postcode}}
						</div>
					</p>
				</td>
				<td>
					@if($personal_information->current_country != "")
					<p>

						<div>Country: </div><div>{{$personal_information->current_country_name}}
						</div>

					</p>
					@endif<p>
						<div>Address:</div><div> {{$personal_information->current_address}}
						</div>
					</p><p>
						<div>Suburb: </div><div>{{$personal_information->current_suburb}}
						</div>
					</p><p>
						<div>State: </div><div>{{$personal_information->current_state}}
						</div>
					</p><p>
						<div>Post Code: </div><div>{{$personal_information->current_postcode}}
						</div>
					</p>
				</td>
				<td>
					
					  <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_spi('{{$personal_information}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_spi({{$personal_information->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>
        </td>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>