@if(isset($school_time_table_type))
@if(!$school_time_table_type->isEmpty())
<table class="table table-bordered">
  <tr>
        <th>No</th>
        <th>Type</th>
        <th>Actions</th>
    </tr>
    @php
    $x = 1;
    @endphp
    @foreach($school_time_table_type as $data)
    <tr>
        <td>{{$x++}}</td>
        <td>{{$data->name}}</td>
        <td>
            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_school_time_table_type('{{$data->id}}','{{$data->name}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_school_time_table_type({{$data->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>
        </td>
    </tr>
    @endforeach
</table>
##
 <option value="">- Pilih Type -</option>
 @if($school_time_table_type != "")
   @foreach($school_time_table_type as $data)
<option value="{{$data->id}}">{{$data->name}}</option>
@endforeach
@endif
@else
##
 <option value="">- Select Type -</option>
@endif
@endif
