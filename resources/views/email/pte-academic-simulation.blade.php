<head>
    <style media="screen">
        table,
        th,
        td {
            border</td><td>1px solid black;
            border-collapse</td><td>collapse;
            text-align</td><td>center;
            vertical-align</td><td>center;
        }

        th,
        td {
            padding</td><td>6px 8px;
        }
    </style>
</head>

<h3 style="margin-top</td><td>200px;">Data Pendaftaran PTE Academic Simulation</h3>

<table class="table table-bordered">
    <tr>
        <th colspan="2">Data Pendaftaran PTE Academic Simulation</th>
    </tr>
    <tr>
        <td>Nama</td>
        <td>{{$email->TITLE.'. '.$email->NAMA}}</td>
    </tr>
    <tr>
        <td>Gender</td>
        <td>{{$email->JK}}</td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td>{{$email->TGL_LAHIR}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>{{$email->ALAMAT}}</td>
    </tr>
    <tr>
        <td>Kota</td>
        <td>{{$email->KOTA}}</td>
    </tr>
    <tr>
        <td>Kode Pos</td>
        <td>{{$email->POSTAL_CODE}}</td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>{{$email->AGAMA}}</td>
    </tr>
    <tr>
        <td>No Telepon</td>
        <td>{{$email->KONTAK}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{$email->EMAIL}}</td>
    </tr>
    <tr>
        <td>Tipe Identifikasi</td>
        <td>{{$email->tipe_id}}</td>
    </tr>
    <tr>
        <td>No Identifikasi</td>
        <td>{{$email->REF_KTP.$email->REF_PASPOR}}</td>
    </tr>

</table>
<br>
<table class="table table-bordered">
    <tr>
        <th colspan="2">Data Pendaftaran IELTS - page 2</th>
    </tr>
    <tr>
        <td>Tingkat Pekerjaan </td>
        <td> @if(empty($email->TINKAT_PEKERJAAN_LAINNYA)){{$email->TINGKAT_PEKERJAAN}} @else {{$email->TINKAT_PEKERJAAN_LAINNYA}} @endif </td>
    </tr>
    <tr>
        <td>Sektor Pekerjaan </td>
        <td> @if(empty($email->SEKTOR_PEKERJAAN_LAINNYA)){{$email->SEKTOR_PEKERJAAN}} @else {{$email->SEKTOR_PEKERJAAN_LAINNYA}} @endif</td>
    </tr>
    <tr>
        <td>Tingkat Pendidikan </td>
        <td> @if(empty($email->TINGKAT_PENDIDIKAN_LAINNYA)){{$email->TINGKAT_PENDIDIKAN}} @else {{$email->TINGKAT_PENDIDIKAN_LAINNYA}} @endif</td>
    </tr>
    <tr>
        <td>Jurusan Yang Diambil </td>
        <td> {{$email->JURUSAN}}</td>
    </tr>
    <tr>
        <td>Lamanya Belajar Bahasa Inggris </td>
        <td> {{$email->LAMA_BELAJAR_INGGRIS}}</td>
    </tr>
    <tr>
        <td>Negara Tujuan </td>
        <td> @if(empty($email->NEGARA_TUJUAN_LAINNYA)) {{$email->NEGARA_TUJUAN}} @else {{$email->NEGARA_TUJUAN_LAINNYA}} @endif</td>
    </tr>
    <tr>
        <td>Alasan Mengambil Tes Ielts</td>
        <td> {{$email->ALASAN}}</td>
    </tr>
    <tr>
        <td>Masa Berlaku Paspor </td>
        <td> {{date('d-m-Y', strtotime($email->TGL_BERLAKU_PASPOR))}}</td>
    </tr>
    @if($email->ALASAN == 'Sekolah')
    <tr>
        <th colspan="2">Jika memilih untuk melanjutkan sekolah</th>
    </tr>
    <tr>
        <td>Gelar Yang Akan diambil </td>
        <td> {{$email->AMBIL_GELAR}}</td>
    </tr>
    <tr>

        <td>Jurusan Yang </td>
        <td> {{$email->AMBIL_JURUSAN}}</td>
    </tr>
    <tr>

        <td>Referensi Universitas </td>
        <td> {{$email->REF_UNIVERSITAS}}</td>
    </tr>
    @endif
</table>
