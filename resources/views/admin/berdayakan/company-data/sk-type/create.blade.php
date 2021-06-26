@extends('layouts.app-auth', ['activePage' => 'sk-types', 'titlePage' => __('Jenis SK'),'activeMenu' => 'company-data'])
@push('head-js')
<style type="text/css">
  .icon-preview{
    display: block;float:left;width: 80px;text-align:center;margin: 12px;padding:8px;
  }
  .icon-preview:hover{
    cursor:pointer;
    background:#3f75cc;
    color:white;
  }
  .icon-preview.active{
    background:#3f75cc; 
    color:white;
  }
  .icon-preview i{
    font-size:38px;width: 38px;line-height:38px;
  }
  .icon-preview div{
    font-size:14px;
    white-space: nowrap;overflow: hidden;text-overflow: ellipsis;
  }
</style>
@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('admin-berdayakan-sk-type.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Jenis SK') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('admin-berdayakan-sk-type.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>

              

              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Kode') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('kode') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="kode">
                    @if ($errors->has('kode'))
                    <span id="harga-error" class="error kode-danger" for="input-kode">{{ $errors->first('kode') }}</span>
                    @endif
                  </div>
                </div>
              </div>



         <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Jenis') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('jenis') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="jenis">
                    @if ($errors->has('jenis'))
                    <span id="harga-error" class="error jenis-danger" for="input-jenis">{{ $errors->first('jenis') }}</span>
                    @endif
                  </div>
                </div>
              </div>


            </div>

            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Add Jenis SK') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@push('js')
<script type="text/javascript">
  previous_index = "";
  function select_icon(el,index,value){
    if(previous_index != ""){
      var previousElement = $('.icon-preview')[previous_index];
      $(previousElement).removeClass('active');
    }
    var thisElement = $('.icon-preview')[index];
    $(thisElement).addClass('active');
    previous_index = index;
    $('#icons').val(value);

  }

  $(function () {
    $('.timepicker').datetimepicker({
      //          format: 'H:mm',    // use this format if you want the 24hours timepicker
      format: 'H:mm', //use this format if you want the 12hours timpiecker with AM/PM toggle
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'

      },
     // defaultTime : '00:00'
   });
  });

  $(document).ready(function(){
  /*var select = document.createElement("SELECT");
  select.setAttribute("id", "icons");
  select.setAttribute("name", "icons");*/


  
  //var option = document.createElement("option");
  //option.text = '<i class="material-icons">'+item.key+'</i>' ;
  //select.add(option);
  
  //$('#select-icons').html(select);
});
</script>
@endpush
