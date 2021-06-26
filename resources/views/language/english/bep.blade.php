@extends('layouts.bp_wo_sidenav')
@section('title', 'BEP')
@section('content')
<div class="col-md-12 content-header" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/bep.jpg')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
	<div class="content-title" >
		<p><h1>BEP</h1></p>
		<p>Best English Programme</p>
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
			</a>--><!--
			<a onclick="scroll_to('target')">
				Target Belajar
			</a>-->
		</nav>
	</div>
	<div class="col-md-12 class-content" id="deskripsi">
		<div class="row">
			<div class="col-lg-8 col-md-7" style="padding:0;">
				<div class="row">
					<div class="col-md-12 mb-4" >
						<h2><strong>Tentang Program</strong></h2>
						<p>Program ini dikhususkan untuk anda yang ingin mulai meningkatkan kemampuan berbahasa Inggris. Dengan program ini, Peserta pelatihan akan dibimbing untuk memperdalam kemampuan dan memperluas pengetahuan berbahasa Inggris.
						</p>
						<p>
							Program BEP dirancang untuk membantu meningkatkan skill dan kemampuaan berbahasa Inggris untuk menigkatkan nilai diri dalam lingkungan kerja ataupun lingkungan sosial dan membantu anda dalam upaya peningkatan jabatan, mendapatkan promosi dalam pekerjaan ataupun bersosialisasi dengan bahasa inggris sehari-harinya.
						</p>
						<p>
							Dibuat dengan 6 level yang berbeda dengan tujuan dan target peningkatan kemampuan yang berbeda pula disetiap levelnya dan dibimbing oleh tutor yang berpengalaman dan sangat kompeten dibidang IELTS yang dibuktikan dengan pencapaian masing-masing tutor yang memegang sertifikasi IELTS dengan nilai minimal 7.0 (Good Language User).
						</p>

					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 mb-4">
								<h5><strong>DURASI PELATIHAN</strong></h5>
								<ul class="col-md-12">
									<li>30 Jam atau 20 kali pertemuan</li>
									<li>60 Jam atau 40 Kali pertemuan </li>
								</ul>
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
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-4">
								<h5><strong>JALUR PROGRAM LANJUTAN</strong></h5>
								<ul class="col-md-12">
									<li>Best English Program lanjutan</li> 
									<li>English for Specific Purposes</li> 
									<li>Program persiapan IELTS/TOEFL</li>
								</ul>
							</div>
							<div class="col-md-6 mb-4">
								<h5><strong>PERSYARATAN MASUK</strong> </h5>
								<ul class="col-md-12">
									<li>Berusia minimal 18 tahun</li> 
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
							<a class="btn btn-primary" href="{{asset('pdf/Struktur Pembelajaran/Struktur pembelajaran Best English Program.pdf')}}">Download PDF</a>
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
										<td>MORNING</td> <td>09:00 – 10:30</td><td>09:00 – 10:30</td><td>09:00 – 10:30</td><td>09:00 – 10:30</td><td>09:00 – 10:30</td>
									</tr>
									<tr>
										<td>AFTERNOON</td>
										<td>11:00 – 12:30</td>
										<td>11:00 – 12:30</td>
										<td>11:00 – 12:30</td>
										<td>11:00 – 12:30</td>
										<td>11:00 – 12:30</td>
									</tr>
									<tr>
										<td></td>
										<td>13:00 – 14:30</td>
										<td>13:00 – 14:30</td>
										<td>13:00 – 14:30</td>
										<td>13:00 – 14:30</td>
										<td>13:00 – 14:30</td>
									</tr>
									<tr>
										<td></td>
										<td>15:00 – 16:30</td>
										<td>15:00 – 16:30</td>
										<td>15:00 – 16:30</td>
										<td>15:00 – 16:30</td>
										<td>15:00 – 16:30</td>
									</tr>
									<tr>
										<td>EVENING</td>
										<td>18:00 – 19:30</td>
										<td>18:00 – 19:30</td>
										<td>18:00 – 19:30</td>
										<td>18:00 – 19:30</td>
										<td>18:00 – 19:30</td>
									</tr>
									<tr>
										<td></td>
										<td>19:30 – 21:00</td>
										<td>19:30 – 21:00</td>
										<td>19:30 – 21:00</td>
										<td>19:30 – 21:00</td>
										<td>19:30 – 21:00</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-5 class-sidebar">
				<div class="row">
					<div class="col-md-12" style="padding-left:30px;">
						<div class="row">
							<div class="class-sidebar-content col-md-12 col-sm-6">
								<div class="row">
								<div class="col-md-12 col-lg-3 class-sidebar-img">
									<img src="{{asset('/img/bep/Pelatihan dari dasar hingga mahir.png')}}">
								</div>
								<div class="col-md-12 col-lg-9 class-sidebar-desc">
									<h3>Pelatihan dari dasar hingga mahir</h3>
									<p>Program ini berfokus pada pengembangan kemampuan berbahasa Inggris mendasar hingga mahir secara komunikatif dan praktikal.</p>
								</div>
							</div>
							</div>
							<div class="class-sidebar-content col-md-12 col-sm-6">
								<div class="row">
								<div class="col-md-12 col-lg-3 class-sidebar-img">
									<img src="{{asset('/img/bep/Sistematis.png')}}">
								</div>
								<div class="col-md-12 col-lg-9 class-sidebar-desc">
									<h3>Sistematis</h3>
									<p>Struktur program yang sistematis dan dapat memaksimalkan proses belajar bahasa kalian dari awal hingga akhir program.</p>
								</div>
							</div>
							</div>
							<div class="class-sidebar-content col-md-12 col-sm-6">
								<div class="row">
								<div class="col-md-12 col-lg-3 class-sidebar-img">
									<img src="{{asset('/img/bep/Bimbingan Praktek.png')}}">
								</div>
								<div class="col-md-12 col-lg-9 class-sidebar-desc">
									<h3>Bimbingan Praktek</h3>
									<p>Tiap sesinya kalian akan difasilitasi dengan bimbingan untuk mempraktikkan langsung kemampuan bahasa kalian di dalam kelas secara maksimal.</p>
								</div>
							</div>
							</div>
							<div class="class-sidebar-content col-md-12 col-sm-6">
								<div class="row">
								<div class="col-md-12 col-lg-3 class-sidebar-img">
									<img src="{{asset('/img/bep/Up to Date.png')}}">
								</div>
								<div class="col-md-12 col-lg-9 class-sidebar-desc">
									<h3>Up to Date</h3>
									<p>Program juga dilengkapi dengan metode pengajaran yang up-to-date dengan perkembangan dunia pendidikan dan materi ajar yang sesuai dengan kebutuhan kalian untuk kompeten dalam berbahasa Inggris.</p>
								</div>
							</div>
							</div>

							<div class="col-sm-12 class-sidebar-content">
								<div class="row">
									<div class="col-lg-3">&emsp;</div>
									<div class="col-lg-9">
										<div style="padding:0 10px;"><h3><strong>Level</strong></h3>
											<ol class="col-md-12">
												<li>Alpha English Level</li>
												<li>Beta English Level</li>
												<li>Gamma English Level</li>
												<li>Delta English Level</li>
												<li>Zeta English Level</li>
												<li>Omega English Level</li>
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
													<li>4 May – 29 May 2020 (30 Jam) </li>
													<li>4 May – 26 Juni 2020 (60 Jam)</li>
												</ul>
											</p>
											<p>
												Periode Juni
												<ul class="col-md-12 ">
													<li>1 Juni – 26 Juni 2020 (30 Jam)</li>
													<li>1 Juni – 24 Julii 2020 (60 Jam)</li>
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
		</div>
	</div>
