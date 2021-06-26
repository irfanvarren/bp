
@if(!$certifications->isEmpty())

<table class="table table-bordered">
  <tr>
    <th>Sertifikat</th>
    <th>Tahun</th>
    <th>Durasi</th>
    <th>Keterangan</th>
    <th>Nilai</th>
    <th>Action</th>
  </tr>
  @php
  $x = 1;
  @endphp
  @foreach($certifications as $data)
  <tr>
    <td>{{$data->name}}</td>
    <td>{{$data->year}}</td><td>{{$data->duration}} {{$data->periode}}</td> <td>{{$data->keterangan}}</td>
    <td>
     <div class="text-center text-light p-3 bg-primary">
       <h4 class="m-0"> <strong> Hasil Nilai </strong> </h4>
     </div>
     <div class="table-responsive">
      <table class="table table-bordered" >
        <thead>
          <tr>
            <td>Kriteria</td> <td>Nilai</td>
          </tr>
        </thead>
        <tbody>
          @foreach(json_decode($data->nilai) as $key => $result)
          <tr>
            <td>{{$result->kriteria}}</td><td>{{$result->nilai}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </td>
  <td>
    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" onclick="edit_nilai_sertifikasi('{{$data->id}}','{{$data->name}}','{{$data->year}}','{{$data->duration}}','{{$data->periode}}','{{$data->keterangan}}','{{$data->nilai}}')" data-original-title="Ubah">
      <i class="material-icons">edit</i>
    </button>
    <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" onclick="delete_nilai_sertifikasi('{{$data->id}}')" data-original-title="Hapus">
      <i class="material-icons">close</i>
    </button>
  </td>
</tr>
@endforeach
</table>

</table>
@else
@endif
