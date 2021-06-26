<!DOCTYPE html>
<html>
<head>
	<style type="text/css">

		.footer{
			display:flex;
			flex: 0 0 100%;
			max-width:100%;
			padding:15px;
		}
		.footer-logo-wrapper{
			margin:0 auto;
			display:flex;
			flex:0;
			align-items: center;

		}
		.footer-logo{
			width:35px;
			height:35px;
			margin:0px 5px;
		}
		.text-left{
			text-align:left;
		}
	</style>
</head>
<body style="background:#D8E2F2;padding:30px">
	<div style=" width:600px;display: block;margin:0 auto;padding:15px;text-align:center">
		<div style="border-radius:45px;background:white;padding:30px;overflow: hidden;">
			Client Id : {{$email->client_id}}
			<h3><strong>Dear {{$email->name}}</strong></h3>
			<div class="text-left">
				<p>
					Terimakasih atas kepercayaanmu berPartner bersama Best Partner
					Education. <br>
					<i>Thank you for your trust Partnering with Best Partner Education</i>
				</p>
				<p>
					Dengan email ini, kami ingin menginformasikan bahwa visa studentmu akan
					berakhir dalam waktu tiga bulan tepatnya pada tanggal ({{date("d/m/Y",strtotime($email->end_date))}}). <br>
					<i>With this email, we want to inform that your student visa will expire in three months, precisely at ({{date("d/m/Y",strtotime($email->end_date))}})</i>
				</p>
				<p>
					Silahkan hubungi agent ya untuk melakukan perpanjangan atau diskusi
					terkait proses berikutnya di ke <a href="mailto:admission1@bestpartnereducation.com">Email</a>.
					<i>Please contact your agent to extend your visa or discuss about the next process to  <a href="mailto:admission1@bestpartnereducation.com">Email.</a></i>
				</p>
				<p>
					Bisa juga melalui <a href="https://bestpartnereducation.com/enquiry">Enquiry</a> kami <br>
					<i>Or, you can do that through our  <a href="https://bestpartnereducation.com/enquiry">enquiry</a> </i>
				</p>
				<p>
					Bila dalam waktu dua (2) minggu dari tanggal berakhir kami tidak menerima
					informasi atau notifikasi apapun, kami menganggap bahwa kamu telah
					membatalkan proses perpanjangan visa berikutnya. <br>
					<i>If within two (2) weeks from the expiry date we do not receive any information or notification, we will consider that you have canceled the next visa extension process.</i>
				</p>
				
			</div>
			<div>
				<p>
					Hope to hear from you
				</p>
				<div>
					Cheers ! <br><br>
					<div>
						The team at
						<div><h3 style="margin:0"><strong>BEST PARTNER EDUCATION</strong></h3></div>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div class="footer">
				<div class="footer-logo-wrapper" style="text-align:center;">
					<a href="https://www.facebook.com/bestpartnereducation/" target="_blank">
						<img src="{{$message->embed(public_path().'/img/logo/social-media/round/facebook.png')}}" class="footer-logo" alt="">
					</a> 
					<a href="https://vt.tiktok.com/ZStY1DHb/">
						<img src="{{$message->embed(public_path().'/img/logo/social-media/round/tiktok.png')}}" class="footer-logo">
					</a>
					<a href="https://api.whatsapp.com/send?phone=6281352033606">
						<img src="{{$message->embed(public_path().'/img/logo/social-media/round/whatsapp.png')}}" class="footer-logo">
					</a>
					<a href="https://bestpartnereducation.com" target="_blank">
						<img src="{{$message->embed(public_path().'/img/logo3.png')}}" style="height:35px" height="35px" alt="">
					</a>
					<a href="https://www.youtube.com/channel/UCicDSptmlROwc3B6kYEbUjw" target="_blank"> 
						<img src="{{$message->embed(public_path().'/img/logo/social-media/round/youtube.png')}}" style="width:auto;" class="footer-logo" alt=""> 
					</a>
					<a href="https://www.instagram.com/bestpartnereducation/" target="_blank">
						<img src="{{$message->embed(public_path().'/img/logo/social-media/round/instagram.png')}}" class="footer-logo" alt="">
					</a>
					<a href="mailto:it@bestpartnereducation.com" target="_blank">
						<img src="{{$message->embed(public_path().'/img/logo/social-media/round/email.png')}}" class="footer-logo" alt="">
					</a>
				</div>
			</div>
			<div style="width:80%;height:3px;background:white;display: block;margin:0 auto;"></div>
			<div>
				Anda menerima penawaran ini karena Anda saat ini
				terdaftar sebagai klien aktif di Best Partner Education. <br>
				<i>
					You receive this offer because you are registered as active client in 
					Best Partner Education
				</i>
			</div>
			<span style="background:white;">© {{date('Y')}} | Best Partner Education</span>
		</div>
	</div>

</body>
</html>
