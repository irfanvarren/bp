@extends('layouts.app-auth', ['activePage' => 'portfolio','activeMenu' => 'data-management', 'titlePage' => __('Portfolio')])
@push('head-js')
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
   min_height:500
 });


</script>
<style media="screen">
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
  .img-wrapper{
    margin-bottom:30px;
  }
  .my-img-thumbnail {
    padding: 0.25rem;
    background-color: #fafafa;
    border: 1px solid #dee2e6;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.075);
    max-width: 100%;
    height: auto;
    border-radius: 16px;
    position: relative;
    overflow: hidden;
    display: inline-block;
    margin-bottom: 5px;
    vertical-align: middle;
    text-align: center;
  }
  .my-img-thumbnail:hover{
    cursor: pointer;
  }
  .img-preview{
    width: 100%;
    display: block;
    margin:0 auto;
  }


  .gallery-btn {
    display: block;
    position: absolute;top:50%;left:50%;transform: translate(-50%,-50%);
  }
</style>
@endpush

@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title">{{ __('Add Portofolio') }}</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body ">
          <div class="row">
            <div class="col-md-12 text-right">
              <a href="{{route('portfolio.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
            </div>
          </div>
          @php 
          function data_uri($content, $mime) {  
          $base64   = base64_encode($content);
          return ('data:' . $mime . ';base64,' . $base64);
        }
        @endphp
        <div class="row">
          @if(isset($data_karyawan))
          <div class="col-md-6" style="margin-bottom:15px;">
           <div class="text-center"><h5>Data Karyawan</h5></div>
           <div class="row">
            <div style="padding:0 15px;vertical-align: middle;">
              <img src="{!! data_uri($data_karyawan->PIC,'image/png') !!}" style="max-height: 200px;width:100px;">
            </div>
            <div class="row" style="padding:0 15px;">
              <div class="col-md-6">
                <p>Nama : {{$data_karyawan->NAMA}} </p>
                <p>No. KTP : {{$data_karyawan->REF_NIK}} </p>
                <p>Alamat : {{$data_karyawan->ALAMAT}} </p>
              </div>
              <div class="col-md-6">
                <p>Agama : {{$data_karyawan->AGAMA}} </p>
                <p>Jenis Kelamin : {{$data_karyawan->JK}} </p>
                <p>Tanggal Lahir : {{$data_karyawan->TGL_LAHIR}} </p>
              </div>
            </div>
          </div>
        </div>
        @endif
        @if(isset($portfolio))
        <div class="col-md-6">
          <form method="POST" action="{{url('admin/portfolio/upload-foto/'.$id_karyawan)}}" enctype="multipart/form-data" id="myform2" autocomplete="off" class="form-horizontal">
            @csrf
            <input type="hidden" name="role" value="{{$role}}">
            <div class="text-center"><h5>Foto Portofolio</h5></div>
            <div class="row">
              <div>
               <img src="{{asset(Storage::disk('public')->url($portfolio->image))}}" style="max-height: 200px;width:100px;margin-left:15px;">
             </div>
             <div style="padding:0 15px;">
              <p>
                <input type="file" name="foto_portfolio" id="foto_portfolio">
              </p>
              <input type="submit" class="btn btn-primary" name="Upload" value="Upload">
            </div>
          </div>
        </form>
      </div>
      @endif
    </div>
    <div class="row">

      <div class="card">
       <form method="post" action="{{route('portfolio.store')}}" enctype="multipart/form-data" id="myform" autocomplete="off" class="form-horizontal">
        @csrf
        @method('post')
        @if (isset($id))
        <input type="hidden" name="id" value="{{$id}}">
        @endif
        <input type="hidden" name="id_karyawan" id="id_karyawan" value="{{$id_karyawan}}">
        <div class="card-header card-header-tabs card-header-rose">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <span class="nav-tabs-title">Latar Belakang:</span>
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active show" href="#profile" onclick="open_edubackground()" data-toggle="tab">
                    <i class="material-icons">books</i> Pendidikan
                    <div class="ripple-container"></div>
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#nilai-wrapper" onclick="open_certification()" data-toggle="tab">
                    <i class="material-icons">assessment</i> Nilai Sertifikasi
                    <div class="ripple-container"></div>
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#messages" onclick="open_experience()" data-toggle="tab">
                    <i class="material-icons">work</i> Pengalaman Kerja
                    <div class="ripple-container"></div>
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#portfolio" onclick="open_portfolio()" data-toggle="tab">
                    <i class="material-icons">work</i> Portofolio
                    <div class="ripple-container"></div>
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#settings" onclick="open_other()" data-toggle="tab">
                    <i class="material-icons">extension</i> Lainnya
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
            <div class="tab-pane active show" id="profile">
              <div class="col-md-12" id="edubackground-output">
                @if(!$edubackground->isEmpty())
                <table class="table table-bordered">
                  <tr>

                    <th>Nama</th>
                    <th colspan="6">{{$edubackground[0]->nama_karyawan}}</th>
                  </tr>
                  <tr>
                    <th>No</th>
                    <th>Gelar</th>
                    <th>Jurusan</th>
                    <th>Tempat</th>
                    <th>Tahun Masuk</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  @php
                  $x = 1;
                  @endphp
                  @foreach($edubackground as $data)
                  <tr>
                    <td>{{$x++}}</td>
                    <td>{{$data->gelar}}</td>
                    <td>{{$data->jurusan}}</td>
                    <td>{{$data->tempat}}</td>
                    <td>{{$data->tahun_masuk}}</td>
                    <td>{{$data->status}}</td>
                    <td>
                      <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
                      onclick="edit_pendidikan('{{$data->id}}','{{$data->gelar}}','{{$data->jurusan}}','{{$data->tempat}}','{{$data->tahun_masuk}}','{{$data->status}}')" data-original-title="Ubah">
                      <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_pendidikan({{$data->id}})" data-original-title="Hapus">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
                @endforeach
              </table>

            </table>
            @else
            @endif
          </div>
          <table class="table">
            <col style="width:30%">
            <col style="width:50%">
            <col style="width:20%">
            <tbody class="pendidikan-wrapper">
              <tr>
                <td>Gelar</td>
                <td>
                  <input type="hidden" name="id_edu" id="id_edu" value="">
                  <input type="text" name="gelar" id="gelar" class="form-control" value="">
                </td>
                <td rowspan="5" class="text-center"> <button type="button" rel="tooltip" title="" onclick="add_pendidikan()" id="btn-edu" class="btn btn-primary btn-link btn-sm" value="add" data-original-title="Tambah Pendidikan">
                  <i class="material-icons txt-edu">add</i> <span class="txt-edu">Add</span>
                </button></td>

              </tr>
              <tr>
                <td>Jurusan</td>
                <td>
                  <input type="text" name="jurusan" id="jurusan" class="form-control" value="">
                </td>

              </tr>
              <tr>
                <td>Tempat</td>
                <td>
                  <input type="text" name="tempat" id="tempat" class="form-control" value="">
                </td>

              </tr>
              <tr>
                <td>Tahun Masuk</td>
                <td>
                  <input type="text" name="tahun_masuk" id="tahun_masuk" class="form-control" value="">
                </td>

              </tr>
              <tr>
                <td>Status</td>
                <td>
                  <select class="form-control" id="status" name="status" name="">
                    <option value="">- Pilih Status -</option>
                    <option value="Lulus">Lulus</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Tidak Lulus">Tidak Lulus</option>
                  </select>
                </td>


              </tr>


            </tbody>
          </table>
        </div>



        <div class="tab-pane" id="nilai-wrapper">
          <div class="table-responsive" id="certification-output"></div>
          <div class="row">
            <div class="col-sm-8">
             <table class="table">
              <tbody>
                <tr>
                  <td>Sertifikat</td>
                  <td>
                    <input type="hidden" name="id_sertifikasi" id="id_sertifikasi">
                    <input type="text" name="certification_name" id="certification_name" class="form-control"></td>
                </tr>
                <tr>
                  <td>Tahun</td>
                  <td><input type="number" name="certification_year" id="certification_year" class="form-control"></td>
                </tr>

                <tr>
                  <td>Masa Berlaku</td>
                  <td>
                    <div class="row">
                      <div class="col-4">
                        <input type="number" name="certification_duration" id="certification_duration" class="form-control">                    
                      </div>
                      <div class="col-8 form-group">
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" name="periode" class="form-check-input" value="week"> Minggu
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" name="periode" class="form-check-input" value="month"> Bulan
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" name="periode" class="form-check-input" value="year"> Tahun
                          </label>
                        </div>
                      </div>
                    </div>    
                  </td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td>
                    <textarea name="certification_note" id="certification_note" class="form-control"></textarea>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-sm-4" style="max-height: 550px;overflow: auto;">
           <table class="table">
            <tbody>
              <tr>
                <td colspan="3" class="p-0">
                  <div class="text-center text-light p-3 bg-primary">
                   <h4 class="m-0"> <strong> Hasil Nilai </strong> </h4>
                 </div>
                 <div class="table-responsive">
                  <table class="table table-bordered" id="table-nilai">
                    <thead>
                      <tr>
                        <td>Kriteria</td> <td>Nilai</td> <td>Action</td>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </td>

            </tr>
            <tr>
              <td>Kriteria</td>
              <td>
                <input type="hidden" name="index_nilai" id="index_nilai">
                <input type="text" name="kriteria" id="kriteria" class="form-control"></td>

                <td rowspan="2" class="text-center"> 
                  <button type="button" rel="tooltip" title="" onclick="add_nilai()" id="btn-nilai" class="btn btn-primary btn-link btn-sm" value="add" data-original-title="Tambah Nilai">
                    <i class="material-icons txt-nilai">add</i> <span class="txt-nilai">Add</span>
                  </button>
                </td>
              </tr>
              <tr>
                <td>Nilai</td>
                <td><input type="text" name="nilai" id="nilai" class="form-control" ></td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="col-md-12 text-center">
          <button class="btn btn-primary" id="btn-nilai-sertifikasi" type="button" value="add" onclick="add_nilai_sertifikasi()"> Add </button>
        </div>
      </div>


    </div>

    <div class="tab-pane" id="messages">
      <div class="col-md-12" id="experience-output">

      </div>

      <table class="table">
        <col style="width:30%">
        <col style="width:50%">
        <col style="width:20%">
        <tbody class="pendidikan-wrapper">
          <tr>

            <td>Nama Pekerjaan</td>
            <td>
              <input type="hidden" name="id_pekerjaan" id="id_pekerjaan" value="">
              <input type="text" name="nama_pekerjaan" id="nama_pekerjaan" class="form-control" value="">
            </td>
            <td rowspan="5" class="text-center"> <button type="button" rel="tooltip" title="" onclick="add_experience()" id="btn-exp" class="btn btn-primary btn-link btn-sm" value="add" data-original-title="Tambah Pengalaman Kerja">
              <i class="material-icons txt-exp">add</i> <span class="txt-exp">Add</span>
            </button></td>

          </tr>
          <tr>
            <td>Tempat Bekerja</td>
            <td>
              <input type="text" name="tempat_bekerja" id="tempat_bekerja" class="form-control" value="">
            </td>

          </tr>
          <tr>
            <td>Tanggal Mulai</td>
            <td>
              <input type="date" name="tgl_bekerja" id="tgl_bekerja" class="form-control" value="">
            </td>

          </tr>
          <tr>
            <td>Tanggal Selesai</td>
            <td>
              <input type="date" name="tgl_selesai_bekerja" id="tgl_selesai_bekerja" class="form-control" value="">
            </td>

          </tr>
          <tr>
            <td>Deskripsi</td>
            <td>
              <textarea name="deskripsi_bekerja" id="deskripsi_bekerja" rows="8" style="white-space:pre-wrap;" class="form-control"></textarea>
            </td>


          </tr>


        </tbody>
      </table>
    </div>

    <div class="tab-pane" id="portfolio">
      <div class="col-md-12" id="portfolio-output">

      </div>

      <table class="table">
        <col width="15%">
        <col>
        <col width="15%">
        <tbody class="pendidikan-wrapper">
          <tr>

            <td>Nama Portofolio</td>
            <td>
              <input type="hidden" name="id_portofolio" id="id_portofolio" value="">
              <input type="text" name="nama_portofolio" id="nama_portofolio" class="form-control" value="">
            </td>
            <td rowspan="5" class="text-center"> <button type="button" rel="tooltip" title="" onclick="add_portfolio()" id="btn-portfolio" class="btn btn-primary btn-link btn-sm" value="add" data-original-title="Tambah Pengalaman Kerja">
              <i class="material-icons txt-portfolio">add</i> <span class="txt-portfolio">Add</span>
            </button></td>

          </tr>
          <tr>
            <td colspan="2">
             <div class="row">
              <div class="col-md-12 text-center" >
                <h4 style="margin:15px 0 30px 0;">
                  Deskripsi
                </h4>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
               <textarea name="deskripsi_portofolio" id="deskripsi_portofolio" rows="8" style="white-space:pre-wrap;" class="form-control tinymce-editor"></textarea>
             </div>
           </div>

         </td>


       </tr>
       <tr>
        <td colspan="2">
          <div class="row">
            <div class="col-md-12 text-center" >
              <h4 style="margin:15px 0 30px 0;">Gallery</h4>
            </div>
          </div>
          <div class="row">
           <div class="col-sm-6 col-md-4 col-lg-3 img-wrapper" id="img-wrapper0">
            <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
              <div class="col-md-12">
                <div class="my-img-thumbnail" style="width: 180px; height: 180px;display: block;margin:0 auto;">

                 <button class="btn btn-danger btn-round gallery-btn" type="button"  onclick="delete_gallery(0)">Delete</button>

                 <img id="img-preview1" class="img-preview" src="" alt="">
               </div>
             </div>
             <div class="text-center" style="padding-top:15px;">
              <span class="btn btn-rose btn-round btn-file">
                Select Image
                <input type="file" name="gambar[]" onchange="change_image(1)" data-value="" id="gambar1">
              </span>
            </div>
          </div>
        </div>
        <div id="img-add-wrapper" class="col-md-4 col-lg-3" onclick="add_portfolio_image(this)">
          <div class="col-sm-6 col-md-12" >

            <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
              <div class="col-md-12">
                <div class="my-img-thumbnail" style="width: 180px; height: 180px;line-height: 180px;display:block;margin:0 auto;">
                  <span style="height:150px;line-height: 150px;">
                   <span style="line-height: normal;display: inline-block;vertical-align: middle;">
                     <i class="material-icons" style="font-size:48px;">add</i> <br>
                     Add New Image
                   </span>
                 </span>
               </div>
             </div>

           </div>
         </div>
       </div>
     </div>
   </td>


 </tr>


