@extends('layouts.app-auth', ['activePage' => 'promo', 'titlePage' => __('Promo')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

       
          <form method="post" action="{{route('promo.store')}}" autocopromolete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Promo') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{route('promo.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Produk') }}</label>
                  <div class="col-sm-7">

                    <div class="form-group{{ $errors->has('nama_produk') ? ' has-danger' : '' }}">
                        <select class="form-control" name="id_produk">

                          <option value="">- Pilih Produk -</option>
                          @foreach ($produk as $key => $value)
                            <option value="{{$key}}">{{$value->nama_produk}}</option>
                          @endforeach
                        </select>
                      <!--<input class="form-control{{ $errors->has('nama_produk') ? ' is-invalid' : '' }}" name="nama_produk" id="input-name" type="text" placeholder="{{ __('Nama Produk') }}" value="{{ old('nama_produk') }}" required="true" aria-required="true"/>
                      @if ($errors->has('nama_produk'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('nama_produk ') }}</span>
                      @endif
                    -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nama Promo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('nama_promo') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nama_promo') ? ' is-invalid' : '' }}" name="nama_promo" id="input-harga" type="text" placeholder="{{ __('Nama Promo') }}" value="{{ old('nama_promo') }}" required />
                      @if ($errors->has('nama_promo'))
                        <span id="harga-error" class="error text-danger" for="nama_promo">{{ $errors->first('nama_promo') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Masa Berlaku') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group{{ $errors->has('tgl_berlaku') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('tgl_berlaku') ? ' is-invalid' : '' }}" name="tgl_berlaku" id="input-harga" type="date" value="{{ old('tgl_berlaku') }}" required />
                      @if ($errors->has('tgl_berlaku'))
                        <span id="harga-error" class="error text-danger" for="tgl_berlaku">{{ $errors->first('tgl_berlaku') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="form-grop">

                            <label for="" class="col-form-label col-md-12" style="text-align:center;">-</label>

                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group{{ $errors->has('tgl_kadaluarsa') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('tgl_kadaluarsa') ? ' is-invalid' : '' }}" name="tgl_kadaluarsa" id="input-harga" type="date" value="{{ old('tgl_kadaluarsa') }}" required />
                      @if ($errors->has('tgl_kadaluarsa'))
                        <span id="harga-error" class="error text-danger" for="tgl_kadaluarsa">{{ $errors->first('tgl_kadaluarsa') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Potongan') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('potongan_harga') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('potongan_harga') ? ' is-invalid' : '' }}" name="potongan" id="input-harga" type="number" placeholder="{{ __('Potongan Harga') }}" value="{{ old('potongan_harga') }}" required />
                      @if ($errors->has('harga'))
                        <span id="harga-error" class="error text-danger" for="potongan_harga">{{ $errors->first('potongan_harga') }}</span>
                      @endif
                    </div>

                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">


                    <div class="form-check-inline">

                      <input type="radio" name="jenis_potongan" required class="form-check-input" value="harga"> <label class="form-check-label">Rupiah</label>
                    </div>
                    <div class="form-check-inline">

                      <input type="radio" name="jenis_potongan" required class="form-check-input" value="persen"> <label class="form-check-label">Persen</label>
                    </div>
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
    <input type="file" name="...">
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
                    <input type="checkbox" id="status" name="status" checked="">
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
                <button type="submit" class="btn btn-primary">{{ __('Add Promo') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('more-script')
  <script type="text/javascript">

    $('#status').change(function(){

      if(this.checked){
      $('#status-label').html('Active');
    }else{
        $('#status-label').html('Non Active');
    }
    });
  </script>
@endsection
