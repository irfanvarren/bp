@extends('layouts.bp_wo_sidenav')
@section('title', 'Australia')
@section('content')
<!--<div class="content-header col-md-12" style="background-image:url('/img/about.jpg');">
	<h1>About Us</h1>
</div>-->
<div class="col-md-12 content-header sa-country" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/negara/australia.jpg')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
	<div class="content-title">
		<p>
			<h1>Australia</h1>
		</p>
		<hr>
		<p> Australia memiliki jumlah siswa internasional terbanyak ketiga di dunia setelah Inggris dan Amerika Serikat, meski populasi penduduknya hanya 23 juta? Ini tentulah bukan hal aneh karena Australia memiliki tujuh dari 100 universitas
			terbaik dunia! Peringkat Australia berada di atas Jerman, Belanda dan Jepang, dan berperingkat delapan dalam Peringkat Sistem Pendidikan Tinggi Nasional Universitas U21 2012 dengan lebih dari 22.000 program di 1.100 lembaga pendidikan.
		</p>
	</div>
</div>
<div class="content-wrapper sa-country col-md-12">
	<!--  <div class="col-md-12 overview">
       <h1> Overview</h1>
       <p>
           Australia memiliki jumlah siswa internasional terbanyak ketiga di dunia setelah Inggris dan Amerika Serikat, meski populasi penduduknya hanya 23 juta? Ini tentulah bukan hal aneh karena Australia memiliki tujuh dari 100 universitas terbaik dunia! Peringkat Australia berada di atas Jerman, Belanda dan Jepang, dan berperingkat delapan dalam Peringkat Sistem Pendidikan Tinggi Nasional Universitas U21 2012 dengan lebih dari 22.000 program di 1.100 lembaga pendidikan.
       </p>
   </div>-->
	<div class="col-md-12 why-country">
        <div class="row">
            <div class="col-md-6 content-img">
			<div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/studying abroad/dalam/australia sa 2.png')}}');height: 390px;">
			</div>
		</div>
		<div class="col-md-6 content-text">
			<h1>Mengapa Australia</h1>
			<p>
				Dalam skala nasional, lembaga pendidikan di Australia juga berperingkat sama tinggi dengan peringkat kota-kota negara bagian di seluruh negeri sehingga peringkat ini merupakan bukti kemampuan akademis yang kuat. Australia juga
				memiliki lima dari 30 kota terbaik di dunia untuk siswa berdasarkan campuran siswa, keterjangkauan biaya, kualitas hidup, dan aktivitas penyedia kerja – yang merupakan elemen penting bagi siswa ketika memilih tujuan belajar terbaik.
				Selain itu, pemerintah Australia memberikan lebih dari 200 juta dolar Australia untuk beasiswa internasional setiap tahunnya. <br><br>
				Dalam hal kehebatan dari pendidikannya, Australia telah menghasilkan 15 pemenang hadiah Nobel untuk membuat hidup mereka, dan kehidupan orang lain, lebih baik. Setiap hari lebih dari 1 miliar orang di seluruh dunia bergantung pada
				penemuan dan inovasi Australia – seperti penisilin, IVF, USG, Wi-Fi, Telinga Bionik, vaksin kanker serviks dan Black Box Perekam Penerbangan .

			</p>
		</div>
		
		</div>
	</div>
	<div class="col-md-12 country-content content1">
	    <div class="row">
	
		<div class="col-md-6 order-12 order-sm-1 content-text">
			<h1>Pendidikan Di Australia</h1>
			<p>Australia menawarkan beragam pilihan studi dengan lebih dari 1.200 pilihan lembaga pendidikan dan lebih dari 22.000 pilihan jurusan bagi siswa internasional. Anda dapat belajar pada berbagai level pendidikan dan kualifikasi mulai dari
				sekolah dasar, menengah, hingga pendidikan kejuruan dan pelatihan (VET), dari kursus bahasa Inggris hingga pendidikan tinggi (termasuk universitas). Anda dapat menempuh jenjang Gelar Sarjana atau mengambil kursus singkat bekerja atau
				berlibur di sini.
				Ada tiga jenis pendidikan tinggi utama, yang mengarah ke Gelar Sarjana, Master dan Doktor. Mahasiswa yang mendaftar dalam program Gelar Sarjana ganda atau gabungan yang mengarah ke dua Gelar Sarjana adalah merupakan hal yang cukup
				umum di Australia. Hal ini sering terjadi dalam bidang seni, perdagangan, hukum dan sains.
			</p>
		</div>
		
			<div class="col-md-6 order-1 order-sm-12 content-img">
				<div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/studying abroad/dalam/australia sa 3.png')}}');height: 300px;"> </div>
		</div>
		
		</div>
	</div>
	<div class="col-md-12 country-content content2">
	     <div class="row">
		<div class="col-md-6 content-text">
			<h1> Bekerja, berwisata dan studi di Australia</h1>
			<p>Australia menawarkan program berlibur sambil bekerja (Working Holiday Maker Program), yang mencakup visa Working Holiday dan visa Work Holiday, memungkinkan Anda untuk bepergian dan bekerja di Australia selama total 12 bulan dan studi
				di Australia hingga 4 bulan.
			</p>

		</div>
		<div class="col-md-6 order-first content-img">
			<div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/studying abroad/dalam/australia sa 1.png')}}');height: 180px;"> </div>
		</div>
		</div>
	</div>
	<div class="col-md-12 sa-country-bottom content3">
		<h1>Kuliah dan Hidup di Australia</h1>
		<div class="col-md-12 sa-country-list">
			<div class="col-md-12 sa-country-desc"  onclick="read_more('read-more1','triangle1')">
				<div class="triangle"><span id="triangle1">&#9654;</span></div>
				<div class="desc-title">
					Akomodasi
				</div>

			</div>
			<div class="col-md-12 read-more" id="read-more1">
				<p>Setelah Anda mendapat konfirmasi di mana Anda akan belajar, Anda dapat mencari akomodasi yang sesuai dengan kebutuhan dan anggaran Anda. Beberapa tip ketika mencari akomodasi antara lain:
				</p>
				<ul>
					<li>Biayanya dapat bervariasi tergantung pada negara bagian, kota, dan jenis akomodasi yang Anda pilih.</li>
					<li>Selalu konfirmasi total biaya dan biayaa lain yang mungkin harus dibayar seperti biaya uang jaminan dan ongkos utilitas.</li>
					<li>Pertimbangkan seberapa jauhnya dari kampus Anda dan apakah mudah diakses dengan transportasi umum.</li>
				</ul>
				<p>Pilihan akomodasi diantaranya adalah akomodasi jangka pendek , sewa, tinggal di dalam kampus, dan homestay.</p>

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
				<h5>Australia Awards Scholarships</h5>
				<p>Beasiswa Australia Awards bertujuan untuk mendorong pengetahuan, hubungan pendidikan, dan memelihara hubungan baik antara Australia dengan negara-negara tetangga melalui program beasiswa ekstensif Australia.
				</p>
				<h5>Beasiswa Riset Pascasarjana Internasional</h5>
				<p>Program Beasiswa Riset Pascasarjana Internasional (IPRS/International Postgraduate Research Scholarships) berfokus pada peningkatan kualitas riset Australia. Bila Anda telah mempunyai kualifikasi sarjana, beasiswa IPRS memungkinkan
					Anda untuk studi di Australia dengan beberapa peneliti terbaik di bidang Anda. Baca lebih lanjut di situs web Departemen Edukasi. (opens in a new window)
					<h5>Beasiswa lain</h5>
				</p>
				<p>Ada banyak beasiswa lain di Australia yang ditawarkan oleh yayasan swasta, departemen pendidikan pemerintah negara bagian dan lembaga-lembaga pendidikan.</p>

			</div>
		</div>
		<div class="col-md-12 sa-country-list">
			<div class="col-md-12 sa-country-desc"  onclick="read_more('read-more3','triangle3')">
				<div class="triangle"><span id="triangle3">&#9654;</span></div>
				<div class="desc-title">
					Setelah Kelulusan
				</div>

			</div>
			<div class="col-md-12 read-more" id="read-more3">
				<p>Ada beberapa pilihan untuk Anda baik jika Anda ingin tetap berada di Australia ataupun jika Anda pulang ke tanah air setelah kelulusan. Anda dapat melanjutkan studi di Australia untuk mengejar kualifikasi di tingkat yang lebih
					tinggi atau ke bidang studi lain, Anda juga mungkin memenuhi syarat melakukan pekerjaan pasca studi guna memanfaatkan pengetahuan yang baru Anda peroleh untuk mendapatkan pengalaman kerja di Australia, atau Anda dapat memilih
					pulang untuk melakukan studi lebih lanjut atau mulai bekerja. <br><br>
					Jika Anda memutuskan ingin melakukan studi lebih lanjut atau bekerja di Australia, Anda harus memeriksa apakah visa Anda memungkinkan atau apakah Anda perlu mengajukan permohonan visa baru. Silakan kunjungi situs Australian
					Government Department of Home Affairs untuk memeriksa ketentuan visa Anda dan mengetahui apa saja pilihan yang tersedia bagi Anda. <br><br>
					Apapun jalan yang Anda tempuh, pertimbangkanlah untuk bergabung dengan organisasi alumni di lembaga pendidikan Anda. Ini dapat membantu Anda tetap berhubungan dengan teman-teman sekelas, dan dapat memberikan manfaat dan peluang
					yang besar bagi Anda.
				</p>
			</div>
		</div>
		<div class="col-md-12 sa-country-list">
			<div class="col-md-12 sa-country-desc"  onclick="read_more('read-more4','triangle4')">
				<div class="triangle"><span id="triangle4">&#9654;</span></div>
				<div class="desc-title">
					Mendaftar Studi
				</div>

			</div>
			<div class="col-md-12 read-more" id="read-more4">
				<p>Untuk menempuh studi di Australia, Anda harus mendaftar ke lembaga pendidikan dan juga mengajukan permohonan visa pelajar dari Pemerintah Australia. Berikut adalah beberapa langkah yang harus Anda lalui:
				</p>
				<ul>
					<li>Menentukan jurusan dan lembaga pendidikan yang Anda tuju </li>
					<li>Mengajukan aplikasi kepada lembaga pendidikan</li>
					<li> Menerima dan menyetujui Surat Penawaran (Letter of Offer)</li>
					<li>Menerima Konfirmasi Pendaftaran (CoE/Confirmation of Enrolment) Anda – Mengajukan aplikasi visa pelajar</li>
				</ul>

			</div>
		</div>
	</div>
	
</div>
<script type="text/javascript">
	function read_more(read_more, triangle) {
		$('#' + triangle).toggleClass('open');
		$('#' + read_more).slideToggle(450, function() {});

	}
</script>

@stop
