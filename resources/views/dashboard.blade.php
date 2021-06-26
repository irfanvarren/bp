@extends('layouts.app-auth', ['dashboard' => 'admin','activePage' => 'dashboard','activeMenu' => '', 'titlePage' => __('Dashboard')])
@push('head-js')
<style type="text/css">
  .dashboard-tab-header{
    border-bottom: 1px solid #ddd;
    padding:15px 0;
    font-size:18px;
    margin-bottom:10px;
    font-family: verdana;
  }
  .fc table{
    width:100% !important;
  }
  .fc-daygrid-body{
    width:100% !important;
  }
  .fc-view-harness{
    height:auto !important;
  }
  .fc .fc-view-harness-active > .fc-view{
    position:relative !important;
  }
  .fc .fc-scroller-liquid-absolute {
    position: relative !important;
  }
  .fc-event, .fc-event:hover, .ui-widget .fc-event{
    color:black !important;
  }
  .fc-list .fc-event{
    display: table !important;
    width: 100%;
  }
  .event{

    cursor:pointer;
  }
  .event:hover{
    cursor:pointer;
  }
  .event .event-title{
   display: flex;
 }
 .event .event-title:first-child{
  margin-top:0 !important;
}
.back-link{
  padding:8px 12px;
  color:#227ee0;
}
.back-link:hover{
  cursor:pointer;
}
</style>


<link rel="stylesheet" href="{{asset('')}}fullcalendar-5.3.2/lib/main.css">

