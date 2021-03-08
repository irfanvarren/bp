@extends('layouts.app-auth', ['dashboard' => 'tutor','activePage' => '
s', 'titlePage' => __('Test results'),'activeMenu' => 'content-management'])
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

table tr th{
  font-size:13px !important;
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
                <h4 class="card-title ">{{ __('Test Results') }}</h4>
                <p class="card-category"> {{ __('Here you can manage test results') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" value-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
              <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('ot-test.create') }}" class="btn btn-sm btn-primary">{{ __('Add test') }}</a>
                  </div>
                </div>
                @csrf
                <div class="table-responsive">
                  <table class="table" style="font-size:13px;">
                    <colgroup>
                      <col>
                      <col>
                      <col>
                      <col>
                    </colgroup>
                    <thead class="text-primary">
                      <th>id</th>
                      <th>{{__('Name')}}</th>
                      <th>{{__('Email')}}</th>
                      <th>{{__('Total Score')}}</th>
                      <th>
                        {{ __('Status') }}
                    </th>

                      <th class="text-center">
                        {{__('Action')}}
                      </th>
                    </thead>
                    <tbody>
                      @if(isset($test_results))
                      @foreach($test_results as $value)
                        <tr>
                          <td>
                            {{ $value->test_name }} - {{ $value->module_name == "-" ? "Without Module" : $value->module_name }} - {{ $value->package_name }}
                          </td>
                          <td>

                            {{$value->NAMA}}
                          </td>
                          <td>
                            {{$value->EMAIL}}
                          </td>
                          <td>
                            
                          </td>
                          <td></td>

                          <td class="text-center">
                            <a href="{{url('tutor-admin/test-results/details',$value)}}">Details</a>
                            <!--  <form action="{{ route('ot-test.destroy', $value) }}" method="post">
                                @csrf
                                @method('delete')

                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('ot-test.edit', $value) }}" value-original-title="" title="">
                                  <i class="material-icons">edit</i>
                                  <div class="ripple-container"></div>
                                </a>
                              <button type="button" class="btn btn-danger btn-link" value-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this test?") }}') ? this.parentElement.submit() : ''">
                                    <i class="material-icons">close</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </form>-->
                        </td>
                          
                        </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>

                </div>
                <div class="row">
                  @if(isset($test_results))
                    {{ $test_results->links() }}
                    @endif
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
