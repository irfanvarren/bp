@extends('layouts.bp_wo_sidenav')
@section('title', 'GRE Class')
@section('content')
<div class="col-md-12 content-header" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/gre.jpg')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
	<div class="content-title" >
		<p><h1>GRE</h1></p>
		<a href="{{url('products/language/english/registration')}}" target="_blank" class="content-btn"> Daftarkan Sekarang</a>
	</div>
</div>
<div class="col-md-12 content-wrapper class-content-wrapper">
	<div class="row">
		<div class="col-md-12 content-nav">
			<nav>
				<a onclick="scroll_to('deskripsi')">
					Deskripsi
			</a><!--
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
				<p>GRE test atau Graduate Record Exam wajib diikuti oleh kandidat mahasiswa yang berencana mengikuti program S2 atau S3 di Amerika Serikat dan negara berbahasa Inggris lainnya. GRE digunakan untuk mengukur tingkat kemampuan siswa dalam memahami bacaan rumit dan menganalisa informasi kuantitatif. Ujian GRE akan menguji 3 hal yaitu Verbal Reasoning, Quantitative Reasoning dan Analytical Writing. </p>
				<h2>Kelas dan Jadwal Belajar</h2>
				<p>
					Terdapat 3 jenis kelas: Regular (30 Jam), Intensive 1 (50 Jam), Intensive 2 (60 Jam)
					Selamat kegiatan intensif, siswa belajar dari senin-jum’at dalam seminggu dengan jam pelajaran yang akan ditentukan oleh Best Partner Education yang tentu tidak akan mengganggu aktifitas siswa

				</p>
			</div>
			<div class="col-md-4 class-sidebar">
				<div class="class-sidebar-content col-md-12">
					<div class="row">
						<div class="col-md-3 class-sidebar-img">
							<img src="{{asset('/img/gre/Fokus pada pengembangan siswa.png')}}">
						</div>
						<div class="col-md-9 class-sidebar-desc">
							<h3>Fokus pada pengembangan siswa</h3>
							<ol>
								<li>Menggunakan Metode Task Based Learning and Focus skill development</li>
								<li>Siswa selalu mendapat daily opportunities sebagai sarana latihan intensif di luar jam pelajaran kelas</li>
								<li>Di bimbing oleh tutor yang yang memiliki latar belakang pendidikan tinggi dalam Bahasa Inggris, berpengalaman dan motivasi tinggi</li>
							</ol>
						</div>
					</div>
				</div>
				<div class="class-sidebar-content col-md-12">
					<div class="row">
						<div class="col-md-3 class-sidebar-img">
							<img src="{{asset('/img/gre/Suasana belajar intensif.png')}}">
						</div>
						<div class="col-md-9 class-sidebar-desc">
							<h3>Suasana belajar intensif</h3>
							<ul>
								<li>Daily meetings (kecuali hari sabtu) yang akan memberikan pembelajaran yang intensif dan feedback secara rinci</li>
								<li>
									Mempelajari secara intensif jenis dan bentuk tes GRE (Verbal Reasoning, Quantitative Reasoning dan Analytical Writing)
								</li>
								<li>
									Setiap pertemuan, siswa akan mengaplikasi bahasa Inggris sebagai bahasa pengantar kelas.
								</li>
							</ul>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>

	<div class="col-md-12 target-wrapper" id="target" style="border-top:1px solid #ccc">
		<h1> Target Pembelajaran</h1>
		<div class="row">
			<div class="col-md-4 target tablink" onclick="openTabs(event,'listening')">
				<div class="target-header"><img src="{{asset('/img/gre/Verbal Reasoning.png')}}">
					<p>Verbal Reasoning</p>
				</div>
				<div class="col-md-12 target-content">
					<div class="col-md-12">Siswa BP akan mempelajari makna keseluruhan sebuah teks atau untuk membedakan poin-poin penting. Evaluasi pembelajaran bertujuan untuk menguji kemampuan siswa untuk menganalisa teks, menyusun kesimpulan, menemukan kekurangan dari tulisan tersebut , dan mengidentifikasikan argument-argumen.</div>
				</div>
			</div>
			<div class="col-md-4 target tablink" onclick="openTabs(event,'reading')">
				<div class="target-header">
					<img src="{{asset('/img/gre/writing.png')}}">
					<p>Analytical Writing</p>
				</div>
				<div class="col-md-12 target-content">
					<div class="col-md-12">Siswa akan dibantu untuk mengembangkan keterampilan dalam berpikir kritis dan menulis analitis pada bagian ini. Dua hal ini merupakan bagian sangat penting untuk kesuksesan kandidat mahasiswa program master (S2). Siswa akan berlatih bagaimana mengartikulasi dan mendukung ide-ide rumit, menyusun dan mengevaluasi argument, dan menerapkan diskusi yang fokus dan jelas. </div>

				</div>
			</div>
			<div class="col-md-4 target tablink" onclick="openTabs(event,'writing')">
				<div class="target-header">
					<img src="{{asset('/img/gre/Quantitative Reasoning Measure.png')}}">
					<p>Quantitative Reasoning Measure</p>
				</div>
				<div class="col-md-12 target-content">
					<div class="col-md-12">Pada bagian ini, siswa akan mengasah pengetahuan matematika dasar, seperti memecahkan sebuah soal dengan metode kuantitatif berupa aritmatika, aljabar, geometri, serta menganalisa data. Siswa akan dibantu menyelesaikan sejumlah pertanyaan yang diambil dari permasalahan sehari-hari, namun terdapat juga yang bersifat murni matematika.</div>
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
