@extends('errors.minimal-image')
@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
@section('image')
<img class="error-img" src="{{asset('img/error/404.jpg')}}">

@endsection