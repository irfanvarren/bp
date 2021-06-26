
@if(!$otherexperience->isEmpty())
<table class="table table-bordered">
  <tr>

    <th>Nama</th><th colspan="6">{{$otherexperience[0]->nama_karyawan}}</th>
  </tr>
    <tr>
        <th>No</th>
        <th>Pengalaman</th>
        <th>Jenis Pengalaman</th>
        <td>Tanggal</td>
        <th>Action</th>
    </tr>
    @php
      $x = 1;
    @endphp
    @foreach($otherexperience as $data)
      <tr>
        <td>{{$x++}}</td>
        <td>{!! nl2br(urldecode($data->pengalaman))!!}</td><td>{{$data->jenis_pengalaman}}</td>
        <td></td>
        <td>
          <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" onclick="edit_other('{{$data->id}}','{{$data->pengalaman}}','{{$data->jenis_pengalaman}}')" data-original-title="Ubah">
              <i class="material-icons">edit</i>
          </button>
          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_other('{{$data->id}}')" data-original-title="Hapus">
              <i class="material-icons">close</i>
          </button>
        </td>
      </tr>
    @endforeach
    </table>

</table>
@else
@endif
