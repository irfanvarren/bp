@extends('layouts.app-auth', ['activePage' => 'rules', 'titlePage' => __('Banner'),'activeMenu' => 'company-data'])
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
                <h4 class="card-title ">{{ __('Company Rules') }}</h4>
                <p class="card-category"> {{ __('Here you can manage company rules') }}</p>
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
                    <a href="{{ route('admin-berdayakan-rule.create') }}" class="btn btn-sm btn-primary">{{ __('Add Rule') }}</a>
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
                      <th>Category</th>
                      <th>
                        {{ __('Rule Preview') }}
                      </th>
                      <th>
                        {{ __('Rule') }}
                    </th>
                    <th>Actions</th>
                 
                    </thead>
                    <tbody>
                      @foreach($rules as $data)
                        <tr>
                          <td>{{$data->category_name}}</td>
                          
                          <td>
                            <div style="max-height: 300px;overflow: auto">
                              {!!$data->rule_preview!!}
                            
                            </div>
                            
                          </td>

                          <td>
                            <div style="max-height: 300px;overflow: auto">
                                {!!$data->rule!!}
                              </div>
                          </td>
                          <td>
                              <form method="POST" action="{{route('admin-berdayakan-rule.destroy',$data)}}">
                          @csrf
                          @method('delete')
                        <a href="{{route('admin-berdayakan-rule.edit',$data)}}" class="btn btn-success btn-link" data-original-title="" title="">
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