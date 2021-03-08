@extends('layouts.bp_wo_sidenav')
@section('content')
  <div class="col-md-12 content-wrapper" style="padding:0;min-height: auto;">
    @if($company_structures)
    <img src="{{asset($company_structures->image)}}" style="width:100%;">
    @endif
  </div>
@endsection
