@extends('layouts.bp_wo_sidenav')
@section('title', 'TOEFL Class')
@section('content')
<div class="col-md-12 content-header" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/toefl.jpg')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
	<div class="content-title" >
		<p><h1>TOEFL Class</h1></p>
		<p>TOEFL ITP & iBT Preparation</p>
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
				<a onclick="scroll_to('learn-exp')">
					Pengalaman Belajar
				</a>
				<a onclick="scroll_to('target')">
					Target Belajar
				</a>
			</nav>
		</div>
		<div class="col-md-12 class-content" id="deskripsi">
			<div class="row">
				<div class="col-md-8" style="padding:0;">

					<div class="col-md-12">


						<h2>Tentang Program</h2>
						<p>Program ini dikhususkan untuk anda yang ingin mempersiapkan diri anda sebelum mengambil tes resmi TOEFL-ITP. Best Partner Education menyediakan sebuah program yang 100% dapat membantu anda meningkatkan nilai anda dan meningkatkan persentase anda untuk mencapai nilai standar yang anda inginkan.</p>
						<p>Pelatihan akan memfokuskan kepada pengembangan setiap skill TOEFL yang dimiliki oleh peserta pelatihan, dengan meningkatkan masing-masing kemampuan pada setiap skillnya (Listening Comprehension, Structure and Written Expression dan Reading Comprehension). Dibimbing oleh tutor yang berpengalaman dan sangat kompeten dibidang TOEFL yang dibuktikan dengan pencapaian masing-masing tutor yang mendapatkan hasil TOEFL minimal 570 dan 7.0 pada IELTS (Good Language User).</p>

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
									<li>Best English Program - Level Zeta English</li> 
									<li>English for Specific Purposes</li>
								</ul>
							</div>
							<div class="col-md-6 mb-4">
								<h5><strong>PERSYARATAN MASUK</strong> </h5>
								<ul class="col-md-12">
									<li>Berusia minimal 18 tahun</li> 
									<li>Sudah lulus SMA/SMK/Sederajat</li>
									<li>Siswa perlu melakukan Placement Test tingkat Bahasa Inggris</li>
									<li>Berada di tingkat Bahasa Inggris Intermediate (berdasarkan Placement Test) atau;</li>
									<li>Berada di tingkat Bahasa Inggris Pre-Intermediate (berdasarkan Placement Test) untuk pendaftar pelatihan IELTS dengan tujuan WHV atau;</li>
									<li>Memiliki nilai prediksi IELTS 4.0/ prediksi TOEFL-ITP 437</li>


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
							<a class="btn btn-primary" href="{{asset('pdf/Struktur Pembelajaran/Struktur pembelajaran persiapan TOEFL.pdf')}}">Download PDF</a>
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
				<div class="col-md-4 class-sidebar">
					<div class="class-sidebar-content col-md-12 col-sm-6">
						<div class="row">
							<div class="col-md-3 class-sidebar-img">
								<img src="{{asset('/img/toefl/learning.png')}}">
							</div>
							<div class="col-md-9 class-sidebar-desc">
								<h3>Task Based Learning</h3>
								<p>Menggunakan Metode Task Based Learning and Focus skill development</p>
							</div>
						</div>
					</div>
					<div class="class-sidebar-content col-md-12 col-sm-6">
						<div class="row">
							<div class="col-md-3 class-sidebar-img">
								<img src="{{asset('/img/toefl/Daily Opportunities.pn')}}g">
							</div>
							<div class="col-md-9 class-sidebar-desc">
								<h3>Daily Opportunities</h3>
								<p>Siswa selalu mendapat daily opportunities sebagai sarana latihan intensif di luar jam pelajaran kelas</p>
							</div>
						</div>
					</div>
					<div class="class-sidebar-content col-md-12 col-sm-6">
						<div class="row">
							<div class="col-md-3 class-sidebar-img">
								<img src="{{asset('/img/toefl/Professional Tutor.png')}}">
							</div>
							<div class="col-md-9 class-sidebar-desc">
								<h3>Professional Tutor</h3>
								<p>Di bimbing oleh tutor yang yang memiliki latar belakang pendidikan tinggi dalam Bahasa Inggris dan yang berpengalaman dengan Test TOEFL dan telah mengikuti tes TOEFL dan berhasil mendapat nilai minimal 550</p>
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

		<div class="col-md-12 target-wrapper" id="target" style="border-top:1px solid #ccc">
			<h1> Target Pembelajaran</h1>
			<div class="row">
				<div class="col-md-4 target tablink" onclick="openTabs(event,'listening')">
					<div class="target-header"><img src="{{asset('/img/toefl/Listening Comprehension.png')}}">
						<p>Listening Comprehension</p>
					</div>
					<div class="col-md-12 target-content">
						<div class="col-md-12"> Siswa belajar memahami berbagai bentuk pertanyaan, tekanan dan nada, perbedaan bunyi, idiom, ungkapan-ungkapan percakapan, frase kata kerja, informasi tersirat, perbandingan, dan maksa/isi percakapan.</div>
					</div>
				</div>
				<div class="col-md-4 target tablink" onclick="openTabs(event,'reading')">
					<div class="target-header">
						<img src="{{asset('/img/toefl/Structure and Written Expression.png')}}">
						<p>Structure and Written Expression</p>
					</div>
					<div class="col-md-12 target-content">
						<div class="col-md-12">Siswa berlatih  mengidentifikasi bahasa Inggris tulis yang digunakan dalam situasi formal. Siswa juga mengasah pengetahuan yang cukup tentang grammar dengan menentukan kalimat-kalimat mana yang paling efektif, dan benar dalam pengungkapan. </div>
					</div>
				</div>
				<div class="col-md-4 target tablink" onclick="openTabs(event,'writing')">
					<div class="target-header">
						<img src="{{asset('/img/toefl/Reading.png')}}">
						<p>Reading Comprehension</p>
					</div>
					<div class="col-md-12 target-content">
						<div class="col-md-12">Siswa belajar untuk mengetahui pola-pola dan standard soal tertentu. Disini, siswa mengasah kemampuan dalam memahami, menginterpretasikan, dan menganalisis teks dan bacaan. </div>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-12 learn-exp" id="learn-exp">
			<h1>Pengalaman Belajar</h1>
			<div class="row">
				<div class="learn-vid-wrapper col-md-12">
					<div class="row">
						<div class="col-md-4">
							<div class="col-md-12 learn-vid">
								<section class="videos-section">
									<div class="col-cont">
										<div class="youtube-container home-youtube-container embed-responsive-16by9 embed-responsive-item" id="videoPlayer">
											<div class="homeVideoThumbnail home-videoplayer" id="vid-0rXQ-nRYnP4"><img style="width:100%;" src="//img.youtube.com/vi/0rXQ-nRYnP4/0.jpg" />    <i class="fa fa-youtube-play homeVideoPlayButton"></i></div>

										</div>

									</div>
								</section>
								<div class="video-desc" style="padding-top:5px;">IKIP TOEFL SIMULATION</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="col-md-12 learn-vid">
								<section class="videos-section">
									<div class="col-cont">
										<div class="youtube-container home-youtube-container embed-responsive-16by9 embed-responsive-item" id="videoPlayer">
											<div class="homeVideoThumbnail home-videoplayer" id="vid-18KGQSz4y-Q"><img style="width:100%;" src="//img.youtube.com/vi/18KGQSz4y-Q/0.jpg" />    <i class="fa fa-youtube-play homeVideoPlayButton"></i></div>

										</div>

									</div>
								</section>
								<div class="video-desc" style="padding-top:5px;">Apa sih TOEFL itu??</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="col-md-12 learn-vid">
								<section class="videos-section">
									<div class="col-cont">
										<div class="youtube-container home-youtube-container embed-responsive-16by9 embed-responsive-item" id="videoPlayer">
											<div class="homeVideoThumbnail home-videoplayer" id="vid-VO1lVA1Lm7Q"><img style="width:100%;" src="//img.youtube.com/vi/VO1lVA1Lm7Q/0.jpg" />    <i class="fa fa-youtube-play homeVideoPlayButton"></i></div>

										</div>

									</div>
								</section>
								<div class="video-desc" style="padding-top:5px;">TOEFL Simulation</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(e) {
		$('.homeVideoThumbnail').click(function(test){
			var id = $(this).attr('id').replace('vid-', '');
			var title = $(this).children("span").html();
			var descrip = $(this).children("em").html();
			var vid = '<iframe src="//www.youtube.com/embed/' + id + '?autoplay=1" width="100%" height="200" frameborder="0" allowfullscreen></iframe>';
			if (typeof title != 'undefined') {
				var vid = vid + '<p>' + title + ' &mdash; <em>' + descrip + '</p>';
			}
    //$('#videoPlayer',this).html(vid);
    $(this).parent().html(vid);
});
	});
	function scroll_to(div){
		$('html, body').animate({
			scrollTop: $("#"+div).offset().top - 230
		}, 1000);
	}
</script>
@stop
