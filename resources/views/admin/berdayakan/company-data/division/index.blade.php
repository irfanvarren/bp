@extends('layouts.app-auth', ['activePage' => 'divisions', 'titlePage' => __('Banner'),'activeMenu' => 'company-data'])
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
                <h4 class="card-title ">{{ __('divisions') }}</h4>
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
                      <th>Kode</th>
                      <th>
                          {{ __('Nama') }}
                      </th>
               
                    </thead>
                    <tbody>
                      @foreach($divisions as $data)
                        <tr>
                          <td>
                          ({{$data->KD}})
                          </td>
                          <td>  {{ $data->NAMA }} </td>
                      
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