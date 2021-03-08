@extends('layouts.bp_wo_sidenav')
@section('title', 'Indonesia')
@section('content')
<!--<div class="content-header col-md-12" style="background-image:url('/img/about.jpg');">
	<h1>About Us</h1>
</div>-->
<div class="col-md-12 content-header sa-country" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/negara/indonesia.jpg')}}');">
	<div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
		<div class="content-title" >
	<p><h1>Indonesia</h1></p>
    <hr>
	<p>Bagi kamu yang bertujuan memulai karir di dalam negeri, berkuliah di Indonesia merupakan langkah awal yang tepat. Banyak lulusan dalam negeri yang langsung mantap melanjutkan karir dikarenakan jaringan kerja yang relevan selama berkuliah. Penentu keberhasilan seseorang adalah orang itu sendiri. Jadi cukup mantapkan niat, yang terpenting adalah niat untuk belajar. </p>
	</div>
</div>
<div class="content-wrapper sa-country singapore col-md-12">
    <!--  <div class="col-md-12 overview">
       <h1> Overview</h1>
    <p>
          Indonesia secara konsisten terus membuktikan peningkatan baik pada grafik global yakni mengenai keunggulan dan inovasi akademis, hal ini menjadikan Indonesia sebagai negara tujuan mahasiswa internasional. Di antaranya peringkat 10 terbaik adalah menjadi yang terbaik pada jurusan hukum, ilmu komputer, tehnik mekanik, akuntansi dan keuangan, berkuliah di salah satu universitas Indonesia merupakan pengalaman akademis yang tak ternilai dengan memiliki sejumlah universitas internasional dengan kualitas pendidikan dunia yang siap menyambut mahasiswa internasional dengan tangan terbuka.
       </p>
   </div>-->
   <div class="col-md-12 why-country">

    <div class="col-md-6 content-text">
       <h1>Mengapa Indonesia</h1>
       <strong><h4>Karir</h4> </strong>
       <p>

   Kampus di dalam negeri akan menyiapkan pengembangan diri mahasiswa dengan bahasa-bahasa praktik untuk digunakan dalam lingkungan kerja. Dengan berkuliah di dalam negeri, kamu akan lebih cepat dan mudah mendapatkan jaringan kerja, seperti dosen, yang relevan dengan latar belakangmu. Selain itu, kamu akan bertemu dengan teman satu jurusan yang mungkin akan menjadi partner dalam bekerja nantinya.

       </p>
       <strong><h4>Dana</h4> </strong>
       <p>Selain alasan diatas, beberapa alasan lainnya adalah dana. Biaya kuliah di luar negeri tentu lebih mahal dibandingkan di Indonesia. Jangan sampai biaya tersebut malah membebani keluargamu. Kecuali, jika kamu lolos beasiswa yang bersedia menanggung seluruh biaya sekolah juga hidup di sana.
       </p>

    </div>
      <div class="col-md-6 order-first content-img">
        <div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/studying abroad/dalam/indonesia sa 1.png')}}');height: 420px;">
        </div>
      </div>
   </div>
   <div class="col-md-12 country-content content1">
       <div class="col-md-6 content-img">
           <div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/studying abroad/dalam/indonesia sa 2.png')}}');height: 240px;background-size:60%;background-position:top -10px center;">
       </div>
     </div>
       <div class="col-md-6 content-text">
           <h1>Bekerja dan Studi di Indonesia</h1>
          <p>
          Di Indonesia, kuliah di kampus negeri (PTN), mahasiswa memang lebih sulit untuk menyambi kerja penuh waktu, karenanya kampus swasta (PTS) menjadi alternatif bagi mereka yang perlu mencari nafkah untuk diri atau bahkan keluarganya. Memang tak semua kampus swasta punya jam fleksibel, tetapi beberapa kampus swasta menyediakan perkuliahan dengan jam yang disesuaikan bagi para pekerja penuh waktu. Di PTN, ada pula mahasiswa yang kuliah sambil bekerja. Namun, umumnya mereka mengambil kerja part-time karena jam kuliah yang tak memungkinan. </p>
       </div>
   </div>
   <div class="col-md-12 sa-country-bottom content3">
      <h1>Kuliah dan Hidup di Indonesia</h1>
      <div class="col-md-12 sa-country-list">
      <div class="col-md-12 sa-country-desc">
          <div class="triangle"><span id="triangle1">&#9654;</span></div>
          <div class="desc-title" onclick="read_more('read-more1','triangle1')">
              Mendaftar Studi
          </div>

      </div>
      <div class="col-md-12 read-more" id="read-more1">
              <p>SBMPTN merupakan salah satu jalur yang bisa digunakan untuk bisa masuk ke Perguruan Tinggi Negeri (PTN), selain jalur SNMPTN dan jalur mandiri. Pada jalur ini, Kementerian Riset Teknologi dan Pendidikan Tinggi telah menetapkan daya tampung untuk program ini paling sedikit 40 persen dari daya tampung program studi di PTN. Untuk bisa masuk PTN, peserta harus menempuh beberapa persaingan dengan calon mahasiswa lainnya. Maka dari itu, calon mahasiswa sebaiknya mempersiapkan diri sebaik-baiknya.
              </p><p>
Peluang berkuliah di PTS selalu tersedia. Setiap Institusi selalu membuka beberapa gelombang seleksi penerimaan mahasiswa baru melalui jalur ujian mandiri. Setiap kampus memiliki jadwal yang berbeda, sebaiknya kamu lebih banyak mencari jadwal tersebut sesuai pilihanmu.
</p>

          </div>
          </div>

        <div class="col-md-12 sa-country-list">
      <div class="col-md-12 sa-country-desc">
          <div class="triangle"><span id="triangle3">&#9654;</span></div>
          <div class="desc-title" onclick="read_more('read-more3','triangle3')">
          Beasiswa
          </div>

      </div>
      <div class="col-md-12 read-more" id="read-more3">
        <strong></strong>
          </div>
          </div>
   </div>
 
</div>
<script type="text/javascript">
    function read_more(read_more,triangle){
        $('#'+triangle).toggleClass('open');
   $('#'+read_more).slideToggle(450,function(){
  });

}

</script>

@stop
