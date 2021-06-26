<head>
	<style type="text/css">
		table{
			border-collapse: collapse;
		}
		table tr td{
			padding: 5px;
			border:1px solid black;
		}
	</style>
</head>
<body>
<table>
	<tr>
		<td>Complaint Code</td> <td>{{$email->complaint_code}}</td>
	</tr>
	<tr>
		<td>Name</td><td>{{$email->name}}</td>
	</tr>
	<tr>
		<td>Email</td><td>{{$email->email}}</td>
	</tr>
	<tr>
		<td>No Telepon</td><td>{{$email->no_telepon}}</td>
	</tr>
	<tr>
		<td>Occupation</td><td>{{$email->occupation}}</td>
	</tr>
	<tr>
		<td>Enquiry Type</td><td>{{$email->type}}</td>
	</tr>
	<tr>
		<td>Branch</td> <td>{{$email->branch_id}}</td>
	</tr>
	<tr>
		<td>Subject</td><td>{{$email->subject}}</td>
	</tr>

	<tr>
		<td>Question</td><td>{{$email->question}}</td>
	</tr>
</table>
</body>