@extends('layouts.app-auth', ['dashboard' => 'tutor','activePage' => 'packages', 'titlePage' => __('package'),'activeMenu' => 'content-management'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('ot-package.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Package') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('ot-package.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
              
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                <div class="col-sm-8">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}"  aria-required="true"/>
                    @if ($errors->has('name'))
                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name ') }}</span>
                    @endif
                  </div>
                </div>
              </div>
             
                            <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Test') }}</label>
                <div class="col-sm-8">
                  <div class="form-group">
                     <select class="selectpicker col-sm-12 pl-0 pr-0" data-style="select-with-transition" name="test_id" id="test_id">
                                <option value="">Choose Test</option>
                                @foreach($test as $data_test)
                                <option value="{{$data_test->id}}">{{$data_test->name}}</option>
                                @endforeach
                            </select>
                  </div>
                </div>
              </div>
                      <div class="row" id="module-wrapper" style="display: none;">
                <label class="col-sm-2 col-form-label">{{ __('Module') }}</label>
                <div class="col-sm-8">
                  <div class="form-group" id="module-output">
                    <select class="selectpicker col-sm-12 pl-0 pr-0" data-style="select-with-transition" name="module_id" id="module_id">

  <option value="">Without Module</option>
</select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Add Package') }}</button>
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
  var token = $("input [name='_token']").val();
  $('#test_id').on('change',function(){
    
    if($(this).val() != ""){
      $.ajax({
        "url" : "{{route('package-select-module')}}",
        "method" : "GET",
        "data" : {
          _token : token,
          test_id : $(this).val()
        },
        success : function(data){
          $('#module_id').html(data);
          $("#module_id").selectpicker("refresh");
          $('#module-wrapper').show();

        },
        error : function(){
          alert('error');
        }
      });
    }
  });
</script>
@endpush
