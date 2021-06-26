@extends('layouts.app-auth', ['activePage' => 'data-pendaftaran','activeMenu' => 'demo-management', 'titlePage' => __('Pendaftaran Mahasiswa')])
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
                <h4 class="card-title ">{{ __('IELTS Registration') }}</h4>
                <p class="card-category"> {{ __('Here you can manage Ielts Registration') }}</p>
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
                        {{ __('No Kontak') }}
                      </th>
     				         	<th>
                        {{ __('Asal Sekolah / Jurusan') }}
                      </th>
                      <th>
                        {{ __('Jenis Kelamin') }}
                      </th>
                      <th>
                        {{ __('Program Studi') }}
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
                      @foreach($data_pendaftaran as $data)
                        <tr>
                          <td>{{$no++}}</td>
                          <td>
                            {{$data->nama }}
                          </td>
                          <td>
                            {{$data->no_kontak}}
                          </td>
                          <td>{{$data->asal_sekolah.'/'.$data->asal_jurusan}}</td>
                               <td>{{$data->jenis_kelamin}}</td>
                          <td>{{$data->program_studi}}</td>


                          <td>
                            {{ $data->created_at->format('d-m-Y H:i') }}
                          </td>
                          <td>{{$data->updated_at->format('d-m-Y H:i')}}</td>

                          <td>
                            <a rel="tooltip" class="btn btn-danger btn-link" href="{{url('/admin/data-pendaftaran-mahasiswa/').'/'.$data->id.'/details'}}" data-original-title="" title="">
                              <i class="material-icons">visibility</i> Details
                              <div class="ripple-container"></div>
                            </a>
          
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
@endsection
@push('js')
<script type="text/javascript">
$(document).ready( function () {
  $('#myTable').DataTable();
} );
</script>
@endpush
