<head>
  <style media="screen">
  .wrapper{
        margin:100px auto;
        width:500px;

          display:block;
  }
  table{
    border-collapse: collapse;
    width:100%;

  }
  table tr, table td, table th{
    padding:8px;
    text-align:left;
    border:1px solid black
  }
    </style>
</head>
<div class="wrapper">
  <table>
    <tr>
      <td>Nama</td> <td>{{$email->nama}}</td>
    </tr>
    <tr>
      <td>No Handphone/WA</td> <td>{{$email->no_hp}}</td>
    </tr>

    <tr>
      <td>Email</td> <td>{{$email->email}}</td>
    </tr>
    <tr>
      <td>Tanggal</td><td>{{$email->tanggal}}</td>
    </tr>
    <tr>
      <td>Tanggal Lainnya</td><td>{{$email->tanggal_lainnya}}</td>
    </tr>
    <tr>
      <td>Jam</td><td>{{$email->jam}}</td>
    </tr>
    <tr>
      <td>Tujuan Janji temu</td><td>{{$email->tujuan}}</td>
    </tr>
    <tr>
      <td>Cabang</td><td>{{$email->cabang}}</td>
    </tr>
    @php
    $arr_staff= explode('#',$email->staff);

      $nama_staff = $arr_staff[0];
    @endphp
    <tr>
      <td>Staff</td> <td>{{$nama_staff}}</td>
    </tr>
    <tr>
      <td>Catatan Tambahan</td> <td>{{$email->catatan}}</td>
    </tr>

  </table>

</div>
