@extends('layouts.app-auth', ['activePage' => 'cms.products', 'titlePage' => __('Page Products'),'activeMenu' => 'content-management'])
<style media="screen">
  .modal .modal-dialog {
    margin: 0px !important;
  }

  .modal-dialog {
    max-width: 100% !important;
  }

  #mymodal {
    padding-left: 0 !important
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

  .modal-dialog .modal-footer {
    background: white;
  }
</style>
@section('content')
<div class="modal" tabindex="-1" role="dialog" id="mymodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body justify-content-center" style="padding:30px 50px;min-height:100vh">
        <form action="" id="form-input" name="form-input" method="post">

          <input type="hidden" name="product_id" id="product_id" value="">
          <div class="card">
            <div class="card-header card-header-tabs card-header-rose">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Latar Belakang:</span>
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active show" href="#desc" onclick="open_desc()" data-toggle="tab">
                        <i class="material-icons">books</i> Product Desc
                        <div class="ripple-container"></div>
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#benefit" onclick="open_benefit()" data-toggle="tab">
                        <i class="material-icons">work</i> Product Benefit
                        <div class="ripple-container"></div>
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#target" onclick="open_target()" data-toggle="tab">
                        <i class="material-icons">extension</i> Product Target
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
                <div class="tab-pane active show" id="desc">
                  <div class="col-md-12" id="desc-output">

                    @if(!$productdesc->isEmpty())
                    <table class="table table-bordered">

                      <tr>
                        <th>Title</th>
                        <th>Desc</th>
                        <th>Action</th>
                      </tr>
                      @php
                      $x = 0;
                      @endphp
                      @foreach($productdesc as $data)
                      <tr>
                        <td>{{$data->title}}</td>
                        <td>{{$data->desc}}</td>
                        <td>
                          <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" onclick="edit_desc('{{$data->id}}','{{$data->title}}','{{$data->desc}}')" data-original-title="Ubah">
                            <i class="material-icons">edit</i> edit
                          </button>
                          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_desc('{{$data->id}}')" data-original-title="Hapus">
                            <i class="material-icons">close</i> delete
                          </button>
                        </td>
                      </tr>
                      @endforeach
                    </table>

                    @else
                    @endif
                  </div>

                  <table class="table">
                    <col>
                    <col>
                    <col>
                    <tbody class="desc-wrapper">

                      <tr>
                        <td>Title</td>
                        <td>
                          <input type="hidden" name="pdesc_id" id="pdesc_id" class="form-control" value="">
                          <input type="text" name="pdesc_title" id="pdesc_title" class="form-control" value="">
                        </td>
                        <td rowspan="2" class="text-center"> <button type="button" rel="tooltip" title="" onclick="add_desc()" id="btn-desc" class="btn btn-primary btn-link btn-sm" value="add" data-original-title="Tambah Deskripsi">
                            <i class="material-icons txt-desc">add</i> <span class="txt-desc">Add</span>
                          </button></td>
                      </tr>
                      <tr>
                        <td>Desc</td>
                        <td>
                          <input type="text" name="pdesc_desc" id="pdesc_desc" class="form-control" value="">
                        </td>

                      </tr>


                    </tbody>
                  </table>
                </div>





                <div class="tab-pane" id="benefit">
                  <div class="col-md-12" id="benefit-output">

                  </div>

                  <table class="table">
                    <col style="width:30%">
                    <col style="width:50%">
                    <col style="width:20%">
                    <tbody class="desc-wrapper">
                      <tr>
                        <td>Image</td>
                        <td>
                          <input type="hidden" name="pbenefit_id" id="pbenefit_id" value="">
                          <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Select image</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="pbenefit_image" id="pbenefit_image">
                                </span>
                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"> <i class="fa fa-times"></i> Remove</a>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td rowspan="5" class="text-center"> <button type="button" rel="tooltip" title="" onclick="add_benefit()" id="btn-benefit" class="btn btn-primary btn-link btn-sm" value="add" data-original-title="Tambah Pengalaman Kerja">
                            <i class="material-icons txt-benefit">add</i> <span class="txt-benefit">Add</span>
                          </button></td>

                      </tr>
                      <tr>
                        <td>Title</td>
                        <td>
                          <input type="text" name="pbenefit_title" id="pbenefit_title" class="form-control" value="">
                        </td>

                      </tr>
                      <tr>
                        <td>Desc</td>
                        <td>
                          <input type="text" name="pbenefit_desc" id="pbenefit_desc" class="form-control" value="">
                        </td>
                      </tr>


                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="target">
                  <div class="col-md-12" id="target-output">

                  </div>
                  <table class="table">
                    <col style="width:30%">
                    <col style="width:50%">
                    <col style="width:20%">
                    <tbody class="desc-wrapper">
                      <tr>
                        <td>Image</td>
                        <td>
                          <input type="hidden" name="ptarget_id" id="ptarget_id" value="">
                          <div class="{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                              <div>
                                <span class="btn btn-rose btn-round btn-file">
                                  <span class="fileinput-new">Select image</span>
                                  <span class="fileinput-exists">Change</span>
                                  <input type="file" name="ptarget_image" id="ptarget_image">
                                </span>
                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"> <i class="fa fa-times"></i> Remove</a>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td rowspan="5" class="text-center"> <button type="button" rel="tooltip" title="" onclick="add_target()" id="btn-target" class="btn btn-primary btn-link btn-sm" value="add" data-original-title="Tambah Pengalaman Lainnya">
                            <i class="material-icons txt-target">add</i> <span class="txt-target">Add</span>
                          </button></td>

                      </tr>
                      <tr>
                        <td>Title</td>
                        <td>
                          <input type="text" name="ptarget_title" id="ptarget_title" class="form-control" value="">
                        </td>

                      </tr>
                      <tr>
                        <td>Desc</td>
                        <td>
                          <input type="text" name="ptarget_desc" id="ptarget_desc" class="form-control" value="">
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </form>

      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" style="margin-left:15px;" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Products') }}</h4>
            <p class="card-category"> {{ __('Here you can manage Products') }}</p>
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
            <div class="row">
              <div class="col-12 text-right">
                <a href="{{ route('cms-products.create') }}" class="btn btn-sm btn-primary">{{ __('Add products') }}</a>
              </div>
            </div>
            @csrf
            <div class="table-responsive">
              <table class="table">
                <colgroup>
                  <col>

                  <col>
                  <col>
                  <col>
                  <col width="45%">

                </colgroup>
                <thead class=" text-primary">
                  <th>
                    {{ __('Product Id') }}
                  </th>
                  <th>
                    {{ __('Title') }}
                  </th>
                  <th>
                    {{ __('Desc') }}
                  </th>
                  <th>
                    {{ __('Ref Paket')}}
                  </th>
                  <th class="text-center">
                    {{__('Action')}}
                  </th>
                </thead>
                <tbody>
                  @foreach($products as $data)
                  <tr>
                    <td>
                      {{ $data->product_id }}
                    </td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->desc}}</td>
                    <td>{{$data->ref_paket}}</td>
                    <td class="text-center">
                      <form action="{{ route('cms-products.destroy', $data) }}" enctype="multipart/form-data" id="myform" method="post">
                        @csrf
                        @method('delete')
                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('cms-products.edit', $data) }}" data-original-title="" title="">
                          <i class="material-icons">edit</i> Edit
                          <div class="ripple-container"></div>
                        </a>
                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this products?") }}') ? this.parentElement.submit() : ''">
                          <i class="material-icons">close</i> Delete
                          <div class="ripple-container"></div>
                        </button>
                        <a class="btn btn-rose btn-link" onclick="set_id('{{$data->product_id}}')" data-toggle="modal" data-target="#mymodal">
                          <i class="material-icons">widgets</i> Komponen
                          <div class="ripple-container"></div>
                        </a>
                      </form>
                    </td>
                    <!--   <td class="td-actions text-right">
                              <form action="{{ route('mp.destroy', $data) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('mp.edit', $data) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this products?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                         <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('admin'.'/profile') }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                          </td>-->
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
            <div class="row">
              {{ $products->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@push('js')
<script src="{{asset('js/sweetalert2.js')}}" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // Initialise Sweet Alert library
    // demo.showSwal();
  });

  function set_id(product_id) {
    $('#product_id').val(product_id);
  }

  function form_reset() {
    document.getElementById('form-input').reset();
    $('#btn-desc').prop("value", "add");
    $('#btn-desc .txt-desc').html("add");
    $('#btn-benefit').prop("value", "add");
    $('#btn-benefit .txt-benefit').html("add");
    $('#btn-target').prop("value", "add");
    $('#btn-target .txt-target').html("add");
  }

  function open_desc() {
    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    var product_id = $('#product_id').val();
    $.ajax({
      url: "{{route('productdesc-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        product_id: product_id

      },
      success: function(data) {
        $('.loading-wrapper').hide();
        $('#desc-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function open_benefit() {
    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    var product_id = $('#product_id').val();
    $.ajax({
      url: "{{route('productbenefit-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        product_id: product_id

      },
      success: function(data) {
        $('.loading-wrapper').hide();
        $('#benefit-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function open_target() {
    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    var product_id = $('#product_id').val();
    $.ajax({
      url: "{{route('producttarget-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        product_id: product_id
      },
      success: function(data) {
        $('.loading-wrapper').hide();
        $('#target-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }


  function add_benefit() {
    var token = $("input[name='_token']").val();
    var product_id = $("#product_id").val();
    var title = $('#pbenefit_title').val();
    var desc = $('#pbenefit_desc').val();
    var image = $("#pbenefit_image")[0].files[0];
    var id = $("#pbenefit_id").val();
    var cmd = $('#btn-benefit').prop("value");

    var formData = new FormData();
    formData.append('product_id', product_id);

    formData.append('id', id);
    formData.append('title', title);
    formData.append('desc', desc);
    formData.append('cmd', cmd);
    formData.append('benefit_img', image);
    formData.append('_token', token);
    $.ajax({
      url: "{{route('productbenefit-ajax')}}",
      method: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        form_reset();
        $('#benefit-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function add_target() {
    var token = $("input[name='_token']").val();
    var product_id = $("#product_id").val();
    var title = $('#ptarget_title').val();
    var desc = $('#ptarget_desc').val();
    var image = $("#ptarget_image")[0].files[0];
    var id = $("#ptarget_id").val();
    var cmd = $('#btn-target').prop("value");

    var formData = new FormData();
    formData.append('product_id', product_id);

    formData.append('id', id);
    formData.append('title', title);
    formData.append('desc', desc);
    formData.append('cmd', cmd);
    formData.append('target_img', image);
    formData.append('_token', token);
    $.ajax({
      url: "{{route('producttarget-ajax')}}",
      method: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
        form_reset();
        $('#target-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function edit_benefit(id, title, desc) {
    $('#pbenefit_title').val(title);
    $('#pbenefit_desc').val(desc);
    $('#pbenefit_id').val(id);
    $('#btn-benefit').prop("value", "update");
    $('#btn-benefit .txt-benefit').html("update");
  }

  function delete_benefit(id) {
    var token = $("input[name='_token']").val();
    $.ajax({
      url: "{{route('productbenefit-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        cmd: "delete"
      },
      success: function(data) {
        form_reset();
        $('#benefit-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function add_desc() {
    var token = $("input[name='_token']").val();
    var product_id = $("#product_id").val();
    var title = $('#pdesc_title').val();
    var desc = $('#pdesc_desc').val();
    var id = $("#pdesc_id").val();
    var cmd = $('#btn-desc').prop("value");
    $.ajax({
      url: "{{route('productdesc-ajax')}}",
      method: "POST",
      data: {
        id: id,
        _token: token,
        title: title,
        product_id: product_id,
        desc: desc,
        cmd: cmd
      },
      success: function(data) {
        form_reset();
        $('#desc-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function edit_desc(id, title, desc) {
    $("input[name='_token']").val();
    $("#pdesc_id").val(id);
    $('#pdesc_title').val(title);
    $('#pdesc_desc').val(desc);
    var cmd = $('#btn-desc').prop("value");
    $('#btn-desc').prop("value", "update");
    $('#btn-desc .txt-desc').html("update");
  }

  function delete_desc(id) {
    var token = $("input[name='_token']").val();
    $.ajax({
      url: "{{route('productdesc-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        cmd: "delete"
      },
      success: function(data) {
        form_reset();
        $('#desc-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function edit_target(id, title, desc) {
    $("input[name='_token']").val();
    $("#ptarget_id").val(id);
    $('#ptarget_title').val(title);
    $('#ptarget_desc').val(desc);
    var cmd = $('#btn-target').prop("value");
    $('#btn-target').prop("value", "update");
    $('#btn-target .txt-target').html("update");
  }

  function delete_target(id) {
    var token = $("input[name='_token']").val();
    $.ajax({
      url: "{{route('producttarget-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        cmd: "delete"
      },
      success: function(data) {
        form_reset();
        $('#target-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
</script>
@endpush