@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">

                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <a class="nav-link @if(!session('enquiry-response')) active @endif" href="#company-rules" data-toggle="tab">
                     Company Rules
                     <div class="ripple-container"></div>
                   </a>
                 </li>
                 <li class="nav-item">
                  <a class="nav-link" href="#calendar" data-toggle="tab">
                    Annual Calendar
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if(session('enquiry-response')) active @endif" href="#account" data-toggle="tab">
                    Account
                    <div class="ripple-container"></div>
                  </a>
                </li>
                @role('Super Admin|Director|Head Admission')
                <li class="nav-item">
                  <a class="nav-link @if(session('enquiry-response')) active @endif" href="#administrator" data-toggle="tab">
                    Administrator
                    <div class="ripple-container"></div>
                  </a>
                </li>
                @endrole
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          @if(session('enquiry-response'))
          <div class="row">
            <div class="col-sm-12">
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="material-icons">close</i>
                </button>
                <span>{!! session('enquiry-response') !!}</span>
              </div>
            </div>
          </div>
          @endif
          <div class="tab-content">
            <div class="tab-pane  @if(!session('enquiry-response')) active @endif" id="company-rules">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-8">
                    @foreach($rules as $key => $rule)
                    <div class="card m-0 mb-4">
                      <div class="card-body">
                       <div class="dashboard-tab-header">
                        <i class="material-icons align-middle">{{$rule->icons}}</i> <span class="ml-2 align-middle">{{$rule->category_name}}</span>
                      </div>
                      <div class="py-3" id="rule-preview{{$key}}">
                        {!!$rule->rule_preview!!}
                      </div>
                      <div class="py-3" style="display:none" id="rule{{$key}}">

                        {!! $rule->rule !!} 
                      </div>
                      <div class="text-right">
                        <button class="btn" type="button" onclick="show_more_rule(this,{{$key}})">Show More</button>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="col-lg-4">
                 <div class="card m-0 h-100">
                  <div class="card-body">
                   <div class="dashboard-tab-header">
                    <i class="material-icons align-middle">info</i> <span class="ml-2 align-middle">DATA KARYAWAN</span>

                  </div>
                  <div>
                    <div>
                      <span>Nama : </span><span>{{auth()->user()->name}}</span>
                    </div>
                    <div>
                      <span>Email : </span><span>{{auth()->user()->email}}</span>
                    </div>
                    <div>
                      <span>Roles : </span><span>{{implode(', ',auth()->user()->roles->pluck('name')->toArray())}}</span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>


      </div>
      <div class="tab-pane" id="calendar">
        <div class="row">
         
          <div class="col-lg-8">
             <div class="text-center">
            <h3><strong>Best Partner</strong></h3>
          </div>
            <div id="annual-calendar"></div>
          
          </div>
          <div class="col-lg-4" >
            <div class="card m-0 h-100">
              <div class="card-body">
               <div class="dashboard-tab-header">
                <i class="material-icons align-middle">calendar_today</i> <span class="ml-2 align-middle">UPCOMING EVENT </span>

              </div>
              <div>
                @foreach($events as $event)
                <div class="event">
                  <div class="px-3 py-2 event-title my-2" style="background:#dddddd;" onclick="open_event_detail(this)"> <span style="max-width: 300px;display: inline-block;overflow: hidden;text-overflow: ellipsis;white-space: nowrap">{{$event->nama}}</span>   <div> <i class="fa fa-angle-down float-right" style="line-height: 22px;"></i> <div class="float-right mr-2">{{date("d/m/Y",strtotime($event->tgl_mulai))}}</div></div></div>
                  <div class="event-detail" style="border:2px solid #bebebe;padding:15px;display:none;">
                    @if($event->kd != "")
                    Kode Event : {{$event->kd}}
                    @endif
                    @if($event->tgl_mulai != "") 
                    <div>
                     Tanggal Mulai : {{$event->tgl_mulai}} @if($event->jam_mulai != "") {{$event->jam_mulai}} @if($event->jam_selesai != "") - {{$event->jam_selesai}} @endif @else @if($event->jam_selesai != "") {{$event->jam_selesai}} @endif @endif 
                   </div> 
                   @endif
                   @if($event->tgl_selesai != "") Tanggal Selesai : {{$event->tgl_selesai}}  @endif
                 </div>
               </div>
               @endforeach
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="row mt-5">
    
       <div class="col-md-8">
          <div class="text-center">
        <h3><strong>Berdayakan</strong></h3>
      </div>
           <div id="berdayakan-annual-calendar"></div>
       </div>
     </div>

   </div>
   <div class="tab-pane  @if(session('enquiry-response')) active @endif" id="account">

    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-8">
          <div class="account-content" id="account-minutes" style="display: none">
            <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> Minutes </div>
            <div class="table-responsive output">
              <table class="table table-bordered mb-0">
                <tr>
                  <th>Subject</th> <th>Reference #</th> <th>Status</th> <th>Date Created</th>
                </tr>
                @foreach($briefings as $briefing)
                <tr>
                  <td>{{$briefing->subject}}</td> <td>{{$briefing->reference}}</td> <td>{{$briefing->time}}</td><td>{{$briefing->type}}</td><td>{{$briefing->note_taker}}</td><td>{{$briefing->created_at}}</td>
                </tr>
                @endforeach
              </table>
              <div>{{$briefings->links('admin.company-data.briefing.ajax-pagination')}}</div>
            </div>

            <div class="row pl-1">
              <div class="back-link" onclick="$('.account-content').hide();$('.account-content#account-default').show()">Back</div>
            </div>
          </div>
          <div class="account-content" id="account-sk" style="display: none">
            <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> SK </div>
            <div class="table-responsive output">
              <table class="table table-bordered">
                <tr>
                  <th>Nomor SK</th> <th>Judul SK</th> <th>Status</th> <th>Date Created</th> <th>Masa Mulai</th> <th>Masa Berakhir</th><th>Isi</th>
                </tr>
                @foreach($sk_karyawan as $data_sk)
                <tr>
                 <td>{{$data_sk->no}}</td> <th>{{$data_sk->judul}}</th> <td>{{$data_sk->status == 1 ? 'Active' : 'In Active'}}</td> <td>{{$data_sk->created_at}}</td> <td>{{$data_sk->tgl_mulai}}</td> <td>{{$data_sk->tgl_berakhir}} </td>
                 <td>
              <div>{!!$data_sk->isi!!}</div>
              @php
              foreach(explode("|",$data_sk->file) as $key => $file){
              @endphp
              <div>File {{$key+1}}: <a href="{{asset('storage').'/'.$file}}" target="_blank">Open / Download File</a></div>
              @php
            }
            @endphp  
          </td>
               </tr>
               @endforeach
             </table>
             <div>
              {{$sk_karyawan->links('admin.company-data.sk.ajax-pagination',['type' => 'account'])}}
            </div>
          </div>
          <div class="row pl-1">
            <div class="back-link" onclick="$('.account-content').hide();$('.account-content#account-default').show()">Back</div>
          </div>
        </div>
        <div class="account-content" id="account-contract" style="display: none">
          <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> Contract </div>
          <div class="table-responsive output">
            <table class="table table-bordered">
             <tr>
              <th>Nomor Kontrak</th> <th>Status</th> <th>Date Created</th> <th>Masa Mulai</th> <th>Masa Berakhir</th>
            </tr>
            @foreach($contracts_karyawan->take(5) as $contract)
            <tr>
              <td>{{$contract->no}}</td><td>{{$contract->status == 1 ? 'Active' : 'In Active'}}</td><td>{{$contract->created_at}}</td> <td>{{$contract->tgl_mulai}}</td> <td>{{$contract->tgl_berakhir}}</td>
            </tr>
            @endforeach
          </table>
          <div>{{$contracts_karyawan->links('admin.company-data.contract.ajax-pagination',['type' => 'account'])}}</div>
        </div>
        <div class="row pl-1">
          <div class="back-link" onclick="$('.account-content').hide();$('.account-content#account-default').show()">Back</div>
        </div>
      </div>
      <div class="account-content" id="account-enquiry" style="display:none;">
        <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> Your Enquiry </div>
        <div class="table-responsive output">
          <table class="table table-bordered">
            <tr>
              <th>Subject</th> <th>Reference #</th> <th>Status</th> <th>Date Created</th>
            </tr>
            @if($enquiries->count())
            @foreach($enquiries as $enquiry)
            <tr>
              <td><a href="{{url('/enquiry/reference/'.$enquiry->complaint_code)}}">{{$enquiry->subject}}</a></td> <td>{{$enquiry->complaint_code}}</td> <td>{{$enquiry->status == 1 ? "Solved" : "Unsolved"}}</td> <td>{{date("d/m/Y",strtotime($enquiry->created_at))}}</td> 
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="4">No Records Found</td>
            </tr>
            @endif

          </table>
          <div>
            {{$enquiries->links('admin.enquiry.ajax-pagination')}}
          </div>
        </div>

        <div class="row pl-1">
          <div class="back-link" onclick="$('.account-content').hide();$('.account-content#account-default').show()">Back</div>
        </div>
      </div>
      <div class="account-content" id="account-default" >
        <div class="card m-0">
          <div class="card-body">
           <div class="dashboard-tab-header">
            <i class="material-icons align-middle">account_circle</i> <span class="ml-2 align-middle">Account</span>
          </div>

          <div>
            <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> Job Description </div>
            <div class="py-3" id="rule-preview{{count($rules)}}">
              {!! $job_description != "" ? $job_description->preview : ""!!}
            </div>
            <div class="py-3" style="display:none" id="rule{{count($rules)}}">
              {!! $job_description != "" ? $job_description->deskripsi : "" !!}
            </div>
            <div class="text-right">
              <button class="btn" type="button" onclick="show_more_rule(this,{{count($rules)}})">Show More</button>
            </div>
          </div>

          <div>
            <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> Your Enquiry </div>
            <div class="my-1"> <strong>Your Recently submitted enquiry</strong></div>
            <div>
              <table class="table table-bordered">
                <tr>
                  <th>Subject</th> <th>Reference #</th> <th>Status</th> <th>Date Created</th>
                </tr>

                @if($enquiries->count())
                @foreach($enquiries->take(5) as $enquiry)
                <tr>
                  <td><a href="{{url('/enquiry/reference/'.$enquiry->complaint_code)}}">{{$enquiry->subject}}</a></td> <td>{{$enquiry->complaint_code}}</td> <td>{{$enquiry->status == 1 ? "Solved" : "Unsolved"}}</td> <td>{{date("d/m/Y",strtotime($enquiry->created_at))}}</td> 
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="4">No Records Found</td>
                </tr>
                @endif

              </table>

            </div>
            <div class="row">
              <div class="col-lg-12 text-right">
               <button class="btn" type="button" onclick="$('.account-content').hide();$('.account-content#account-enquiry').show();">Show More</button>
             </div>
           </div>
         </div>
         <div>
          <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> Minutes </div>
          <div class="table-responsive mt-3">
            <table class="table table-bordered">
              <tr>
                <th>Subject</th> <th>Reference #</th> <th>Date Time</th> <th>Type</th> <th>Note Taker</th> <th>Date Created</th>
              </tr>
              @if($briefings->count())
              @foreach($briefings->take(5) as $briefing)
              <tr>
                <td>{{$briefing->subject}}</td> <td>{{$briefing->reference}}</td> <td>{{$briefing->date}} {{$briefing->time}}</td><td>{{$briefing->type}}</td><td>{{$briefing->note_taker}}</td><td>{{$briefing->created_at}}</td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="6">No Records Found</td>
              </tr>
              @endif
            </table>
          </div>
          <div class="row">
            <div class="col-lg-12 text-right">
             <button class="btn" type="button" onclick="$('.account-content').hide();$('.account-content#account-minutes').show();">Show More</button>
           </div>
         </div>
       </div>
       <div>
        <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> SK </div>
        <div class="table-responsive mt-3">
          <table class="table table-bordered">
            <tr>
              <th>Nomor SK</th> <th>Judul SK</th> <th>Status</th> <th>Date Created</th> <th>Masa Mulai</th> <th>Masa Berakhir</th><th>Isi</th>
            </tr>
            @foreach($sk_karyawan->take(5) as $data_sk)
            <tr>
             <td>{{$data_sk->no}}</td> <th>{{$data_sk->judul}}</th> <td>{{$data_sk->status == 1 ? 'Active' : 'In Active'}}</td> <td>{{$data_sk->created_at}}</td> <td>{{$data_sk->tgl_mulai}}</td> <td>{{$data_sk->tgl_berakhir}} </td>
             <td>
              <div>{!!$data_sk->isi!!}</div>
              @php
              foreach(explode("|",$data_sk->file) as $key => $file){
              @endphp
              <div>File {{$key+1}}: <a href="{{asset('storage').'/'.$file}}" target="_blank">Open / Download File</a></div>
              @php
            }
            @endphp  
          </td>
        </tr>
        @endforeach
      </table>
    </div>
    <div class="row">
      <div class="col-lg-12 text-right">
       <button class="btn" type="button" onclick="$('.account-content').hide();$('.account-content#account-sk').show();">Show More</button>
     </div>
   </div>

 </div>
 <div>
  <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> Contract </div>
  <div class="table-responsive mt-3">
    <table class="table table-bordered">
     <tr>
      <th>Nomor Kontrak</th> <th>Status</th> <th>Date Created</th> <th>Masa Mulai</th> <th>Masa Berakhir</th>
    </tr>
    @foreach($contracts_karyawan->take(5) as $contract)
    <tr>
      <td>{{$contract->no}}</td><td>{{$contract->status == 1 ? 'Active' : 'In Active'}}</td><td>{{$contract->created_at}}</td> <td>{{$contract->tgl_mulai}}</td> <td>{{$contract->tgl_berakhir}}</td>
    </tr>
    @endforeach
  </table>
