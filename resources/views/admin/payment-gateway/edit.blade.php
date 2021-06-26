@extends('layouts.app-auth', ['activePage' => 'cms.banner', 'titlePage' => __('Banner'),'activeMenu' => 'home-management'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="{{route('admin.payment-gateway.update',$pg_code)}}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
          @csrf
          @method('put')
          <div class="card ">
            <div class="card-header card-header-primary">
              <h4 class="card-title">{{ __('Edit Payment Gateway') }}</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="{{route('admin.payment-gateway') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                </div>
              </div>
               <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Payment Gateway Code') }}</label>
                <div class="col-sm-7">
                  <input type="hidden" name="pg_code" value="{{$pg_code}}">
                  <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                    <div class="form-control">{{$pg_code}}</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Payment Gateway Name') }}</label>
                <div class="col-sm-7">
                  <input type="hidden" name="pg_name" value="{{$pg_name}}">
                  <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                    <div class="form-control">{{$pg_name}}</div>
                  </div>
                </div>
              </div>
                <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Transaction Fee') }}</label>
                <div class="col-sm-7">
                  <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                    <input type="text" class="form-control" id="transaction_fee" name="transaction_fee" value="{{$payment_gateway != '' ? $payment_gateway->transaction_fee : ''}}">
                    @if ($errors->has('transaction_fee'))
                    <span id="harga-error" class="error transaction_fee-danger" for="input-transaction_fee">{{ $errors->first('transaction_fee') }}</span>
                    @endif
                  </div>
                </div>
              </div>

            </div>
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">{{ __('Edit Payment Gateway') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@push('js')
<script type="text/javascript">
var transaction_fee = document.getElementById('transaction_fee');
var last_input = "";
transaction_fee.addEventListener('keyup',function(e){
var key =  e.keyCode || e.charCode;
console.log(e);
if(key != null){
  if(isNaN(e.key)){
      if(!((e.shiftKey && key == 187) || (!e.shiftKey && key == 189) || (e.shiftKey && key == 56) || (!e.shiftKey && key == 191) || key == 53 || key == 8 || key == 9 || key == 16 || key == 17 || key == 116 || (!e.shiftKey && key == 190))){
        transaction_fee.value = last_input;
        alert("Please input number and math equation only (+, -, *, /, %) !");
        return false;
      }
      last_input = transaction_fee.value;         
      
  }
}else{
  alert("Please input number and math equation only (+, - , *, /, %) !");
  transaction_fee.value = last_input;
}

});
</script>
@endpush
