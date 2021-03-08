@extends('layouts.app-auth', ['activePage' => 'Products', 'titlePage' => __('Products')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('mp.update',$id)}}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Products') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('mp.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nama Produk') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nama_produk') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nama_produk') ? ' is-invalid' : '' }}" name="nama_produk" id="input-name" type="text" placeholder="{{ __('Nama Produk') }}" value="{{ old('nama_produk',$products->nama_produk) }}" required="true" aria-required="true"/>
                      @if ($errors->has('nama_produk'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nama_produk ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Harga') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('harga') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('harga') ? ' is-invalid' : '' }}" name="harga" id="input-harga" type="number" placeholder="{{ __('Harga') }}" value="{{ old('harga',$products->harga) }}" required />
                      @if ($errors->has('harga'))
                        <span id="harga-error" class="error text-danger" for="input-harga">{{ $errors->first('harga') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-gambar">{{ __('Gambar') }}</label>
                  <div class="col-sm-7">
                    <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
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
                  <label class="col-sm-2 col-form-label" for="input-gambar-confirmation">{{ __('Status') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <div class="togglebutton">
                        <label>
                    <input type="checkbox" id="status" name="status" @if ($products->status)
                      {{"checked"}}
                    @endif>
                    <span class="toggle"></span>
                      </label>

                      <span id="status-label" for="status">Active</span>
                    </div>
                      <!--  <select class="form-control" name="status">
                        <option value="true">Active</option>
                        <option value="false">Non Active</option>
                      </select>
                    <input class="form-control" name="status" id="input-status" type="text" placeholder="{{ __('Status') }}" value="" required />-->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
