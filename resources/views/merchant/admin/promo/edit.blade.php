@extends('layouts.app-auth', ['activePage' => 'promo', 'titlePage' => __('Promo')])
@push('head-js')
<link href="{{asset('css/selectize.bootstrap3.css')}}" rel="stylesheet">
@endpush

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
                    <select class="form-control" name="id_produk" id="id_produk">
                      <option value="">- Pilih Produk -</option>
                      @foreach ($produk as $key => $value)
                      <option value="{{$value->id}}" {{$value->id == $promo->id_produk ? 'selected' : ''}}>{{$value->nama_produk}}</option>
                      @endforeach
                    </select>

                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Nama Promo') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('nama_promo') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('nama_promo') ? ' is-invalid' : '' }}" name="nama_promo" id="input-nama_promo" type="text" placeholder="{{ __('Nama Promo') }}" value="{{ old('nama_promo',$promo->nama_promo) }}" required />
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
                    <input class="form-control{{ $errors->has('tgl_berlaku') ? ' is-invalid' : '' }}" name="tgl_berlaku" id="input-tgl_berlaku" type="date" value="{{ old('tgl_berlaku',$promo->tgl_berlaku) }}" required />
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
                    <input class="form-control{{ $errors->has('tgl_kadaluarsa') ? ' is-invalid' : '' }}" name="tgl_kadaluarsa" id="input-tgl_kadaluarsa" type="date" value="{{ old('tgl_kadaluarsa',$promo->tgl_kadaluarsa) }}" required />
                    @if ($errors->has('tgl_kadaluarsa'))
                    <span id="tgl_kadaluarsa-error" class="error text-danger" for="tgl_kadaluarsa">{{ $errors->first('tgl_kadaluarsa') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Potongan') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('potongan_harga') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('potongan_harga') ? ' is-invalid' : '' }}" name="potongan" id="input-potongan_harga" type="number" placeholder="{{ __('Potongan Harga') }}" value="{{ old('potongan_harga',$promo->potongan_harga) }}" required />
                    @if ($errors->has('harga'))
                    <span id="harga-error" class="error text-danger" for="potongan_harga">{{ $errors->first('potongan_harga') }}</span>
                    @endif
                  </div>

                </div>
                <div class="col-sm-3">
                  <div class="form-group pt-2">
                    <div class="form-check-inline">

                      <input type="radio" name="jenis_potongan" id="jenis_potongan-rupiah" required class="form-check-input" value="harga" onchange="check_jenis_potongan(event,this)" {{$promo->potongan_persen != "" ? '' : 'checked'}}> <label class="form-check-label">Rupiah</label>
                      
                    </div>
                    <div class="form-check-inline">

                      <input type="radio" name="jenis_potongan" id="jenis_potongan-persen" required class="form-check-input" onchange="check_jenis_potongan(event,this)" value="persen" {{$promo->potongan_persen != "" ? 'checked' : ''}}> <label class="form-check-label">Persen</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-gambar">{{ __('Gambar') }}</label>
                <div class="col-sm-7">
                  <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">

                        <img src="{{$promo->lokasi_gambar}}">
                        
                      </div>
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
                        <input type="checkbox" id="status" name="status" >
                        <span class="toggle"></span>
                      </label>

                      <span id="status-label" for="status">Active</span>
                    </div>
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
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>

<script type="text/javascript">
  $('#id_produk').selectize({
    delimiter: ',',
    persist: false,
  }); 
  $('#status').change(function(){

    if(this.checked){
      $('#status-label').html('Active');
    }else{
      $('#status-label').html('Non Active');
    }
  });

  function check_jenis_potongan(e,elm){
    if(elm.value == "persen"){
      if($('#input-potongan_harga').val() > 100){
        alert("Potongan harga tidak bisa lebih dari 100 %");
        $('#jenis_potongan-rupiah').prop('checked',true);
      }
    }
  }

  function check_masa_berlaku(){
        var tgl_mulai = $('#tgl_mulai').val();
    var tgl_selesai = $('#tgl_selesai').val();
    console.log(tgl_mulai,tgl_selesai);
  }
</script>
@endsection
