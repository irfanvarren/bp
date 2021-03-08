
@if(!empty($productdesc))
<table class="table table-bordered">

    <tr>
        <th>Title</th>
        <th>Desc</th>
        <th>Action</th>
    </tr>
    @php
      $x = 0;
    @endphp
    @foreach($productdesc as $data)
      <tr>
        <td>{{$data->title}}</td>
        <td>{{$data->desc}}</td>
        <td>
          <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" onclick="edit_desc('{{$data->id}}','{{$data->title}}','{{$data->desc}}')" data-original-title="Ubah">
              <i class="material-icons">edit</i>
          </button>
          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_desc('{{$data->id}}')" data-original-title="Hapus">
              <i class="material-icons">close</i>
          </button>
        </td>
      </tr>
    @endforeach
    </table>

@else
@endif
