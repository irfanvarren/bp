@extends('layouts.app', ['activePage' => 'toefl-regis','activeMenu' => 'data-management', 'titlePage' => __('toefl Registration')])
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
.table{
  font-size:14px;
}
.table th,.table td{
  padding:6px 8px;
}
</style>
<!-- nama tgl lahir tempat lahir pekerjaan sektor pekerjaan modul toefl tgl toefl  -->
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
                <h4 class="card-title ">{{ __('TOEFL Registration') }}</h4>
                <p class="card-category"> {{ __('Here you can manage toefl Registration') }}</p>
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
              <!--<div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('admin-news.create') }}" class="btn btn-sm btn-primary">{{ __('Add News') }}</a>
                  </div>
                </div>-->
                @csrf
                <div class="table-responsive">
                  <table class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" id="myTable">
                    <colgroup>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    </colgroup>
                    <thead class=" text-primary">
                      <th>
                        {{__('No')}}
                      </th>
                      <th>
                        {{__('Nama')}}
                      </th>
                      <th>
                        {{ __('Gender') }}
                      </th>

                      <th>
                        {{ __('No Telepon') }}
                      </th>

                      <th>
                        {{ __('Email') }}
                      </th>
                      <th>
                        {{ __('Alamat') }}
                      </th>
                      <th>
                        {{ __('Alasan toefl') }}
                      </th>

                      <th>
                        {{__('Created At')}}
                      </th>
                      <th>
                        {{__('Updated At')}}
                      </th>

                     <th class="text-center">
                        {{ __('Actions') }}
                      </th>
                    </thead>

                    <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach($toefl_registration as $data)
                        <tr>
                          <td>{{$no++}}</td>
                          <td>  
                            {{ $data->TITLE.'. '.$data->NAMA }}
                          </td>
                          <td>
                            {{$data->GENDER}}
                          </td>
                          <td>{{$data->KONTAK}}</td>
                          <td>{{$data->EMAIL}}</td>
                                <td>{{$data->ALAMAT}}</td>
                          <td>{{$data->ALASAN}}</td>


                          <td>
                            {{ $data->created_at->format('d-m-Y H:i') }}
                          </td>
                          <td>{{$data->updated_at->format('d-m-Y H:i')}}</td>

                          <td>
                            <a rel="tooltip" class="btn btn-danger btn-link" href="{{ route('admin-toeflregis.toefl_regis_preview', $data->id) }}" data-original-title="" title="">
                              <i class="material-icons">visibility</i> Details
                              <div class="ripple-container"></div>
                            </a>
                          <!--  <form action="{{ route('admin-news.destroy', $data) }}" method="post">
                                @csrf
                                @method('delete')

                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('admin-news.edit', $data) }}" data-original-title="" title="">
                                  <i class="material-icons">edit</i>
                                  <div class="ripple-container"></div>
                                </a>
                                <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this news?") }}') ? this.parentElement.submit() : ''">
                                    <i class="material-icons">close</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </form>-->
                        </td>
                            <!--   <td class="td-actions text-right">
                              <form action="{{ route('mp.destroy', $data) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('mp.edit', $data) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this news?") }}') ? this.parentElement.submit() : ''">
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
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
<script type="text/javascript">
$(document).ready( function () {
  $('#myTable').DataTable();
} );
</script>
@endpush