<!--
	<div class="col-md-12 target-wrapper" id="target" style="border-top:1px solid #ccc">
		<h1> Target Pembelajaran</h1>
		<div class="col-md-3 target tablink" onclick="openTabs(event,'listening')">
			<div class="target-header"><img src="/img/listening2.png">
			<p>Listening</p>
			</div>
			<div class="col-md-12 target-content">
				<div class="col-md-12"> Dapat memahami ide utama dari sebuah pembicaraan baik monolog maupun dialog dengan topik yang beragam.</div>
				<div class="col-md-12"> Dapat memahami informasi factual yang spesifik yang ada pada sebuah dialog ataupun monolog.</div>
				<div class="col-md-12"> Dapat mengenal tipe soal yang diujikan di tes resmi dan memahami cara pengerjaan tiap tipe soal.</div>
			</div>
		</div>
		<div class="col-md-3 target tablink" onclick="openTabs(event,'reading')">
			<div class="target-header">
			<img src="/img/reading2.png">
			<p>Reading</p>
			</div>
			<div class="col-md-12 target-content">
				<div class="col-md-12">Dapat secara cepat dan tepat mencari jawaban untuk setiap jenis pertanyaan di tiap section. </div>
				<div class="col-md-12">Dapat memahami kosakata berlevel akademik untuk mempermudah kalian menjawab soal pada reading section.</div>
				<div class="col-md-12">Membiasakan siswa untuk membaca dan memahami instruksi soal reading section dengan benar dan tepat.</div>
			</div>
		</div>
		<div class="col-md-3 target tablink" onclick="openTabs(event,'writing')">
			<div class="target-header">
			<img src="/img/writing2.png">
			<p>Writing</p>
			</div>
			<div class="col-md-12 target-content">
				<div class="col-md-12">Mengetahui standar penulisan yang digunakan pada Writing Task 1 dan Writing Task 2.</div>
				<div class="col-md-12">Mengetahui strategi pengerjaan dan standar penilaian writing test pada IELTS Official Test.</div>
				<div class="col-md-12">Mendapatkan kosakata yang relevan yang mendukung untuk hasil tulisan yang baik. </div>
				<div class="col-md-12">Mendapatkan contoh penulisan yang baik beserta dengan criteria dan penjelasan masing-masing contoh secara rinci.</div>
			</div>
		</div>
		<div class="col-md-3 target tablink" onclick="openTabs(event,'speaking')">
			<div class="target-header">
			<img src="/img/speaking2.png">
			<p>Speaking</p>
			</div>
			<div class="col-md-12 target-content">
				<div class="col-md-12">Memahami sistem penilaian pada semua speaking task yang diujikan.</div>
				<div class="col-md-12">Mendapatkan tips dan trick untuk menjawab pertanyaan dan menyelesaikan tiap task yang diujikan.</div>
				<div class="col-md-12">Mendapatkan kosakata yang relevan dalam menjawab tiap pertanyaan yang diujikan.</div>
			</div>
		</div>
	</div>
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
				</div>
			-->
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
