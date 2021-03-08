@extends('layouts.bp_wo_sidenav')
@section('title', 'Teen Class')
@section('content')
<div class="col-md-12 content-header" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/teen-class.jpg')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
	<div class="content-title" >
		<p><h1>Teen Class</h1></p>
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
						<p>Program ini dikhususkan untuk para Remaja dan Mahasiswa yang ingin memulai atau memperlancar kemampuan berbahasa Inggris mereka dan persiapan dalam menghadapi ujian sekolah dan masuk perguruan tinggi. Best Partner Education menyediakan sebuah program yang dapat 100% membantu anda meningkatkan kemampuan bahasa Inggris anda dan meningkatkan kepercayaan diri anda dalam berkomunikasi dalam Bahasa Inggris.</p>
					</div>


					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6 mb-4">
								<h5><strong>DURASI PELATIHAN</strong></h5>
								<ul class="col-md-12">
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
									<li>Level Test</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-4">
								<h5><strong>JALUR PROGRAM LANJUTAN</strong></h5>
								<ul class="col-md-12">
									<li>Best English Program – Level Alpha English</li> 
									<li>English for Academic Purposes </li> 
								</ul>
							</div>
							<div class="col-md-6 mb-4">
								<h5><strong>PERSYARATAN MASUK</strong> </h5>
								<ul class="col-md-12">
									<li>Berumur 13 tahun ke atas</li> 
									<li>Sedang bersekolah minimal di tingkat SMP/Sederajat</li>
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
							<a class="btn btn-primary" href="{{asset('pdf/Struktur Pembelajaran/Struktur pembelajaran kelas Teen.pdf')}}">Download PDF</a>
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
							<div style="padding:0 10px;"><h3><strong>Level</strong></h3>
								<ol class="col-md-12">
									<li>Academia 1 </li>
									<li>Academia 2</li>
									<li>Academia 3 </li>
									<li>Academia 4 </li>
									<li>Academia 5 </li>
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
										<li>4 May – 26 Juni 2020 (60 Jam) </li>
										
									</ul>
								</p>
								<p>
									Periode Juni
									<ul class="col-md-12 ">
										<li>1 Juni – 24 Juni 2020 (60 Jam)</li>
										
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
