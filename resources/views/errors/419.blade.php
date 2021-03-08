@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message',__('Page Expired'))
@section('content')
<a href="{{URL::previous()}}" style="text-decoration:none;padding:8px 15px;background-color:#2291e0;color:white;box-shadow:5px 5px 5px #0e4887">Go Back</a>
@endsection
