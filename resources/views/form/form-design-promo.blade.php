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
                        <form class="" id="myform" name="myform" action="{{url('form-design-promo')}}"
                        enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="row form-group">
                            <div class="col-md-12 text-center">

                                <h2>Form Design Promo</h2>

                            </div>

                        </div>
                         <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Nama Sekolah</label>
                            <div class="col-md-9">
                                <textarea rows="3" class="form-control" name="nama_sekolah" required placeholder=""
                                value=""></textarea>
                            </div>
                        </div>
                         <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Website Sekolah</label>
                            <div class="col-md-9">
                                <textarea rows="3" required class="form-control" name="website_sekolah" placeholder=""
                                value=""></textarea>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Promo</label>
                            <div class="col-md-9">
                                <textarea rows="3" class="form-control" name="promo" required placeholder=""
                                value=""></textarea>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Tanggal Promosi</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="tanggal_promosi" placeholder=""
                                value=""></textarea>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Syarat Promosi</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="syarat_promosi"  placeholder=""
                                value=""></textarea>
                             
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
