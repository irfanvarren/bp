@extends('layouts.app-auth', ['activePage' => 'events','activeMenu' => 'data-management', 'titlePage' => __('Events')])
@push('head-js')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
@endpush
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{route('admin-events.store')}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Add Events') }}</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{route('admin-events.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Event Type') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Type') }}" value="{{ old('name') }}" required />
                                        @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger" for="input-title">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Products') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('products') ? ' has-danger' : '' }}">
                                        <select class="selectize form-control">
                                            <option value="">- Select Product -</option>
                                            @foreach($products as $product)
                                            <option value="{{$product->KD}}">{{$product->NAMA}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('products'))
                                        <span id="products-error" class="error text-danger" for="input-title">{{ $errors->first('products') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Add Events') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script type="text/javascript" src="{{asset('js/selectize.js')}}"></script>
<script type="text/javascript">
  $('.selectize').selectize({
    width : 'resolve'
});

</script>
@endpush
