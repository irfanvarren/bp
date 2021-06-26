<head>

</head>

<body>
    <table class="table-tax-claim">
        <tr>
            <td colspan="2">Tax Claim Form</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$email->email}}</td>
        </tr>

        <tr>
            <td>Nama</td>
            <td>{{$email->nama_depan.' '.$email->nama_belakang}}</td>
        </tr>

        <tr>
            <td>Tanggal Lahir</td>
            <td>{{date("d/m/Y",strtotime($email->tgl_lahir))}}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>{{$email->alamat}}</td>
        </tr>

        <tr>
            <td>Kota</td>
            <td>{{$email->kota}}</td>
        </tr>

        <tr>
            <td>Provinsi</td>
            <td>{{$email->provinsi}}</td>
        </tr>

        <tr>
            <td>Kode Pos</td>
            <td>{{$email->kode_pos}}</td>
        </tr>


        <tr>
            <td>No Telepon</td>
            <td>{{$email->no_telepon}}</td>
        </tr>


        <tr>
            <td>No WA</td>
            <td>{{$email->no_wa}}</td>
        </tr>

        <tr>
            <td>Id MyGov</td>
            <td>{{$email->id_mygov}}</td>
        </tr>

        <tr>
            <td>Password MyGov</td>
            <td>{{$email->password_mygov}}</td>
        </tr>

        <tr>
            <td>Kode TFN</td>
            <td>{{$email->kode_tfn}}</td>
        </tr>

        <tr>
            <td>Nama Bank</td>
            <td>{{$email->nama_bank}}</td>
        </tr>
        <tr>
            <td>Swift Code</td>
            <td>{{$email->swift_code}}</td>
        </tr>
        <tr>
            <td>Nama Akun</td>
            <td>{{$email->nama_akun}}</td>
        </tr>
        <tr>
            <td>Nomor Akun</td>
            <td>{{$email->nomor_akun}}</td>
        </tr>
        <tr>
            <td>BSB</td>
            <td>{{$email->bsb}}</td>
        </tr>


    </table>
</body>
