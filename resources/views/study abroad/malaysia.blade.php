@extends('layouts.bp_wo_sidenav')
@section('title', 'Malaysia')
@section('content')
<!--<div class="content-header col-md-12" style="background-image:url('/img/about.jpg');">
  <h1>About Us</h1>
</div>-->
<div class="col-md-12 content-header sa-country" style="/*background-image: linear-gradient(to bottom right, #244272,#99c0ff);*/background-image:url('{{asset('/img/negara/malaysia.jpg')}}');">
  <div style="background-image: linear-gradient(to bottom right, #1c4e9e,#74bff2);width: 100%;height: 100%;position: absolute;top:0;left: 0;z-index: 1;opacity: 0.7;"></div>
    <div class="content-title" >
  <p><h1>Malaysia</h1></p>
    <hr>
  <p> Malaysia memiliki pengalaman 30 tahun dalam bidang pendidikan internasional. Menggandeng kualifikasi akademis baik dari Inggris, Amerika Serikat, Australia dan negara lainnya, Malaysia memberikan kesempatan kepada anda untuk meraih gelar internasional . Oleh sebab itu, Malaysia memiliki 80.000 mahasiswa internasional dari 100 negara berbeda pada tahun 2010.</p>
  </div>
</div>
<div class="content-wrapper sa-country singapore col-md-12">
   <!--<div class="col-md-12 overview">
       <h1> Overview</h1>
       <p>
          Malaysia memiliki pengalaman 30 tahun dalam bidang pendidikan internasional. Menggandeng kualifikasi akademis baik dari Inggris, Amerika Serikat, Australia dan negara lainnya, Malaysia memberikan kesempatan kepada anda untuk meraih gelar internasional . Oleh sebab itu, Malaysia memiliki 80.000 mahasiswa internasional dari 100 negara berbeda pada tahun 2010.
       </p>
   </div>-->
   <div class="col-md-12 why-country">

    <div class="col-md-6 content-text">
       <h1>Mengapa Malaysia</h1>
       <p>
      Malaysia menawarkan berbagai jenis kualifikasi yang diakui secara internasional dan diawasi oleh Malaysian Qualifications Agency Act 2007 dan Private Higher Education Institutions Act 1996. Program kolaborasi Malaysia dengan berbagai universitas terkenal di Inggris, Amerika, Australia dan lainnya membuka kesempatan mahasiswa untuk menyelesaikan gelar luar negeri dengan berkuliah di Malaysia, yang tentunya menghemat biaya pengeluaran. Program-program ini adalah Program Twinning Degree 2+1, ataupun Program 3+0 Bachelor Degree. <br><br>
