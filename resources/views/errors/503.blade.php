@extends('errors.minimal-image')

@section('title', __('Server Error'))
@section('code', '500')
@section('message')
<h3 style="font-weight: bold;color:#5471e9;margin-bottom:5px;">{{ $exception->getMessage()}} </h3>
<div>{!!$exception->retryAfter  != "" ? "Please try again in ".$exception->retryAfter." Seconds" : ""!!}</div>
@endsection
@section('image')
<img class="error-img" src="{{asset('img/error/503.jpg')}}">
@endsection