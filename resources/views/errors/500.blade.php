@extends('errors.minimal-image')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __($exception->getMessage()))
@section('image')
<img class="error-img" src="{{asset('img/error/500.jpg')}}">
@endsection