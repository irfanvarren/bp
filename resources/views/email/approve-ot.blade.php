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

{{$email->NAMA}} telah mendaftar test online ! tolong cek data pendaftaran dan tekan tombol approve pada link berikut <a href="{{url('admin/online-test-registration')}}" target="_BLANK">{{url('admin/online-test-registration')}}</a> <br> <br>

Data Pendaftaran: <br>
<table>
	@foreach($email->except('_token','UPLOAD_KTP','token') as $key => $value)
	<tr>
		<td>{{$key}}</td>
		<td>
			@if(is_array($value))

			@elseif($value instanceof DateTime)
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