</tbody>
</table>
</div>
<div class="tab-pane" id="settings">
  <div class="col-md-12" id="other-output">

  </div>
  <table class="table">
    <col style="width:30%">
    <col style="width:50%">
    <col style="width:20%">
    <tbody class="pendidikan-wrapper">
      <tr>
        <td>Pengalaman</td>
        <td>
          <input type="hidden" name="id_other" id="id_other" value="">
          <textarea name="pengalaman" id="pengalaman" class="form-control"></textarea>
        </td>
        <td rowspan="5" class="text-center"> <button type="button" rel="tooltip" title="" onclick="add_other()" id="btn-other" class="btn btn-primary btn-link btn-sm" value="add" data-original-title="Tambah Pengalaman Lainnya">
          <i class="material-icons txt-other">add</i> <span class="txt-other">Add</span>
        </button></td>

      </tr>
      <tr>
        <td>Jenis Pengalaman</td>
        <td>
          <select class="form-control" id="jenis_pengalaman" name="jenis_pengalaman">
            <option value="">- Pilih Jenis -</option>
            <option value="Pelatihan Dan Lokakarya">Pelatihan Dan Lokakarya</option>
            <option value="Pelatihan Dan Lokakarya / Webinars">Pelatihan Dan Lokakarya / Webinars</option>
            <option value="Pengalaman Organisasi">Pengalaman Organisasi</option>
            <option value="Konferensi Dan Seminar">Konferensi Dan Seminar</option>
            <option value="Pencapaian / Prestasi">Pencapaian / Prestasi</option>
            <option value="Pencapaian Dalam Pekerjaan">Pencapaian Dalam Pekerjaan</option>
            <option value="Pencapaian Dalam Komunitas">Pencapaian Dalam Komunitas</option>
            <option value="Pengalaman Lainnya">Pengalaman Lainnya</option>
          </select>
        </td>

      </tr>

    </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>

