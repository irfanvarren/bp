@extends('layouts.bp_wo_sidenav')
<style media="screen">
ol,ul{
  list-style-position:outside;
  padding:0 18px;
}
ol li,ul li{
  padding-bottom:7px;
}
h5{margin-bottom:7px;}
table,td{
  border:1px solid black;
}
table{
  border-collapse: collapse;}
  td{
    padding:8px;
  }
</style>
@section('content')
<div class="col-md-12 content-wrapper">
<div class="col-md-12">
  <div class="row">
    <div class="col-md-12">
      <h2>Cara Mengajukan Claim Asuransi :</h2>
      Cara mendaftarkan Polis di aplikasi
      <ol>
      <li>Download app NIB di IOS store atau Google Play</li>
      <li>Pilih <strong>Register</strong> untuk mendaftar sebagai pengguna baru di NIB</li>
      <li>Masukkan nomor <strong>Policy Number</strong> NIB</li>
      <li>Aplikasi akan mengirimkan kode verifikasi ke alamat email yang terdaftar sewaktu memberi asuransi</li>
      <li>Masukkan kode verifikasinya </li>
      <li>Setelah verifikasi, silahkan isi kolom <strong>Nama, Tanggal Lahir, Email.</strong></li>
      <li>Masukkan password yang akan digunakan untuk menjalankan aplikasi ( <strong>mohon dicatat supaya tidak kehilangan akun</strong> ) </li>
      <li>Jika register berhasil akan muncul tampilan “You have successfully registered for Online Services”</li>
      <li>Atur 4 digit pin untuk mengamankan aplikasi di HP</li>
      <li> <strong>Harap menginfokan ke agent setelah pembuatan akun NIB supaya agent dapat mengarsipkan data jika sewaktu-waktu terjadi kehilangan data atau error.</strong> </li>
      </ol>

    </div><!--
    <div class="col-md-6">

    </div>-->
  </div>
  </div>
<div class="col-md-12">
  <h5>Cara Claim Asuransi
  </h5>
<ol>
<li>Masuk pada bagian Log In</li>
<li>Masukkan nomor Policy Number dan Password</li>
<li>Di bagian beranda akan muncul tampilan
  <table>
    <tr>
      <td>Find a provider</td> <td>Claim now</td> <td>My usage</td>
    </tr>
  </table>
</li>
<li>Pilih menu Claim Now</li>
<li>Registrasikan bank account yang aktif terlebih dahulu untuk menerima jumlah claim dari bagian asuransi “How nib Pays My Claims”</li>
<li>Setelah berhasil menginput data rekening, tampilan akan kembali di bagian claim now</li>
<li>Silahkan sediakan terlebih dahulu receipt yang diterima untuk berobat baik berupa file JPEG ataupun foto manual.</li>
<li>Pastikan gambar terlampir jelas kemudian upload keseluruhan lembar receipt berobat di bagian make a claim.</li>
<li>Silahkan pilih option ‘yes’ pada kolom pernyataan “Is this claim related to workplace injury, legal actions, international care or some other third party insurance?”</li>
<li>Kemudian submit</li>
</ol>
<br>
</div>
<div class="col-md-12">
  <h5>Note</h5>
<ol>
<li>Perlu diperhatikan bahwa proses claim biaya berobat memerlukan proses dua minggu</li>
<li>Wajib melakukan klaim dalam jangka waktu max dua tahun setelah resi diterbitkan oleh pihak rumah sakit. Lebih dari dua tahun, claim tidak dapat diproses.</li>
</ol>
</div>
</div>
@stop
