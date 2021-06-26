@extends('layouts.app', ['dashboard' => 'sekolah','activePage' => 'education-sectors', 'titlePage' => __('education-sectors'),'activeMenu' => __('places-management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Education Sectors') }}</h4>
                <p class="card-category"> {{ __('Here you can manage education sectors') }}</p>
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
                    <a href="{{ route('school-education-sector.create') }}" class="btn btn-sm btn-primary">{{ __('Add Education Sector') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" id="myTable">
                    <thead class=" text-primary">
                      <th>{{__('No')}}</th>
                      <th>
                          {{ __('Name') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @php
                        $x=1;
                      @endphp
                      @foreach($education_sectors as $education_sector)
                        <tr>
                          <td>{{$x++}}</td>
                          <td>
                            {{ $education_sector->name }}
                          </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('school-education-sector.destroy', $education_sector) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('school-education-sector.edit', $education_sector) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this education-sector?") }}') ? this.parentElement.submit() : ''">
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
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
  </script>
@endpush