</div>
<div class="row">
  <div class="col-lg-12 text-right">
    <button class="btn" type="button" onclick="$('.account-content').hide();$('.account-content#account-contract').show();">Show More</button>
  </div>
</div>
</div>

</div>
</div>
</div>
</div>
<div class="col-lg-4">
 <div class="card m-0 h-100">
  <div class="card-body">
    <form  action="{{url('enquiry/ask-question')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="from" value="admin">
      <div class="dashboard-tab-header">
        <i class="material-icons align-middle">info</i> <span class="ml-2 align-middle">Ask Administrator</span>

      </div>
      <div class="row form-group">
        <div class="col-lg-12 p-0">
         <div class="mb-1">
           <strong>Subject*</strong> <br>
           <em>Subjek</em>
         </div>
         <div>
          <input type="text" class="form-control border border-bottom-0" name="subject">
        </div>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-lg-12 p-0">
       <div class="mb-1">
         <strong>Question or Enquiry*</strong> <br>
         <em>Pertanyaan atau permintaan</em>
       </div>
       <div>
        <textarea class="form-control border border-bottom-0" name="question"></textarea>
      </div>
    </div>
  </div>
  <div class="row form-group">
    <div class="col-lg-12 p-0">
     <div class="mb-1">
       <strong>Enquiry Type*</strong> <br>
       <em>Jenis Permintaan</em>
     </div>
     <div class="pt-1">
       <select class="form-control position-relative border border-bottom-0" name="type">
        <option value="">Select Type</option>
        <option value="Financial|info@bestpartnereducation.com">Financial</option>
        <option value="Employment|info@bestpartnereducation.com">Employment</option>
        <option value="Marketing Materials|info@bestpartnereducation.com">Marketing Materials</option>
        <option value="Request|info@bestpartnereducation.com">Request</option>
        <option value="Update Details|info@bestpartnereducation.com">Update Details</option>

      </select>
    </div>
  </div>
