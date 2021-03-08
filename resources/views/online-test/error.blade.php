@extends('layouts.minimal')
@section('content')
    <div class="col-md-12" style="padding:25%;text-align:center;width:100%;">
      @if(session()->has('online_test_error'))
      <h3>
      {!!session()->get('online_test_error')!!}
      </h3>
      @else
      <h3>
          Error
      </h3>
      @endif
    </div>
@endsection