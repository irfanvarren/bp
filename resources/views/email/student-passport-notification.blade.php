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
					<i>Thank you for Partnering with Best Partner Education</i>
				</p>
				<p>
					Dengan email ini, kami ingin menginformasikan bahwa passportmu akan
					berakhir dalam waktu tiga bulan tepatnya pada tanggal ({{date("d/m/Y",strtotime($email->expired_date))}}). <br>
					<i>With this email, we want to inform that your passport will expire in three months, precisely at ({{date("d/m/Y",strtotime($email->expired_date))}})</i>
				</p>
				<p>
					Silahkan kirimkan kembali ke agent ya jika sudah melakukan perpanjangan passport ke <a href="mailto:admission1@bestpartnereducation.com">Email</a>.
					<i>If you have extended your passport, please send your new documents to agent through <a href="mailto:admission1@bestpartnereducation.com">Email.</a></i>
				</p>
				<p>
					Bisa juga melalui <a href="https://bestpartnereducation.com/enquiry">Enquiry</a> kami <br>
					<i>Or, you can do that through our  <a href="https://bestpartnereducation.com/enquiry">enquiry</a> </i>
				</p>
				<p>
					Dokumen dapat dikirimkan kepada admin segera dalam waktu satu (1) minggu dari perpanjangan, jika kami tidak menerima informasi terbaru atau notifikasi apapun, kami tidak dapat memproses perubahan data pada student visamu. <br>
					<i>Send your documents to agent within one (1) week after you extend your passport. If we do not receive any information or notification, we are unable to process data changes on your student visa.</i>
				</p>
				
			</div>
			<div>
				<p>
					Hope to hear from you !
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
