<ol style="margin-bottom:0;padding:0 30px;">
@foreach($school_commissions as $school_commission)
<li class="commission-list" style="padding: 15px 0;">
                <div class="col-sm-12">
                  <div>
                    @if($school_commission->commission != "" )
                    Amount : {{$school_commission->commission}}
                    @elseif($school_commission->commission_percent != "")
                    Percentage : {{$school_commission->commission_percent}} %
                    @else
                    No Commission
                    @endif
                  </div>
                  <div>
                    Keterangan : <br>
                    {!!htmlspecialchars_decode(nl2br($school_commission->note))!!}
                  </div>
                  <div>
                  	
                   <button type="button" rel="tooltip" title="" style="padding:0;" class="btn btn-primary btn-link btn-sm"
                   onclick="edit_commission('{{$commission_for}}','{{$school_commission->id}}','{{$x}}','{{$school_commission->school_id}}','{{$school_commission->school_name}}','{{$school_commission->commission}}','{{$school_commission->commission_percent}}',`{{$school_commission->note}}`)" data-original-title="Ubah">
                   <i class="material-icons">edit</i>
                   Edit
                 </button>
                 <button type="button" rel="tooltip" title="" style="padding:0;" class="btn btn-danger btn-link btn-sm" onclick="delete_commission('{{$commission_for}}','{{$school_commission->id}}','{{$x}}','{{$school_commission->school_id}}','{{$school_commission->agent_id}}')" data-original-title="Hapus">
                  <i class="material-icons">close</i>
                  Delete
                </button>
              </div>
            </div>
          </li>
@endforeach

</ol>