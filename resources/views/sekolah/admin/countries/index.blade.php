@extends('layouts.app-auth', ['activePage' => 'countries', 'titlePage' => __('countries'),'activeMenu' => __('places-management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('countries') }}</h4>
                <p class="card-category"> {{ __('Here you can manage countries') }}</p>
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
                    <a href="{{ route('school-country.create') }}" class="btn btn-sm btn-primary">{{ __('Add Country') }}</a>
                  </div>
                </div>
                <div class="row">
                  <div class=col-md-12>

                    @foreach($alerts as $value)
                    @if($value['school'] || $value['column'] != "")
                      <div class="alert alert-danger">
 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="material-icons">close</i>
                </button>
                <span>
                  <b> {{$value['school']}} -</b> "column {{$value['column']}} is empty"</span>
              </div>
              @endif
                    @endforeach
                
              </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Name') }}
                      </th>
                      <th>
                        {{ __('Country Code') }}
                      </th>
                      <th>
                        {{ __('Currency Name') }}
                      </th>
                      <th>
                        {{__('Currency code')}}
                      </th>
                      <th>
                        {{__('Currency Symbol')}}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($countries as $country)
                        <tr>
                          <td>
                            {{ $country->name }}
                          </td>
                          <td>
                            {{ $country->cca2.', '.$country->cca3 }}
                          </td>
                          <td>
                            {{$country->currency_name}}
                          </td>
                          <td>
                            {{$country->currency_code}}
                            </td>
                          <td>
                            {{$country->currency_symbol}}
                          </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('school-country.destroy', $country) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('school-country.edit', $country) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this country?") }}') ? this.parentElement.submit() : ''">
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
                    {{ $countries->links() }}
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
