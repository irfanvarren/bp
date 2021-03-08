@extends('layouts.bp_wo_sidenav')
@section('title', 'About Us')
@section('content')
<!--
<div class="content-header col-md-12" style="background-image:url('/img/bp_services.jpg');">
	<h1>Our Services</h1>
</div>
-->
<div class="content-wrapper language-content col-md-12" >
	<div class="col-md-12 product" style="height:auto !important;">
		<span class="product-title">IELTS Class</span>
		<div class="row">
		<div class="col-md-5 product-img" style="background-size:400px auto;height:auto;background-image: url('{{asset('/img/ielts.jpg')}}');">
		</div>
		<div class="col-md-7 product-desc">
			<p>Program IELTS (Academic & General Training) dirancang untuk mempersiapkan kalian untuk meraih tes skor yang kalian inginkan. Kalian juga akan dibimbing oleh tutor yang berpengalaman dengan tes IELTS dan telah tersertifikasi (IELTS) dengan nilai minimal 7 (good language user). Metode pengajaran yang digunakan ampuh untuk membantu kalian mencapai target nilai yang memuaskan.
		</p>
			<p><b>Lokasi: </b> Pontianak, Singkawang, Ketapang</p>
			<div class="col-md-12" style="padding:0;">
				<button class="product-btn" onclick="location.href='/products/language/english/ielts-class'">Read More</button>
			</div>
		</div>
		</div>
	</div>
	<div class="col-md-12 product" style="height:auto !important;">
		<span class="product-title">TOEFL Class</span>
		<div class="row">
		<div class="col-md-5 product-img" style="background-size:400px auto;background-image: url('{{asset('/img/toefl.jpg')}}');height:auto;">
		</div>
		<div class="col-md-7 product-desc">
			<p>Program ini sangat cocok untuk siswa yang tengah mempersiapkan diri untuk menghadapi Test resmi PBT (ITP-TOEFL). Siswa BP sendiri, akan mempelajari secara intensif bentuk tes dalam PBT (ITP-TOEFL)mulai dari Listening Comprehension, Structure dan written expression, Reading comprehension dan strategi untuk menjawab. Setiap siswa akan belajar menggunakan materi tes-tes TOEFL otentik yang mirip dengan tes sesungguhnya
		</p>
			<p><b>Lokasi: </b> Pontianak, Singkawang, Ketapang</p>
			<div class="col-md-12" style="padding:0;">
				<button class="product-btn" onclick="location.href='/products/language/english/toefl-class'">Read More</button>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-12 product" style="height:auto !important;">
		<span class="product-title">BEP - General English Class</span>
		<div class="row">
		<div class="col-md-5 product-img" style="background-size:400px auto;background-image: url('{{asset('/img/bep.jpg')}}');height:auto;">
		</div>
		<div class="col-md-7 product-desc">
			<p>General English Class dirancang khusus untuk jenjang sekolah menengah hingga dewasa. Tahapan belajar kalian dibagi menjadi 4 level yang membantu kalian mengembangkan kemampuan berbahasa Inggris dari dasar hingga maksimal. Kalian juga akan dibimbing dengan tutor yang tersertifikasi dan profesional di bidangnya. Pembelajaran di setiap sesinya juga dikemas dengan metode dan teknik yang komunikatif dan terfokus pada pengembangan kemampuan berbahasa.
		</p>
			<p><b>Lokasi: </b> Pontianak, Singkawang, Ketapang</p>
			<div class="col-md-12" style="padding:0;">
				<button class="product-btn" onclick="location.href='/products/language/english/bep'">Read More</button>
			</div>
		</div>
		</div>
	</div>
	 <div class="col-md-12 product" style="height:auto !important;">
    <span class="product-title">Teen Class</span>
    <div class="row">
    <div class="col-md-5 product-img" style="background-size:400px auto;background-image: url('{{asset('/img/teen-class.jpg')}}');height:auto;">
    </div>
    <div class="col-md-7 product-desc">
      <p>Program ini dikhususkan untuk para Remaja dan Mahasiswa yang ingin memulai atau memperlancar kemampuan berbahasa Inggris mereka dan persiapan dalam menghadapi ujian sekolah dan masuk perguruan tinggi. Best Partner Education menyediakan sebuah program yang dapat 100% membantu anda meningkatkan kemampuan bahasa Inggris anda dan meningkatkan kepercayaan diri anda dalam berkomunikasi dalam Bahasa Inggris.
    </p>
      <p><b>Lokasi: </b> Pontianak, Singkawang, Ketapang</p>
      <div class="col-md-12" style="padding:0;">
        <button class="product-btn" onclick="location.href='/products/language/english/teen-class'">Read More</button>
      </div>
    </div>
    </div>
  </div>
  <div class="col-md-12 product" style="height:auto !important;">
    <span class="product-title">Young Learners</span>
    <div class="row">
    <div class="col-md-5 product-img" style="background-size:400px auto;background-image: url('{{asset('/img/young learner.jpg')}}');height:auto;">
    </div>
    <div class="col-md-7 product-desc">
      <p>Young Learner Class adalah program untuk anak-anak dari kelas 1-6 SD. Sebagai siswa BP, anak anda akan mendapatkan 3 level kursus dengan kelas yang aktif dan interaktif dengan mengutamakan English Communicative Learning. Anak-anak akan belajar kemampuan bahasa Inggris secara mendasar untuk mengembangkan keterampilan sosial dan kognitif mereka.
    </p>
      <p><b>Lokasi: </b> Pontianak, Singkawang, Ketapang</p>
      <div class="col-md-12" style="padding:0;">
        <button class="product-btn" onclick="location.href='/products/language/english/young-learners'">Read More</button>
      </div>
    </div>
    </div>
  </div>
	<div class="col-md-12 product" style="height:auto !important;">
		<span class="product-title">GMAT</span>
		<div class="row">
		<div class="col-md-5 product-img" style="background-size:400px auto;background-image: url('{{asset('/img/gmat.png')}}');height:auto;">
		</div>
		<div class="col-md-7 product-desc">
			<p>Kelas persiapan GMAT Test di Best Partner memiliki program yang akan membantu kalian mendapatkan skor yang kalian inginkan. Kelas persiapan GMAT menyediakan paket yang fokus pada peningkatan keterampilan tes para siswa. Disini siswa akan diberikan contoh soal yang nyata dan latar belakang yang relevan mencakup analytical writing assessment, integrated reasoning, the quantitative section, dan verbal section. Program ini membantu siswa BP untuk mengasah keterampilan tes verbal maupun matematika dasar serta berlanjut dengan membantu kalian memahami soal-soal GMAT.
		</p>
			<p><b>Lokasi: </b> Pontianak, Singkawang, Ketapang</p>
			<div class="col-md-12" style="padding:0;">
				<button class="product-btn" onclick="location.href='/products/language/english/gmat'">Read More</button>
			</div>
		</div>
		</div>
	</div>
	<div class="col-md-12 product" style="height:auto !important;">
		<span class="product-title">GRE</span>
		<div class="row">
		<div class="col-md-5 product-img" style="background-size:400px auto;background-image: url('{{asset('/img/gre.jpg')}}');height:auto;">
		</div>
		<div class="col-md-7 product-desc">
			<p>GRE test atau Graduate Record Exam wajib diikuti oleh kandidat mahasiswa yang berencana mengikuti program S2 atau S3 di Amerika Serikat dan negara berbahasa Inggris lainnya. GRE digunakan untuk mengukur tingkat kemampuan siswa dalam memahami bacaan rumit dan menganalisa informasi kuantitatif. Ujian GRE akan menguji 3 hal yaitu Verbal Reasoning, Quantitative Reasoning dan Analytical Writing.
		</p>
			<p><b>Lokasi: </b> Pontianak, Singkawang, Ketapang</p>
			<div class="col-md-12" style="padding:0;">
				<button class="product-btn" onclick="location.href='/products/language/english/gre'">Read More</button>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-12 product" style="height:auto !important;">
		<span class="product-title">SAT</span>
		<div class="row">
		<div class="col-md-5 product-img" style="background-size:400px auto;background-image: url('{{asset('/img/sat.jpg')}}');height:auto;">
		</div>
		<div class="col-md-7 product-desc">
			<p>SAT merupakan ujian terstandarisasi dari kemampuan berpikir kritis untuk para calon mahasiswa di AS dan negara lain seperti Singapura. Kursus kami membantu siswa mengembangkan strategi ujian yang efektif secara interaktif, sehingga siswa akan senantiasa fokus dan termotivasi hingga waktu ujian tiba. Rencana pembelajaran dirancang secara khusus untuk memenuhi kebutuhan siswa sekolah menengah atas; menggunakan pendekatan inovatif sehingga mereka dapat memfokuskan waktu yang mereka miliki untuk memperoleh nilai terbaik. Sesi kelas yang menyenangkan akan meningkatkan kepercayaan diri dan keahlian berstrategi.
		</p>
			<p><b>Lokasi: </b> Pontianak, Singkawang, Ketapang</p>
			<div class="col-md-12" style="padding:0;">
				<button class="product-btn" onclick="location.href='/products/language/english/sat'">Read More</button>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-12 product" style="height:auto !important;">
		<span class="product-title">PTE</span>
		<div class="row">
		<div class="col-md-5 product-img" style="background-size:400px auto;background-image: url('{{asset('/img/pte.webp')}}');height:auto;background-size: contain">
		</div>
		<div class="col-md-7 product-desc">
			<p>Program ini dikhususkan untuk anda yang ingin mempersiapkan diri anda sebelum mengambil tes resmi PTE. Best Partner Education menyediakan sebuah program yang dapat membantu anda meningkatkan nilai anda dan meningkatkan persentase anda untuk mencapai nilai standar yang anda inginkan.
		</p>
			<p><b>Lokasi: </b> Pontianak, Singkawang, Ketapang</p>
			<div class="col-md-12" style="padding:0;">
				<button class="product-btn" onclick="location.href='/products/language/english/pte'">Read More</button>
			</div>
		</div>
	</div>
	</div>
</div>

@stop
