
<table class="table table-bordered">
  <colgroup>
    <col>
    <col width="10%" >
    <col width="10%">
    <col width="20%">
    <col>
    <col>
    <col>
    <col width="5%">
  </colgroup>
  <thead>
    <tr>
      <th>No</th><th>Parent Agent</th><th>School</th> <th>Duration</th> <th>Agents Commission</th> <th>Marketing Commission</th> <th>Sub Agent Commission</th>  <th>Note</th><th>Status</th><th>Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $x = 1;
    @endphp
     
    @foreach($has_schools as $has_school)
    <tr>
      <td>{{$x}}</td>
       <td>@if($has_school->agent_contracts != ""){{$has_school->agent_contracts->parent_agent != "" ? $has_school->agent_contracts->parent_agent->name : ""}}@endif
        </div></td> 
      <td>
          <!--<img src="{{asset('img/schools/logo_sekolah/'.$has_school->logo)}}" style="display:block;margin:0 auto;max-height:80px;">-->
         <div style="text-align: center;margin-top:10px;"> {{$has_school->school_name}}
          </div>
        </td> 
         <td>
    <p>Start Date :@if($has_school->agent_contracts != "") {{ date("d/m/Y",strtotime($has_school->agent_contracts->start_date))}} @endif</p>
    <div>End Date : @if($has_school->agent_contracts != ""){{ date("d/m/Y",strtotime($has_school->agent_contracts->end_date))}}@endif</div>
  </td>
      <td style="padding:0px !important;vertical-align: top;">
        <div id="commission-output{{$x}}">
          @if($has_school->agent_contracts != "")
          @if($has_school->agent_contracts->agent_commission != "")
          <!-- <div class="col-sm-12" style="border-bottom:1px solid black;padding: 5px 15px;">-->
            <ol style="margin-bottom:0;padding:0 30px;">
              @foreach($has_school->agent_contracts->agent_commission as $key => $school_commission)

              <li class="commission-list" style="padding: 15px 0;">
                <div class="col-sm-12">
                  <div>
                    @if($school_commission->commission != "" )
                    Amount : {{$school_commission->curr_symbol}} {{$school_commission->commission}}
                    @elseif($school_commission->commission_percent != "")
                    Percentage : {{$school_commission->commission_percent}} %
                    @else
                    No Commission
                    @endif
                  </div>
                  <div>
                    Keterangan : <br>
                    {!!$school_commission->note!!}
                  </div>
                  <div>
                   <button type="button" rel="tooltip" title="" style="padding:0;" class="btn btn-primary btn-link btn-sm"
                   onclick="edit_commission('School','{{$school_commission->id}}','{{$x}}','{{$school_commission->school_id}}','{{$has_school->school_name}}','{{$school_commission->commission}}','{{$school_commission->commission_percent}}',`{{$school_commission->note}}`)" data-original-title="Ubah">
                   <i class="material-icons">edit</i>
                   Edit
                 </button>
                 <button type="button" rel="tooltip" title="" style="padding:0;" class="btn btn-danger btn-link btn-sm" onclick="delete_commission('School','{{$school_commission->id}}','{{$x}}','{{$school_commission->school_id}}','{{$school_commission->agent_id}}')" data-original-title="Hapus">
                  <i class="material-icons">close</i>
                  Delete
                </button>
              </div>
            </div>
          </li>


          @endforeach
        </ol>
        @else
       <div style="padding:15px">No commission </div>
        @endif
        @endif
      </div>
      <div class="col-sm-12" style="padding:10px 15px;">
        <button type="button" rel="tooltip" title="" id="commission-btn" onclick="open_commission('School','{{$x}}','{{$has_school->school_id}}','{{$has_school->school_name}}')" class="btn btn-primary btn-sm btn-add" value="add"
         data-original-title="Tambah">
         <i class="material-icons">add</i> <span>Add</span>
       </button>
     </div>
   </td>
  
    <td style="padding:0px !important;vertical-align: top;">
       <div id="marketing-commission-output{{$x}}">
          @if($has_school->agent_contracts != "")
          @if($has_school->agent_contracts->marketing_commission != "")
          <!-- <div class="col-sm-12" style="border-bottom:1px solid black;padding: 5px 15px;">-->
            <ol style="margin-bottom:0;padding:0 30px;">
              @foreach($has_school->agent_contracts->marketing_commission as $key => $marketing_commission)

              <li class="commission-list" style="padding: 15px 0;">
                <div class="col-sm-12">
                  <div>
                    @if($marketing_commission->commission != "" )
                    Amount : {{$marketing_commission->curr_symbol}} {{$marketing_commission->commission}}
                    @elseif($marketing_commission->commission_percent != "")
                    Percentage : {{$marketing_commission->commission_percent}} %
                    @else
                    No Commission
                    @endif
                  </div>
                  <div>
                    Keterangan : <br>
                    {!!$marketing_commission->note!!}
                  </div>
                  <div>
                   <button type="button" rel="tooltip" title="" style="padding:0;" class="btn btn-primary btn-link btn-sm"
                   onclick="edit_commission('Marketing','{{$marketing_commission->id}}','{{$x}}','{{$marketing_commission->school_id}}','{{$has_school->school_name}}','{{$marketing_commission->commission}}','{{$marketing_commission->commission_percent}}',`{{$marketing_commission->note}}`)" data-original-title="Ubah">
                   <i class="material-icons">edit</i>
                   Edit
                 </button>
                 <button type="button" rel="tooltip" title="" style="padding:0;" class="btn btn-danger btn-link btn-sm" onclick="delete_commission('Marketing','{{$marketing_commission->id}}','{{$x}}','{{$marketing_commission->school_id}}','{{$marketing_commission->agent_id}}')" data-original-title="Hapus">
                  <i class="material-icons">close</i>
                  Delete
                </button>
              </div>
            </div>
          </li>


          @endforeach
        </ol>
        @else
       <div style="padding:15px">No commission </div>
        @endif
        @endif
      </div>
           <div class="col-sm-12" style="padding:10px 15px;">
        <button type="button" rel="tooltip" title="" id="commission-btn" onclick="open_commission('Marketing','{{$x}}','{{$has_school->school_id}}','{{$has_school->school_name}}')" class="btn btn-primary btn-sm btn-add" value="add"
         data-original-title="Tambah">
         <i class="material-icons">add</i> <span>Add</span>
       </button>
     </div>
   </td>
    <td>
      <div id="subagent-commission-output{{$x}}">
          @if($has_school->agent_contracts != "")
          @if($has_school->agent_contracts->subagent_commission != "")
          <!-- <div class="col-sm-12" style="border-bottom:1px solid black;padding: 5px 15px;">-->
            <ol style="margin-bottom:0;padding:0 30px;">
              @foreach($has_school->agent_contracts->subagent_commission as $key => $subagent_commission)

              <li class="commission-list" style="padding: 15px 0;">
                <div class="col-sm-12">
                  <div>
                    @if($subagent_commission->commission != "" )
                    Amount : {{$subagent_commission->curr_symbol}} {{$subagent_commission->commission}}
                    @elseif($subagent_commission->commission_percent != "")
                    Percentage : {{$subagent_commission->commission_percent}} %
                    @else
                    No Commission
                    @endif
                  </div>
                  <div>
                    Keterangan : <br>
                    {!!$subagent_commission->note!!}
                  </div>
                  <div>
                   <button type="button" rel="tooltip" title="" style="padding:0;" class="btn btn-primary btn-link btn-sm"
                   onclick="edit_commission('Sub-Agent','{{$subagent_commission->id}}','{{$x}}','{{$subagent_commission->school_id}}','{{$has_school->school_name}}','{{$subagent_commission->commission}}','{{$subagent_commission->commission_percent}}',`{{$subagent_commission->note}}`)" data-original-title="Ubah">
                   <i class="material-icons">edit</i>
                   Edit
                 </button>
                 <button type="button" rel="tooltip" title="" style="padding:0;" class="btn btn-danger btn-link btn-sm" onclick="delete_commission('Sub-Agent','{{$subagent_commission->id}}','{{$x}}','{{$subagent_commission->school_id}}','{{$subagent_commission->agent_id}}')" data-original-title="Hapus">
                  <i class="material-icons">close</i>
                  Delete
                </button>
              </div>
            </div>
          </li>


          @endforeach
        </ol>
        @else
       <div style="padding:15px">No commission </div>
        @endif
        @endif
      </div>
           <div class="col-sm-12" style="padding:10px 15px;">
        <button type="button" rel="tooltip" title="" id="commission-btn" onclick="open_commission('Sub-Agent','{{$x}}','{{$has_school->school_id}}','{{$has_school->school_name}}')" class="btn btn-primary btn-sm btn-add" value="add"
         data-original-title="Tambah">
         <i class="material-icons">add</i> <span>Add</span>
       </button>
     </div>

    </td>
 
  <td>@if($has_school->agent_contracts != ""){!!htmlspecialchars_decode(nl2br($has_school->agent_contracts->note))!!}@endif</td>
  <td>@if($has_school->agent_contracts != ""){{$has_school->agent_contracts->status == 1 ? "Active" : "Non Active"}}@endif</td>
  <td>
   <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
   onclick="edit_contract('{{$has_school->agent_contracts->id}}','{{$has_school->id}}','{{$has_school->school_id}}','{{$has_school->school_name}}','{{$has_school->agent_id}}','{{$has_school->parent_id}}','{{$has_school->parent_agent != '' ? $has_school->parent_agent->name : '' }}','{{ date("d/m/Y",strtotime($has_school->agent_contracts->start_date))}}','{{ date("d/m/Y",strtotime($has_school->agent_contracts->end_date))}}',`{{$has_school->agent_contracts->note}}`)" data-original-title="Ubah">
   <i class="material-icons">edit</i>
   Edit
 </button>
 <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_contract('{{$has_school->agent_contracts->id}}','{{$has_school->id}}','{{$has_school->school_id}}')" data-original-title="Hapus">
  <i class="material-icons">close</i>
  Delete
</button>
</td>
</tr>
@php
$x++
@endphp
@endforeach
</tbody>
</table> 