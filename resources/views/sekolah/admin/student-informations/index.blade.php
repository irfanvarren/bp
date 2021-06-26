@extends('layouts.app-auth', ['activePage' => 'student-informations', 'titlePage' => __('student-informations'),'activeMenu' => __('places-management')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Student Informations') }}</h4>
            <p class="card-category"> {{ __('Here you can manage student information') }}</p>
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
                <a href="{{ route('school-student-informations.create') }}" class="btn btn-sm btn-primary">{{ __('Add Student Informations') }}</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-no-bordered table-hover datatable mdl-data-table dataTable dtr-inline collapsed">
                <thead class=" text-primary">
                  <th>
                    {{ __('Name') }}
                  </th>
                  <th>
                    {{ __('Visa End Date') }}
                  </th>
                  <th>
                    {{ __('Current Course') }}
                  </th>
                  <th>
                    {{__('Client Id')}}
                  </th>
                  <th>
                    {{__('Status')}}
                  </th>
                  <th class="text-right">
                    {{ __('Actions') }}
                  </th>
                </thead>
                <tbody>
                  @foreach($students as $student)
                 <tr>
                  <td>{{$student->nama}}</td> 
                  <td>{{$student->visa_end_date}}</td> 
                  <td>{{$student->current_course}}</td>
                  <td>{{$student->client_id}}</td>
                  <td>{{$student->status}}</td>
                  <td>Edit | Delete</td>
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
@push('more-script')
<script type="text/javascript">
  var table = $('.datatable').DataTable({
    responsive:false,
    stateSave: true,
  });
  
</script>
@endpush
