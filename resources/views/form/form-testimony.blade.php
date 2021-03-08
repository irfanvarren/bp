@extends('layouts.bp_wo_sidenav')
@section('content')
<div class="col-md-12 content-wrapper">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-5">
              @if(session()->has('message'))
              <div class="alert alert-success" style="text-align:center">
                {!! session()->get('message') !!} <br>

                <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
              </div>
              @endif
              <form class="" action="form-testimony" enctype="multipart/form-data" method="post">
                @csrf
            <div class="card">
                <div class="card-body">
                  <div class="form-group row">
                    <h3 class="col-md-12" style="text-align:center;">Testimony</h3>

                  </div>
                    <div class="form-group row">
                        <label class="col-md-12">Foto :</label>
                        <div class="col-md-12">
                        <input type="file" name="foto"></div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-md-12">Nama Lengkap* :</label>
                      <div class="col-md-12">
                        <input type="text" name="name" class="form-control" required value="">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-12">Testimony* :</label>
                        <div class="col-md-12">
                            <textarea name="testimony" required placeholder="Testimony..." rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">

                          <input type="submit" name="" class="btn btn-primary" style="float:right;" required value="Submit">
                      </div>
                    </div>
                </div>
            </div>

                          </form>
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
