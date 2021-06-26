<head>
	<style type="text/css">
		table {
			width:100%;
			border-collapse:collapse;

		}
		table tr td{
			padding:8px 15px;
			border:1px solid black;
		}
	</style>
</head>
<body>

	<h4>Form Pindah Sekolah & Agency</h4>
	<table>
		<tr>
			<td>Register Branch</td> <td>{{$email->register_branch}}</td>
		</tr>
		<tr>
			<td>Marketing</td> <td>{{$email->marketing}}</td>
		</tr>
	</table>
	<br>
	<h4>Personal Information</h4>
	<table>
		<tr>
			<td>Title</td> <td>{{$email->title}}</td>
		</tr>
		<tr>
			<td>Full Name</td> <td>{{$email->full_name}}</td>
		</tr>
		<tr>
			<td>Date Of Birth</td><td>{{$email->tanggal_lahir.'/'.$email->bulan_lahir.'/'.$email->tahun_lahir}}</td>
		</tr>
		<tr>
			<td>Phone Number</td><td>{{$email->phone_number}}</td>
		</tr>
		<tr>
			<td>Email</td><td>{{$email->email}}</td>
		</tr>
		<tr>
			<td>Address Line 1</td><td>{{$email->address_line1}}</td>
		</tr>
		<tr>
			<td>Address Line 2</td><td>{{$email->address_line2}}</td>
		</tr>
		<tr>
			<td>Country</td><td>{{$email->country}}</td>
		</tr>
		<tr>
			<td>State / Province</td><td>{{$email->state}}</td>
		</tr>
		<tr>
			<td>City / Suburb</td><td>{{$email->city}}</td>
		</tr>
		<tr>
			<td>ZIP / Postal Code</td><td>{{$email->postal_code}}</td>
		</tr>
		<tr>
			<td>USI (Uniques Student Identifier)</td><td>{{$email->usi}}</td>
		</tr>
		<tr>
			<td>TFN (Tax File Number)</td><td>{{$email->tfn}}</td>
		</tr>
	</table>
	<br>
	<h4>Current Education Provider Details</h4>
	<table>
		<tr>
			<td>Education Providers Name</td> <td>{{$email->education_providers_name}}</td>
		</tr>
		<tr>
			<td>Campus Location</td> <td>{{$email->campus_location}}</td>
		</tr>
		<tr>
			<td>Qualification</td> <td>{{$email->qualification}}</td>
		</tr>
		<tr>
			<td>Course</td> <td>{{$email->course}}</td>
		</tr>
		<tr>
			<td>Completion Date</td> <td>{{$email->completion_date}}</td>
		</tr>
		<tr>
			<td>Agent Name</td> <td>{{$email->agent_name}}</td>
		</tr>
	</table>

	<br>
	<h4>Current Insurance Provider Details</h4>
	<table>
		<tr>
			<td>Current Insurance Providers Name</td> <td>{{$email->insurance_providers_name}}</td>
		</tr>
		<tr>
			<td>End of Contract Date</td> <td>{{$email->end_of_contract_date}}</td>
		</tr>
	</table>

	<br>

	<h4>New Education Provider Details</h4>
	<table>
		<tr>
			<td>Education Providers Name</td> <td>{{$email->new_education_providers_name}}</td>
		</tr>
		<tr>
			<td>Campus Location</td> <td>{{$email->new_campus_location}}</td>
		</tr>
		<tr>
			<td>Qualification</td> <td>{{$email->new_qualification}}</td>
		</tr>
		<tr>
			<td>Course</td> <td>{{$email->new_course}}</td>
		</tr>
		<tr>
			<td>Intake</td> <td>{{$email->new_intake}}</td>
		</tr>
		<tr>
			<td>Class Shift</td> <td>{{$email->new_class_shift}}</td>
		</tr>
	</table>
	<br>

	<h4>Bank Account Details</h4>
	<table>
		<tr>
			<td>Bank Name</td> <td>{{$email->bank_name}}</td>
		</tr>
		<tr>
			<td>Account Name</td> <td>{{$email->account_name}}</td>
		</tr>
		<tr>
			<td>Account Number</td> <td>{{$email->account_number}}</td>
		</tr>
		<tr>
			<td>BSB Number</td> <td>{{$email->bsb_number}}</td>
		</tr>
		<tr>
			<td>Swift Code</td> <td>{{$email->swift_code}}</td>
		</tr>
	</table>

</body>