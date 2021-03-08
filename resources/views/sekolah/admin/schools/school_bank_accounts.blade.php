@if(isset($school_bank_accounts))
@if(!$school_bank_accounts->isEmpty())
<table class="table table-bordered">
  <tr>
        <th>No</th>
        <th>Account Name</th>
        <th>Account Number</th>
        <th>BSB</th>
        <th>Swift Code</th>
        <th> Bank Name</th>
        <th> Bank Address</th>
        <th>Note</th>
        <th>Actions</th>
    </tr>
    @php
    $x = 1;
    @endphp
    @foreach($school_bank_accounts as $data)
    <tr>
        <td>{{$x++}}</td>
        <td>{{$data->account_name}}</td>
        <td>
           {{$data->account_number}}
        </td>
        <td>
            {{$data->bsb}}
        </td>
        <td>{{$data->swift_code}}</td>
        <td>{{$data->bank_name}}</td>
        <td>{{$data->bank_address}}</td>
        <td>{!!htmlspecialchars_decode(nl2br($data->note))!!}</td>

        <td>
            <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm"
              onclick="edit_school_bank_account('{{$data->id}}','{{$data->account_name}}','{{$data->account_number}}','{{$data->bsb}}','{{$data->swift_code}}','{{$data->bank_name}}','{{$data->bank_address}}',`{{$data->note}}`)" data-original-title="Ubah">
                <i class="material-icons">edit</i>
                Edit
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_school_bank_account({{$data->id}})" data-original-title="Hapus">
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