Selain itu, Malaysia yang bekerjasama dengan industri dan universitas luar negeri untuk menjamin bahwa program yang ditawarkan mengadopsi kurikulum terbaru dan relevan dengan perkembangan pasaran kerja terkini. Program-program tersebut tidak hanya menekankan pengetahuan teoritis, tetapi juga mengajarkan keahlian praktikal yang dibutuhkan di dunia kerja yang sesungguhnya. Tujuannya adalah untuk menghasilkan para lulusan yang siap kerja, suatu kriteria yang dicari-cari oleh berbagai perusahaan.

       </p>
    </div>
      <div class="col-md-6 order-first content-img">
        <div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/studying abroad/dalam/malaysia sa 1.png')}}');height: 390px;">
        </div>
      </div>
   </div>
   <div class="col-md-12 country-content content1">
       <div class="col-md-6 content-img">
         <div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/studying abroad/dalam/malaysia sa 2.png')}}');height: 460px;background-size:80%;">
         </div>
     </div>
       <div class="col-md-6 content-text">
           <h1>Pendidikan di Malaysia</h1>
          <ul>
              <li>Program twinning degree 2+1 <br>Malaysia bekerja sama dengan berbagai universitas bereputasi internasional dari Inggris, Amerika Serikat, Kanada, Selandia Baru, Australia, Prancis dan Jerman untuk memberikan gelar sarjana melalui Program twinning degree 2+1. Program ini memungkinkan Anda untuk kuliah 2 tahun di Malaysia dan 1 tahun di luar negeri (misalnya di Amerika, atau Australia, tergantung program yang Anda ambil). Setelah menyelesaikan program ini, Anda akan mendapatkan gelar dari universitas luar negeri tersebut, sekaligus gelar dari universitas di Malaysia.</li>
              <li>Program 3+0 bachelor degree <br>Dengan program 3+0, Anda bisa menyelesaikan program gelar bachelor (sarjana S1) kualifikasi luar negeri sepenuhnya di Malaysia.Sejak tahun 1998, telah banyak institusi pendidikan swasta Malaysia yang dipercaya oleh universitas-universitas dari Inggris, Australia, Amerika Serikat dan Prancis untuk memberikan gelar sarjana atas nama universitas-universitas luar negeri tersebut. Begitu menyelesaikan kuliah , para mahasiswa bisa melanjutkan ke program S2 di universitas luar negeri.</li>
          </ul>
       </div>
   </div>
   <div class="col-md-12 country-content content2">
       <div class="col-md-6 content-text">
           <h1>Kehidupan di Malaysia</h1>
          <p>
           Kelebihan dari kuliah di Malaysia adalah biaya hidupnya yang terjangkau. Kuala Lumpur merupakan salah satu kota dengan biaya hidup paling terjangkau di dunia. Biaya akomodasi di dalam dan di luar kampus termasuk murah jika dibandingkan dengan negara lain.  Dengan biaya hidup sekitar RM 1,200 per bulan, Anda sudah bisa hidup dengan nyaman di Malaysia.

          </p>
       </div>
       <div class="col-md-6 content-img">
         <div class="col-md-12 sa-img" style="background-image:url('{{asset('/img/studying abroad/dalam/malaysia sa 3.png')}}');height: 180px;">
         </div>
       </div>
   </div>
   <div class="col-md-12 sa-country-bottom content3">
      <h1>Kuliah dan Hidup di Malaysia</h1>
      <div class="col-md-12 sa-country-list" onclick="read_more('read-more1','triangle1')">
      <div class="col-md-12 sa-country-desc">
          <div class="triangle"><span id="triangle1">&#9654;</span></div>
          <div class="desc-title">
              Mendaftar Studi
          </div>

      </div>
      <div class="col-md-12 read-more" id="read-more1">

            <ul>
                <li>Tentukan universitas mana yang ingin dipilih sebagai tempat kamu belajar.</li>
                <li>Persiapkan dokumen yang diperlukan.</li>
                <li>Mengisi Application Form</li>
                <li>Pastikan kampus telah mendapatkan ijin dari Ministry of Home Affairs untuk menerima pelajar asing. Sebelum berangkat ke Malaysia kamu harus mengurus VDR (single entry visa) yang hanya berlaku selama 3 bulan.</li>
                <li>Pengurusan visa tinggal dan belajar (student pass) melalui international office di setiap universitas untuk mengumpulkan Student Pass Application Form ke imigrasi</li>
            </ul>

          </div>
          </div>
        <div class="col-md-12 sa-country-list" onclick="read_more('read-more3','triangle3')">
      <div class="col-md-12 sa-country-desc">
          <div class="triangle"><span id="triangle3">&#9654;</span></div>
          <div class="desc-title">
          Beasiswa
          </div>

      </div>
      <div class="col-md-12 read-more" id="read-more3">
             <ul>
               <li>Malaysia International scholarship (MIS) <br>Pemerintah Malaysia sedang berusaha untuk menarik para mahasiswa berbakat dan terbaik dari seluruh dunia untuk mengambil pendidikan akademis yang lebih tinggi di Universitas terbaik Malaysia </li>
               <li>Commonwealth Scholarship and Fellowship Plan <br>Bantuan ini diberikan oleh pemerintahan Malaysia kepada para mahasiswa yang terpilih dari negara-negara persemakmuran untuk melanjutkan pendidikan pada program pascasarjana di Malaysia.</li>
               <li>Nippon Foundation Fellowships for Asian Public Intellectuals <br>Beasiswa agar intelektual asia berkumpul,  dan berkontribusi pada pertumbuhan lingkup pemerintah, dimana akan efektif dalam merespon kebutuhan-kebutuhan daerah yang perlu dipenuhi.</li>
             </ul>
          </div>
          </div>

             <div class="col-md-12 sa-country-list" onclick="read_more('read-more5','triangle5')">
      <div class="col-md-12 sa-country-desc">
          <div class="triangle"><span id="triangle5">&#9654;</span></div>
          <div class="desc-title">
           Setelah Lulus
          </div>

      </div>
      <div class="col-md-12 read-more" id="read-more5">
            <p>
              Para lulusan bidang Bisnis, Keuangan dan Akuntansi dengan keahlian berbahasa Inggris yang bagus banyak dicari perusahaan untuk semakin meningkatkan perkembangan di sektor industri.. Sektor finansial Malaysia diprediksikan akan menciptakan 275,400 pekerjaan baru sebelum tahun 2020. <br><br>
Para mahasiswa internasional boleh optimis dengan pasar kerja di Malaysia. Dibawah Program Transformasi Ekonomi Pemerintah Malaysia, 3,3 juta pekerjaan baru akan diciptakan sebelum tahun 2020 di segala sektor, erutama untuk sektor elektronik dan elektrik (157,000), pelayanan kesehatan (89,000) dan minyak & gas (52,300).

            </p>

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
