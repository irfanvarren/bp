
@if (isset($school_other_fees))


@if(!$school_other_fees->isEmpty())
<table class="table table-bordered">
  <tr>
        <th>No</th>
        <th>Name</th>
        <th>Fee</th>
        <th>Details</th>
        <th>Actions</th>
    </tr>
    @php
    $x = 1;
    @endphp
    @foreach($school_other_fees as $data)
    <tr>
        <td>{{$x++}}</td>
        <td>{{$data->name}}</td>
           <td>{{$data->fee}}</td>
              <td>{{urldecode($data->details)}}</td>
        <td>
            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_other_fee('{{$data->id}}','{{$data->name}}','{{$data->fee}}','{{$data->details}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_other_fee({{$data->id}})" data-original-title="Hapus">
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
