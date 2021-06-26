<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css"></style>
</head>
<body>
	<div style="display:block;margin:0 auto;width:50%;border:1px solid black;padding:8px;margin:0 auto;font-size:16px;">
		<div>
			You recently requested personal assistance from our on-line Support Centre. Below is a summary of your request and our response. If this issue is not resolved to you satisfaction, you may reopen it within the next 3 days. Thank you for allowing us to be fo service to you.
		 <br>

		</div>
		<div style="border-top:1px solid #bebebe;border-bottom:1px solid #bebebe;padding:12px 0;">
			<strong style="color:#888">
				Subject
			</strong>
			<div style="padding:0 15px;">
				<strong style="margin:5px 0;display: block;">{{$email->type}}</strong>
			</div>

		</div>
		<div style="padding-top:12px;">
			<div style="border:1px solid #bebebe;background:#eee;padding:5px;">
				<div>Response By Email ({{$email->employee_name}}) ({{date("d/m/Y H:i")}})</div>
			</div>
			<div>
				{!!$email->solution!!}
			</div>
			<div style="border:1px solid #bebebe;background:#eee;padding:5px;">
				<div>Customer By Web ({{$email->client_name}}) ({{date("d/m/Y H:i",strtotime($email->created_at))}})</div>
			</div>
			<div>
				{{$email->question}}
			</div>
		</div>
		<div style="padding:30px 0;text-align: center;">
			<a href="{{url('enquiry/reference/'.$email->complaint_code.'_'.$email->detail_id.'/confirm')}}" style="color:white;text-decoration: none;background:#046bb5;padding:12px 18px;"> Mark as Solved</a>
		</div>
		<div style="padding-top:12px;">
			<strong style="color:#888;">
				Question Reference # {{$email->complaint_code}}
			</strong>
			<div style="padding:0 15px">
				<div>Date Created: {{date("d/m/Y H:i", strtotime($email->date_created))}}</div>
				<div>Status : {{$email->status == 1? "Solved" : "Unresolved"}}</div>
			</div>
		</div>
	</div>
</body>
</html>