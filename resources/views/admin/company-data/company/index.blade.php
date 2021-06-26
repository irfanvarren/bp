@extends('layouts.app-auth', ['activePage' => 'companies', 'titlePage' => __('Banner'),'activeMenu' => 'company-data'])
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
            <h4 class="card-title ">{{ __('Companies') }}</h4>
            <p class="card-category"> {{ __('Here you can manage company') }}</p>
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
                <!--
              <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('admin-company.create') }}" class="btn btn-sm btn-primary">{{ __('Add Company') }}</a>
                  </div>
                </div>-->
                @csrf
                <div class="table-responsive">
                  <table class="table">
                    <colgroup>
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
                        {{ __('Inisial') }}
                      </th>

                      <th>
                        {{ __('Kontak') }}
                      </th>
                      <th>Alamat</th>
                      <th>
                        {{__('Kota')}}
                      </th>
                      <th>Status</th>

                    </thead>
                    <tbody>
                      @foreach($companies as $key => $data)
                      <tr>
                        <td>
                          {{ $data->NAMA }} ({{$data->KD}})
                        </td>
                        <td>{{$data->INISIAL}}</td>
                        <td>
                          @for($i=1;$i<=3;$i++)
                          <div>

                            @php
                            $col_kontak = "KONTAK_".$i
                            @endphp 
                            {{$data->$col_kontak}}  
                          </div>

                          @endfor
                        </td>

                        <td>
                          {{$data->ALAMAT}}
                          
                        </td>

                        <td>
                          {{$data->REF_KOTA}}
                        </td>
                        <td>
                         <div class="togglebutton" >
                          <label id="status-ajax">
                            <input type="checkbox" id="status-{{$key}}" onchange="change_status('#status-label-{{$key}}','{{$data->id}}',this)" class="status_input" name="status" {{$data->status == 1 ? "checked" : ""}}>
                            <span class="toggle"></span>
                          </label><br>
                          <span class="status-label" id="status-label-{{$key}}" for="status">{{$data->status == "1" ? "Active" : "Inactive"}}</span>
                        </div>
                      </td>
                            <!--                          <td class="text-center">
                            <form action="{{ route('cms-banner.destroy', $data) }}" method="post">
                                @csrf
                                @method('delete')
                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin-company.edit', $data->KD) }}" data-original-title="" title="">
                                  <i class="material-icons">edit</i>
                                  <div class="ripple-container"></div>
                                </a>
                               
                            </form>
                        </td>
   <td class="td-actions text-right">
                              <form action="{{ route('mp.destroy', $data) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('mp.edit', $data) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this Banner?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                         <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('admin'.'/profile') }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                            </td>-->
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