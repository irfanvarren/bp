@extends('layouts.app-auth', ['activePage' => 'promo', 'titlePage' => __('Promo')])
@push('head-js')
<link href="{{asset('css/selectize.bootstrap3.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.css" integrity="sha512-NCJ1O5tCMq4DK670CblvRiob3bb5PAxJ7MALAz2cV40T9RgNMrJSAwJKy0oz20Wu7TDn9Z2WnveirOeHmpaIlA==" crossorigin="anonymous" />
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
                 @if(count($produk))
                 <div class="form-group{{ $errors->has('nama_produk') ? ' has-danger' : '' }}">

                  <select class="form-control" name="id_produk" id="id_produk">

                    <option value="">- Pilih Produk -</option>
                    @foreach ($produk as $key => $value)
                    <option value="{{$key}}">{{$value->nama_produk}}</option>
                    @endforeach
                  </select>

                </div>
                @else
                <div class="is-invalid col-form-label text-danger text-left">
                  *Anda belum menginputkan produk apapun
                </div>
                @endif
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('Nama Promo') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('nama_promo') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('nama_promo') ? ' is-invalid' : '' }}" name="nama_promo" id="input-nama_promo" type="text" placeholder="{{ __('Nama Promo') }}" value="{{ old('nama_promo') }}" required />
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
                  <input class="form-control{{ $errors->has('tgl_berlaku') ? ' is-invalid' : '' }}" name="tgl_berlaku" id="input-tgl_berlaku" type="date" value="{{ old('tgl_berlaku') }}" required onchange="check_masa_berlaku()" />
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
                  <input class="form-control{{ $errors->has('tgl_kadaluarsa') ? ' is-invalid' : '' }}" name="tgl_kadaluarsa" id="input-tgl_kadaluarsa" type="date" value="{{ old('tgl_kadaluarsa') }}" onchange="check_masa_berlaku()" required />
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
                  <input class="form-control{{ $errors->has('potongan_harga') ? ' is-invalid' : '' }}" name="potongan" id="input-potongan_harga" type="number" placeholder="{{ __('Potongan Harga') }}" value="{{ old('potongan_harga') }}" required />
                  @if ($errors->has('harga'))
                  <span id="harga-error" class="error text-danger" for="potongan_harga">{{ $errors->first('potongan_harga') }}</span>
                  @endif
                </div>

              </div>
              <div class="col-sm-3">
                <div class="form-group pt-2">
                  <div class="form-check-inline">

                    <input type="radio" name="jenis_potongan" id="jenis_potongan-rupiah" required class="form-check-input" value="harga" onchange="check_jenis_potongan(event,this)"> <label class="form-check-label">Rupiah</label>
                  </div>
                  <div class="form-check-inline">

                    <input type="radio" name="jenis_potongan" id="jenis_potongan-persen" required class="form-check-input" onchange="check_jenis_potongan(event,this)" value="persen"> <label class="form-check-label">Persen</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('Jumlah Promo Per User') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('jlh_peruser') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('jlh_peruser') ? ' is-invalid' : '' }}" name="jlh_peruser" id="input-jlh_peruser" type="number" placeholder="{{ __('Jumlah Promo Per User') }}" value="{{ old('jlh_peruser') }}" required />
                  @if ($errors->has('jlh_peruser'))
                  <span id="harga-error" class="error text-danger" for="potongan_harga">{{ $errors->first('jlh_peruser') }}</span>
                  @endif
                </div>

              </div>
            </div> -->
            <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('Quota') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('jlh') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('jlh') ? ' is-invalid' : '' }}" name="jlh" id="input-jlh" type="number" placeholder="{{ __('Jumlah Promo') }}" value="{{ old('jlh') }}" min="0" required />
                  @if ($errors->has('jlh'))
                  <span id="harga-error" class="error text-danger" for="potongan_harga">{{ $errors->first('jlh') }}</span>
                  @endif
                </div>

              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label" for="input-gambar">{{ __('Gambar') }}</label>
              <div class="col-sm-7">
                <div class="pt-2 text-left {{ $errors->has('gambar') ? ' has-danger' : '' }}">
                  <div class="img-container" id="img-container" style="display: none;">
                    <img src="" id="image-cropper-output">
                  </div>
                  <img src="" id="img-result">
                  <div>
                    <input type="hidden" id="img-blob" name="imageBlob" required>
                     <div class="float-right">
                      <button class="btn btn-primary m-0 float-right" type="button" onclick="crop_image()">Crop</button>
                      
                      <div class="btn-group float-right mt-0 mr-2">
                        <button type="button" class="btn btn-primary mr-2" data-method="zoom" data-option="0.1" title="Zoom In">
                          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(0.1)">
                            <span class="fa fa-search-plus"></span>
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(-0.1)">
                            <span class="fa fa-search-minus"></span>
                          </span>
                        </button>
                      </div>
                    </div>
                    <input type="file" onchange="select_image(this)" name="...">

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js" integrity="sha512-FHa4dxvEkSR0LOFH/iFH0iSqlYHf/iTwLc5Ws/1Su1W90X0qnxFxciJimoue/zyOA/+Qz/XQmmKqjbubAAzpkA==" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>

<script type="text/javascript">

  var Cropper = window.Cropper;
  var cropper;
  var container = document.querySelector('.img-container');

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
    var tgl_mulai = $('#input-tgl_berlaku').val();
    var tgl_selesai = $('#input-tgl_kadaluarsa').val();
    if(tgl_selesai != "" && tgl_mulai != ""){
      if(tgl_selesai <= tgl_mulai){
        alert('tanggal selesai tidak boleh kurang dari tanggal mulai');
        $('#tgl_selesai').val("");
        tgl_selesai == "";
      }else if(tgl_mulai >= tgl_selesai){
        alert('tanggal mulai tidak boleh lebih dari tanggal selesai');
        $('#tgl_mulai').val("");
        tgl_mulai == "";
      }
    }
  }


  var options = {
    aspectRatio: 1/1,
    preview: '.img-preview',
    ready: function (e) {
      //console.log(e.type);
    },
    cropstart: function (e) {
      //console.log(e.type, e.detail.action);
    },
    cropmove: function (e) {
      //console.log(e.type, e.detail.action);
    },
    cropend: function (e) {
      //console.log(e.type, e.detail.action);
    },
    crop: function (e) {
      var data = e.detail;
      //console.log(e.type);
    },
    zoom: function (e) {
      //console.log(e.type, e.detail.ratio);
    }
  };

  function select_image(elm){
    var image = document.getElementById("image-cropper-output");
    $('#img-container').show();
    var files = elm.files;
    var file;

    if (files && files.length) {
      file = files[0];

      if (/^image\/\w+/.test(file.type)) {
        uploadedImageType = file.type;
        uploadedImageName = file.name;

        image.src = URL.createObjectURL(file);

        if (cropper) {
          cropper.destroy();
        }

        cropper = new Cropper(image, options);
        elm.value = null;
      } else {
        window.alert('Please choose an image file.');
      }
    }

  }
  function crop_image(){
    var cropped = cropper.cropped;
    var option = { maxWidth: 4096, maxHeight: 4096 };
    var result = cropper['getCroppedCanvas'](option);
    result = result.toDataURL('image/jpeg');
    $('#img-container').hide();
    document.getElementById('img-result').src = result;
    document.getElementById('img-blob').value = result;
  }
</script>
@endsection
