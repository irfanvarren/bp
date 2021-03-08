<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css"></style>
</head>
<body>
	<div style="display:block;margin:0 auto;width:50%;border:1px solid black;padding:8px;margin:0 auto;font-size:16px;">
		<div>
			Your question has been received. You should expect a response from us within 24 hours. <br>

		</div>
		<div style="border-top:1px solid #bebebe;border-bottom:1px solid #bebebe;padding:12px 0;">
			<strong style="color:#888">
				Subject
			</strong>
			<div style="padding:0 15px;">
				<strong style="margin:5px 0;display: block;">Application Requirement</strong>
			</div>

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