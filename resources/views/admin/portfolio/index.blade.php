  @extends('layouts.app-auth', ['activePage' => 'portfolio','activeMenu' => 'data-management', 'titlePage' => __('portfolio')])
  @section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card" style="margin-bottom:50px;">
            <div class="card-header card-header-rose card-header-text">
              <div class="card-text">
                <h4 class="card-title">{{__('Add Portfolio')}}</h4>
              </div>
            </div>
            <div class="card-body">
              <form class="" action="{{ route('portfolio.create') }}" method="get">
                @csrf

                <div class="row">
                  <label class="col-sm-2 col-form-label text-center">{{ __('Karyawan') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('karyawan') ? ' has-danger' : '' }}">
                      <div class="dropdown bootstrap-select col-sm-12 pl-0 pr-0">

                        <select class="selectpicker col-sm-12 pl-0 pr-0" required data-style="select-with-transition" id="karyawan" name="karyawan">
                          <option value="">- Pilih Karyawan -</option>

                          @foreach($karyawan as $key => $value)
                          <option value="{{$value->ID_KARYAWAN}}"> {{$value->NAMA}}</option>
                          @endforeach
                        </select>

                      </div>

                      @if ($errors->has('karyawan'))
                      <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('karyawan') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="submit" class="btn  btn-primary" value="Add Portfolio">
                  </div>
                </div>
              </form>
            </div>

          </div>


          <div class="card" style="margin-bottom:50px;">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">{{ __('portfolio') }}</h4>
              <p class="card-category"> {{ __('Here you can manage portfolio') }}</p>
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
              @csrf
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      {{ __('Nama') }}
                    </th>
                    <th>
                      {{ __('Alamat') }}
                    </th>
                    <th>
                      {{ __('Agama') }}
                    </th>
                    <th>
                      {{__('Jenis Kelamin')}}
                    </th>
                    <th>
                      {{__('Tanggal Lahir')}}
                    </th>

                    <th class="text-center">
                      {{ __('Actions') }}
                    </th>
                  </thead>
                  <tbody>
                    @foreach($data_portfolio as $portfolio)
                    <tr>
                      <td>
                        {{ $portfolio->NAMA}} 
                      </td>
                      <td>
                        {{ ucwords($portfolio->ALAMAT) }}
                      </td>
                      <td>{{$portfolio->AGAMA}}</td>
                      <td>{{$portfolio->JK}}</td>
                      <td>{{$portfolio->TGL_LAHIR}}</td>

                      <td>
                        <form action="{{ route('portfolio.destroy', $portfolio) }}" method="post">
                          
                          @csrf
                          @method('delete')
                          <a class="btn btn-primary btn-link" href="{{url('portfolio/'.$portfolio->NAMA_JABATAN.'/'.$portfolio->NAMA)}}" data-original-title="" title="">Link Portfolio</a>
                          | <a href="{{url('portfolio/'.$portfolio->NAMA_JABATAN.'/'.$portfolio->NAMA.'/print')}}">Print</a>
                          <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('portfolio.edit', $portfolio) }}" data-original-title="" title="">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                          </a>
                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this portfolio?") }}') ? this.parentElement.submit() : ''">
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
                {{ $data_portfolio->links() }}
              </div>
            </div>
          </div>

          <div class="card" style="margin-bottom:50px;">
            <div class="card-header card-header-rose card-header-text">
              <div class="card-text">
                <h4 class="card-title">{{__('Add Portfolio FMA')}}</h4>
              </div>
            </div>
            <div class="card-body">
              <form class="" action="{{ route('portfolio.create') }}" method="get">
                @csrf

                <div class="row">
                  <label class="col-sm-2 col-form-label text-center">{{ __('Nama FMA') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('executive') ? ' has-danger' : '' }}">
                      <div class="dropdown bootstrap-select col-sm-12 pl-0 pr-0">

                        <select class="selectpicker col-sm-12 pl-0 pr-0" required data-style="select-with-transition" id="karyawan" name="karyawan">
                          <option value="">- Pilih FMA -</option>

                          @foreach($sales as $key => $value)
                          <option value="{{$value->KD}}"> {{$value->NAMA}}</option>
                          @endforeach
                        </select>
                        <input type="hidden" name="role" value="sales">
                      </div>

                      @if ($errors->has('sales'))
                      <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('sales') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="submit" class="btn  btn-primary" value="Add Portfolio">
                  </div>
                </div>
              </form>
            </div>

          </div>  

          <div class="card" style="margin-bottom:50px;">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">{{ __('Portfolio FMA') }}</h4>
              <p class="card-category"> {{ __('Here you can manage executive portfolio') }}</p>
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
              @csrf
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      {{ __('Nama') }}
                    </th>
                    <th>
                      {{ __('Alamat') }}
                    </th>
                    <th>
                      {{ __('Agama') }}
                    </th>
                    <th>
                      {{__('Jenis Kelamin')}}
                    </th>
                    <th>
                      {{__('Tanggal Lahir')}}
                    </th>

                    <th class="text-center">
                      {{ __('Actions') }}
                    </th>
                  </thead>
                  <tbody>
                    @foreach($data_portfolio_fma as $portfolio)
                    <tr>
                      <td>
                        {{ $portfolio->NAMA}}
                      </td>
                      <td>
                        {{ ucwords($portfolio->ALAMAT) }}
                      </td>
                      <td>{{$portfolio->AGAMA}}</td>
                      <td>{{$portfolio->JK}}</td>
                      <td>{{$portfolio->TGL_LAHIR}}</td>

                      <td>
                        <form action="{{ route('portfolio.destroy', $portfolio) }}" method="post">
                          @csrf
                          @method('delete')

                          <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('portfolio.edit', $portfolio)."?role=sales" }}" data-original-title="" title="">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                          </a>
                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this portfolio?") }}') ? this.parentElement.submit() : ''">
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
                {{ $data_portfolio2->links() }}
              </div>
            </div>

          </div>

          <div class="card" style="margin-bottom:50px;">
            <div class="card-header card-header-rose card-header-text">
              <div class="card-text">
                <h4 class="card-title">{{__('Add Portfolio Executive')}}</h4>
              </div>
            </div>
            <div class="card-body">
              <form class="" action="{{ route('portfolio.create') }}" method="get">
                @csrf

                <div class="row">
                  <label class="col-sm-2 col-form-label text-center">{{ __('Executive') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('executive') ? ' has-danger' : '' }}">
                      <div class="dropdown bootstrap-select col-sm-12 pl-0 pr-0">

                        <select class="selectpicker col-sm-12 pl-0 pr-0" required data-style="select-with-transition" id="karyawan" name="karyawan">
                          <option value="">- Pilih Executive -</option>

                          @foreach($executive as $key => $value)
                          <option value="{{$value->ID_KARYAWAN}}"> {{$value->NAMA}}</option>
                          @endforeach
                        </select>
                        <input type="hidden" name="role" value="executive">
                      </div>

                      @if ($errors->has('executive'))
                      <span id="harga-error" class="error text-danger" for="input-title">{{ $errors->first('executive') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="submit" class="btn  btn-primary" value="Add Portfolio">
                  </div>
                </div>
              </form>
            </div>

          </div>

          <div class="card" style="margin-bottom:50px;">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">{{ __('portfolio executive') }}</h4>
              <p class="card-category"> {{ __('Here you can manage executive portfolio') }}</p>
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
              @csrf
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      {{ __('Nama') }}
                    </th>
                    <th>
                      {{ __('Alamat') }}
                    </th>
                    <th>
                      {{ __('Agama') }}
                    </th>
                    <th>
                      {{__('Jenis Kelamin')}}
                    </th>
                    <th>
                      {{__('Tanggal Lahir')}}
                    </th>

                    <th class="text-center">
                      {{ __('Actions') }}
                    </th>
                  </thead>
                  <tbody>
                    @foreach($data_portfolio2 as $portfolio)
                    <tr>
                      <td>
                        {{ $portfolio->NAMA}}
                      </td>
                      <td>
                        {{ ucwords($portfolio->ALAMAT) }}
                      </td>
                      <td>{{$portfolio->AGAMA}}</td>
                      <td>{{$portfolio->JK}}</td>
                      <td>{{$portfolio->TGL_LAHIR}}</td>

                      <td>
                        <form action="{{ route('portfolio.destroy', $portfolio) }}" method="post">
                          @csrf
                          @method('delete')

                          <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('portfolio.edit', $portfolio)."?role=executive" }}" data-original-title="" title="">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                          </a>
                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this portfolio?") }}') ? this.parentElement.submit() : ''">
                            <i class="material-icons">close</i>
                            <div class="ripple-container"></div>
                          </button>
                        </form>
                      </td>
                <!--   <td class="td-actions text-right">
                              <form action="{{ route('mp.destroy', $portfolio) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('mp.edit', $portfolio) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this portfolio?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                         <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('admin'.'/profile') }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                            </td>-->
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    </div>
                    <div class="row">
                      {{ $data_portfolio2->links() }}
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
