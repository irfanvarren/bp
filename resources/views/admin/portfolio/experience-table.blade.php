
@if(!$experience->isEmpty())
<table class="table table-bordered">
  <tr>

    <th>Nama</th><th colspan="6">{{$experience[0]->nama_karyawan}}</th>
  </tr>
    <tr>
      <th>No</th>
        <th>Nama Pekerjaan</th>
        <th>Tempat Bekerja</th>
        <th>Deskripsi</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Action</th>
    </tr>
    @php
      $x = 1;
    @endphp
    @foreach($experience as $data)
      <tr>
            <td>{{$x++}}</td>
        <td>{{$data->nama_pekerjaan}}</td><td>{{$data->tempat_bekerja}}</td>
          <td>{!!nl2br($data->deskripsi)!!}</td><td>{{$data->tgl_mulai}}</td><td>{{$data->tgl_selesai}}</td>
        <td>
          <!--
          preg_replace("/\s+/", " ", trim($data->deskripsi))
          -->
          <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" onclick='edit_pekerjaan("{{$data->id}}","{{$data->nama_pekerjaan}}","{{$data->tempat_bekerja}}","{{$data->tgl_mulai}}","{{$data->tgl_selesai}}",{{json_encode($data->deskripsi)}})' data-original-title="Ubah">
              <i class="material-icons">edit</i>
          </button>
          <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_pekerjaan('{{$data->id}}')" data-original-title="Hapus">
              <i class="material-icons">close</i>
          </button>
        </td>
      </tr>
    @endforeach
    </table>

</table>
@else
@endif
