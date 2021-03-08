
@extends('e-library.layouts.app')

@section('content')
<div class="data-fullscreen">
<div class="container-fluid" >
	<a href="/logout" class="btn btn-info " style="float: right;margin-right: 100"px>log out</a>
</div>

<div class="container">
    <a href="{{url('library/isiformbuku')}}" class="btn btn-light " style="margin-left: 275px">Database Buku</a>
    <a href="{{url('library/bannerupdate')}}" class="btn btn-light " style="margin-left: 275px">Banner Update</a>
</div>
</div>
@endsection