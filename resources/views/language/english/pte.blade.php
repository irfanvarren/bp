@extends('layouts.bp_wo_sidenav')
@section('title', 'PTE Preparation')
@section('content')
<div class="col-md-12 content-header" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/pte.webp')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
	<div class="content-title" >
		<p><h1>PTE Preparation</h1></p>
		<a href="{{url('products/language/english/registration')}}" target="_blank" class="content-btn"> Daftarkan Sekarang</a>
	</div>
</div>
<div class="col-md-12 content-wrapper class-content-wrapper" style="padding:0 15px !important">
	<div class="row">
		<div class="col-md-12 content-nav">
			<nav>
				<a onclick="scroll_to('deskripsi')">
					Deskripsi
				</a>
			<!--
			<a onclick="scroll_to('learn-exp')">
				Pengalaman Belajar
			</a>
			<a onclick="scroll_to('target')">
				Target Belajar
			</a>-->
		</nav>
	</div>
	<div class="col-md-12 class-content" id="deskripsi">
		<div class="row">
			<div class="col-md-8" style="padding:0;">
				<div class="row">

					<div class="col-md-12">
						<h2>Tentang Program</h2>
						<p>Program ini dikhususkan untuk anda yang ingin mempersiapkan diri anda sebelum mengambil tes resmi PTE. Best Partner Education menyediakan sebuah program yang dapat membantu anda meningkatkan nilai anda dan meningkatkan persentase anda untuk mencapai nilai standar yang anda inginkan.</p>
					</div>


					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 mb-4">
								<h5><strong>DURASI PELATIHAN</strong></h5>
								<ul class="col-md-12">
									<li>30 Jam atau 20 kali pertemuan;  </li>
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
									<li>Best English Program – Level Omega English</li> 
									<li>English for Academic Purposes </li> 
									<li>Program persiapan IELTS/TOEFL</li>
								</ul>
							</div>
							<div class="col-md-6 mb-4">
								<h5><strong>PERSYARATAN MASUK</strong> </h5>
								<ul class="col-md-12">
									<li>Berumur minimal 18 tahun</li> 
									<li>Telah menyelesaikan studi minimal SMA/Sederajat</li>
									<li>Siswa perlu melakukan Placement Test tingkat Bahasa Inggris</li>
									<li>Mencapai Level kemampun minimal Intermediate level /Memiliki nilai prediksi IELTS minimal 5.5/ TOEFL-ITP minimal 520 (bagi yang ingin melanjutkan studi ke luar negeri)</li>


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
							<a class="btn btn-primary" href="{{asset('pdf/Struktur Pembelajaran/Struktur pembelajaran persiapan PTE.pdf')}}">Download PDF</a>
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
										<td>Morning</td>
										<td>09:00 – 10:30</td>
										<td>09:00 – 10:30</td>
										<td>09:00 – 10:30</td>
										<td>09:00 – 10:30</td>
										<td>09:00 – 10:30</td>
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
				
				<div class="col-sm-12 class-sidebar-content">
					<div class="row">
						<div class="col-lg-3"></div>
						<div class="col-md-9">
							<div style="padding:0 10px;"><h3><strong>Metode Pembelajaran</strong></h3>
								<ol class="col-md-12">
									<li>Task Based Learning </li>
									<li>Focus Skill Development </li>
									<li>Daily feedback and opportunity </li>


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
										<li>4 May – 29 May 2020 (30 jam)</li>
										<li>4 May – 26 Juni 2020 (60 jam)</li>

									</ul>
								</p>
								<p>
									Periode Juni
									<ul class="col-md-12 ">
										<li>1 Juni – 26 Juni 2020 (30 Jam)</li>
										<li>1 Juni - 24 Juli 2020 (60 jam)</li>
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
<script type="text/javascript">
	function scroll_to(div){
		$('html, body').animate({
			scrollTop: $("#"+div).offset().top - 230
		}, 1000);
	}
</script>
@stop
