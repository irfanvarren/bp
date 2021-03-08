@extends('layouts.app-auth', ['dashboard' => 'admin','activePage' => 'events','activeMenu' => 'data-management', 'titlePage' => __('events')])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('dropzone/dropzone.css')}}">
<script src="https://cdn.tiny.cloud/1/f6z5lr2himo4zp8d9hcbty9ls6fdl4g70v1vwx3k1gvskhx1/tinymce/5/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '.tinymce-editor',
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
   min_height:350
 });
</script>
<style media="screen">
  #mymodal{
    padding-right:0;
  }
  #mymodal .modal-dialog{
    margin:auto;
  }
  .loading-wrapper {
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999999;
    display: none;
    background: rgba(255, 255, 255, 1);
  }

  .loading-wrapper img {
    display: block;
    margin: 0 auto;
    width: 500px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

  }

  .form-group input[type=file] {
    position: relative !important;
    opacity: 1 !important;
  }
  .event-btn:active{
    background: linear-gradient(60deg, #ab47bc, #8e24aa) !important;
  }
  .event-btn.active{
    background: linear-gradient(60deg, #ab47bc, #8e24aa) !important;
  }
  .event-btn:hover{
    background: linear-gradient(60deg, #ab47bc, #8e24aa);
  }
  .dropzone {
    border: 2px dashed #dedede; 
    border-radius: 5px;
    background: #f5f5f5;
  }

  .dropzone i{
    font-size: 5rem;
  }

  .dropzone .dz-message {
    color: rgba(0,0,0,.54);
    font-weight: 500;
    font-size: initial;
    text-transform: uppercase;
  }
  .dropzone .dz-image img{
    max-width: 100%;
    width: 100%;
    position: relative;
  }
  .dropzone .dz-progress{
    display: none;
  }
  .dropzone .dz-remove{
    margin-top: 10px;
  }
  .dropzone .dz-image{
    width:180px !important;
  }
  .list-group-item{
    border: 1px solid rgba(0,0,0,.125);
    margin-bottom:-1px;
  }
  .exhibitors-list .list-group-item{
    line-height: 25px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .exhibitors-list .list-group-item:hover{
    cursor: pointer;
  }
  .exhibitors-list .list-group-item i.fa-caret-right{
    float: right;
    margin:0 8px;
    line-height: 25px;
  }
  .horizontal-scrollable { 
    overflow-x: auto; 
  } 
  .booth{
    padding:15px;
  }
  .booth:hover{
    cursor:pointer;
    background:#45abf5;
  }
  .booth.selected{
    background:#1d6da8;
  }

</style>

@endpush
@section('content')

<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="modal fade p-0" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mymodal mt-auto" style="max-width:80%;" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Expo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pb-5">
        <div class="row exhibitors-list-wrapper">
          <div class="w-75 d-block mx-auto">
            <div class="row mb-5">
              <div class="col-md-12">
                <form id="lobby-form" method="POST" enctype="multipart/form-data">
                 <div> <h5>Lobby / Landing Page</h5></div>
                 <div class="row">
                  <div class="col-md-8">
                    <div id="preview-background" style="max-height: 400px;overflow:hidden;height: 400px;background:url('{{asset('events/empty-mall.jpg')}}');background-size: cover; background-position: center;">
                      <div  style="background:rgba(0,0,0,0.6);display: block;margin:0 auto;width:80%;max-height: 130px;margin-top:80px;padding:15px;color:white;text-align:center;font-family: 'Roboto';word-break: break-word;overflow:none;">
                        <h1 style="font-size:32px;margin-bottom:10px;" id="title-preview"></h1>
                        <div style="font-size:18px;" id="description-preview">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                      <label class="col-form-label col-md-12"> Select Image</label>
                      <div class="col-md-12">
                        <input type="file" name="lobby_gambar" id="lobby_gambar" onchange="select_image_background(this)">
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-form-label col-md-12"> Title </label>
                      <div class="col-md-12">
                        <input type="text" class="form-control" id="lobby-title" name="title" onkeyup="change_title(this)" id="title">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-form-label">Description</div>
                      <div class="col-md-12">
                        <textarea class="form-control" id="lobby-description" rows="3" name="description" onkeyup="change_description(this)"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <button type="button" class="btn btn-primary mt-3" id="lobby-btn" value="save" onclick="add_lobby()">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <ul class="list-group exhibitors-list" id="exhibitors-output">
            <li class="list-group-item list-group-item-action text-center p-3"><h5 class="m-0">Exhibitors</h5></li>
            <li class="list-group-item text-center p-0">
              <div id="exhibitors-list-output"></div>
            </li>
            <li class="list-group-item list-group-item-action active" onclick="$('#exhibitors-panel').toggle()"><span> <i class="fa fa-plus mr-2"></i> Tambah Exhibitors</span></li>
          </ul>
          <div class="panel" id="exhibitors-panel" style="display:none;border:1px solid rgba(0,0,0,.125);padding: 0.75rem 0;">
            <form id="exhibitors-form" action="" method="POST" enctype="multipart/form-data" autocomplete="false">
              <div class="col-md-12">
                <div class="row form-group">
                  <div class="col-md-3 col-form-label">
                    Type
                  </div>
                  <div class="col-md-9 col-form-label">
                    <div class="form-check-inline">
                     <label class="from-check-label m-0">
                      <input type="hidden" name="id">
                      <input type="radio" class="form-check-input" name="exhibitors_type" id="exhibitors-type-school" checked="" value="school">
                      School (Search from search engine)
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <label class="from-check-label m-0">
                      <input type="radio" class="form-check-input" name="exhibitors_type" id="exhibitors-type-other" value="other">
                      Other
                    </label>
                  </div>
                </div>
              </div>
              <div class="row form-group" id="school-exhibitors">
                <div class="col-md-3 col-form-label">
                  School
                </div>
                <div class="col-md-9">
                  <select required class="selectize form-control" id="school_id" name="school_id" onchange="select_school()">
                    <option value="">- Select schools -</option>

                    @foreach($schools as $key => $value)
                    <option value="{{$value->id}}"> <strong> {{$value->name}}  </strong> ({{$value->address.', '.$value->city_name.', '.$value->region_name.', '.$value->country_name}})</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row" id="other-exhibitors">
                <div class="col-md-12">
                  <div class="row form-group">
                    <div class="col-md-3 col-form-label">
                      Nama
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="name" id="name">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-3 col-form-label">
                      Country
                    </div>
                    <div class="col-md-9">
                      <select class="form-control selectize" name="country_id" id="country_id">
                        <option value="">- Select Country -</option>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>

                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-3 col-form-label">
                      About
                    </div>
                    <div class="col-md-9">
                      <textarea class="tinymce-editor" id="about" name="about"></textarea>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-3 col-form-label">
                      Logo
                    </div>
                    <div class="col-md-9">
                     <div>
                      <input type="file" name="file_logo" id="file_logo" class="form-control d-none"> <div style="width:250px;border: 1px solid #d8d8d8;float:left;margin:0.3125rem 0;padding:0.03rem 0.5rem;line-height: 27px;white-space: nowrap;font-size:13px;overflow: hidden;text-overflow: ellipsis;" id="file-logo-value">&emsp;</div> <button class="btn btn-sm btn-primary float-left" type="button" id="file-logo-button">Select File</button>
                    </div>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-3 col-form-label">
                    Booth
                  </div>
                  <div class="col-md-9 horizontal-scrollable p-3">
                    <div class="row flex-row flex-nowrap">
                      <input type="hidden" name="booth" id="booth">
                      <div class="col-md-3 my-2 text-center booth" onclick="select_booth(this,'1')">
                        <img src="{{asset('events/booths/1.png')}}" style="max-width:100%;">
                      </div>
                      <div class="col-md-3 my-2 text-center booth" onclick="select_booth(this,'2')">
                        <img src="{{asset('events/booths/2.png')}}" style="max-width:100%;">
                      </div>
                      <div class="col-md-3 my-2 text-center booth" onclick="select_booth(this,'3')">
                        <img src="{{asset('events/booths/3.png')}}" style="max-width:100%;">
                      </div>
                      <div class="col-md-3 my-2 text-center booth" onclick="select_booth(this,'4')">
                        <img src="{{asset('events/booths/4.png')}}" style="max-width:100%;">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-3 col-form-label">
                    Course
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="selectize-course" name="course">
                  </div>
                </div>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <button class="btn btn-primary" id="exhibitor-btn" type="button" value="save" onclick="save_exhibitors()">Save</button>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>  
  <div class="row exhibitors-detail-wrapper" style="display: none;">
    <div class="card">
      <div class="card-header card-header-tabs card-header-rose">
        <div class="nav-tabs-navigation">
          <div class="nav-tabs-wrapper">
            <span class="nav-tabs-title">Select:</span>
            <ul class="nav nav-tabs" data-tabs="tabs">
             <li class="nav-item">
              <a class="nav-link" href="#brochures" data-toggle="tab" onclick="open_brochures()" id="open-brochures">
                <i class="material-icons">work</i> Brochures
                <div class="ripple-container"></div>
                <div class="ripple-container"></div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#videos" data-toggle="tab" onclick="open_videos()" id="open-videos">
                <i class="material-icons">work</i> Videos
                <div class="ripple-container"></div>
                <div class="ripple-container"></div>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#photos" data-toggle="tab" onclick="open_photos()" id="open-photos">
                <i class="material-icons">work</i> Photos
                <div class="ripple-container"></div>
                <div class="ripple-container"></div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card-body">
     <div class="tab-content">
      <div class="tab-pane active show" id="brochures">
        <div class="table-responsive" id="brochures-output"></div>
        <div class="table-responsive">
          <form  id="form-brochure" method="POST" action="" enctype="multipart/form-data">


            <table class="table">
              <tr>
                <td>File Name</td> <td>
                  <input type="hidden" name="id" id="brochure-id">
                  <input type="text" name="name" id="name" class="form-control"></td>
                  <td rowspan="2" class="text-center"> <button type="button" rel="tooltip" title="" id="brochure-btn" onclick="add_brochure(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
                    data-original-title="Tambah">
                    <i class="material-icons">add</i> <span>Add</span>
                  </button></td>
                </tr>
                <tr>
                  <td>File Name</td> <td>
                    <div>
                      <input type="file" name="brochure" id="brochure" class="form-control d-none"> <div style="width:250px;border: 1px solid #d8d8d8;float:left;margin:0.3125rem 0;padding:0.03rem 0.5rem;line-height: 27px;white-space: nowrap;font-size:13px;overflow: hidden;text-overflow: ellipsis;" id="file-value">&emsp;</div> <button class="btn btn-sm btn-primary float-left" type="button" id="file-button">Select File</button>
                    </div>
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
        <div class="tab-pane" id="videos">
          <div class="table-responsive" id="videos-output"></div>
          <div class="table-responsive">
            <form  id="form-video" method="POST" action="" enctype="multipart/form-data">
              <table class="table">
                <tr>
                  <td>Title</td> <td>
                    <input type="hidden" name="id" id="video-id">
                    <input type="text" name="title" id="title" class="form-control"></td>
                    <td rowspan="2" class="text-center"> <button type="button" rel="tooltip" title="" id="video-btn" onclick="add_video(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add"
                      data-original-title="Tambah">
                      <i class="material-icons">add</i> <span>Add</span>
                    </button></td>
                  </tr>
                  <tr>
                    <td>Description</td> <td>
                      <div>
                        <textarea name="description" id="description" class="form-control"></textarea>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="align-top">Youtube Video Id</td>
                    <td >
                      <div><input type="text" name="vid" id="vid" class="form-control"></div>
                      <div class="row">
                        <div class="col-md-12 pt-4"><h5>Cara Mendapatkan Id Video Youtube</h5></div>
                        <div class="col-md-6">
                          <h5>Contoh 1</h5>

                          <ol class="pl-3">
                           <li class="pb-2">Buka video youtube yang ingin dimasukkan</li>
                           <li class="pb-2"><p>Pada link youtube, copykan kode yang berada pada link / url :  https://www.youtube.com/watch?v=<span title="Copykan kode ini" style="padding:3px;background-color:yellow;color:black;">xxxxxxxxxxxxxx</span> </p>
                             <img src="{{asset('img/events/youtube-video-id/contoh1.PNG')}}" style="max-width: 100%">
                           </li>
                         </ol>
                       </div>
                       <div class="col-md-6">
                        <h5>Contoh 2</h5>

                        <ol class="pl-3">
                         <li class="pb-2">Buka video youtube yang ingin dimasukkan</li>
                         <li class="pb-2"><p> Tekan tombol share </p>
                           <img src="{{asset('img/events/youtube-video-id/contoh2.PNG')}}" style="max-width: 100%">
                         </li>
                         <li class="pb-2"><p> Setelah muncul popup, copykan kode yang berada pada link / url :  https://youtu.be/<span title="Copykan kode ini" style="padding:3px;background-color:yellow;color:black;">xxxxxxxxxxxxxx</span> </p>
                           <img src="{{asset('img/events/youtube-video-id/contoh3.PNG')}}" style="max-width: 100%">
                         </li>
                       </ol>
                     </div>

                   </div>
                 </td>
               </tr>
             </table>
           </form>
         </div>
       </div>
       <div class="tab-pane" id="photos">
        <div
        class="dropzone dz-clickable"
        id="my-dropzone">

        <div class=" dz-message d-flex flex-column" style="display: flex;" onclick="dropzone_file_dialog()">
          <i class="material-icons text-muted">cloud_upload</i>
          Drag &amp; Drop here or click
        </div>

        <div class="fallback">
          <input name="file" type="file" multiple />
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="row">
        <button class="btn btn-primary" onclick="toggle_exhibitors_detail(event)">Back</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('events') }}</h4>
            <p class="card-category"> {{ __('Here you can manage events') }}</p>
          </div>
          <div class="card-body">
            @csrf
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
            <div class="row">
              <div class="col-12 text-right">
                <a href="{{ route('admin-events.create') }}" class="btn btn-sm btn-primary">{{ __('Add Events') }}</a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <a class="btn {{$type_id == 'all' ? 'btn-primary' : 'btn-warning'}} event-btn" href="{{url('admin/events/')}}">All Events</a>

                @foreach($events_types as $events_type)
                <a class="btn {{$type_id == $events_type->id ? 'btn-primary' : 'btn-warning'}} event-btn" href="{{url('admin/events/event-type/'.$events_type->id)}}">{{$events_type->name}}</a>
                @endforeach
              </div>
            </div>
            <div class="table-responsive" id="event-output">
              <table class="table">
                <colgroup>
                  <col width="17.5%">
                  <col>
                  <col>
                  <col width="25%">
                  <col>
                </colgroup>
                <thead class=" text-primary">
                  <th>
                    {{ __('Nama') }}
                  </th>
                  <th>
                    {{ __('Jenis Event')}}
                  </th>
                  <th>
                    {{ __('Preview Link') }}
                  </th>
                  <th>Jumlah Terdaftar</th>
                  <th>
                    {{__('Durasi')}}
                  </th>
                  <th>
                    {{__('Status')}}
                  </th>
                  <th class="text-center">
                    {{ __('Actions') }}
                  </th>
                </thead>
                <tbody>
                  @foreach($events as $key => $data)
                  <tr>
                    <td>
                      {{ $data->nama }} 
                      @if($data->event_type_id == 2)
                      <div>Module : {{$data->test_module}}</div>
                      @endif
                    </td>
                    <td>{{ $data->nama_jenis_event}}</td>
                    <td>
                      @if($data->event_type_id != 6)
                      <a href=" {{url("/events/".$data->kd."/guest-book")}}">
                        Form
                      </a>
                      |
                      <a href=" {{url("admin/events/data-guestbook/".$data->kd)}}">
                        Data
                      </a>
                      @else
                      <a href="{{url('admin/events/data-contactus/'.$data->id)}}">Contact Us      </a> 
                      @endif
                    </td>

                    <td>@if($data->event_type_id != 6) {{$data->jlh}} @else  {{$data->articles->contactus->count()}} @endif</td>


                    <td>
                      {{$data->tgl_mulai.' '.$data->jam_mulai}}
                      @if ($data->tgl_selesai || $data->jam_selesai)
                      <br> to <br>
                      {{$data->tgl_selesai.' '.$data->jam_selesai}}
                      @endif
                    </div>
                  </td>

                  <td>
                   <div class="togglebutton" >
                    <label id="status-ajax">
                      <input type="checkbox" id="status-{{$key}}" onchange="change_status('#status-label-{{$key}}','{{$data->id}}',this)" class="status_input" name="status" {{$data->status == 1 ? "checked" : ""}}>
                      <span class="toggle"></span>
                    </label><br>
                    <span class="status-label" id="status-label-{{$key}}" for="status">{{$data->status == "1" ? "Active" : "Inactive"}}</span>
                  </div>
                </td>
                <td class="text-center">
                  <form action="{{ route('admin-events.destroy', $data) }}" method="post">
                    @csrf
                    @method('delete')
                    @if($data->event_type_id == 1)
                    <button type="button" class="btn btn-primary btn-link" onclick="open_modal('{{$data->id}}')">
                      <i class="material-icons">menu</i>
                      <div class="ripple-container"></div>
                      <div class="">
                        More
                      </div>
                    </button>
                    @endif
                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin-events.edit', $data) }}" data-original-title="" title="">
                      <i class="material-icons">edit</i>
                      <div class="ripple-container"></div>
                      <div class="">
                        Edit
                      </div>
                    </a>
                    <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this events?") }}') ? this.parentElement.submit() : ''">
                      <i class="material-icons">close</i>
                      <div class="ripple-container"></div>
                      <div class="">
                        Delete
                      </div>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
        <div class="row" id="pagination-wrapper">
          {{$events->links()}}
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
@push('js')

<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script src="{{asset('dropzone/dropzone.js')}}"></script>
<script>  
  $('.selectize').selectize({
    width : 'resolve'
  }); 

  $('#selectize-course').selectize({
    delimiter: '|',
    persist: false,
    valueField: 'tag',
    labelField: 'tag',
    searchField: 'tag',
    create: function(input) {
      return {
        tag: input
      }
    }
  });      


  var token = $("input[name='_token']").val();
  var event_id;
  var exhibitor_id;
  var public_url = "{{asset('')}}";

  function refreshToken(){
    $.get('refresh-csrf').done(function(data){
                    token = data; // the new token
                  });
  }


  $('input[name=exhibitors_type]').on('change',function(){
    reset_exhibitor_form("partial");
    if(this.value == "school"){
      $('#school-exhibitors').show();
    }else{
      $('#school-exhibitors').hide();
    }
  });

  function reset_exhibitor_form(resetCmd){
    if(resetCmd != "partial"){
      $('#exhibitor-btn').prop("value", "save");
      $('#exhibitor-btn').html("SAVE");
    }
    var exhibitorsForm = document.getElementById('exhibitors-form');
    var $select_school = $(exhibitorsForm.school_id).selectize();  
    var selectize_school = $select_school[0].selectize; 

    $('.booth').removeClass('selected');
    $('#booth').val("");
    selectize_school.clear();
    exhibitorsForm.name.value = "";
    tinymce.get("about").setContent("");
    $('#file-logo-value').html("&emsp;");
    var $select = $(exhibitorsForm.country_id).selectize();  
    var selectize = $select[0].selectize; 
    selectize.clear();
    var $select_course = $('#selectize-course').selectize();
    var selectize_course = $select_course[0].selectize;
    selectize_course.clearOptions();
  }

  Dropzone.autoDiscover = false;
  var myDropzone = new Dropzone("div#my-dropzone", 
  {
    url: "{{route('expo_photo-ajax')}}",
    addRemoveLinks:true,
    accept: function(file, done) {
      done();
    }
  }
  );
  myDropzone.on("removedfile",function(file){
    $.ajax({
     type: 'POST',
     url: "{{route('expo_photo-ajax')}}",
     data: {_token:token,id:file.id,path: file.path,cmd: "delete"},
     success: function(data){

     }
   });

    var _ref;
    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
  });
  myDropzone.on("sending", function(file, xhr, data){
    data.append("_token",token);
    data.append("event_id",event_id);
    data.append("cmd","add");
    data.append("exhibitor_id",exhibitor_id);
  });

  myDropzone.on("success",function(file,responseText){
    file.id = responseText[responseText.length - 1].id;
    file.path = responseText[responseText.length - 1].path;
  });

  myDropzone.on("addedfile",function(file){

  });

  
  function dropzone_file_dialog(){
    myDropzone.hiddenFileInput.click();
  }

  $('#file-button').click(function () {
    $("#brochure").trigger('click');
  });

  $('#file-logo-button').click(function () {
    $("#file_logo").trigger('click');
  });

  $("#brochure").change(function () {
    $('#file-value').text(this.value.replace(/C:\\fakepath\\/i, ''))
  });

  $("#file_logo").change(function () {
    $('#file-logo-value').text(this.value.replace(/C:\\fakepath\\/i, ''))
  });
  function open_modal(id) {
    event_id = id;
          //open_brochures();
          var exhibitorsForm = document.getElementById('exhibitors-form');
          if(exhibitorsForm.exhibitors_type.value == "school"){
            $('#school-exhibitors').show();
          }else{
            $('#school-exhibitors').hide();

          }
          $.ajax({
            url : "{{route('event-exhibitors-list')}}",
            method: "GET",
            data:{
              _token: token,
              event_id: event_id,
            },success:function(data){
              var data_arr = data.split("###");
              var exhibitors_list = data_arr[0];
              var lobby_data = data_arr[1].trim();
              var url = "{{asset('events')}}/";
              if(lobby_data != "" && lobby_data != null){
                lobby_data = JSON.parse(lobby_data);
                $('#title-preview').html(lobby_data.title);
                $('#description-preview').html(lobby_data.description);
                $('#lobby-title').val(lobby_data.title);
                $('#lobby-description').val(lobby_data.description);

                if(lobby_data.background != "" && lobby_data.background != null){
                  $('#preview-background').css({'background-image' : 'url('+url+lobby_data.background+')'});
                }else{
                  $('#preview-background').css({'background-image' : 'url('+url+'empty-mall.jpg)'});
                }
              }else{
                $('#title-preview').html("");
                $('#description-preview').html("");
                $('#lobby-title').val("");
                $('#lobby-description').val("");
                $('#preview-background').css({'background-image' : 'url('+url+'empty-mall.jpg)'});
              }

              
              $("#exhibitors-list-output").html(exhibitors_list);
            },error:function(){
              alert('error');
            }
          });
          $('#mymodal').modal('toggle');
        }

        $("#mymodal").on('hidden.bs.modal', function(){
          $('.exhibitors-detail-wrapper').hide();
          $('.exhibitors-list-wrapper').show();
          $('#exhibitors-panel').hide();
          reset_exhibitor_form();

        });

        function toggle_exhibitors_detail(e,id){
          if($(e.target).is(".exhibitors-nav")) {
            e.stopPropagation();
            e.preventDefault();
            return false;
          }
          if(id != ""){
            exhibitor_id = id;
            $("#open-brochures").trigger('click');
          }
          $('.exhibitors-detail-wrapper').toggle();
          $('.exhibitors-list-wrapper').toggle();
        }

        function change_status(label,id,evt){

          var status = evt.checked;
          var token = $("input[name='_token']").val();
          if(evt.checked == true){

            if(confirm("Are you sure want to change this status ?")){
             $('.loading-wrapper').show();
             $(label).html("Active");
             $.ajax({
              url: "{{route('admin-events.change_status')}}",
              method: 'POST',
              data: {
                _token: token,
                id:id,
                status: status
              },
              success: function(data) {
                $('#output').html(data);
              },
              error: function() {
          //handle errors
          alert('error...');
        },complete: function(){
          $('.loading-wrapper').hide();
        }
      });
           }else{
            evt.checked = false;
          }
        }else{
         if(confirm("Are you sure want to change this status ?")){
          $('.loading-wrapper').show();
          $(label).html("Inactive");
          $.ajax({
            url: "{{route('admin-events.change_status')}}",
            method: 'POST',
            data: {
              _token: token,
              id:id,
              status: status
            },
            success: function(data) {
              $('#output').html(data);
            },
            error: function() {
                  //handle errors
                  alert('error...');
                },complete: function(){
                  $('.loading-wrapper').hide();
                }
              });
        }else{
          evt.checked = true;
        }


      }


    }

    function select_school(){
      var school_id = $('#school_id').val();
      $.ajax({
        url: "{{route('select-exhibitor-school')}}",
        method: "GET",
        data:{
          _token:token,
          school_id : school_id
        },success:function(data){
          data = JSON.parse(data);
          var exhibitorsForm = document.getElementById('exhibitors-form');
          exhibitorsForm.name.value = data.name;
          exhibitorsForm.country_id.value = data.country_id;

         var $select = $(exhibitorsForm.country_id).selectize();  // This initializes the selectize control
        var selectize = $select[0].selectize; // This stores the selectize object to a variable (with name 'selectize')

        selectize.setValue(data.country_id, false);
        $('#file-logo-value').html(data.logo);
        tinymce.get("about").setContent(data.description);
        var $select_course = $('#selectize-course').selectize();
        var selectize_course = $select_course[0].selectize;

        selectize_course.clearOptions();

        $.each(data.course.split("|"),function(k,v){
          if(v != ""){
            selectize_course.addOption({tag:v});
            selectize_course.addItem(v);
          }
        });
        selectize_course.refreshItems();

      },error:function(error){

      }
    });
    }

    function save_exhibitors(){
      $('.loading-wrapper').show();
      var exhibitorsForm = document.getElementById('exhibitors-form');
      var type = exhibitorsForm.exhibitors_type.value;
      var data = new FormData(exhibitorsForm);
      var cmd = $('#exhibitor-btn').prop("value");
      data.append('_token',token);
      data.append('event_id',event_id);
      data.append('type',type);
      data.append('about',tinymce.get("about").getContent());
      data.append('cmd',cmd);
      $.ajax({
        url:"{{route('save_exhibitors')}}",
        method: "POST",
        data:data,
        contentType: false,
        processData: false,
        success:function(data){
          $('#exhibitors-output').html(data);

        },error:function(data){
          alert('error');
        },complete:function(){

         exhibitorsForm.exhibitors_type[0].checked = true;
         $('#exhibitors-panel').show();
         reset_exhibitor_form();
         $('.loading-wrapper').hide();
       }
     });
    }
    
    function edit_exhibitor(id,school_id,country_id,name,about,logo,booth,course){
     var data = {
      id:id,
      school_id : school_id,
      country_id: country_id,
      name:name,
      about:about,
      logo:logo,
      course:course
    };
    $('#exhibitor-btn').prop("value", "update");
    $('#exhibitor-btn').html("Update");
    var exhibitorsForm = document.getElementById('exhibitors-form');
    exhibitorsForm.id.value = data.id;
    $('#exhibitors-panel').show();
    var booth_image = $('.booth')[booth-1];
    $('#booth').val(booth);
    $('.booth').removeClass('selected');
    $(booth_image).addClass('selected');

    if(data.school_id != "" && data.school_id != null){
      document.getElementById('exhibitors-type-school').checked = true;
        var $select_school = $(exhibitorsForm.school_id).selectize();  // This initializes the selectize control
        var selectize_school = $select_school[0].selectize; // This stores the selectize object to a variable (with name 'selectize')

        selectize_school.setValue(data.school_id, false);
      }else{
       var $select_school = $(exhibitorsForm.school_id).selectize(); 
       var selectize_school = $select_school[0].selectize; 
       selectize_school.clear();
       $('#school-exhibitors').hide();

       document.getElementById('exhibitors-type-other').checked = true;
     }
     exhibitorsForm.name.value = data.name;
     exhibitorsForm.country_id.value = data.country_id;

         var $select = $(exhibitorsForm.country_id).selectize();  // This initializes the selectize control
        var selectize = $select[0].selectize; // This stores the selectize object to a variable (with name 'selectize')
        selectize.setValue(data.country_id, false);

        $('#file-logo-value').html(data.logo.split("/").slice(-1)[0]);
        tinymce.get("about").setContent(data.about);

        if(data.course != "" && data.course != null){

         var $select_course = $('#selectize-course').selectize();
         var selectize_course = $select_course[0].selectize;

         selectize_course.clearOptions();

         $.each(data.course.split("|"),function(k,v){
          if(v != ""){
           selectize_course.addOption({tag:v});
           selectize_course.addItem(v);
         }
       });
         selectize_course.refreshItems();
       }
     }
     function delete_exhibitor(id){
      $.ajax({
        url:"{{route('save_exhibitors')}}",
        method: "POST",
        data:{
          _token : token,
          cmd : "delete",
          id: id 
        },
        success:function(data){
          $('#exhibitors-output').html(data);
          exhibitorsForm.exhibitors_type[0].checked = true;
        },error:function(data){
          alert('error');
        },complete:function(){
          reset_exhibitor_form();
        }
      });
    }
    function open_brochures(){
      $('.loading-wrapper').show();
      $.ajax({
        url: "{{route('expo_brochure-ajax')}}",
        method: "POST",
        data: {
          _token: token,
          event_id: event_id,
          exhibitor_id : exhibitor_id,
        },
        success: function(data) {
          $('#brochures-output').html(data);
          $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
          alert(request.responseText);
        }
      });
    }

    function open_videos(){
      $('.loading-wrapper').show();
      $.ajax({
        url: "{{route('expo_video-ajax')}}",
        method: "POST",
        data: {
          _token: token,
          event_id: event_id,
          exhibitor_id:exhibitor_id,
        },
        success: function(data) {
          $('#videos-output').html(data);
          $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
          alert(request.responseText);
        }
      });
    }

    function add_video(el){
      var videoForm = document.getElementById("form-video");
      var formData = new FormData(videoForm);
      var cmd = $(el).prop("value");
      formData.append("provider","youtube");
      formData.append("_token",token);
      formData.append("cmd",cmd);
      formData.append("event_id",event_id);
      formData.append("exhibitor_id",exhibitor_id);
      $.ajax({
        url: "{{route('expo_video-ajax')}}",
        method: "POST",
        data: formData,
        processData:false,
        contentType:false,
        success: function(data) {
          document.getElementById("form-video").reset();

          $('#video-btn').prop("value", "add");
          $('#video-btn > i,#video-btn > span').html("add");
          $('#videos-output').html(data);
          $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
          alert(request.responseText);
        }
      });
    }

    function edit_video(data){
      data = JSON.parse(data);
      var videoForm = document.getElementById("form-video");
      videoForm.description.value = data.description;
      videoForm.title.value = data.title;
      videoForm.id.value = data.id;
      videoForm.vid.value = data.vid;
      $('#video-btn').prop("value", "update");
      $('#video-btn > i,#video-btn > span').html("update");
    }

    function delete_video(id){
     $.ajax({
      url: "{{route('expo_video-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id : id,
        event_id : event_id,
        cmd : "delete"
      },
      success: function(data) {
        document.getElementById("form-video").reset();
        $('#video-btn').prop("value", "add");
        $('#video-btn > i,#video-btn > span').html("add");
        $('#videos-output').html(data);
        $('.loading-wrapper').hide();
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
   }

   function add_brochure(el){
    var brochureForm = document.getElementById("form-brochure");
    var formData = new FormData(brochureForm);
    var cmd = $(el).prop("value");
    formData.append("_token",token);
    formData.append("cmd",cmd);
    formData.append("event_id",event_id);
    formData.append("exhibitor_id",exhibitor_id);
    $.ajax({
      url: "{{route('expo_brochure-ajax')}}",
      method: "POST",
      data: formData,
      processData:false,
      contentType:false,
      success: function(data) {
        document.getElementById("form-brochure").reset();
        $('#file-value').html("&emsp;");
        $('#brochure-btn').prop("value", "add");
        $('#brochure-btn > i,#brochure-btn > span').html("add");
        $('#brochures-output').html(data);
        $('.loading-wrapper').hide();
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function edit_brochure(data){
    data = JSON.parse(data);
    var brochureForm = document.getElementById("form-brochure");
    $('#file-value').html(data.path.split("/").slice(-1)[0]);
    brochureForm.name.value = data.name;
    brochureForm.id.value = data.id;
    $('#brochure-btn').prop("value", "update");
    $('#brochure-btn > i,#brochure-btn > span').html("update");
  }
  function delete_brochure(id){
   $.ajax({
    url: "{{route('expo_brochure-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id : id,
      event_id : event_id,
      cmd : "delete",
      exhibitor_id:exhibitor_id
    },
    success: function(data) {
      document.getElementById("form-brochure").reset();
      $('#file-value').html("&emsp;");
      $('#brochure-btn').prop("value", "add");
      $('#brochure-btn > i,#brochure-btn > span').html("add");
      $('#brochures-output').html(data);
      $('.loading-wrapper').hide();
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
 }


 function open_photos(){
  $.ajax({
    url : "{{route('expo_photo-ajax')}}",
    method : "POST",
    data : {
      _token : token,
      event_id : event_id,
      exhibitor_id:exhibitor_id
    },
    success:function(data){
      $('.dz-preview').remove();
      data = JSON.parse(data);
      $.each(data,function(k,v){
        var mockFile = { name: v.path,path: v.path,id:v.id};

        myDropzone.displayExistingFile(mockFile, public_url+"events/"+v.path,null,null,false);
      });
    }
  });
}
function change_title(e){
  $('#title-preview').html(e.value);
}
function change_description(e){
  $('#description-preview').html(e.value);
}

function select_image_background(input){
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      console.log(e.target.result);
      $('#preview-background').css({'background-image' : 'url('+e.target.result+')'});
    }

    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

function add_lobby(){
  var lobbyForm = document.getElementById('lobby-form');
  var data = new FormData(lobbyForm);
  var cmd = $('#lobby-btn').prop("value");
  data.append('_token',token);
  data.append('cmd',cmd);
  data.append('event_id',event_id);
  $('.loading-wrapper').hide();
  $.ajax({
    url:"{{route('save-lobby')}}",
    method: "POST",
    data:data,
    contentType: false,
    processData: false,
    success:function(data){
      alert('Saved !');
    },error:function(data){
      alert('error');
    },complete:function(){
     $('.loading-wrapper').hide();
   }
 });
}

function select_booth(el,booth){
  $('.booth').removeClass('selected');
  $(el).addClass('selected');
  $('#booth').val(booth);
}
</script>
@endpush
