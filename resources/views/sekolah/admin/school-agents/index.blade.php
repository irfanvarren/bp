@extends('layouts.app-auth', ['activePage' => 'school-agents', 'titlePage' => __('School Agents'),'activeMenu' => ''])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style media="screen">
  .mymodal {
    max-width: 100% !important;
    margin-top: 0px !important;
    padding:17px !important;
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
  .commission-list{
    position: relative;
  }
  .commission-list:after{
    content: "";
    width: calc(100% + 60px);
    height: 15px;
    border-bottom: 1px solid #ddd;
    display: block;
    position: absolute;
    left: -30px;
  }
</style>
@endpush
@section('modal')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mymodal" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="card">
            <div class="card-header card-header-tabs card-header-rose">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Select:</span>
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" href="#contracts-tabContent" data-toggle="tab" id="open-division">
                        <i class="material-icons">work</i> School Contracts & Commissions
                        <div class="ripple-container"></div>
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#agent_contract-tabContent" data-toggle="tab" id="open-division">
                        <i class="material-icons">work</i> Agent Contracts
                        <div class="ripple-container"></div>
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#agent_has_school-tabContent" data-toggle="tab" id="open-division">
                        <i class="material-icons">work</i> Agent Has Schools
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
                <div class="tab-pane fade active show" id="contracts-tabContent">

                  <div class="row">

                    <div class="col-sm-12" id="contracts-output" style="margin-bottom:30px;">

                    </div>
                    <div class="col-sm-12" style="padding:0 30px">
                      <div class="row">
                      
                        <div class="col-sm-12" id="contract-form-wrapper">
                           <form class="" action="" id="form-input">
                          <div class="row">
                            <label class="col-sm-2 text-right" style="padding:0;">{{ __('Contract With :') }}</label>
                            <div class="col-sm-8">
                              <div class="form-check-inline">
                               <input type="radio" class="form-check-input" name="contract_with" id="contract-with-school" checked>  <label class="form-check-label"> School</label>
                             </div>
                             <div class="form-check-inline">
                               <input type="radio" class="form-check-input" name="contract_with" id="contract-with-agent"> <label class="form-check-label">Agent</label>
                             </div>
                           </div>
                         </div>
                         <div class="row" style="margin-top:8px;padding-bottom:10px;">
                          <label class="col-sm-2 col-form-label">{{ __('School') }}</label>
                          <div class="col-sm-8">
                            <select class="selectize col-sm-12 pl-0 pr-0" required data-style="select-with-transition" id="contract-school" name="contract-school">
                              <option value="">- Select School -</option>
                             
                            </select>
                          </div>
                           <input type="hidden" name="school_agents_id" id="school_agents_id">
                          <input type="hidden" name="contract_id" id="contract_id">
                        </div>
                        <div class="row" id="input-agent-wrapper" style="display: none;">
                         <label class="col-sm-2 col-form-label">{{ __('Parent Agent') }}</label>
                         <div class="col-sm-8">
                          <select class="selectize col-sm-12 pl-0 pr-0" required data-style="select-with-transition" id="parent_agent" name="parent_agent">
                            <option value="">- Select Agent -</option>
                            @foreach($agents as $agent)
                            <option value="{{$agent->id}}">{{$agent->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="row">
                       <label class="col-sm-2 col-form-label">{{ __('Start Date') }}</label>
                       <div class="col-sm-8">
                        <div class="form-group{{ $errors->has('start_date') ? ' has-danger' : '' }}">
                          <input class="form-control timepicker {{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" id="start_date" type="text" value="" placeholder="d/m/y"/>
                          @if ($errors->has('start_date'))
                          <span id="start_date-error" class="error text-danger" for="input-start_date">{{ $errors->first('start_date') }}</span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                     <label class="col-sm-2 col-form-label">{{ __('End Date') }}</label>
                     <div class="col-sm-8">
                       <div class="form-group{{ $errors->has('end_date') ? ' has-danger' : '' }}">
                        <input class="form-control timepicker {{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" id="end_date" type="text" value="" placeholder="d/m/y"/>
                        @if ($errors->has('end_date'))
                        <span id="end_date-error" class="error text-danger" for="input-end_date">{{ $errors->first('end_date') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                   <label class="col-sm-2 col-form-label">{{ __('Note') }}</label>
                   <div class="col-sm-8">
                    <div class="form-group{{ $errors->has('note') ? ' has-danger' : '' }}">
                      <textarea name="note" class="form-control" id="note" rows="4" id="note" placeholder="Note..."></textarea>
                      @if ($errors->has('note'))
                      <span id="note-error" class="error text-danger" for="input-note">{{ $errors->first('note ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8">
                   <button type="button" rel="tooltip" title="" id="contract-btn" onclick="add_contract(this)" class="btn btn-primary btn-sm btn-add" style="float:right;" value="add"
                   data-original-title="Tambah">
                   <i class="material-icons">add</i> <span>Add</span>
                 </button>
               </div>
             </div>
       </form>
           </div>
  


         <div class="col-sm-5" id="commission-form-wrapper" style="display:none;border: 2px solid #afafaf;padding: 15px;">
           
          <div class="row">
            <div class="col-sm-12" style="text-align: center;margin-bottom:15px;"> 
              <h3> 
                <div><u><span id="commission-for-output">School</span> Commission</u></div>
                <span id="commission-school-name"></span> </h3></div>
          </div>
          <div class="row">
            <label class="col-sm-2 text-right" style="padding:0;">{{ __('commission Type') }}</label>
            <div class="col-sm-8">
              <div class="form-check-inline">
               <input type="radio" class="form-check-input" name="commission_type" id="commission-amount" checked>  <label class="form-check-label"> Amount</label>
             </div>
             <div class="form-check-inline">
               <input type="radio" class="form-check-input" name="commission_type" id="commission-percentage"> <label class="form-check-label">Percentage</label>
             </div>
           </div>
         </div>
         <form class="" action="" id="form-input-commission">
         <div class="row" id="commission-amount-wrapper">
           <label class="col-sm-2 col-form-label">{{ __('commission') }}</label>
           <div class="col-sm-8">
            <input type="hidden" name="commission_for" id="commission_for">
            <input type="hidden" name="commission_index" id="commission_index">
            <input type="hidden" name="commission_school_id" id="commission_school_id">
            <input type="hidden" name="commission_id" id="commission_id">
            <input type="text" name="commission" id="commission" class="form-control" value="">
          </div>
        </div>
        <div class="row" id="commission-percentage-wrapper" style="display:none;">
         <label class="col-sm-2 col-form-label">{{ __('commission (percent)') }}</label>
         <div class="col-sm-8">
          <input type="text" name="commission_percent" id="commission_percent" class="form-control" value="">
        </div>
      </div>
      <div class="row">
       <label class="col-sm-2 col-form-label">{{ __('Note') }}</label>
       <div class="col-sm-8">
        <div class="form-group{{ $errors->has('note') ? ' has-danger' : '' }}">
          <textarea name="commission_note" class="form-control" id="commission_note" rows="4" id="note" placeholder="Note..."></textarea>
          @if ($errors->has('note'))
          <span id="note-error" class="error text-danger" for="input-note">{{ $errors->first('note ') }}</span>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
       <button type="button" rel="tooltip" title="" id="input-commission-btn" onclick="add_commission(this)" class="btn btn-primary btn-sm btn-add" style="float:right;" value="add"
       data-original-title="Tambah">
       <i class="material-icons">add</i> <span>Add</span>
     </button>
   </div>
 </div>

 </form>
</div>



</div>
</div>
</div>
</div>
<div class="tab tab-pane" id="agent_contract-tabContent">
  
</div>
<div class="tab tab-pane" id="agent_has_school-tabContent">
  
</div>
</div>
</div>
</div>
</div>


</div>
</div>
</div>
</div>
@endsection
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Agents') }}</h4>
            <p class="card-category"> {{ __('Here you can manage Agents') }}</p>
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
                <a href="{{ route('school-agent.create') }}" class="btn btn-sm btn-primary">{{ __('Add agent') }}</a>
              </div>
            </div>
            <div class="table-responsive">
              <table  class="table table-striped table-no-bordered table-hover datatable mdl-data-table dataTable dtr-inline collapsed" id="dataTable">
                <thead class=" text-primary">
                  <th>No</th>
                  <th>
                    {{ __('Name') }}
                  </th>
                  <th>
                    {{ __('Logo') }}
                  </th>
                  <th>{{__('Note')}}</th>
                  <th class="text-right">
                    {{ __('Actions') }}
                  </th>
                </thead>
                <tbody>
                  @foreach($agents as $key => $agent)
                  <tr>
                    <td>{{$key += 1}}</td>
                    <td>
                      {{ $agent->name }}
                    </td>

                    <td>
                     <img class="lazy" data-src="{{asset('img/schools-agents/'.$agent->id.'/'.$agent->logo )}}" style="width:120px;" alt=""> 
                   </td>
                   <td>{!!nl2br($agent->note)!!}</td>
                   <td class="td-actions text-right">
                    <form action="{{ route('school-agent.destroy', $agent) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="button" class="btn btn-primary btn-link" onclick="open_modal('{{$agent->id}}')">
                        <i class="material-icons">menu</i>
                        <div class="ripple-container"></div>
                        <div class="">
                          More
                        </div>
                      </button>
                      <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('school-agent.edit', $agent) }}" data-original-title="" title="">
                        <i class="material-icons">edit</i>
                        <div class="ripple-container"></div>
                      </a>
                      <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this agent?") }}') ? this.parentElement.submit() : ''">
                        <i class="material-icons">close</i>
                        <div class="ripple-container"></div>
                      </button>
                    </form>

                  </td>
                </tr>
                @endforeach
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
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.0.0/dist/lazyload.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('.timepicker').datetimepicker({
      //          format: 'H:mm',    // use this format if you want the 24hours timepicker
      format: 'DD/MM/YYYY',
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'

      },
     // defaultTime : '00:00'
   });
  });

  $('#contract-with-agent').click(function(){
    if($(this).prop("checked") == true){
      $('#input-agent-wrapper').show();
    }
  });
  $('#contract-with-school').click(function(){
    if($(this).prop("checked") == true){
      $('#input-agent-wrapper').hide();
    }
  });

  $('#commission-percentage').click(function(){
    if($(this).prop("checked") == true){
       document.getElementById('form-input-commission').reset();
      $('#commission-percentage-wrapper').show();
      $('#commission-amount-wrapper').hide();
    }
  });
  $('#commission-amount').click(function(){
    if($(this).prop("checked") == true){
      document.getElementById('form-input-commission').reset();
     $('#commission-amount-wrapper').show();
     $('#commission-percentage-wrapper').hide();
   }
 });

  var agent_id;
  var token = $("input[name='_token']").val();



  function open_modal(set_agent_id) {
    agent_id = set_agent_id;
    $('.loading-wrapper').show();
    form_reset();
    $.ajax({
      url: "{{route('school-contracts-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        agent_id: agent_id,
      },
      success: function(data) {
        $('#contracts-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
    $('#mymodal').modal('toggle');
    $('.loading-wrapper').hide();
  }


var items = {!! json_encode($schools)!!};
  $('#contract-school').selectize({
    width : 'resolve',
    valueField : 'id',
    labelField : 'name',
    searchField: ['name'],
    create:false,
    options: items,
    render: {
     option: function(item, escape) {
      return '<div><strong>' + item.name + '</strong><br>' + item.address + ', ' + item.city_name + ', ' + item.region_name + ', ' + item.country_name + '</div>';
    }
  },
  load: function(query, callback) {
    if (!query.length) return callback();
    $.ajax({
      url: '{{route("contract-schools-ajax")}}',
      type: 'GET',
      dataType: 'json',
      data: {
        _token: token,
        q : query
      },
      error: function() {
        callback();
      },
      success: function(data) {
        callback(data);
      }
    });
  }

});
  $('#parent_agent').selectize({
    width : 'resolve',
    valueField : 'id',
    labelField : 'name',
    searchField: ['name'],
    create:false,
    render: {
     option: function(item, escape) {
      return '<div>' + item.name + '<div>';
    }
  },
  load: function(query, callback) {
    if (!query.length) return callback();
    $.ajax({
      url: '{{route("parent-agent-ajax")}}',
      type: 'GET',
      data: {
        _token: token,
        q : query,
        agent_id :agent_id
      },
      error: function() {
        callback();
      },
      success: function(data) {
        callback(data);
      }
    });
  }
});
  function form_reset() {
    document.getElementById('form-input').reset();
    var $select = $('#contract-school').selectize(); 
    var selectize = $select[0].selectize;
    selectize.clear();

    var $select2 = $('#parent_agent').selectize();  // This initializes the selectize control
    var selectize2 = $select2[0].selectize;
    selectize2.clear();
    $('.btn-add').prop("value", "add");
    $('.btn-add > i,.btn-add > span').html("add");
  }

  function commission_form_reset(){
     form_reset();
       document.getElementById('form-input-commission').reset();
    $('.btn-add').prop("value", "add");
    $('.btn-add > i,.btn-add > span').html("add");
  }

  var table = $('.datatable').DataTable({
    responsive:false
  });

  function add_contract(el){
    var id = $("#contract_id").val();
    var school_agents_id = $('#school_agents_id').val();
    var school_id = $('#contract-school').val();
    var parent_agent_id = $("#parent_agent").val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var note = $('#note').val();
    var cmd = $(el).prop("value");


    $.ajax({
      url: "{{route('school-contracts-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id : id,
        school_agents_id:school_agents_id,
        school_id : school_id,
        agent_id : agent_id,
        parent_id : parent_agent_id,
        start_date : start_date,
        end_date : end_date,
        note : note,
        cmd: cmd
      },
      success: function(data) {
        form_reset();
        $('#contracts-output').html(data);
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }
  function edit_contract(id,school_agents_id,school_id,school_name,agent_id,parent_agent_id,agent_name,start_date,end_date,note) { 

    $('#contract_id').val(id);
    $('#school_agents_id').val(school_agents_id);
   // $('#contract-school').val(account_name);
    var $select = $('#contract-school').selectize();  // This initializes the selectize control
    var selectize = $select[0].selectize;
    selectize.addItem(school_id);

    var $select2 = $('#parent_agent').selectize();  // This initializes the selectize control
    var selectize2 = $select2[0].selectize;
    selectize2.addOption({id:parent_agent_id, text:parent_agent_id, name : agent_name });
    selectize2.refreshOptions();
    selectize2.addItem(parent_agent_id);
    selectize.refreshOptions();

    $('#parent_agent').val(parent_agent_id);
    $('#start_date').val(start_date);
    $('#end_date').val(end_date);
    $('#note').val(note);
    $('#contract-btn').prop("value", "update");
    $('#contract-btn > i,#contract-btn > span').html("update");
  }

  function delete_contract(id,school_agents_id,school_id){
    if(confirm('Are you sure want to delete this data ?') == true){
      var cmd = "delete";
      $.ajax({
        url: "{{route('school-contracts-ajax')}}",
        method: "POST",
        data: {
          _token: token,
          id: id,
          school_agents_id : school_agents_id,
          school_id:school_id,
          agent_id: agent_id,
          cmd: cmd
        },
        success: function(data) {
          $('#contracts-output').html(data);
        },
        error: function(request, status, error) {
          alert(request.responseText);
        }
      });
    }
  }

  function open_commission(commission_for,el_index,school_id,school_name){
    commission_form_reset();
    $('#commission_for').val(commission_for);
    $('#commission-for-output').html(commission_for);
    $('#commission-form-wrapper').show();
    $('#contract-form-wrapper').removeClass('col-sm-12');
    $('#contract-form-wrapper').addClass('col-sm-7');
    $('#commission-school-name').html(school_name);
    $('#commission_school_id').val(school_id);
    $('#commission_index').val(el_index);
  }


  function add_commission(el){
    var id = $('#commission_id').val();
    var school_id = $('#commission_school_id').val();
    var commission = $('#commission').val();
    var commission_percent = $('#commission_percent').val();
    var commission_for = $('#commission_for').val();

    var el_index = $('#commission_index').val();
    var note = $('#commission_note').val();
    var cmd = $(el).prop("value");

    $.ajax({
      url: "{{route('school-commission-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id : id,
        school_id : school_id,
        agent_id : agent_id,
        commission_for : commission_for,
        commission: commission,
        commission_percent : commission_percent,
        commission_index: el_index,
        note : note,
        cmd : cmd
      },
      success: function(data) {
        commission_form_reset();
        if(commission_for == "School"){
          $('#commission-output'+el_index).html(data);
        }else if(commission_for == "Marketing"){
          $('#marketing-commission-output'+el_index).html(data);
        }else if(commission_for == "Sub-Agent"){
          $('#subagent-commission-output'+el_index).html(data);
        }
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }


  function edit_commission(commission_for,id,index,school_id,school_name,commission,commission_percent,note){
      commission_form_reset();
    open_commission(commission_for,index,school_id,school_name);
    $('#commission_for').val(commission_for);
    if(commission != ""){
      $('#commission-amount').trigger('click');
    }else{
      $('#commission-percentage').trigger('click');
    }
    $('#commission_id').val(id);
    $('#commission').val(commission);
    $('#commission_percent').val(commission_percent);
    $('#commission_note').val(note);
    $('#input-commission-btn').prop("value", "update"); 
    $('#input-commission-btn > i,#input-commission-btn > span').html("update");
  }

  function delete_commission(commission_for,id,index,school_id,agent_id){
      commission_form_reset();
      var cmd = "delete";
      $.ajax({
      url: "{{route('school-commission-ajax')}}",
      method: "POST",
      data: {
        _token: token,
        id : id,
        school_id : school_id,
        agent_id : agent_id,
        commission_index: index,
        commission_for: commission_for,
        cmd : cmd
      },
      success: function(data) {
         if(commission_for == "School"){
        $('#commission-output'+index).html(data);
        }else if(commission_for == "Marketing"){
        $('#marketing-commission-output'+index).html(data);
        }else if(commission_for == "Sub-Agent"){
        $('#subagent-commission-output'+index).html(data);
        }
      },
      error: function(request, status, error) {
        alert(request.responseText);
      }
    });
  }

  (function() {
    function logElementEvent(eventName, element) {
      console.log(
        Date.now(),
        eventName,
        element.getAttribute("data-src")
        );
    }
    var callback_enter = function(element) {
      logElementEvent("🔑 ENTERED", element);
    };
    var callback_exit = function(element) {
      logElementEvent("🚪 EXITED", element);
    };
    var callback_reveal = function(element) {
      logElementEvent("👁️ REVEALED", element);
    };
    var callback_loaded = function(element) {
      $(element).addClass('scale-up-center');
      logElementEvent("👍 LOADED", element);
    };
    var callback_error = function(element) {
      logElementEvent("💀 ERROR", element);
      element.src =
      "https://via.placeholder.com/440x560/?text=Error+Placeholder";
    };
    var callback_finish = function() {
      logElementEvent("✔️ FINISHED", document.documentElement);
    };
    var ll = new LazyLoad({
      elements_selector: ".lazy",
            // Assign the callbacks defined above
            callback_enter: callback_enter,
            callback_exit: callback_exit,
            callback_reveal: callback_reveal,
            callback_loaded: callback_loaded,
            callback_error: callback_error,
            callback_finish: callback_finish
          });
  })();
</script>
@endpush