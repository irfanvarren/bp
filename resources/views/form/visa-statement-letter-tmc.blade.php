@extends('layouts.bp_wo_sidenav')
<style media="screen">
  ol,
  ul {
    list-style-position: outside;
    padding: 0 18px;
  }

  ol li,
  ul li {
    padding-bottom: 7px;
  }

  h5 {
    margin-bottom: 7px;
    font-weight: bolder;
  }
  .nav-item{
    width:100%  ;
  }
  .tab-pane{
    min-height:500px;
  }
</style>
@section('content')
<div class="col-md-12 content-wrapper">
  <div class="col-md-12">
    <div class="row justify-content-center">
      <div class="col-md-12">

        <div class="card-header" style="background:none;border:none;">

          <div class="" style="padding:0 0 15px 0;">

            <h2 style="text-align:center;color:#368ca8">Syarat Dan Ketentuan Visa Student</h2>
          </div>
        </div>
        <div class="card">
          <div class="card-body" style="padding:30px 15px;">
            <div class="col-md-9 tab-content" id="myContent">
              <div id="menu1" class="tab-pane fade {{ $country == 'AUS' ? 'show active' : ''}}">
               <h5><strong>Visa Australia</strong></h5>
               <ol>
                 <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya menerima resiko tersebut.</li>
                 <li>
                  Saya menyetujui rincian biaya-biaya yang telah diterangkan oleh pihak Best Partner      
                </li>
                <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
                <li>
                  Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.
                  Refund dan Biaya Administrasi
                </li>
                <li>
                Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran sesuai dengan aturan refund/potongan/denda sekolah yang tercantum di surat penawaran sekolah (Offer Letter), serta pembebanan biaya administrasi sebesar AU$150.
                </li>
                <li>Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya jasa pengurusan, biaya pendaftaran sesuai dengan aturan refund/potongan/denda sekolah yang tercantum di surat penawaran sekolah (Offer Letter), serta pembebanan biaya administrasi sebesar AU$150. </li>
                <li>
                Saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk AUD harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.</li>
                <li>
                Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
                <li>
                Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.
              </li>
              </ol>



            </div>
            <div id="menu2" class="tab-pane fade  {{ $country == 'CAN' ? 'show active' : ''}}">
              <strong><h5>Visa Kanada</h5></strong>
              <ol>
                <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
                <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
                <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
                <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
                <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
                <li>
                Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk CAD harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah. </li>
                <li>
                Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar CA$187 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
                <li>

                Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
                <li>

                Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
              </ol>
            </div>
            <div id="menu3" class="tab-pane fade  {{ $country == 'SGP' ? 'show active' : ''}}">
              <strong><h5>Visa Singapura</h5></strong>
              <ol>
                <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
                <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
                <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
                <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
                <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
                <li>
                Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk SGD harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
                <li>
                Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar SG$200 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
                <li>

                Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
                <li>

                Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
              </ol>
            </div>
            <div id="menu4" class="tab-pane fade {{ $country == 'NZL' ? 'show active' : ''}}">
             <strong><h5>Visa Selandia Baru</h5></strong>
             <ol>
              <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
              <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
              <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
              <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
              <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
              <li>
              Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk NZD harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
              <li>
              Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar NZD$200 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
              <li>

              Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
              <li>

              Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
            </ol>
          </div>
          <div id="menu5" class="tab-pane fade {{ $country == 'MYS' ? 'show active' : ''}}">
           <strong><h5>Visa Malaysia</h5></strong>
           <ol>
            <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
            <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
            <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
            <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
            <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
            <li>
            Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk MYR harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
            <li>
            Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar RM600 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
            <li>

            Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
            <li>

            Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
          </ol>
        </div>
        <div id="menu7" class="tab-pane fade {{ $country == 'CHE' ? 'show active' : ''}}">
         <strong><h5>Visa Swiss</h5></strong>
         <ol>
          <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
          <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
          <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
          <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
          <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
          <li>
          Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk CHF harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
          <li>
          Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar CH$200 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
          <li>

          Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
          <li>

          Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
        </ol>
      </div>
      <div id="menu8" class="tab-pane fade {{ $country == 'KOR' ? 'show active' : ''}}">
       <strong><h5>Visa Korea Selatan</h5></strong>
       <ol>
        <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
        <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
        <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
        <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
        <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
        <li>
        Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk KRW harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
        <li>
        Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar KR₩170000 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
        <li>

        Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
        <li>

        Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
      </ol>
    </div>
    <div id="menu9" class="tab-pane fade ">
      <strong><h5>Visa Inggris</h5></strong>
      <ol>
        <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
        <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
        <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
        <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
        <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
        <li>
        Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk GBP harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
        <li>
        Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar GBP£120 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
        <li>

        Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
        <li>

        Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
      </ol>
    </div>
    <div id="menu10" class="tab-pane fade {{ $country == 'USA' ? 'show active' : ''}}">
      <strong><h5>Visa Amerika</h5></strong>
      <ol>
        <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
        <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
        <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
        <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
        <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
        <li>
        Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk USD harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
        <li>
        Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar USD200 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
        <li>

        Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
        <li>

        Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
      </ol>
    </div>
    <div id="menu11" class="tab-pane fade {{ $country == 'IRL' ? 'show active' : ''}}">
      <strong><h5>Visa Irlandia</h5></strong>
      <ol>
        <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
        <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
        <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
        <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
        <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
        <li>
        Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk Irish Pound harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
        <li>
        Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar IR£150 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
        <li>

        Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
        <li>

        Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
      </ol>
    </div>
    <div id="menu12" class="tab-pane fade {{ $country == 'IDN' ? 'show active' : ''}}">
      <strong><h5>Visa Indonesia</h5></strong>
      <ol>
        <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
        <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
        <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
        <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
        <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
        <li>
        Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk mata uang asing yang bersangkutan, maka harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak maka pengembalian uang diproses sesuai dengan metode pembayaran di awal. </li>
        <li>
        Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar Rp2000000 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
        <li>

        Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
        <li>

        Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
      </ol>
    </div>
    <div id="menu13" class="tab-pane fade">
      <strong><h5>Visa Perancis</h5></strong>
      <ol>
        <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
        <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
        <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
        <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
        <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
        <li>
        Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk CFP/Euro harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
        <li>
        Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar €125 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
        <li>

        Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
        <li>

        Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
      </ol>
    </div>
    <div id="menu14" class="tab-pane fade {{ $country == 'CHN' ? 'show active' : ''}}">
      <strong><h5>Visa China</h5></strong>
      <ol>
        <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
        <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
        <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
        <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
        <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
        <li>
        Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk Yuan harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
        <li>
        Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar ¥980 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
        <li>
        Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
        <li>

        Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
      </ol>
    </div>
    <div id="menu15" class="tab-pane fade ">
      <strong><h5>Visa Swedia</h5></strong>
      <ol>
        <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
        <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
        <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
        <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
        <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
        <li>
        Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk Krona harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
        <li>
        Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar Kr1300 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
        <li>

        Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
        <li>

        Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
      </ol>
    </div>
    <div id="menu16" class="tab-pane fade ">
      <strong><h5>Visa Belanda</h5></strong>
      <ol>
        <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
        <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
        <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
        <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
        <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
        <li>
        Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk Euro harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
        <li>
        Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar €125 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
        <li>

        Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
        <li>

        Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
      </ol>
    </div>
    <div id="menu17" class="tab-pane fade ">
      <strong><h5>Visa Spanyol</h5></strong>
      <ol>
        <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
        <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
        <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
        <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
        <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
        <li>
        Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk CFP/Euro harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
        <li>
        Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar €125 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
        <li>

        Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
        <li>

        Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
      </ol>
    </div>
    <div id="menu18" class="tab-pane fade ">
      <strong><h5>Visa Jepang</h5></strong>
      <ol>
        <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya  menerima resiko tersebut.</li>
        <li>Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.</li>
        <li>Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
        <li>Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Offer Letter). </li>
        <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.</li>
        <li>
        Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk Yen harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah.  </li>
        <li>
        Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar JP¥14655 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.</li>
        <li>

        Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan.</li>
        <li>

        Saya berjanji tidak akan melakukan postingan pencemaran dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.</li>
      </ol>
    </div>
    <div id="menu19" class="tab-pane fade {{ $country == 'TESTIMONY' ? 'show active' : ''}}">
      <strong><h5>Surat Pernyataan Testimoni</h5></strong>
      <ol>
        <li>Saya dengan sadar memberikan foto atau video testimoni atas pelayanan dan produk yang saya terima apabila diperlukan.</li>
        <li>
        Saya memberikan izin kepada pihak Best Partner untuk menggunakan video atau foto testimoni yang sudah saya buat untuk kebutuhan seperti akreditasi, promosi dan lainnya.</li>
        <li>
        Saya akan meminta izin dari Best Partner terlebih dahulu jika ingin mengambil foto atau video testimoni yang sudah dibuat.</li>
        <li>
          Saya dengan ini menyatakan keorisinilan dan ketepatan informasi yang saya berikan dalam video atau foto testimoni yang saya buat.
        </li>
        <li>
          Saya tidak akan menuntut hal-hal materil, hak cipta ataupun royalti kepada pihak Best Partner atas foto atau video testimoni yang dipergunakan untuk kepentingan komersil Best Partner.
        </li>
      </ol>
    </div>   
    <div id="menu20" class="tab-pane fade {{ $country == 'DEU' ? 'show active' : ''}}">
      <strong><h5>Visa Jerman</h5></strong>
      <div>Menyatakan bahwa saya setuju dengan aturan yang berlaku di Best Partner yakni :</div>
      <ol>
        <li>Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya menerima resiko tersebut.</li>
        <li>
        Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner</li>
        <li>
        Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.</li>
        <li>
          Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Letter of Acceptance). 
        </li>
        <li>
          <li>Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.
          </li>
          <li>
            Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk Yen harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah
          </li>
          <li>
            Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar €120 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.
          </li>
          <li>
            Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan
          </li>
          <li>
            Saya berjanji tidak akan melakukan postingan dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.
          </li>
        </li>
      </ol>
    </div>   
    <div id="menu20" class="tab-pane fade {{ $country == 'BRN' ? 'show active' : ''}}">

      <strong><h5>VISA BRUNEI DARUSSALAM</h5></strong>
      <div>
        Menyatakan bahwa saya setuju dengan aturan yang berlaku di Best Partner yakni :
      </div>
      <ol>
        <li> Jika dokumen yang saya serahkan adalah palsu yang mengakibatkan kerugian pada diri saya sendiri, saya menerima resiko tersebut.
        </li><li> Saya menyetujui biaya yang telah diterangkan oleh pihak Best Partner.
        </li><li> Saya menyetujui bahwa saya harus meminta izin terlebih dahulu kepada Best Partner jika ingin meminta dokumen apapun dari Best Partner yang berhubungan dengan pengajuan aplikasi visa saya.
        </li><li> Jika saya membatalkan proses aplikasi setelah pengajuan visa atau terjadi penolakan visa dari pihak kedutaan, maka saya menyetujui biaya yang tidak akan dikembalikan adalah biaya visa dan jasa pengurusan, serta biaya pendaftaran, aturan refund/potongan/denda sekolah sesuai dengan yang tercantum di surat penawaran sekolah (Letter of Acceptance). 
        </li><li> Saya menyetujui apabila terdapat kekurangan pembayaran biaya apapun yang termasuk dalam proses aplikasi visa saya, maka saya tidak dapat/tidak berhak/tidak memiliki wewenang untuk meminta dokumen aplikasi visa saya.
        </li><li> Jika terjadi penolakan visa, saya menerima pengembalian uang sesuai harga kurs berjalan dan berhak menerima refund setelah 28 hari kerja. Bila ada permintaan refund dalam bentuk Yen harus diinfokan terlebih dahulu pada pihak Best Partner. Jika tidak ada permintaan maka Pihak Best Partner akan mengembalikan dalam bentuk Rupiah
        </li><li> Jika saya membatalkan proses aplikasi sekolah sebelum pengajuan visa, maka saya setuju untuk dikenakan potongan biaya administrasi sebesar ‎B$190 dan mengikuti poin nomor 4 sesuai dengan biaya yang dibebankan oleh sekolah.
        </li><li> Saya menyetujui untuk menanggung beban administrasi/biaya layanan remittance/biaya valas pengiriman uang yang berhubungan dengan aplikasi saya apabila sewaktu-waktu diperlukan
        </li><li> Saya berjanji tidak akan melakukan postingan dalam bentuk apapun di sosial media yang berkaitan dengan Best Partner. Saya bersedia di proses secara hukum jika terbukti melakukan pencemaran dalam bentuk apapun.
        </li>
      </ol>
    </div> 
  </div> 
  <div class="col-md-12" style="text-align:center""> <a class="btn btn-primary" style="width:100px;padding:10px;margin-top:15px;" href="{{URL::Previous()}}">
  Back </a> </div>

</div>
</div>
</div> 
</div> 
</div> 
</div> 
@stop
