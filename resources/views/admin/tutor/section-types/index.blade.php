@extends('layouts.app-auth', ['dashboard' => 'tutor','activePage' => 'section-types', 'titlePage' => __('section-typess'),'activeMenu' => 'content-management'])
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
                <h4 class="card-title ">{{ __('Section Types') }}</h4>
                <p class="card-category"> {{ __('Here you can manage Section types') }}</p>
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
                    <a href="{{ route('ot-section-type.create') }}" class="btn btn-sm btn-primary">{{ __('Add section-types') }}</a>
                  </div>
                </div>
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
                      <!--<th>{{__('Test Name')}}</th>
                      <th>{{__('Module Name')}}</th>
                      <th>{{__('Package Name')}}</th>-->
                      <th>
                        {{ __('Section Type Name') }}
                      </th>


                      <th class="text-center">
                        {{__('Action')}}
                      </th>
                    </thead>
                    <tbody>
                      @if(isset($sectionTypes))
                      @foreach($sectionTypes as $value)
                        <tr>
                          <!--<td>{{$value->test_name}}</td>
                          <td>{{$value->module_name == '-' ? 'Without Module' : $value->module_name}}</td>
                          <td>{{$value->package_name}}</td>-->
                          <td>
                            {{ $value->name == '-' ? 'Without Section Types' : $value->name}}
                          </td>
                        


                          <td class="text-center">
                            <form action="{{ route('ot-section-type.destroy', $value) }}" method="post">
                                @csrf
                                @method('delete')

                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('ot-section-type.edit', $value) }}" value-original-title="" title="">
                                  <i class="material-icons">edit</i>
                                  <div class="ripple-container"></div>
                                </a>
                                <button type="button" class="btn btn-danger btn-link" value-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this section-types?") }}') ? this.parentElement.submit() : ''">
                                    <i class="material-icons">close</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </form>
                        </td>
                      @endforeach
                      @endif
                    </tbody>
                  </table>

                </div>
                <div class="row">
                  @if(isset($sectionTypes))
                    {{ $sectionTypes->links() }}
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
