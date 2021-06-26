@extends('layouts.app-auth', ['activePage' => 'reseller-quota', 'titlePage' => __('Reseller Quota'),'activeMenu' => 'company-data'])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('admin-reseller-quota.store',$reseller_id)}}" enctype="multipart/form-data" autocomplete="ona" class="form-horizontal">
          @csrf
          @method('post')
          <input type="hidden" name="reseller_id" value="{{$reseller_id}}">
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Quota') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('admin-reseller-quota.index',$reseller_id) }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>

              
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Pricelist') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('REF_PRICELIST') ? ' has-danger' : '' }}">
                    <select class="selectize col-sm-12 pl-0 pr-0" data-style="select-with-transition" onchange="select_pricelist(this)" id="REF_PRICELIST" name="REF_PRICELIST">
                      <option value="" selected>- Select Pricelist -</option>

                      @foreach($pricelists as $key => $value)
                      <option value="{{$value->KD}}"> {{$value->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Course') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('REF_PAKET') ? ' has-danger' : '' }}">
                    <select class="selectize col-sm-12 pl-0 pr-0" data-style="select-with-transition" id="REF_PAKET" name="REF_PAKET">
                      <option value="" selected>- Select Course -</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Quota') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('quota') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="quota">
                    @if ($errors->has('quota'))
                    <span id="harga-error" class="error quota-danger" for="input-quota">{{ $errors->first('quota') }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Add Quota') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@push('js')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
  var token = "{{csrf_token()}}";
  $('.selectize').selectize({
    width : 'resolve'
  });

  $(document).ready(function(){
    select_pricelist(document.getElementById('REF_PRICELIST'));
  });

  function select_pricelist(evt){
    var pricelist_id = evt.value;
    $.ajax({
      url: "{{route('select-pricelist')}}",
      method: "POST",
      data: {
        _token: token,
        pricelist_id: pricelist_id
      },
      success: function(data) {
        var data = JSON.parse(data);
        var courses = data.courses;
        var $select = $('#REF_PAKET').selectize();
        var selectize = $select[0].selectize;
        selectize.clearOptions();
        selectize.addOption({value : "", text : "Select Course"});
        $.each(courses,function(k,v){
          selectize.addOption({value : v.KD,text : v.NAMA});
        });

        selectize.refreshOptions();
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }


</script>
@endpush
