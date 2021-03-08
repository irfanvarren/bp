@if (isset($school_refund))
@if(!$school_refund->isEmpty())
<table class="table table-bordered">
  <tr>
        <th>No</th>
        <th>Name</th>
        <th>Total Refund</th>
        <th>Details</th>
        <th>Actions</th>
    </tr>
    @php
    $x = 1;

    @endphp
    @foreach($school_refund as $data)
    
    <tr>
        <td>{{$x++}}</td>
        <td>{{$data->name}}</td>
        <td>
            @php 
    if($data->jlh_refund_total != null || $data->jlh_refund_total != ""){
    $refund_total = $data->jlh_refund_total;
    echo $refund_total;
    }else{
    $refund_total = $data->jlh_refund_persen;
    echo $refund_total.'%';
    }
    @endphp
        </td>
        <td>{{urldecode($data->details)}}</td>
        <td>
            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_school_refund('{{$data->id}}','{{$data->name}}','{{$data->jlh_refund_total}}','{{$data->jlh_refund_persen}}','{{$data->details}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_school_refund({{$data->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>
        </td>
    </tr>
    @endforeach
</table>

</table>
@else
@endif
@endif
