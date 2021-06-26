@extends('layouts.app', ['activePage' => 'cms.products', 'titlePage' => __('products'),'activeMenu' => 'content-management'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('cms-products.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Add Products') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('cms-products.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>


                  <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Products Id') }}</label>
                      <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('products') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('products') ? ' is-invalid' : '' }}" name="product_id" id="input-products" type="text" placeholder="{{ __('Products Id') }}" value="{{ old('products') }}" required />
                              @if ($errors->has('products'))
                              <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('products') }}</span>
                              @endif
                          </div>
                      </div>

                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                      <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required />
                              @if ($errors->has('products'))
                              <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                              @endif
                          </div>
                      </div>

                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Desc') }}</label>
                      <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
                              <input class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" name="desc" id="input-products" type="text" placeholder="{{ __('Desc') }}" value="{{ old('desc') }}" required />
                              @if ($errors->has('desc'))
                              <span id="desc-error" class="error text-danger" for="input-title">{{ $errors->first('desc') }}</span>
                              @endif
                          </div>
                      </div>

                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Ref Paket Bimbel') }}</label>
                    <div class="col-sm-9">
                      <div class="form-group{{ $errors->has('ref_product') ? ' has-danger' : '' }}">
                        <div class="dropdown bootstrap-select col-sm-12 pl-0 pr-0">

                          <select class="selectpicker col-sm-12 pl-0 pr-0" required data-style="select-with-transition" id="ref_paket" name="ref_paket">
                            <option value="">- Pilih Paket -</option>

                            @foreach($paket_bimbel as $key => $value)
                            <option value="{{$value->KD}}"> {{$value->NAMA}}</option>
                            @endforeach
                          </select>

                        </div>

                        @if ($errors->has('karyawan'))
                        <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('karyawan') }}</span>
                        @endif
                      </div>
                    </div>

                </div>



                </div>
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary">{{ __('Add products') }}</button>
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
