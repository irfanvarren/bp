@if(isset($school_term))
@if(!$school_term->isEmpty())
<table class="table table-bordered">
  <tr>
        <th>No</th>
        <th>Term</th>
        <th>Duration</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Actions</th>
    </tr>
    @php
    $x = 1;
    @endphp
    @foreach($school_term as $data)
    <tr>
        <td>{{$x++}}</td>
        <td>{{$data->term}}</td>
        <td>{{$data->duration}}</td>
        <td>{{$data->term_start_date}}</td>
        <td>{{$data->term_end_date}}</td>
        <td>
            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_school_term('{{$data->id}}','{{$data->term}}','{{$data->duration}}','{{$data->term_start_date}}','{{$data->term_end_date}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_school_term({{$data->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
                Delete
            </button>
        </td>
    </tr>
    @endforeach
</table>

</table>
##
 <option value="">- Pilih Term -</option>
 @if($school_term != "")
   @foreach($school_term as $data)
<option value="{{$data->id}}">{{$data->term}} @if($data->term_start_date != "")({{date("Y",strtotime($data->term_start_date))}})@endif</option>
@endforeach
@endif  
@else
##
 <option value="">- Pilih Term -</option>
@endif
@endif
