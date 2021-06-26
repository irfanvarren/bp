@extends('errors::minimal')
@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@if(Request::segment(1) == 'email' && Request::segment(2) == 'verify' && $exception->getMessage() == "Invalid signature.")
@section('content')
<a style="padding:12px 20px;font-size:16px;background:#023E8A;border:none;color:white;border-radius:30px;text-decoration: none;" href="{{url('email/verify')}}"> Try Again </a>
@endsection
@endif
