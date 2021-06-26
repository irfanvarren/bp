@extends('layouts.student-dashboard')
@push('head-script')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
@endpush
@section('student-content')
<div class="col-md-12">


  <form method="post" action="{{url('student/profile')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
    @csrf
    @method('post')
    <input type="hidden" name="student_id" id="student_id" value="{{$student->KD}}">
    <input type="hidden" name="user_id" id="user_id">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <label class="col-sm-3 col-form-label">{{ __('Nama') }}</label>
          <div class="col-sm-9">
            <div class="form-group{{ $errors->has('NAMA') ? ' has-danger' : '' }}">
              <input type="text" class="form-control" name="NAMA" id="NAMA" value="{{ $student != '' ? $student->NAMA : ''}}">
              @if ($errors->has('NAMA'))
              <span id="harga-error" class="error NAMA-danger" for="input-NAMA">{{ $errors->first('NAMA') }}</span>
              @endif
            </div>
          </div>
        </div>


        <div class="row">
          <label class="col-sm-3 col-form-label">{{ __('Kota Kelahiran') }}</label>
          <div class="col-sm-9">
            <div class="form-group{{ $errors->has('KOTA_KELAHIRAN') ? ' has-danger' : '' }}">
              <input type="text" class="form-control" name="KOTA_KELAHIRAN" id="KOTA_KELAHIRAN" value="{{ $student != '' ? $student->KOTA_KELAHIRAN : ''}}">
              @if ($errors->has('KOTA_KELAHIRAN'))
              <span id="harga-error" class="error KOTA_KELAHIRAN-danger" for="input-KOTA_KELAHIRAN">{{ $errors->first('KOTA_KELAHIRAN') }}</span>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-3 col-form-label">{{ __('Tanggal Lahir') }}</label>
          <div class="col-sm-9">
            <div class="form-group{{ $errors->has('TGL_LAHIR') ? ' has-danger' : '' }}">
              <input type="date" class="form-control" name="TGL_LAHIR" id="TGL_LAHIR" value="{{ $student != '' ? $student->TGL_LAHIR : ''}}" required>
              @if ($errors->has('TGL_LAHIR'))
              <span id="harga-error" class="error TGL_LAHIR-danger" for="input-TGL_LAHIR">{{ $errors->first('TGL_LAHIR') }}</span>
              @endif
            </div>
          </div>
        </div>

        <div class="row">
          <label class="col-sm-3 col-form-label">{{ __('Agama') }}</label>
          <div class="col-sm-9">
            <div class="form-group{{ $errors->has('AGAMA') ? ' has-danger' : '' }}">
              <select class="form-control" name="AGAMA" id="AGAMA">
                <option value=""> - Pilih Agama - </option>
                <option value="BUDDHA" {{ $student != '' ? $student->AGAMA == 'BUDDHA' ? 'selected' : '' : ''}}>BUDDHA</option>
                <option value="ISLAM" {{ $student != '' ? $student->AGAMA == 'ISLAM' ? 'selected' : '' : ''}}>ISLAM</option>
                <option value="HINDU" {{ $student != '' ? $student->AGAMA == 'HINDU' ? 'selected' : '' : ''}}>HINDU</option>
                <option value="PROTESTAN" {{ $student != '' ? $student->AGAMA == 'PROTESTAN' ? 'selected' : '' : ''}}>PROTESTAN</option>
                <option value="KATOLIK" {{ $student != '' ? $student->AGAMA == 'KATOLIK' ? 'selected' : '' : ''}}>KATOLIK</option>
                <option value="KONGHUCU" {{ $student != '' ? $student->AGAMA == 'KONGHUCU' ? 'selected' : '' : ''}}>KONGHUCU</option>
              </select>
              @if ($errors->has('AGAMA'))
              <span id="harga-error" class="error AGAMA-danger" for="input-AGAMA">{{ $errors->first('AGAMA') }}</span>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-3 col-form-label">{{ __('JK') }}</label>
          <div class="col-sm-9">
            <div class="form-group{{ $errors->has('JK') ? ' has-danger' : '' }}">
              <div class="form-check-inline">
                <label class="form-check-label mr-3">
                  <input type="radio" class="form-check-input" name="JK" id="JK_LAKI-LAKI" value="LAKI-LAKI"> Laki - Laki
                </label>
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="JK" id="JK_PEREMPUAN" value="PEREMPUAN"> Perempuan
                </label>
              </div>

              @if ($errors->has('JK'))
              <span id="harga-error" class="error JK-danger" for="input-JK">{{ $errors->first('JK') }}</span>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
          <div class="col-sm-9">
            <div class="form-group{{ $errors->has('EMAIL') ? ' has-danger' : '' }}">
              <input type="text" class="form-control" name="EMAIL" id="EMAIL" value="{{ $student != '' ? $student->EMAIL : ''}}">
              @if ($errors->has('EMAIL'))
              <span id="harga-error" class="error EMAIL-danger" for="input-EMAIL">{{ $errors->first('EMAIL') }}</span>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-3 col-form-label">{{ __('NIK') }}</label>
          <div class="col-sm-9">
            <div class="form-group{{ $errors->has('REF_NIK') ? ' has-danger' : '' }}">
              <input type="text" class="form-control" name="REF_NIK" id="REF_NIK" value="{{ $student != '' ? $student->REF_NIK : ''}}">
              @if ($errors->has('REF_NIK'))
              <span id="harga-error" class="error REF_NIK-danger" for="input-REF_NIK">{{ $errors->first('REF_NIK') }}</span>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-3 col-form-label">{{ __('NPWP') }}</label>
          <div class="col-sm-9">
            <div class="form-group{{ $errors->has('REF_NPWP') ? ' has-danger' : '' }}">
              <input type="text" class="form-control" name="REF_NPWP" id="REF_NPWP" value="{{ $student != '' ? $student->REF_NPWP : ''}}">
              @if ($errors->has('REF_NPWP'))
              <span id="harga-error" class="error REF_NPWP-danger" for="input-REF_NPWP">{{ $errors->first('REF_NPWP') }}</span>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-3 col-form-label">{{ __('Akta') }}</label>
          <div class="col-sm-9">
            <div class="form-group{{ $errors->has('REF_AKTA') ? ' has-danger' : '' }}">
              <input type="text" class="form-control" name="REF_AKTA" id="REF_AKTA" value="{{ $student != '' ? $student->REF_AKTA : ''}}">
              @if ($errors->has('REF_AKTA'))
              <span id="harga-error" class="error REF_AKTA-danger" for="input-REF_AKTA">{{ $errors->first('REF_AKTA') }}</span>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-3 col-form-label">{{ __('Paspor') }}</label>
          <div class="col-sm-9">
            <div class="form-group{{ $errors->has('REF_PASPOR') ? ' has-danger' : '' }}">
              <input type="text" class="form-control" name="REF_PASPOR" id="REF_PASPOR" value="{{ $student != '' ? $student->REF_PASPOR : ''}}">
              @if ($errors->has('REF_PASPOR'))
              <span id="harga-error" class="error REF_PASPOR-danger" for="input-REF_PASPOR">{{ $errors->first('REF_PASPOR') }}</span>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="row pt-2">
          <div class="col-lg-3">
            <div>Gambar</div>
            <img src="">
         
          </div>
          <div class="col-lg-9">
               <input type="file" name="FILE_PIC" id="FILE_PIC">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 p-3">
           <div class="row mb-3">
            <div class="col-sm-3">{{ __('Alamat') }}</div>
            <div class="col-sm-9">
              <div class="form-group{{ $errors->has('ALAMAT') ? ' has-danger' : '' }}">
                <input type="text" class="form-control" name="ALAMAT" id="ALAMAT" value="{{ $student != '' ? $student->ALAMAT : ''}}">
                @if ($errors->has('ALAMAT'))
                <span id="harga-error" class="error ALAMAT-danger" for="input-ALAMAT">{{ $errors->first('ALAMAT') }}</span>
                @endif
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">{{ __('Kode Pos') }}</div>
            <div class="col-sm-9">
              <div class="form-group{{ $errors->has('KODE_POS') ? ' has-danger' : '' }}">
                <input type="text" class="form-control" name="KODE_POS" id="KODE_POS" value="{{ $student != '' ? $student->KODE_POS : ''}}">
                @if ($errors->has('KODE_POS'))
                <span id="harga-error" class="error KODE_POS-danger" for="input-KODE_POS">{{ $errors->first('KODE_POS') }}</span>
                @endif
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">{{ __('RT / RW') }}</div>
            <div class="col-sm-9">
              <div class="form-group{{ $errors->has('RT_RW') ? ' has-danger' : '' }}">
                <input type="text" class="form-control" name="RT_RW" id="RT_RW" value="{{ $student != '' ? $student->RT_RW : ''}}">
                @if ($errors->has('RT_RW'))
                <span id="harga-error" class="error RT_RW-danger" for="input-RT_RW">{{ $errors->first('RT_RW') }}</span>
                @endif
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">{{ __('Dusun') }}</div>
            <div class="col-sm-9">
              <div class="form-group{{ $errors->has('DUSUN') ? ' has-danger' : '' }}">
                <input type="text" class="form-control" name="DUSUN" id="DUSUN" value="{{ $student != '' ? $student->DUSUN : ''}}">
                @if ($errors->has('DUSUN'))
                <span id="harga-error" class="error DUSUN-danger" for="input-DUSUN">{{ $errors->first('DUSUN') }}</span>
                @endif
              </div>
            </div>
          </div>
          <div style="display: none" id="online-place-data">
            <div class="row mb-3">
              <div class="col-sm-12">
                <hr>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">{{ __('Desa / Kelurahan') }}</div>
              <div class="col-sm-9">
                <div class="form-group{{ $errors->has('DESA_KELURAHAN') ? ' has-danger' : '' }}">
                  <input type="text" class="form-control" name="DESA_KELURAHAN" id="DESA_KELURAHAN"  value="{{ $student != '' ? $student->DESA_KELURAHAN : ''}}" disabled>
                  @if ($errors->has('DESA_KELURAHAN'))
                  <span id="harga-error" class="error DESA_KELURAHAN-danger" for="input-DESA_KELURAHAN">{{ $errors->first('DESA_KELURAHAN') }}</span>
                  @endif
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-3">{{ __('Kota') }}</div>
              <div class="col-sm-9">
                <div class="form-group{{ $errors->has('KOTA') ? ' has-danger' : '' }}">
                  <input type="text" class="form-control" name="KOTA" id="KOTA" disabled>
                  @if ($errors->has('KOTA'))
                  <span id="harga-error" class="error KOTA-danger" for="input-KOTA">{{ $errors->first('KOTA') }}</span>
                  @endif
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-12">
                <small>Data desa / kelurahan dan kota diatas tidak akan disimpan silahkan input kembali dibawah </small>
                <hr>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-3">
              Negara
            </div>
            <div class="col-lg-9">
              <select class="selectize form-control" id="REF_NEGARA" name="REF_NEGARA">
                <option value=""> - Pilih Negara -</option>
                @foreach($countries as $country)
                <option value="{{strtoupper($country->name)}}" {{strtoupper($country->name) == "INDONESIA" ? 'selected' : ''}}>{{$country->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-3">
              Pulau
            </div>
            <div class="col-lg-9">
             <select class="selectize form-control" id="REF_PULAU" name="REF_PULAU">
              <option value=""> - Pilih Pulau -</option>
              @foreach($islands as $island)
              <option value="{{strtoupper($island->NAMA)}}" >{{$island->NAMA}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-lg-3">
            Provinsi
          </div>
          <div class="col-lg-9">
           <select class="selectize form-control" id="REF_PROVINSI" name="REF_PROVINSI">
            <option value=""> - Pilih Provinsi -</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-3">
          Kota
        </div>
        <div class="col-lg-9">
         <select class="selectize form-control" id="REF_KOTA" name="REF_KOTA">
          <option value=""> - Pilih Kota -</option>
        </select>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-lg-3">
        Kecamatan
      </div>
      <div class="col-lg-9">
       <select class="selectize form-control" id="REF_KEC" name="REF_KEC">
        <option value=""> - Pilih Kecamatan -</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      Kelurahan
    </div>
    <div class="col-lg-9">
     <select class="selectize form-control" id="REF_KEL" name="REF_KEL">
      <option value=""> - Pilih Kelurahan -</option>
    </select>
  </div>
</div>

  <div class="row mt-3">
    <div class="col-lg-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>


</div>
</div>
</div>
</div>


</form>
</div>
@endsection
@push('more-script')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
   var token = $("input[name='_token']").val();
 var REF_NEGARA = "{{$student->REF_NEGARA}}";
 var REF_PULAU = "{{$student->REF_PULAU}}";
 var REF_PROVINSI = "{{$student->REF_PROVINSI}}";
 var REF_KOTA = "{{$student->REF_KOTA}}";
 var REF_KEC = "{{$student->REF_KEC}}";
 var REF_KEL = "{{$student->REF_KEL}}";

 $(document).ready(function(){
  if(REF_NEGARA != ""){
    island_ajax(REF_NEGARA,REF_PULAU);
  }

});
 $('#REF_NEGARA').on('change',function(){
  island_ajax($(this).val());
  $('#REF_PROVINSI').val("");
  $('#REF_KOTA').val("");
  $('#REF_KEC').val("");
  $('#REF_KEL').val("");
});

 function island_ajax(REF_NEGARA,REF_PULAU = null){

  $.ajax({
    url: "{{route('island-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      REF_NEGARA : REF_NEGARA
    },
    success: function(data) {
      $('#REF_PULAU').selectize()[0].selectize.destroy();
      var $select = $('#REF_PULAU').selectize({
        options : data,
        valueField: 'NAMA',
        labelField: 'NAMA',
        searchField: 'NAMA',
      });
      var selectize = $select[0].selectize;

      if(REF_PULAU != null){
        selectize.setValue(REF_PULAU);
      }
      return true;
    },
    error: function(request, status, error) {
      alert(request.responseText);
      return false;
    }
  });

}

$('#REF_PULAU').on('change',function(){
  if(REF_PROVINSI != ""){     
    province_ajax($(this).val(),REF_PROVINSI);
  }else{   
    province_ajax($(this).val());
  }
});

function province_ajax(REF_PULAU,REF_PROVINSI = null){

  $.ajax({
    url: "{{route('province-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      REF_NEGARA : $('#REF_NEGARA').val(),
      REF_PULAU : REF_PULAU
    },
    success: function(data) {
     $('#REF_PROVINSI').selectize()[0].selectize.destroy();

     var $select = $('#REF_PROVINSI').selectize({
      options : data,
      valueField: 'NAMA',
      labelField: 'NAMA',
      searchField: 'NAMA',
    });
     var selectize = $select[0].selectize;
     if(REF_PROVINSI != null){

      selectize.setValue(REF_PROVINSI);
    }
    return true;
  },
  error: function(request, status, error) {
    alert(request.responseText);
    return false;
  }
});

}

$('#REF_PROVINSI').on('change',function(){
 if(REF_KOTA != ""){     
  city_ajax($(this).val(),REF_KOTA);
}else{
  city_ajax($(this).val());
}
});

function city_ajax(REF_PROVINSI,REF_KOTA = null){

  $.ajax({
    url: "{{route('city-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      REF_PROVINSI : REF_PROVINSI
    },
    success: function(data) {
      $('#REF_KOTA').selectize()[0].selectize.destroy();

      var $select = $('#REF_KOTA').selectize({
        options : data,
        valueField: 'NAMA',
        labelField: 'NAMA',
        searchField: 'NAMA',
      });
      var selectize = $select[0].selectize;
      if(REF_KOTA != null){
        selectize.setValue(REF_KOTA);
      }
      return true;
    },
    error: function(request, status, error) {
      alert(request.responseText);
      return false;
    }
  });

}

