<html>
<head>
	<style type="text/css">
		*{
			box-sizing: border-box;
		}
		.email-body{
			background: rgb(26,41,128);
			background: linear-gradient(0deg, rgba(26,41,128,1) 0%, rgba(38,208,206,1) 100%);
			padding:30px 0;
		}
		.logo{
			display: block;
			width:170px;
			margin:0 auto;
		}
		.email-content{
			border-radius:15px;
			background:white;
			box-shadow:2px 2px 4px #888;
			margin:15px 0;
			padding:15px;
		}

		.email-content-header{
			font-size:18px;
			border-bottom:1px solid #aaa;
		}
		.email-content-wrapper{
			width:75%;
			display: block;
			margin:0 auto;
			margin-top:30px;
			background:white;
			border-radius:15px;
			box-shadow: 5px 5px 10px #888;
		}
		.email-footer{
			
			padding:30px;
			text-align:center;
		}
		.email-footer a{
			color:white !important;
		}
		.float-left{
			float:left;
		}
		.w-7{
			width:70%;
		}
		.w-3{
			width:30%;
		}
	</style>
</head>
<body>

	<div class="email-body">
		<div class="email-header">
			 <img src="{{'https://bestpartnereducation.com/public/img/logo_putih.png'}}" class="logo" width="170" alt="">
		</div>
		<div class="email-content-wrapper">
			<div class="email-content">
				<div class="float-left w-7">
					<p>Reference : {{$email->reference}}</p>
					<p>Subject : {{$email->subject}}</p>
					<p>Note Taker : {{$email->note_taker_name}}</p>
					<p>Type : {{$email->type}}</p>
					<p>Date : {{$email->date}}</p>
					<p>Time : {{$email->time}}</p>
				</div>
				<div class="float-left w-3">
					<div>Attendees</div>
					<div>
						<ol style="padding:0;color:black;">
						@foreach($email->mail_lists as $mail_list)
						
							<li>{{$mail_list->NAMA}} ({{$mail_list->ID_KARYAWAN}})</li>
						@endforeach
						</ol>
					</div>
				</div>
			</div>
		<div class="email-content">
			<div class="email-content-header">Announcement :</div> 
			<div>
			{!! $email->announcement !!}
			</div> 
		</div>
		<div class="email-content">		
			<div class="email-content-header">Discussion :</div>
			<div> {!! $email->discussion !!}</div>
		</div>
		<div class="email-content">
			<div class="email-content-header">Conclusion :</div>
			<div> {!! $email->conclusion !!}</div>
		</div>
		</div>
		<div class="email-footer">
			<a href="https://www.bestpartnereducation.com">www.bestpartnereducation.com</a>
		</div>
	</div>
</body>
</html>