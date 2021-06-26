<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<style type="text/css">
table tr td,table tr th{
	border: 1px solid black;
}
</style>
<body>
	<table>
		
		@foreach($data as $key => $value)
		<tr>
			<td>{{$key}}</td><td>{{$value}}</td>			
		</tr>
		
		@endforeach
	</table>
</body>
</html>
