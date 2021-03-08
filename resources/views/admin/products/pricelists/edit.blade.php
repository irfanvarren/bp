@extends('layouts.app-auth', ['activePage' => 'pricelists','activeMenu' => 'product-management', 'namePage' => __('Price Lists')])
<style media="screen">
  .loading-wrapper{
    width:100vw;
    height:100vh;
    position:fixed;
    top:0;
    left:0;
    z-index:9999999;
    display:none;
    background:rgba(255,255,255,1);
  }
  .loading-wrapper img{
    display:block;
    margin:0 auto;
    width:500px;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);

  }
  .form-group input[type=file]{
    position:relative !important;
    opacity:1 !important;
  }
  .td-border-top{
  	padding:8px;border-top:1px solid #bebebe
  }
  table tr td{
  	border:1px solid #bebebe;
  }
  .td-border-top:first-child{
  	border-top:none;
  }
</style>
@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
       <form method="post" action="{{route('admin.products.pricelist.update',urlencode(urlencode($kd)))}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
        @csrf
        <input type="hidden" name="KD" value="{{$kd}}">
        @method('put')
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-name ">Price List </h4>
            <p class="card-category"> {{ __('Here you can edit price list')}}</p>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>

                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            @csrf
            <div class="row">
              <div class="col-12 text-right">
                <a href="{{url('admin/products/pricelists')}}" class="btn btn-sm btn-primary">{{ __('Back To List') }}</a>
              </div>
            </div>
            <div class="row">
             <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
             <div class="col-sm-7 col-form-label text-left">
              <div class="togglebutton" >
                <label id="status-ajax">
                  <input type="checkbox" id="status" class="status_input" @if($pricelist->status) checked  @else @endif name="status">
                  <span class="toggle"></span>
                </label>

                <span id="status-label" class="status-label" for="status">
                 {{$pricelist->status == 1 ? 'Active' : 'Non Active'}}
               </span>
             </div>
           </div>
         </div>
         <div class="row">
          <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
          <div class="col-sm-7">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name',$pricelist->name) }}" required />
              @if ($errors->has('name'))
              <span id="harga-error" class="error text-danger" for="input-name">{{ $errors->first('harga') }}</span>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">{{ __('Jenis Produk')}}</label>
          <div class="col-sm-7">
            <div>
              <select type="text" class="form-control" name="type">
                <option value=""> - Pilih Jenis - </option>
                <option value="online">Online</option>
                <option value="offline"> Offline</option>
              </select>
            </div>
            <div>Apakah produk pada pricelist ini dilakukan secara online atau offline ?</div>
          </div>
        </div>

      </div>

      <div class="card-footer ml-auto mr-auto">
        <button type="submit" class="btn btn-primary">{{ __('Edit Pricelists') }}</button>
      </div>


    </div>
  </form>
</div>
</div>
</div>
</div>
@endsection
@push('js')

@endpush
