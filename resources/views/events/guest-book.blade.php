@extends('layouts.bp_wo_sidenav')
<style media="screen">

  .events-logo{
    display:block;
          max-width:100%;
    height:100px;margin:10px auto;
  }
  @media screen and (max-width:480px){
    .events-logo-wrapper
    {
      width:50% !important;
    }
    .events-logo{

      height:75px !important;
    }
  }
</style>
@section('content')

<div class="content-wrapper col-md-12">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(session()->has('message'))

          <div class="alert alert-success" style="text-align:center">
            {!! session()->get('message') !!} <br>

            <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
          </div>
          @endif
            <div class="card">
                <div class="card-header" style="text-align:center;">
                  <h3>E-Guest Book</h3>

                  <h5 style="text-transform:capitalize;margin-bottom:0;">{{$events->nama}}</h5>
                </div>

                <div class="card-body">
                  @if(!empty($logo))

                  <div class="form-group row justify-content-center" style="padding-bottom:10px;">

                    @foreach($logo as $data_logo)
                <div class="col-md-4 col-lg-3 events-logo-wrapper">

                  <img class="events-logo" src="{{Storage::disk('events')->url($data_logo->lokasi_logo)}}" alt="">
                  </div>

                  @endforeach
                  </div>

                @endif

                    <form method="POST" action="{{url('events/'.$events->kd.'/guest-book') }}">
                        @csrf
                        <input type="hidden" name="event" value="{{$events->nama}}">
                        <input type="hidden" name="redirect_email" value="{{$events->redirect_email}}">
                        <input type="hidden" name="kd" value="{{$events->kd}}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_telepon" class="col-md-4 col-form-label text-md-right">{{ __('No Telepon') }}</label>

                            <div class="col-md-6">
                                <input style="text-align:lowercase;" id="no_telepon" type="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ old('no_telepon') }}" autocomplete="no_telepon">

                                @error('no_telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        @if ($events->sosmed_ig == 1)
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Instagram') }}</label>

                              <div class="col-md-6">
                                  <input id="kelas" type="text" class="form-control @error('sosmed_ig') is-invalid @enderror" name="sosmed_ig" value="{{ old('sosmed_ig') }}" autocomplete="off" autofocus>

                                  @error('sosmed_ig')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                        @endif
                        @if ($events->data_kelas == 1)
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Kelas') }}</label>
                            @if($events->minat_jurusan == 1)
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                  
                                  <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}" placeholder="Kelas" required autocomplete="kelas" autofocus>

                                  @error('kelas')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-md-6">
                                  
                                  <input id="kelas" type="text" class="form-control @error('minat_jurusan') is-invalid @enderror" name="minat_jurusan" value="{{ old('minat_jurusan') }}" placeholder="Jurusan yang diminati" autocomplete="off" autofocus>

                                  @error('minat_jurusan')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                                </div>
                            </div>
                              
                            @else
                              <div class="col-md-6">
                                  <input id="kelas" type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}" required autocomplete="kelas" autofocus>

                                  @error('kelas')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              @endif
                          </div>

                        @endif
                        <div class="form-group row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-8">
                              <div class="form-check-inline">

                                <input type="checkbox" name="agree" id="agree" class="form-check-input" value=""> <label class="form-check-label" for=""> Setuju dengan <a href="{{url('/events/term-and-condition')}}" target="blank">Syarat & Ketentuan</a>

                              </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submit" class="btn btn-primary" disabled>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
document.getElementById('agree').addEventListener('change', function() {
  if (this.checked) {
    document.getElementById('submit').disabled = false;
  } else {
    document.getElementById('submit').disabled = true;
  }
});
function close_alert() {
  $('.alert').hide();
}
$("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 5000 ); // 5 secs

});
</script>
@endsection
