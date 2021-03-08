
@if(isset($school_time_table))
@if(!$school_time_table->isEmpty())
<table class="table table-bordered">
  <tr>
        <th>No</th>
        <th>Type</th>
        <th>Programs</th>
        <th>Days</th>
        <th>Time</th>
        <th>Actions</th>
    </tr>
    @php
    $x = 1;
    @endphp
    @foreach($school_time_table as $data)
    <tr>
        <td>{{$x++}}</td>
        <td>{{$data->type}}</td>
        <td>
            @if($data->program != "")
            {{$data->program->name}}
            @endif
        </td>
        <td>
            {{$data->days}}
        </td>
        <td>
            {{$data->time}}
            </td>
        <td>
            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_school_time_table('{{$data->id}}','{{$data->type_id}}','{{$data->program_id}}','{{$data->days}}','{{$data->time}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_school_time_table({{$data->id}})" data-original-title="Hapus">
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