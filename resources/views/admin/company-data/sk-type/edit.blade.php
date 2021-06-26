@extends('layouts.app-auth', ['activePage' => 'sk-type', 'titlePage' => __('SK Type'),'activeMenu' => 'company-data'])
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
        <form method="post" action="{{route('admin-sk-type.update',$type)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('put')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Update Jenis SK') }}</h4>
              <p class="card-type"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('admin-sk-type.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>

              

              <div class="row form-group">
                <label class="col-sm-2 col-form-label">{{ __('Kode') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('kode') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" name="kode" value="{{$type->kode}}">
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
                    <input type="text" class="form-control" name="jenis" value="{{$type->jenis}}">
                    @if ($errors->has('jenis'))
                    <span id="harga-error" class="error jenis-danger" for="input-jenis">{{ $errors->first('jenis') }}</span>
                    @endif
                  </div>
                </div>
              </div>


            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Update Jenis SK') }}</button>
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

</script>
@endpush