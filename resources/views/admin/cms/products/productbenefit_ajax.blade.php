
@if(!empty($productbenefit))
<table class="table table-bordered">

    <tr>
      <th>Image</th>
        <th>Title</th>
        <th>Desc</th>
        <th>Action</th>
    </tr>
    @php
      $x = 0;
    @endphp
    @foreach($productbenefit as $data)
      <tr>
          <td><img src="{{ asset($data->image)}}" style="width:100px;" alt=""></td>
        <td>{{$data->title}}</td>
        <td>{{$data->desc}}</td>
        <td>
          <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" onclick="edit_benefit('{{$data->id}}','{{$data->title}}','{{$data->desc}}')" data-original-title="Ubah">
              <i class="material-icons">edit</i> edit
          </button>
          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_benefit('{{$data->id}}')" data-original-title="Hapus">
              <i class="material-icons">close</i> delete
          </button>
        </td>
      </tr>
    @endforeach
    </table>

@else
@endif
