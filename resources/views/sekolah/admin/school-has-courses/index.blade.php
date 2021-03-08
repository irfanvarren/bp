@extends('layouts.app-auth', ['dashboard' => 'sekolah','activePage' => 'school-courses', 'titlePage' => __('School Courses'),'activeMenu' => __('school-management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('School Courses') }}</h4>
                <p class="card-category"> {{ __('Here you can manage School Courses') }}</p>
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
                <div class="table-responsive">
                  <table class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" id="myTable">
                    <thead class=" text-primary">
                      <th>{{__('No')}}</th>
                      <th>
                          {{ __('School') }}
                      </th>
                      <th>{{__('Course')}}</th>
                      <th>{{__('Details')}}</th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @php
                        $x=1;
                      @endphp

                      @foreach($schoolCourse as $value)
                        <tr>
                          <td>{{$x++}}</td>
                          <td>
                            {{ $value->school_name }}
                          </td>
                          <td>{{ $value->course_name }}</td>
                          <td>{!!$value->details!!}</td>
                          <td class="td-actions text-right">
                              <form action="{{ route('school-has-course.destroy', $value) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('school-has-course.edit', $value->school_id.'-'.$value->course_id) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this course?") }}') ? this.parentElement.submit() : ''">
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
