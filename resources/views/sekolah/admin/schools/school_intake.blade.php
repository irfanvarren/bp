@if(isset($school_intake))
@if(!$school_intake->isEmpty())
<table class="table table-bordered">
  <tr>
        <th>No</th>
        <th>Term</th>
        <th>Intake Date</th>
        <th>Orientation Date</th>
        <th>Programs</th>
        <th>Note</th>
        <th>Actions</th>
  </tr>
    @php
    $x = 1;
    @endphp
    @foreach($school_intake as $intake)
    <tr>
        <td>{{$x++}}</td>
        <td>{{$intake->term}}</td>
        <td>{{$intake->intake_date}}</td>
        <td>{{$intake->orientation_date}}</td>
        <td>   
            @if($intake->school_programs->count())
            <ol>
            @foreach($intake->school_programs as $program)
            @if($program->program_id != "")

             <li>{{$program->program_name}}</li>
            @endif
            @endforeach
            @endif
        </ol>
        </td>
        <td>{!!nl2br($intake->note)!!} <br></td>
        <td>
            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_school_intake('{{$intake->id}}','{{$intake->term_id}}','{{$intake->intake_date}}','{{$intake->orientation_date}}',`{!!$intake->note!!}`,`{!!htmlspecialchars(json_encode($intake->school_programs))!!}`)" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_school_intake('{{$intake->id}}',`{!!htmlspecialchars(json_encode($intake->school_programs))!!}`)" data-original-title="Hapus">
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
