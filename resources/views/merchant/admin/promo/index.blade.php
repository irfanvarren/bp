@extends('layouts.app-auth', ['activePage' => 'promo', 'titlePage' => __('promo')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('promo') }}</h4>
                <p class="card-category"> {{ __('Here you can manage promo') }}</p>
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
                    <a href="{{ route('promo.create') }}" class="btn btn-sm btn-primary">{{ __('Add promo') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Nama Promo') }}
                      </th>
                      <th>
                        {{__('Gambar')}}
                      </th>
                      <th>
                        {{ __('Tanggal Berlaku') }}
                      </th>
                      <th>
                        {{ __('Potongan Persen') }}
                      </th>
                      <th>
                        {{__('Potongan Harga')}}
                      </th>
                      <th>
                        {{__('Jumlah Per User')}}
                      </th>
                      <th>
                        {{__('Jumlah Promo')}}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @if (empty($promo))
                        @php
                          $promo = "";
                        @endphp
                      @else
                      @foreach($promo as $promotions)
                        <tr>
                          <td>
                            {{$promotions->nama_promo}}
                          </td>
                          <td>
                              <img src="{{$promotions->lokasi_gambar}}" alt="" style="width:150px;">
                          </td>
                          <td>
                              {{$promotions->tgl_berlaku}}
                          </td>
                          <td>  {{$promotions->potongan_persen != "" ? $promotions->potongan_persen."%" : ""}}</td>
                        <td>  {{$promotions->potongan_harga}}</td>
                          <td>  {{$promotions->jlh_peruser}}</td>
                          <td>{{$promotions->jlh}}</td>
                          <td class="td-actions text-right">
                            @if ($promotions->id != auth()->id())
                              <form action="{{ route('promo.destroy', $promotions) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('promo.edit', $promotions) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this promo?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                            @else
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ url($default_route.'/profile') }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                      @endif
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
