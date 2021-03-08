@extends('layouts.user-dashboard')
@section('user-content')
<div class="col-md-12">
  <div class="row">
    <div class="col-md-12">
      <h4><strong>User Profile</strong></h4>
      <div>
        <hr>
      </div>
    </div>
    <div class="col-md-12 py-2">
     <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
      @csrf
      @method('put')

      <div class="row">
        <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>
        <div class="col-sm-9">
          <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
            @if ($errors->has('name'))
            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
            @endif
          </div>
        </div>
      </div>
      <div class="row ">
        <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
        <div class="col-sm-9">
          <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
            @if ($errors->has('email'))
            <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
            @endif
          </div>
        </div>
      </div>
      <div class="row ">
        <label class="col-sm-3 col-form-label">{{ __('Phone Number') }}</label>
        <div class="col-sm-9">
          <div class="form-group{{ $errors->has('no_telepon') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('no_telepon') ? ' is-invalid' : '' }}" name="no_telepon" id="input-no_telepon" type="text" placeholder="{{ __('Phone Number') }}" value="{{ old('no_telepon', auth()->user()->no_telepon) }}" required />
            @if ($errors->has('no_telepon'))
            <span id="no_telepon-error" class="error text-danger" for="input-no_telepon">{{ $errors->first('no_telepon') }}</span>
            @endif
          </div>
        </div>
      </div>
      <div class="row ">
        <label class="col-sm-3 col-form-label">{{ __('Gender') }}</label>
        <div class="col-sm-9 col-form-label">
          <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }}">
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="gender" value="Laki - laki" {{auth()->user()->gender == "Laki - laki" ? 'checked' : ''}}>
                laki - laki
              </label>
            </div>
            <div class="form-check-inline">
             <label class="form-check-label">
              <input type="radio" class="form-check-input" name="gender" value="Perempuan" {{auth()->user()->gender == "Perempuan" ? 'checked' : ''}}>
              perempuan
            </label>
          </div>
          @if ($errors->has('gender'))
          <span id="gender-error" class="error text-danger" for="input-gender">{{ $errors->first('gender') }}</span>
          @endif
        </div>
      </div>
    </div>
    <div class="row ">
      <label class="col-sm-3 col-form-label">{{ __('Birth Date') }}</label>
      <div class="col-sm-9">
        <div class="form-group{{ $errors->has('birth_date') ? ' has-danger' : '' }}">
          <div class="row">
            <div class="col-md-4">
             <input type="text" class="form-control" name="tanggal_lahir" placeholder="dd" pattern="[0-9]{2}" value="{{ auth()->user()->birth_date != '' ? explode('-',auth()->user()->birth_date)[2] : ''}}">
           </div>
           <div class="col-md-4">
             <input type="text" class="form-control" name="bulan_lahir" placeholder="mm" pattern="[0-9]{2}" value="{{ auth()->user()->birth_date != '' ? explode('-',auth()->user()->birth_date)[1] : ''}}">
           </div>
           <div class="col-md-4">
             <input type="text" class="form-control" name="tahun_lahir" placeholder="yyyy" pattern="[0-9]{4}" value="{{ auth()->user()->birth_date != '' ? explode('-',auth()->user()->birth_date)[0] : ''}}">
           </div>
         </div>

         @if ($errors->has('birth_date'))
         <span id="birth_date-error" class="error text-danger" for="input-birth_date">{{ $errors->first('birth_date') }}</span>
         @endif
       </div>
     </div>
   </div>
   <div class="row">
    <label class="col-sm-3 col-form-label" for="input-password">{{ __(' Password') }}</label>
    <div class="col-sm-9">
      <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" requried/>
        @if ($errors->has('password'))
        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
        @endif
      </div>
    </div>
  </div>
  <div class="row">
    <label class="col-sm-3 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
    <div class="col-sm-9">
      <div class="form-group">
        <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}" required />
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 text-right">
      <button class="btn btn-primary" type="submit">Save</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
@endsection