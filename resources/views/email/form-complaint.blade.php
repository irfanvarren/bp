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
      <th colspan="2">Form Complaint</th>
    </tr>
    <tr>
      <td>Customer Name</td><td>{{$email->nama}}</td>
    </tr>
    <tr>
      <td>Email Address</td><td>{{$email->email}}</td>
    </tr>
    <tr>
      <td>Address</td> <td>{{$email->alamat}}</td>
    </tr>
    <tr>
      <td>Visa Country</td> <td>{{$email->negara_pemberi_visa}}</td>
    </tr>
    <tr>
      <td>School</td> <td>{{$email->nama_sekolah}}</td>
    </tr>
    <tr>
      <td>Phone Number / WA</td><td>{{$email->no_hp}}</td>
    </tr>
    <tr>
      <td>Complaint Date</td> <td>{{$email->complaint_date}}</td>
    </tr>
    <tr>
      <td>Complaint Detail</td> <td>{{$email->complaint_detail}}</td>
    </tr>
  </table>
</div>
