@extends('layouts.app-auth', ['activePage' => 'regions', 'titlePage' => __('regions'),'activeMenu' => __('places-management')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('regions') }}</h4>
                <p class="card-category"> {{ __('Here you can manage regions') }}</p>
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
                    <a href="{{ route('school-region.create') }}" class="btn btn-sm btn-primary">{{ __('Add region') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-no-bordered table-hover datatable mdl-data-table dataTable dtr-inline collapsed" id="dataTable">
                    <thead class=" text-primary">
                      <th>No</th>
                      <th>
                          {{ __('Name') }}
                      </th>
                      <th>
                        {{ __('Region Code') }}
                      </th>
                      <th>
                        {{ __('Country Name') }}
                      </th>

                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>

                      @foreach($regions as $key => $region)
                        <tr>
                          <td>{{$key += 1}}</td>
                          <td>
                            {{ $region->name }}
                          </td>
                          <td>
                            {{ $region->code }}
                          </td>

                          <td>
                            {{$region->country_name}}
                            </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('school-region.destroy', $region) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('school-region.edit', $region) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this region?") }}') ? this.parentElement.submit() : ''">
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
  
 var table = $('.datatable').DataTable({
  responsive:false
 });
</script>
 @endpush