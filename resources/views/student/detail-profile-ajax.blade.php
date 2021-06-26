<div class="row">
	<div class="col-md-12" >
		<input type="radio" autocomplete="off" class="radio-hide progress-radio" name="progress" value="sixteen" id="one" onclick="open_tab(0)" checked>
		<label class="label-text" for="one"> <div><span>Personal Informations</span></div></label>

		<input type="radio" autocomplete="off" class="radio-hide progress-radio" name="progress" value="thirtythree" onclick="open_tab(1)" id="two">
		<label class="label-text" for="two"> <div><span>Passport History</span></div></label>

		<input type="radio" autocomplete="off" class="radio-hide progress-radio" name="progress" value="fifty" onclick="open_tab(2)" id="three">
		<label class="label-text" for="three"> <div><span>English Qualifications</span></div></label>


		<input type="radio" autocomplete="off" class="radio-hide progress-radio" name="progress" value="sixtysix" onclick="open_tab(3)" id="four">
		<label class="label-text" for="four"> <div><span>Visa History</span></div></label>


		<input type="radio" autocomplete="off" class="radio-hide progress-radio" name="progress" value="eightythree" onclick="open_tab(4)" id="five">
		<label class="label-text" for="five"> <div><span>Bank Account Details</span></div></label>

		<input type="radio" autocomplete="off" class="radio-hide progress-radio" name="progress" value="onehundred" onclick="open_tab(5)" id="six">
		<label class="label-text" for="six"> <div><span>Insurance Providers</span></div></label>

		<input type="radio" autocomplete="off" class="radio-hide progress-radio" name="progress" value="onehundred" onclick="open_tab(6)" id="seven">
		<label class="label-text" for="seven"> <div><span>School Applications</span></div></label>

		<input type="radio" autocomplete="off" class="radio-hide progress-radio" name="progress" value="onehundred" onclick="open_tab(7)" id="eight">
		<label class="label-text" for="eight"> <div><span>Course Details</span></div></label>


		<!-- <div class="progress">
			<div class="progress-bar" id="progress-bar" style="background-color: rgb(48, 174, 30);width:0;"></div>
		</div> -->
	</div>