</div>
<div class="row form-group">
  <div class="col-lg-12 p-0">
   <div class="mb-1">
     <strong>Attach Documents*</strong> <br>
     <em>Lampirkan dokumen</em>
   </div>
   <div>
     <div class="form-group form-file-upload form-file-multiple">
      <input type="file" multiple=""  name="myfiles[]" class="inputFileHidden">
      <div class="input-group">
        <input type="text" class="form-control inputFileVisible" placeholder="Single File">
        <span class="input-group-btn pr-0">
          <button type="button" class="btn btn-fab btn-round btn-primary">
            <i class="material-icons">attach_file</i>
          </button>
        </span>
      </div>
    </div>
  </div>
</div>
</div>
<div class="row form-group">
  <div class="col-lg-12 p-0">
    <div class="mb-1 text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>
</form>
</div>
</div>
</div>

</div>
</div>
</div>

<div class="tab-pane" id="administrator">
  <div class="card m-0">
    <div class="card-body">
     <div class="dashboard-tab-header">
      <i class="material-icons align-middle">account_circle</i> <span class="ml-2 align-middle">Administrator</span>
    </div>
    <div class="administrator-content" style="display: none;" id="administrator-sk">
      <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> SK </div>
      <div class="table-responsive mt-3 output">
        <table class="table table-bordered">
          <tr>
            <th>Nomor SK</th> <th>Id Karyawan</th> <th>Judul SK</th> <th>Status</th> <th>Date Created</th> <th>Masa Mulai</th> <th>Masa Berakhir</th>
            <th>Isi</th>
          </tr>
          @foreach($sk as $data_sk)
          <tr>
           <td>{{$data_sk->no}}</td> <td>{{$data_sk->id_karyawan}}</td> <td>{{$data_sk->judul}}</td> <td>{{$data_sk->status == 1 ? 'Active' : 'In Active'}}</td> <td>{{$data_sk->created_at}}</td> <td>{{$data_sk->tgl_mulai}}</td> <td>{{$data_sk->tgl_berakhir}} </td>
           <td>
              <div>{!!$data_sk->isi!!}</div>
              @php
              foreach(explode("|",$data_sk->file) as $key => $file){
              @endphp
              <div>File {{$key+1}}: <a href="{{asset('storage').'/'.$file}}" target="_blank">Open / Download File</a></div>
              @php
            }
            @endphp  
          </td>
         </tr>
         @endforeach
       </table>
       <div>{{$sk->links('admin.company-data.sk.ajax-pagination')}}</div>
     </div>
     <div class="row pl-1">
      <div class="back-link" onclick="$('.administrator-content').hide();$('.administrator-content#administrator-default').show()">Back</div>
    </div>
  </div>
  <div class="administrator-content" style="display: none;" id="administrator-contract">
   <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> Contract </div>
   <div class="table-responsive output">
    <table class="table table-bordered">
     <tr>
      <th>Nomor Kontrak</th> <th>Id Karyawan</th> <th>Status</th> <th>Date Created</th> <th>Masa Mulai</th> <th>Masa Berakhir</th>
    </tr>
    @foreach($contracts as $contract)
    <tr>
      <td>{{$contract->no}}</td><td>{{$contract->id_karyawan}}</td><td>{{$contract->status == 1 ? 'Active' : 'In Active'}}</td><td>{{$contract->created_at}}</td> <td>{{$contract->tgl_mulai}}</td> <td>{{$contract->tgl_berakhir}}</td>
    </tr>
    @endforeach
  </table>
  <div>{{$contracts->links('admin.company-data.contract.ajax-pagination')}}</div>
