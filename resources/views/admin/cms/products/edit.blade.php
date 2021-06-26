@extends('layouts.app', ['activePage' => 'products','activeMenu' => 'content-management', 'titlePage' => __('Products')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('cms-products.update',$id)}}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')
            <input type="hidden" name="slug" value="{{$products->slug}}">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit news') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('cms-products.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Title') }}" value="{{ old('title',$products->title) }}" required="true" aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="name-error" class="error text-danger" for="input-title">{{ $errors->first('title ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Desc') }}</label>
                  <div class="col-sm-9">
                    <div class="form-group{{ $errors->has('Desc') ? ' has-danger' : '' }}">
                      <input type="text" class="form-control summernote-wrapper{{ $errors->has('Desc') ? ' is-invalid' : '' }}" name="Desc" id="input-Desc" placeholder="{{ __('Desc...') }}" value="{{ old('desc',$products->desc) }}" row="3" required>
                      @if ($errors->has('Desc'))
                        <span id="harga-error" class="error text-danger" for="input-Desc">{{ $errors->first('Desc') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label text-center">{{ __('Ref Paket Bimbel') }}</label>
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
@push('js')

@endpush
