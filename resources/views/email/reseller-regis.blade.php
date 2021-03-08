<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
		table{
			margin-top:15px;
			border-collapse: collapse;
		}
		table tr td{
			padding:6px 10px;
			border:1px solid black;
		}
	</style>
</head>
<body>

{{$email->nama}} telah mendaftar test online ! tolong cek data pendaftaran pada link berikut <a href="{{url('admin/reseller')}}" target="_BLANK">{{url('admin/reseller')}}</a> <br> <br>

Data Pendaftaran: <br>
<table>
	@foreach($email->except('_token','file_ktp') as $key => $value)
	<tr>
		<td>{{$key}}</td>
		<td>
			@if($value instanceof DateTime)
			{{$value->format('d/m/Y')}}
			@else
			{{$value}}
			@endif
		</td>
	</tr>
	@endforeach
</table>
</body>
</html>