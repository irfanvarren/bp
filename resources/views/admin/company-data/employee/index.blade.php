@extends('layouts.app-auth', ['activePage' => 'employees', 'titlePage' => __('Banner'),'activeMenu' => 'company-data'])
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
  .form-group input[type=file]{
    position:relative !important;
    opacity:1 !important;
  }
</style>
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
            <h4 class="card-title ">{{ __('Employee') }}</h4>
            <p class="card-category"> {{ __('Here you can manage employee') }}</p>
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
              <table class="table">
                <colgroup>
                  <col>
                  <col style="width:80px;white-space: nowrap;text-overflow: ellipsis;">
                  <col>
                  <col>
                  <col>
                </colgroup>
                <thead class=" text-primary">

                  <th>
                    {{ __('Nama') }}
                  </th>
                   <th>Accounts</th>
                  <th>{{__('Jabatan')}}</th>
                  <th>
                    {{ __('Image') }}
                  </th>
                  <th>
                    {{ __('Tanggal Lahir') }}
                  </th>
                  <th>
                    {{__('Kontak')}}
                  </th>
                  <th>{{__('Alamat')}}</th>
                  <th>{{__('Job Description')}}</th>
                  <th class="text-center">
                    {{__('Action')}}
                  </th>
                </thead>
                <tbody>
                 @php 
                 function data_uri($content, $mime) {  
                 $base64   = base64_encode($content);
                 return ('data:' . $mime . ';base64,' . $base64);
               }
               @endphp
               @foreach($employees as $data)
               <tr>
                <td>
                  {{ $data->NAMA }}
                </td>
                <td>{{$data->ID_KARYAWAN}} (Company) {{$data->user($data->ID_KARYAWAN) ? '/' . $data->user($data->ID_KARYAWAN)->email.' (Web)' : '' }}</td>
                <td>{{$data->NAMA_JABATAN}}</td>
                <td>
                  <img src="{!!data_uri($data->PIC,'image/png')!!}" width="100px" alt="">
                </td>
                <td>{{date("d/m/Y",strtotime($data->TGL_LAHIR))}}</td>
                <td>
                  <div class="mb-2">
                    Email:
                    @for($i=1;$i<=2;$i++)

                    <div class="pl-2">

                      @php
                      $col_email = "EMAIL_".$i;
                      @endphp 
                      {{$data->$col_email}}  
                    </div>

                    @endfor
                  </div>
                  <div class="mb-2">
                    Kontak:
                    @for($i=1;$i<=3;$i++)

                    <div class="pl-2">

                      @php
                      $col_kontak = "KONTAK_".$i;
                      @endphp 
                      {{$data->$col_kontak}}  
                    </div>

                    @endfor
                  </div>
                </td>
                <td>{{$data->ALAMAT}}</td>
                <td>
                  <div style="max-width:300px;max-height: 300px;overflow: auto;">
                  {!!$data->deskripsi_pekerjaan!!}  
                  </div>
                  </td>

                <td>
                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin-employee.edit', $data) }}" data-original-title="" title="">
                    <i class="material-icons">edit</i>
                    <div class="ripple-container"></div>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
        <div class="row">

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
@push('js')

@endpush