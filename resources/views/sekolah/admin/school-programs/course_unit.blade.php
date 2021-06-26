@if (isset($courseUnit))
@if(!$courseUnit->isEmpty())
<table class="table table-bordered">
  <tr>
        <th>No</th>
        <th>Period</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @php
    $x = 1;
    @endphp
    @foreach($courseUnit as $data)
    <tr>
        <td>{{$x++}}</td>
        <td>{{$data->period_name}}</td>
        <td>{{$data->name}}</td>
        <td>
            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" style="padding:5px 8px;" 
              onclick="edit_course_unit('{{$data->id}}','{{$data->period_id}}','{{$data->name}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_course_unit({{$data->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>
        </td>
    </tr>
    @endforeach
</table>

@else
@endif
@endif