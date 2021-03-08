@extends('layouts.app-auth', ['activePage' => 'products', 'titlePage' => __('Products')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('products') }}</h4>
                <p class="card-category"> {{ __('Here you can manage products') }}</p>
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
                    <a href="{{ route('mp.create') }}" class="btn btn-sm btn-primary">{{ __('Add product') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Nama Produk') }}
                      </th>
                      <th>
                        {{ __('Harga') }}
                      </th>
                      <th>
                        {{ __('Gambar') }}
                      </th>
                      <th>
                        {{__('Status')}}
                      </th>
                      <th>Created At</th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                        <tr>
                          <td>
                            {{ $product->nama_produk }}
                          </td>
                          <td>
                            {{ $product->harga }}
                          </td>
                          <td>
                            <img src="{{$product->lokasi_gambar}}" style="width:100px;" alt="">

                          </td>
                          <td>
                            @if ($product->status == 1)
                              {{"active"}}

                        @else
                            {{"not active"}}
                            @endif
                            </td>
                          <td>
                            {{ $product->created_at->format('Y-m-d') }}
                          </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('mp.destroy', $product) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('mp.edit', $product) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this product?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                          <!--    <a rel="tooltip" class="btn btn-success btn-link" href="{{ url($default_route.'/profile') }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>-->
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>
                <div class="row">
                    {{ $products->links() }}
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
