@extends('layouts.bp_wo_sidenav')
@section('title', 'GMAT')
@section('content')
<div class="col-md-12 content-header" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/gmat.png')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
	<div class="content-title" >
		<p><h1>GMAT</h1></p>
		<a href="{{url('products/language/english/registration')}}" target="_blank" class="content-btn"> Daftarkan Sekarang</a>
	</div>
</div>
<div class="col-md-12 content-wrapper class-content-wrapper" style="padding:0 15px !important;">
	<div class="row">
		<div class="col-md-12 content-nav">
			<nav>
				<a onclick="scroll_to('deskripsi')">
					Deskripsi
				</a>
			<!--
			<a onclick="scroll_to('learn-exp')">
				Pengalaman Belajar
			</a>-->
			<a onclick="scroll_to('target')">
				Target Belajar
			</a>
		</nav>
	</div>
	<div class="col-md-12 class-content" id="deskripsi">
		<div class="row">
			<div class="col-md-8" style="padding:0;">
				<h2>About This Program</h2>
				<p>Kelas persiapan GMAT Test di Best Partner memiliki program yang akan membantu kalian mendapatkan skor yang kalian inginkan. Kelas persiapan GMAT menyediakan paket yang fokus pada peningkatan keterampilan tes para siswa. Disini siswa akan diberikan contoh soal yang nyata dan latar belakang yang relevan mencakup analytical writing assessment, integrated reasoning, the quantitative section, dan verbal section. Program ini membantu siswa BP untuk mengasah keterampilan tes verbal maupun matematika dasar serta berlanjut dengan membantu kalian memahami soal-soal GMAT.</p>
				<h2>Kelas dan Jadwal Belajar</h2>
				<p>Belajar dari senin-jum’at dalam semingggu dengan jam pelajaran yang akan ditentukan oleh Best Partner Education yang tentu tidak akan mengganggu aktifitas siswa.</p>
			</div>
			<div class="col-md-4 class-sidebar">
				<div class="class-sidebar-content col-md-12">
					<div class="row">
						<div class="col-md-3 class-sidebar-img">
							<img src="{{asset('/img/gmat/Fokus pada pengembangan siswa.png')}}">
						</div>
						<div class="col-md-9 class-sidebar-desc">
							<h3>Fokus pada pengembangan siswa</h3>
							<p ><ol class="col-md-12">
								<li>Siswa selalu mendapat daily opportunities sebagai sarana latihan intensif di luar jam pelajaran kelas dan sebagai upaya meningkatkan kepercayaan diri. </li>
								<li>Di bimbing oleh tutor yang yang memiliki latar belakang pendidikan tinggi dalam setiap bidang tes. </li>
							</ol></p>
						</div>
					</div>
				</div>
				<div class="class-sidebar-content col-md-12">
					<div class="row">
						<div class="col-md-3 class-sidebar-img">
							<img src="{{asset('/img/gmat/Suasana belajar intensif.png')}}">
						</div>
						<div class="col-md-9 class-sidebar-desc">
							<h3>Suasana belajar intensif</h3>
							<p><ol class="col-md-12">
								<li>Daily meetings (kecuali hari sabtu) yang akan memberikan pembelajaran yang intensif dan feedback secara rinci</li>
								<li>Mempelajari secara intensif jenis dan bentuk tes dalam GMAT</li>
							</ol></p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="col-md-12 target-wrapper" id="target" style="border-top:1px solid #ccc">
		<h1> Target Pembelajaran</h1>
		<div class="row">
			<div class="col-md-3 target tablink" onclick="openTabs(event,'listening')">
				<div class="target-header"><img src="{{asset('/img/gmat/Analytical.png')}}">
					<p>Analytical Writing Assessment (AWA) </p>
				</div>
				<div class="col-md-12 target-content">Siswa akan belajar menganalisis argumen. Setiap siswa belajar keahlian dalam menganalisis sebuah kasus dan memberikan argumen yang disuguhkan pada soal pertanyaan. Pada bagian ini siswa akan sangat bermain dengan logika dan daya analisis dengan banyak berlatih soal pemecahan studi kasus. </div>
			</div>
			<div class="col-md-3 target tablink" onclick="openTabs(event,'reading')">
				<div class="target-header">
					<img src="{{asset('/img/gmat/Integrated Reasoning.png')}}">
					<p style="line-height: 64px;">Integrated Reasoning</p>
				</div>
				<div class="col-md-12 target-content">
					<div class="col-md-12">Siswa akan meningkatkan kemampuan dalam mengevaluasi data-data.  Siswa akan dibantu mempelajari multi-source reasoning, graphics interpretation, two-part analysis, dan table analysis. </div>
				</div>
			</div>
			<div class="col-md-3 target tablink" onclick="openTabs(event,'writing')">
				<div class="target-header">
					<img src="{{asset('/img/gmat/verbal.png')}}">
					<p style="line-height: 64px;">Quantitative </p>
				</div>
				<div class="col-md-12 target-content">
					<div class="col-md-12">Siswa akan mempelajari cara memecahkan serta menginterpretasikan data grafik menggunakan angka-angka.
					</div>
				</div>
			</div>
			<div class="col-md-3 target tablink" onclick="openTabs(event,'speaking')">
				<div class="target-header">
					<img src="{{asset('/img/gmat/verbal.png')}}">
					<p style="line-height: 64px;">Verbal </p>
				</div>
				<div class="col-md-12 target-content">
					<div class="col-md-12">Siswa akan dibantu dalam mempersiapkan kemampuan bahasa Inggris yang berfokus pada 3 bagian tes yaitu reading comprehension, critical reasoning, serta sentence correction questions. </div>
				</div>
			</div>
		</div>
	</div>
		<!--<div class="col-md-12 learn-exp" id="learn-exp">
		<h1>Pengalaman Belajar</h1>
		<div class="learn-vid-wrapper col-md-12">
			<div class="col-md-4">
				<div class="col-md-12 learn-vid">
					<video width="100%" height="90%" controls>
  <source src="{{asset('/video/evolution_hospitality.mp4')}}" type="video/mp4">
Your browser does not support the video tag.
</video>
					<div class="video-desc">
						Deskripsi Video
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-12 learn-vid">
					<video width="100%" height="90%" controls>
  <source src="{{asset('/video/evolution_hospitality.mp4')}}" type="video/mp4">
Your browser does not support the video tag.
</video>
					<div class="video-desc">
						Deskripsi Video
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-12 learn-vid">
					<video width="100%" height="90%" controls>
  <source src="{{asset('/video/evolution_hospitality.mp4')}}" type="video/mp4">
Your browser does not support the video tag.
</video>
					<div class="video-desc">
						Deskripsi Video
					</div>
				</div>
			</div>
		</div>
	</div>-->
</div>
</div>
<script type="text/javascript">
	function scroll_to(div){
		$('html, body').animate({
			scrollTop: $("#"+div).offset().top - 230
		}, 1000);
	}
</script>
@stop
