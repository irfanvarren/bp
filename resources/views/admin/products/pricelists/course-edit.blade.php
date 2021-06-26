@extends('layouts.app-auth', ['activePage' => 'pricelists','activeMenu' => 'product-management', 'titlePage' => __('Price Lists')])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style media="screen">
  .loading-wrapper{
    width:100vw;
    height:100vh;
    position:fixed;
    top:0;
    left:0;
    z-index:9999999;
    display:none;
    background:rgba(255,255,255,1);
  }
  .loading-wrapper img{
    display:block;
    margin:0 auto;
    width:500px;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);

  }
  .form-group input[type=file]{
    position:relative !important;
    opacity:1 !important;
  }
</style>
@endpush
@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>

<div class="content">
  <h3>Tambahkan Cek Offer Letter / Cek tanggal test untuk bidang usaha test </h3>
  <div class="container-fluid">

    <div class="row">

      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb" style="background: white;">
            <li class="breadcrumb-item"><a href="{{url('admin/products/pricelists')}}">Pricelist</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/products/pricelist/'.urlencode(urlencode($pricelist_kd)).'/courses')}}">{{$pricelist_kd}}</a></li>

            <li class="breadcrumb-item"><a href="{{url('admin/products/pricelist/'.urlencode(urlencode($pricelist_kd)).'/courses?search='.$search)}}{{$kd != '' ? '&kd='.$search_kd : ''}}">{{ucwords($search)}} {{$search_kd != "" ? '('.$search_kd.')' : ''}}</a></li>
            
            
            <li class="breadcrumb-item active" aria-current="page">{{$course_packet_settings != "" ? $course_packet_settings->NAMA : ""}}</li>
          </ol>
        </nav>
      </div>
      <div class="col-12 text-right">
        <a href="{{url('admin/products/pricelist/'.urlencode(urlencode($pricelist_kd)).'/courses?search='.$search)}}{{$kd != '' ? '&kd='.$search_kd : ''}}" class="btn btn-sm btn-primary">{{ __('Back To List') }}</a>
      </div>
    </div>
    <div class="row">


      <div class="col-md-12">
        <form method="post" action="{{ route('admin.products.pricelist.course-update',$course_packet_settings)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Edit  {{$course_packet_settings != "" ? $course_packet_settings->NAMA : ""}}</h4>
            </div>
            <div class="card-body">
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
              <input type="hidden" name="KD" value="{{$kd}}">
              <input type="hidden" name="REF_PRICELIST" value="{{$pricelist_kd}}">
              <input type="hidden" name="search" value="{{$search}}">
              <input type="hidden" name="search_kd" value="{{$search_kd}}">
              <div class="row">
                <div class="col-md-7 mb-3">
                  <div class="row">
                   <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                   <div class="col-sm-10 col-form-label text-left">
                    <div class="togglebutton" >
                      <label id="status-ajax">
                        <input type="checkbox" id="status" class="status_input" @if($course_packet_settings->status) checked  @else @endif  name="status">
                        <span class="toggle"></span>
                      </label>
                      <span id="status-label" class="status-label" for="status">
                        @if($course_packet_settings->status) Active @else Non Active @endif
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-gambar">{{ __('Gambar') }}</label>
                  <div class="col-sm-10">
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
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Slug') }}</label>
                  <div class="col-sm-10">
                    @php
                    if($course_packet_settings->slug != ""){
                    $slug = $course_packet_settings->slug;
                  }else{
                  $slug = \Str::slug($course_packet_settings->NAMA);
                }
                @endphp
                <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="input-slug" type="text" placeholder="{{ __('Slug') }}" value="{{ old('slug',$slug) }}" required="true" aria-required="true"/>
                  @if ($errors->has('slug'))
                  <span id="name-error" class="error text-danger" for="input-slug">{{ $errors->first('slug ') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">{{__('Short Description')}}</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="3" name="short_description" id="short_description">{{$course_packet_settings ? $course_packet_settings->short_description : ""}}</textarea>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">
                {{__('Description')}}
              </label>
              <div class="col-sm-10">
                <div class="form-group{{ $errors->has('desc') ? ' has-danger' : '' }}">
                  <textarea class="form-control" rows="5" name="description" id="description">{{$course_packet_settings ? $course_packet_settings->description : ""}}</textarea>
                  @if ($errors->has('desc'))
                  <span id="desc-error" class="error text-danger" for="input-desc">{{ $errors->first('desc ') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">{{ __('Location') }}</label>
              <div class="col-sm-10">
                <div>
                  <select class="selectize form-control" name="locations" id="locations">
                    <option value="">- Select Location -</option>
                    @foreach($companies as $company)
                    <option value="{{$company->KD}}">{{$company->NAMA}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="row">
              <div class="col-sm-12">
                <div class="text-center">
                  {{__("Intakes")}}
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table class="table table-bordered">
                      <tr>
                        <th>Intake Date</th><th>End Date</th><th>Action</th>
                      </tr>
                      <tr>
                        <td>xx/xx/xxxx</td><td>xx/xx/xxxx</td><td>edit delete</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">{{__('Intake Date')}}</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="intake_date">
                  </div>
                </div>
                <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">{{__('End Date')}}</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="end_date">
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-sm-12 text-center">
                    <button class="btn btn-sm btn-primary">
                      Add Intake
                    </button>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="text-center mb-3">Course Schedules</div>
                <div class="row">
                  <div class="col-sm-12">
                    <table class="table table-bordered">
                      <tr>
                        <th>Hari Pelatihan</th> <th>Tanggal Pelatihan</th> <th>Actions</th>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="row" style="margin:0 -10px;">  
                  <div class="col-6 col-sm-4">
                    <div class="px-3">
                      <input type="checkbox" class="form-check-input" name="course_days" value="0">
                      <label class="form-check-label">
                        Senin
                      </label>
                    </div>
                  </div>
                  <div class="col-6 col-sm-4">
                    <div class="px-3">
                      <input type="checkbox" class="form-check-input" name="course_days" value="0">
                      <label class="form-check-label">
                        Selasa
                      </label>
                    </div>
                  </div>
                  <div class="col-6 col-sm-4">
                    <div class="px-3">
                      <input type="checkbox" class="form-check-input" name="course_days" value="0">
                      <label class="form-check-label">
                        Rabu
                      </label>
                    </div>
                  </div>
                  <div class="col-6 col-sm-4">
                    <div class="px-3">
                      <input type="checkbox" class="form-check-input" name="course_days" value="0">
                      <label class="form-check-label">
                        Kamis
                      </label>
                    </div>
                  </div>
                  <div class="col-6 col-sm-4">
                    <div class="px-3">
                      <input type="checkbox" class="form-check-input" name="course_days" value="0">
                      <label class="form-check-label">
                        Jumat
                      </label>
                    </div>
                  </div>
                  <div class="col-6 col-sm-4">
                    <div class="px-3">
                      <input type="checkbox" class="form-check-input" name="course_days" value="0">
                      <label class="form-check-label">
                        Sabtu
                      </label>
                    </div>
                  </div>
                  <div class="col-6 col-sm-4">
                   <div class="px-3">
                    <input type="checkbox" class="form-check-input" name="course_days" value="0">
                    <label class="form-check-label">
                      Minggu
                    </label>
                  </div>
                </div>
                <div class="col-sm-12 mb-2">
                  <div class="row">
                    <label class="col-sm-3 col-form-label">
                      Jam Pelatihan
                    </label>
                    <div class="col-sm-9">
                      <div>
                       <input type="text" class="form-control float-left" style="max-width:30%;" name=""> 
                       <span class="float-left mx-3" style="line-height: 36px;">-</span>
                       <input type="text" class="form-control float-left" style="max-width:30%;" name="">
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-sm-12 text-center">
                 <button class="btn btn-sm btn-primary" >
                   Add Schedules
                 </button>
               </div>
             </div>

           </div>
         </div>
       </div>

     </div>
   </div>

              <!--
              <div class="row">
                <label class="col-sm-2 col-form-label">Tanggal Test</label>
                <div class="col-sm-7" style="margin-bottom:30px;">
                  <div class="col-form-label text-left" >
                    <div class="form-check-inline">
                      <label class="form-check-label pr-3"> Events</label>
                      <input type="checkbox" name="check_test_date" id="check_test_date" class="form-check-input" onchange="if(this.checked){ $('#select-date').show() }else{ $('#select-date').hide() }">
                    </div> 
                    
                  </div>
                  <select id="select-date" class="form-control" style="display: none;">
                    <option>Pilih Tanggal Test</option>
                    @foreach($events as $event)
                    <option value="{{$event->id}}">{{$event->tgl_mulai}}</option>
                    @endforeach
                  </select>
                </div>
              </div> 
            -->

            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>

          </div>
        </form>
        <form method="post" action="{{ route('admin.products.pricelist.course-level-update',$course_packet_settings)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          <input type="hidden" name="REF_PAKET" value="{{$kd}}">
          <input type="hidden" name="REF_PRICELIST" value="{{$pricelist_kd}}">
          <input type="hidden" name="search" value="{{$search}}">
          <input type="hidden" name="search_kd" value="{{$search_kd}}">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Level</h4>
            </div>
            <div class="card-body">
              @foreach($levels as $level)

              <div class="col-md-12 py-2" style="border:1px solid #bebebe;">
                <div class="row py-2">
                  <div class="col-md-3">
                    Level
                  </div>
                  <div class="col-md-9">
                    <input type="hidden" name="kd_level[]" value="{{$level->REF_LEVEL}}">
                    {{$level->NAMA_LEVEL}}
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col-md-3 pt-2">
                    Description
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="description[]" value="{{$level->description}}">
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col-md-3">
                    Connect to Online Test ?
                  </div>
                  <div class="col-md-9">
                    <div class="row">
                      <div class="col-md-1">
                        <div class="form-check-inline">
                          <input type="checkbox" class="form-check-input" name="check_online_test" id="check-online-test" onchange="if(this.checked){ document.getElementById('online-test-wrapper').style.display = 'block' }else{ document.getElementById('online-test-wrapper').style.display = 'none' }" {{$level->online_test_id != "" ? 'checked' : ''}}>
                        </div>
                      </div>
                      <div class="col-md-11">
                        <div id="online-test-wrapper" {{$level->online_test_id != "" ? '' : 'style="display:none"'}}>
                          <div class="row">
                            <div class="col-md-2">
                              Select Test
                            </div>
                            <div class="col-md-10">
                              <select class="form-control" name="online_test_id[]">
                              <option value="">Select Online Test</option>
                              @foreach($online_tests as $test)
                              <option value="{{$test->id}}" {{$level->online_test_id == $test->id ? 'selected' : ''}}>{{$test->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>


                      </div>
                    </div>
                  </div>  
                </div>
              </div>
            </div>
            @endforeach
            <div class="text-center">
              <button class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>

  </div>
</div>
</div>
</div>

@endsection
@push('js')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
 $('#location').selectize({
  width : 'resolve'
});
</script>
@endpush