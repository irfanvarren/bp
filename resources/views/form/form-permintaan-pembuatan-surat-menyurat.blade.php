@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style type="text/css">
    :not(input):not(textarea){
        -webkit-user-select:auto !important;
-webkit-touch-callout: auto !important;
    }
</style>
@endpush
@section('content')
<div class="col-md-12 content-wrapper">
    @if(session()->has('message'))
    <div class="alert alert-success" style="text-align:center">
        {!! session()->get('message') !!} <br>

        <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
    </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <div class="col-md-12 card">
                    <div class=" card-body">
                        <form class="" id="myform" name="myform" action="{{url('form-permintaan-pembuatan-surat-menyurat')}}"
                        enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="row form-group">
                            <div class="col-md-12 text-center">

                                <h2>Form Permintaan Pembuatan Surat Menyurat</h2>
                                <h4>Isi dengan tanda strip (-) jika tidak tahu</h4>
                            </div>

                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 ">Jenis Surat Menyurat</label>
                            <div class="col-md-9">
                                <div class="form-check form-check-inline">
                                   <input type="radio" name="jenis_surat_menyurat" class="form-check-input" value="Proposal" required>  <label class="form-check-label">Proposal</label>     
                               </div>
                               <div class="form-check form-check-inline">
                                   <input type="radio" name="jenis_surat_menyurat" class="form-check-input" value="Surat" required>  <label class="form-check-label">Surat</label>     
                               </div>

                               <div class="form-check form-check-inline">
                                   <input type="radio" name="jenis_surat_menyurat" class="form-check-input" value="MoU dan MoA" required>  <label class="form-check-label">MoU dan MoA</label>     
                               </div>
                               <div>
                                   Cth. Surat Pengantar, Surat keterangan, MoU, atau MoA dll 
                               </div>

                           </div>
                       </div>
                       <div class="row form-group">

                        <label for="" class="col-md-3 col-form-label">Keterangan Surat Menyurat Lainnya</label>
                        <div class="col-md-9">
                            <textarea rows="3" required class="form-control" name="keterangan_surat_lainnya" placeholder=""
                            value=""></textarea>
                        </div>
                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-3 col-form-label">Latar Belakang Kerjasama</label>
                        <div class="col-md-9">
                            <textarea rows="3" class="form-control" name="latar_belakang_kerjasama" required placeholder=""
                            value=""></textarea>
                            <div>Khusus Proposal, MoU dan MoA. Berisi latar belakang singkat hal yang menjadi alasan pengajuan kerjasama. <br>
                                Cth. Sehubungan dengan Pandemi Covid-19 maka Simulasi Online akan mempermudah pengambilan test, Saling membantu penjualan produk atau memasarkan produk antar LKP dalam upaya menghindari persaingan antar LKP
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-3 col-form-label">Produk yang ditawarkan</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="produk_yang_ditawarkan" placeholder=""
                            value="" required></textarea>
                            <div>Produk-produk yang ditawarkan oleh Best Partner</div>
                        </div>
                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-3 col-form-label">Jenis Penawaran</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="jenis_penawaran"  placeholder=""
                            value="" required></textarea>
                            <div>Jenis penawaran produk, service, harga special, atau keunggulan lain yang BP akan berikan untuk Instansi kerjasama  </div>
                        </div>
                    </div>  
                     <div class="row form-group">

                        <label for="" class="col-md-3 col-form-label">Deadline</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="deadline"  placeholder=""
                            value="" required>
                        </div>
                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-3 col-form-label">PIC</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="PIC"  placeholder=""
                            value="" required>
                        </div>
                    </div>  
                    <div class="row form-group">

                            <label for="" class="col-md-3 ">Keterangan Hasil File yang Diminta</label>
                            <div class="col-md-9">
                                <div class="form-check form-check-inline">
                                   <input type="radio" name="hasil_file_yang_diminta" class="form-check-input" value="Soft File" required>  <label class="form-check-label">Soft File</label>     
                               </div>
                               <div class="form-check form-check-inline">
                                   <input type="radio" name="hasil_file_yang_diminta" class="form-check-input" value="Printed" required>  <label class="form-check-label">Printed</label>     
                               </div>

                               <div class="form-check form-check-inline">
                                   <input type="radio" name="hasil_file_yang_diminta" class="form-check-input" value="Soft File & Printed" required>  <label class="form-check-label">Both</label>     
                               </div>

                           </div>
                       </div>  
                       <div class="row form-group">
                           <div class="col-md-12 text-center">
                               <h2>Informasi Instansi</h2>
                           </div>
                       </div>
                       <div class="row form-group">

                        <label for="" class="col-md-3 col-form-label">Nama Instansi</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nama_instansi"  placeholder="" value="" required>
                        </div>
                    </div> 
                    <div class="row form-group">

                        <label for="" class="col-md-3 col-form-label">Alamat Lengkap Instansi</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="alamat_lengkap_instansi"  placeholder="" value="" required>
                        </div>
                    </div> 
                    <div class="row form-group">

                        <label for="" class="col-md-3 col-form-label">Nama Kepala / Direktur / Penanggung jawab instansi</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nama_penanggung_jawab" placeholder="khusus untuk MoU dan MoA" value="" required>
                        </div>
                    </div>  
                    <div class="row form-group">

                        <label for="" class="col-md-3 col-form-label">Durasi Kerjasama</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="durasi_kejasama"  placeholder="khusus untuk MoU dan MoA"
                            value="" required>
                        </div>
                    </div>
                    <div class="row form-group">

                        <label for="" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email_instansi"  placeholder="" value="" required>
                        </div>
                    </div>  
                    <div class="row form-group">

                        <label for="" class="col-md-3 col-form-label">Note Tambahan</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="note_tambahan"  placeholder=""
                            value="" required></textarea>
                        </div>
                    </div> 
                    <div class="col-md-12 text-right">
                        <button type="submit" name="" id="submit" value="Submit"
                        class="btn btn-primary" >Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">

    function close_alert() {
        $('.alert').hide();
    }

</script>
@stop