$('#REF_KOTA').on('change',function(){
 if(REF_KEC != ""){     
  district_ajax($(this).val(),REF_KEC);
}else{
 district_ajax($(this).val());
}
});

function district_ajax(REF_KOTA,REF_KEC = null){

  $.ajax({
    url: "{{route('district-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      REF_KOTA : REF_KOTA
    },
    success: function(data) {
      $('#REF_KEC').selectize()[0].selectize.destroy();

      var $select = $('#REF_KEC').selectize({
        options : data,
        valueField: 'NAMA',
        labelField: 'NAMA',
        searchField: 'NAMA',
      });
      var selectize = $select[0].selectize;
      if(REF_KEC != null){
        selectize.setValue(REF_KEC);
      }
      return true;
    },
    error: function(request, status, error) {
      alert(request.responseText);
      return false;
    }
  });

}

$('#REF_KEC').on('change',function(){
 if(REF_KEL != ""){     
  sub_district_ajax($(this).val(),REF_KEL);
}else{
  sub_district_ajax($(this).val());
}
});

function sub_district_ajax(REF_KEC,REF_KEL = null){

  $.ajax({
    url: "{{route('sub-district-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      REF_KEC : REF_KEC
    },
    success: function(data) {
     $('#REF_KEL').selectize()[0].selectize.destroy();

     var $select = $('#REF_KEL').selectize({
      options : data,
      valueField: 'NAMA',
      labelField: 'NAMA',
      searchField: 'NAMA',
    });
     var selectize = $select[0].selectize;
     if(REF_KEL != null){
      selectize.setValue(REF_KEL);
    }
    return true;
  },
  error: function(request, status, error) {
    alert(request.responseText);
    return false;
  }
});

}

$(document).ready(function(){
  $('#REF_NEGARA').selectize();
});

</script>
@endpush