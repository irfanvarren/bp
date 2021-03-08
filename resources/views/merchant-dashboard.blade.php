@extends('layouts.app-auth', ['activePage' => 'dashboard','activeMenu' => '', 'titlePage' => __('Dashboard')])

@if($dashboard == 'admin')

@else
@if(!isset($activeMenu))
  @php $activeMenu = ''; @endphp
@endif
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">person</i>
              </div>
              <p class="card-category">Jumlah Member</p>
              <h3 class="card-title">{{count($jlh_user)}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">person</i> Jumlah member yang menggunakan promo
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-9 col-md-12">
          <div class="card">
            <div class="card-header card-header-rose">
              <h4 class="card-title">Promo History</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-rose">
                  <th>No</th>
                  <th>Nama Member</th>
                  <th>Nama Promo</th>
                  <th>Jumlah Terclaim</th>
                  <th>Sisa</th>

                </thead>
                <tbody>

                  @foreach ($promoHistory as $key => $value)


                  <tr>
                    <td>{{$key+=1}}</td>
                    <td>{{$value->nama_student}}</td>
                    <td>
                      @if(isset($value->kode_promo))
                      {{$value->nama_promo.' ('.$value->kode_promo.')'}}
                    @else
                        {{$value->nama_promo}}
                    @endif
                    </td>
                    <td>{{$value->jlh}}</td>
                    <td>{{$value->jlh_peruser - $value->jlh}}</td>

                  </tr>
        @endforeach
                </tbody>
              </table>
              {{$promoHistory->links()}}
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection


@endif
