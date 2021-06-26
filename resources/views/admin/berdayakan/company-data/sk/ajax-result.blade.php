 <table class="table table-bordered">
  <tr>
    <th>Nomor SK</th> <th>Id Karyawan</th> <th>Judul SK</th> <th>Status</th> <th>Date Created</th> <th>Masa Mulai</th> <th>Masa Berakhir</th>
  </tr>
  @foreach($sk as $data_sk)
  <tr>
   <td>{{$data_sk->no}}</td> <td>{{$data_sk->id_karyawan}}</td> <td>{{$data_sk->judul}}</td> <td>{{$data_sk->status == 1 ? 'Active' : 'In Active'}}</td> <td>{{$data_sk->created_at}}</td> <td>{{$data_sk->tgl_mulai}}</td> <td>{{$data_sk->tgl_berakhir}} </td>
 </tr>
 @endforeach
</table>
<div>{{$sk->links('admin.company-data.sk.ajax-pagination',['type' => isset($type) ? $type : ''])}}</div>