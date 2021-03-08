
@extends('layouts.app-auth', ['activePage' => 'schools', 'titlePage' => __('schools'),'activeMenu' => __('places-management')])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style media="screen">
.selectize-input input{
  padding:0 5px;
  border:none;
}
</style>
<script src="https://cdn.tiny.cloud/1/f6z5lr2himo4zp8d9hcbty9ls6fdl4g70v1vwx3k1gvskhx1/tinymce/5/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '#description',
    menubar: 'file edit insert view format table tools help',
    plugins: "image autosave code media hr image imagetools link lists pagebreak paste table",
    mediaembed_service_url: "{{asset('img')}}",
    menu: {
     file: { title: 'File', items: 'newdocument restoredraft | preview | print ' },
     edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
     view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
     insert: { title: 'Insert', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
     format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat' },
     tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
     table: { title: 'Table', items: 'inserttable tableprops deletetable row column cell' },
     help: { title: 'Help', items: 'help' }
   },
   toolbar: 'undo redo restoredraft | formatselect |  fontselect fontsizeselect bold italic underline forecolor backcolor |' +
   'alignleft aligncenter alignright alignjustify | bullist numlist | link image media table | outdent indent | removeformat pagebreak | help',
   powerpaste_word_import: "clean",
   powerpaste_html_import: "merge",
   paste_data_images: true,
   min_height:500
 });
</script>
@endpush
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('school.update',$school)}}" enctype="multipart/form-data" autocoschoollete="off" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit School') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{route('school.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('School Name') }}" value="{{ old('name',$school->name) }}"  aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Abbreviation') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="abbreviation" id="input-abbreviation" type="text" placeholder="{{ __('School Abbreviation') }}" value="{{ old('abbreviation',$school->abbreviation) }}"  aria-required="true"/>
                      @if ($errors->has('abbreviation'))
                        <span id="name-error" class="error text-danger" for="input-abbreviation">{{ $errors->first('abbreviation') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Logo')}}</label>

                  <div class="col-sm-7">
                    <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> <img src="{{asset('img/schools/logo_sekolah/'.$school->logo)}}" alt=""> </div>
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
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>

                  <div class="col-sm-9">
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                          <textarea name="description" class="form-control summernote" rows="4" id="description">{!!$school->description!!}</textarea>
                          @if ($errors->has('description'))
                            <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description ') }}</span>
                          @endif
                        </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>

                  <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email',$school->email) }}" aria-required="true"/>
                          @if ($errors->has('email'))
                            <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email ') }}</span>
                          @endif
                        </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Phone Number') }}</label>

                  <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" id="input-phone_number" type="text" placeholder="{{ __('Phone Number') }}" value="{{ old('phone_number',$school->phone_number) }}" aria-required="true"/>
                          @if ($errors->has('phone_number'))
                            <span id="phone_number-error" class="error text-danger" for="input-phone_number">{{ $errors->first('phone_number ') }}</span>
                          @endif
                        </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Website') }}</label>

                  <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('website') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" id="input-website" type="url" placeholder="{{ __('Website') }}" value="{{ old('website',$school->website) }}" aria-required="true"/>
                          @if ($errors->has('website'))
                            <span id="website-error" class="error text-danger" for="input-website">{{ $errors->first('website ') }}</span>
                          @endif
                        </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Working Days') }}</label>

                  <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('working_days') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('working_days') ? ' is-invalid' : '' }}" name="working_days" id="input-working_days" type="text" placeholder="{{ __('Working Days') }}" value="{{ old('working_days',$school->working_days) }}" aria-required="true"/>
                          @if ($errors->has('working_days'))
                            <span id="working_days-error" class="error text-danger" for="input-working_days">{{ $errors->first('working_days ') }}</span>
                          @endif
                        </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('address') }}</label>

                  <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('address') }}" value="{{ old('address',$school->address) }}" aria-required="true"/>
                          @if ($errors->has('address'))
                            <span id="address-error" class="error text-danger" for="input-address">{{ $errors->first('address ') }}</span>
                          @endif
                        </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Postal Code') }}</label>

                  <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('postal_code') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" id="input-postal_code" type="text" placeholder="{{ __('Postal Code') }}" value="{{ old('postal_code',$school->postal_code) }}" aria-required="true"/>
                          @if ($errors->has('postal_code'))
                            <span id="postal_code-error" class="error text-danger" for="input-phone_number">{{ $errors->first('postal_code ') }}</span>
                          @endif
                        </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('city') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('city_id') ? ' has-danger' : '' }}">
                      <div class="dropdown bootstrap-select col-sm-12 pl-0 pr-0">


                                  <select id="city_id" class="selectize" required name="city_id" style="width:100%;">

<!--                        <select class="selectpicker col-sm-12 pl-0 pr-0 " data-style="select-with-transition" id="region_id" name="region_id">-->
                          <option value="">- Select City -</option>

                          @foreach($cities as $key => $value)
                          <option value="{{$value->id}}" {{$value->id == $school->city_id ? "selected" : ""}}> {{$value->name.', '.$value->region_name.', '.$value->country_name}}</option>
                          @endforeach
                        </select>


                      </div>
                    </div>
                  </div>
                </div>
   				<div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Currency Code') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('currency_code') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('currency_code') ? ' is-invalid' : '' }}" name="currency_code" id="currency_code-input" type="text" placeholder="{{ __('Currency Code (ISO 4217)') }}" value="{{ old('currency_code') }}"  aria-required="true"/>
                      @if ($errors->has('currency_code'))
                        <span id="currency_code-error" class="error text-danger" for="input-currency_code">{{ $errors->first('currency_code ') }}</span>
                      @endif
                    </div>
                    <div> <strong> Only Input This Field If The Schools Didn't Use It's Own Country Currency In The Pricelist </strong> </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Enrollment Fee') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('enrollment_fee') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('enrollment_fee') ? ' is-invalid' : '' }}" name="enrollment_fee" id="enrollment_fee-input" type="text" placeholder="{{ __('Enrollment Fee') }}" value="{{ old('enrollment_fee',$school->enrollment_fee) }}"  aria-required="true"/>
                      @if ($errors->has('enrollment_fee'))
                        <span id="enrollment_fee-error" class="error text-danger" for="input-enrollment_fee">{{ $errors->first('enrollment_fee') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Intake') }}</label>

                  <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('intake') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('intake') ? ' is-invalid' : '' }}" name="intake" id="input-intake" type="date" placeholder="{{ __('Intake') }}" value="{{ old('intake',$school->intake) }}" aria-required="true"/>
                          @if ($errors->has('intake'))
                            <span id="intake-error" class="error text-danger" for="input-intake">{{ $errors->first('intake ') }}</span>
                          @endif
                        </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('edit School') }}</button>
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
$('#city_id').selectize({
width : 'resolve'
});

  </script>
@endsection
