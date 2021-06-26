<head>
	<style type="text/css">
		table{
			width:100%;
			border-collapse: collapse;
		}
		table tr td{
			border:1px solid black;
			padding:5px;
		}
	</style>
</head>
<body>
<h3>Data Form Design Webinars Guest Speaker</h3>

<table>
	
<colgroup>
	<col width="35%">
	<col>
</colgroup>
<tbody>
@foreach($email->except('_token','photograph') as $key => $data)
@php
$arr = explode("_",$key);
$column_name = "";
foreach($arr as $name){	
$column_name .= $name . " ";
}
@endphp
<tr>
	<td>{{ucwords($column_name)}}</td> <td>{!!nl2br($data)!!}</td>
</tr>
@endforeach
</tbody>
</table>
</body>