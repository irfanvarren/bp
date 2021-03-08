@extends('layouts.bp_wo_sidenav')
@section('title', 'About Us')
@section('content')
<!--<div class="content-header col-md-12" style="background-image:url('/img/about.jpg');">
	<h1>About Us</h1>
</div>-->
<div class="col-md-12 about-header content-header" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url({{asset('/img/about/Banner1.jpg')}});">
	<div style="width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
	<div class="content-title">
		<p><h1>Best Partner Education</h1></p>
		<p>About Us</p>
	</div>
</div>
<div class="about-wrapper col-md-12">
	<div class="row" style="background-image:url('{{asset('/img/about/back1.jpeg')}}');background-repeat: no-repeat;
	background-size: cover;">
	<div class="col-md-12" style="padding:30px 60px;">
		<div class="row">
			<div class="col-md-6" style="padding-top: 50px">
				<div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/about/best partner educationn.png')}}');height: 330px;background-size:75%;background-position:top;">
				</div>
			</div>
			<div class="col-md-6" style="padding-top: 50px;padding-right: 35px">

				<h1><strong>Best Partner Education</strong></h1>
				<p> Didirikan pada tahun 2016, Best Partner Education adalah salah satu Konsultan Pendidikan Luar Negeri terbaik di Indonesia yang mewakili lebih dari 120 universitas dan perguruan tinggi di 12 negara. Dalam beberapa tahun terakhir, kami telah mengirim lebih dari 300 siswa ke berbagai lembaga di seluruh dunia.</p>
				<p>
					Tim kami adalah konselor multibahasa berpengalaman yang siap membimbing siswa melalui seluruh proses dalam mengatur studi mereka di luar negeri di Australia, Selandia Baru, Singapura, Swiss, Kanada, Korea Selatan, Jepang, Irlandia, Cina, Taiwan, Inggris, dan Malaysia.
				</p>
				<p>
				Kami memberikan layanan dalam pengurusan visa untuk tingkat sarjana dan pascasarjana bersama dengan Tes dan Persiapan IELTS ini sebagai solusi  untuk pendidikan luar negeri.		</p>
			</div>

		</div>
	</div>
</div>
<div class="row" style="background-image:url('{{asset('/img/about/gradientabout1.jpg')}}');background-repeat: no-repeat;
background-size: cover;">
<div class="col-md-12" style="padding:30px 60px;">
	<div class="row">
		<div class="col-md-6 order-md-12">
			<div class="col-md-12 about-img2" style="background-image:url('{{asset('/img/about/vision mision valuee.png')}}');">
			</div>
		</div>
		<div class="col-md-6 order-md-1" >
			<h3><b>Visi Kami</b></h3>

			<div class="col-md-12">
				<ul class="col-md-12">
					<li>Memberikan keramahan dan layanan terbaik kepada pelanggan.</li>
					<li>Memasuki pasar global melalui layanan berkualitas dan menciptakan kerja sama jangka panjang dengan pelanggan</li>
				</ul>
			</div>

			<h3><b>Misi Kami</b></h3>
			<div class="col-md-12">
				<ul class="col-md-12">
					<li>
					Untuk mengembangkan operasi perusahaan yang sehat di semua aspek, seperti kepatuhan terhadap peraturan, lingkungan, dan komunikasi.</li>
					<li>Menjadi perusahaan yang kuat dan berkembang, dan siap menghadapi persaingan global.</li>
				</ul>
			</div>

			<h3><b>Nilai Kami</b></h3>
			<div class="col-md-12">
				<ul class="col-md-12">
					<li>Integritas</li>
					<li>Respon Cepat</li>
					<li>Inovatif</li>
					<li>Tanggung Jawab</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
<div class="row">
	<div class="col-md-12" style="padding:30px 60px">
		<div class="row">
			<div class="col-md-6">
				<div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/about/Why Choose Us.png')}}');height: 340px;background-size:contain;background-position:top 15px center;">
				</div>
			</div>
			<div class="col-md-6" style="margin-top:45px;">
				<h1> <strong>Kenapa Kami</strong> </h1>
				<p>
					Anda bisa mendapatkan informasi sebanyak yang Anda inginkan untuk prospek studi masa depan Anda, dengan memiliki pengetahuan yang baik tentang prospek karier dan rincian studi masa depan, kami dapat menuntun Anda menuju kesuksesan besar di masa depan!
				</p>
				<p>
					Anda tidak perlu mengurus dokumen anda sendirian! Kami memberikan panduan lengkap untuk pendaftaran ke perguruan tinggi yang Anda inginkan, dan akan menangani semua persyaratan yang diperlukan untuk penerimaan visa.
				</p>
				<p>
					Kami berusaha sebaik mungkin untuk meningkatkan kualitas layanan kami untuk kenyamanan pelanggan
				</p>
			</div>
		</div>
	</div>
</div>
<div class="row" style="background-image:url('{{asset('/img/about/back2.jpeg')}}');background-repeat: no-repeat;
background-size: cover;">
<div class="col-md-12" style="padding:30px 60px;">
	<div class="row">
		<div class="col-md-6 order-md-12">
			<div class="col-md-12 about-img4" style="background-image:url('{{asset('/img/about/Our Servicess.png')}}');">
			</div>
		</div>
		<div class="col-md-6 order-md-1">
			<h1> <strong>Layanan Kami</strong> </h1>
			<p>
				Selain yang disebutkan di atas, perusahaan kami juga menyediakan Anda dengan banyak layanan yang sesuai dengan kebutuhan pendidikan atau rencana karier Anda di luar negeri, kami akan dengan senang hati membantu Anda untuk mendapatkan impian Anda.
				<div class="col-md-12">
					<ul class="col-md-12">
						<li>Permohonan Visa Pelajar</li>
						<li>Pengurusan Akomodasi & Transportasi</li>
						<li>Pendaftaran Sekolah</li>
						<li>Konsultasi Belajar</li>
						<li>Penerjemahan Dokumen </li>
						<li>Persiapan
							<a href="{{url('/products/language/english/ielts-class')}}" target="_blank">IELTS</a> /
							<a href="{{url('/products/language/english/toefl-class')}}" target="_blank"> TOEFL iBT </a> /
							<a href="{{url('/products/language/english/toefl-class')}}" target="_blank"> TOEFL ITP </a> /
							<a href="{{url('/products/language/english/young-learners')}}" target="_blank"> Young Learners </a> /
							<a href="{{url('/products/language/english/bep')}}" target="_blank">	 BEP </a> /
							<a href="{{url('/products/language/english/sat')}}" target="_blank"> SAT </a> /
							<a href="{{url('/products/language/english/gmat')}}" target="_blank"> GMAT </a> /
							<a href="{{url('/products/language/english/pte')}}" target="_blank"> PTE </a></li>
							<li>Study Tour</li>
							<li>Pengurusan Kunjungan untuk Keluarga</li>
							<li>Konsultasi pra-keberangkatan</li>
							<li> <a href="{{url('/products/tax-reclaim')}}"> Tax Reclaim </a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@stop
