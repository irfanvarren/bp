@extends('layouts.bp_wo_sidenav')
<style media="screen">
  .page-wrapper{
  }
  table tr td, table tr th{
    padding:15px;
  }
  ol,ul{
    list-style-position:inside;
  }
  p{
    padding:0 15px;
  }
  {!!$page->contents->gjs_css!!}
</style>
@section('content')
  <div class="page-wrapper content-wrapper">
    {!!$page->contents->gjs_html!!}
    
  </div>
@endsection