</div>
<div class="row pl-1">
  <div class="back-link" onclick="$('.administrator-content').hide();$('.administrator-content#administrator-default').show()">Back</div>
</div>     

</div>
<div class="administrator-content" id="administrator-default">
  <div>
   <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> SK </div>
   <div class="table-responsive mt-3">
    <table class="table table-bordered">
      <tr>
        <th>Nomor SK</th> <th>Id Karyawan</th> <th>Judul SK</th> <th>Status</th> <th>Date Created</th> <th>Masa Mulai</th> <th>Masa Berakhir</th><th>Isi</th>
      </tr>
      @foreach($sk->take(5) as $data_sk)
      <tr>
       <td>{{$data_sk->no}}</td> <td>{{$data_sk->id_karyawan}}</td><td>{{$data_sk->judul}}</td> <td>{{$data_sk->status == 1 ? 'Active' : 'In Active'}}</td> <td>{{$data_sk->created_at}}</td> <td>{{$data_sk->tgl_mulai}}</td> <td>{{$data_sk->tgl_berakhir}} </td>
       <td>
              <div>{!!$data_sk->isi!!}</div>
              @php
              foreach(explode("|",$data_sk->file) as $key => $file){
              @endphp
              <div>File {{$key+1}}: <a href="{{asset('storage').'/'.$file}}" target="_blank">Open / Download File</a></div>
              @php
            }
            @endphp  
          </td>
     </tr>
     @endforeach
   </table>
 </div>
 <div class="row">
  <div class="col-lg-12 text-right">
   <button class="btn" type="button" onclick="$('.administrator-content').hide();$('.administrator-content#administrator-sk').show();">Show More</button>
 </div>
