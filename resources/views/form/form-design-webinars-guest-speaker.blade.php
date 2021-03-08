@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
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
                        <form class="" id="myform" name="myform" action="{{url('form-design-webinars-guest-speaker')}}"
                        enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="row form-group">
                            <div class="col-md-12 text-center">

                                <h2>DATA INFORMATION</h2>

                            </div>

                        </div>
                         <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Desain Dibuat Untuk</label>
                            <div class="col-md-9">
                                <textarea rows="3" class="form-control" name="desain_dibuat_untuk" required placeholder=""
                                value=""></textarea>
                            </div>
                        </div>
                         <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Judul Kegiatan</label>
                            <div class="col-md-9">
                                <textarea rows="3" required class="form-control" name="judul_kegiatan" placeholder=""
                                value=""></textarea>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Nama Lengkap Speaker</label>
                            <div class="col-md-9">
                                <textarea rows="3" class="form-control" name="nama_lengkap_speaker" required placeholder=""
                                value=""></textarea>
                                <div style="font-size:13px;">Mohon tuliskan Gelar Akademik jika ada</div>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Jabatan Speaker</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="jabatan_speaker" placeholder=""
                                value=""></textarea>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Prestasi Speaker</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="prestasi_speaker"  placeholder=""
                                value=""></textarea>
                             
                            </div>
                        </div>
                         <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Nama Lengkap Moderator</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="nama_lengkap_moderator"  placeholder=""
                                value=""></textarea>
                             
                            </div>
                        </div>
                         <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Jabatan Moderator</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="jabatan_moderator"  placeholder=""
                                value=""></textarea>
                             
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Prestasi Moderator</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="prestasi_moderator"  placeholder=""
                                value=""></textarea>
                             
                            </div>
                        </div>
                         <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Hari / Tanggal Webinar</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="hari_atau_tanggal_webinar"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Jam Webinar</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="jam_webinar"></textarea>
                            </div>
                        </div>
                          <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Platform Kegiatan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="platform_kegiatan"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Link Website / Guest Book </label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="link_website_atau_guest_book" ></textarea>
                
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Halaman Website Institusi</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="halaman_website_institusi" required></textarea>
                                <div style="font-size:13px;">Mohon untuk mencantumkan halaman website institusi.</div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-3 col-form-label">Level Sekolah</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="level_sekolah" placeholder=""
                                value=""></textarea>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Jurusan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="jurusan" ></textarea>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">SPP Sekolah</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="spp_sekolah"></textarea>
                            </div>
                        </div>
                       

                        <div class="row form-group">
                            <div class="col-md-12 text-center"> <br><h5>Required Documents to Upload</h5></div>
                            <label for="" class="col-md-3 col-form-label">Photograph</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="photograph">
                                 <div>Harap upload foto tamu disini</div>
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
