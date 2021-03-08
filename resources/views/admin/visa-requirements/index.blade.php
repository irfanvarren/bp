@extends('layouts.app-auth', ['activePage' => 'visa-requirements', 'titlePage' => __('Visa Requirements'),'activeMenu' => 'data-management'])

@section('content')
<div class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Visa Requirements') }}</h4> 
            <p class="card-category"> {{ __('Here you can manage visa-requirements') }}</p>
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
              <div class="col-6">
                <a href="{{ route('visa-requirements.index') }}" class="btn btn-sm btn-primary">{{ __('Select Visa Type') }}</a>
              </div>
              <div class="col-6 text-right">
                <a href="{{ route('visa-requirements.create') }}?type={{$type}}" class="btn btn-sm btn-primary">{{ __('Add visa Requirements') }}</a>
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
                  <col>
                </colgroup>
                <thead class=" text-primary">
                  <th>
                    {{ __('Name') }}
                  </th>
                  <th>
                    {{ __('Content') }}
                  </th>
                  <th>{{__('Country')}}</th>
                  <th>{{ __('Preview Link') }}</th>
                  <th class="text-center">
                    {{ __('Actions') }}
                  </th>
                </thead>
                <tbody>
                  @foreach($visaRequirements as $visaRequirement)
                  <tr>
                    <td>
                      {{ $visaRequirement->name }}
                    </td>
                    <td>
                      {!! $visaRequirement->content !!}
                    </td>
                    <td>{{$visaRequirement->country_name}}</td>
                    <td> <a href="{{url('visa-requirements/'.strtolower($visaRequirement->country_code))}}" target="_blank">Link</a> </td>
                    <td class="text-center">
                      <form action="{{ route('visa-requirements.destroy', $visaRequirement) }}?type={{$type}}" method="post">
                        @csrf
                        @method('delete')
                        
                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('visa-requirements.edit', $visaRequirement) }}?type={{$type}}" data-original-title="" title="">
                          <i class="material-icons">edit</i>
                          <div class="ripple-container"></div>
                        </a>
                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this item?") }}') ? this.parentElement.submit() : ''">
                          <i class="material-icons">close</i>
                          <div class="ripple-container"></div>
                        </button>
                      </form>
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              
            </div>
            <div class="row">
              {{ $visaRequirements->appends(request()->input())->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
<script>
  var visa_type;
  function select_visa_type(type){
    visa_type =  type;
    $('#Modal').modal('hide');
  }
  $(document).ready(function(){
    $('#Modal').modal('show');
  });
</script>
@endpush