</div>
</div>
<div>
 <div style="padding:8px 12px;background:#aaa;color:white;font-size: 16px;"> Contract </div>
 <div class="table-responsive mt-3">
  <table class="table table-bordered">
   <tr>
    <th>Nomor Kontrak</th> <th>Id Karyawan</th> <th>Status</th> <th>Date Created</th> <th>Masa Mulai</th> <th>Masa Berakhir</th>
  </tr>
  @foreach($contracts->take(5) as $contract)
  <tr>
    <td>{{$contract->no}}</td><td>{{$contract->id_karyawan}}</td><td>{{$contract->status == 1 ? 'Active' : 'In Active'}}</td><td>{{$contract->created_at}}</td> <td>{{$contract->tgl_mulai}}</td> <td>{{$contract->tgl_berakhir}}</td>
  </tr>
  @endforeach
</table>
</div>
<div class="row">
  <div class="col-lg-12 text-right">
    <button class="btn" type="button" onclick="$('.administrator-content').hide();$('.administrator-content#administrator-contract').show();">Show More</button>
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
</div>
</div>


      <!--<div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Used Space</p>
              <h3 class="card-title">49/50
                <small>GB</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="#pablo">Get More Space...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Revenue</p>
              <h3 class="card-title">$34,245</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last 24 Hours
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Fixed Issues</p>
              <h3 class="card-title">75</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> Tracked from Github
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-twitter"></i>
              </div>
              <p class="card-category">Followers</p>
              <h3 class="card-title">+245</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Daily Sales</h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Email Subscriptions</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Completed Tasks</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
      </div>-->
      <!--
      <div class="row">
        
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Tasks:</span>
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" data-toggle="tab">
                        <i class="material-icons">bug_report</i> Bugs
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#messages" data-toggle="tab">
                        <i class="material-icons">code</i> Website
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#settings" data-toggle="tab">
                        <i class="material-icons">cloud</i> Server
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Create 4 Invisible User Experiences you Never Knew About</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="messages">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="settings">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Employees Stats</h4>
              <p class="card-category">New employees on 15th September, 2016</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Salary</th>
                  <th>Country</th>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Dakota Rice</td>
                    <td>$36,738</td>
                    <td>Niger</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Minerva Hooper</td>
                    <td>$23,789</td>
                    <td>Curaçao</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Sage Rodriguez</td>
                    <td>$56,142</td>
                    <td>Netherlands</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Philip Chaney</td>
                    <td>$38,735</td>
                    <td>Korea, South</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>-->
    </div>
    @endsection

    @push('js')
    <script src="{{asset('')}}fullcalendar-5.3.2/lib/main.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('annual-calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: { center: 'dayGridMonth,timeGridWeek,dayGridDay,listWeek' },
      events: {!! $calendar_events !!},
      initialView: 'dayGridMonth',
    });
    calendar.render();
  });
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('berdayakan-annual-calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: { center: 'dayGridMonth,timeGridWeek,dayGridDay,listWeek' },
      events: {!! $berdayakan_calendar_events !!},
      initialView: 'dayGridMonth',
    });
    calendar.render();
  });
