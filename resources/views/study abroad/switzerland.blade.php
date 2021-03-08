@extends('layouts.bp_wo_sidenav')
@section('title', 'Switzerland')
@section('content')
<!--<div class="content-header col-md-12" style="background-image:url('/img/about.jpg');">
	<h1>About Us</h1>
</div>-->
<div class="col-md-12 content-header sa-country" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/negara/switzerland.jpg')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
	<div class="content-title">
		<p>
			<h1>Switzerland</h1>
		</p>
		<hr>
		<p>Swiss atau Switzerland adalah gudangnya cokelat-cokelat terkenal, rumah bagi jam terbaik dunia dan pariwisata terindah di dunia. Pesatnya perkembangan industri pariwisata dan perhotelan menjadikan negara ini patut dilirik menjadi tujuan
			primadona dalam pendidikan. Swiss adalah spesialis pendidikan perhotelan bagi kamu yang bercita-cita menjadi hotelier yang professional dan berwawasan global. </p>
	</div>
</div>
<div class="content-wrapper sa-country singapore col-md-12">
	<!--  <div class="col-md-12 overview">
       <h1> Overview</h1>
    <p>
          Switzerland secara konsisten terus membuktikan peningkatan baik pada grafik global yakni mengenai keunggulan dan inovasi akademis, hal ini menjadikan Switzerland sebagai negara tujuan mahasiswa internasional. Di antaranya peringkat 10 terbaik adalah menjadi yang terbaik pada jurusan hukum, ilmu komputer, tehnik mekanik, akuntansi dan keuangan, berkuliah di salah satu universitas Switzerland merupakan pengalaman akademis yang tak ternilai dengan memiliki sejumlah universitas internasional dengan kualitas pendidikan dunia yang siap menyambut mahasiswa internasional dengan tangan terbuka.
       </p>
   </div>-->
	<div class="col-md-12 why-country">

		<div class="col-md-6 content-text">
			<h1>Mengapa Switzerland</h1>

			<ul>
				<li>Swiss dinobatkan sebagai negara teraman di dunia</li>
				<li>Swiss memiliki universitas-universitas bereputasi tinggi di dunia, dan dua institusi unggulan mereka (EPFL dan ETH Zurich) selalu menempati jajaran 30 besar terbaik dunia dari Times Higher Education (THE) World University
					Rankings. Untuk peringkat 2016-17, Swiss memiliki 7 institusi yang menempati jajaran 150 besar terbaik. Mahasiswa juga selalu merasa puas dengan fasilitas-fasilitas berkualitas dan dengan mutu pengajaran dalam kampus. </li>
			</ul>
		</div>
		<div class="col-md-6 order-first content-img">
			<div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/studying abroad/dalam/switzerland sa 1.png')}}');height: 210px;background-size:contain;">
			</div>
		</div>
	</div>
	<div class="col-md-12 country-content content1">
		<div class="col-md-6">
			<div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/studying abroad/dalam/switzerland sa 2.png')}}');height: 310px;background-size:contain;">
			</div>
		</div>
		<div class="col-md-6 content-text">
			<h1 style="text-align:center;">	Bekerja dan Studi di Switzerland</h1>
			<p>Mahasiswa Internasional diperbolehkan bekerja maksimal 15 jam per minggu, namun dihari libur kamu dapat bekerja tanpa batas jam. Namun, selama enam bulan pertama kuliah, kamu tidak diizinkan untuk bekerja. Tempat kerja juga harus meminta izin terlebih dahulu ke imigrasi sebelum mempekerjakan mahasiswa. Peluang bekerja akan lebih besar apabila universitas memberikan rekomendasi jika bekerja tidak menghambat kelulusan. Tarif yang didapatkan dari bekerja sambilan bisa berkisar antara 20 – 35 CHF (Sekitar Rp. 277,000 – 484,000) per jam tergantung pekerjaan dan keahlian yang dimiliki mahasiswa. Perlu diperhatikan bahwa akan jauh lebih mudah menemukan pekerjaan jika bisa salah satu dari bahasa Jerman, Perancis, Romansh atau Italia. Jika belum menguasai bahasa tersebut, 6 bulan pertama kuliah bisa dimanfaatkan untuk mengikuti kursus
			</p>

			<!--<div class="col-md-12 sa-education">
	<h1>Perhotelan</h1>
