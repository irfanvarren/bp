@if(isset($school_promo))
@if(!$school_promo->isEmpty())
<table class="table table-bordered">
  <tr>
        <th>No</th>
        <th>Name</th>
        <th>Type</th>
        <th>Program</th>
        <th>Special Offer</th>
        <th>Total Offer</th>
        <th>Intake Date</th>
        <th>Term & Conditions</th>
        <th>Date Terminated</th>
        <th>Actions</th>
    </tr>
    @php
    $x = 1;
    @endphp
    @foreach($school_promo as $data)
    <tr>
        <td>{{$x++}}</td>
        <td>{{$data->name}}</td>
        <td>
           {{$data->type}}
        </td>
        <td>
            {{$data->program_name}}
        </td>
        <td>{{$data->special_offer}}</td>
        <td>{{$data->total_offer}}</td>
        <td>{{$data->intake}}</td>
        <td>{!! nl2br($data->term_and_conditions) !!} </td>
        <td>{{$data->date_terminated}}</td>

        <td>
            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_school_promo('{{$data->id}}','{{$data->name}}','{{$data->type}}','{{$data->program_id}}','{{$data->special_offer}}','{{$data->total_offer}}','{{$data->intake}}','{{urlencode($data->term_and_conditions)}}','{{$data->date_terminated}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_school_promo({{$data->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>
        </td>
    </tr>
    @endforeach
</table>

</table>

@endif
@endif
