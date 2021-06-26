@extends('e-library.layouts.app')
@section('content')
<div class="data-fullscreen">
  <div class="col-md-12" >
    <a href="/logout" class="btn btn-info " style="float: right;margin-top: 20px">log out</a>
  </div>

  <div class="container">
    <a href="{{url('library/isiformbuku')}}" class="btn btn-light " style="margin-left: 275px">Database Buku</a>
    <a href="{{url('library/bannerupdate')}}" class="btn btn-light " style="margin-left: 275px">Banner Update</a>
  </div>
  <div class="container-fluid" style="margin-top: 30px">

   <table class="table table-striped " style="margin-top: 60px;font-size: 14px">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="max-width: 150px;overflow: hidden" >Banner Pertama</th>
        <th scope="col">Banner Kedua</th>
        <th scope="col">Banner Ketiga</th>
        <th scope="col"></th>
      </tr>
    </thead>
    @foreach($banner as $banner)
    <tbody>
      <tr>
        <td style="max-width: 150px;overflow: hidden">{{$banner->link_banner1}}</td>
        <td>{{ $banner->link_banner2}}</td>
        <td>{{ $banner->link_banner3}}</td>
        <td><a href="bannerupdate/{{$banner->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
</div>
@endsection