</div>-->
		</div>

	</div>
	<div class="col-md-12 country-content content2">
		<div class="col-md-6 content-text">
			<h1>Kehidupan di Switzerland</h1>
			<p>
				Biaya hidup di Swiss bisa dibilang mahal. Rata-rata kamu memerlukan €1000 sampai €1,400 ( Rp 16 – 22,4 juta ) perbulan untuk keperluan makan, transportasi, tempat tinggal, uang kuliah, dan keperluan lainnya. Dibanding dengan kota-kota
				lain di Swiss, biaya hidup di Geneve dan Zurich adalah yang paling mahal.
			</p>
			<p>Swiss menawarkan banyak pilihan akomodasi untuk mahasiswa internasional, diantaranya:</p>
			<ul>
				<li>Akomodasi Universitas (500-800 CHF per bulan)</li>
				<li>Akomodasi Swasta </li>
				<li>Homestay</li>
			</ul>
		</div>
		<div class="col-md-6 content-img">
			<div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/studying abroad/dalam/switzerland sa 3.png')}}');height: 280px;background-size:contain;">
			</div>
		</div>
	</div>
	<div class="col-md-12 sa-country-bottom content3">
		<h1>Kuliah dan Hidup di Switzerland</h1>
		<div class="col-md-12 sa-country-list">
			<div class="col-md-12 sa-country-desc" onclick="read_more('read-more1','triangle1')">
				<div class="triangle"><span id="triangle1">&#9654;</span></div>
				<div class="desc-title">
					Mendaftar Studi
				</div>

			</div>
			<div class="col-md-12 read-more" id="read-more1">
				<p>Swiss membuka semester di musim panas dan musim dingin. Semester Musim Dingin di Swiss dimulai dari bulan September hingga Desember. Masa ujian berlangsung dari akhir Januari hingga pertengahan Febuari. Jika ingin mengikuti
					semester musim dingin, batas akhir untuk mendaftar adalah di bulan Mei. Semester Musim Panas di Swiss dimulai dari bulan Febuari hingga Juni, dan Juli adalah masa ujian. Batas akhir untuk mendaftar untuk semester musim panas
					adalah November, tetapi disarankan untuk mendaftar di bulan Juli atau Agustus.
				</p>
				Dokumen yang perlu disiapkan di antaranya:
				<ul>
					<li>Formulir pendaftaran</li>
					<li>Paspor dan dua pasfoto paspor</li>
					<li>Salinan/fotokopi terlegalisir dari semua sertifikat akademik, termasuk sertifikat A Level (atau setara) dan semua gelar akademik yang pernah didapatkan.</li>
					<li>CV dengan daftar lengkap dari sekolah/universitas </li>
					<li>Sertifikat bahasa. </li>
				</ul>
			</div>
		</div>
		<div class="col-md-12 sa-country-list">
			<div class="col-md-12 sa-country-desc" onclick="read_more('read-more4','triangle4')">
				<div class="triangle"><span id="triangle4">&#9654;</span></div>
				<div class="desc-title">
			Pendidikan di Switzerland
				</div>

			</div>
			<div class="col-md-12 read-more" id="read-more4">
				<p>Switzerland memiliki reputasi universitas dan pengajar terbaik. Swiss juga memberikan kesempatan terbuka bagi mahasiswa asing. Swiss menawarkan berbagai pilihan pendidikan berkualitas tinggi di bidang perhotelan, fisika, arsitektur dan
					teknik.
					Beberapa bidang yang sangat cocok untuk dipilih diantaranya:
				</p>
				<ul>
					<li>Perhotelan <br>
						<p>Swiss merupakan pelopor pendidikan Perhotelan. Swiss menerapkan kurikulum yang balance antara teori dan praktek. Internship (magang kerja) selalu dilaksanakan selama 2 semester untuk mahasiswa S1 dan 1 semester untuk mahasiswa
							S2.
						</p>
						<!--	<p>
				Sekolah perhotelan Swiss memiliki koneksi perhotelan dunia yang mendukung alumninya mendapat perkerjaan dimanapun. Selain lingkungan multicultural, mahasiswa diwajibkan menguasai kemampuan beberapa bahasa seperti Inggris, Jerman dan Perancis.
				</p>-->
					</li>
					<li>Fisika <br>
						<p>Swiss menjadi negara yang paling berpengaruh dalam bidang fisika dengan dipusatkannya CERN (Organisasi Eropa untuk penelitian Nuklir) di Geneva.
						</p>
					</li>
					<li>Arsitektur<br>
						<p>Arsitektur adalah bagian dari tradisi sejarah Swiss. ETH Zurich memiliki fakultas arsitektur terbaik di dunia.
						</p>
					</li>
					<li>
						Teknik <br>
						<p>Jurusan teknik dan teknologifi EPFL telah menjalankan proyek yang menarik yang disebut Blue Brain sejak 2005. Proyek ini menerima pendanaan yang besar dari pemerintah Swiss, dan berusaha menciptakan otak digital dari sirkuit
							mamalia. </p>
					</li>
				</ul>

			</div>
		</div>
		<div class="col-md-12 sa-country-list">
			<div class="col-md-12 sa-country-desc" onclick="read_more('read-more2','triangle2')">
				<div class="triangle"><span id="triangle2">&#9654;</span></div>
				<div class="desc-title">
					Beasiswa
				</div>

			</div>
			<div class="col-md-12 read-more" id="read-more2">
				<ul>
					<li>Swiss Government Scholarship <br>
						<p>Diberikan untuk mahasiswa yang telah meraih gelar master untuk melakukan penelitian dan melanjutkan studi doktoral atau PhD di negara Swiss. Penerima beasiwa akan memperoleh biaya bulanan, kesehatan, tunjangan perumahan,
							gratis biaya kuliah dan masih banyak lagi yang lainnya.</p>
					</li>
					<li>ETH Excellence Scholarship <br>
						<p>
							Diberikan oleh ETH bagi mahasiswa berbakat baik yang berasal dari ETH ataupun universitas internasional lainnya yang berkeinginan untuk mengambil gelar master di ETH. Programa beasiswa yang ditawarkan oleh ETH ada 2 yaitu
							Excellence Scholarship & Opportunity Program (ESOP) dan program beasiswa S2 (MSP). </p>
					</li>
					<li>University of Lausanne Master's Grants For Foreign Students <br> <p>

					 Universitas ini menawarkan beasiswa UNIL Master's Grants untuk mahasiswa internasional yang ingin mengambil gelar master di University of Lausanne. Perbulannya
						penerima beasiswa akan mendapat 1.600 CHF. </p></li>
					<li>EPFL Excellence Fellowship <br><p>

					Diberikan kepada mahasiswa yang cacatan prestasi akademik yang luar biasa. Penerima beasiswa akan memperoleh 1.600 CHF perbulannya </p></li>
					<li>Graduate Institute Scholarship <br><p>

					Diberikan khusus mahasiswa yang ingin melanjutkan studi namun terhalang biaya. Beasiswa yang diberikan oleh Graduate Institute dapat berupa beasiswa penuh, beasiswa parsial ataupun
						pengurangan biaya kuliah. Nah, untuk mahasiswa yang menempuh gelar doktoral atau PhD diizinkan mendapaftar sebagai asisten pengajar ataupun peneliti dan akan memperoleh gaji.</p> </li>
					<li>University of Geneva Excellence Mater Fellowship <br><p>

					Diberikan kepada mahasiswa yang beprestasi dan bermotivasi tinggi ingin melanjutkan studi master di seluruh fakultas yang ada di University of Geneva. Penerima beasiswa
						akan memperoleh 10.000-15.000 CHF pertahunnya. </p> </li>
					<li>IMD MBA Scholarship <br><p>

					 Penerima beasiswa akan memperoleh pendanaan antara 25.000-50.000 CHF. Ada beberapa program beasiswa yang ditawarkan seperti Jim Ellert MBA Sholarship, IMD MBA Future Leaders Scholarship, IMD MBA Class
						Scholarship for Emerging Markets, dan Nestle MBA Scholarship For Women.</p> </li>
				</ul>
			</div>
		</div>
		<div class="col-md-12 sa-country-list">
			<div class="col-md-12 sa-country-desc" onclick="read_more('read-more3','triangle3')">
				<div class="triangle"><span id="triangle3">&#9654;</span></div>
				<div class="desc-title">
	Setelah Lulus
				</div>

			</div>
			<div class="col-md-12 read-more" id="read-more3">
			<p>Kamu bisa bekerja dan tinggal lebih lama di Swiss setelah lulus kuliah dan gaji yang ditawarkan adalah salah satu yang tertinggi di Eropa. Swiss sendiri sedang kekurangan tenaga kerja. Lebih dari 65,000 lowongan pekerjaan tersedia di rumah sakit, rumah perawatan, pusat perawatan harian dan universitas sejak tahun 2005. Belum lagi di sektor lainnya. Selain itu, perusahaan-perusahaan multinasional seperti Dell, Microsoft dan Rolex semua memiliki kantor di Geneva, dan mereka merupakan kesempatan kerja yang sempurna untuk mahasiswa internasional sepertimu.</p>
			</div>
		</div>


	</div>
	<div class="col-md-12 source-link">
		<h5>Sumber :</h5>
		<a href="optima-education.com">optima-education.com</a>
		<a href="id.educations.com">id.educations.com</a>
		<a href="www.ican-education.com">www.ican-education.com</a>
		<a href="www.idntimes.com">www.idntimes.com</a>
	</div>
</div>
<script type="text/javascript">
	function read_more(read_more, triangle) {
		$('#' + triangle).toggleClass('open');
		$('#' + read_more).slideToggle(450, function() {});

	}
</script>

@stop
