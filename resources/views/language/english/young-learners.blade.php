@extends('layouts.bp_wo_sidenav')
@section('title', 'Young Learners')
@section('content')
<div class="col-md-12 content-header" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/young learner.jpg')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
	<div class="content-title" >
		<p><h1>Young Learners</h1></p>
		<p>Kelas anak anak (kelas: 1-6 SD)</p>
		<a href="{{url('products/language/english/registration')}}" target="_blank" class="content-btn"> Daftarkan Sekarang</a>
	</div>
</div>
<div class="col-md-12 content-wrapper class-content-wrapper" style="padding: 0 15px !important">
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
				<div class="row">

					<div class="col-md-12">
						<h2>Tentang Program</h2>
						<p>Program ini dikhususkan untuk anak usia dini 4-5 tahun (TK) hingga SD (6-12 tahun) yang ingin memulai atau memperlancar kemampuan berbahasa Inggris mereka sebagai persiapan dalam membentuk pondasi yang kuat dalam berkomunikasi menggunakan Bahasa Inggris. Best Partner Education menyediakan sebuah program yang dapat membantu mereka meningkatkan kemampuan Bahasa Inggris anda dan meningkatkan kepercayaan diri mereka dalam berkomunikasi dalam Bahasa Inggris dengan tutor yang bersahabat dan pelajaran yang menyenangkan.</p>
						<p>Dengan 3 level berbeda yang akan membantu untuk meninggkatkan kemampuan Bahasa Inggris Anda sesuai dengan kebutuhan atau pencapaian yang diinginkan. Program ini akan banyak berfokus pada kemampuan menguasai kosa kata dan kemampuan berbicara dimana kemampuan ini menjadi pondasi utama dalam Berbahasa Inggris.  </p>

					</div>


					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 mb-4">
								<h5><strong>DURASI PELATIHAN</strong></h5>
								<ul class="col-md-12">
									<li>36 Jam atau 24 kali pertemuan* (Level Starters 
										dan Movers)
									</li>
									<li>41 Jam atau 27 Kali Pertemuan* (Level Flyers </li>
								</ul>
								<div>*Pertemuan 4 kali dalam seminggu</div>
							</div>
							<div class="col-md-6 mb-4">
								<h5><strong>FASILITAS BELAJAR</strong> </h5>
								<ul class="col-md-12">
									<li>Modul belajar/ handbook </li>
									<li>Kelas dengan kelompok yang kecil</li>
									<li>Ruang belajar nyaman</li>
									<li>Latihan intensif dan feedback harian</li>
									<li>Sumber belajar di kelas maupun online yang ekslusif </li>
									<li>Pretest dan Posttest </li>
									<li>Sertifikat partisipasi pelatihan</li>
									<li>Level Test</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-4">
								<h5><strong>JALUR PROGRAM LANJUTAN</strong></h5>
								<ul class="col-md-12">
									<li>Program English for Young Learner level lanjutan</li> 
									<li>Program English for Teens – Academia 1 level</li> 
								</ul>
							</div>
							<div class="col-md-6 mb-4">
								<h5><strong>PERSYARATAN MASUK</strong> </h5>
								<ul class="col-md-12">
									<li>Berumur 5 -12 tahun</li> 
									<li>Sedang bersekolah minimal di tingkat TK/SD Sederajat</li>
									<li>Kelas yang akan diambil siswa tergantung dari hasil nilai dari BEPT (Placement test mereka)</li>
									<li>Siswa perlu melakukan Placement Test tingkat Bahasa Inggris</li>


								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 mb-4">
								<h5><strong>MODE PEMBELAJARAN </strong></h5>
								<p>Kami memberikan 4 opsi pilihan mode pembelajaran yang dapat dipilih sesuai dengan kenyamanan peserta pelatihan</p>
								<ul class="col-md-12">
									<li>100% dari materi pembelajaran akan disampaikan secara tatap muka;</li>
									<li>100% Pertemuan daring menggunakan aplikasi Zoom Meeting;</li>
									<li>75% dari materi pembelajaran akan disampaikan secara tatap muka di lingkungan kelas dan 25% via online;</li>
									<li>50% dari materi pembelajaran akan disampaikan secara tatap muka di lingkungan kelas dan 50% via online.</li>

								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-12 mb-4">
						<h5><strong>STRUKTUR PEMBELAJARAN</strong></h5>
						<div>
							<a class="btn btn-primary" href="{{asset('pdf/Struktur Pembelajaran/Struktur pembelajaran kelas Young Learner.pdf')}}">Download PDF</a>
						</div>
					</div>
					<div class="col-md-12">
						<h5><strong>SAMPEL JADWAL</strong></h5>
						<div style="overflow-x:auto;">
							<table class="table table-sm" style="table-layout: fixed;width:auto;">
								<thead>
									<tr>
										<th>CLASS</th><th>SENIN</th><th>SELASA</th><th>RABU</th><th>KAMIS</th><th>JUMAT</th>
									</tr>
								</thead>
								<tbody>


									<tr>
										<td>AFTERNOON</td>
										<td>13:00 – 14:30</td>
										<td>13:00 – 14:30</td>
										<td>13:00 – 14:30</td>
										<td>13:00 – 14:30</td>
										<td>13:00 – 14:30</td>
									</tr>
									<tr>
										<td></td>
										<td>14:30 – 16:00</td>
										<td>14:30 – 16:00</td>
										<td>14:30 – 16:00</td>
										<td>14:30 – 16:00</td>
										<td>14:30 – 16:00</td>
									</tr>


								</tbody>
							</table>
							*afternoon class only
						</div>

					</div>

				</div>

			</div>
			<div class="col-md-4 class-sidebar">
				<div class="row">
					<div class="class-sidebar-content col-md-12 col-sm-6">
						<div class="row">
							<div class="col-md-3 class-sidebar-img">
								<img src="{{asset('/img/young learners/Mengembangkan Kemampuan sejak dini.png')}}">
							</div>
							<div class="col-md-9 class-sidebar-desc">
								<h3>Mengembangkan Kemampuan sejak dini</h3>
								<p>Materi khusus didesain melalui riset dan pengembangan tentang bagaimana anak mengembangkan kemampuan sejak usia dini. </p>
							</div>
						</div>
					</div>
					<div class="class-sidebar-content col-md-12 col-sm-6">
						<div class="row">
							<div class="col-md-3 class-sidebar-img">
								<img src="{{asset('/img/Young learners/Teaching.png')}}">
							</div>
							<div class="col-md-9 class-sidebar-desc">
								<h3>Metode Pengajaran Yang Efektif</h3>
								<p>Materi dibentuk secara inovatif dengan mencakup kemampuan berbicara, mendengar, membaca dan menulis dengan menerapkan English Communicative Learning yang menyenangkan. </p>
							</div>
						</div>
					</div>
					<div class="class-sidebar-content col-md-12 col-sm-6">
						<div class="row">
							<div class="col-md-3 class-sidebar-img">
								<img src="{{asset('/img/young learners/500 Vocabular.png')}}">
							</div>
							<div class="col-md-9 class-sidebar-desc">
								<h3>500 Vocabulary</h3>
								<p>Setiap anak akan dibekali 500 kosa kata baru yang akan berguna selama memasuki jenjang sekolah dasar. </p>
							</div>
						</div>
					</div>
					<div class="class-sidebar-content col-md-12 col-sm-6">
						<div class="row">
							<div class="col-md-3 class-sidebar-img">
								<img src="{{asset('/img/young learners/Max 6 Siswa.png')}}">
							</div>
							<div class="col-md-9 class-sidebar-desc">
								<h3>Max 6 Siswa</h3>
								<p>Kelas kecil intensif (max 6 siswa di setiap kelasnya) membantu anak anda untuk lebih fokus belajar.  </p>
							</div>
						</div>
					</div>


					<div class="col-sm-12 class-sidebar-content">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-md-9">
								<div style="padding:0 10px;"><h3><strong>Level</strong></h3>
									<ol class="col-md-12">
										<li>A1 Starters </li>
										<li>A1 Movers</li>
										<li>A2 Flyers </li>
									</ol>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 class-sidebar-content">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-md-9">
								<div style="padding:0 10px;"><h3><strong>Metode Pembelajaran</strong></h3>
									<ol class="col-md-12">
										<li>Task Based Learning </li>
										<li>Focus Skill Development </li>
										<li>Daily feedback and opportunity </li>
										<li>PPP combined with authentic and contextual material</li>
										<li>Focus Group Discussion</li>

									</ol>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 class-sidebar-content">
						<div class="row">
							<div class="col-lg-3">

							</div>
							<div class="col-lg-9">
								<div  style="padding:0 10px"><h3><strong>Intake / Tanggal Masuk</strong> </h3>
									<p>
										Periode Mei
										<ul class="col-md-12 ">
											<li>4 May – 29 May 2020 (36 / 41  Jam) </li>

										</ul>
									</p>
									<p>
										Periode Juni
										<ul class="col-md-12 ">
											<li>1 Juni – 26 Juni 2020 (36 / 41 Jam)</li>

										</ul>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 class-sidebar-content">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-9">
								<div style="padding:0 10px"><h3>Download Brosur Kursus</h3>
									<a href="#" class="btn btn-primary">Download</a>
								</div>
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
			<div class="col-md-4 target tablink" onclick="openTabs(event,'listening')">
				<div class="target-header"><img src="{{asset('/img/listening2.png')}}">
					<p>Mendengar</p>
				</div>
				<div class="col-md-12 target-content">
					<div class="col-md-12"><b>Phonics dan bunyi suku kata</b> <br> Siswa belajar untuk membuat dan mengenal bunyi kata dalam bahasa Inggris. Siswa belajar melafalkan bunyi dan dibantu untuk mengucapkan kata dengan benar.</div>
					<div class="col-md-12"> <b>Kata dan frase singkat</b> <br>Siswa belajar mendengarkan kata dan frase singkat dengan media gambar, dialog, dan informasi singkat. </div>
				</div>
			</div>
			<div class="col-md-4 target tablink" onclick="openTabs(event,'reading')">
				<div class="target-header">
					<img src="{{asset('/img/speaking2.png')}}">
					<p>Berbicara</p>
				</div>
				<div class="col-md-12 target-content">
					<div class="col-md-12"><b>Percakapan singkat</b><br>Siswa mengasah kepercayaan diri untuk berdialog singkat mengenai informasi pribadi. </div>
					<div class="col-md-12"><b>Merespons pertanyaan singkat</b><br>Siswa mempelajari bagaimana mendeskripsikan suatu objek, memahami instruksi singkat, dan menjawab pertanyaan. </div>
				</div>
			</div>
			<div class="col-md-4 target tablink" onclick="openTabs(event,'writing')">
				<div class="target-header">
					<img src="{{asset('/img/writing2.png')}}">
					<p>Membaca dan menulis</p>
				</div>
				<div class="col-md-12 target-content">
					<div class="col-md-12"><b>Kata dan kalimat pendek</b><br>Siswa dapat membaca deksripsi singkat dan sederhana mengenai beberapa objek. Siswa juga dapat mengerti pernyataan singkat dan dapat menulis kata dan frase pendek. </div>
					<div class="col-md-12"><b>Kata dan ejaan dalam bahasa Inggris</b><br>Mengetahui strategi pengerjaan dan standar penilaian writing test pada IELTS Official Test.</div>

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
