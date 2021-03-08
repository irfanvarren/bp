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
      <th colspan="2">Biodata</th>
    </tr>
    <tr>
      <td>Nama Lengkap</td><td>{{$email->nama_lengkap}}</td>
    </tr>
    <tr>
      <td>Email</td><td>{{$email->email}}</td>
    </tr>
    <tr>
      <td>Nomor Hp Australia</td><td>{{$email->no_hp_ausie}}</td>
    </tr>
    <tr>
      <td>Alamat</td><td>{{$email->alamat}}</td>
    </tr>
    <tr>
      <td>Kode TFN</td><td>{{$email->kode_tfn}}</td>
    </tr>
  </table> <br>
  <table>
    <tr>
      <th colspan="2">Bank Account</th>
    </tr>
    <tr>
      <td>Account Name</td><td>{{$email->account_name}}</td>
    </tr>
    <tr>
      <td>Account Number</td><td>{{$email->account_number}}</td>
    </tr>    <tr>
          <td>Bank Name</td><td>{{$email->bank_name}}</td>
        </tr>
        <tr>
          <td>BSB</td><td>{{$email->bsb}}</td>
        </tr>
      </table> <br>
      <table>
        <tr>
          <th colspan="2">Pesan / Saran / Keluhan</th>
        </tr>
        <tr>
          <td>{{$email->pesan}}</td>
        </tr>
  </table>
</div>
