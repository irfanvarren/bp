@if(isset($school_intake))
@if(!$school_intake->isEmpty())
<table class="table table-bordered">
  <tr>
        <th>No</th>
        <th>Term</th>
        <th>Course</th>
        <th>Major</th>
        <th>Intake Date</th>
        <th>Orientation Date</th>
        <th>Note</th>
        <th>Actions</th>
    </tr>
    @php
    $x = 1;
    @endphp
    @foreach($school_intake as $data)
    <tr>
        <td>{{$x++}}</td>
        <td>{{$data->term}}</td>
        <td>
            @if($data->programs != "")
            {{$data->programs->courses->course_name}}
            @endif
        </td>
        <td>
            @if($data->programs != "")
            {{$data->programs->name}}
            @endif
        </td>
        <td>{{$data->intake_date}}</td>
        <td>{{$data->orientation_date}}</td>
        <td>{{$data->note}}</td>
        <td>
            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_school_intake('{{$data->id}}','{{$data->term_id}}','{{$data->intake_date}}','{{$data->orientation_date}}','{{$data->note}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_school_intake({{$data->id}})" data-original-title="Hapus">
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
