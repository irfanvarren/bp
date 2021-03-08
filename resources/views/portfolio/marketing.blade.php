@extends('layouts.portfolio')
@section('style')
<style media="screen">
    header {
        padding: 15px;
        padding-top: 45px;
    }

    .tutor_name_wrapper {
        padding-top: 40px;

        float: left;
    }

    .tutor_photo_wrapper {
        float: left;
        padding-right: 20px;
    }

    .tutor_photo {
        width: 140px;
        margin: 0 auto;
        height: auto;
    }

    .tutor-contact-wrapper {
        padding-right: 15px;
        padding-top: 10px;
    }

    .tutor-contact-wrapper ul {
        list-style-type: none;
        float: right;
    }

    .tutor-contact-list {
        padding-bottom: 7px;
        text-align: right;
    }

    .tutor-contact-list .text {
        padding-left: 15px;
        float: right;
    }

    .tutor-contact-list .icon {
        float: right;
        line-height: 20px;
        /*font-size:40px;*/
    }

    .content-wrapper {
        padding: 30px 60px;
        font-size: 18px;
    }

    .colon {
        float: right;
        position: absolute;
        top: 0;
        right: 0;
    }

    .tutor-desc {
        padding-bottom: 15px;
    }

    @media screen and (max-width:520px) {
        .tutor_photo {
            width: 90px;
        }

        .tutor-contact-list {
            text-align: left;
        }

        .content-wrapper {
            padding: 30px 40px;
        }
    }

    @media screen and (max-width:1180px) {

        div#main {
            margin-top: 0 !important;
        }

        header {
            position: relative;
            top: auto;
            height: auto;
            box-shadow: none;

        }
</style>
@endsection
@section('portfolio-header')
<div class="col-md-12 portfolio_header">
    <div class="row">
        <div class="col-md-7 col-sm-3">
          <div class="col-md-12">


            <div class="tutor_photo_wrapper">
                <img src="{{asset('img/avatar.png')}}" class="tutor_photo" alt="">
            </div>
            <div class="tutor_name_wrapper">
                <h2>{{$karyawan->NAMA}}</h2>
                <h5> <strong>{{$karyawan->REF_JABATAN}} </strong></h5>
            </div>
      </div>
        </div>
        <div class="col-md-5 col-sm-9">
            <div class="row tutor-contact-wrapper">

            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="col-md-12 content-wrapper">
    <div class="row">

        <div class="col-md-12 tutor-content-title">
            <h2>Latar Belakang Pendidikan</h2> <br>
            @foreach($edu as $data_edu)
            <h3>{{$data_edu->gelar}}</h3>
            <div>
                <div class="tutor-desc row">
                    <div class="col-md-2">
                        Gelar Diploma / Sarjana <span class="colon">:</span>
                    </div>
                    <div class="col-md-10">
                        {{$data_edu->tempat}}
                    </div>

                </div>
                <div class="tutor-desc row">
                    <div class="col-md-2">
                        Tahun Masuk <span class="colon">:</span>
                    </div>
                    <div class="col-md-10">
                        {{$data_edu->tahun_masuk}}
                    </div>


                </div>
                <div class="tutor-desc row">
                    <div class="col-md-2">
                        Gelar / Jurusan <span class="colon">:</span>
                    </div>
                    <div class="col-md-10">
                        {{$data_edu->jurusan}}
                    </div>


                </div>
                <div class="tutor-desc row">
                    <div class="col-md-2">
                        Status Lulus <span class="colon">:</span>
                    </div>
                    <div class="col-md-10">
                        {{$data_edu->status}}
                    </div>


                </div>
                @endforeach
            </div>
            
            <br>
            <h2>Pengalaman Bekerja</h2>
            <div>
              @php
                $x = 1;
              @endphp
                @foreach ($exp as $data_exp)


                <div class="tutor-desc row">
                    <div class="col-md-2">
                        Posisi {{$x}} <span class="colon">:</span>
                    </div>
                    <div class="col-md-10">
                        <strong>
                          Nama Perusahaan :
                        </strong>  {{$data_exp->tempat_bekerja}} @if ($data_exp->tgl_mulai != "")
                          {{"(".$data_exp->tgl_mulai.")"}}
                                @endif <br>
                        <strong>Jabatan:</strong> {{$data_exp->nama_pekerjaan}}  <br>
                        @if ($data_exp->deskripsi != "")
                        <strong>Deskripsi Pekerjaan :</strong> {{$data_exp->deskripsi}}
                        @endif
                    </div>
                </div>
              @php
                $x++;
              @endphp
              @endforeach

                </div>

                {!!$other!!}

            </div>
        </div>

    </div>
</div>
@endsection
