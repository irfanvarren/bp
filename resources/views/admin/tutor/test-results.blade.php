@extends('layouts.app-auth', ['dashboard' => 'tutor','activePage' => '
s', 'titlePage' => __('Test results'),'activeMenu' => 'content-management'])
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

table tr th{
  font-size:13px !important;
}
</style>
@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Test Results') }}</h4>
            <p class="card-category"> {{ __('Here you can manage test results') }}</p>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" value-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            @csrf
            <div class="table-responsive">
              <table class="table table-striped table-no-bordered table-hover datatable mdl-data-table dataTable dtr-inline collapsed" id="dataTable">
                <colgroup>
                  <col >
                  <col style="width: 12%;">
                  <col>
                  <col>
                </colgroup>
                <thead class="text-primary">
                  <th style="display: none;">Id</th>
                  <th>Test</th>
                  <th>{{__('Name')}}</th>
                  <th>{{__('Email')}}</th>
                  <th>{{__('Total Score')}}</th>
                  <th>
                    {{ __('Status') }}
                  </th>
                  <th>{{__('Tanggal Test')}}</th>
                  <th class="text-center">
                    {{__('Action')}}
                  </th>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.25/sorting/datetime-moment.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

   $.fn.dataTable.moment( 'D/M/YYYY' );

  
  var table = $('.datatable').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [[ 0, "desc" ]],
    "columns": [
    {data : "id"},
    {data : "test_name"}, 
    {data : "name"}, 
    {data : "email"},
    {data : "score"}, 
    {data : null},
    {data : "start_time"},
    {data : null}
    ],
    "ajax":{ 
      "url" : "{{route('online-test-results-ajax')}}",
      "type" : "GET",
      "dataType": "JSON",

      "data" : {
        _token : "{{csrf_token()}}"
      },

      "dataSrc" : function(json){
        return json.data;
      },
    },
    "columnDefs": [ 
    {
      "targets" : 0,
      "visible": false
    },
    
    {
      "targets":-1,
      "data":null,
      "render": function(data,type,row,meta){
        return '<div><a href="{{url("tutor-admin/test-results/monitoring")}}'+row.id+'">Monitoring</a></div>';
      }
    },
    {
      "targets": -2,
      "render" : function (data,type,row,meta){
       if(type === "display"){
        data = new Date(row.start_time * 1000).toLocaleDateString();
      }

      return data;
    }
  },
  {
    "targets" : 4,
    "render": function(data,type,row,meta){
      var score = row.score;
      if(score != null){
        score = JSON.parse(row.score.replace(/&quot;/g, '"'));
      }
      if(score != null){
        if(score.hasOwnProperty("final_score")){
          return score.final_score;
        }else{
          if(row.test_id == "1"){
            if(row.total_score % 0.5 == 0){
              return ((score.total_score - 2) / 2).toFixed(1);
            }else{
              return (Math.round((score.total_score - 2) / 2)).toFixed(1);
            }
          }else if(row.test_id == "2"){
            return score.total_score * 10 / 3;
          }else{
            return score.total_score;
          }
        }
      }else{
        return "-";
      }
      return "-"; 
    }
  },
  {
    "targets":-3,
    "data" : null,
    "render": function(data,type,row,meta){

      // console.log(row);
      if(row.start_time != null)
      {

       if(row.score !=null){
         return '<div class="badge badge-success">Finished</div>';
       }else{
         return '<div class="badge badge-warning">Ongoing</div>';
       }          
     }else{
       return '<div class="badge badge-secondary">Not Started Yet</div>';
     }

   }
 }
 ]
});
});
</script>
@endpush
