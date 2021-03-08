@extends('layouts.bp_wo_sidenav')
<style media="screen">
  .m1 {
    margin-bottom: 1rem;
  }
  .colon{
    float:right;
  }
  ul,ol{
    padding:0 15px;
  }
  #prevBtn {
    background-color: #bbbbbb;
  }
  .form-tab{
    display: none;
  }
  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;  
    border-radius: 50%;
    display: inline-block !important;
    opacity: 0.5;
  }

  .step.active {
    opacity: 1;
  }
  .form-wrapper{
    padding:60px 80px;
  }

  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #4CAF50;
  }
  @media screen and (max-width:480px){
    .colon{
      float:none;
    }
    .form-wrapper{
      padding-top:30px;
      padding:15px;
    }
  }

</style>
@section('content')

<div class="col-md-12 content-wrapper" style="padding-top:0;">
  @if(session()->has('message'))
  <div class="alert alert-success" style="text-align:center">
    {!! session()->get('message') !!} <br>

    <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
  </div>
  @endif

  <!-- One "tab" for each step in the form: -->
  <div class="col-md-12 form-wrapper">
   <div class="col-md-12" style="background:white;padding:30px;">

     <form class="" action="{{url('fma/registration')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-tab">
        <div class="text-center"><strong>
          KEMITRAAN FMA 
        </strong></div><br>
        <p>
          BP education adalah lembaga pelatihan & kursus sekaligus agensi pendidikan dalam dan luar negeri. Memiliki lebih dari 50 jenis produk dan 400+ listing sekolah Dalam Negeri & Luar Negeri yang memiliki partnership dengan kami. 
          Pendidikan itu sangat penting di era saat ini khususnya Bahasa Asing. Di era globalisasi seperti saat ini, memiliki kemampuan berbahasa yang fasih khususnya Bahasa Inggris dan Mandarin menjadi sangat penting.
          Saat ini BP Education mencari mitra marketing di 34 Provinsi untuk bekerja sama. Jadilah salah satu pelopor pembangunan SDM bangsa dengan memberikan konsultasi yang berguna untuk membangun SDM.
        </p>

        <p>Informasi lebih lengkap, silahkan hubungi :
          Gerald : +62 895 1513 9224
        </p>
      </div>
      <div class="form-tab">
        <div class="text-center"><strong>  Tugas dan Tanggung jawab MITRA </strong></div><br>

        <p>
          <strong>Terhadap Perusahaan </strong>
          <ol>
            <li>Menjaga kerahasian strategi perusahaan</li>
            <li>Memposting semua informasi produk, layanan, promo terbaru di platform social media dan mengikuti arahan promosi dari kantor pusat BP Edu</li>
            <li>Waspada terhadap kompetitor yang menjual produk sejenis yang menjelek jelekkan produk BP Edu</li>
            <li>Mengikuti semua training yang diatur oleh kantor pusat </li>
            <li>Tidak ragu untuk membela kepentingan bersama BP Edu karena kita berada dalam organisasi dan memegang bendera yang sama.</li>
          </ol>
        </p>

        <p>
          <div><strong>Terhadap Sesama Mitra</strong></div>
          <ol>
            <li>Boleh merekrut anggota ketika sudah mencapai karir sebagai Senior Master Marketing</li>
            <li>Tidak menjelek jelekkan antar sesama anggota mitra FMA BP Edu</li>
            <li>Tidak merebut konsumen yang sudah di closing oleh anggota Mitra FMA BP Edu lainnya. Namun jika konsumen ingin mengambil produk lainnya yang belum di closing anggota lainnya, diperbolehkan.</li>
          </ol>
        </p>

        <p>
          <div><strong>Terhadap Klien</strong></div>
          <ol>
            <li>Menghormati dan menjaga privasi klien.</li>
            <li>Memberikan informasi  dan benefit produk dengan benar dan jelas </li>
            <li>Meng-Update kemajuan pendaftaran/pembelian produk yang direncanakan oleh klien</li>
            <li>Memberikan informasi retensi produk setelah klien menyelesaikan pelatihan</li>
            <li>Memberikan pelayanan konsultasi dengan baik terhadap klien</li>
          </ol>
        </p>
      </div>
      <div class="form-tab">
        <div class="text-center"><strong> ATURAN-ATURAN KEMITRAAN </strong></div> <br>

        <p>
          <strong>Aturan Terhadap Perusahaan</strong>
          <ol>
            <li>Mitra FMA dilarang mencetak/membuat atribut promosi sendiri baik hardcopy maupun softcopy.</li>
            <li>Mitra FMA dilarang melakukan tindakan yang merugikan perusahaan BP Edu dan jika terbukti maka akan dikenakan sanksi dan dikeluarkan dari keanggotaan mitra .</li>
            <li>Agen dilarang keras menjelek-jelekan perusahaan lain.</li>
            <li>Agen dilarang menerima uang dari klien ke rekening milik pribadi. Semua pembayaran klien wajib dikirim oleh konsumen ke rekenig resmi perusahaan.</li>
            <li>Agen dilarang melakukan pekerjaan sejenis selama menjadi Mitra FMA</li>
            <li>Bonus akan di cairkan tanggal 1 tiap bulan.</li>
            <li>Bonus yang diterima berdasarkan omset yang di capai dengan kalkulasi perhitungan yang sudah di beritahukan sebelum menjadi anggota</li>
            <li>Pembatalan pembelian produk oleh Klien akan mengurangi omset. Contoh : Klien yang harusnya membayar 2,000,000 kemudian membatalkan pembayaran dan meminta refund. Sehingga omset mitra juga akan berkurang 2,000,000.</li>
          </ol> 
        </p>
        <p>
          <strong>Aturan Sesama Anggota Mitra FMA</strong>
          <ol>
            <li>Agen diperbolehkan untuk mendaftarkan klien yang belum melakukan pembayaran Uang Muka/ Down Payment ke kantor pusat, tetapi setelah 3 bulan tanpa progress maka secara otomatis klien dinyatakan bebas dari FMA yang mendaftarkannya ke system pendaftaran konsumen BP.</li>
            <li>Agen yang sudah meminta klien untuk membayar DP sebesar 20% dari harga produk yang dipilih klien, maka klien itu secara system akan terus menjadi klien dari agen tersebut tanpa batas waktu atau dengan kata lain menjadi klien dari agen itu selamanya. Namun jika konsumen itu sudah menyelesaikan produk yang dia ambil maka konsumen itu menjadi klien bebas yang artinya boleh di prospek oleh agen BP lainnya.</li>
          </ol>
        </p>
      </div>
      <div class="form-tab">
       <div class="text-center"><strong> SKEMA PERHITUNGAN BONUS PRODUK PELATIHAN </strong></div> <br>

       <div>Menjadi MITRA BP Edu kami punya beberapa daftar skema karena memiliki produk yang berbeda.</div>
       <p>
        <ol>

          <li>Bonus untuk semua produk kursus di BP sebesar 5% dari hasil closingan</li>
          <li>Wajib bergabung di komunitas sales di grup telegram BP. Link terlampir : https://t.me/joinchat/M6TOeRjujXC01iYtzDefHw</li>
          <li>Bonus IELTS senilai Idr 20,000</li>
          <li>Bonus TOEFL ITP senilai Idr 20,000</li>
          <li>Bonus Pearson test senilai Idr 100,000</li>
          <li>Bonus untuk pengurusan visa pelajar ke luar negeri up to IDR 5,000,000. File pdf daftar bonus akan dikirimkan jika sudah officially bergabung.</li>
          
        </ol>
      </p>
      <p>
        <p>
          Di bawah tabel pencapaian FMA:
        </p>
        <table class="table table-bordered">
          <colgroup>
            <col style="width:30%;">
            <col>
            <col>
          </colgroup>
          <tr>
            <td>POINT</td><td>Jenjang Karir</td><td>Performance Awards</td>
          </tr>
   
          <tr>
            <td>0 - 100</td><td>Freelancer</td><td>Rp 50.0000</td>
          </tr>
          <tr>
            <td>101 - 200</td><td>Freelancer</td><td>Rp 100.000</td>
          </tr>
          <tr>
            <td>Min 500</td><td>Master Marketing</td><td>Rp 2.000.000</td>
          </tr>
          <tr>
            <td>Min 750</td><td>Master Marketing</td><td>Rp 2.000.000</td>
          </tr>
           <tr>
            <td>1000</td><td>Senior Master Marketing</td><td>Rp. 2.000.000</td>
          </tr>
        </table>
        <div>Skema marketing berlaku hingga 31 Mei 2021</div>
      </p>
    </div>
    <div class="form-tab">  
      <div class="col-md-12">

        <h2 style="text-align:center;margin-bottom:10px;">Pendaftaran FMA</h2> <br>
        <div class="col-md-12" style="font-size:18px;">
         

          <div class="row">

            <div class="col-md-3 m1">
              Nama* <span class="colon">:</span>
            </div>
            <div class="col-md-9 m1">
              <div class="row">
                <p class="col-md-6">
                  <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" value="" required>
                </p>
                <p class="col-md-6">
                  <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" value="" required>
                </p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 n1">
              Tanggal Lahir* <span class="colon">:</span>
            </div>
            <div class="col-md-9 m1">
              <div class="row">
                <div class="col-md-4">

                  <input type="text" class="form-control" name="tanggal_lahir" pattern="[0-9]{2}" placeholder="Tanggal (dd)" value="" required>
                </div>
                <div class="col-md-4">

                  <select class="form-control" name="bulan_lahir" required>
                    <option value="">Bulan (mm)</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>


                  </select>

                </div>
                <div class="col-md-4">
                  <input type="text" class="form-control " name="tahun_lahir" placeholder="Tahun (yyyy)" pattern="[0-9]{4}" value="" required>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="m1 col-md-3">
              No. KTP (Khusus Yang Sekarang Tinggal di Indonesia) <span class="colon">:</span>
            </div>
            <div class="m1 col-md-9">
              <input type="text" class="form-control" name="no_ktp" placeholder="No. KTP" value="">
            </div>
          </div>
          <div class="row">
            <div class="m1 col-md-3">
              No. Paspor (Khusus Yang Tinggal di Luar Indonesia) <span class="colon">:</span>
            </div>
            <div class="m1 col-md-9">
              <input type="text" class="form-control" placeholder="No. Paspor" name="no_paspor" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 m1">
              Alamat Sekarang* <span class="colon">:</span>
            </div>
            <div class="col-md-9 m1">
              <div class="row">
                <div class="col-md-8">
                  <textarea name="alamat_sekarang" class="form-control" rows="2" placeholder="Alamat Tinggal Saat ini..." required></textarea>
                </div>
                <div class="col-md-4">
                  <input type="text" name="kota_sekarang" class="form-control" placeholder="Kota / Kabupaten" value="" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 m1">
              Alamat KTP* <span class="colon">:</span>
            </div>
            <div class="col-md-9 m1">
              <div class="row">
                <div class="col-md-8">
                  <textarea name="alamat_ktp" class="form-control" rows="2" placeholder="Alamat Yang Tertera di KTP..." required></textarea>
                </div>
                <div class="col-md-4">
                  <input type="text" name="kota_ktp" class="form-control" placeholder="Kota / Kabupaten" value="" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 m1">
              No. HP* <span class="colon">:</span>
            </div>
            <div class="col-md-9 m1">
              <input type="text" name="no_telepon" class="form-control" placeholder="No. HP" value="" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 m1">
              Email* <span class="colon">:</span>
            </div>
            <div class="col-md-9 m1">
              <input type="text" name="email" class="form-control" placeholder="Email..." value="" required>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-3 m1">
              Nama Upline* <span class="colon">:</span>
            </div>
            <div class="col-md-9 m1">
              <input type="text" class="form-control" name="nama_upline" required placeholder="Nama Upline" value="">
            </div>
          </div>
          <div class="row form-group" style="margin-bottom:25px">
            <div class="col-md-3">
              Kode Referral* <span class="colon">:</span>
            </div>
            <div class="col-md-9">
              <input type="text" name="kode_referral" required placeholder="Kode Referral" class="form-control" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 m1">
              Foto KTP <span class="colon">:</span>
            </div>
            <div class="col-md-9 m1">
              <input type="file" class="form-control-file" name="myfiles[]" value="" >
              <span>Max Size: 1Mb</span>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3 m1">
              Foto Paspor <span class="colon">:</span>
            </div>
            <div class="col-md-9 m1">
              <div class="form-group">
                <input type="file" class="form-control-file" name="myfiles[]" value="">
                <span>Max Size: 1Mb</span>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12"><h3 style="text-align:center">INFORMASI AKUN / REKENING TABUNGAN</h3></div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <h3> <strong> INDONESIA</strong> </h3>
            </div>
            <div class="col-md-3">
              Nama Bank <span class="colon">:</span>
            </div>
            <div class="col-md-9">
              <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" >
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-3">
              Nama Akun Bank <span class="colon">:</span>
            </div>
            <div class="col-md-9">
              <input type="text" name="nama_akun_bank" class="form-control" placeholder="Nama Akun Bank">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-3">
              Nomor Rekening <span class="colon">:</span>
            </div>
            <div class="col-md-9">
              <input type="text" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening">
            </div>
            <div class="col-md-12">
              <span>*Silahkan kosongkan kolom diatas jika anda tidak tahu*</span>
            </div>
          </div>
          <div class="row form-group">
           <div class="col-md-12">
            <h3> <strong> AUSTRALIA </strong> </h3>
          </div>
          <div class="col-md-3">
           Nama Bank <span class="colon">:</span>
         </div>
         <div class="col-md-9">
           <input type="text" name="nama_bank_australia" class="form-control" placeholder="Nama Bank">
         </div>
       </div>
       <div class="row form-group">
         <div class="col-md-3">
           Nama Akun Bank <span class="colon">:</span>
         </div>
         <div class="col-md-9">
           <input type="text" name="nama_akun_bank_australia" class="form-control" placeholder="Nama Akun Bank">
         </div>
       </div>
       <div class="form-group row">
         <div class="col-md-3">
           Nomor Rekening <span class="colon">:</span>
         </div>
         <div class="col-md-9">
           <input type="text" name="nomor_rekening_australia" class="form-control" placeholder="Nomor Rekening" >
         </div>
       </div>
       <div class="form-group row">
         <div class="col-md-3">
           BSB <span class="colon">:</span>
         </div>
         <div class="col-md-9">
           <input type="text" name="nama_bsb" class="form-control" placeholder="BSB">
         </div>
       </div>
       <div class="row form-group">
        <div class="col-md-3">
          Swift Code <span class="colon">:</span>
        </div>
        <div class="col-md-9">
          <input type="text" name="swift_code" class="form-control" placeholder="Swift Code" >
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          Nama Cabang <span class="colon">:</span>
        </div>
        <div class="col-md-9">
          <input type="text" name="nama_cabang" class="form-control" placeholder="Nama Cabang">
        </div>
        <div class="col-md-12">
          <span>*Silahkan kosongkan kolom diatas jika anda tidak tahu*</span>
        </div>
      </div>
      <input type="checkbox" name="agree" id="agree" value="" checked> Saya Menyetujui <a href="{{url('/fma/term-condition')}}"> Syarat & Ketentuan </a> <br> <br>
      

      
    </div>
  </div>
</div>

<div class="col-md-12">
  <div style="float:right;">
    <button type="button" id="prevBtn" class="btn btn-primary" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" class="btn btn-secondary" onclick="nextPrev(1)">Next</button>
    <button type="submit" name="" id="submit" value="Submit" class="btn btn-primary">Submit</button>
  </div>
</div>
<!-- Circles which indicates the steps of the form: -->
<div class="col-md-12" style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

</div>
</div>

</form>
</div>
<script type="text/javascript">
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("form-tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").style.display = "none";
    document.getElementById("submit").style.display ="inline";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
    document.getElementById("nextBtn").style.display = "inline";
    document.getElementById("submit").style.display ="none";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("form-tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("form-tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

document.getElementById('agree').addEventListener('change',function(){

  if(this.checked){
    document.getElementById('submit').disabled = false;
  }else{

    document.getElementById('submit').disabled = true;
  }
});
</script>
@stop
