@extends('layouts.bp_wo_sidenav')
<style media="screen">
ol,ul{
  list-style-position:outside;
  padding:0 18px;
}
ol li,ul li{
  padding-bottom:7px;
}
</style>
@section('content')
<div class="col-md-12 content-wrapper">
  <div class="col-md-12">
    <h3>
  Aturan perekrutan klien yang harus di patuhi oleh FMA BP
  </h3>
  <ol>

<li>Agen diperbolehkan untuk mendaftarkan klien yang belum Down Payment ke kantor pusat tetapi klien itu setelah 3 bulan secara otomatis lepas dari system dan dinyatakan bebas dari FMA yang mendaftarkannya ke system pendaftaran konsumen BP.</li>
<li>Agen yang sudah meminta klien untuk membayar DP sebesar 20% dari harga produk yang dipilih klien, maka klien itu secara system akan terus menjadi klien dari agen tersebut tanpa batas waktu atau dengan kata lain menjadi klien dari agen itu selamanya. Namun jika konsumen itu sudah menyelesaikan produk yang dia ambil maka konsumen itu menjadi klien bebas yang artinya boleh di prospek oleh agen BP lainnya.</li>
<li>Agen dilarang mencetak/membuat atribut promosi sendiri baik hardcopy maupun softcopy.</li>
<li>Agen dilarang keras menjelek-jelekan perusahaan lain.</li>
<li>Agen dilarang melakukan tindakan yang merugikan perusahaan dan jika terbukti maka agen pecat secara tidak terhormat dan semua bonus tidak akan di bayarkan kepada agen tersebut.</li>
<li>Agen dilarang menerima uang dari klien ke rekening milik pribadi. Semua pembayaran klien wajib dikirim oleh konsumen ke rekenig resmi perusahaan.</li>
<li>Agen wajib memberitahukan benefit setiap produk yang dijual dengan benar.</li>
    </ol>
    <a href="{{URL::previous()}}">Kembali ke halaman sebelumnya</a>
  </div>
</div>
@stop
