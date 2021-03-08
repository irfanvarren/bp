@extends('layouts.bp_wo_sidenav')
@section('title', 'SAT')
@section('content')
<div class="col-md-12 content-header" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/sat.jpg')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
	<div class="content-title" >
		<p><h1>SAT</h1></p>
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
				<p>SAT merupakan ujian terstandarisasi dari kemampuan berpikir kritis untuk para calon mahasiswa di AS dan negara lain seperti Singapura. Kursus kami membantu siswa mengembangkan strategi ujian yang efektif secara interaktif, sehingga siswa akan senantiasa fokus dan termotivasi hingga waktu ujian tiba. Rencana pembelajaran dirancang secara khusus untuk memenuhi kebutuhan siswa sekolah menengah atas; menggunakan pendekatan inovatif sehingga mereka dapat memfokuskan waktu yang mereka miliki untuk memperoleh nilai terbaik. Sesi kelas yang menyenangkan akan meningkatkan kepercayaan diri dan keahlian berstrategi.</p>
				<h2>Kelas dan Jadwal Belajar</h2>
				<p>Selama kegiatan intensif, siswa belajar dari senin-jum’at dalam seminggu dengan jam pelajaran yang akan ditentukan oleh Best Partner Education yang tentu tidak akan mengganggu aktifitas siswa.
					Kami juga merancang kursus persiapan SAT untuk mengakomodasi kebutuhan khusus. Kami memiliki jadwal dan jumlah jam yang sangat fleksibel. Meskipun demikian, kursus kami juga memiliki standar yang memudahkan para siswa memahami materi dan melatih teknik yang sudah dipelajari.


				</p>
			</div>
			<div class="col-md-4 class-sidebar">
				<div class="row">
					<div class="class-sidebar-content col-md-12">
						<div class="row">
							<div class="col-md-3 class-sidebar-img">
								<img src="{{asset('/img/sat/Fokus pada pengembangan siswa.png')}}">
							</div>
							<div class="col-md-9 class-sidebar-desc">
								<h3>Fokus pada pengembangan siswa</h3>
								<p ><ol class="col-md-12">
									<li>Sesi interaktif mengajarkan struktur ujian SAT agar para siswa terbiasa dan membangun kepercayaan diri mereka dengan teknik serta strategi untuk memperoleh nilai tinggi. </li>
									<li>Siswa selalu mendapat daily opportunities sebagai sarana latihan intensif di luar jam pelajaran kelas . Pekerjaan rumah ini kemudian ditinjau dan dibahas; tak hanya untuk menunjukkan jawaban yang tepat, namun juga untuk membangun kepercayaan diri bahwa mereka menguasai isi ujian.</li>
									<li>Di bimbing oleh tutor yang yang memiliki latar belakang pendidikan tinggi, berpengalaman dan motivasi besar.  </li>
								</ol></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="class-sidebar-content col-md-12">
						<div class="row">
							<div class="col-md-3 class-sidebar-img">
								<img src="{{asset('/img/sat/Suasana belajar intensif.png')}}">
							</div>
							<div class="col-md-9 class-sidebar-desc">
								<h3>Suasana belajar intensif </h3>
								<p>Daily meetings (kecuali hari sabtu) yang akan memberikan pembelajaran yang intensif dan feedback secara rinci</p>
							</div>
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
				<div class="target-header" style="border:none;"><img src="{{asset('/img/sat/Reading Test.png')}}">
					<p>Reading Test</p>
				</div>

			</div>
			<div class="col-md-3 target tablink" onclick="openTabs(event,'reading')">
				<div class="target-header" style="border:none;">
					<img src="{{asset('/img/sat/Writing and Language Test.png')}}">
					<p>Writing and Language Test</p>
				</div>

			</div>
			<div class="col-md-3 target tablink" onclick="openTabs(event,'writing')">
				<div class="target-header" style="border:none;">
					<img src="{{asset('/img/sat/Math Test.png')}}">
					<p>Math Test</p>
				</div>
			</div>
			<div class="col-md-3 target tablink" onclick="openTabs(event,'speaking')">
				<div class="target-header" style="border:none;">
					<img src="{{asset('/img/sat/SAT Essay.png')}}">
					<p>SAT Essay</p>
				</div>

			</div>
		</div>
	</div>
	<!--
		<div class="col-md-12 learn-exp" id="learn-exp">
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
  <source src="{{asset('/video/evolution_hospitality.mp4')}} " type="video/mp4">
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
