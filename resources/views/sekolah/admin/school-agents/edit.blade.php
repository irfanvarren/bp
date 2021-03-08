@extends('layouts.app-auth', ['activePage' => 'school-agents', 'titlePage' => __('School Agents'),'activeMenu' => __('')])
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style media="screen">
.selectize-input input{
  width:80% !important;
  pediting:0 5px;
  border:none;
}
</style>
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('school-agent.update',$agent)}}" enctype="multipart/form-data" autocoschool-agentlete="off" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Agent') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{route('school-agent.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Agent Name') }}" value="{{ old('name',$agent->name) }}"  required aria-required="true"/>
                    @if ($errors->has('name'))
                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name ') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Logo') }}</label>

                <div class="col-sm-7">
                 <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                       <img class="lazy" src="{{asset('img/schools-agents/'.$agent->id.'/'.$agent->logo )}}" style="width:120px;" alt=""> 
                    </div>
                    <div>
                      <span class="btn btn-rose btn-round btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="gambar">
                      </span>
                      <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"> <i class="fa fa-times"></i> Remove</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('Note') }}</label>

              <div class="col-sm-9">
                <div class="form-group{{ $errors->has('note') ? ' has-danger' : '' }}">
                  <textarea name="note" class="form-control" id="note" rows="4" id="note">{{$agent->note}}</textarea>
                  @if ($errors->has('note'))
                  <span id="note-error" class="error text-danger" for="input-note">{{ $errors->first('note ') }}</span>
                  @endif
                </div>
              </div>
            </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Edit agent') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('more-script')
    <script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
  <script type="text/javascript">

  </script>
@endsection
