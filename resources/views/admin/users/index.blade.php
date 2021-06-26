@extends('layouts.app-auth', ['activePage' => 'users', 'titlePage' => __('Users'),'activeMenu' => 'users-management'])
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
  .deleted-row{
    background-color:#888 !important;
    color:#dedede;
    cursor:not-allowed;
  }
</style>
@section('content')
@php
/*
"red" : "#d50000",
"pink" : "#f50057",
"purple" : "#aa00ff",
"deep purple" : "#6200ea",
"indigo" : "#304ffe",
"blue" : "#2979ff",
"light blue" : "#00b0ff",
"cyan" : "#00b8d4",
"teal" : "#00bfa5",
"green" : "#00c853",
"light green" : "#64dd17",
"lime" : "#aeea00",
"yellow" : "#ffd600",
"amber" : "#ffab00",
"orange" : "#ff6d00",
"deep orange" : "#dd2c00"

*/
$colors = array('1' => '#ff6d00','2' => '#00b0ff','3' => '#304ffe','4' => '#00bfa5','5' => '#263238','6' => '#f50057','7' => '#aa00ff');
@endphp
<div class="loading-wrapper">
  <img src="{{asset('/img/loading.gif')}}" alt="">
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{ __('Users') }}</h4>
            <p class="card-category"> {{ __('Here you can manage Users') }}</p>
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
                <a href="{{ route('admin-users.create') }}" class="btn btn-sm btn-primary">{{ __('Add Users') }}</a>
              </div>
            </div>
            @csrf
            <div class="table-responsive">
              <table class="table table-striped table-no-bordered table-hover dataTable no-footer dtr-inline" id="myTable">
                <colgroup>
                  <col width="20%">
                  <col>
                  <col>
                  <col>
                  <col>
                </colgroup>
                <thead class=" text-primary">
                  <th>
                    {{ __('Nama') }}
                  </th>
                  <th>
                    {{ __('User Data') }}
                  </th>
                  <th>{{__('Membership')}}</th>
                  <th>Member's Balance</th>
                  <th>Paid Transaction </th>


                  <!-- <th>Permissions</th> -->
                  <th class="text-center">
                    {{ __('Actions') }}
                  </th>
                </thead>
                <tbody>
                  @foreach($users as $data)
                  <tr @if($data->deleted_at != "") class="deleted-row" title="deleted user" @endif>
                    <td>
                      {{ $data->name }}
                    </td>
                    <td>
                      <div>
                        
                        @if(!empty($data->username))
                        <div>Username : {{ $data->username }}</div>
                        @else
                        <div>Username : {{"default"}}</div>
                        @endif

                        @if($data->employee_id != "")
                        <div>Employee Id : {{$data->employee_id}}</div>
                        @endif

                        @if($data->kd_student != "")
                        <div>Student Id : {{$data->kd_student}}</div>
                        @endif
                      </div>
                      <div>Email :  {{ $data->email }}</div>
                      <div>No. Telepon :  {{ $data->no_telepon }}</div>
                      <div>
                       @if(count($data->roles))
                       @foreach($data->roles as $role)
                       <span class="badge" style="background:{{isset($colors[$role->id]) ? $colors[$role->id] : 'black'}};">{{$role->name}}</span>
                       @endforeach
                       @else
                       <span class="badge" style="background:#ffd600;color:black;">User</span>
                       @endif

                     </div>
                   </td>
                   <td>
                    {{$data->member_role()}}
                  </td>
                  <td>
                    <div>Rp.{{$data->member_balance()}}</div>
                    <a class="btn btn-sm btn-primary" href="{{url('admin/member-balance?user_id='.$data->id)}}">Add Balance</a>
                  </td>
                  <td>
                    Rp.{{number_format($data->total_transactions(),2,',','.')}}
                  </td>
                  <td class="text-center">
                    <form action="{{ route('admin-users.destroy', $data) }}" method="post">
                      @csrf
                      @method('delete')

                      <a rel="tooltip" class="btn btn-sm btn-success btn-link" href="{{ route('admin-users.edit', $data) }}" data-original-title="" title="">
                        <i class="material-icons">edit</i>
                        <div class="ripple-container"></div>
                        Edit User
                      </a>
                      <button type="button" {{$data->deleted_at != "" ? 'disabled' : ''}} class="btn btn-sm btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                        <i class="material-icons">close</i>
                        <div class="ripple-container"></div>
                        Delete User
                      </button>
                    </form>
                  </td>
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
    $('#myTable').DataTable({
      "paging":true
    });
  } );
</script>
@endpush