</div>
<div class="card" style="border:none;border-radius:20px; margin-top:10px;">
	<div class="card-body" style="padding:1.25rem 30px;">
		<div class="row">
			
			<div class="col-md-12 student-form-wrapper">
				<h3>History Visa Statement Letter</h3>
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>Client Id</th> <th>Country</th> <th>Registered At</th> 
						</tr>
						@foreach($visa_registrations as $visa_registration)
						<tr>
							<td>{{$student->client_id}}</td><td>{{$student->country_name}}</td><td>{{date("d/m/Y",strtotime($visa_registration->created_at)) }}</td>
						</tr>
						@endforeach
					</table>
				</div>
				<form action="{{route('student-pi-ajax')}}" name="student-profile-form0" id="student-profile-form0" class="student-profile-form" enctype="multipart/form-data">
					<input type="hidden" name="personal_information_id" value="{{$personal_information != '' ? $personal_information->id : ''}}">

					<div class="row">
						<div class="col-md-12 mb-3">
							<div class="row">
								<div class="col-md-12">
									<h4><strong>Personal Information</strong></h4>
									<div>(As indicated on your passport)</div>
								</div>
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-4 form-group">
											<div class="row">
												<div class="col-md-12 col-form-label">
													Client Id
												</div>
												<div class="col-md-12">
													<div class="student-data form-control" style="background-color:#e9ecef;">{{$personal_information != "" ? $personal_information->client_id : ''}}</div>
													<input type="hidden" class="form-control" name="client_id" value="{{$personal_information != "" ? $personal_information->client_id : ''}}">

												</div>
											</div>
										</div>
										<div class="col-md-4 form-group">
											<div class="row">
												<div class="col-md-12 col-form-label">
													Country Of Visa 

												</div>
												<div class="col-md-12">
													<select class="selectize form-control" name="visa_country" value="{{$personal_information != '' ? $personal_information->student->country : ''}}" disabled>
														<option value="">-</option>
														@foreach($countries as $country)
														<option value="{{$country->id}}" {{$personal_information != "" ? $personal_information->student->country == $country->id ? "selected" : "" : "" }}> {{$country->name}}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								

								<div class="col-md-4 form-group">
									<div class="row">
										<div class="col-md-12 col-form-label">
											Title  
										</div>
										<div class="col-md-12"> 
											<input type="text" class="form-control" name="title" value="{{$personal_information != "" ? $personal_information->title : ''}}">
										</div>
									</div>
								</div>
								<div class="col-md-4 form-group">
									<div class="row">
										<div class="col-md-12 col-form-label">
											Full Name  
										</div>
										<div class="col-md-12">
											<input type="text" class="form-control" name="name" value="{{Auth::guard()->user()->name}}">
										</div>
									</div>
								</div>
								<div class="col-md-4 form-group">
									<div class="row">
										<div class="col-md-12 col-form-label">
											Date of Birth  
										</div>
										<div class="col-md-12">
											<input type="text" class="form-control" name="date_of_birth" value="{{$personal_information != "" ? $personal_information->date_of_birth : ''}}">
										</div>
									</div>
								</div>
								<div class="col-md-4 form-group">
									<div class="row">
										<div class="col-md-12 col-form-label">
											Status  
										</div>
										<div class="col-md-12">
											<input type="text" class="form-control" name="status" value="{{$personal_information != "" ? $personal_information->status : ''}}">
										</div>
									</div>
								</div>
								<div class="col-md-4 form-group">
									<div class="row">
										<div class="col-md-12 col-form-label">
											Phone Number  
										</div>
										<div class="col-md-12">
											<input type="text" class="form-control" name="phone_number" value="{{$personal_information != "" ? $personal_information->phone_number : ''}}">
										</div>
									</div>
								</div>
								<div class="col-md-4 form-group">
									<div class="row">
										<div class="col-md-12 col-form-label">
											Primary Email  
										</div>
										<div class="col-md-12">  
											<input type="text" class="form-control" name="secondary_email" value="@if($personal_information != '')@if($personal_information->primary_email != '') {{$personal_information->primary_email}} @else {{auth()->user()->email}} @endif @endif">

										</div>
									</div>
								</div>
								<div class="col-md-4 form-group">
									<div class="row">
										<div class="col-md-12 col-form-label">
											USI (Unique Student Identifier)
										</div>
										<div class="col-md-12">
											<input type="text" class="form-control" name="usi" value="{{$personal_information != "" ? $personal_information->usi : ''}}">

										</div>
									</div>
								</div>
								<div class="col-md-4 form-group">
									<div class="row">
										<div class="col-md-12 col-form-label">
											TFN (Tax File Number)
										</div>
										<div class="col-md-12">
											<input type="text" class="form-control" name="tfn" value="{{$personal_information != "" ? $personal_information->tfn : ''}}">
										</div>
									</div>
								</div>
								<div class="col-md-4 form-group">
									<div class="row">
										<div class="col-md-12 col-form-label">
											Secondary Email  
										</div>
										<div class="col-md-12">  
											<input type="text" class="form-control" name="primary_email" value="@if($personal_information != '')@if($personal_information->primary_email != '') {{$personal_information->secondary_email}} @else @endif @endif">

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="row">
								<div class="col-md-12 form-group">
									<h4><strong>Homecountry Address</strong></h4>
								</div>
								<div class="col-md-12 form-group">
									<div class="row form-group">
										<div class="col-md-12">

										</div>
										<div class="col-md-8">
											<div class="row form-group">
												<div class="col-md-3 col-form-label">
													<div>Country</div>
												</div>
												<div class="col-md-9">
													<select class="selectize form-control" name="homecountry_country">
														<option value="">-</option>
														@foreach($countries as $country)
														<option value="{{$country->id}}" {{ $personal_information != "" ? $personal_information->homecountry_country == $country->id ? "selected" : "" : "" }}>{{$country->name}}</option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-3 col-form-label">
													<div>Address</div>
												</div>
												<div class="col-md-9">
													<textarea type="text" class="form-control" name="homecountry_address">{{$personal_information != "" ? $personal_information->homecountry_address : ''}}</textarea>
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-3 col-form-label">
													<div>Suburb</div>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" name="homecountry_suburb" value="{{$personal_information != "" ? $personal_information->homecountry_suburb : ''}}">
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-3 col-form-label">State</div>
												<div class="col-md-9">
													<input type="text" class="form-control" name="homecountry_state" value="{{$personal_information != "" ? $personal_information->homecountry_state : ''}}">
												</div>
											</div>
											<div class="row">
												<div class="col-md-3 col-form-label">
													Postcode
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" name="homecountry_postcode" value="{{$personal_information != "" ? $personal_information->homecountry_postcode : ''}}">
												</div>
											</div>


										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="row">
								<div class="col-md-12 form-group">
									<h4><strong>Current Address  </strong></h4>
								</div>
								<div class="col-md-12 form-group">
									<div class="row">
										<div class="col-md-8">
											<div class="row form-group">
												<div class="col-md-3 col-form-label">
													<div>Country</div>
												</div>
												<div class="col-md-9">
													<select name="current_country" class="selectize form-control">
														<option value="">-</option>
														@foreach($countries as $country)
														<option value="{{$country->id}}" {{ $personal_information != "" ? $personal_information->current_country == $country->id ? "selected" : "" : ""}}>{{$country->name}}</option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-3 col-form-label">
													<div>Address</div>
												</div>
												<div class="col-md-9">

													<textarea class="form-control" name="current_address">{{$personal_information != "" ? $personal_information->current_address : ''}}</textarea>
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-3 col-form-label">
													<div>Suburb</div>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" name="current_suburb" value="{{$personal_information != "" ? $personal_information->current_suburb : ''}}">
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-3 col-form-label">
													<div>State</div>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" name="current_state" value="{{$personal_information != "" ? $personal_information->current_state : ''}}"="true">
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-3 col-form-label">
													<div>Postcode</div>
												</div>
												<div class="col-md-9">
													<input type="text" class="form-control" name="current_postcode" value="{{$personal_information != "" ? $personal_information->current_postcode : ''}}"="true">
												</div>
											</div>


										</div>
									</div>
								</div>


								<div class="col-md-12 text-center mt-3">
									<button class="btn btn-success" type="button" onclick="form_save()" id="btn-next" style="border-radius:30px;width: 120px;">Save</button>
								</div>
							</div>
						</div>

					</div>
				</form>
			</div>
			<div class="col-md-12 student-form-wrapper" style="display: none;">
				<div id="passport-output">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>Passport Number</th> <th>Name</th> <th>Expired Date</th> <th>Actions</th>
							</tr>
							@foreach($passport_histories as $passport_history)
							<tr>
								<td>{{$passport_history->passport_number}}</td> <td>{{$passport_history->name}}</td> <td>{{$passport_history->expired_date}}</td> <td>

									<button type="button" class="btn-warning btn " data-original-title="" title="" onclick="edit_passport('{{$passport_history}}')">
										<i class="material-icons">edit</i>Edit

									</button>
									<button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? delete_passport({{$passport_history->id}}) : ''">
										<i class="material-icons">close</i>Delete
									</button>	

								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
				<form action="{{route('student-ph-ajax')}}" name="student-profile-form1" id="student-profile-form1" class="student-profile-form" enctype="multipart/form-data">
					@csrf
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4 col-form-label">
								Passport Number

							</div>
							<div class="col-md-8">
								<input type="hidden" name="id">
								<input type="text" class="form-control" name="passport_number" value="">
								
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4 col-form-label">
								Name
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" name="name" value="">
							</div>
						</div>
					</div>

					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4">
								Expired Date  
							</div>
							<div class="col-md-8"> 
								<input type="date" class="form-control" name="expired_date">
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group text-center">
						<button class="btn btn-success" id="cmd" type="button" onclick="add_passport()" value="add">Add Passport</button>
					</div>
				</form>
			</div>
			<div class="col-md-12 student-form-wrapper" style="display: none;">
				<div class="row" id="english-qualification-output">
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
				</div>

				<form action="{{route('student-eq-ajax')}}" name="student-profile-form2" id="student-profile-form2" class="student-profile-form" enctype="multipart/form-data">
					@csrf
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4 col-form-label">
								Select Product

							</div>
							<div class="col-md-8">
								<input type="hidden" name="id">
								<select name="products" class="form-control">
									<option value="IELTS">IELTS</option>
									<option value="TOEFL">TOEFL</option>
									<option value="CAE">CAE</option>
									<option value="TOEIC">TOEIC</option>
									<option value="CPE">CPE</option>
								</select>
								
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4 col-form-label">
								Qualification Name
							</div>
							<div class="col-md-8">
								<input type="text" name="qualification_name" id="qualification_name" class="form-control" placeholder="example: Listening, Reading, Writing....">

							</div>
						</div>
					</div>

					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4">
								Qualification Score  
							</div>
							<div class="col-md-8"> 
								<input type="text" name="qualification_score" id="qualification_score" class="form-control" placeholder="example: 9.0, 8.0, 7.0,...">
							</div>
						</div>
					</div>

					<div class="col-md-12 form-group text-center">
						<button class="btn btn-success" type="button" id="cmd" value="add" onclick="add_qualification()">Add Qualification Score</button>
					</div>
				</form>
			</div>
			<div class="col-md-12 student-form-wrapper" style="display: none;">
				<div id="visa-history-output">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>Country</th> <th>Date Of Grant</th> <th>Length Of Stay</th> <th>TRN Number</th> <th>Actions</th>
							</tr>
							@foreach($visa_histories as $visa_history)
							<tr>
								<td>{{$visa_history->country_name}}</td> <td>{{$visa_history->date_of_grant}}</td> <td>{{$visa_history->length_of_stay}}</td>
								<td>{{$visa_history->trn_number}}</td>
								<td>
									<button type="button" class="btn-warning btn " data-original-title="" title="" onclick="edit_visa_history('{{$visa_history}}')">
										<i class="material-icons">edit</i>Edit

									</button>
									<button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? delete_visa_history({{$visa_history->id}}) : ''">
										<i class="material-icons">close</i>Delete
									</button>	

								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
				<form action="{{route('student-vh-ajax')}}" name="student-profile-form3" id="student-profile-form3" class="student-profile-form" enctype="multipart/form-data">
					@csrf
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4 col-form-label">
								Country
							</div>
							<div class="col-md-8">
								<input type="hidden" name="id">
								<select name="country" id="country" class="form-control">
									<option value="">Select Country</option>
									@foreach($countries as $country)
									<option value="{{$country->id}}">{{$country->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4 col-form-label">
								Date of Grant
							</div>
							<div class="col-md-8">
								<input type="date" name="date_of_grant" id="date_of_grant" class="form-control">

							</div>
						</div>
					</div>

					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4">
								Length Of Stay  
							</div>
							<div class="col-md-8"> 
								<input type="text" name="length_of_stay" id="length_of_stay" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4">
								TRN Number
							</div>
							<div class="col-md-8"> 
								<input type="text" name="trn_number" id="trn_number" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group text-center">
						<button class="btn btn-success" type="button" id="cmd" value="add" onclick="add_visa_history()">Add Visa History</button>
					</div>
				</form>
			</div>
			
			<div class="col-md-12 student-form-wrapper" style="display: none;">
				<div id="bank-account-output">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>Bank Name</th> <th>Account Name</th> <th>Account Number</th> <th>BSB</th> <th>Swift Code</th> <th>Bank Address</th> <th>Actions</th>
							</tr>
							@foreach($bank_accounts as $bank_account)
							<tr>
								<td>{{$bank_account->bank_name}}</td> <td>{{$bank_account->account_name}}</td> <td>{{$bank_account->account_number}}</td>
								<td>{{$bank_account->bsb}}</td>
								<td>{{$bank_account->swift_code}}</td>
								<td>{{$bank_account->address}}</td>
								<td>

									<button type="button" class="btn-warning btn " data-original-title="" title="" onclick="edit_bank_account('{{$bank_account}}')">
										<i class="material-icons">edit</i>Edit

									</button>
									<button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? delete_bank_account({{$bank_account->id}}) : ''">
										<i class="material-icons">close</i>Delete
									</button>	

								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
				<form action="{{route('student-vh-ajax')}}" name="student-profile-form4" id="student-profile-form4" class="student-profile-form" enctype="multipart/form-data">
					@csrf
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4 col-form-label">
								Bank Name
							</div>
							<div class="col-md-8">
								<input type="hidden" name="id">
								<input type="text" name="bank_name" id="bank_name" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4 col-form-label">
								Account Name
							</div>
							<div class="col-md-8">
								<input type="text" name="account_name" id="account_name" class="form-control">

							</div>
						</div>
					</div>

					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4">
								Account Number  
							</div>
							<div class="col-md-8"> 
								<input type="text" name="account_number" id="account_number" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4">
								BSB (australian bank only)
							</div>
							<div class="col-md-8"> 
								<input type="text" name="bsb" id="bsb" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4">
								Swift Code
							</div>
							<div class="col-md-8"> 
								<input type="text" name="swift_code" id="swift_code" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4">
								Bank Address
							</div>
							<div class="col-md-8"> 
								<input type="text" name="address" id="address" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group text-center">
						<button class="btn btn-success" id="cmd" value="add" type="button" onclick="add_bank_account()">Add Bank Account</button>
					</div>
				</form>
			</div>
			<div class="col-md-12 student-form-wrapper" style="display: none;">
				<div id="insurance-provider-output">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>Policy Number</th> <th>Insurance Provider</th> <th>Start Date</th> <th>End Date</th><th>Agents</th><th>Actions</th>
							</tr>
							@foreach($insurance_providers as $insurance_provider)
							<tr>
								<td>{{$insurance_provider->policy_number}}</td> 
								<td>{{$insurance_provider->name}}</td> 
								<td>{{$insurance_provider->start_date}}</td>
								<td>{{$insurance_provider->end_date}}</td>
								<td>{{$insurance_provider->agent}}</td>
								<td>

									<button type="button" class="btn-warning btn " data-original-title="" title="" onclick="edit_insurance_provider('{{$insurance_provider}}')">
										<i class="material-icons">edit</i>Edit

									</button>
									<button type="button" class="btn btn-danger" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? delete_insurance_provider({{$insurance_provider->id}}) : ''">
										<i class="material-icons">close</i>Delete
									</button>	

								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
				<form action="{{route('student-vh-ajax')}}" name="student-profile-form5" id="student-profile-form5" class="student-profile-form" enctype="multipart/form-data">
					@csrf
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4 col-form-label">
								Policy Number
							</div>
							<div class="col-md-8">
								<input type="hidden" name="id">
								<input type="text" name="policy_number" id="policy_number" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4 col-form-label">
								Insurance Providers Name
							</div>
							<div class="col-md-8">
								<select class="form-control" name="name" id="name">
									<option>Nib Health</option>
									<option>Medibank</option>
									<option>Allianz Global Assistance</option>
									<option>Bupa Health Services</option>
									<option>Other</option>
								</select>

							</div>
						</div>
					</div>

					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4">
								Start Date
							</div>
							<div class="col-md-8"> 
								<input type="date" name="start_date" id="start_date" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4">
								End Date
							</div>
							<div class="col-md-8"> 
								<input type="date" name="end_date" id="end_date" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="row">
							<div class="col-md-4">
								Agent
							</div>
							<div class="col-md-8"> 
								<input type="text" name="agent" id="agent" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-12 form-group text-center">
						<button class="btn btn-success" type="button" id="cmd" value="add" onclick="add_insurance_provider()">Add Insurance Providers</button>
					</div>
				</form>
			</div>
			<div class="col-md-12 student-form-wrapper" style="display: none;">
				<div id="insurance-provider-output">
					@if(count($school_applications))
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>Country</th> <th>Schools</th> <th>Programs</th> <th>Class Shift</th><th>Agents Name</th>
							</tr>
							@foreach($school_applications as $school_application)
							<tr>
								<td>{{$school_application->school_country}}</td> 
								<td>{{$school_application->school_name}}</td> 
								<td>{{$school_application->program_name}}</td>
								<td>{{$school_application->class_shift}}</td>
								<td>{{$school_application->agent}}</td>
								
							</tr>
							@endforeach
						</table>
					</div>
					@else
<div class="text-center" style="padding:80px 15px">
					<h2><strong>There is no data</strong></h2>
				</div>
					@endif
				</div>
			</div>
			<div class="col-md-12 student-form-wrapper" style="display: none;">
				<div id="insurance-provider-output">
					@if(count($course_detail_schools))
					@foreach($course_detail_schools as $school)
					<div class="card">
						<div class="card-body">

							<div><h3>{{$school->name}}</h3></div>
							@php
							$student_course_details = $school->student_course_details($student->id);
							@endphp
							@if(count($student_course_details))
							<div class="table-responsive" style="border-top:1px solid #ddd">
								<table class="table table-bordered">
									<colgroup>
										<col>
										<col>
										<col>
										<col style="width: 60px;">
									</colgroup>
									<thead>
										<tr>
											<th>Programs</th><th>Study Period</th><th>Application Fee</th>
											<th>Material Fee</th><th>CoE Fee</th> <th>Start Date</th><th>End Date</th><th>Total Tuition</th>
										</tr>
									</thead>
									<tbody>

										@php
										$total_tuition = 0;
										@endphp
										@foreach($student_course_details as $course_detail)
										@php 
										$total_tuition += $course_detail->tuition_fee;
										@endphp
										<tr>
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
										
									</tr>				
									@endforeach

								</tbody>
							</table>
						</div>
						@else

						@endif


					</div>
				</div>
				@endforeach
				@else

				<div class="text-center" style="padding:80px 15px">
					<h2><strong>There is no data</strong></h2>
				</div>
				@endif
@if(count($payment_schedules))
				<div class="table-responsive">
					<div class="my-3">
						<h3>Payment Schedules</h3>
					</div>
	<table class="table table-bordered">
		<colgroup>
			<col>
			<col>
			<col>
			<col style="width: 60px;">
		</colgroup>
		<thead>
			<tr>
				<th>Schools</th><th>Programs</th><th>Discount Tuition</th><th>Material</th>
			<th>Total</th> <th>Due Date</th>
			</tr>
		</thead>
		<tbody>
			@foreach($payment_schedules as $payment_schedule)
			<tr>
				<td>{{$payment_schedule->school_name}}</td>
				<td>{{$payment_schedule->program_name}}</td>
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
			
			</tr>				
			@endforeach
		</tbody>
	</table>
</div>
@endif
			</div>
		</div>
	</div>
</div>
</div>
<div class="row">
	<div class="col-md-12 text-center mt-3">
		<button class="btn btn-secondary" type="button" onclick="form_cancel(this)" id="btn-cancel" style="display: none;">Cancel</button> <button class="btn btn-secondary" type="button" onclick="form_back()" id="btn-previous" style="border-radius:30px;width: 120px;display: none;">Previous</button> <button class="btn btn-primary" type="button" onclick="form_save()" id="btn-next" style="border-radius:30px;width: 120px;">Next</button>
	</div>
</div>