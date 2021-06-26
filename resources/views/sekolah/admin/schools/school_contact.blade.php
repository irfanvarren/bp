@if (isset($school_contacts))


@if(!$school_contacts->isEmpty())
<table class="table table-bordered">
  <tr>
        <th>No</th>
        <th>Division</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Skype Id</th>
        <th>Action</th>
    </tr>
    @php
    $x = 1;
    @endphp
    @foreach($school_contacts as $data)
    <tr>
        <td>{{$x++}}</td>
        <td>{{$data->division_name}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->phone_number}}</td>
        <td>{{$data->skype_id}}</td>
        <td>
            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_contact('{{$data->id}}','{{$data->division_id}}','{{$data->name}}','{{$data->email}}','{{$data->phone_number}}','{{$data->skype_id}}')" data-original-title="Ubah">
                <i class="material-icons">edit</i>
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_contact({{$data->id}})" data-original-title="Hapus">
                <i class="material-icons">close</i>
            </button>
        </td>
    </tr>
    @endforeach
</table>

</table>
@else
@endif
@endif
