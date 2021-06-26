@extends('layouts.app-auth', ['dashboard' => 'sekolah','activePage' => 'school-programs', 'titlePage' => __('school-programs'),'activeMenu' => __('school-management')])
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style type="text/css">
  .mymodal {
    max-width: 85% !important;
    margin-top: 30px !important;
  }

  .my-img-thumbnail {
    overflow: hidden;
    display: inline-block;
    margin-bottom: 5px;
    vertical-align: middle;
    text-align: center;
  }

  .my-img-thumbnail {
    border-radius: 16px;
  }

  .my-img-thumbnail {
    padding: 0.25rem;
    background-color: #fafafa;
    border: 1px solid #dee2e6;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.075);
    max-width: 100%;
    height: auto;
  }

  .my-img-thumbnail>img {
    max-height: 100%;
    max-width: 100%;
    height: auto;
    margin-right: auto;
    margin-left: auto;
    display: table-cell;
    vertical-align: middle
  }

  .school-gallery-wrapper {
    margin: 15px 0;
  }

  .school-gallery {
    height: 205px;
    border-radius: 16px;
    overflow: hidden;
    background-color: #fafafa;
    border: 1px solid #dee2e6;
    padding: 0 !important;
  }

  .gallery-btn-wrapper {
    position: absolute;
    border-radius: 16px;
    width: 100%;
    height: 100%;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
  }

  .gallery-btn-wrapper .gallery-btn {
    display: none;
    width: fit-content;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

  }

  .school-gallery:hover .gallery-btn-wrapper {
    background: rgba(0, 0, 0, 0.7);
    cursor: pointer;
  }

  .school-gallery:hover .gallery-btn {
    display: block;
  }

  .school-gallery img {
    max-height: 100%;
    max-width: 100%;
    height: auto;
    margin-right: auto;
    margin-left: auto;
    display: table-cell;
    vertical-align: middle;
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
</style>
@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="content">
  <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mymodal" role="document">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Schools Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="" id="form-input">

            <div class="row">
              <div class="card">
                <div class="card-header card-header-tabs card-header-rose">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Select:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link" href="#course-period" id="modal-first" data-toggle="tab" onclick="open_course_periods()">
                            <i class="material-icons">work</i> Course Periods
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#course-unit" data-toggle="tab" onclick="open_course_units()">
                            <i class="material-icons">work</i> Course Units
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#program-requirement" onclick="open_program_requirements()" data-toggle="tab">
                            <i class="material-icons">person</i> Program Requirements
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
                    <div class="tab-pane active show" id="course-period">
                      <div class="col-md-12" id="course_period-output">

                      </div>
                      <table class="table">
                        <tbody class="pendidikan-wrapper">
                          <tr>
                            <td>Course Unit Period Name</td>
                            <td><input type="text" name="period_name" class="form-control" id="period_name"><input type="hidden" name="course_period_id" id="course_period_id"></td>
                            <td class="text-center"> <button type="button" rel="tooltip" title="" id="course_period-btn" onclick="add_course_period(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add" data-original-title="Tambah">
                              <i class="material-icons">add</i> <span>Add</span>
                            </button></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane " id="course-unit">
                      <div class="col-md-12" id="course_unit-output">

                      </div>
                      <table class="table">
                        <tbody class="pendidikan-wrapper">
                          <tr>
                            <td>Course Period</td>
                            <td id="select_period-output">
                            </td>
                            <td class="text-center" rowspan="3"> <button type="button" rel="tooltip" title="" id="course_unit-btn" onclick="add_course_unit(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add" data-original-title="Tambah">
                              <i class="material-icons">add</i> <span>Add</span>
                            </button></td>
                          </tr>
                          <tr>
                            <td>Course Unit</td>
                            <td ><input type="text" name="course_unit" class="form-control" id="course_unit"><input type="hidden" name="course_unit_id" id="course_unit_id"></td>
                            
                          </tr>
                          <tr>
                            <td></td>
                            <td>
                              <div><input type="checkbox" name="multiple_course_unit_check" id="multiple_course_unit_check" onclick="toggle_multiple_course_unit(this)" autocomplete="off">
                                Input Multiple Course Unit At Once (Bulk Insert)
                              </div>
                              <div id="multiple-course-unit-wrapper" class="mt-3" style="display: none;">
                                <input type="text" name="multiple_course_unit" id="multiple_course_unit">
                              </div>
                            </td>
                          </tr>

                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane" id="program-requirement">
                      <div class="col-md-12" id="program_requirement-output">

                      </div>

                      <table class="table">
                        <tbody class="pendidikan-wrapper">

                          <tr>
                            <td>Requirements</td>
                            <td><input type="text" name="requirements" class="form-control" id="requirements"><input type="hidden" name="requirements_id" id="requirements_id"></td>
                            <td class="text-center"> <button type="button" rel="tooltip" title="" id="program_requirement-btn" onclick="add_program_requirement(this)" class="btn btn-primary btn-link btn-sm btn-add" value="add" data-original-title="Tambah">
                              <i class="material-icons">add</i> <span>Add</span>
                            </button></td>
                          </tr>


                        </tbody>
                      </table>
                    </div>






                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('School programs') }}</h4>
            <p class="card-category"> {{ __('Here you can manage School programs') }}</p>
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
                <a href="{{ route('school-program.create') }}" class="btn btn-sm btn-primary">{{ __('Add School programs') }}</a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12"> <h4>Filter your Search</h4></div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <select type="text" class="selectize" id="searchSchool" name="searchSchool">
                      <option value="">- Select School -</option>

                      @foreach($schools as $school)

                      <option value="{{$school->id }}" @if($school->id == $schoolId) {{"selected"}} @endif >{{$school->name.' ('.$school->abbreviation.'), '. $school->address .', '.$school->city_name.', '.$school->region_name.', '.$school->country_name}}</option>

                      @endforeach
                    </select>
                  </div>
                </div>  
              </div> 
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-no-bordered table-hover datatable mdl-data-table dataTable dtr-inline collapsed" id="dataTable" style="table-layout:fixed">
                <colgroup>
                  <col width="18%">
                  <col width="18%">
                  <col>
                  <col>
                </colgroup>
                <thead class=" text-primary">
                  <tr>
                    <th>{{__('School Id')}}</th>

                    <th>{{__('School')}}</th>
                    <th>{{__('Address')}}</th>
                    <th>{{ __('Name') }}</th>
                    <th> {{__('Enrollment Fee')}}</th>
                    <th>{{__('Material Fee')}}</th>
                    <th>{{__('Course Fee')}}</th>
                    <th>{{__('Total Fee')}}</th>
                    <th class="text-center">{{ __('Actions') }}</th>
                  </tr>
                 <!--  <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>-->
              </thead>
              <tbody>

              </tbody>
            </table>

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
<script type="text/javascript">
  $('#searchSchool').selectize({
    width : 'resolve'
  });
  function toggle_multiple_course_unit(el){
    if(el.checked == true){
      $('#multiple-course-unit-wrapper').show();
      $('#course_unit').attr('disabled', 'disabled');
    }
    else{
      $('#multiple-course-unit-wrapper').hide();
      $('#course_unit').removeAttr('disabled');
      var $select =  $('#multiple_course_unit').selectize(); 
      var control = $select[0].selectize
      control.clear();
    }
  }
  $('#multiple_course_unit').selectize({
    delimiter: '|',
    persist: false,
    valueField: 'name',
    labelField: 'name',
    searchField: 'name',
    create: function(input) {

      return {

        name:input
      }
    }
  });
  var program_id;
  var school_id;

  $(document).ready(function() {
    $( "#course_unit" ).keydown(function( event ) {
      if ( event.which == 13 ) {
       var el = document.getElementById('course_unit-btn');
       add_course_unit(el);
     }
   });
    $( "#requirements" ).keydown(function( event ) {
      if ( event.which == 13 ) {
       var el = document.getElementById('program_requirement-btn');
       add_program_requirement(el);
     }
   });
    $( "#period_name" ).keydown(function( event ) {
      if ( event.which == 13 ) {
       var el = document.getElementById('course_period-btn');
       add_course_period(el);
     }
   });
    


/*    $('#dataTable thead tr:eq(0) th').each( function (i) {
      if(i < ($('#dataTable thead tr:eq(0) th').length)){
        var title = $(this).text();
        $('#dataTable thead tr:eq(1) th:eq('+i+')').html( '<input type="text" class="form-control" placeholder="'+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {

                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
      }else{
        $(this).html("");
      }
    } ); */


    $('#searchSchool').on('change',function(){
      console.log(table);
      table.draw();
    });

    var table = $('#dataTable').DataTable({
      "processing": true,
      "serverSide": true,
      'serverMethod': 'post',
      "stateSave": true,
      "searching" : true,
      "orderCellsTop": true,
      "fixedHeader": true,
      "ajax": {
        "url" : "{{route('school-program-ajax')}}",
        "data" :function(data) {
          var search_school_id = $('#searchSchool').val();
          var school_id = "{{ isset($schoolId) ? $schoolId : '' }}";
          data.search_school_id = search_school_id;
          data.school_id = school_id;
          data._token = "{{csrf_token()}}";
        }
      },
      "columns":[
      {data : "school_id",name: "school_id"},
      {data : "school_name",name: "school_name"},
      {data : "school_address",name: "school_address"},
      {data : "name",name: "name"},
      {data : "enrollment_fee",name: "enrollment_fee"},
      {data : "material_fee",name: "material_fee"},
      {data : "course_fee",name: "course_fee"},
      {data : "total",name: "total"},
      {data : null, name: null},
      ],

      "columnDefs":[
      {
        "render": function(data, type, row) {

          return "Address :" + data + "<br> City :" + row.city_name
        },
        "targets" : 2
      },
      {
        "className": "text-right",
        "render": function(data, type, row) {
          url = "{{route('school-program.destroy',"")}}/";
          return '<form action="' + url + row.id + '" method="post">' + '@csrf' + '@method('delete')'+
          '<button type="button" class="btn btn-primary btn-link" onclick="open_modal(' + row.id + ','+row.school_id+')">' +
          '<i class="material-icons">menu</i>' +
          '<div class="ripple-container"></div>' +
          '<div class="">More</div>' +
          '</button>' +
          '<a rel="tooltip" class="btn btn-success btn-link" href="' + url + row.id + "/edit" + '" data-original-title="" title="">' +
          '<i class="material-icons">edit</i>' +
          '<div class="ripple-container"></div>' +
          '<div class="">Edit</div>' +
          '</a>' +
          '<button type="button" class="btn btn-danger btn-link" data-original-title="" title=""' +
          'onclick="confirmDelete(this)">' +
          '<i class="material-icons">close</i>' +
          '<div class="ripple-container"></div>' +
          '<div class=""> Del </div>' +
          '</button>' +
          '</form>';
        },
        "targets" : -1
      },
      {
       "visible" : false,
       "searchable" : false,
       "targets" : 0
     }
     ]

   });

    
  });

  function open_modal(id,sid) {
    program_id = id;
    school_id = sid;
    document.getElementById('modal-first').click();
    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    $.ajax({
      url: "{{route('school_course_period-ajax')}}",
      method: "POST",
      data: {
        _token: token
      },
      success: function(data) {
        $('#course_period-output').html(data);
        $('.loading-wrapper').hide();
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
    $('#mymodal').modal('toggle');
  }

  function confirmDelete(x) {
    if (confirm("Are you sure you want to delete this school?")) {
      x.parentElement.submit();
    } else {
      return false;
    }
  }
  function open_course_periods() {
    $('.loading-wrapper').show();
    var token = $("input[name='_token']").val();
    $.ajax({
      url: "{{route('school_course_unit-ajax')}}",
      method: "POST",
      data: {
        _token: token
      },
      success: function(data) {
        $('#course_unit-output').html(data);
        $('.loading-wrapper').hide();
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  function once(fn, context) {
        //fn tuh isinye function dpt dr fungsi sblmnye
        var result;

        return function() {
          if (fn) {
                // kalau functionnya fn true
                result = fn.apply(context || this, arguments);
                fn = null;
                //fnnye di ubah jd null maka dari itu niali fn diatas bkln selalu false karena null = false
              }
              return result;
            };

          }

    // function ini sendiri dimasukan ke once
    var periodOnce = once(function() {
      var token = $("input[name='_token']").val();
      $.ajax({
        url: "{{route('school_course_unit-ajax')}}",
        method: "POST",
        data: {
          _token: token,
          school_id: school_id,
          program_id: program_id
        },
        success: function(data) {
          $('#course_unit-output').html(data);
          $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
          alert(request.responseText);
        }
      });
    });

    function open_course_units() {

      $('.loading-wrapper').show();
      var token = $("input[name='_token']").val();

      $.ajax({
        url: "{{route('school_course_unit-ajax')}}",
        method: "POST",
        data: {
          _token: token,
          school_id: school_id,
          program_id: program_id
        },
        success: function(data) {
          $('#course_unit-output').html(data);
          $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
          alert(request.responseText);
        }
      });
      $.ajax({
        url: "{{route('school_select_period-ajax')}}",
        method: "POST",
        data: {
          _token: token,
          program_id : program_id
        },
        success: function(data) {
          $('#select_period-output').html(data);
          $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
          alert(request.responseText);
        }
      });


    }
    function open_program_requirements() {

      $('.loading-wrapper').show();
      var token = $("input[name='_token']").val();
      $.ajax({
        url: "{{route('school_program_requirement-ajax')}}",
        method: "POST",
        data: {
          _token: token,
          program_id : program_id
        },
        success: function(data) {
          $('#program_requirement-output').html(data);
          $('.loading-wrapper').hide();
        },
        error: function(request, status, error) {
          alert(request.responseText);
        }
      });


    }

    function add_course_unit(el) {
     var token = $("input[name='_token']").val();
     var id = $("#course_unit_id").val();
     var period_id = $('#course_period').val();
     var name = $('#course_unit').val();
     var multiple_course_unit = $('#multiple_course_unit').val();
     var cmd = $(el).prop("value");
     $.ajax({
      url: "{{route('school_course_unit-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        name: name,
        period_id:period_id,
        school_id: school_id,
        program_id: program_id,
        multiple_course_unit : multiple_course_unit,
        cmd: cmd
      },
      success: function(data) {
        $('#multiple_course_unit_check').removeAttr('disabled');
        form_reset();
        var $select =  $('#multiple_course_unit').selectize(); 
        var control = $select[0].selectize
        control.clear();
        $('#course_unit-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
   }
   function add_course_period(el) {
    var token = $("input[name='_token']").val();
    var id = $("#course_period_id").val();

    var name = $('#period_name').val();
    var cmd = $(el).prop("value");
    $.ajax({
      url: "{{route('school_course_period-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id: id,
        name: name,
        cmd: cmd
      },
      success: function(data) {
        form_reset();
        $('#course_period-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
  function add_program_requirement(el) {
   var token = $("input[name='_token']").val();
   var id = $("#requirements_id").val();
   var name = $('#requirements').val();
   var cmd = $(el).prop("value");
   $.ajax({
    url: "{{route('school_program_requirement-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      name: name,
      school_id: school_id,
      program_id: program_id,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#multiple_course_unit_check').removeAttr('disabled');
      $('#program_requirement-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
 }
 function edit_course_period(id, name) {
  $('#course_period_id').val(id);
  $('#period_name').val(name);
  $('#course_period-btn').prop("value", "update");
  $('#course_period-btn > i,#course_period-btn > span').html("update");
}
function edit_course_unit(id,period_id,name) {
  $('#course_period').val(period_id);
  $('#course_unit').val(name);
  $('#course_unit_id').val(id);
  $('#multiple_course_unit_check').attr('disabled','disabled');
  $('#multiple-course-unit-wrapper').hide();
  $('#course_unit').removeAttr('disabled');
  var $select =  $('#multiple_course_unit').selectize(); 
  var control = $select[0].selectize
  control.clear();
  $('#course_unit-btn').prop("value", "update");
  $('#course_unit-btn > i,#course_unit-btn > span').html("update");
}
function edit_program_requirement(id,name) {
 $("#requirements_id").val(id);
 $('#requirements').val(name);
 $('#program_requirement-btn').prop("value", "update");
 $('#program_requirement-btn > i,#program_requirement-btn > span').html("update");
}
function delete_program_requirement(id) {
  var token = $("input[name='_token']").val();
  var cmd = "delete";
  $.ajax({
    url: "{{route('school_program_requirement-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      program_id: program_id,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#program_requirement-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function delete_course_unit(id) {
  var token = $("input[name='_token']").val();
  var cmd = "delete";
  $.ajax({
    url: "{{route('school_course_unit-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      program_id:program_id,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#course_unit-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}

function delete_course_period(id) {
  var token = $("input[name='_token']").val();
  var cmd = "delete";
  $.ajax({
    url: "{{route('school_course_period-ajax')}}",
    method: "POST",
    data: {
      _token: token,
      id: id,
      cmd: cmd
    },
    success: function(data) {
      form_reset();
      $('#course_period-output').html(data);
    },
    error: function(request, status, error) {
      alert(request.responseText);
    }
  });
}
function form_reset() {
  document.getElementById('form-input').reset();
  $('.btn-add').prop("value", "add");
  $('.btn-add > i,.btn-add > span').html("add");
}

</script>
@endpush