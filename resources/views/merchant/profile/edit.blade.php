@extends('layouts.app-auth', ['activePage' => 'profile','activeMenu' => 'users-management', 'titlePage' => __('User Profile')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('merchant-profile.update') }}" autocomplete="off" class="form-horizontal">
          @csrf
          @method('put')

          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Edit Profile') }}</h4>
              <p class="card-category">{{ __('User information') }}</p>
            </div>
            <div class="card-body ">
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
              <div class="row mt-3">
                <div class="col-lg-3">
                  <div style="float:right;max-width: 200px;">
                    <div class="text-center">
                      <h3 class="mt-0">QR Code</h3>
                    </div>
                    <div style="border:1px solid black;padding:10px;">
                      <img style="width: 100%;" src="data:image/png;base64,{!!base64_encode(QrCode::format('png')->merge('https://bestpartnereducation.com/public/img/logo-qrcode.png', .25, true)->size(300)->generate(url('member-les/merchant/'.auth('merchant')->user()->slug)))!!}">
                    </div>
                  </div>
                </div>
                <div class="col-lg-9">
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                    <div class="col-sm-7">

                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth('merchant')->user()->name) }}" required="true" aria-required="true"/>
                        @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Domain') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                        <div class="input-group">
                          <span style="margin: 8px 10px 0 0;">{{url('merchant/')}}/</span>
                          <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Email') }}" value="{{ old('slug', auth('merchant')->user()->slug) }}" required />

                        </div>
                        @if ($errors->has('Domain'))
                        <span id="email-error" class="error text-danger" for="input-slug">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth('merchant')->user()->email) }}" required />
                        @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('No Telepon') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('no_telepon') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('no_telepon') ? ' is-invalid' : '' }}" name="no_telepon" id="input-no_telepon" type="text" placeholder="{{ __('No. Telepon') }}" value="{{ old('no_telepon', auth('merchant')->user()->no_telepon) }}" required />
                        @if ($errors->has('no_telepon'))
                        <span id="no_telepon-error" class="error text-danger" for="input-no_telepon">{{ $errors->first('no_telepon') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Alamat') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('alamat') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" id="input-alamat" type="text" placeholder="{{ __('Alamat') }}" value="{{ old('alamat', auth('merchant')->user()->alamat) }}" required />
                        @if ($errors->has('alamat'))
                        <span id="alamat-error" class="error text-danger" for="input-alamat">{{ $errors->first('alamat') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Kode Pos') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('kode_pos') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('kode_pos') ? ' is-invalid' : '' }}" name="kode_pos" id="input-kode_pos" type="text" placeholder="{{ __('Kode Pos') }}" value="{{ old('kode_pos', auth('merchant')->user()->kode_pos) }}" required />
                        @if ($errors->has('kode_pos'))
                        <span id="kode_pos-error" class="error text-danger" for="input-kode_pos">{{ $errors->first('kode_pos') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('SIUP') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('siup') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('siup') ? ' is-invalid' : '' }}" name="siup" id="input-siup" type="text" placeholder="{{ __('SIUP') }}" value="{{ old('siup', auth('merchant')->user()->siup) }}" required />
                        @if ($errors->has('siup'))
                        <span id="siup-error" class="error text-danger" for="input-siup">{{ $errors->first('siup') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-gambar">{{ __('Logo') }}</label>
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
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
          @csrf
          @method('put')

          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Change password') }}</h4>
              <p class="card-category">{{ __('Password') }}</p>
            </div>
            <div class="card-body ">
              @if (session('status_password'))
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>{{ session('status_password') }}</span>
                  </div>
                </div>
              </div>
              @endif
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Current Password') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                    @if ($errors->has('old_password'))
                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                    @if ($errors->has('password'))
                    <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
