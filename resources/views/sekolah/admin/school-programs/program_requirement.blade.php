@if (isset($programRequirement))
@if(!$programRequirement->isEmpty())
<table class="table table-bordered">
  <tr>
        <th>No</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @php
    $x = 1;
    @endphp
    @foreach($programRequirement as $data)
    <tr>
        <td>{{$x++}}</td>
        <td>{{$data->name}}</td>
        <td>
            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_program_requirement('{{$data->id}}','{{$data->name}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_program_requirement({{$data->id}})" data-original-title="Hapus">
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
