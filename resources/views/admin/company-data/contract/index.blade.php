@extends('layouts.app-auth', ['activePage' => 'contracts', 'titlePage' => __('Contract'),'activeMenu' => 'company-data'])
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
            <h4 class="card-title ">{{ __('Contract') }}</h4>
            <p class="card-category"> {{ __('Here you can manage Contract') }}</p>
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
            <div class="row">
              <div class="col-12 text-right">
                <a href="{{ route('admin-contract.create') }}" class="btn btn-sm btn-primary">{{ __('Add Contract') }}</a>
              </div>
            </div>
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
                      {{ __('No') }}
                    </th>
                    <th>{{__('Karyawan')}}</th>
                    <th>{{__('Judul')}}</th>
                    <th>{{__('Isi')}}</th>

                    <th>{{__('Durasi')}}</th>
                    <th>{{__('Status')}}</th>
                    <th>Actions</th>

                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                  @foreach($contract as $data)
                  <tr>
                    <td>{{$data->no}}</td>
                    <td>{{$data->id_karyawan}}</td>
                    <td>{{$data->judul}}</td>
                    <td>

                      <div>{!!$data->isi!!}</div>
                
                  <div><a href="{{asset('storage').'/'.$data->file}}" target="_blank">Open / Download File</a></div>
                </td>

                <td>
                  @if($data->tgl_mulai != "")
                  {{$data->tgl_mulai}}
                  @if($data->tgl_berakhir != "")
                  - {{$data->tgl_berakhir}}
                  @endif
                  @else
                  @if($data->tgl_berakhir != "")
                  {{$data->tgl_berakhir}}
                  @endif
                  @endif
                </td>
                <td> <div class="togglebutton" >
                            <label id="status-ajax">
                              <input type="checkbox" id="status-{{$no}}" onchange="change_status('#status-label-{{$no}}','{{$data->no}}',this)" class="status_input" name="status" {{$data->status == 1 ? "checked" : ""}}>
                              <span class="toggle"></span>
                            </label><br>
                            <span class="status-label" id="status-label-{{$no}}" for="status">{{$data->status == "1" ? "Active" : "Inactive"}}</span>
                          </div></td>
                <td>
                  <form method="POST" action="{{route('admin-contract.destroy',$data)}}">
                    @csrf
                    @method('delete')
                    <a href="{{route('admin-contract.edit',$data)}}" class="btn btn-success btn-link" data-original-title="" title="">
                      <i class="material-icons d-inline">edit</i>
                      <div class="ripple-container"></div>
                      edit
                    </a>
                    <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this data?") }}') ? this.parentElement.submit() : ''">
                      <i class="material-icons d-inline">close</i>
                      <div class="ripple-container"></div>
                      delete
                    </button>

                  </form>
                </td>
              </tr>
              @php
                $no++;
              @endphp
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