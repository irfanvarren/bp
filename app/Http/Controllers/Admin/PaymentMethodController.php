<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentGateway;

class PaymentMethodController extends Controller
{
    public function payment_gateway(){
      $payment_user_id = "bot33401";
      $payment_password = "p@ssw0rd";
      $payment_signature = sha1(md5($payment_user_id.$payment_password));
      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://dev.faspay.co.id/cvr/100001/10',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'
      {
        "request": "Daftar Payment Channel",
        "merchant": "Best Partner",
        "merchant_id": "33401",
        "signature": "'.$payment_signature.'"
      }',
     ));
     $response = curl_exec($curl);
     curl_close($curl);
     if(!$response){
      abort(403,"Something Wrong");
     }
     $payment_gateways = json_decode($response)->payment_channel;
     foreach($payment_gateways as $payment_gateway){
     	$cek_payment_gateway = PaymentGateway::where('pg_code',$payment_gateway->pg_code)->first();
     	if($cek_payment_gateway){
     		$payment_gateway->transaction_fee = $cek_payment_gateway->transaction_fee;
     	}else{
        $payment_gateway->transaction_fee = 0;
      }
     }
    	return view('admin.payment-gateway.index',['payment_gateways' => $payment_gateways]);
    }

    public function edit_payment_gateway(Request $request){
      $pg_code = $request->pg_code;
      $pg_name = $request->pg_name;
      $payment_gateway = PaymentGateway::where('pg_code',$pg_code)->first();
      return view('admin.payment-gateway.edit',compact('payment_gateway','pg_code','pg_name'));
    }

    public function update_payment_gateway(Request $request){
      $pg_code = $request->pg_code;
      $payment_gateway = PaymentGateway::where('pg_code',$pg_code)->first();
      if($payment_gateway){
        $payment_gateway->update($request->all());
      }else{
        PaymentGateway::create($request->all());
      }
      return redirect('admin/payment-gateway');
    }
}
