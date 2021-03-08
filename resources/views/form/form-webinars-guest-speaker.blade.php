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
                        <form class="" id="myform" name="myform" action="{{url('form-webinars-guest-speaker')}}"
                        enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="row form-group">
                            <div class="col-md-12 text-center">

                                <h2>DATA INFORMATION</h2>
                                <p>Please fill the Information requested below, so we can easily recognize you far before the webinars day</p>

                            </div>

                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Full Name*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="full_name" required placeholder=""
                                value="">
                                <div style="font-size:13px;">Your full as used in institution. Please do write your Academic Degree / title</div>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Position*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="position" required placeholder=""
                                value="">
                                <div style="font-size:13px;">Your full as used in institution. </div>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Location </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="location">
                                <div style="font-size:13px;">Please do state the location / branch of the institution if there is any some position as you in different States / Country.</div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-md-3 col-form-label">Email*</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email" required placeholder=""
                                value="">
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Website*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="website" required>
                            </div>
                        </div>
                        <div class="row form-group">

                            <label for="" class="col-md-3 col-form-label">Photograph*</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="photograph">
                                <div style="font-size:13px;">Please do upload your photo here Max.5 MB</div>
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
