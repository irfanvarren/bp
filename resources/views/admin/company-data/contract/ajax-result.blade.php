 <table class="table table-bordered">
     <tr>
      <th>Nomor Kontrak</th> <th>Id Karyawan</th> <th>Status</th> <th>Date Created</th> <th>Masa Mulai</th> <th>Masa Berakhir</th>
    </tr>
    @foreach($contracts as $contract)
    <tr>
      <td>{{$contract->no}}</td><td>{{$contract->id_karyawan}}</td><td>{{$contract->status == 1 ? 'Active' : 'In Active'}}</td><td>{{$contract->created_at}}</td> <td>{{$contract->tgl_mulai}}</td> <td>{{$contract->tgl_berakhir}}</td>
    </tr>
    @endforeach
  </table>
  <div>{{$contracts->links('admin.company-data.contract.ajax-pagination',['type' => isset($type) ? $type : ''])}}</div>