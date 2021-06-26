@extends('layouts.app-auth', ['activePage' => 'document-translate','activeMenu' => 'data-management', 'titlePage' => __('Document Translation')])
@push('head-js')
<style media="screen">
  .loading-wrapper{
    width:100vw;
    height:100vh;
    position:fixed;
    top:0;
    left:0;
    z-index:9999999;
    display:none;
    background:rgba(255,255,255,1);
  }
  .loading-wrapper img{
    display:block;
    margin:0 auto;
    width:500px;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);

  }
</style>
@endpush


<!-- nama tgl lahir tempat lahir pekerjaan sektor pekerjaan modul ielts tgl ielts  -->
@section('content')
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Translate Document') }}</h4>
            <p class="card-category"> {{ __('Here you can manage translate document') }}</p>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            @csrf
            <div class="table-responsive">
              <table class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" id="myTable">
                <colgroup>
                  <col width="20%">
                  <col>
                  <col>
                  <col>
                  <col>
                </colgroup>
                <thead class=" text-primary">
                  <th>
                    {{ __('Nama') }}
                  </th>
                  <th>
                    {{ __('Bahasa') }}
                  </th>
                  <th>
                    {{ __('Jenis') }}
                  </th>
                  <th>
                    {{ __('Kategori') }}
                  </th>
                  <th>
                    {{ __('File Terjemahan') }}
                  </th>
                </thead>
                <tbody>
                  @foreach($document_translations as $document_translation)
                  <tr>
                    <td>{{$document_translation->nama}}</td>
                    <td>{{$document_translation->REF_PAKET}}</td>
                    <td>{{$document_translation->REF_LEVEL}}</td>
                    <td>{{$document_translation->REF_KATEGORI}}</td>
                    <td>
                      @php
                      $arr_files = explode('|',$document_translation->files);
                      @endphp
                      @foreach($arr_files as $key => $arr_file)
                      <div>
                        <a href="{{asset($arr_file)}}" target="_blank">File {{$key+1}}</a>
                      </div>
                      @endforeach
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop