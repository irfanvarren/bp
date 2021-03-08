@extends('layouts.app-auth', ['activePage' => 'visa-requirements', 'titlePage' => __('Visa Requirements'),'activeMenu' => 'data-management'])
<style media="screen">
    .visa-list{
        padding:15px;
        height:33.33%;
        text-align:center;
        line-height:100%;
        color:white;
        font-size:18px;
        display: flex;
        align-items:center;
    }
    .visa-list span{
        display: block;margin: 0 auto;
        font-size:32px;
    }
    .visa-list:nth-child(1){
        background:#8e44ad;
        
    }
    .visa-list:nth-child(2){
        background:#2980b9;
    }
    .visa-list:nth-child(3){
        background:#16a085;
    }
    .visa-list:hover{
        cursor:pointer;
    }
</style>
@section('content')
<div class="content">
    <div class="container-fluid">
        
        <div style="height:500px">
            <div class="col-md-12 visa-list" onclick="select_visa_type('student')"> <span> Student </span>  </div>
            <div class="col-md-12 visa-list" onclick="select_visa_type('whv')"> <span> WHV </span> </div>
            <div class="col-md-12 visa-list" onclick="select_visa_type('tourist')"> <span> Tourist </span> </div> 
            
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    function select_visa_type(type){
        location.href = "{{route('visa-requirements.index')}}?type="+type;
    }
    $(document).ready(function(){
        $('#Modal').modal('show');
    });
</script>
@endpush