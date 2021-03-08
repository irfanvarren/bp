@extends('layouts.bp_wo_sidenav')
@section('title', 'IELTS Class')
@section('content')
<div class="col-md-12 content-header" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/ielts.jpg')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
	<div class="content-title" >
		<p><h1>IELTS Class</h1></p>
		<p>IELTS Class Preparation</p>
		<a href="{{url('products/language/english/registration')}}" target="_blank" class="content-btn"> Daftarkan Sekarang</a>
	</div>
</div>
<div class="col-md-12 content-wrapper class-content-wrapper" style="padding:0 15px;">
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
					<div class="row">
						<div class="col-md-12">
							<h2>Tentang Program</h2>
							<p>
								Program kelas persiapan IELTS dirancang khusus untuk mereka yang ingin mempersiapkan diri sebelum menghadapi IELTS official test. Program ini bersifat intensif dan komprehensif dimana bimbingan dan materi yang diberikan oleh tutor adalah secara bertahap dan berkelanjutan, hal ini dipercaya akan membuat pembelajaran menjadi lebih optimal dan dapat diterima dengan baik oleh peserta pelatihan. Program ini dibuat cukup efektif untuk membantu peserta pelatihan meningkatkan nilai dan persentase untuk mencapai nilai standar yang diinginkan.
							</p>
							<p>
								Pelatihan akan memfokuskan kepada pengembangan setiap skill yang dimiliki oleh peserta pelatihan, dengan dibimbing oleh tutor yang berpengalaman dan sangat kompeten dibidang IELTS yang dibuktikan dengan pencapaian masing-masing tutor yang mendapatkan hasil IELTS minimal 7 (Good Language User).
							</p>
							<p>
								Dibagi menjadi dua pilihan Modul Academic dan General Training agar dapat menyesuaikan dan memenuhi kebutuhan client sesuai dengan keinginan mereka. 
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
										<li>Best English Program - Level Omega English</li> 
										<li>English for Specific Purposes</li> 
										<li>Program persiapan IELTS Lanjutan</li>
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
								<a class="btn btn-primary" href="{{asset('pdf/Struktur Pembelajaran/Struktur pembelajaran persiapan IELTS.pdf')}}">Download PDF</a>
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

				<div class="col-md-4 class-sidebar">
					<div class="class-sidebar-content col-md-12 col-sm-6">
						<div class="row">

						<div class="col-md-3 class-sidebar-img">
							<img src="{{asset('/img/ielts/33.png')}}">
						</div>
						<div class="col-md-9 class-sidebar-desc">
							<h3>Pembelajaran Yang Intensif</h3>
							<p>Disetiap sesi, kalian akan diberikan pembelajaran yang intensif dan feedback secara rinci untuk meningkatkan efektivitas proses belajar.</p>
						</div>
					</div>
					</div>
					<div class="class-sidebar-content col-md-12 col-sm-6">
						<div class="row">
						<div class="col-md-3 class-sidebar-img">
							<img src="{{asset('/img/ielts/22.png')}}">
						</div>
						<div class="col-md-9 class-sidebar-desc">
							<h3>Metode Pengajaran Yang Efektif</h3>
							<p>Tutor menggunakan metode pengajaran yang efektif seperti Task Based Learning dan Focus Skill Development yang mendukung pengembangan kemampuan berbahasa Inggris secara maksimal.</p>
						</div>
					</div>
					</div>
					<div class="class-sidebar-content col-md-12 col-sm-6">
						<div class="row">
						<div class="col-md-3 class-sidebar-img">
							<img src="{{asset('/img/ielts/11.png')}}">
						</div>
						<div class="col-md-9 class-sidebar-desc">
							<h3>Supplementary Exercise</h3>
							<p>Tutor juga menyediakan supplementary exercise sebagai sarana latihan intensif di luar sesi program.</p>
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
				<div class="col-md-3 target tablink" onclick="openTabs(event,'listening')">
					<div class="target-header"><img src="{{asset('/img/listening2.png')}}">
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
						<img src="{{asset('/img/reading2.png')}}">
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
						<img src="{{asset('/img/writing2.png')}}">
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
						<img src="{{asset('/img/speaking2.png')}}">
						<p>Speaking</p>
					</div>
					<div class="col-md-12 target-content">
						<div class="col-md-12">Memahami sistem penilaian pada semua speaking task yang diujikan.</div>
						<div class="col-md-12">Mendapatkan tips dan trick untuk menjawab pertanyaan dan menyelesaikan tiap task yang diujikan.</div>
						<div class="col-md-12">Mendapatkan kosakata yang relevan dalam menjawab tiap pertanyaan yang diujikan.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 learn-exp" id="learn-exp">
			<h1>Pengalaman Belajar</h1>
			<div class="learn-vid-wrapper col-md-12">
				<div class="row">
					<div class="col-md-4">
						<div class="col-md-12 learn-vid">
							<section class="videos-section">
								<div class="col-cont">
									<div class="youtube-container home-youtube-container embed-responsive-item" id="videoPlayer">
										<div class="homeVideoThumbnail home-videoplayer" id="vid-o5sHCTRKK2g"><img style="width:100%" src="//img.youtube.com/vi/o5sHCTRKK2g/0.jpg" />    <i class="fa fa-youtube-play homeVideoPlayButton"></i></div>

									</div>

								</div>
							</section>
							<div class="video-desc" style="padding-top:5px;">IELTS Official test testimoni~Yanti "Jangan Anggap IELTS mudah"</div>
						</div	>

					</div>
					<div class="col-md-4">
						<div class="col-md-12 learn-vid">
							<section class="videos-section">
								<div class="col-cont">
									<div class="youtube-container home-youtube-container embed-responsive-item" id="videoPlayer">
										<div class="homeVideoThumbnail home-videoplayer" id="VzGKY8lv7Dw"><img style="width:100%;" src="//img.youtube.com/vi/VzGKY8lv7Dw/0.jpg" />    <i class="fa fa-youtube-play homeVideoPlayButton"></i></div>

									</div>

								</div>
							</section>
							<div class="video-desc" style="padding-top:5px;">Testimonial IELTS Preparation 30 hours and got 7.0 bandscore</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="col-md-12 learn-vid">
							<section class="videos-section">
								<div class="col-cont">
									<div class="youtube-container home-youtube-container embed-responsive-item" id="videoPlayer">
										<div class="homeVideoThumbnail home-videoplayer" id="vid-223LvPKG_N0"><img style="width:100%;" src="//img.youtube.com/vi/223LvPKG_N0/0.jpg" />    <i class="fa fa-youtube-play homeVideoPlayButton"></i></div>

									</div>

								</div>
							</section>
							<div class="video-desc" style="padding-top:5px;">Vianey priscilla " IELTS preparation class" 6.0 bandscores</div>
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
//  $('.homeVideoPlayButton').click(function(){
//      $('.homeVideoThumbnail').click();
//  });
});

/*
var video_wrapper = $('.youtube-video-place');
//  Check to see if youtube wrapper exists
if(video_wrapper.length){
// If user clicks on the video wrapper load the video.
$('.play-youtube-video').on('click', function(){
	alert('test');
/* Dynamically inject the iframe on demand of the user.
 Pull the youtube url from the data attribute on the wrapper element.
video_wrapper.html('<iframe allowfullscreen frameborder="0" class="embed-responsive-item" src="' + video_wrapper.data('yt-url') + '"></iframe>');
});
}
*/
function scroll_to(div){
	$('html, body').animate({
		scrollTop: $("#"+div).offset().top - 230
	}, 1000);
}
</script>
@stop
