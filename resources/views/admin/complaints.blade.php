@extends('layouts.app-auth', ['activePage' => 'complaints','activeMenu' => 'data-management', 'titlePage' => __('Complaints')])
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
                <h4 class="card-title ">{{ __('complaint') }}</h4>
                <p class="card-category"> {{ __('Here you can manage complaint') }}</p>
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
                        {{ __('Email') }}
                      </th>

                      <th>
                        {{ __('No Telepon') }}
                      </th>
                      <th>
                        {{ __('Perihal') }}
                      </th>
                      <th>
                        {{ __('Detail Komplain')}}
                      </th>
                      <th>
                        {{__('Tanggal Komplain')}}
                      </th>
                      <th>{{__('Saran')}}</th>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach($complaints as $data)
                        <tr>
                          <td>{{$no++}}</td>
                          <td>{{$data->name != "" ? $data->name : 'Anonim'}}</td>
                          <td>
                            {{$data->email}}
                          </td>
                          <td>{{$data->phone_number}}</td>
                          <td>{{$data->complaint_about}}</td>
                          <td>{{$data->complaint_detail}}</td>
                          <td>{{$data->complaint_date}}</td>
                          <td>{{$data->suggestion}}</td>
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
