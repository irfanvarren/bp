@extends('layouts.bp_wo_sidenav')
@section('content')
<div class="col-md-12 p-3" style="padding:15px;">
    <div class="col-md-12 text-center" style="padding:30px;margin:20px 0;">
        <h2>Verify Your Identification</h2>
    </div>
    <div class="col-md-12" style="margin:15px 0;">
        <div class="row" style="padding: 0 25px;">
            <div class="col-sm-12 col-md-12 col-lg-3 offset-lg-1">
                <img src="{{asset('online-test/verify-identification.png')}}"  style="display:block;margin:0 auto;">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-1">
                <p>Tolong upload foto anda sambil memegangi kartu identitas (KTP / Paspor / Kartu Pelajar) sebagai bukti bahwa anda benar benar mengikuti test ini (Foto dokumen harus jelas dan cocok dengan wajah partisipan test). </p>
                <p>
                    Kriteria foto yang dapat diterima : 
                    <div style="padding:0 15px;">
                    <ul style="list-style-position: outside;">
                        <li>Foto jelas dan tidak <i>blur</i> </li>
                        <li>Informasi pada kartu identitas terlihat jelas dan tidak ada yang terhalangi oleh barang apapun</li>
                        <li>Kecocokan foto partisipan dan foto pada kartu identitas </li>
                        <li>Tidak adanya informasi yang dipalsukan pada kartu identitas</li>
                    </ul>    
                    </div>
                </p>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="col-md-12 mb-4">

        <div class="row justify-content-center">
            <form action="{{url('student/start-test')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="test_id" value="{{$test_id}}">
        <input type="hidden" name="module_id" value="{{$module_id}}">
        <input type="hidden" name="current_test_id" value="{{$current_test_id != '' ? $current_test_id : 0}}">
        <input type="file" name="verify_identification"> <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </form>
    </div>
    </div>
</div>   
@endsection