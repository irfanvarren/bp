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
<h3>Data Kuesioner</h3>
<div class="wrapper">
<table>
  <tr>
    <td colspan="2">Data Responden</td>
  </tr>
  <tr>
    <td>Nama :</td><td> {{$email->nama}}</td>
  </tr>
  <tr>
    <td>Tanggal Test : </td> <td>{{$email->tgl_test}}</td>
  </tr>
  <tr>
    <td>Email :</td> <td>{{$email->email}}</td>
  </tr>
</table>
 <br>
 <table>
<tr>
  <td colspan="2">Data Kuesioner</td>
</tr>
@for ($i = 1; $i <= 3; $i++)
  <tr>
  @php
  $pertanyaan = 'q'.$i;
  $jawaban = 'a'.$i;
  @endphp
  @if ($jawaban == ''||$jawaban == NULL)
    @php
$jawaban= 'Null';
    @endphp
  @endif
  <br>
<td>{{$i.'. '}} {{$email->$pertanyaan}}</td> <td>{{$email->$jawaban}}</td>

</tr>
@endfor

</table>
</div>