</div>
<div class="card-footer ml-auto mr-auto">
  @if (isset($id))
  @else
  <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
  @endif

</div>
</div>
</form>
</div>
</div>
</div>

@endsection
@push('js')
<script type="text/javascript">
  var role;
  @if(isset($role))
  role = "{{$role}}";
  @else
  role = "";
  @endif
  var index_gambar = 1;
  function change_image(index){
    var preview = document.getElementById('img-preview'+index);
    var file    = document.getElementById('gambar'+index).files[0];

    var reader  = new FileReader();
    if (file) {
      reader.addEventListener("load", function () {
        preview.src = reader.result;
      }, false);
      reader.readAsDataURL(file);
    }
  }

  var asset_url = "{{asset('')}}";

  function form_reset() {
    document.getElementById('myform').reset();
    $('#btn-edu').prop("value", "add");
    $('#btn-edu .txt-edu').html("add");
    $('#btn-exp').prop("value", "add");
    $('#btn-exp .txt-exp').html("add");
    $('#btn-other').prop("value", "add");
    $('#btn-other .txt-other').html("add");
    $('#btn-portfolio').prop("value", "add");
    $('#btn-portfolio .txt-portfolio').html("add");
    $('#btn-nilai-sertifikasi').html("add");

  }

  function open_edubackground() {
    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    var id_karyawan = $('#id_karyawan').val();

    $.ajax({
      url: "{{route('edubackground-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id_karyawan: id_karyawan,
        role: role
      },
      success: function(data) {
        $('.loading-wrapper').hide();
        $('#edubackground-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function open_certification(){
   $('.loading-wrapper').show();
   var token = $("input[name='_token']").val();
   var id_karyawan = $('#id_karyawan').val();

   $.ajax({
    url: "{{route('certification-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id_karyawan: id_karyawan,
    },
    success: function(data) {

      $('.loading-wrapper').hide();
      $('#certification-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
 }

 function open_experience() {
  $('.loading-wrapper').show();
  var token = $("input[name='_token']").val();
  var id_karyawan = $('#id_karyawan').val();

  $.ajax({
    url: "{{route('experience-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id_karyawan: id_karyawan,
      role: role
    },
    success: function(data) {
      $('.loading-wrapper').hide();
      $('#experience-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}


function add_portfolio_image(el){
  index_gambar+=1;
  $(`<div class="col-sm-6 col-md-4 col-lg-3 img-wrapper" id="img-wrapper`+index_gambar+`">
    <div class="col-md-12">
    <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
    <div class="col-md-12">
    <div class="my-img-thumbnail" style="width: 180px; height: 180px;display: block;margin:0 auto;">
    <button class="btn btn-danger btn-round gallery-btn" type="button"  onclick="delete_gallery(`+index_gambar+`)">Delete</button>
    <img id="img-preview`+index_gambar+`" class="img-preview" src="" alt="">
    </div>
    <div class="text-center" style="padding-top:15px;">
    <span class="btn btn-rose btn-round btn-file">
    Select Image
    <input type="file" name="gambar[]" onchange="change_image(`+index_gambar+`)" data-value="" id="gambar`+index_gambar+`">
    </span>
    </div>
    </div>
    </div>
    </div>
    </div>`).insertBefore(el);
      /*
    $( `<div id="img-add-wrapper" class="col-md-3">
      <div class="col-md-12 img-wrapper">

      <div class="col-md-12 {{ $errors->has('gambar') ? ' has-danger' : '' }}">
      <div class="my-img-thumbnail" style="width: 180px; height: 180px;display:block;margin:0 auto">
      <img id="img-preview`+index_gambar+`" class="img-preview" src="" alt="">
      </div>
      <div class="text-center" style="padding-top:15px;">
      <span class="btn btn-rose btn-round btn-file">
      Select Image
      <input type="file" name="gambar[]" onchange="change_image(`+index_gambar+`)" id="gambar`+index_gambar+`">
      </span>
      </div>
      </div>

      </div></div>` ).insertBefore(el);*/
    }

    function delete_gallery(index){
      var wrapper =  document.getElementById('img-wrapper'+index);
      wrapper.remove();
    }

    function open_portfolio() {
     form_reset();
     $('.loading-wrapper').show();
     var token = $("input[name='_token']").val();
     var id_karyawan = $('#id_karyawan').val();


     $.ajax({
      url: "{{route('portfolio-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id_karyawan: id_karyawan
      },
      success: function(data) {
        var arr_data = data.split("##");
        $('.loading-wrapper').hide();
        $('#portfolio-output').html(arr_data[0]);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
   }


   function add_portfolio(){
    var formData = new FormData();
    var arr_files = [];
    $.each($("input[name='gambar[]']"), function (i, obj) {                  
     if(obj.files.length > 0){
      $.each(obj.files, function (j, file) {                    
        formData.append('file_paths['+i+']',file);
        //formData.append('files[' + i + ']', file); // is the var i against the var j, because the i is incremental the j is ever 0
      });      
    }else{
     formData.append('file_paths['+i+']', obj.getAttribute("data-value"));
     
   }       
 });
    var token = $("input[name='_token']").val();
    var id = $("#id_portofolio").val();
    var id_karyawan = $('#id_karyawan').val();
    var nama_portofolio = $('#nama_portofolio').val();
    var deskripsi = tinymce.get('deskripsi_portofolio').getContent();
    var cmd = $('#btn-portfolio').prop("value");
    console.log(formData);
    formData.append('_token',token);
    formData.append('id',id);
    formData.append('id_karyawan',id_karyawan);
    formData.append('name', nama_portofolio);
    formData.append('description', deskripsi);
    formData.append('cmd',cmd);
    $.ajax({
      url: "{{route('portfolio-ajax')}}",
      method: "POST",
      data: formData,
      processData:false,
      contentType:false,
      success: function(data) {
        var img_wrapper = $('.img-wrapper');
        img_wrapper.remove();
        form_reset();
        var arr_data = data.split('##');
        $('#portfolio-output').html(arr_data[0]);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function edit_portfolio(id,name,description){

    $('#nama_portofolio').val(name);
    tinymce.get('deskripsi_portofolio').setContent(description);
    $('#id_portofolio').val(id);
    $('#btn-portfolio').prop("value", "update");
    $('#btn-portfolio .txt-portfolio').html("update");
    var id_karyawan = $('#id_karyawan').val();

    var token = $("input[name='_token']").val();
    $.ajax({
      url:"{{route('portfolio-ajax')}}",
      method: "POST",
      data: {
        _token : token,
        id_karyawan : id_karyawan,
        id : id,
        name : name,
        cmd : "gallery"
      },
      success: function(data){
        var arr_data = data.split('##');
        var el = $('#img-add-wrapper');
        var img_wrapper = $('.img-wrapper');

        img_wrapper.remove();
        var galleries = JSON.parse(arr_data[1]);
        index_gambar = (galleries.length - 1);
        var output_gallery = ""; 
        if(galleries.length > 0){
          $.each(galleries,function(k,v){
            output_gallery += `<div class="col-sm-6 col-md-4 col-lg-3 img-wrapper" id="img-wrapper`+k+`">
            <div>
            <div class="col-md-12">
            <div class="my-img-thumbnail" style="width: 180px; height: 180px;display: block;margin:0 auto;">
            <button class="btn btn-danger btn-round gallery-btn" type="button"  onclick="delete_gallery(`+k+`)">Delete</button>
            <img id="img-preview`+k+`" class="img-preview" src="`+asset_url + v.image+`" alt="">
            </div>
            <div class="text-center" style="padding-top:15px;">
            <span class="btn btn-rose btn-round btn-file">
            Select Image
            <input type="file" name="gambar[]" onchange="change_image(`+k+`)" value="`+asset_url + v.image+`" data-value="`+v.image+`" id="gambar`+k+`">
            </span>
            </div>
            </div>
            </div>
            </div>`;
          });
        }
        $(output_gallery).insertBefore(el);
      }
    });
  }

  function delete_portfolio(id)
  {
    var id_karyawan = $('#id_karyawan').val();
    var token = $("input[name='_token']").val();
    $.ajax({
      url: "{{route('portfolio-ajax')}}",
      method: "POST",
      data: {
        _token : token,
        id : id,
        id_karyawan : id_karyawan,
        cmd : "delete"
      },
      success: function(data) {
        var img_wrapper = $('.img-wrapper');
        img_wrapper.remove();
        form_reset();
        $('#portfolio-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function add_experience() {
    var token = $("input[name='_token']").val();
    var id = $("#id_pekerjaan").val();
    var id_karyawan = $('#id_karyawan').val();
    var nama_pekerjaan = $('#nama_pekerjaan').val();
    var tempat_bekerja = $('#tempat_bekerja').val();
    var tgl_bekerja = $('#tgl_bekerja').val();
    var tgl_selesai_bekerja = $('#tgl_selesai_bekerja').val();
    var deskripsi = $('#deskripsi_bekerja').val();
    var cmd = $('#btn-exp').prop("value");
    $.ajax({
      url: "{{route('experience-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        id_karyawan: id_karyawan,
        nama_pekerjaan: nama_pekerjaan,
        tempat_bekerja: tempat_bekerja,
        tgl_mulai: tgl_bekerja,
        tgl_selesai: tgl_selesai_bekerja,
        deskripsi: deskripsi,
        role: role,
        cmd: cmd
      },
      success: function(data) {
        form_reset();
        $('#experience-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function edit_pekerjaan(id, nama_pekerjaan, tempat_bekerja, tgl_bekerja, tgl_selesai_bekerja, deskripsi) {
    $('#nama_pekerjaan').val(nama_pekerjaan);
    $('#tempat_bekerja').val(tempat_bekerja);
    $('#tgl_bekerja').val(tgl_bekerja);
    $('#tgl_selesai_bekerja').val(tgl_selesai_bekerja);
    desripsi = JSON.Parse(deskripsi);
    //var txt = document.createElement('textarea');
    //txt.innerHTML = deskripsi;
    //console.log(txt.value)
    $('#deskripsi_bekerja').val(deskripsi);
    $('#id_pekerjaan').val(id);
    $('#btn-exp').prop("value", "update");
    $('#btn-exp .txt-exp').html("update");
  }

  function delete_pekerjaan(id) {
    var id_karyawan = $('#id_karyawan').val();
    var token = $("input[name='_token']").val();
    $.ajax({
      url: "{{route('experience-ajax')}}",
      method: "POST",
      data: {
        id: id,
        id_karyawan: id_karyawan,
        _token: token,
        role: role,
        cmd: "delete"
      },
      success: function(data) {
        form_reset();
        $('#experience-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function add_pendidikan() {
    var token = $("input[name='_token']").val();
    var id = $("#id_edu").val();
    var id_karyawan = $('#id_karyawan').val();
    var gelar = $('#gelar').val();
    var jurusan = $('#jurusan').val();
    var tempat = $('#tempat').val();
    var tahun_masuk = $('#tahun_masuk').val();
    var status = $('#status').val();
    var cmd = $('#btn-edu').prop("value");
    $.ajax({
      url: "{{route('edubackground-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        id_karyawan: id_karyawan,
        gelar: gelar,
        jurusan: jurusan,
        tempat: tempat,
        tahun_masuk: tahun_masuk,
        status: status,
        role: role,
        cmd: cmd
      },
      success: function(data) {
        form_reset();
        $('#edubackground-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function edit_pendidikan(id, gelar, jurusan, tempat, tahun_masuk, status) {
    $('#gelar').val(gelar);
    $('#jurusan').val(jurusan);
    $('#tempat').val(tempat);
    $('#tahun_masuk').val(tahun_masuk);
    $('#status').val(status);
    $('#id_edu').val(id);
    $('#btn-edu').prop("value", "update");
    $('#btn-edu .txt-edu').html("update");
  }

  function delete_pendidikan(id) {
    var token = $("input[name='_token']").val();
    var id_karyawan = $('#id_karyawan').val();
    $.ajax({
      url: "{{route('edubackground-ajax')}}",
      method: "POST",
      data: {
        id: id,
        id_karyawan: id_karyawan,
        _token: token,
        role: role,
        cmd: "delete"
      },
      success: function(data) {
        form_reset();
        $('#edubackground-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
  var data_nilai = [];
  function add_nilai(){
    var nilai = document.getElementById('nilai');
    var kriteria = document.getElementById('kriteria');
    var cmd = document.getElementById('btn-nilai').getAttribute('value');
    var myTable = document.getElementById('table-nilai');
    if(cmd == "add"){
      if(nilai.value == "" || kriteria.value == ""){
        alert('Tolong isi kriteria dan nilai terlebih dahulu!');
        return false;
      }
      data_nilai.push({
        "nilai" : nilai.value,
        "kriteria" : kriteria.value
      });
      var row = myTable.insertRow(myTable.rows.length);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      cell1.innerHTML = kriteria.value;
      cell2.innerHTML = nilai.value;
      cell3.innerHTML = '<button class="btn btn-link btn-success" type="button" onclick="edit_nilai('+(myTable.rows.length - 1)+')">Edit</button><button class="btn btn-link btn-danger" onclick="delete_nilai('+(myTable.rows.length - 1)+')" type="button">Delete</button>';
    }else if(cmd == "update"){
      var index = document.getElementById('index_nilai').value;
      data_nilai[index-1].nilai = nilai.value;
      data_nilai[index-1].kriteria = kriteria.value;
      myTable.rows[index].cells[0].innerHTML = kriteria.value;
      myTable.rows[index].cells[1].innerHTML = nilai.value;
    }
    document.getElementById('kriteria').value = "";
    document.getElementById('nilai').value = "";
    document.getElementById('btn-nilai').setAttribute("value","add");
    document.getElementById('btn-nilai').children[0].innerHTML = "add";
    document.getElementById('btn-nilai').children[1].innerHTML = "add"; 
  }
  function edit_nilai(index){
    document.getElementById('kriteria').value = data_nilai[index-1].kriteria;
    document.getElementById('nilai').value = data_nilai[index-1].nilai;
    document.getElementById('index_nilai').value = index;
    document.getElementById('btn-nilai').setAttribute("value","update");
    document.getElementById('btn-nilai').children[0].innerHTML = "update";
    document.getElementById('btn-nilai').children[1].innerHTML = "update"; 
  }

  function delete_nilai(index){
    var myTable = document.getElementById('table-nilai');
    myTable.innerHTML = myTable.rows[0].innerHTML;
    data_nilai.splice((index-1),1);
    data_nilai.forEach(function(item,index){
     var row = myTable.insertRow(myTable.rows.length);
     var cell1 = row.insertCell(0);
     var cell2 = row.insertCell(1);
     var cell3 = row.insertCell(2);
     cell1.innerHTML = item.kriteria;
     cell2.innerHTML = item.nilai;
     cell3.innerHTML = '<button class="btn btn-link btn-success" type="button" onclick="edit_nilai('+(index + 1)+')">Edit</button><button class="btn btn-link btn-danger" onclick="delete_nilai('+(index + 1)+')" type="button">Delete</button>';
   });
  }

  function add_nilai_sertifikasi(){
    var token = $("input[name='_token']").val();
    var id = $("#id_sertifikasi").val();
    var id_karyawan = $('#id_karyawan').val();
    var name = $('#certification_name').val();
    var year = $('#certification_year').val();
    var duration = $('#certification_duration').val();
    var periode = "";
    document.getElementsByName("periode").forEach(function(item,index){
      if(item.checked == true){
        periode = item.value;
      }
    });

    var keterangan = $('#certification_note').val();
    var cmd = $('#btn-nilai-sertifikasi').prop("value");
    
    $.ajax({
      url: "{{route('certification-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        id_karyawan: id_karyawan,
        name : name,
        year : year,
        duration : duration,
        periode : periode,
        keterangan : keterangan,
        nilai:JSON.stringify(data_nilai),
        cmd: cmd
      },
      success: function(data) {
        form_reset();
        data_nilai = [];
        var myTable = document.getElementById('table-nilai');
        myTable.innerHTML = myTable.rows[0].innerHTML;
        $('#btn-nilai-sertifikasi').html("add");
        $('#certification-output').html(data);

      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function edit_nilai_sertifikasi(id,name,year,duration,periode,keterangan,nilai){
    $('#id_sertifikasi').val(id);
    $('#certification_name').val(name);
    $('#certification_year').val(year);
    $('#certification_duration').val(duration);
    $('#certification_note').val(keterangan);
    $('#btn-nilai-sertifikasi').prop("value","update");
        $('#btn-nilai-sertifikasi').html("update");
    document.getElementsByName("periode").forEach(function(item,index){
      if(item.value == periode){
       item.checked = true;
      }
    });
    data_nilai = JSON.parse(nilai);
    var myTable = document.getElementById('table-nilai');
    myTable.innerHTML = myTable.rows[0].innerHTML;
    data_nilai.forEach(function(item,index){
    var row = myTable.insertRow(myTable.rows.length);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = item.kriteria;
    cell2.innerHTML = item.nilai;
    cell3.innerHTML = '<button class="btn btn-link btn-success" type="button" onclick="edit_nilai('+(index + 1)+')">Edit</button><button class="btn btn-link btn-danger" onclick="delete_nilai('+(index + 1)+')" type="button">Delete</button>';
   });
  }

   function delete_nilai_sertifikasi(id) {
    var token = $("input[name='_token']").val();
    var id_karyawan = $('#id_karyawan').val();
    $.ajax({
      url: "{{route('certification-ajax')}}",
      method: "POST",
      data: {
        id: id,
        id_karyawan: id_karyawan,
        _token: token,
        cmd: "delete"
      },
      success: function(data) {
        form_reset();
        data_nilai = [];
        var myTable = document.getElementById('table-nilai');
        myTable.innerHTML = myTable.rows[0].innerHTML;
        $('#btn-nilai-sertifikasi').html("add");
        $('#certification-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function open_other() {
    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    var id_karyawan = $('#id_karyawan').val();
    $.ajax({
      url: "{{route('other-exp-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id_karyawan: id_karyawan,
        role: role
      },
      success: function(data) {
        $('.loading-wrapper').hide();
        $('#other-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function add_other() {
    var token = $("input[name='_token']").val();
    var id = $("#id_other").val();
    var id_karyawan = $('#id_karyawan').val();
    var pengalaman = escape($('#pengalaman').val());
    //    var pengalaman = $('#pengalaman').val().replace(/\r\n|\r|\n/g,"<br />");
    var jenis_pengalaman = $('#jenis_pengalaman').val();
    var cmd = $('#btn-other').prop("value");
    $.ajax({
      url: "{{route('other-exp-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        id_karyawan: id_karyawan,
        pengalaman: pengalaman,
        jenis_pengalaman: jenis_pengalaman,
        role: role,
        cmd: cmd
      },
      success: function(data) {
        form_reset();
        $('#other-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function edit_other(id, pengalaman, jenis_pengalaman) {
    $('#pengalaman').val(unescape(pengalaman));
    $('#jenis_pengalaman').val(jenis_pengalaman);
    $('#id_other').val(id);
    $('#btn-other').prop("value", "update");
    $('#btn-other .txt-other').html("update");
  }

  function delete_other(id) {
    var token = $("input[name='_token']").val();
    var id_karyawan = $('#id_karyawan').val();
    $.ajax({
      url: "{{route('other-exp-ajax')}}",
      method: "POST",
      data: {
        id: id,
        id_karyawan: id_karyawan,
        _token: token,
        role: role,
        cmd: "delete"
      },
      success: function(data) {
        form_reset();
        $('#other-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
</script>
@endpush