</script>
    <script>
      $(document).ready(function(){
        var inputFiles  = document.getElementsByClassName('form-file-upload');
        for(var i = 0; i < inputFiles.length; i++){
          inputFiles[i].addEventListener('click',function(){
            $(this).find('.inputFileHidden')[0].click();

          });
        }
      });

      $(window).on('hashchange',function(){
        if(window.location.hash){
          var page = window.location.has.replace('#','');
          if(page == Number.Nan || page <= 0){
            return false;
          }else{
            getEnquiry(page);
          }
        }
      });

      function getEnquiry(page){
        $.ajax({
          url : '?enquiry-page='+page,
          dataType:'json',
          success:function(data){
            $('#account-enquiry .output').html(data);
          },error:function(error){
          }
        });
      }


      function getBriefing(page){
        $.ajax({
          url : '?briefing-page='+page,
          dataType:'json',
          success:function(data){
            $('#account-minutes .output').html(data);
          },error:function(error){
          }
        });
      }

      function getSK(page,type = null){
        var sk_url = "sk-page";
        if(type == "account"){
          sk_url = "employee-sk-page";
        }
        $.ajax({
          url : '?'+sk_url+'='+page,
          dataType:'json',
          success:function(data){
            if(type == "account"){
              $('#account-sk .output').html(data);
            }else{
              $('#administrator-sk .output').html(data);
            }
          },error:function(error){
          }
        });
      }

      function getContract(page,type = null){
        var contract_url = "contract-page";
        if(type == "account"){
          contract_url = "employee-contract-page";
        }
        $.ajax({
          url : '?'+contract_url+'='+page,
          dataType:'json',
          success:function(data){
            if(type == "account"){
              $('#account-contract .output').html(data);
            }else{
              $('#administrator-contract .output').html(data);
            }
          },error:function(error){
          }
        });
      }

      $('.inputFileHidden').change(function (e) {
        $($(e.target.parentElement)[0]).find('.inputFileVisible')[0].value = this.value.replace(/C:\\fakepath\\/i, '');
      });
    /*
    $('.form-file-upload').click(function (event) {
     
      console.log($(this).find('.inputFileHidden')[0]);
      var test =  $(this).find('.inputFileHidden')[0];

      $(test).trigger('click');
      $(this).find('.inputFileHidden')[0].click();
       event.stopPropagation();
      event.preventDefault();
    });*/

    $("#brochure").change(function () {
      $('#file-value').text(this.value.replace(/C:\\fakepath\\/i, ''));
    });

    function show_more_rule(el,index){
      $('#rule-preview'+index).toggle();
      $('#rule'+index).toggle();
      if(el.innerText == "SHOW MORE"){
        el.innerText = "SHOW LESS";
      }else{
        el.innerText ="SHOW MORE";
      }
    }


    function open_event_detail(el){
      $(el.nextElementSibling).slideToggle('fast');
    }
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
     // md.initDashboardPageCharts();
   });
 </script>

 @endpush