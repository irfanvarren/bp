
@if(!$edubackground->isEmpty())
<table class="table table-bordered">
  <tr>

    <th>Nama</th><th colspan="6">{{$edubackground[0]->nama_karyawan}}</th>
  </tr>
    <tr>
      <th>No</th>
        <th>Gelar</th>
        <th>Jurusan</th>
        <th>Tempat</th>
        <th>Tahun Masuk</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @php
      $x = 1;
    @endphp
    @foreach($edubackground as $data)
      <tr>
        <td>{{$x++}}</td>
        <td>{{$data->gelar}}</td><td>{{$data->jurusan}}</td>
        <td>{{$data->tempat}}</td><td>{{$data->tahun_masuk}}</td><td>{{$data->status}}</td>
        <td>
          <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" onclick="edit_pendidikan('{{$data->id}}','{{$data->gelar}}','{{$data->jurusan}}','{{$data->tempat}}','{{$data->tahun_masuk}}','{{$data->status}}')" data-original-title="Ubah">
              <i class="material-icons">edit</i>
          </button>
          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_pendidikan('{{$data->id}}')" data-original-title="Hapus">
              <i class="material-icons">close</i>
          </button>
        </td>
      </tr>
    @endforeach
    </table>

</table>
@else
@endif
