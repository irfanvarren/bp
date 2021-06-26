<?php
namespace App\Http\Controllers\BP;
use App\User;
use App\RegisIeltsOfficial;
use App\Category;
use App\ContactUs;
use App\Level;
use App\CourseLevelSetting;
use App\Business;
use App\OfferLetterSetting;
use App\CoursePacket;
use App\CoursePacketDetail;
use App\CoursePacketSetting;
use App\CourseEvent;
use App\Complaint;
use App\TempCoursePacket;
use App\Events;
use App\EventsBerdayakan;
use App\EventsType;
use App\EventsLogo;
use App\EventsGuestBook;
use App\EventsArticle;
use App\EventVideo;
use App\EventBrochure;
use App\EventPhoto;
use App\EventExhibitor;
use App\EventLobby;
use App\Enquiry;
use App\EnquiryDetail;
use App\Review;
use App\Portfolio;
use App\PortfolioDetail;
use App\PortfolioGallery;
use App\Recruitment;
use App\RecruitmentExperience;
use App\RecruitmentEducation;
use App\Internship;


use Carbon\Carbon;
use App\Merchant;
use App\News;
use App\Events\NewsView;  
use App\NewsType;
use App\PromoNews;
use App\JenjangBeasiswa;

use App\IeltsSimulationEvent;
use App\Language;
use App\PaketBimbel;
use App\ProductPriceList;
use App\PacketPriceDetails;
use App\Cart;
use App\CartItem;
use App\CartDebitPayment;
use App\CartPayment;
use App\CartDebitResponse;
use App\CartDebitCancellation;
use App\TransactionOfferLetter;
use App\PaymentNotification;
use App\PaymentGateway;
use MathParser\StdMathParser;
use MathParser\Interpreting\Evaluator;


use App\Testimony;
use App\Form\RegisPaket;
use App\Form\RegisPaketDtl;
use App\Form\RegisPaketDataWali;
use App\Form\RegisDocTranslate;
use App\Models\Admin\Cms\BannerModel;
use App\Models\Admin\Cms\PageContent;
use App\Models\Admin\Cms\PageContentType;

use App\CompanyStructure;
use App\CompanyRule;
use App\Perusahaan;
use App\Sales;
use App\Executive;
use App\Karyawan;
use App\Experience;
use App\Edubackground;
use App\OtherExperience;
use App\Certification;
use App\SK;
use App\Contract;
use App\JobDescription;
use App\Briefing;

use App\Pages;
use App\PageType;
use App\PageSubType;

use App\VisaRequirement;
use App\Country;
use App\Region;
use App\City;
use App\DemoPendaftaranMahasiswa;
use App\Models\Admin\FormBuilder\Form;
use App\Models\Admin\FormBuilder\FormDescription;
use App\Models\Admin\FormBuilder\FormCategory;
use App\Models\Admin\FormBuilder\FormQuestion;
use App\Models\Admin\FormBuilder\FormContent;
use App\Models\Admin\FormBuilder\FormOption;

use App\Models\OnlineTest\OtRegistration;
use App\Models\OnlineTest\OtModule;
use App\Models\OnlineTest\OtTest;
use App\Models\OnlineTest\OtTestSection;
use App\Models\OnlineTest\OtSectionType;

use App\Models\Reseller;
use App\Models\ResellerQuota;

use Auth;
use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Event;
use Symfony\Component\HttpFoundation\StreamedResponse;

use App\Mail\ContactUsMail;
use App\Mail\ContactUsReply;

use App\Mail\EnquiryMail;
use App\Mail\EnquiryFeedbackMail;

use App\Mail\FmaRegis;
use App\Mail\FmaRegisFeedback;
use App\Mail\OfferLetterMail;
use App\Mail\RegisIeltsOfficialMail;
use App\Mail\RegisIeltsOfficialPaymentsMail;
use App\Mail\RegisToeflOfficialMail;
use App\Mail\RegisToeflOfficialPaymentsMail;
use App\Mail\CareerApplicationMail;
use App\Mail\InternshipApplicationMail;
use App\Mail\DocTranslateMail;
use App\Mail\DocTranslateFeedback;
use App\Mail\TutorApplicationMail;
use App\Mail\RegisInfoSessionMail;
use App\Mail\TestimonyMail;
use App\Mail\SchoolInformation;
use App\Mail\VisaStatementMail;
use App\Mail\VisaStatementFeedback;
use App\Mail\EnglishRegistration;
use App\Mail\EnglishRegistrationPaymentMail;
use App\Mail\RegisIeltsSimulation;
use App\Mail\RegisToeflSimulation;
use App\Mail\IeltsSimulationEventsMail;
use App\Mail\GuestBookMail;
use App\Mail\TutorPerformanceMail;
use App\Mail\TaxClaimMail;
use App\Mail\WhvApplicationMail;
use App\Mail\UploadPaymentsReceiptMail;
use App\Mail\IeltsSimulationFeedback;
use App\Mail\IeltsQuestionnaire;
use App\Mail\ToeflQuestionnaire;
use App\Mail\ToeflSimulationFeedback;
use App\Mail\FormDataStudentMail;
use App\Mail\FormComplaintMail;
use App\Mail\FormJanjiTemuMail;
use App\Mail\DemoPendaftaranMahasiswaMail;
use App\Mail\FormDataVisaMail;
use App\Mail\FormStudyTourMail;
use App\Mail\OtRegistrationMail;
use App\Mail\SubscribeFeedbackMail;
use App\Mail\FormPindahSekolahAgencyMail;
use App\Mail\FormWebinarsGuestSpeakerMail;
use App\Mail\FormDesignWebinarsGuestSpeakerMail;
use App\Mail\FormDesignPromoMail;
use App\Mail\FormPermintaanPembuatanSuratMail;
use App\Mail\AutoReplyForm;
use App\Mail\DataForm;

use App\Models\Admin\JobVacancy;
use App\Models\Admin\JobCategory;

use App\Mail\RegisPTEAcademicOfficialMail;
use App\Mail\RegisPTEAcademicOfficialPaymentsMail;
use App\Mail\RegisPTEAcademicSimulationMail;
use App\Mail\RegisPTEAcademicSimulationPaymentsMail;

use App\Mail\ApproveOnlineTestNotification;

use PDF;

use Newsletter;

use Redirect;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
class WebController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function index()
    {
      $news = new News;
      $news = $news->where('status',1)->orderBy('id','Desc');
      $recent_news = $news->first();
      $news_right = $news->offset(1)->limit(2)->get();
      $news_bottom = $news->offset(3)->limit(3)->get();
      $banner = New BannerModel;
      $testimony = new Testimony;
      $promo_news = PromoNews::orderBy('id','DESC')->limit(4)->get();
      $footer = "";
      $contentType = PageContentType::where('name','Footer')->value('id');
      if($contentType != ""){
        $footer = PageContent::where('content_type', $contentType )->orderBy('id','DESC')->first();
      }
      $countries = Country::orderBy('name','ASC')->get();
      return view('home',['news' => $news->limit(3)->get(),'recent_news' => $recent_news,'news_right' => $news_right,'news_bottom' => $news_bottom,'banner' => $banner->get(),'testimony' => $testimony->where('status',1)->get(),'footer' => $footer,'promo_news' => $promo_news,'countries' => $countries]);
    }

    public function product_courses(Request $request){
      $product_key = $request->products;
      $course = CoursePacketSetting::where('slug',$product_key)->first();
      if($course){
        $id_course = $course->KD;
      }else{
        $id_course = "";
      }
      if(!$id_course){
        $course = CoursePacket::with(['prices' => function($query){
          return $query->selectRaw('tb_paket_bimbel_dtlharga.KD,tb_paket_bimbel_dtlharga.REF_PERUSAHAAN,tb_paket_bimbel_dtlharga.REF_KATEGORI,tb_paket_bimbel_dtlharga.REF_LEVEL,tb_paket_bimbel_dtlharga.REF_KATEGORI,tb_paket_bimbel_dtlharga.REF_PAKET,tb_paket_bimbel_dtlharga.HARGA_PAKET,tb_paket_bimbel_dtlharga.JUMLAH_JAM,tb_paket_bimbel_dtlharga.JUMLAH_PERTEMUAN,tb_level.NAMA as NAMA_LEVEL, tb_kategori.NAMA as NAMA_KATEGORI')->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->join('tb_kategori','tb_kategori.KD','tb_paket_bimbel_dtlharga.REF_KATEGORI')->leftJoin('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1);
        }])->leftJoin('course_packet_settings','course_packet_settings.KD','tb_paket_bimbel.KD')->find($product_key);
        $id_course = $course->KD;
      }else{
        $course = CoursePacket::with(['prices' => function($query){
          return $query->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->leftJoin('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1);
        }])->find($id_course);
      }
      $countries = Country::orderBy('name','ASC')->get();
      $url_paramater = array(
        'products' => $request->products,
        'languages' => $request->languages
      );
      return view('products.detail-product',compact('course','countries','url_paramater'));
    }



    public function daftar_payment_channel(){
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
     return $response;
   }

   public function filter_payment_channel($daftar_payment_channel){

    $splice_keys = $this->filter_payment_channel_keys($daftar_payment_channel);
    if($splice_keys){
      for($i = 0; $i < count($splice_keys);$i++){
        array_splice($daftar_payment_channel->payment_channel, $splice_keys[$i],1);
      }
    }
    return $daftar_payment_channel;
  }

  public function filter_payment_channel_keys($daftar_payment_channel){
    $splice_keys = array();
    $excluded_items = ["704"];
    if($daftar_payment_channel){
      foreach($daftar_payment_channel->payment_channel as $key => $channel){
        foreach($excluded_items as $excluded_item){
          if($channel->pg_code == $excluded_item){
            array_push($splice_keys,$key);
          }  
        }
      }
      return $splice_keys;
    }
  }

  public function post_billing_data(Request $request){
    if($request->msisdn != ""){
      $msisdn = str_replace('-', '', $request->msisdn);
      $msisdn = str_replace(' ', '',$msisdn);
      $msisdn = str_replace('+', '',$msisdn);
    }else{
      $phone_number = str_replace("-", "", $request->phone_number);
      $phone_number = str_replace('(', '',$phone_number);
      $phone_number = str_replace(')', '',$phone_number);
      $phone_number = str_replace(" ",'',$phone_number);
      if($phone_number != ""){
        if($phone_number[0] == "0"){
          $phone_number = substr($phone_number,1);
        }
        $msisdn = substr($request->phone_country,1).$phone_number;
      }else{
        return redirect()->back()->withStatus('Phone number empty');
      }
    }
    $bill_no = $request->bill_no;
    $payment_user_id = "bot33401";
    $payment_password = "p@ssw0rd";
    $payment_signature = sha1(md5($payment_user_id.$payment_password.$bill_no));
    $bill_reff = $bill_no;
    $bill_date = date("Y-m-d H:i:s");
    $bill_expired = new DateTime();
    $bill_expired->modify('+1 day');
    $bill_expired = $bill_expired->format('Y-m-d H:i:s');
    $merchant_id = $request->merchant_id;
    $cart = Cart::where('invoice_no',$bill_no)->first();
    $cart_id = $cart->id;
    $items = CartItem::selectRaw('tb_paket_bimbel.NAMA as product,cart_items.HARGA_PAKET*100 as amount,cart_items.qty as qty, "01" as payment_plan, "00" as tenor,"'.$merchant_id.'" as merchant_id')->join('tb_paket_bimbel','tb_paket_bimbel.KD','cart_items.REF_PAKET')->where('cart_id',$cart_id)->get();
    $subtotal = CartItem::selectRaw('SUM(HARGA_PAKET * qty) as subtotal')->where('cart_id',$cart_id)->value('subtotal');
    $bill_gross = $subtotal;
    $bill_tax = 0;
    $bill_miscfee = 0;
    $bill_total = $bill_gross - $bill_tax + $bill_miscfee;
    $payment_channel = $request->payment_channel;
    $cust_name = ucwords($request->cust_name);
    $email = $request->email;
    $address = $request->address;
    $city = ucwords($request->city);
    $region = ucwords($request->region);
    $country = $request->country;
    $poscode = $request->poscode;
    $api_data = '{"request": "Transmisi Info Detil Pembelian",
    "merchant": "Best Partner",
    "merchant_id": "33401",
    "bill_no": "'.$bill_no.'",
    "bill_reff" : "'.$bill_reff.'",
    "bill_date": "'.$bill_date.'",
    "bill_expired" : "'.$bill_expired.'",
    "bill_desc": "Pembayaran pendaftaran paket les / test #'.$bill_no.'",
    "bill_currency" : "IDR",
    "bill_gross" : "'.($bill_gross * 100).'",
    "bill_tax": "'.$bill_tax.'",
    "bill_miscfee" : "'.$bill_miscfee.'",
    "bill_total": "'.($bill_total * 100).'",
    "payment_channel" : "'.$payment_channel.'",
    "pay_type": "1",
    "cust_no" : "'.Auth::user()->id.'",
    "cust_name": "'.$cust_name.'",
    "msisdn" : "'.$msisdn.'",
    "email": "'.$email.'",
    "terminal" : "10",
    "billing_address": "'.$address.'",
    "billing_address_city" : "'.$city.'",
    "billing_address_region": "'.$region.'",
    "billing_address_poscode": "'.$poscode.'",
    "billing_address_country_code" : "'.$country.'",
    "receiver_name_for_shipping": "'.$cust_name.'",
    "shipping_address": "'.$address.'",
    "shipping_address_city" : "'.$city.'",
    "shipping_address_region": "'.$region.'",
    "shipping_address_poscode": "'.$poscode.'",
    "shipping_address_country_code" : "'.$country.'",
    "item" : '.json_encode($items).',
    "signature" : "'.$payment_signature.'"
  }';
  $cart_payment = new CartPayment();
  $method = "debit";
  $payment_transmission = $this->faspay_payment_transmission($method,$api_data,$cart_id);
  $api_response = $payment_transmission['response'];
  if($api_response){
    if($method=="debit"){
     $payment_debit = new CartDebitPayment();

     $api_data_obj = json_decode($api_data);
     foreach($api_data_obj as $key => $data_api){

      if(is_array($data_api)){
        $payment_debit[$key] = json_encode($data_api);
      }else{
        $payment_debit[$key] = $data_api;
      }
    }
    $payment_debit->cart_id = $cart_id;
    $payment_debit->save();

    $debit_response = new CartDebitResponse();
    $debit_response->payment_id = $payment_debit->id;
    foreach($api_response as $key => $response_data){
      if(is_array($response_data)){
        $debit_response[$key] = json_encode($response_data);
      }else{
        $debit_response[$key] = $response_data;
      }
    }
    $cart_payment->user_id = Auth::user()->id;
    $cart_payment->trx_id = $api_response->trx_id;
    $cart_payment->cart_id = $cart_id;

    $cart_payment->payment_id = $payment_debit->id;
    $cart_payment->payment_method = "debit";

    $debit_response->save();
    $cart_payment->save();
  }
}

$this->cart_next_process($cart);
$registration_data = [
  'name' => $cust_name,
  'email' => $email,
  'phone' => $msisdn, 
];
session()->put('registration_data',$registration_data);
return redirect()->route('registration-and-payment');
}


public function faspay_payment_transmission($method,$api_data,$cart_id,$payment_id = null){
  //response
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://dev.faspay.co.id/cvr/300011/10',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $api_data,
  ));
  $api_response = curl_exec($curl);
  curl_close($curl);
  $api_response = json_decode($api_response);
  if(isset($api_response->response_error)){
    abort(500);
  }
  $return_data = array();
  $return_data['response'] = $api_response;
  return $return_data;
}

public function post_offer_letter(Request $request){
 $cart = Cart::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->first();
 $kd = $cart->calonsiswa_kd;
 $path = "public/files/registration/".$kd;
 $encoded_image = explode(",",$request->signature)[1];
 $signature_path = $path."/offer-letter-signature.png";
 $signature = Storage::disk('local')->put($signature_path,base64_decode($encoded_image));
 $offer_letter = TransactionOfferLetter::where('user_id',auth()->user()->id)->where('cart_id',$cart->id)->first();
 $items = CartItem::selectRaw('cart_items.*,tb_paket_bimbel.NAMA as NAMA_PAKET')->where('cart_id',$cart->id)->join('tb_paket_bimbel','tb_paket_bimbel.KD','cart_items.REF_PAKET')->with('schedules')->with('intakes')->get();
 $registration_data = RegisPaket::where('KD',$cart->calonsiswa_kd)->first();
 $companies = Perusahaan::get();
 $pdf = PDF::loadview('products.letter-of-offer',['cart' => $cart,'cart_items' => $items, 'registration_data' => $registration_data,'companies' => $companies,'signature' => Storage::disk('local')->url($signature_path)]); 
 $pdf_content = view('products.letter-of-offer',['cart' => $cart,'cart_items' => $items, 'registration_data' => $registration_data,'companies' => $companies,'signature' => Storage::disk('local')->url($signature_path)])->render();
 $offer_letter->signature = $signature_path;
 $offer_letter->content = $pdf_content;
 $offer_letter->save();
 $email = RegisPaket::where('KD',$kd)->value('EMAIL');
 $request->merge(['email' => $email]);
 Mail::send(new OfferLetterMail($request,$pdf->output(),"Offer Letter Disetujui"));
 $this->cart_next_process($cart);
 return redirect('products/registration-and-payment');
}
public function cartEventStream(Request $request){
  if($request->header('accept') != "text/event-stream"){
    return redirect('/');
  }

  while(true){
    $cart = Cart::where('user_id',Auth::user()->id)->where('status',0)->first();
    if($cart){
      $items = CartItem::selectRaw('cart_items.id,cart_items.cart_id,tb_paket_bimbel_dtlharga.REF_PAKET, tb_paket_bimbel_dtlharga.REF_LEVEL,tb_paket_bimbel_dtlharga.REF_KATEGORI,tb_paket_bimbel.NAMA as NAMA_PAKET,tb_level.NAMA as NAMA_LEVEL,tb_kategori.NAMA as NAMA_KATEGORI,tb_paket_bimbel_dtlharga.HARGA_PAKET,cart_items.qty')->join('tb_paket_bimbel_dtlharga',function($join){
        $join->on('tb_paket_bimbel_dtlharga.KD','cart_items.REF_PRICELIST');
        $join->on('tb_paket_bimbel_dtlharga.REF_KATEGORI','cart_items.REF_KATEGORI');
        $join->on('tb_paket_bimbel_dtlharga.REF_LEVEL','cart_items.REF_LEVEL');
        $join->on('tb_paket_bimbel_dtlharga.REF_PAKET','cart_items.REF_PAKET');
        $join->on('tb_paket_bimbel_dtlharga.JUMLAH_JAM','cart_items.JUMLAH_JAM');
        $join->on('tb_paket_bimbel_dtlharga.JUMLAH_PERTEMUAN','cart_items.JUMLAH_PERTEMUAN');
      })->leftJoin('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->join('tb_kategori','tb_kategori.KD','tb_paket_bimbel_dtlharga.REF_KATEGORI')->where('cart_id',$cart->id)->get();
    }else{
      $items = array();
    }
    $response = new StreamedResponse();
    $response->setCallback(function () use ($items){
      echo 'data: ' . json_encode($items) . "\n\n";
    //echo "retry: 100\n\n"; // no retry would default to 3 seconds.
    //echo "data: Hello There\n\n";
      ob_flush();
      flush();
      usleep(200000);
    });

    $response->headers->set('Content-Type', 'text/event-stream');
    $response->headers->set('X-Accel-Buffering', 'no');
    $response->headers->set('Cach-Control', 'no-cache');
    return $response->send();
  }
}

public function payment_notification(Request $request){
  $trx_id = $request->trx_id;
  $bill_no = $request->bill_no;

  $payments = CartPayment::join('carts','carts.id','cart_payments.cart_id')->where('cart_payments.trx_id',$trx_id)->where('carts.invoice_no',$bill_no)->orderBy('cart_payments.updated_at','DESC')->get();
  if(count($payments)){
    try{
      $payment = CartPayment::find($payments[0]->id);
      $payment->status = $request->payment_status_code;
      $payment->status_desc = $request->payment_status_desc;
      $payment->payment_total = $request->payment_total;
      $payment->payment_channel_uid = $request->payment_channel_uid;
      $payment->payment_channel = $request->payment_channel;
      $payment->payment_reff = $request->payment_reff;
      $payment->payment_date = $request->payment_date;
      $payment->save();
    }catch(Exception $e){
      return "error";
    }
  }
  $api_data = [
    "response" => "Payment Notification",
    "trx_id" => $trx_id,
    "merchant" => "Best Partner",
    "merchant_id" => "33401",
    "bill_no" => $bill_no,
    "response_code" => "00",
    "response_desc" => "Sukses",
    "response_time" => date('y-m-d H:i:s')
  ];
  return response()
  ->json($api_data);  
}

public function add_to_cart(Request $request){
  if(!Auth::check()){
    return "error : user not logged in yet";
  }
  $course_id = $request->course_id;
  $level_id = $request->level_id;
  $category_id = $request->category_id;
  $pricelist_type = $request->pricelist_type;
  $pricelist_type_arr = explode(".",$request->pricelist_type);
  $pricelist_type = end($pricelist_type_arr);
  $duration = $request->duration;
  $pricelist_id = $request->pricelist_id;
  $cmd = $request->cmd;
  if($cmd == "add"){
    $cart_exist = Cart::where('user_id',auth()->user()->id)->where('status',0)->first();
    if($cart_exist){
      $cart = $cart_exist;
    }else{
      $cart = new Cart();
    }
    $date = date('ymd');
    $number = count($cart->where('invoice_no','like','%'.$date.'%')->get());
    if($number){
      $cart_invoices = Cart::orderBy('invoice_no','DESC')->get();
      $invoice_no = $cart_invoices[0]->invoice_no;
      $invoice_day = substr($invoice_no,4,2);
      $current_day = date('d');
      if($current_day != $invoice_day){
        $number = 0;
      }else{
        $number_arr = explode("-",$invoice_no);
        $number = (int) $number_arr[1];
      }
    }
    $number += 1;
    $width = 3;
    $no = str_pad((string)$number, $width, "0", STR_PAD_LEFT);

    $invoice_no = $date.'-'.$no;
    $cart->user_id = Auth::user()->id;
    $cart->invoice_no = $date.'-'.$no;
    $cart->status = 0;
    $cart->current_process = 0;
    $tomorrow = new DateTime('tomorrow');
    $tomorrow->format('Y-m-d H:i:s');
    $cart->due_date = $tomorrow;
    $cart->save();


    $cart_item_exist = CartItem::where('REF_PAKET',$course_id)->where('REF_LEVEL',$level_id)->where('REF_KATEGORI',$category_id)->where('REF_PRICELIST',$pricelist_id)->where('JUMLAH_JAM',$duration)->where('cart_id',$cart->id)->first();

    $payment_exist = CartPayment::where('cart_id',$cart->id)->where('status',0)->first();
    if($payment_exist){
      $this->faspay_cancel_payment();
    }

    if($cart_item_exist){
      $cart_item = $cart_item_exist;
    }else{
      $cart_item = new CartItem();
    }
    $detail_course = PacketPriceDetails::where('REF_PAKET',$course_id)->where('REF_LEVEL',$level_id)->where('REF_KATEGORI',$category_id)->where('JUMLAH_JAM',$duration);

    if($pricelist_type == "ONLINE")
    {
      $detail_course =  $detail_course->whereRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) = "ONLINE"');
    }
    else
    {
      $detail_course =  $detail_course->whereRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) != "ONLINE"');
    }
    $detail_course = $detail_course->leftJoin('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->get()[0];
    $pricelist_id = $detail_course->KD;
    $meets = $detail_course->JUMLAH_PERTEMUAN;
    $price = $detail_course->HARGA_PAKET;
    $cart_item->cart_id = $cart->id;
    $cart_item->pricelist_type = "program";
    $cart_item->REF_PRICELIST = $pricelist_id;
    $cart_item->REF_PAKET = $course_id;
    $cart_item->REF_LEVEL = $level_id;
    $cart_item->REF_KATEGORI = $category_id;
    $cart_item->JUMLAH_JAM = $duration;
    $cart_item->JUMLAH_PERTEMUAN = $meets;
    $cart_item->qty = 1;
    $cart_item->HARGA_PAKET = $price;
    $cart_item->save();

    $all_item = new Cart();
    return $all_item->with(['items' => function($query){
      return $query->selectRaw('cart_items.id,cart_items.cart_id,tb_paket_bimbel_dtlharga.REF_PAKET, tb_paket_bimbel_dtlharga.REF_LEVEL,tb_paket_bimbel_dtlharga.REF_KATEGORI,tb_paket_bimbel.NAMA as NAMA_PAKET,tb_level.NAMA as NAMA_LEVEL,tb_kategori.NAMA as NAMA_KATEGORI,tb_paket_bimbel_dtlharga.HARGA_PAKET,cart_items.qty')->join('tb_paket_bimbel_dtlharga',function($join){
        $join->on('tb_paket_bimbel_dtlharga.KD','cart_items.REF_PRICELIST');
        $join->on('tb_paket_bimbel_dtlharga.REF_KATEGORI','cart_items.REF_KATEGORI');
        $join->on('tb_paket_bimbel_dtlharga.REF_LEVEL','cart_items.REF_LEVEL');
        $join->on('tb_paket_bimbel_dtlharga.REF_PAKET','cart_items.REF_PAKET');
        $join->on('tb_paket_bimbel_dtlharga.JUMLAH_JAM','cart_items.JUMLAH_JAM');
        $join->on('tb_paket_bimbel_dtlharga.JUMLAH_PERTEMUAN','cart_items.JUMLAH_PERTEMUAN');

      })->leftJoin('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->join('tb_kategori','tb_kategori.KD','tb_paket_bimbel_dtlharga.REF_KATEGORI')->get();
    }])->find($cart->id)->toJson();
  }else if($cmd == "get-prices"){
    $prices = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.REF_PAKET, tb_paket_bimbel_dtlharga.REF_LEVEL,tb_paket_bimbel_dtlharga.REF_KATEGORI, tb_paket_bimbel.NAMA as NAMA_PAKET,tb_level.NAMA as NAMA_LEVEL,tb_kategori.NAMA as NAMA_KATEGORI,tb_paket_bimbel_dtlharga.HARGA_PAKET, 1 as qty')->join('tb_paket_bimbel','tb_paket_bimbel_dtlharga.REF_PAKET','tb_paket_bimbel.KD')->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->join('tb_kategori','tb_kategori.KD','tb_paket_bimbel_dtlharga.REF_KATEGORI')->leftJoin('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('tb_paket_bimbel_dtlharga.REF_PAKET',$course_id)->where('tb_paket_bimbel_dtlharga.REF_LEVEL',$level_id)->where('tb_paket_bimbel_dtlharga.REF_KATEGORI',$category_id)->where('tb_paket_bimbel_dtlharga.JUMLAH_JAM',$duration);
    if($pricelist_type == "ONLINE")
    {
      $prices =  $prices->whereRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) = "ONLINE"');
    }
    else
    {
      $prices =  $prices->whereRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) != "ONLINE"');
    }
    $prices = $prices->get();
    
    return $prices->toJson();
  }
  return "false";
}

public function remove_cart_items(Request $request){
  $items_arr = collect($request->items);
  if(count($items_arr)){
    $items_id = $items_arr->pluck('id');
  }else{
    $items_id = [$request->item_id];
  }
  $cart_id = Cart::where('user_id',auth()->user()->id)->where('status',0)->get();
  if($cart_id){
    $cart_id = $cart_id[0]->id;
  }
  $delete = CartItem::where('cart_id',$request->cart_id)->whereIn('id',$items_id)->delete();
  if($delete){
    $items = CartItem::selectRaw('cart_items.id,cart_items.cart_id,tb_paket_bimbel_dtlharga.REF_PAKET, tb_paket_bimbel_dtlharga.REF_LEVEL,tb_paket_bimbel_dtlharga.REF_KATEGORI,tb_paket_bimbel.NAMA as NAMA_PAKET, tb_level.NAMA as NAMA_LEVEL, tb_kategori.NAMA as NAMA_KATEGORI, tb_paket_bimbel_dtlharga.HARGA_PAKET, cart_items.qty')->join('tb_paket_bimbel_dtlharga',function($join){
      $join->on('tb_paket_bimbel_dtlharga.KD','cart_items.REF_PRICELIST');
      $join->on('tb_paket_bimbel_dtlharga.REF_KATEGORI','cart_items.REF_KATEGORI');
      $join->on('tb_paket_bimbel_dtlharga.REF_LEVEL','cart_items.REF_LEVEL');
      $join->on('tb_paket_bimbel_dtlharga.REF_PAKET','cart_items.REF_PAKET');
      $join->on('tb_paket_bimbel_dtlharga.JUMLAH_JAM','cart_items.JUMLAH_JAM');
      $join->on('tb_paket_bimbel_dtlharga.JUMLAH_PERTEMUAN','cart_items.JUMLAH_PERTEMUAN');
    })->leftJoin('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->join('tb_kategori','tb_kategori.KD','tb_paket_bimbel_dtlharga.REF_KATEGORI')->where('cart_id',$request->cart_id)->get();
    $return = [
      'items' => $items,
      'messages' => "Successfully Deleted"
    ];
    return $return;
  }
  $return = ['items' => [],'messages' => "Error when trying to delete the items, please try again"];
  return $return;
}

public function payment_channel_fee(Request $request){
  $payment_gateway = PaymentGateway::where('pg_code',$request->payment_channel)->first();
  $transaction_fee = 0;
  if(!$payment_gateway){
    return $transaction_fee;
  }
  $transaction_fee_formula = str_replace(" ","",$payment_gateway->transaction_fee);
  $transaction_fee_formula = preg_replace("/[+-]?([0-9]+[.]?[0-9]?)+%/","($1"."/100*x)",$transaction_fee_formula,-1);
  $total_fee = Cart::selectRaw('SUM(cart_items.HARGA_PAKET) as total_fee')->where('user_id',auth()->user()->id)->where('status',0)->join('cart_items','cart_items.cart_id','carts.id')->value('total_fee');
  $parser = new StdMathParser();
    // Generate an abstract syntax tree
  $AST = $parser->parse($transaction_fee_formula);
    // Do something with the AST, e.g. evaluate the expression:
  $evaluator = new Evaluator();
  $evaluator->setVariables([ 'x' => $total_fee]);
  $value = round($AST->accept($evaluator));
    //dd($total_fee,$transaction_fee_formula,$value);
  return response()->json(['miscfee' => $value],200);
}

public function registration(Request $request){

  if(!Auth::check()){
    abort(403,'Please Login First');
  }
  $products = $request->products;
  $levels = $request->levels;
  $languages = $request->languages;  
  $categories = $request->categories;
  $products_name = CoursePacket::find($products)->NAMA;
  $levels_name = Level::find($levels)->NAMA;
  $current_regis = Cart::join('cart_items','cart_items.cart_id','carts.id')->where('carts.user_id',Auth::user()->id);
  
  if($products != ""){
    $current_regis->where('cart_items.REF_PAKET',$products);
  }
  if($levels != ""){
    $current_regis->where('cart_items.REF_LEVEL',$levels);
  }
  $current_regis = $current_regis->get();

  $offer_letter_list = OfferLetterSetting::where('status',1)->pluck('REF_BIDANGUSAHA');
  $cek_exist = CartItem::where('cart_id',$current_regis)->join('tb_paket_bimbel','tb_paket_bimbel.KD','cart_items.REF_PAKET')->whereIn('tb_paket_bimbel.REF_BIDANGUSAHA',$offer_letter_list)->get();
  $offer_letter_settings = "false";
  if(count($cek_exist) && $kode == ""){
    $offer_letter_settings = "true";
  }else if($kode != ""){
    $offer_letter_settings = "false";
  }

  $paket_bimbel = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.KD, REF_PAKET,REF_LEVEL, tb_paket_bimbel.NAMA as PAKET, tb_level.NAMA as LEVEL')->groupBy('KD','REF_PAKET','tb_paket_bimbel.NAMA','tb_level.NAMA','REF_LEVEL')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->where('pricelists.status',1)->get();
  $kategori = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.REF_KATEGORI as KD,tb_kategori.NAMA')->whereIn('tb_paket_bimbel_dtlharga.KD',ProductPriceList::where('status',1)->pluck('KD'))->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->join('tb_kategori','tb_paket_bimbel_dtlharga.REF_KATEGORI','tb_kategori.KD')->where('pricelists.status',1)->where('REF_PAKET',$products)->where('REF_LEVEL',$levels)->groupBy('tb_paket_bimbel_dtlharga.REF_KATEGORI','NAMA')->get();
  $perusahaan = Perusahaan::get();
  $user_data = Auth::user();
  $registration_data = RegisPaket::join('tb_calonsiswa_dtlpaket','tb_calonsiswa_dtlpaket.KD','tb_calonsiswa.KD')->where('users_id',$user_data->id)->orderBy('id','DESC')->first();

  $tgl_test = "";
  if($products == "LT815"){
   $now = date('Y-m-d',Carbon::now()->timestamp);
   $tgl_test = Events::selectRaw('DATE_FORMAT(tgl_mulai, "%d-%c-%Y") as tgl_mulai')->where('event_type_id',2)->where('tgl_mulai','>=',$now)->orderBy('tgl_mulai','ASC')->limit(2)->pluck('tgl_mulai');
 }else if($products == "LT816"){
   $now = date('Y-m-d',Carbon::now()->timestamp);
   $tgl_test = Events::selectRaw('DATE_FORMAT(tgl_mulai, "%d-%c-%Y") as tgl_mulai')->where('event_type_id',3)->where('tgl_mulai','>=',$now)->orderBy('tgl_mulai','ASC')->pluck('tgl_mulai');
 }

 $countries = Country::orderBy('name','ASC')->get();
 $return_data = array('paket_bimbel','kategori','perusahaan','user_data','registration_data','products','products_name','levels','levels_name','categories','tgl_test','current_regis','countries','offer_letter_settings'); 

 return view('products.registration',compact($return_data));
}

public function post_registration(Request $request){
  $nama = $request->nama_depan.' '.$request->nama_belakang;
  $request->merge(['nama' => $nama]);

  //$tanggal_lahir = $request->tahun_lahir.'/'.$request->bulan_lahir.'/'.$request->tanggal_lahir;
  ///$request->merge(['tanggal_lahir' => $tanggal_lahir]);
  $tanggal_lahir = null;
  $regisPaketKD = RegisPaket::orderBy('id','desc')->limit(1)->value('KD');
  if($regisPaketKD){
    $regis_month = substr($regisPaketKD,4,2);
    $current_month = date('m');
    if($current_month != $regis_month){
      $numPaket = 0;
    }else{
      $numPaket = substr($regisPaketKD,-4);
      $numPaket = (int)$numPaket;
    }
  }else{
    $numPaket = 0;
  }

  $numPaket++;

  $width = 4;

  $student_kd_exist = Cart::where('user_id',auth()->user()->id)->where('status',0)->first();
  $kd = 'CS'.date('y').date('m'). str_pad((string)$numPaket, $width, "0", STR_PAD_LEFT);
  if($student_kd_exist){
    $invoice_no = $student_kd_exist->invoice_no;
    $cart_id = $student_kd_exist->id;
    if($student_kd_exist->calonsiswa_kd != ""){
      $kd = $student_kd_exist->calonsiswa_kd;  
    }  
  }else{
    $invoice_no = "";
  }
  
  $request->merge(['KD' => $kd]);
  $upload_path = "public/files/registration/".$kd;
  if ($request->hasfile('ktp')){
    $file_ktp = $request->file('ktp');
    $ext_ktp = $file_ktp->getClientOriginalExtension();
    $path_ktp = $file_ktp->storeAs($upload_path, 'file_ktp.'.$ext_ktp);
    $request->merge(['lokasi_ktp' => $path_ktp]);
  }

  if ($request->hasfile('kk')){
    $file_kk = $request->file('kk');
    $ext_kk = $file_kk->getClientOriginalExtension();
    $path_kk = $file_kk->storeAs($upload_path, 'file_kk.'.$ext_kk);
    $request->merge(['lokasi_kk' => $path_kk]);
  }


  if ($request->hasfile('kks')){
    $file_kks = $request->file('kks');
    $ext_kks = $file_kks->getClientOriginalExtension();
    $path_kks = $file_kks->storeAs($upload_path, 'file_kks.'.$ext_kks);
    $request->merge(['lokasi_kks' => $path_kks]);
  }

  if($request->hasfile('paspor')){
    $file_paspor = $request->file('paspor');
    $ext_paspor = $file_paspor->getClientOriginalExtension();
    $path_paspor = $file_paspor->storeAs($upload_path, 'file_paspor.'.$ext_paspor);
    $request->merge(['lokasi_paspor' => $path_paspor]); 
  }

  if($request->hasfile('ijazah')){
    $ijazah_arr = array();
    foreach($request->file('ijazah') as $key => $ijazah){
      $file_ijazah = $ijazah;
      $ext_ijazah = $file_ijazah->getClientOriginalExtension();
      $path_ijazah = $file_ijazah->storeAs($upload_path, 'file_ijazah-'.($key+1).'.'.$ext_ijazah);
      array_push($ijazah_arr,$path_ijazah);
    } 
    $request->merge(['lokasi_ijazah' => implode("|",$ijazah_arr)]);
  }
  $student_data_exist = RegisPaket::where('KD',$kd)->first();

  if($student_data_exist){
    $regis_paket = $student_data_exist;
  }else{
    $regis_paket = new RegisPaket();
  }
  $request->merge(['NAMA' => $nama]);
  $request->merge(['EMAIL' => $request->email]);
  $request->merge(['KOTA_KELAHIRAN' => $request->tempat_lahir]);
  $request->merge(['TGL_LAHIR' => $tanggal_lahir]);
  $request->merge(['REF_KTP' => $request->no_ktp]);
  $request->merge(['ALAMAT' => $request->alamat]);
  $request->merge(['EMAIL' => $request->email]);
  $request->merge(['KONTAK' => $request->no_telepon]);

  $regis_paket->_token = $request->_token;
  $regis_paket->users_id = Auth::user()->id;
  $regis_paket->KD = $kd;
  $regis_paket->REF_PERUSAHAAN = $request->cabang;
  $regis_paket->NAMA = $nama;
  $regis_paket->JK = $request->jk;
  $regis_paket->KOTA_KELAHIRAN = $request->tempat_lahir;
  $regis_paket->TGL_LAHIR = $tanggal_lahir;
  $regis_paket->ALAMAT = $request->alamat;
  $regis_paket->DUSUN = $request->dusun;
  $regis_paket->RT_RW = $request->rt.'/'.$request->rw;
  $regis_paket->DESA_KELURAHAN = $request->desa_kelurahan;
  $regis_paket->REF_KOTA = $request->kota;
  $regis_paket->REF_PROVINSI = $request->provinsi;
  $nama_negara = Country::find($request->negara)->value('name');
  $regis_paket->REF_NEGARA = strtoupper($nama_negara);
  $regis_paket->ID_NEGARA = $request->negara;
  $regis_paket->POSTAL_CODE = $request->kode_pos;
  $regis_paket->JENIS_TINGGAL = $request->jenis_tinggal;
  $alat_transportasi = $request->alat_transportasi;
  if($request->alat_transportasi == ""){
    $alat_transportasi = $request->alat_transportasi_lainnya;
  }
  $regis_paket->ALAT_TRANSPORTASI = $alat_transportasi;
  $regis_paket->AGAMA = $request->agama;
  $regis_paket->KONTAK = $request->no_telepon;
  $regis_paket->INSTAGRAM = $request->instagram;
  $regis_paket->EMAIL = $request->email;
  $regis_paket->KEWARGANEGARAAN = $request->kewarganegaraan;
  $regis_paket->REF_KTP = $request->no_ktp;
  $regis_paket->REF_PASPOR = $request->no_paspor;
  $regis_paket->TINGKAT_PEKERJAAN = $request->pekerjaan;
  $regis_paket->SEKTOR_PEKERJAAN = $request->bidang_pekerjaan;
  $regis_paket->TINGKAT_PENDIDIKAN = $request->pendidikan_terakhir;
  $regis_paket->UNIVERSITAS_TERAKHIR = $request->ref_universitas;
  $regis_paket->JURUSAN = $request->jurusan;
  if($request->tujuan_lainnya != ""){
    $request->merge(['ALASAN' => $request->tujuan_lainnya]);
    $regis_paket->ALASAN = $request->tujuan_lainnya;
  }else{
    $request->merge(['ALASAN' => $request->tujuan_pelatihan]);
    $regis_paket->ALASAN = $request->tujuan_pelatihan;
  }
  $regis_paket->BAHASA_SEHARI_HARI = $request->bahasa_sehari_hari;
  $regis_paket->KEBUTUHAN_KHUSUS = $request->kebutuhan_khusus;
  $regis_paket->PENERIMA_KPS = $request->penerima_kps;
  $regis_paket->LAYAK_PIP = $request->layak_pip;
  $regis_paket->PENERIMA_KIP = $request->penerima_kip;
  $regis_paket->PATH_KTP = url($path_ktp);
  $regis_paket->PATH_KK = url($path_kk);

  $regis_paket->save();


  $reseller = Reseller::where('kode',$request->kode_reseller)->first();
  $reseller_id = "";
  if($reseller != ""){
    $reseller_id = $reseller->id;
  }
  $reseller_quota =  ResellerQuota::where('slug',$request->slug)->first();
  $reseller_quota_id = "";
  if($reseller_quota != ""){
    $reseller_quota_id =$reseller_quota->id;
  }
  $cart_exist = Cart::where('user_id',Auth::user()->id)->where('status',0)->first();
  if($reseller_id != ""){
    $regis_paket_dtl = RegisPaketDtl::where('KD',$kd)->first();
    if($regis_paket_dtl){
      $regis_paket_dtl = $regis_paket_dtl;
    }else{
      $regis_paket_dtl = new RegisPaketDtl();
    }
    $regis_paket_dtl->KD = $kd;
    $regis_paket_dtl->reseller_id = $reseller_id;
    $regis_paket_dtl->reseller_quota_id = $reseller_quota_id;
    $regis_paket_dtl->REF_PAKET = $request->REF_PAKET;
    $regis_paket_dtl->REF_PRICELIST = $request->REF_PRICELIST;
    $regis_paket_dtl->REF_LEVEL = $request->REF_LEVEL;
    $regis_paket_dtl->REF_KATEGORI = $request->REF_KATEGORI;
    $regis_paket_dtl->JUMLAH_JAM = $request->JUMLAH_JAM;
    $regis_paket_dtl->JUMLAH_PERTEMUAN = $request->JUMLAH_PERTEMUAN;
    $regis_paket_dtl->TIPE_KELAS = "";
    $regis_paket_dtl->IELTS_MODULE = $request->ielts_module;

    $online_test_setting = CourseLevelSetting::selectRaw('course_level_settings.*, ot_tests.name as test_name')->join('ot_tests','ot_tests.id','course_level_settings.online_test_id')->find($request->REF_LEVEL);

    $module_id = null;
    $test_module = null;
    if($online_test_setting){
      if($online_test_setting->online_test_id != "") {
      //send online test link

        if($request->ONLINE_TEST_MODULE != ""){
          $arr_module = explode('|',$request->ONLINE_TEST_MODULE);
          $module_id = $arr_module[0];
          $test_module = $arr_module[1];
        }

      }
      $request->merge(['test_id' => $online_test_setting->online_test_id]);
      $request->merge(['module_id' => $module_id]);
      $tanggal_speaking =  new DateTime($request->tgl_speaking.' '.$request->jam_speaking);
      $tanggal_speaking->format('Y-m-d H:i:s');
      $request->merge(['tanggal_speaking' => $tanggal_speaking]);
      $request->merge(['test_name' => $online_test_setting->test_name]);
      $request->merge(['TEST_MODULE' => $test_module]);
      $request->merge(['token' => $request->_token.'-'.time()]);
      $request->merge(['id_calonsiswa' => $kd]);
      $request->merge(['reseller_id' => $reseller_id]); 
      $request->merge(['reseller_email' => $reseller->email]);
      $daftar_online = OtRegistration::where('id_calonsiswa',$kd)->first();
      if($daftar_online){
        $daftar_online = $daftar_online->update($request->all());
      }else{
        $daftar_online =  OtRegistration::create($request->all());
      }
      if($daftar_online){

        Mail::send(new ApproveOnlineTestNotification($request));
        Mail::send(new OtRegistrationMail($request));
      }
    }
    $regis_paket_dtl->save();

    session()->put("reseller_regis.current_process","2");
    return redirect('products/registration-and-payment/'.$request->kode_reseller.'/'.$request->slug);
  }else{

    if($cart_exist){
      $cart = $cart_exist;
      $items = CartItem::selectRaw('cart_items.*,tb_paket_bimbel.NAMA as NAMA_PAKET')->where('cart_id',$cart->id)->join('tb_paket_bimbel','tb_paket_bimbel.KD','cart_items.REF_PAKET')->with('schedules')->with('intakes')->get();
      $cart_exist->calonsiswa_kd = $kd;
      $exist_regis_paket_dtl = RegisPaketDtl::where('KD',$kd)->delete();
      foreach($items as $item){
        $regis_paket_dtl = new RegisPaketDtl();
        $regis_paket_dtl->KD = $kd;
        $regis_paket_dtl->REF_PAKET = $item->REF_PAKET;
        $regis_paket_dtl->REF_LEVEL = $item->REF_LEVEL;
        $regis_paket_dtl->REF_KATEGORI = $item->REF_KATEGORI;
        $regis_paket_dtl->JUMLAH_JAM = $item->JUMLAH_JAM;
        $regis_paket_dtl->JUMLAH_PERTEMUAN = $item->JUMLAH_PERTEMUAN;
        $regis_paket_dtl->TIPE_KELAS = "";
        $regis_paket_dtl->IELTS_MODULE = "";
        if($request->TGL_TEST != ""){
          if(is_array($request->TGL_TEST)){
            if(array_key_exists($item->REF_PAKET.$request->REF_LEVEL,  $request->TGL_TEST)){
              $TGL_TEST = $request->TGL_TEST[$item->REF_PAKET.$item->REF_LEVEL];
              $regis_paket_dtl->TGL_TEST = $TGL_TEST;
            }
          }
        }
        $regis_paket_dtl->save();
      }
    }
  }

  $cek_data_ayah = RegisPaketDataWali::where('KD',$kd)->where('hubungan','Ayah')->first();
  if($cek_data_ayah){
    $data_ayah = $cek_data_ayah->update(['KD' => $kd,'nama_wali' => $request->nama_ayah,'hubungan' => 'Ayah','no_hp_wali' => $request->no_hp_ayah,'email_wali' => $request->email_ayah,'alamat_wali' => $request->alamat_orang_tua,'pekerjaan' => $request->pekerjaan_ayah,'penghasilan' => $request->penghasilan_ayah,'kebutuhan_khusus' => $request->kebutuhan_khusus_ayah]);
  }else{
    $data_ayah = RegisPaketDataWali::create(['KD' => $kd,'nama_wali' => $request->nama_ayah,'hubungan' => 'Ayah','no_hp_wali' => $request->no_hp_ayah,'email_wali' => $request->email_ayah,'alamat_wali' => $request->alamat_orang_tua,'pekerjaan' => $request->pekerjaan_ayah,'penghasilan' => $request->penghasilan_ayah,'kebutuhan_khusus' => $request->kebutuhan_khusus_ayah]);
  }

  $cek_data_ibu = RegisPaketDataWali::where('KD',$kd)->where('hubungan','Ibu')->first();
  if($cek_data_ibu){
    $data_ibu = $cek_data_ibu->update(['KD' => $kd,'nama_wali' => $request->nama_ibu,'hubungan' => 'Ibu','no_hp_wali' => $request->no_hp_ibu,'email_wali' => $request->email_ibu,'alamat_wali' => $request->alamat_orang_tua,'pekerjaan' => $request->pekerjaan_ibu,'penghasilan' => $request->penghasilan_ibu,'kebutuhan_khusus_ibu' => $request->kebutuhan_khusus_ibu]);
  }else{
    $data_ibu = RegisPaketDataWali::create(['KD' => $kd,'nama_wali' => $request->nama_ibu,'hubungan' => 'Ibu','no_hp_wali' => $request->no_hp_ibu,'email_wali' => $request->email_ibu,'alamat_wali' => $request->alamat_orang_tua,'pekerjaan' => $request->pekerjaan_ibu,'penghasilan' => $request->penghasilan_ibu,'kebutuhan_khusus_ibu' => $request->kebutuhan_khusus_ibu]);
  }
  if($request->nama_wali != "" || $request->hubungan != "" || $request->no_hp_wali != "" || $request->email_wali != ""){
   $cek_data_wali = RegisPaketDataWali::where('KD',$kd)->where('hubungan',$request->hubungan)->first();
   if($cek_data_wali){ 
    $cek_data_wali = $cek_data_wali->update(['KD' => $kd,'nama_wali' => $request->nama_wali,'hubungan' => $request->hubungan,'no_hp_wali' => $request->no_hp_wali,'email_wali' => $request->email_wali,'alamat_wali' => $request->alamat_wali,'pekerjaan' => $request->pekerjaan_wali,'penghasilan' => $request->penghasilan_wali]);
  }else{
    $data_wali = RegisPaketDataWali::create(['KD' => $kd,'nama_wali' => $request->nama_wali,'hubungan' => $request->hubungan,'no_hp_wali' => $request->no_hp_wali,'email_wali' => $request->email_wali,'alamat_wali' => $request->alamat_wali,'pekerjaan' => $request->pekerjaan_wali,'penghasilan' => $request->penghasilan_wali]); 
  }
}


if($request->offer_letter_settings == "true"){
  $companies = Perusahaan::get();;
  $pdf = PDF::loadview('products.letter-of-offer',['cart' => $cart,'cart_items' => $items, 'registration_data' => $regis_paket,'companies' => $companies]);
  $pdf_content = view('products.letter-of-offer',['cart' => $cart,'cart_items' => $items, 'registration_data' => $regis_paket,'companies' => $companies])->render();
  $offer_letter_exist = TransactionOfferLetter::where('user_id',auth()->user()->id)->where('invoice_no',$invoice_no)->where('cart_id',$cart_id)->first();
  if($offer_letter_exist){
    $offer_letter = $offer_letter_exist;
  }else{
    $offer_letter = new TransactionOfferLetter();
  }
  $path = "public/files/registration/".$cart->calonsiswa_kd;
  $offer_letter_location = $path."/offer-letter.pdf";
  $pdf_output = $pdf->output();
  $store_offer_letter = Storage::disk('local')->put($offer_letter_location,$pdf_output);
  $offer_letter->cart_id = $cart->id;
  $offer_letter->user_id = Auth::user()->id;
  $offer_letter->invoice_no = $invoice_no;
  $offer_letter->location = $offer_letter_location;
  $offer_letter->content = $pdf_content;
  $offer_letter->save();
  Mail::send(new OfferLetterMail($request,$pdf_output));
  $cart_exist->current_process = $cart_exist->current_process + 1;
  $request->session()->put('cart.current_process',$cart_exist->current_process);
  $cart_exist->save();
}else{
  $cart_exist->current_process = $cart_exist->current_process + 2;
  $request->session()->put('cart.current_process',$cart_exist->current_process);
  $cart_exist->save();
}



 // Mail::send(new EnglishRegistration($request));
return redirect()->route('registration-and-payment');
}

public function online_test_payment($test_name,$token){
  $validasi = OtRegistration::where('token', '=', $token)->first();
  if ($validasi) {
    $tgl_daftar = $validasi->updated_at;
    $today = Carbon::now();
    $datetime1 = new DateTime($tgl_daftar);
    $datetime2 = new DateTime($today);
    $days = $datetime2->diff($datetime1);
    $diff_day =  $days->d;
   // if($diff_day<=2){
    return view('products.online-test-payment', compact('token','validasi','tgl_daftar','test_name'));
    //}else{
    //  abort(403, 'Link Expire ! ');
    //}
  } else {
    abort(403, 'Unauthorized Action ! Wrong Link / Email Account ! ');
  }

}
public function post_online_test_payment($test_name,Request $request){
 $token= $request->token;
 $tgl_daftar = $request->tgl_daftar;
 $data = OtRegistration::where('token','=',$token)->first();
 $tgl = date("d-m-Y",strtotime($data->created_at));
 $myfile = $request->file('bukti_pembayaran');
 $path = 'public/files/'.$test_name.'/online-test/'.$tgl.'/'.$data->id;
 $ext = $myfile->getClientOriginalExtension();
 $bukti_pembayaran = $myfile->storeAs($path, 'bukti_pembayaran.'.$ext);
 $data->update(['bukti_pembayaran' => $bukti_pembayaran]);
 return redirect('/products/'.$test_name.'/simulation/upload-payment/'.$token)->with('message','Bukti pembayaran sudah terupload, kami akan mengirimkan link simulasi ke email anda setelah memverifikasi bukti pembayaran. Proses ini paling lama membutuhkan waktu 1-2 hari.');

}

public function old_post_registration(Request $request){
  $arr_course_code = explode("-",$request->id_course);
  $id_course= $arr_course_code[0];
  $id_level = $arr_course_code[1];
  $id_kategori = $request->id_kelompok_kelas;
  $durasi = $request->durasi_kelas;
  $nama_paket = PaketBimbel::where('KD','=',$id_course)->value('NAMA');
  $nama_level = Level::where('KD','=',$id_level)->value('NAMA');
  $detail_paket = PacketPriceDetails::join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_PAKET',$id_course)->where('REF_LEVEL',$id_level)->where('JUMLAH_JAM',$durasi)->where('REF_KATEGORI',$id_kategori);

  if($request->tipe_kelas == "ONLINE")
  {
    $detail_paket =  $detail_paket->whereRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) = "ONLINE"');
  }
  else
  {
    $detail_paket =  $detail_paket->whereRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) != "ONLINE"');
  }
  $ref_pricelist = $detail_paket->get()[0]->KD;
  $jumlah_pertemuan = $detail_paket->get()[0]->JUMLAH_PERTEMUAN;
  $harga_paket = $detail_paket->get()[0]->HARGA_PAKET;

  $request->merge(['id_course' => $id_course]);
  $request->merge(['nama_paket' => $nama_paket]);
  $request->merge(['jumlah_pertemuan' =>  $jumlah_pertemuan]);
  $request->merge(['jumlah_jam' =>  $request->durasi_kelas]);
  $request->merge(['nama_level' => $nama_level]);
  $nama =$request->nama_depan.' '.$request->nama_belakang;
  $request->merge(['id_level' => $id_level]);
  $request->merge(['nama' => $nama]);

  $tanggal_lahir = $request->tahun_lahir.'/'.$request->bulan_lahir.'/'.$request->tanggal_lahir;
  $request->merge(['tanggal_lahir' => $tanggal_lahir]);

  $regisPaketKD = RegisPaket::orderBy('id','desc')->limit(1)->value('KD');
  if($regisPaketKD){
    $regis_month = substr($regisPaketKD,4,2);
    $current_month = date('m');
    if($current_month != $regis_month){
      $numPaket = 0;
    }else{
      $numPaket = substr($regisPaketKD,-4);
      $numPaket = (int)$numPaket;
    }
  }else{
    $numPaket = 0;
  }

  $numPaket++;

  $width = 4;
  $kd = 'CS'.date('y').date('m'). str_pad((string)$numPaket, $width, "0", STR_PAD_LEFT);
  $request->merge(['KD' => $kd]);

  $upload_path = "public/files/registration/".$kd;
  if ($request->hasfile('ktp')){
    $file_ktp = $request->file('ktp');
    $ext_ktp = $file_ktp->getClientOriginalExtension();
    $path_ktp = $file_ktp->storeAs($upload_path, 'file_ktp.'.$ext_ktp);
    $request->merge(['lokasi_ktp' => $path_ktp]);
  }

  if ($request->hasfile('kk')){
    $file_kk = $request->file('kk');
    $ext_kk = $file_kk->getClientOriginalExtension();
    $path_kk = $file_kk->storeAs($upload_path, 'file_kk.'.$ext_kk);
    $request->merge(['lokasi_kk' => $path_kk]);
  }

  $regis_paket = new RegisPaket;
  $regis_paket_dtl = new RegisPaketDtl;
  $regis_paket->_token = $request->_token;
  $regis_paket->users_id = Auth::user()->id;
  $regis_paket->KD = $kd;
  $regis_paket->REF_PERUSAHAAN = $request->cabang;
  $regis_paket->NAMA = $nama;
  $regis_paket->JK = $request->jk;
  $regis_paket->KOTA_KELAHIRAN = $request->tempat_lahir;
  $regis_paket->TGL_LAHIR = $tanggal_lahir;
  $regis_paket->ALAMAT = $request->alamat;
  $regis_paket->KOTA = $request->kota;
  $regis_paket->AGAMA = $request->agama;
  $regis_paket->KONTAK = $request->no_telepon;
  $regis_paket->EMAIL = $request->email;
  $regis_paket->KEWARGANEGARAAN = $request->kewarganegaraan;
  $regis_paket->REF_KTP = $request->no_ktp;
  $regis_paket->REF_PASPOR = $request->no_paspor;
  $regis_paket->TINGKAT_PEKERJAAN = $request->pekerjaan;
  $regis_paket->SEKTOR_PEKERJAAN = $request->bidang_pekerjaan;
  $regis_paket->TINGKAT_PENDIDIKAN = $request->pendidikan_terakhir;
  $regis_paket->UNIVERSITAS_TERAKHIR = $request->ref_universitas;
  $regis_paket->JURUSAN = $request->jurusan;
  if($request->tujuan_lainnya != ""){
    $regis_paket->ALASAN = $request->tujuan_lainnya;
  }else{
    $regis_paket->ALASAN = $request->tujuan_pelatihan;
  }
  $regis_paket->BAHASA_SEHARI_HARI = $request->bahasa_sehari_hari;
  $regis_paket->PATH_KTP = url($path_ktp);
  $regis_paket->PATH_KK = url($path_kk);
  $regis_paket_dtl->KD = $kd;
  $regis_paket_dtl->REF_PRICELIST = $ref_pricelist;
  $regis_paket_dtl->REF_PAKET = $id_course;
  $regis_paket_dtl->REF_LEVEL = $id_level;
  $regis_paket_dtl->REF_KATEGORI = $request->id_kelompok_kelas;
  $regis_paket_dtl->JUMLAH_JAM = $request->durasi_kelas;
  $regis_paket_dtl->JUMLAH_PERTEMUAN = $jumlah_pertemuan;
  $regis_paket_dtl->TIPE_KELAS = $request->tipe_kelas;
  $regis_paket_dtl->IELTS_MODULE= $request->ielts_module;
  $regis_paket->save();
  $regis_paket_dtl->save();
  RegisPaketDataWali::create($request->all());



  $cart_exist = Cart::where('user_id',Auth::user()->id)->where('status',0)->first();
  if(!$cart_exist){
   $cart = new Cart();
   $date = date('ymd');
   $number = count($cart->where('invoice_no','like','%'.$date.'%')->get());
   if($number){
    $invoice_no = $cart->orderBy('invoice_no','DESC')->get()[0]->invoice_no;
    $invoice_day = substr($invoice_no,4,2);
    $current_day = date('d');
    if($current_day != $invoice_day){
      $number = 0;
    }else{
      $number_arr = explode("-",$invoice_no);
      $number = (int) $number_arr[1];
    }
  }
  $number += 1;
  $width = 3;
  $invoice_no = str_pad((string)$number, $width, "0", STR_PAD_LEFT);
  $invoice_no = $date.'-'.$invoice_no;


  $cart->user_id = Auth::user()->id;
  $cart->invoice_no = $invoice_no;
  $cart->status = 0;
  $cart->payment_status = 0;

  $tomorrow = new DateTime('tomorrow');
  $tomorrow->format('Y-m-d H:i:s');
  $cart->due_date = $tomorrow;
  $cart->save();
}else{
  $cart = $cart_exist;
}

$cart_item = new CartItem();
$cart_item->cart_id = $cart->id;
$cart_item->calonsiswa_kd = $kd;
$cart_item->pricelist_type = "program";
$cart_item->REF_PRICELIST = $ref_pricelist;
$cart_item->REF_PAKET = $id_course;
$cart_item->REF_LEVEL = $id_level;
$cart_item->REF_KATEGORI = $id_kategori;
$cart_item->JUMLAH_JAM = $durasi;
$cart_item->JUMLAH_PERTEMUAN = $jumlah_pertemuan;
$cart_item->qty = 1;
$cart_item->HARGA_PAKET = $harga_paket;
$cart_item->save();
//Mail::send(new EnglishRegistration($request));
//Mail::send(new EnglishRegistrationPaymentMail($request));
return redirect()->route('registration-and-payment');
}

public function registration_payment($kode = null,$slug = null){
  if($kode != ""){
    $current_process = null !== session('reseller_regis') ? session('reseller_regis.current_process') : "0";
    $reseller = Reseller::where('kode',$kode)->first();
    $reseller_product = ResellerQuota::where('slug',$slug)->first();
    $REF_PAKET = $reseller_product->REF_PAKET;
    $REF_PRICELIST = $reseller_product->REF_PRICELIST;
    $quota = $reseller_product->quota;

    if($quota >= 1){
      //$cek_exist = RegisPaketDtl::where('tb_calonsiswa_dtlpaket.reseller_id',$reseller->id)->where('tb_calonsiswa_dtlpaket.reseller_quota_id',$reseller_product->id)->where('tb_calonsiswa.users_id',auth()->user()->id)->join('tb_calonsiswa','tb_calonsiswa.KD','tb_calonsiswa_dtlpaket.KD')->latest()->first();
      $data_reseller = [
        'kode_reseller' => $kode,
        'slug' => $slug,
        'current_process' => $current_process,
        'cek_exist' => false
      ];
      $cart_data = "";
      switch($current_process){

        case "0":
        $NAMA_PAKET = CoursePacket::find($REF_PAKET)->NAMA;
        $NAMA_PRICELIST = ProductPriceList::find($REF_PRICELIST)->name;
        $levels = Level::select('tb_level.KD','REF_LEVEL','tb_level.NAMA as NAMA_LEVEL')->where('tb_paket_bimbel_dtlharga.REF_PAKET',$REF_PAKET)->where('tb_paket_bimbel_dtlharga.KD',$REF_PRICELIST)->join('tb_paket_bimbel_dtlharga','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->with(['settings' => function($query) use($REF_PAKET,$REF_PRICELIST){
          return $query->where('REF_PAKET',$REF_PAKET)->where('REF_PRICELIST',$REF_PRICELIST)->with('online_test_modules');
        }])->groupBy('REF_LEVEL','NAMA_LEVEL','tb_level.KD')->get();
        //  $modules = OtModule::where('test_id',$request->test_id)->where('name','!=','-')->get();
        $data_reseller['REF_PRICELIST'] = $REF_PRICELIST;
        $data_reseller['REF_PAKET'] = $REF_PAKET;
        $data_reseller['NAMA_PAKET'] = $NAMA_PAKET;
        $data_reseller['NAMA_PRICELIST'] = $NAMA_PRICELIST;
        $data_reseller['levels'] = $levels;

        return view('products.select-product',compact('cart_data','data_reseller'));
        break;
        case "1":
        $offer_letter_settings = "false";
        $perusahaan = Perusahaan::get();
        $countries = Country::orderBy('name','ASC')->get();
        $registration_data = RegisPaket::where('users_id',auth()->user()->id)->orderBy('created_at','DESC')->get();
        if($registration_data->count()){
          $registration_data = $registration_data[0];
        }else{
          $registration_data = "";
        }

        $REF_LEVEL = session('reseller_regis')['REF_LEVEL'];
        $REF_KATEGORI = session('reseller_regis')['REF_KATEGORI'];
        $JUMLAH_JAM= session('reseller_regis')['JUMLAH_JAM'];
        $JUMLAH_PERTEMUAN = session('reseller_regis')['JUMLAH_PERTEMUAN'];
        $ONLINE_TEST_MODULE = session('reseller_regis')['ONLINE_TEST_MODULE'];
        $data_reseller['REF_PRICELIST'] = $REF_PRICELIST;
        $data_reseller['REF_PAKET'] = $REF_PAKET;
        $data_reseller['REF_LEVEL'] = $REF_LEVEL;
        $data_reseller['REF_KATEGORI'] = $REF_KATEGORI;
        $data_reseller['JUMLAH_JAM'] =$JUMLAH_JAM;
        $data_reseller['JUMLAH_PERTEMUAN'] = $JUMLAH_PERTEMUAN;
        $data_reseller['ONLINE_TEST_MODULE'] = $ONLINE_TEST_MODULE;
        $data_reseller['course_events'] = CourseEvent::selectRaw('DATE_FORMAT(tgl_mulai, "%d-%c-%Y") as tgl_mulai,course_events.REF_PAKET,course_events.REF_LEVEL')->where('tgl_mulai','>=',date('Y-m-d',Carbon::now()->timestamp))->where('REF_LEVEL',$REF_LEVEL)->where('REF_PAKET',$REF_PAKET)->orderBy('tgl_mulai','ASC')->limit(2)->join('tb_events','tb_events.event_type_id','course_events.REF_EVENT_TYPE')->pluck('tgl_mulai');
        return view('products.registration',compact('cart_data','data_reseller','offer_letter_settings','perusahaan','countries','registration_data'));
        break;
        case "2" :
        session()->forget("reseller_regis");
        $NAMA_PAKET = CoursePacket::find($REF_PAKET)->NAMA; 
        $reseller_quota = $reseller_product->decrement('quota',1);

        $data_reseller = 'Selamat anda telah terdaftar pada program "'.$NAMA_PAKET.'"';
        return view('products.payment-finished',compact('data_reseller'));
        break;
        default:
        abort(404);
        break;
      }




    }else{
      abort(403,"Quota Habis !");
    }
  }


  $cart_data = Cart::where('user_id',Auth::user()->id)->where('status',0)->with(['items' => function($query){
    return $query->selectRaw('cart_items.id,cart_items.cart_id,tb_paket_bimbel_dtlharga.REF_PAKET, tb_paket_bimbel_dtlharga.REF_LEVEL,tb_paket_bimbel_dtlharga.REF_KATEGORI,tb_paket_bimbel.REF_BIDANGUSAHA,tb_paket_bimbel.NAMA as NAMA_PAKET,tb_level.NAMA as NAMA_LEVEL,tb_kategori.NAMA as NAMA_KATEGORI,tb_paket_bimbel_dtlharga.HARGA_PAKET,cart_items.qty')->join('tb_paket_bimbel_dtlharga',function($join){
      $join->on('tb_paket_bimbel_dtlharga.KD','cart_items.REF_PRICELIST');
      $join->on('tb_paket_bimbel_dtlharga.REF_KATEGORI','cart_items.REF_KATEGORI');
      $join->on('tb_paket_bimbel_dtlharga.REF_LEVEL','cart_items.REF_LEVEL');
      $join->on('tb_paket_bimbel_dtlharga.REF_PAKET','cart_items.REF_PAKET');
      $join->on('tb_paket_bimbel_dtlharga.JUMLAH_JAM','cart_items.JUMLAH_JAM');
      $join->on('tb_paket_bimbel_dtlharga.JUMLAH_PERTEMUAN','cart_items.JUMLAH_PERTEMUAN');
    })->leftJoin('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->join('tb_kategori','tb_kategori.KD','tb_paket_bimbel_dtlharga.REF_KATEGORI')->with(['course_events' => function($query2){
      return $query2->selectRaw('DATE_FORMAT(tgl_mulai, "%d-%c-%Y") as tgl_mulai,course_events.REF_PAKET,course_events.REF_LEVEL')->join('tb_events','tb_events.event_type_id','course_events.REF_EVENT_TYPE')->where('tgl_mulai','>=',date('Y-m-d',Carbon::now()->timestamp))->orderBy('tgl_mulai','ASC')->limit(2)->pluck('tgl_mulai'); 
    }])->get();
  }])->first();
  $jadwal = false;
  if(!$cart_data){
    return redirect('products')->withError('Please register to a product first !');
  }
  $registration_data ="";

  $user_data = Auth::user();

  if($cart_data->calonsiswa_kd){
    $registration_data = RegisPaket::where('KD',$cart_data->calonsiswa_kd)->first();  
    if($registration_data == ""){
      $registration_data = RegisPaket::join('tb_calonsiswa_dtlpaket','tb_calonsiswa_dtlpaket.KD','tb_calonsiswa.KD')->where('users_id',$user_data->id)->orderBy('tb_calonsiswa.id','DESC')->first();  
    }
  }else{
    $registration_data = RegisPaket::where('users_id',auth()->user()->id)->orderBy('created_at','DESC')->get();
    if($registration_data->count()){
      $registration_data = $registration_data[0];
    }else{
      $registration_data = "";
    }
  }

  if($cart_data){
    /*$date = date('ymd');
    $invoice_no = $cart_data->invoice_no;
    $invoice_no_arr = explode("-", $invoice_no);
    if($invoice_no_arr[0] != $date){
      $invoice_no = $this->renew_invoice_number($cart_data);
    }*/
    $cart_payment = CartPayment::where('cart_id',$cart_data->id)->orderBy('created_at','DESC')->get();
    if(count($cart_payment)){
      foreach($cart_payment as $payment_record){
        $payment_method_detail = null;
        if($payment_record->payment_method == "debit"){
          $payment_method_detail = CartDebitPayment::join('cart_debit_responses','cart_debit_responses.payment_id','cart_debit_payments.id')->find($payment_record->payment_id);
        }
        $payment_record['details'] = $payment_method_detail;
      }
    }else{
      if($cart_data->status === 1){
        $cart_data->current_process = 0;
        $cart_data->save();
      }
    }
    $cart_data['payments'] = $cart_payment;
  }
  $perusahaan = Perusahaan::get();
  $countries = Country::orderBy('name','ASC')->get();


  

  $daftar_payment_channel = json_decode($this->daftar_payment_channel());
  if($daftar_payment_channel->response_code !== "00"){
    return "something went wrong please try again later";
  }
  $daftar_payment_channel = $this->filter_payment_channel($daftar_payment_channel);
  if(!$daftar_payment_channel){
    return "something went wrong please try again later";
  }
  $return_data = array('cart_data','daftar_payment_channel','countries','perusahaan','registration_data','user_data');

  $cart_id = $cart_data->id;
  $offer_letter_list = OfferLetterSetting::where('status',1)->pluck('REF_BIDANGUSAHA');
  $cart_items = CartItem::where('cart_id',$cart_id);
  $cek_exist = $cart_items->join('tb_paket_bimbel','tb_paket_bimbel.KD','cart_items.REF_PAKET')->whereIn('tb_paket_bimbel.REF_BIDANGUSAHA',$offer_letter_list)->get();
  $offer_letter_settings = "false";
  if(count($cek_exist) && $kode == ""){
    $offer_letter_settings = "true";
  }



  array_push($return_data,'offer_letter_settings');
  switch($cart_data->current_process){
    case 0 :
    session()->forget('payment-gateway-redirected');
    $view = 'products.billing';  
    break;
    case 1 :
    $view = 'products.registration';
    break;
    case 2 :
    $view = 'products.offer-letter';
    break;
    case 3 :
    $view = 'products.waiting-for-payment';
    break;
    default:
    $view = 'products.billing';
    break;
  }
  return view($view,compact($return_data));
}

public function reseller_detail_product(Request $request){
  $REF_PRICELIST = $request->REF_PRICELIST;
  $REF_PAKET = $request->REF_PAKET;
  $REF_LEVEL = $request->REF_LEVEL;
  $REF_KATEGORI = $request->REF_KATEGORI;
  $DURATION = $request->DURATION;
  $DURATION_ARR = explode("###",$DURATION);
  $JUMLAH_PERTEMUAN = $DURATION_ARR[0];
  $JUMLAH_JAM = $DURATION_ARR[1];
  $kode_reseller = $request->kode_reseller;
  $slug = $request->slug;
  if(isset($request[$REF_LEVEL."_ONLINE_TEST_MODULE"])){
    $ONLINE_TEST_MODULE = $request[$REF_LEVEL."_ONLINE_TEST_MODULE"];
  }else{
    $ONLINE_TEST_MODULE = $request->ONLINE_TEST_MODULE;
  }
  $reseller_regis = [
    "current_process" => "1",
    "REF_LEVEL" => $REF_LEVEL,
    "REF_KATEGORI" => $REF_KATEGORI,
    "JUMLAH_PERTEMUAN" => $JUMLAH_PERTEMUAN,
    "JUMLAH_JAM" => $JUMLAH_JAM,
    'ONLINE_TEST_MODULE' => $ONLINE_TEST_MODULE
  ];
  session()->put("reseller_regis",$reseller_regis);
  return redirect('products/registration-and-payment/'.$kode_reseller.'/'.$slug);
}

public function cart_next_process($cart,$process = null){
  if($cart->current_process <= 3){
    if($process != ""){
      $cart->current_process = $process;
    }else{
      $cart->current_process += 1;
    }
    $cart->save();
  }else{
    if($process != ""){
      $cart->current_process = $process;
    }else{
      $cart->current_process = 0;
    }
    $cart->save();
  }
}

public function back_to_billing(Request $request){
  $this->faspay_cancel_payment();
  $cart = Cart::where('user_id',Auth::user()->id)->where('status',0)->first();
  
  $cart_payments = CartPayment::where('cart_id',$cart->id)->where('status',0)->orderBy('id','DESC')->get();
  if(count($cart_payments)){
    $cart_payment = $cart_payments[0];
    $bill_no = $cart->invoice_no;
    $trx_id = $cart_payment->trx_id;
    $request->merge(['trx_id' => $trx_id]);
    $request->merge(['bill_no' => $bill_no]);
    $payment_status = $this->check_payment_status($request);
  }else{
    return redirect('products')->withError("It seems that you haven't created any transaction yet");
  }
  return redirect('products/registration-and-payment');
}

public function reseller_cancel($kode_reseller,$slug){
  $kode_reseller = $kode_reseller;
  $slug = $slug;
  session()->forget("reseller_regis");

  return redirect('products/registration-and-payment/'.$kode_reseller.'/'.$slug);
}

public function faspay_cancel_payment(){
  $cart = Cart::where('user_id',Auth::user()->id)->where('status',0)->first();
  $cart_payments = CartPayment::where('cart_id',$cart->id)->where('status',0)->get();
  $bill_no = $cart->invoice_no;
  $payment_user_id = "bot33401";
  $payment_password = "p@ssw0rd";
  foreach($cart_payments as $cart_payment){
    $cart_cancel = new CartDebitCancellation();
    $trx_id = $cart_payment->trx_id;
    $payment_signature = sha1(md5($payment_user_id.$payment_password.$bill_no));

    $api_data = '{
      "request":"Canceling Payment",
      "trx_id":"'.$trx_id.'",
      "merchant_id":"33401",
      "merchant" : "Best Partner",
      "bill_no":"'.$bill_no.'",
      "payment_cancel" : "Pembatalan dari user",
      "signature":"'.$payment_signature.'"
    }';
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://dev.faspay.co.id/cvr/100005/10',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $api_data,
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $php_response = json_decode($response);
    if($php_response != "" && !isset($php_response->response_error)){
      $cart_cancel->trx_id = $trx_id;
      $cart_cancel->cart_id = $cart->id;
      $cart_cancel->bill_no = $bill_no;
      $cart_cancel->trx_status_code = $php_response->trx_status_code;
      $cart_cancel->trx_status_desc = $php_response->trx_status_desc;
      $cart_cancel->payment_status_code = $php_response->payment_status_code;
      $cart_cancel->payment_status_desc = $php_response->payment_status_desc;
      $cart_cancel->payment_cancel_date = $php_response->payment_cancel_date;
      $cart_cancel->payment_cancel = "Ganti produk";
      $cart_cancel->response_code = $php_response->response_code;
      $cart_cancel->response_desc = $php_response->response_desc;
      $cek_cancel_exist = CartDebitCancellation::where('trx_id',$trx_id)->get();
      if(!count($cek_cancel_exist)){
        $cart_cancel->save();
      }
    }

  }
  $cart->current_process = 0;
  $cart->save();
}



public function cancel_payment(){
  $cart = Cart::where('user_id',Auth::user()->id)->where('status',0)->first();
  if($cart->current_process > 0){
    $cart->current_process = ($cart->current_process - 1);
    $cart->save();
  }

  session()->forget('payment-gateway-redirected');
  return redirect('products/registration-and-payment');
  /*
  $cart_id = $cart->id;
  $payment = CartPayment::where('cart_id',$cart_id)->first();
  $payment_method_detail = "";
  if($payment->payment_method == "debit"){
    $payment_method_detail = CartDebitPayment::where('id',$payment->id)->get();
  }
  */
//===================================================================================
}

public function payment_redirected(){
 session()->put("payment-gateway-redirected",1);
}

public function check_payment_status(Request $request){
  $trx_id = $request->trx_id;
  $bill_no = $request->bill_no;
  $payment_user_id = "bot33401";
  $payment_password = "p@ssw0rd";
  $payment_signature = sha1(md5($payment_user_id.$payment_password.$bill_no));
  $api_data = '{"request": "Pengecekan Status Pembayaran",
  "trx_id": "'.$trx_id.'",
  "merchant_id": "33401",
  "bill_no": "'.$bill_no.'",
  "signature" : "'.$payment_signature.'"
}';
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://dev.faspay.co.id/cvr/100004/10',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $api_data,
));
$response = curl_exec($curl);
curl_close($curl);
$php_response = json_decode($response);

if($php_response){
  $cart =  Cart::where('user_id',Auth::user()->id)->where('invoice_no',$bill_no)->where('status',0)->first();
  $cart_id = $cart->id;
  if(isset($php_response->payment_date)){
    $payment_date = $php_response->payment_date;
    if($payment_date == ""){
      $payment_date = date("Y-m-d h:i:s");
    }
  }else{
    $payment_date = date("Y-m-d h:i:s");
  }


  $cart_payment = CartPayment::where('cart_id',$cart_id)->where('trx_id',$trx_id)->get();
  if(count($cart_payment)){
    $cart_payment = $cart_payment[0];
    $cart_payment->trx_id = $php_response->trx_id;
    if(isset($php_response->payment_reff )){
    $cart_payment->payment_reff = $php_response->payment_reff;
    }
    $cart_payment->payment_date = $payment_date;
    if(isset($php_response->payment_total )){
    $cart_payment->payment_total = $php_response->payment_total;
    }
     if(isset($php_response->payment_status_code )){
    $cart_payment->status = $php_response->payment_status_code;
  }
   if(isset($php_response->payment_status_desc )){
    $cart_payment->status_desc = $php_response->payment_status_desc;
  }
    $cart_payment->save();
  }
}
return $response;
}

public function payment_finished(){
  $cart = Cart::with('items')->where('user_id',auth()->user()->id)->where('status',0)->orderBy('created_at','DESC')->get();
  if(!count($cart)){
    return redirect('products')->withError("It seems that you haven't completed any transaction yet");
  }
  $cart = $cart[0];

  $cart->status = 1;
  $cart_id = $cart->id;
  $cart->save();
  $paid_amount = CartPayment::selectRaw('SUM(payment_total) as subtotal')->where('cart_id',$cart_id)->where('status',2)->first()->subtotal;
  return view('products.payment-finished',compact('cart','paid_amount'));
}

/*public function renew_invoice_number($current_cart){
  $cart = new Cart();
  $date = date('ymd');
  $number = count($cart->where('invoice_no','like','%'.$date.'%')->get());
  $number += 1;
  $width = 3;
  $invoice_no = str_pad((string)$number, $width, "0", STR_PAD_LEFT);
  $invoice_no = $date.'-'.$invoice_no;
  $current_cart->invoice_no = $invoice_no;
  $tomorrow = new DateTime('tomorrow');
  $tomorrow->format('Y-m-d H:i:s');
  $current_cart->due_date = $tomorrow;
  $current_cart->save();
  return $invoice_no;
}*/

public function company_structures(){
  $company_structures = CompanyStructure::orderBy('created_at','DESC')->first();
  return view('company-structures',['company_structures' => $company_structures]);
}

public function links($division_id){
  if( PageType::where('division_id',$division_id)->orderBy('name','ASC')->first()){
    $types = PageType::where('division_id',$division_id)->with(['sub_types' => function($query){
      return $query->orderBy('name','ASC')->with(['pages' => function($query){
        return $query->orderBy('name','ASC');
      }]);
    }])->orderBy('name','ASC')->get();

    return view('links',['types' => $types,'division_id' => $division_id]);
  }else{
    abort(404);
  }
}

public function change_link_type(Request $request){
  if($request->type_id != "all"){
    $sub_types = PageSubType::where("type_id",$request->type_id)->where('division_id',$request->division_id)->with(['pages' => function ($query) use ($request){
      return $query->where('type_id',$request->type_id)->orderBy('name','ASC');
    }])->orderBy('name','ASC')->get();
  }else{
    $pages = Pages::orderBy('name','ASC')->get();
    $sub_types = array(array("id" => "all","name" => "All","pages" => $pages));
  }
  return json_encode($sub_types);
}

public function change_link_subtype(Request $request){
  if($request->sub_type_id != 'all'){
    $pages = Pages::where("type_id",$request->type_id)->where('sub_type_id',$request->sub_type_id)->where('division_id',$request->division_id)->orderBy('name','ASC')->get();
    return $pages->toJson();
  }else{
    $pages = Pages::orderBy('name','ASC')->get();
    return $pages->toJson();
  }
}

public function test(){
  return view('test');
}

public function form($slug,Request $request){
  $form = Form::whereSlug($slug)->first();
  if($request->halaman == ""){
    $page = 1;
  }else{
    $page = $request->halaman;
  }
  $mulai = ($page > 1) ? ($page * 1) - 1 : 0;
  $idsoal = $form->idsoal;
  $categories_limit = FormCategory::where('idsoal',$idsoal)->with('questions.options')->offset($mulai)->limit(1)->get();
  $categories = FormCategory::where('idsoal',$idsoal)->get();

  $form = Form::where('idsoal',$idsoal)->first();
  $description = FormDescription::where('idsoal',$idsoal)->first();

  return view('form.form-template',['form' => $form,'page'=>$page,'pages' => count($categories),'description' => $description,'categories_limit' => $categories_limit,'idsoal' => $idsoal,'slug' => $slug]);

}

public function save_form($slug, Request $request){
  $idsoal = $request->idsoal;
  $date = date("yy-m-d");
  $button = $request->tombol;
  $hal = $request->page;
  $awal = $hal-1;
  $batas = 1;
  $brkt = $hal+1;
  $ds = $request->ds;
  $z =[];

  if(!empty($ds)){
    array_push($z,$ds);
  }else{
    $ds = $ds;
  }
  if($button=="berikutnya"){
    $s = FormCategory::where('idsoal',$idsoal)->with('questions.options')->offset($awal)->limit($batas)->with('questions')->get();
    $n = count($s);

    foreach($s as  $r){
      $idk = $r->idkategori;
      $kategori = $r->kategori;

      foreach($r->questions as $ii => $r1){
        $ii = $ii +1;
        if($r1->jawaban == 9){
          $a = implode("|",$_POST[$ii]);

        }else{

          $a = $_POST[$ii];
        }
        array_push($z,$a);
      }
    }

    $az = implode('!',$z);
    return redirect('form/'.$slug.'?ds='.$az.'&halaman='.$brkt);
  }else{

    $s = FormCategory::where('idsoal',$idsoal)->with('questions')->offset($awal)->limit($batas)->with('questions')->get();
    $n = count($s);

    $ii= 0;
    foreach($s as $r){
      $idk = $r->idkategori;
      $kategori = $r->kategori;

      foreach($r->questions as $r1){
        $ii = $ii +1;
        $a = $_POST[$ii];
        array_push($z,$a);
      }
    }

    $az = implode('!',$z);

    $values = array('idsoal'=>$idsoal,'survei'=>$az,'tanggal'=>$date);
    $insert_content = FormContent::create($values);
    $request->merge(['slug' => $slug]);
    $array_az = explode('!',$az);
    if($slug == "internship-and-job-vacancy") {

      $last_number = count($array_az) - 1;
      $to = ["director@bestpartnereducation.com"];
      $cc = ["info@bestpartnereducation.com"];
      $request->merge(['to' => $to]);
      $request->merge(['cc' => $cc]);
      $request->merge(['email' =>  $array_az[$last_number]]);
      $request->merge(['nama_sekolah' => $array_az[0]]);
      $request->merge(['alamat_sekolah' => $array_az[1]]);
      $request->merge(['nama' => $array_az[2]]);
      $request->merge(['tanggal_lahir' => $array_az[3]]);
      $request->merge(['jurusan' => $array_az[4]]);
      $request->merge(['keahlian' => $array_az[5]]);
      $request->merge(['nomor_hp' => $array_az[6]]);

      Mail::send(new AutoReplyForm($request));
      Mail::send(new DataForm($request));
    }
    if($slug =="best-partner-events"){
      $to = ["director@bestpartnereducation.com"];
      $cc = ["info@bestpartnereducation.com","counselor2@bestpartnereducation.com"];
      $request->merge(['to' => $to]);
      $request->merge(['cc' => $cc]);
      $request->merge(['data' => $array_az]);
      Mail::send(new DataForm($request));
    }

    return redirect('form/'.$slug)->withStatus("Data has been successfully sent !");
  }
}
public function internship_job_vacancy(){
  $companies = Perusahaan::get();
  return view('form.form-internship',compact('companies'));
}
public function post_internship_job_vacancy(Request $request){
  $path = "BP/data-perusahaan/internship/".$request->tgl.'/'.uniqid().'-'.$request->nama;
  if($request->hasFile('file')){
    $file_foto = $request->file('file');
    $ext_foto = $file_foto->getClientOriginalExtension();
    $path_foto = $file_foto->storeAs($path, 'foto'.'.'.$ext_foto,'public');
    $request->merge(['foto' => $path_foto]);
  }

  if($request->hasFile('file1')){
    $file_surat = $request->file('file1');
    $ext_surat = $file_surat->getClientOriginalExtension();
    $path_surat = $file_surat->storeAs($path, 'surat'.'.'.$ext_surat,'public');
    $request->merge(['surat' => $path_surat]);
  }
  Internship::create($request->all());
  Mail::send(new InternshipApplicationMail($request));
  return redirect('careers/internship-and-job-vacancy')->with('message','Data sudah terkirim !');
}

public function demo_pendaftaran_mahasiswa(){
  return view('demo.pendaftaran-mahasiswa');
}
public function post_demo_pendaftaran_mahasiswa(Request $request){
  Mail::send(new DemoPendaftaranMahasiswaMail($request));
  return redirect('demo/pendaftaran-mahasiswa')->with('message','Data berhasil terkirim !');
}
public function demo_pendaftaran_mahasiswa_wd(){
  return view('demo.pendaftaran-mahasiswa-wd');
}
public function post_demo_pendaftaran_mahasiswa_wd(Request $request){
  $path = 'pendaftaran-mahasiswa';
  $timestamp_sekarang = Carbon::now()->timestamp;
  if($request->hasFile('input_bukti_pembayaran')){
    $file_bukti = $request->file('input_bukti_pembayaran');
    $ext_bukti = $file_bukti->getClientOriginalExtension();
    $path_bukti = $file_bukti->storeAs($path, 'bukti_pembayaran_'.$request->nama.'_'.$timestamp_sekarang.'.'.$ext_bukti,'public');
    $request->merge(['bukti_pembayaran' => $path_bukti]);
  }
  if($request->hasFile('input_rapor')){
    $file_rapor = $request->file('input_rapor');
    $ext_rapor = $file_rapor->getClientOriginalExtension();
    $path_rapor = $file_rapor->storeAs($path, 'rapor_'.$request->nama.'_'.$timestamp_sekarang.'.'.$ext_rapor,'public');
    $request->merge(['fotocopy_rapor' => $path_rapor]);
  }
  if($request->hasFile('input_ktp')){
    $file_ktp = $request->file('input_ktp');
    $ext_ktp = $file_ktp->getClientOriginalExtension();
    $path_ktp = $file_ktp->storeAs($path, 'ktp_'.$request->nama.'_'.$timestamp_sekarang.'.'.$ext_ktp,'public');
    $request->merge(['fotocopy_ktp' => $path_ktp]);
  }
  if($request->hasFile('input_ijazah')){
    $file_ijazah = $request->file('input_ijazah');
    $ext_ijazah = $file_ijazah->getClientOriginalExtension();
    $path_ijazah = $file_ijazah->storeAs($path, 'ijazah_'.$request->nama.'_'.$timestamp_sekarang.'.'.$ext_ijazah,'public');
    $request->merge(['fotocopy_ijazah' => $path_ijazah]);
  }
  if($request->hasFile('input_skhun')){
    $file_skhun = $request->file('input_skhun');
    $ext_skhun = $file_skhun->getClientOriginalExtension();
    $path_skhun = $file_skhun->storeAs($path, 'skhun_'.$request->nama.'_'.$timestamp_sekarang.'.'.$ext_skhun,'public');
    $request->merge(['fotocopy_skhun' => $path_skhun]);
  }
    /*if($request->hasFile('input_file_syarat_pendaftaran')){
        $file_syarat = $request->file('input_file_syarat_pendaftaran');
        $path = 'pendaftaran-mahasiswa/syarat_pendaftaran';
        $ext_syarat = $file_syarat->getClientOriginalExtension();
        $path_syarat = $file_syarat->storeAs($path, 'file_syarat_pendaftaran.'.$ext_syarat,'public');
        $request->merge(['file_syarat_pendaftaran' => $path_syarat]);
      }*/
      $create = DemoPendaftaranMahasiswa::create($request->all());
      return redirect('demo/pendaftaran-mahasiswa-wd')->with('message','Data berhasil terkirim !');
    }
    public function test123(){
      echo 'test';
      return view('test');
    }
    public function showPages($slug = null){

      if($slug){
        $page = Pages::with('contents')->where('slug',$slug)->first();
        if($page != ""){
          $id = $page->id;

          if(!$page->contents->id){
            $path = 'cms/pages/';
            $json_page = Storage::disk('local')->exists($path.'page.json') ? json_decode(Storage::disk('local')->get($path.'page.json')) : [];
            if($json_page){
              $page = Pages::find($id);
              $page->contents = collect($json_page)->where('page_id',$id)->first();
            }else{
            }
          }
          return view('pages',['page' => $page]);
        }else{
          abort(404);
        }
      }else{
        abort(404);
      }
    }
    public function contact_us()
    {
      /*marketing -> yeran
      director*/
      $footer = "";
      $contentType = PageContentType::where('name','Footer')->value('id');
      if($contentType != ""){
        $footer = PageContent::where('content_type', $contentType )->orderBy('id','DESC')->first();
      }

      return view('contact_us',['footer' => $footer]);
    }
    public function post_contact_us(Request $request){
      $search[] = "http";
      $search[] = "https";
      $search[] = "bitcoin";
      $search[] = "$";
      $search[] = "www.";
      $cek_spam = FALSE;
      foreach($search as $cek){
        if(strpos($request->nama, $cek) !== false || strpos($request->pesan,$cek) !== false){
          $cek_spam = TRUE;
          return redirect()->back()->with('messages','Pesan anda sudah terkirim ! <br> Kami akan segera menghubungi anda kembali');
        }else{
          $cek_spam = FALSE;
          Mail::send(new ContactUsMail($request));
          Mail::send(new ContactUsReply($request));
          $contact_us = ContactUs::create($request->all());
          return redirect()->back()->with('messages','Pesan anda sudah terkirim ! <br> Kami akan segera menghubungi anda kembali');
        }
      }



    }

    public function enquiry(){
      $review= new \stdClass();
      $review->rating = "";
      $review->review = "";

      if(Auth::check()){
        $enquiries = Enquiry::where('user_id',Auth::user()->id)->paginate(10);
        $cek_review = Review::where('user_id',Auth::user()->id)->first();  
        if($cek_review){
          $review = $cek_review;
        } 
      }else{
        $enquiries = Enquiry::paginate(10);
      }
      $companies = Perusahaan::get();
      return view('enquiry',['companies' => $companies,'enquiries' => $enquiries,'review' => $review]);
    }

    public function enquiry_detail($code){

      $review= new \stdClass();
      $review->rating = "";
      $review->review = "";


      if(Auth::check()){
        $enquiries = Enquiry::where('user_id',Auth::user()->id)->paginate(10);
        $cek_review = Review::where('user_id',Auth::user()->id)->first(); 

        if($cek_review){
          $review = $cek_review;
        } 
      }else{
        $enquiries = Enquiry::paginate(10);
      }
      $companies = Perusahaan::get();
      $enquiry_details = Enquiry::selectRaw('tb_komplain.*,users.name,users.no_telepon')->with(['details' => function($query){
        return $query->join('users','users.id','tb_dtl_komplain.employee_user_id');
      }])->join('users','users.id','tb_komplain.user_id')->where('complaint_code',$code)->first();


      //$details = EnquiryDetail::where('complaint_code',$code)->get();
      return view('enquiry',['enquiry_details' => $enquiry_details,'enquiries' => $enquiries,'companies' => $companies,'review' => $review]);
    }

    public function enquiry_confirm(Request $request,$code){
      $arr_code = explode('_',$code);
      $complaint_code = $arr_code[0];
      $detail_id = $arr_code[1];
      if($request->cmd == "admin-approve"){
        if($request->status === "true"){
          $status = 1;
        }else{
          $status = 0;
        }
        $update_detail = EnquiryDetail::where('complaint_code',$complaint_code)->orderBy('id','DESC')->first();
        if($update_detail != ""){
          $update_detail->update(['status' => $status]);
        }
        $update_enquiry = Enquiry::where('complaint_code',$complaint_code)->update(['status' => 1]);
        return "true";
      }else{
        $update_detail = EnquiryDetail::find($detail_id)->update(['status' => 1]);
        $update_enquiry = Enquiry::where('complaint_code',$complaint_code)->update(['status' => 1]);

        return redirect('enquiry');
      }
    }

    public function ask_question(Request $request){
     if(Auth::check()){
      $enquiries = Enquiry::where('user_id',Auth::user()->id)->get();
    }else{
      $enquiries = Enquiry::get();
    }
    $companies = Perusahaan::get();
    $num = Enquiry::orderBy('id','DESC')->first();

    if($num){
      $arr_num = explode('-',$num->complaint_code);

      $num = (int)ltrim($arr_num[2], '0');

      $num+=1;
    }else{
      $num = 1;
    }
    $num = str_pad($num, 6, "0", STR_PAD_LEFT); 
    $arr_type = explode('|',$request->type);
    $type = $arr_type[0];
    $email_to = $arr_type[1];
    $tgl = Carbon::now()->format('dmY');
    $complaint_code = $tgl.'-'.Auth::user()->id.'-'.$num;
    $path = 'file/enquiry/'.$complaint_code;
    $files = [];
    if($request->hasfile('myfiles')){

      foreach($request->file('myfiles') as $key => $file){


        $ext = $file->getClientOriginalExtension();
        if($ext != ""){
          $file_path = Storage::disk('public')->putFileAs($path, $file,uniqid().$key.'.'.$ext);
        }else{
          $file_path = Storage::disk('public')->putFileAs($path, $file,uniqid().$key);
        }
          //$file_path = $file->storeAs($path, $complaint_code.time().'.'.$ext);

        array_push($files, $file_path);
      }
    }
    $file = implode("|", $files);
    $request->merge(['complaint_code' => $complaint_code]);
    $request->merge(['user_id' => Auth::user()->id]);
    $request->merge(['type' => $type]);
    $request->merge(['email_to' => $email_to]);
    $request->merge(['status' => 0]);
    $request->merge(['files' => $file]);
    $create_enquiry = Enquiry::create($request->all());
    $request->merge(['date_created' => $create_enquiry->created_at]);
    $user_data = User::find($request->user_id)->toArray();
    $request->merge($user_data);

    $send_mail = Mail::send(new EnquiryMail($request));
    $send_feedback = Mail::send(new EnquiryFeedbackMail($request));
    if($request->from != ""){
      if($request->from == "admin"){
       return redirect()->back()->with('enquiry-response','enquiry successfully created <br> reference code : '.$complaint_code);   
     }

   }
   return redirect('/enquiry')->with('reference_code',$complaint_code)->with('response','ask-question');
 }

 public function post_review(Request $request){
  $request->merge(['user_id' => auth()->user()->id]);
  $review_exists = Review::where('user_id',auth()->user()->id)->first();
  if($review_exists){
    $update_review = Review::where('user_id',auth()->user()->id)->update($request->except('_token','submit'));
  }else{
    $submit_review = Review::create($request->all());
  }
  return redirect('enquiry');
}
public function subscribe_newsletter(Request $request){
  Newsletter::subscribe($request->email);
  Mail::send(new SubscribeFeedbackMail($request->email));
  return redirect()->back()->with('messages','Thanks for subscribing to our newsletter !');
}

public function about_us()
{
  return view('about_us');
}
public function why_choose_us()
{
  return view('why_choose_us');
}
public function product_languages()
{
  $languages = Language::orderBy('KD')->get();
  //dd(PacketPriceDetails::selectRaw('REF_PAKET,tb_paket_bimbel.NAMA')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->leftJoin('course_packet_settings','course_packet_settings.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->groupBy('REF_PAKET','tb_paket_bimbel.NAMA')->where('pricelists.status',1)->where('course_packet_settings.status','!=','0')->where('tb_paket_bimbel.REF_BAHASA',$languages->first()->KD)->get());
  $products = PaketBimbel::where('REF_BAHASA',$languages->first()->KD)->leftJoin('course_packet_settings','course_packet_settings.KD','tb_paket_bimbel.KD')->join(DB::raw('(select tb_paket_bimbel_dtlharga.REF_PAKET from tb_paket_bimbel_dtlharga left join pricelists on pricelists.KD = tb_paket_bimbel_dtlharga.KD where pricelists.status = 1 group by tb_paket_bimbel_dtlharga.REF_PAKET) as pricelist'),'tb_paket_bimbel.KD','pricelist.REF_PAKET')->where('course_packet_settings.status','!=',"0")->get();
  return view('products',compact('languages','products'));
}
public function news(News $model, Request $request)
{
  if(count($request->all())){
   $model2 = News::where('status',1)->where('type','news')->where('type_id',1)->orderBy('id','DESC')->first();     
   $news_types = NewsType::get();
   $news = new News();
   $news = $news->where('status',1);
   if($request->category != ""){
    $news = $news->where('type_id',$request->category);
  }
  if($request->q != ""){
    if(substr($request->q, 0,1) == "#"){
      $news = $news->withAnyTag([$request->q]);
    }else{
     $news = $news->orWhere(function($query) use ($request){
      $fuzzySearch = implode("%", str_split($request->q));
      $fuzzySearch = "%$fuzzySearch%";
      $query->whereRaw('title like "'.$fuzzySearch.'"')->orWhere('author_name','like','%'.$request->q.'%');
    });
   }
 }
 $news = $news->orderBy('id','DESC')->paginate(10);

 $this_tags = [];
 return view('news' ,['recent_news'=> $model2 ,'news' => $news,'this_tags' => $this_tags,'title' => 'news','news_types' => $news_types]);
}else{

  $model2 = $model->where('status',1)->where('type','news')->where('type_id',1)->orderBy('id','desc')->first();
  $news_types = NewsType::get();
      //$this_tags = $model2::thisNewsTags($model2->id)->pluck('name');
  $this_tags = [];
}
return view('news' ,['recent_news'=> $model2 ,'news' => $model->where('status',1)->where('type_id',1)->orderBy('id','Desc')->paginate(10),'this_tags' => $this_tags,'title' => 'news','news_types' => $news_types]);
}


/*public function info_lowker(News $model)
{
  $news_types = NewsType::get();
  $model2 = $model->where('status',1)->where('type_id',2)->orderBy('id','desc')->first();
  if($model2 != ""){
    $this_tags = $model2::thisNewsTags($model2->id)->pluck('name');
  }else{
    $this_tags = [];
  }
  return view('news' ,['recent_news'=> $model2 ,'news' => $model->where('type_id',2)->where('status',1)->orderBy('id','Desc')->paginate(6),'this_tags' => $this_tags,'title' => 'Info Lowker','news_types' => $news_types,'category' => 2]);
}*/

public function news_view($year,$month,$slug){
  $news = new News;
  $news = $news::where('slug',$slug)->where('type_id',1)->first();
  $this_tags = $news::thisNewsTags($news->id)->pluck('name');

  $news2 = new News;
  $news2 = $news2::where('status',1)->where('type_id',1)->orderBy('id','Desc')->take(10)->get();

  event(new NewsView($news));
  return view('news-view',['news' => $news,'new_news' => $news2,'this_tags' => $this_tags]);
}

/*public function info_lowker_view($year,$month,$slug){
  $news = new News;
  $news = $news::where('slug',$slug)->where('type_id',2)->first();
  $this_tags = $news::thisNewsTags($news->id)->pluck('name');

  $news2 = new News;
  $news2 = $news2::where('status',1)->where('type_id',2)->orderBy('id','Desc')->take(4)->get();


  return view('news-view',['news' => $news,'new_news' => $news2,'this_tags' => $this_tags]);
}*/

public function news_tags($tag,News $model){
  $new_news = $model::where('status',1)->where('type_id',1)->orderBy('id','Desc')->take(5)->get();
  return view('news-tags',['news' => $model::where('type_id',1)->withAnyTag([$tag])->get(),'tag' => $tag,'new_news' => $new_news]);
}

/*public function info_lowker_tags($tag,News $model){
  $new_news = $model::where('status',1)->where('type_id',2)->orderBy('id','Desc')->take(5)->get();
  return view('news-tags',['news' => $model::where('type_id',2)->withAnyTag([$tag])->get(),'tag' => $tag,'new_news' => $new_news]);
}*/
public function media_promo(PromoNews $model){
  $banner = New BannerModel;
  $banner = $banner->get();
  return view('promo' ,['news' => $model->where('type_id',1)->where('status',1)->orderBy('end_date','ASC')->paginate(20),'type' => "promo",'banner' => $banner]);
}
public function media_promo_view($year,$month,$slug){
  $promo = new PromoNews;
  $promo = $promo::where('slug',$slug)->first();
  $this_tags = $promo::thisNewsTags($promo->id)->pluck('name');
  $promo2 = new PromoNews;
  $promo2 = $promo2::where('id','!=',$promo->id)->where('status',1)->orderBy('id','Desc')->take(4)->get();

  return view('promo-view',['news' => $promo,'new_news' => $promo2,'this_tags' => $this_tags,'type' => "promo"]);
}
public function media_promo_tags($tag,PromoNews $model){
  $new_news = $model::where('status',1)->orderBy('id','Desc')->take(5)->get();
  return view('promo-news-tags',['news' => $model::withAnyTag([$tag])->get(),'tag' => $tag,'new_news' => $new_news,'type' => "promo"]);
}

public function info_lowker(PromoNews $model){
  $news =  $model->where('type_id',3)->where('status',1)->orderBy('end_date','ASC')->paginate(20);
  return view('promo' ,['news' => $news,'type' => "info-lowker"]);
}
public function info_lowker_view($year,$month,$slug){
  $promo = new PromoNews;
  $promo = $promo::where('slug',$slug)->first();
  $this_tags = $promo::thisNewsTags($promo->id)->pluck('name');
  $promo2 = new PromoNews;
  $promo2 = $promo2::where('id','!=',$promo->id)->where('status',1)->where('type_id',3)->orderBy('id','Desc')->take(8)->get();
  return view('promo-view',['news' => $promo,'new_news' => $promo2,'this_tags' => $this_tags,'type' => "info-lowker"]);
}
public function info_lowker_tags($tag,PromoNews $model){
  $new_news = $model::where('type_id',3)->where('status',1)->orderBy('id','Desc')->take(5)->get();
  return view('promo-news-tags',['news' => $model::where('type_id',3)->withAnyTag([$tag])->get(),'tag' => $tag,'new_news' => $new_news,'type' => "info-lowker"]);
}
public function filter_beasiswa(Request $request, PromoNews $model){
  if($request->cmd == "reset"){
   for($i = 1; $i <= 12; $i++){   
    $arr_beasiswa =  collect($this->beasiswa_query($model,"start",$request->jenjang,$i));
    $arr_beasiswa = $arr_beasiswa->merge($this->beasiswa_query($model,"end",$request->jenjang,$i));
    if(count($arr_beasiswa)){
      $beasiswa[$i] = $arr_beasiswa;
    }
  }
  return view('filter-beasiswa',['data_beasiswa' => $beasiswa]);
}

$beasiswa = [];

   // $beasiswa[$i]['start'] =  $model->selectRaw('promo_news.*,start as type_beasiswa)')->whereRaw('MONTH(start_date) = "'.$i.'"')->get();
   // $beasiswa[$i]['end'] = $model->selectRaw('promo_news.*,end as type_beasiswa')->whereRaw('MONTH(end_date) = "'.$i.'"')->get();
if($request->status != ""){
  if (in_array("start", $request->status) && in_array("end", $request->status) ){
    if($request->month != ""){
     $arr_beasiswa =  collect($this->beasiswa_query($model,"start",$request->jenjang,$request->month));
     $arr_beasiswa = $arr_beasiswa->merge($this->beasiswa_query($model,"end",$request->jenjang,$request->month));
     if(count($arr_beasiswa)){
       $beasiswa[$request->month] = $arr_beasiswa;
     }
   }else{
     for($i = 1; $i <= 12; $i++){   
      $arr_beasiswa =  collect($this->beasiswa_query($model,"start",$request->jenjang,$i));
      $arr_beasiswa = $arr_beasiswa->merge($this->beasiswa_query($model,"end",$request->jenjang,$i));
      if(count($arr_beasiswa)){
        $beasiswa[$i] = $arr_beasiswa;
      }
    }
  }

}
else{

 if (in_array("start", $request->status)){
  if($request->month != ""){
   $arr_beasiswa =  collect($this->beasiswa_query($model,"start",$request->jenjang,$request->month,$request->status));
   if(count($arr_beasiswa)){
     $beasiswa[$request->month] = $arr_beasiswa;
   }
 }else{
   for($i = 1; $i <= 12; $i++){   
    $arr_beasiswa =  collect($this->beasiswa_query($model,"start",$request->jenjang,$i,$request->status));
    if(count($arr_beasiswa)){
      $beasiswa[$i] = $arr_beasiswa;
    }
  }
}
}else if(in_array("end", $request->status)){

  if($request->month != ""){

    $arr_beasiswa =  collect($this->beasiswa_query($model,"end",$request->jenjang,$request->month,$request->status));
    if(count($arr_beasiswa)){
      $beasiswa[$request->month] = $arr_beasiswa;
    }
  }else{
   for($i = 1; $i <= 12; $i++){   
    $arr_beasiswa =  collect($this->beasiswa_query($model,"end",$request->jenjang,$i,$request->status));
    if(count($arr_beasiswa)){
      $beasiswa[$i] = $arr_beasiswa;
    }
  }

}}}

}else{

 if($request->month != ""){
   $arr_beasiswa =  collect($this->beasiswa_query($model,"start",$request->jenjang,$request->month));

   $arr_beasiswa = $arr_beasiswa->merge($this->beasiswa_query($model,"end",$request->jenjang,$request->month));
   if(count($arr_beasiswa)){
     $beasiswa[$request->month] = $arr_beasiswa;
   }
 }else{
   for($i = 1; $i <= 12; $i++){   
    $arr_beasiswa =  collect($this->beasiswa_query($model,"start",$request->jenjang,$i));
    $arr_beasiswa = $arr_beasiswa->merge($this->beasiswa_query($model,"end",$request->jenjang,$i));
    if(count($arr_beasiswa)){
      $beasiswa[$i] = $arr_beasiswa;
    }
  }
}
}



return view('filter-beasiswa',['data_beasiswa' => $beasiswa]);
}

protected function beasiswa_query($model,$type,$jenjang = null,$month = null){
 $jenjang_beasiswa = \Conner\Tagging\Model\Tag::inGroup('Jenjang')->pluck('name')->toArray();

 $model = $model->selectRaw('promo_news.*,"'.$type.'" as type_beasiswa,'.$type.'_date as sort_date' )->where('type_id',2)->whereRaw('MONTH('.$type.'_date) = "'.$month.'"');
 if($jenjang != ""){
  $model = $model->withAnyTag($jenjang);
}
$model = $model->with(['tagged' => function($query) use ($jenjang_beasiswa){
  return $query->whereIn('tag_name',$jenjang_beasiswa)->orderBy('tag_name');
}])->get();

return $model;
}

public function media_beasiswa(PromoNews $model){
  //$beasiswa = collect($model->selectRaw('MONTHNAME(start_date) as month')->groupBy(\DB::raw('MONTHNAME(start_date)'))->pluck('month'))->flip();
  //foreach($beasiswa as $key => $bulan){
  //  $beasiswa[$key] = $model->whereRaw('MONTHNAME(start_date) = "'.$key.'"')->get();
  //}
  $beasiswa = [];
  for($i = 1; $i <= 12; $i++){
   // $beasiswa[$i]['start'] =  $model->selectRaw('promo_news.*,start as type_beasiswa)')->whereRaw('MONTH(start_date) = "'.$i.'"')->get();
   // $beasiswa[$i]['end'] = $model->selectRaw('promo_news.*,end as type_beasiswa')->whereRaw('MONTH(end_date) = "'.$i.'"')->get();
    $arr_beasiswa =  collect($model->selectRaw('promo_news.*,"start" as type_beasiswa')->whereRaw('MONTH(start_date) = "'.$i.'"')->get());
    $arr_beasiswa = $arr_beasiswa->merge($model->selectRaw('promo_news.*,"end" as type_beasiswa')->whereRaw('MONTH(end_date) = "'.$i.'"')->get());
    $beasiswa[$i] = $arr_beasiswa;
  }
 // $jenjang_beasiswa = JenjangBeasiswa::get();
  $jenjang_beasiswa = \Conner\Tagging\Model\Tag::inGroup('Jenjang')->get();
  return view('beasiswa' ,['data_beasiswa' => $beasiswa,'type' => "beasiswa",'jenjang_beasiswa' => $jenjang_beasiswa]);
}
public function media_beasiswa_view($year,$month,$slug){
  $promo = new PromoNews;
  $promo = $promo::where('slug',$slug)->first();
  $promo->increment('views');

  $this_tags = $promo::thisNewsTags($promo->id)->pluck('name');
  $promo2 = new PromoNews;
  $promo2 = $promo2::where('id','!=',$promo->id)->where('status',1)->orderBy('id','Desc')->take(4)->get();
  return view('promo-view',['news' => $promo,'new_news' => $promo2,'this_tags' => $this_tags,'type' => "beasiswa"]);
}
public function media_beasiswa_tags($tag,PromoNews $model){
  $new_news = $model::where('status',1)->orderBy('id','Desc')->take(5)->get();
  return view('promo-news-tags',['news' => $model::withAnyTag([$tag])->get(),'tag' => $tag,'new_news' => $new_news,'type' => "beasiswa"]);
}

public function events()
{
  $curr_year = date('Y');
  $ielts_date = Events::where('event_type_id',2)->whereRaw('YEAR(tgl_mulai)',$curr_year)->where('tgl_mulai','>=','CURDATE()')->get();
  $toefl_date = Events::where('event_type_id',3)->whereRaw('YEAR(tgl_mulai)',$curr_year)->where('tgl_mulai','>=','CURDATE()')->orderBy('tgl_mulai')->get();
  $events = Events::selectRaw('nama as title, tgl_mulai as start, tgl_selesai as end, full_day_event as allDay')->where('tgl_mulai','>=',date("Y").'-'.'01'.'-'.'01')->where('tgl_selesai','<=',date("Y").'-'.'12'.'-'.'31')->orderBy('tb_events.tgl_mulai','ASC')->get();
  $event_types = EventsType::get();

  return view('events',['ielts_date' => $ielts_date,'event_types' => $event_types,'toefl_date' => $toefl_date,'events' => $events]);
}

public function events_type($type, Events $events){
  if($type == "webinars"){
    $events = Events::where('event_type_id','6')->where('tb_events_articles.status','1')->join('tb_events_articles','tb_events_articles.event_id','tb_events.id')->orderBy('tb_events.tgl_mulai','ASC')->paginate(20);
    return view('media.webinars',['news' => $events,'type' => $type]);
  }elseif($type == "expo"){
    $expo = Events::selectRaw('tb_events.*,CURDATE()')->where('event_type_id','1')->where('tb_events.status','1')->whereRaw('date(tb_events.tgl_selesai) >= CURDATE()')->orderBy('tb_events.tgl_mulai','ASC')->get();


    return view('media.expo.index',['expo' => $expo]);
  }
  else{
    abort(404);
  }
}

public function events_expo($kd){
  $event = Events::where('kd',$kd)->first();
  $lobby = EventLobby::find($event->id);
  return view('media.expo.main',compact('event','lobby'));
}
public function events_expo_exhibitors($kd){
  $event = Events::where('kd',$kd)->first();
  $event_id = $event->id;
  $exhibitors = EventExhibitor::selectRaw('tb_events_exhibitors.*,countries.name as country_name')->where('event_id',$event_id)->join('countries','countries.id','tb_events_exhibitors.country_id')->get();
  $exhibitors_json = $exhibitors->toJson();
  return view('media.expo.exhibitors',['event' => $event,'exhibitors' => $exhibitors,'exhibitors_json' => $exhibitors_json,'event_id' => $event_id]);
}

public function events_expo_pavillions($kd){
  $event = Events::where('kd',$kd)->first();
  $event_id = $event->id;
  $exhibitors = EventExhibitor::selectRaw('tb_events_exhibitors.*,countries.name as country_name')->where('event_id',$event_id)->join('countries','countries.id','tb_events_exhibitors.country_id')->get();
  return view('media.expo.pavillions',['event' => $event,'exhibitors' => $exhibitors,'event_id' => $event_id]);
}

public function expo_content_ajax(Request $request){
  if($request->type == "videos"){
    $content = EventVideo::where('event_id',$request->event_id)->where('exhibitor_id',$request->exhibitor_id)->get();
  }else if($request->type == "brochures"){
    $content = EventBrochure::where('event_id',$request->event_id)->where('exhibitor_id',$request->exhibitor_id)->get();
  }else if($request->type == "about"){
    $content = EventExhibitor::selectRaw('tb_events_exhibitors.*,countries.name as country_name')->where('event_id',$request->event_id)->join('countries','countries.id','tb_events_exhibitors.country_id')->find($request->exhibitor_id);
  }else if($request->type == "photos"){
    $content = EventPhoto::where('event_id',$request->event_id)->where('exhibitor_id',$request->exhibitor_id)->get();
  }

  return view('media.expo.content',['type' => $request->type,'content' => $content]);
}

public function events_type_view($type,$year,$month,$slug, Events $events, EventsArticle $eventArticle){
  if($type == "webinars"){
    $events = Events::selectRaw('tb_events.*,tb_events_articles.*,tb_events_articles.id as article_id')->where('tb_events_articles.slug',$slug)->join('tb_events_articles','tb_events_articles.event_id','tb_events.id')->first();
    $this_tags = $eventArticle::thisNewsTags($events->article_id)->pluck('name');
    $events2 = $events::where('tb_events.id','!=',$events->id)->where('tb_events_articles.status',1)->join('tb_events_articles','tb_events_articles.event_id','tb_events.id')->orderBy('tb_events.id','Desc')->take(4)->get();
    return view('media.webinars-view',['news' => $events,'new_news' => $events2,'type' => $type,'this_tags' => $this_tags]);
  }else{
    abort(404);
  }
}

public function events_guest_book($kd){
  $events = new Events;

  $events = $events->where('kd','=',$kd)->where('status','=',1)->first();

  $events_logo = EventsLogo::select('lokasi_logo')->where('ref_events','=',$kd)->get();
  return view('events/guest-book',['events' => $events,'logo' => $events_logo]);

}
public function post_events_guest_book($kd,Request $request){
  $events = EventsGuestBook::create($request->all());

  //$events->REF_EVENT = $request->event;
      /*    $events->REF_EVENT = $request->kd;
      $events->NAMA = $request->name;
      $events->EMAIL = $request->email;
      $events->NO_TELEPON = $request->no_telepon;
      if(!empty($request->kelas)){
        $events->KELAS = $request->kelas;
      }
      $events->save();
      */
      Mail::send(new GuestBookMail($request));
    // return redirect('events/'.$events.'/guest-book');
      return redirect('events/'.$kd.'/guest-book')->with('message','Selamat Anda Sudah Terdaftar !');
    }

    public function events_term_condition(){
      return view('events/term-and-condition');
    }

    public function english()
    {
      return view('/language/english');
    }
    
    public function language_products($slug){
      $language = Language::where('KD',$slug)->first();
      if(!$language){
        return abort(404,"Unknown Products");
      }
      $products = PaketBimbel::where('REF_BAHASA',$language->KD)->leftJoin('course_packet_settings','course_packet_settings.KD','tb_paket_bimbel.KD')->join(DB::raw('(select tb_paket_bimbel_dtlharga.REF_PAKET from tb_paket_bimbel_dtlharga left join pricelists on pricelists.KD = tb_paket_bimbel_dtlharga.KD where pricelists.status = 1 group by tb_paket_bimbel_dtlharga.REF_PAKET) as pricelist'),'tb_paket_bimbel.KD','pricelist.REF_PAKET')->where('course_packet_settings.status','!=',"0")->get();
      
      return view('products.language',compact('products','language'));
    }

    public function ielts_class()
    {
      return view('/language/english/ielts-class');
    }
    public function testimony()
    {
      $testimony = new Testimony;
      return view('testimony',['testimonies' => $testimony->where('status',1)->get()]);
    }
    public function form_study_tour_kuching(){
      return view('form.form-study-tour-kuching');
    }
    public function form_study_tour_kuching_tac(){
      return view('form.form-study-tour-kuching-tac');
    }
    public function post_form_study_tour_kuching(Request $request){
     $data_uri = $request->signature;
     $encoded_image = explode(",",$data_uri)[1];
      //$decoded_image = base64_decode($encoded_image);

     $request->merge(['signature' => $data_uri]);

     $pdf = PDF::loadview('form.surat-pernyataan-study-tour',['data' => $request]);
     Mail::send(new FormStudyTourMail($pdf,$request));
      //return redirect('visa-statement-letter')->with('message','Data Sudah Berhasil Terkirim !');
   }
   public function form_testimony(){
    return view('form.form-testimony');
  }
  public function post_form_testimony(Request $request){


    if($request->hasFile('foto')){
      $file_img = $request->file('foto');
      $path = 'img/testimony';
      $ext_img = $file_img->getClientOriginalExtension();
      $path_img = $file_img->storeAs($path, $request->name.'.'.$ext_img,'public');
      $request->merge(['image' => $path_img]);
    }
    Mail::send(new TestimonyMail($request));
    $testimony = Testimony::create($request->all());
    return redirect('form-testimony')->with('message','Data Sudah Terkirim !');
  }

  public function form_webinars_guest_speaker(Request $request){
    return view('form.form-webinars-guest-speaker');
  }

  public function post_form_webinars_guest_speaker(Request $request){

    Mail::send(new FormWebinarsGuestSpeakerMail($request));
    return redirect('form-webinars-guest-speaker')->with('message','Data Sudah Terkirim !');
  }

  public function form_design_webinars_guest_speaker(Request $request){
    return view('form.form-design-webinars-guest-speaker');
  }

  public function post_form_design_webinars_guest_speaker(Request $request){

    Mail::send(new FormDesignWebinarsGuestSpeakerMail($request));
    return redirect('form-design-webinars-guest-speaker')->with('message','Data Sudah Terkirim !');
  }

  public function form_design_promo(Request $request){
    return view('form.form-design-promo');
  }

  public function post_form_design_promo(Request $request){
    Mail::send(new FormDesignPromoMail($request));
    return redirect('form-design-promo')->with('message','Data Sudah Terkirim !');
  }

  public function form_permintaan_pembuatan_surat_menyurat(Request $request){
    return view('form.form-permintaan-pembuatan-surat-menyurat');
  }

  public function post_form_permintaan_pembuatan_surat_menyurat(Request $request){
    Mail::send(new FormPermintaanPembuatanSuratMail($request));
    return redirect('form-permintaan-pembuatan-surat-menyurat')->with('message','Data Sudah Terkirim !');
  }



  public function toefl_class()
  {
    return view('/language/english/toefl-class');
  }
  public function bep()
  {
    return view('/language/english/bep');
  }

  public function teen_class(){
    return view('language/english/teen-class');
  }
  public function young_learners()
  {
    return view('/language/english/young-learners');
  }
  public function gmat()
  {
    return view('/language/english/gmat');
  }
  public function gre()
  {
    return view('/language/english/gre');
  }
  public function sat()
  {
    return view('/language/english/sat');
  }
  public function pte()
  {
    return view('/language/english/pte');
  }
  public function study_abroad()
  {
    $countries = Country::orderBy('name','ASC')->get();
    return view('/study abroad/index',compact('countries'));
  }
  public function media()
  {
    return view('/media');
  }
  public function sa_country($country)
  {
    if(!view()->exists('study abroad.'.$country)){
      abort(404);
    }
    return view('/study abroad/'.$country);
  }
  public function ielts_test()
  {
    return view('/language/ielts-test');
  }
  public function bept(){
    $perusahaan = Perusahaan::get();

    return view('/language/bept',['perusahaan' => $perusahaan]);
  }
  public function post_bept(Request $request){
    $tanggal_lahir = $request->tahun_lahir.'-'.$request->bulan_lahir.'-'.$request->tgl_lahir;
    $request->merge(['TGL_LAHIR' => $tanggal_lahir]);
    $test_id = 3;
    $request->merge(['test_id' => $test_id]);
    $module_id = OtModule::where('test_id',$test_id)->value('id');
    $request->merge(['module_id' => $module_id]);
    $test_name = OtTest::find($test_id);
    if($test_name){
      $test_name = $test_name->name;
    }
    $request->merge(['test_name' => $test_name]);
    $request->merge(['token' => $request->_token.'-'.time()]);
    $daftar =  OtRegistration::create($request->all());
    if($daftar){
      Mail::send(new OtRegistrationMail($request));

      return redirect()->back()->with('message','Data Sudah Berhasil Terkirim !');
    }else{
      return "Error";
    }
  }
  public function careers()
  {
    return view('/careers');
  }
  public function toefl_test()
  {
    return view('/language/toefl-test');
  }

  public function pte_academic_official()
  {
    $now = date('Y-m-d',Carbon::now()->timestamp);
    $tgl_pte = Events::selectRaw('DATE_FORMAT(tgl_mulai, "%d-%c-%Y") as tgl_mulai')->where('event_type_id',8)->where('tgl_mulai','>=',$now)->orderBy('tgl_mulai','ASC')->pluck('tgl_mulai');
    $harga_fast_regis = PacketPriceDetails::join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_PAKET','LT817')->where('REF_LEVEL','41')->first();
    $harga_pte = PacketPriceDetails::join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_PAKET','LT817')->where('REF_LEVEL','38')->first();
    if($harga_fast_regis != ""){
      $harga_fast_regis = $harga_fast_regis->HARGA_PAKET;
      $harga_pte = $harga_pte->HARGA_PAKET;
    }
    return view('/language/pte-academic-official',['tgl_pte' => $tgl_pte,'harga_fast_regis' => $harga_fast_regis,'harga_pte' => $harga_pte]);
  }

  public function post_pte_academic_official(Request $request){
    $formPTE = new RegisPaket;
    $formPTE_dtl = new RegisPaketDtl;
    $regisPaketKD = RegisPaket::orderBy('id','desc')->limit(0)->value('KD');
    $numPaket = substr($regisPaketKD,-4);
    $numPaket = (int)$numPaket;
    $numPaket++;
    $width = 4;
    $kd = 'CS'.date('y').date('m'). str_pad((string)$numPaket, $width, "0", STR_PAD_LEFT);
    $formPTE->KD = $kd;
    $formPTE->users_id = Auth::user()->id;
    $formPTE->REF_PERUSAHAAN = "BEST PARTNER PONTIANAK";
    $nama = '';
    if($request->nama_depan!=''){
      $nama .= $request->nama_depan;
    }
    if($request->nama_tengah!=''){
      $nama .= ' '.$request->nama_tengah;
    }

    if($request->nama_belakang!=''){
      $nama .= ' '.$request->nama_belakang;
    }

    $request->merge(['NAMA' => $nama]);
    $formPTE->NAMA =  $nama;
    $formPTE->JK = $request->JK;
    $formPTE->TGL_LAHIR = date('Y-m-d', strtotime($request->TGL_LAHIR));
    $formPTE->ALAMAT = $request->ALAMAT;
    $formPTE->KOTA_KELAHIRAN = $request->KOTA;
    $formPTE->KOTA = $request->KOTA;
    $formPTE->POSTAL_CODE = $request->POSTAL_CODE;
    $formPTE->AGAMA = $request->AGAMA;
    $formPTE->KONTAK = $request->KONTAK;
    $formPTE->EMAIL = $request->EMAIL;
    $formPTE->REF_KTP = $request->REF_KTP;
    $formPTE->REF_PASPOR = $request->REF_PASPOR;
    $formPTE->TEST_MODULE = $request->TEST_MODULE;
    $formPTE->TITLE = $request->TITLE;
    $formPTE->TGL_TEST = $request->TGL_TEST;
    $formPTE->TGL_SIMULASI = $request->TGL_SIMULASI;
    $formPTE->TINGKAT_PEKERJAAN = $request->TINGKAT_PEKERJAAN;
    $formPTE->SEKTOR_PEKERJAAN = $request->SEKTOR_PEKERJAAN;
    $formPTE->TINGKAT_PENDIDIKAN = $request->TINGKAT_PENDIDIKAN;
    if($request->TINGKAT_PEKERJAAN_LAINNYA != ""){
      $request->merge(['TINGKAT_PEKERJAAN' => $request->TINGKAT_PEKERJAAN_LAINNYA]);
      $formPTE->TINGKAT_PEKERJAAN = $request->TINGKAT_PEKERJAAN_LAINNYA;
    }
    if($request->SEKTOR_PEKERJAAN_LAINNYA != ""){
      $request->merge(['SEKTOR_PEKERJAAN' => $request->SEKTOR_PEKERJAAN_LAINNYA]);
      $formPTE->SEKTOR_PEKERJAAN = $request->SEKTOR_PEKERJAAN_LAINNYA;
    }
    if($request->TINGKAT_PENDIDIKAN_LAINNYA != ""){
      $request->merge(['TINGKAT_PENDIDIKAN' => $request->TINGKAT_PENDIDIKAN_LAINNYA]);
      $formPTE->TINGKAT_PENDIDIKAN = $request->TINGKAT_PENDIDIKAN_LAINNYA;
    }
    $formPTE->JURUSAN = $request->JURUSAN;
    $formPTE->LAMA_BELAJAR_INGGRIS = $request->LAMA_BELAJAR_INGGRIS;
    $formPTE->NEGARA_TUJUAN = $request->NEGARA_TUJUAN;
    $formPTE->ALASAN = $request->ALASAN;
    $formPTE->TGL_BERLAKU_PASPOR = date('Y-m-d', strtotime($request->TGL_BERLAKU_PASPOR));
    $formPTE->AMBIL_GELAR = $request->AMBIL_GELAR;
    $formPTE->AMBIL_JURUSAN = $request->AMBIL_JURUSAN;
    $formPTE->REF_UNIVERSITAS = $request->REF_UNIVERSITAS;
    $token = $this->generate_registration_token();  
    $request->merge(['_token' => $token]);
    $formPTE->_token = $token;
    if ($request->hasfile('KTP') || $request->hasfile('PASPOR')) {
      $file_ktp = $request->file('KTP');
      $file_paspor = $request->file('PASPOR');
          //  $path = 'public/files/ielts-official/'.date('d-m-Y').'/'.$nama;
      $path = 'public/files/pte-academic-official/'.date('d-m-Y').'/'.$kd;

      $ext_ktp = $file_ktp->getClientOriginalExtension();
      $ext_paspor = $file_paspor->getClientOriginalExtension();
      $path_ktp = $file_ktp->storeAs($path, 'foto_ktp.'.$ext_ktp);
      $path_paspor = $file_paspor->storeAs($path, 'foto_paspor.'.$ext_paspor);
      $request->merge(['PATH_KTP' => $path_ktp]);
      $request->merge(['PATH_PASPOR' => $path_paspor]);
      $formPTE->PATH_KTP = $path_ktp;
      $formPTE->PATH_PASPOR = $path_paspor;
    }
    $ref_paket = "LT817";
    $ref_level = "38";
    if($request->fast_regis == "on"){
      $ref_level = "41";
    }
    $ref_kategori = "PRIVATE";
    $request->merge(['REF_PAKET' => $ref_paket]);
    $request->merge(['REF_LEVEL' => $ref_level]);
    $request->merge(['REF_KATEGORI' => $ref_kategori]);
    $request->merge(['TIPE_KELAS' => "OFFLINE"]);

    $duration = PacketPriceDetails::where('REF_PAKET',$ref_paket)->where('REF_LEVEL',$ref_level)->where('REF_KATEGORI',$ref_kategori)->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->first();

    $request->merge(['REF_PRICELIST' => $duration->KD]);
    $request->merge(['JUMLAH_JAM' => $duration->JUMLAH_JAM]);
    $request->merge(['JUMLAH_PERTEMUAN' => $duration->JUMLAH_PERTEMUAN]);
    $request->merge(['HARGA_PAKET' =>  $duration->HARGA_PAKET]);

    $formPTE_dtl->KD = $kd;
    $formPTE_dtl->REF_PRICELIST = $duration->KD;
    $formPTE_dtl->REF_PAKET = $ref_paket;
    $formPTE_dtl->REF_LEVEL = $ref_level;
    $formPTE_dtl->REF_KATEGORI = $ref_kategori;
    $formPTE_dtl->JUMLAH_JAM =$duration->JUMLAH_JAM;
    $formPTE_dtl->JUMLAH_PERTEMUAN = $duration->JUMLAH_PERTEMUAN;
    $formPTE_dtl->TIPE_KELAS = "OFFLINE";
    $formPTE_dtl->IELTS_MODULE= $request->TEST_MODULE;
    $formPTE->save();
    $formPTE_dtl->save();


    Mail::send(new RegisPTEAcademicOfficialMail($request));
    Mail::send(new RegisPTEAcademicOfficialPaymentsMail($request));
    return redirect('/products/pte-academic/official/')->with('message', 'Data Sudah Terkirim ! <br> Silahkan Cek Email Anda ('.$request->EMAIL.') untuk konfirmasi pembayaran !');
  }

  public function pte_academic_simulation()
  {
    return view('/language/pte-academic-simulation');
  }

  public function post_pte_academic_simulation(Request $request){
    $formPTE = new RegisPaket;
    $formPTE_dtl = new RegisPaketDtl;
    $regisPaketKD = RegisPaket::orderBy('id','desc')->limit(0)->value('KD');
    $numPaket = substr($regisPaketKD,-4);
    $numPaket = (int)$numPaket;
    $numPaket++;
    $width = 4;
    $kd = 'CS'.date('y').date('m'). str_pad((string)$numPaket, $width, "0", STR_PAD_LEFT);
    $formPTE->KD = $kd;
    $formPTE->users_id = Auth::user()->id;
    $formPTE->REF_PERUSAHAAN = "BEST PARTNER PONTIANAK";
    $nama = '';
    if($request->nama_depan!=''){
      $nama .= $request->nama_depan;
    }
    if($request->nama_tengah!=''){
      $nama .= ' '.$request->nama_tengah;
    }

    if($request->nama_belakang!=''){
      $nama .= ' '.$request->nama_belakang;
    }

    $request->merge(['NAMA' => $nama]);
    $formPTE->NAMA =  $nama;
    $formPTE->JK = $request->JK;
    $formPTE->TGL_LAHIR = date('Y-m-d', strtotime($request->TGL_LAHIR));
    $formPTE->ALAMAT = $request->ALAMAT;
    $formPTE->KOTA_KELAHIRAN = $request->KOTA;
    $formPTE->KOTA = $request->KOTA;
    $formPTE->POSTAL_CODE = $request->POSTAL_CODE;
    $formPTE->AGAMA = $request->AGAMA;
    $formPTE->KONTAK = $request->KONTAK;
    $formPTE->EMAIL = $request->EMAIL;
    $formPTE->REF_KTP = $request->REF_KTP;
    $formPTE->REF_PASPOR = $request->REF_PASPOR;
    $formPTE->TEST_MODULE = $request->TEST_MODULE;
    $formPTE->TITLE = $request->TITLE;
    $formPTE->TGL_TEST = $request->TGL_TEST;
    $formPTE->TGL_SIMULASI = $request->TGL_SIMULASI;
    $formPTE->TINGKAT_PEKERJAAN = $request->TINGKAT_PEKERJAAN;
    $formPTE->SEKTOR_PEKERJAAN = $request->SEKTOR_PEKERJAAN;
    $formPTE->TINGKAT_PENDIDIKAN = $request->TINGKAT_PENDIDIKAN;
    if($request->TINGKAT_PEKERJAAN_LAINNYA != ""){
      $request->merge(['TINGKAT_PEKERJAAN' => $request->TINGKAT_PEKERJAAN_LAINNYA]);
      $formPTE->TINGKAT_PEKERJAAN = $request->TINGKAT_PEKERJAAN_LAINNYA;
    }
    if($request->SEKTOR_PEKERJAAN_LAINNYA != ""){
      $request->merge(['SEKTOR_PEKERJAAN' => $request->SEKTOR_PEKERJAAN_LAINNYA]);
      $formPTE->SEKTOR_PEKERJAAN = $request->SEKTOR_PEKERJAAN_LAINNYA;
    }
    if($request->TINGKAT_PENDIDIKAN_LAINNYA != ""){
      $request->merge(['TINGKAT_PENDIDIKAN' => $request->TINGKAT_PENDIDIKAN_LAINNYA]);
      $formPTE->TINGKAT_PENDIDIKAN = $request->TINGKAT_PENDIDIKAN_LAINNYA;
    }
    $formPTE->JURUSAN = $request->JURUSAN;
    $formPTE->LAMA_BELAJAR_INGGRIS = $request->LAMA_BELAJAR_INGGRIS;
    $formPTE->NEGARA_TUJUAN = $request->NEGARA_TUJUAN;
    $formPTE->ALASAN = $request->ALASAN;
    $formPTE->TGL_BERLAKU_PASPOR = date('Y-m-d', strtotime($request->TGL_BERLAKU_PASPOR));
    $formPTE->AMBIL_GELAR = $request->AMBIL_GELAR;
    $formPTE->AMBIL_JURUSAN = $request->AMBIL_JURUSAN;
    $formPTE->REF_UNIVERSITAS = $request->REF_UNIVERSITAS;
    $token = $this->generate_registration_token();  
    $request->merge(['_token' => $token]);
    $formPTE->_token = $token;
    if ($request->hasfile('KTP') || $request->hasfile('PASPOR')) {
      $file_ktp = $request->file('KTP');
      $file_paspor = $request->file('PASPOR');
          //  $path = 'public/files/ielts-official/'.date('d-m-Y').'/'.$nama;
      $path = 'public/files/pte-academic-simulation/'.date('d-m-Y').'/'.$kd;

      $ext_ktp = $file_ktp->getClientOriginalExtension();
      $ext_paspor = $file_paspor->getClientOriginalExtension();
      $path_ktp = $file_ktp->storeAs($path, 'foto_ktp.'.$ext_ktp);
      $path_paspor = $file_paspor->storeAs($path, 'foto_paspor.'.$ext_paspor);
      $request->merge(['PATH_KTP' => $path_ktp]);
      $request->merge(['PATH_PASPOR' => $path_paspor]);
      $formPTE->PATH_KTP = $path_ktp;
      $formPTE->PATH_PASPOR = $path_paspor;
    }
    $ref_paket = "LT817";
    $ref_level = "39";
    $ref_kategori = "PRIVATE";
    $request->merge(['REF_PAKET' => $ref_paket]);
    $request->merge(['REF_LEVEL' => $ref_level]);
    $request->merge(['REF_KATEGORI' => $ref_kategori]);
    $request->merge(['TIPE_KELAS' => "OFFLINE"]);
    $duration = PacketPriceDetails::where('REF_PAKET',$ref_paket)->where('REF_LEVEL',$ref_level)->where('REF_KATEGORI',$ref_kategori)->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->first();

    $request->merge(['REF_PRICELIST' => $duration->KD]);
    $request->merge(['JUMLAH_JAM' => $duration->JUMLAH_JAM]);
    $request->merge(['JUMLAH_PERTEMUAN' => $duration->JUMLAH_PERTEMUAN]);
    $request->merge(['HARGA_PAKET' =>  $duration->HARGA_PAKET]);

    $formPTE_dtl->KD = $kd;
    $formPTE_dtl->REF_PRICELIST = $duration->KD;
    $formPTE_dtl->REF_PAKET = $ref_paket;
    $formPTE_dtl->REF_LEVEL = $ref_level;
    $formPTE_dtl->REF_KATEGORI = $ref_kategori;
    $formPTE_dtl->JUMLAH_JAM =$duration->JUMLAH_JAM;
    $formPTE_dtl->JUMLAH_PERTEMUAN = $duration->JUMLAH_PERTEMUAN;
    $formPTE_dtl->TIPE_KELAS = "OFFLINE";
    $formPTE_dtl->IELTS_MODULE= $request->TEST_MODULE;
    $formPTE->save();
    $formPTE_dtl->save();


    Mail::send(new RegisPTEAcademicSimulationMail($request));
    Mail::send(new RegisPTEAcademicSimulationPaymentsMail($request));
    return redirect('/products/pte-academic/simulation/')->with('message', 'Data Sudah Terkirim ! <br> Silahkan Cek Email Anda ('.$request->EMAIL.') untuk konfirmasi pembayaran !');
  }


  public function toefl_simulation()
  {
    $perusahaan = Perusahaan::get();
    return view('/language/toefl-simulation',['perusahaan' => $perusahaan]);
  }
  public function post_toefl_simulation(Request $request){
    if($request->jenis_test == "offline"){ 
      $regisPaketKD = RegisPaket::orderBy('id','desc')->limit(0)->value('KD');
      $numPaket = substr($regisPaketKD,-4);
      $numPaket = (int)$numPaket;
      $numPaket++;
      $width = 4;
      $kd = 'CS'.date('y').date('m'). str_pad((string)$numPaket, $width, "0", STR_PAD_LEFT);
      $tgl_lahir = date("Y/m/d",strtotime($request->tgl_lahir.'/'.$request->bulan_lahir.'/'.$request->tahun_lahir));
      $request->merge(['KD' => $kd]);
      $ref_paket = 'LT816';
      $ref_level = '40';
      $ref_kategori = 'PRIVATE';
      $request->merge(['REF_PAKET' => $ref_paket]);
      $request->merge(['REF_LEVEL' => $ref_level]);
      $request->merge(['REF_KATEGORI' => $ref_kategori]);
      $request->merge(['TGL_LAHIR' => $tgl_lahir ]);
      $request->merge(['KD' => $kd]);     

      $regis_paket = new RegisPaket;
      $regis_paket_dtl = new RegisPaketDtl;
      $regis_paket->_token = $request->_token;
      $regis_paket->users_id = Auth::user()->id;
      $regis_paket->KD = $kd;
      $regis_paket->REF_PERUSAHAAN = $request->REF_PERUSAHAAN;
      $regis_paket->NAMA = $request->NAMA;
      $regis_paket->KOTA_KELAHIRAN = $request->KOTA_KELAHIRAN;
      $regis_paket->TGL_SIMULASI = $request->TGL_SIMULASI;
      $regis_paket->TGL_LAHIR = $tgl_lahir;
      $regis_paket->ALAMAT = $request->ALAMAT;
      $regis_paket->KOTA = $request->KOTA_KELAHIRAN;
      $regis_paket->KONTAK = $request->KONTAK;
      $regis_paket->EMAIL = $request->EMAIL;
      $regis_paket->REF_KTP = $request->REF_KTP;
      $regis_paket->ALASAN = $request->ALASAN;
      $path = 'public/files/toefl-simulation/offline/'.date('d-m-Y').'/'.$request->NAMA;
      if($request->hasFile('UPLOAD_KTP')){
        $file_ktp = $request->file('UPLOAD_KTP');
        $ext_ktp = $file_ktp->getClientOriginalExtension();
        $path_ktp = $file_ktp->storeAs($path, 'ktp_'.$request->NAMA.'_'.time().'.'.$ext_ktp,'local');
      }
      $regis_paket->PATH_KTP = $path_ktp;

      $duration = PacketPriceDetails::join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_PAKET',$ref_paket)->where('REF_LEVEL',$ref_level)->where('REF_KATEGORI',$ref_kategori)->whereRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) != "ONLINE"')->first();
      $regis_paket_dtl->KD = $kd;
      $regis_paket_dtl->REF_PRICELIST = $duration->KD;
      $regis_paket_dtl->REF_PAKET = $ref_paket;
      $regis_paket_dtl->REF_LEVEL = $ref_level;
      $regis_paket_dtl->REF_KATEGORI = $ref_kategori;
      $regis_paket_dtl->JUMLAH_JAM =$duration->JUMLAH_JAM;
      $regis_paket_dtl->JUMLAH_PERTEMUAN = $duration->JUMLAH_PERTEMUAN;
      $regis_paket_dtl->TIPE_KELAS = "OFFLINE";
      $regis_paket->save();
      $regis_paket_dtl->save();

      Mail::send(new RegisToeflSimulation($request));
      Mail::send(new ToeflSimulationFeedback($request));

      return redirect()->back()->with('message','Data Sudah Berhasil Terkirim !');






    }else if($request->jenis_test == "online"){
      $regisPaketKD = RegisPaket::orderBy('id','desc')->limit(0)->value('KD');
      $numPaket = substr($regisPaketKD,-4);
      $numPaket = (int)$numPaket;
      $numPaket++;
      $width = 4;
      $kd = 'CS'.date('y').date('m'). str_pad((string)$numPaket, $width, "0", STR_PAD_LEFT);
      $tgl_lahir = date("Y/m/d",strtotime($request->tgl_lahir.'/'.$request->bulan_lahir.'/'.$request->tahun_lahir));
      $request->merge(['KD' => $kd]);
      $ref_paket = 'LT816';
      $ref_level = '40';
      $ref_kategori = 'PRIVATE';
      $request->merge(['test_name' => "toefl test"]);
      $request->merge(['test_id' => 2]);
      $request->merge(['module_id' => 2]);

      $request->merge(['TGL_LAHIR' => $tgl_lahir]);
      $request->merge(['REF_KTP' => $request->REF_KTP]);
      $request->merge(['token' => $request->_token.'-'.time()]);

      $regis_paket = new RegisPaket;
      $regis_paket_dtl = new RegisPaketDtl;
      $regis_paket->_token = $request->_token;
      $regis_paket->users_id = Auth::user()->id;
      $regis_paket->KD = $kd;
      $regis_paket->REF_PERUSAHAAN = $request->REF_PERUSAHAAN;
      $regis_paket->NAMA = $request->NAMA;
      $regis_paket->KOTA_KELAHIRAN = $request->KOTA_KELAHIRAN;
      $regis_paket->TGL_SIMULASI = $request->TGL_SIMULASI;
      $regis_paket->TGL_LAHIR = $tgl_lahir;
      $regis_paket->ALAMAT = $request->ALAMAT;
      $regis_paket->KOTA = $request->KOTA_KELAHIRAN;
      $regis_paket->KONTAK = $request->KONTAK;
      $regis_paket->EMAIL = $request->EMAIL;
      $regis_paket->REF_KTP = $request->REF_KTP;
      $regis_paket->ALASAN = $request->ALASAN;
      $path = 'public/files/toefl-simulation/online/'.date('d-m-Y').'/'.$request->NAMA;
      if($request->hasFile('UPLOAD_KTP')){
        $file_ktp = $request->file('UPLOAD_KTP');
        $ext_ktp = $file_ktp->getClientOriginalExtension();
        $path_ktp = $file_ktp->storeAs($path, 'ktp_'.$request->NAMA.'_'.time().'.'.$ext_ktp,'local');
      }
      $regis_paket->PATH_KTP = $path_ktp;

      $duration = PacketPriceDetails::join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_PAKET',$ref_paket)->where('REF_LEVEL',$ref_level)->where('REF_KATEGORI',$ref_kategori)->whereRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) = "ONLINE"')->first();
      $regis_paket_dtl->KD = $kd;
      $regis_paket_dtl->REF_PRICELIST = $duration->KD;
      $regis_paket_dtl->REF_PAKET = $ref_paket;
      $regis_paket_dtl->REF_LEVEL = $ref_level;
      $regis_paket_dtl->REF_KATEGORI = $ref_kategori;
      $regis_paket_dtl->JUMLAH_JAM =$duration->JUMLAH_JAM;
      $regis_paket_dtl->JUMLAH_PERTEMUAN = $duration->JUMLAH_PERTEMUAN;
      $regis_paket_dtl->TIPE_KELAS = "ONLINE";
      $regis_paket->save();
      $regis_paket_dtl->save();


      $daftar =  OtRegistration::create($request->all());
      if($daftar){

        Mail::send(new ApproveOnlineTestNotification($request));
        Mail::send(new OtRegistrationMail($request));
      }
    }

    return redirect()->back()->with('message','Data Sudah Berhasil Terkirim !');
  }
  public function toefl_simulation_payment($token){
    $validasi = OtRegistration::where('token', '=', $token)->first();
    if ($validasi) {
      $tgl_daftar = $validasi->updated_at;
      $today = Carbon::now();
      $datetime1 = new DateTime($tgl_daftar);
      $datetime2 = new DateTime($today);
      $days = $datetime2->diff($datetime1);
      $diff_day =  $days->d;
      //if($diff_day<=2){
      return view('language.toefl-simulation-payment', ['token' => $token,'validasi' => $validasi,'tgl_daftar' => $tgl_daftar]);
      //}else{
      //  abort(403, 'Link Expire ! ');
      //}
    } else {
      abort(403, 'Unauthorized Action ! Wrong Link / Email Account ! ');
    }

  }

  public function post_toefl_simulation_payment(Request $request){

   $token= $request->token;
   $tgl_daftar = $request->tgl_daftar;
   $data = OtRegistration::where('token','=',$token)->first();
   $tgl = date("d-m-Y",strtotime($data->created_at));
   $myfile = $request->file('bukti_pembayaran');
   $path = 'public/files/toefl-simulation/online/'.$tgl.'/'.$data->id;
   $ext = $myfile->getClientOriginalExtension();
   $bukti_pembayaran = $myfile->storeAs($path, 'bukti_pembayaran.'.$ext);
   $data->update(['bukti_pembayaran' => $bukti_pembayaran]);
   return redirect('/products/toefl-test/simulation')->with('message','Bukti pembayaran sudah terupload, kami akan mengirimkan link simulasi ke email anda setelah memverifikasi bukti pembayaran. Proses ini paling lama membutuhkan waktu 1-2 hari.');

 }

 public function toefl_official()
 {
  $now = date('Y-m-d',Carbon::now()->timestamp);
  $tgl_toefl = Events::selectRaw('DATE_FORMAT(tgl_mulai, "%d-%c-%Y") as tgl_mulai')->where('event_type_id',3)->where('tgl_mulai','>=',$now)->orderBy('tgl_mulai','ASC')->pluck('tgl_mulai');

  return view('/language/toefl-official',['tgl_toefl' => $tgl_toefl]);
}

public function post_toefl_official(Request $request){
  $formToefl = new RegisPaket;
  $formToefl_dtl = new RegisPaketDtl;
  $regisPaketKD = RegisPaket::orderBy('id','desc')->limit(0)->value('KD');
  $numPaket = substr($regisPaketKD,-4);
  $numPaket = (int)$numPaket;
  $numPaket++;
  $width = 4;
  $kd = 'CS'.date('y').date('m'). str_pad((string)$numPaket, $width, "0", STR_PAD_LEFT);
  $formToefl->KD = $kd;
  $formToefl->users_id = Auth::user()->id;
  $formToefl->REF_PERUSAHAAN = "BEST PARTNER PONTIANAK";
  $nama = '';
  if($request->nama_depan!=''){
    $nama .= $request->nama_depan;
  }
  if($request->nama_tengah!=''){
    $nama .= ' '.$request->nama_tengah;
  }

  if($request->nama_belakang!=''){
    $nama .= ' '.$request->nama_belakang;
  }

  $request->merge(['NAMA' => $nama]);
  $formToefl->NAMA =  $nama;
  $formToefl->JK = $request->JK;
  $formToefl->TGL_LAHIR = date('Y-m-d', strtotime($request->TGL_LAHIR));
  $formToefl->ALAMAT = $request->ALAMAT;
  $formToefl->KOTA_KELAHIRAN = $request->KOTA;
  $formToefl->KOTA = $request->KOTA;
  $formToefl->POSTAL_CODE = $request->POSTAL_CODE;
  $formToefl->AGAMA = $request->AGAMA;
  $formToefl->KONTAK = $request->KONTAK;
  $formToefl->EMAIL = $request->EMAIL;
  $formToefl->REF_KTP = $request->REF_KTP;
  $formToefl->REF_PASPOR = $request->REF_PASPOR;
  $formToefl->TEST_MODULE = $request->TEST_MODULE;
  $formToefl->TITLE = $request->TITLE;
  $formToefl->TGL_TEST = $request->TGL_TEST;
  $formToefl->TGL_SIMULASI = $request->TGL_SIMULASI;
  $formToefl->TINGKAT_PEKERJAAN = $request->TINGKAT_PEKERJAAN;
  $formToefl->SEKTOR_PEKERJAAN = $request->SEKTOR_PEKERJAAN;
  $formToefl->TINGKAT_PENDIDIKAN = $request->TINGKAT_PENDIDIKAN;
  if($request->TINGKAT_PEKERJAAN_LAINNYA != ""){
    $request->merge(['TINGKAT_PEKERJAAN' => $request->TINGKAT_PEKERJAAN_LAINNYA]);
    $formToefl->TINGKAT_PEKERJAAN = $request->TINGKAT_PEKERJAAN_LAINNYA;
  }
  if($request->SEKTOR_PEKERJAAN_LAINNYA != ""){
    $request->merge(['SEKTOR_PEKERJAAN' => $request->SEKTOR_PEKERJAAN_LAINNYA]);
    $formToefl->SEKTOR_PEKERJAAN = $request->SEKTOR_PEKERJAAN_LAINNYA;
  }
  if($request->TINGKAT_PENDIDIKAN_LAINNYA != ""){
    $request->merge(['TINGKAT_PENDIDIKAN' => $request->TINGKAT_PENDIDIKAN_LAINNYA]);
    $formToefl->TINGKAT_PENDIDIKAN = $request->TINGKAT_PENDIDIKAN_LAINNYA;
  }
  $formToefl->JURUSAN = $request->JURUSAN;
  $formToefl->LAMA_BELAJAR_INGGRIS = $request->LAMA_BELAJAR_INGGRIS;
  $formToefl->NEGARA_TUJUAN = $request->NEGARA_TUJUAN;
  $formToefl->ALASAN = $request->ALASAN;
  $formToefl->TGL_BERLAKU_PASPOR = date('Y-m-d', strtotime($request->TGL_BERLAKU_PASPOR));
  $formToefl->AMBIL_GELAR = $request->AMBIL_GELAR;
  $formToefl->AMBIL_JURUSAN = $request->AMBIL_JURUSAN;
  $formToefl->REF_UNIVERSITAS = $request->REF_UNIVERSITAS;
  $token = $this->generate_registration_token();  
  $request->merge(['_token' => $token]);
  $formToefl->_token = $token;
  if ($request->hasfile('KTP') || $request->hasfile('PASPOR')) {
    $file_ktp = $request->file('KTP');
    $file_paspor = $request->file('PASPOR');
          //  $path = 'public/files/ielts-official/'.date('d-m-Y').'/'.$nama;
    $path = 'public/files/toefl-official/'.date('d-m-Y').'/'.$kd;

    $ext_ktp = $file_ktp->getClientOriginalExtension();
    $ext_paspor = $file_paspor->getClientOriginalExtension();
    $path_ktp = $file_ktp->storeAs($path, 'foto_ktp.'.$ext_ktp);
    $path_paspor = $file_paspor->storeAs($path, 'foto_paspor.'.$ext_paspor);
    $request->merge(['PATH_KTP' => $path_ktp]);
    $request->merge(['PATH_PASPOR' => $path_paspor]);
    $formToefl->PATH_KTP = $path_ktp;
    $formToefl->PATH_PASPOR = $path_paspor;
  }
  $ref_paket = "LT816";
  $ref_level = "38";
  $ref_kategori = "PRIVATE";
  $request->merge(['REF_PAKET' => $ref_paket]);
  $request->merge(['REF_LEVEL' => $ref_level]);
  $request->merge(['REF_KATEGORI' => $ref_kategori]);
  $request->merge(['TIPE_KELAS' => "OFFLINE"]);
  ;
  $duration = PacketPriceDetails::where('REF_PAKET',$ref_paket)->where('REF_LEVEL',$ref_level)->where('REF_KATEGORI',$ref_kategori)->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->first();

  $request->merge(['REF_PRICELIST' => $duration->KD]);
  $request->merge(['JUMLAH_JAM' => $duration->JUMLAH_JAM]);
  $request->merge(['JUMLAH_PERTEMUAN' => $duration->JUMLAH_PERTEMUAN]);
  $request->merge(['HARGA_PAKET' =>  $duration->HARGA_PAKET]);

  $formToefl_dtl->KD = $kd;
  $formToefl_dtl->REF_PRICELIST = $duration->KD;
  $formToefl_dtl->REF_PAKET = $ref_paket;
  $formToefl_dtl->REF_LEVEL = $ref_level;
  $formToefl_dtl->REF_KATEGORI = $ref_kategori;
  $formToefl_dtl->JUMLAH_JAM =$duration->JUMLAH_JAM;
  $formToefl_dtl->JUMLAH_PERTEMUAN = $duration->JUMLAH_PERTEMUAN;
  $formToefl_dtl->TIPE_KELAS = "OFFLINE";
  $formToefl_dtl->IELTS_MODULE= $request->TEST_MODULE;
  $formToefl->save();
  $formToefl_dtl->save();


  Mail::send(new RegisToeflOfficialMail($request));
  Mail::send(new RegisToeflOfficialPaymentsMail($request));
  return redirect('/products/toefl-test/official/')->with('message', 'Data Sudah Terkirim ! <br> Silahkan Cek Email Anda ('.$request->EMAIL.') untuk konfirmasi pembayaran !');
}

public function toefl_official_upload_payment($token)
{
  if (Auth::check()) {
    $user_id = Auth::user()->id;
    $validasi = RegisPaket::where('users_id', '=', $user_id)->where('_token', '=', $token)->first();

    if ($validasi) {
      $tgl_daftar = $validasi->updated_at;
      $today = Carbon::now();
      $datetime1 = new DateTime($tgl_daftar);
      $datetime2 = new DateTime($today);
      $days = $datetime2->diff($datetime1);
      $diff_day =  $days->d;
      if($diff_day<=2){
        return view('/language/toefl-official-payment', ['token' => $token,'validasi' => $validasi,'tgl_daftar' => $tgl_daftar]);
      }else{
        abort(403, 'Link Expire ! ');
      }
    } else {
      abort(403, 'Unauthorized Action ! Wrong Link / Email Account ! ');
    }

  } else {
    abort(403, 'Unauthorized Action ! ');
  }
}
public function toefl_upload_payments_receipt(Request $request){

  $token = $request->token;
  $tgl_daftar = $request->tgl_daftar;
  $user_id = Auth::user()->id;
  $data = RegisPaket::where('users_id','=',$user_id)->where('_token','=',$token)->first();
  $kd = $data->kd;
  $tgl = $data->created_at;
  $tgl = $tgl->format('d-m-Y');
  $myfile = $request->file('bukti_pembayaran');
  $path = 'public/files/toefl-official/'.$tgl.'/'.$kd;
  $ext = $myfile->getClientOriginalExtension();
  $bukti_pembayaran = $myfile->storeAs($path, 'bukti_pembayaran.'.$ext);

  RegisPaket::where('users_id','=',$user_id)->where('_token','=',$token)->update(['PATH_PAYMENT' => $bukti_pembayaran]);
  $request->merge(["subject" => "TOEFL"]);
  Mail::send(new UploadPaymentsReceiptMail($request,$data));
  return redirect('/products/toefl-test/official')->with('message','Bukti Pembayaran sudah terupload');
}


public function toefl_official_step2(Request $request){
      //dd($request->session()->get('ielts_form'));
  return view('language/toefl-official-step2');
}
public function toefl_official_submit(Request $request){
  $formToefl = new RegisPaket();
  $regisPaketDetil = new RegisPaketDtl;
  $regisPaketKD = $formToefl->orderBy('id','desc')->limit(0)->value('KD');
  $numPaket = substr($regisPaketKD,-4);
  $numPaket = (int)$numPaket;
  $numPaket++;
  $width = 4;
  $kd = 'CS'.date('y').date('m'). str_pad((string)$numPaket, $width, "0", STR_PAD_LEFT);
  $request->merge(['KD' => $kd]);
  $request->merge(['REF_PAKET' => 'TOT']);
  $request->merge(['REF_LEVEL' => 'O']);
  $request->merge(['REF_KATEGORI' => 'PRIVATE']);
  $request->merge(['TGL_LAHIR' => date("Y/m/d",strtotime($request->tgl_lahir.'/'.$request->bulan_lahir.'/'.$request->tahun_lahir)) ]);
  $regisPaketDetil->create($request->all());
  $nama = session('toefl_form.nama_depan');
  if(session('teofl_form.nama_tengah') != ""){
    $nama .= session('toefl_form.nama_tengah');
  }
  if(session('toefl_form.nama_belakang') != ""){
    $nama .= session('toefl_form.nama_belakang');
  }
  $formToefl->KD = $kd;
  $formToefl->REF_PERUSAHAAN = "BEST PARTNER PONTIANAK";
  $formToefl->NAMA =  $nama;
  $formToefl->JK = session('toefl_form.gender');
  $formToefl->TGL_LAHIR = session('toefl_form.tahun_lahir').'-'.session('toefl_form.bulan_lahir').'-'.session('toefl_form.tanggal_lahir');
  $formToefl->ALAMAT = session('toefl_form.alamat');
  $formToefl->KOTA = session('toefl_form.kota');
  $formToefl->POSTAL_CODE = session('toefl_form.kode_pos');
  $formToefl->AGAMA = session('toefl_form.agama');
  $formToefl->KONTAK = session('toefl_form.no_telepon');
  $email = session('toefl_form.email');
  $formToefl->EMAIL = $email;
  if(session('toefl_form.no_ktp') != ""){
   $formToefl->REF_KTP = session('toefl_form.no_ktp');
 }
 if(session('toefl_form.no_paspor') != ""){
  $formToefl->REF_PASPOR = session('ielts_form.no_paspor');

}
if(session('toefl_form.test_module') !== NULL){
  $formToefl->TEST_MODULE = session('toefl_form.test_module');
}
$formToefl->TITLE = session('toefl_form.title');

$formToefl->users_id = Auth::user()->id;

if($request->tingkat_pekerjaan_lainnya != ""){
  $formToefl->TINGKAT_PEKERJAAN = $request->tingkat_pekerjaan_lainnya;
}else{
  $formToefl->TINGKAT_PEKERJAAN = $request->tingkat_pekerjaan;
}
if($request->sektor_pekerjaan_lainnya != ""){
  $formToefl->SEKTOR_PEKERJAAN = $request->sektor_pekerjaan_lainnya;
}else{
  $formToefl->SEKTOR_PEKERJAAN = $request->sektor_pekerjaan;
}
if($request->tingkat_pendidikan_lainnya != ""){
  $formToefl->TINGKAT_PENDIDIKAN = $request->tingkat_pendidikan_lainnya;
}else{
  $formToefl->TINGKAT_PENDIDIKAN = $request->tingkat_pendidikan;
}
$formToefl->JURUSAN = $request->jurusan;
$formToefl->LAMA_BELAJAR_INGGRIS = $request->lama_inggris;
$formToefl->NEGARA_TUJUAN = $request->negara_tujuan;
$formToefl->ALASAN = $request->alasan_toefl;
$formToefl->TGL_BERLAKU_PASPOR = date('Y-m-d', strtotime($request->tgl_berlaku_paspor));
$formToefl->AMBIL_GELAR = $request->ambil_gelar;
$formToefl->AMBIL_JURUSAN = $request->ambil_jurusan;
$formToefl->REF_UNIVERSITAS = $request->ref_universitas;
$token = Str::random(32);
$formToefl->_token = $token;
$path = 'public/files/toefl-official/'.date('d-m-Y').'/'.$nama;

if ($request->hasfile('ktp') ) {
  $file_ktp = $request->file('ktp');
          //  $path = 'public/files/ielts-official/'.date('d-m-Y').'/'.$nama;
  $ext_ktp = $file_ktp->getClientOriginalExtension();
  $path_ktp = $file_ktp->storeAs($path, 'foto_ktp.'.$ext_ktp);
  $formToefl->PATH_KTP = $path_ktp;


}else if( $request->hasfile('paspor') ){
  $file_paspor = $request->file('paspor');
  $ext_paspor = $file_paspor->getClientOriginalExtension();
  $path_paspor = $file_paspor->storeAs($path, 'foto_paspor.'.$ext_paspor);
  $formToefl->PATH_PASPOR = $path_paspor;
}


$request->session()->push('toefl_form.token', $token);
Mail::send(new RegisToeflOfficialMail($request));
Mail::send(new RegisToeflOfficialPaymentsMail($request));
$formToefl->save();
$request->session()->forget('toefl_form');
return redirect('/products/toefl-test/official/')->with('message', 'Data Sudah Terkirim ! <br> Silahkan Cek Email Anda ('.$email.') untuk konfirmasi pembayaran !');
}
public function tips_belajar()
{
  return view('/language/tips-belajar');
}
public function tax_claim()
{
  return view('/tax-claim');
}
public function tax_claim_application(){
  return view('/tax-claim-application');
}
public function post_tax_claim_application(Request $request){
  Mail::send(new TaxClaimMail($request));
  return redirect()->back()->with('messages','Data anda sudah terkirim !');
}
public function career_application()
{
  $companies = Perusahaan::get();
  $job_vacancies = JobVacancy::get();
  $job_categories = JobCategory::with('job_vacancies')->get();
  $cek_recruitment = Recruitment::whereRaw('(id_user = "'.auth()->user()->id.'" or  email = "'.auth()->user()->email.'")')->where('status','=','2')->orderBy('created_at','DESC')->first();
  $recruitment = Recruitment::whereRaw('(id_user = "'.auth()->user()->id.'" or  email = "'.auth()->user()->email.'")')->where('status','!=','2')->orderBy('created_at','DESC')->first();
  if($cek_recruitment != ""){
    $arr_no = explode('-',$cek_recruitment->ref);
    $no = $arr_no[1];
    $no ++;
    $ref = auth()->user()->id.'-'.$no;
  }else{
    $ref = auth()->user()->id.'-1';
  }
  $experiences = RecruitmentExperience::where('ref',$ref)->get();
  $educations = RecruitmentEducation::where('ref',$ref)->get();
  return view('/career-application',compact('companies','job_vacancies','job_categories','ref','recruitment','experiences','educations'));
}
public function career_application_vacancies_ajax(Request $request){
$category_id = $request->category_id;
if($category_id != ""){
  if($request->id_lowongan != ""){
    return JobVacancy::selectRaw('*, IF(id = "'.$request->id_lowongan.'", 1, 0) as selected')->where('category_id',$category_id)->get();
  }
  return JobVacancy::selectRaw('*')->where('category_id',$category_id)->get();
}
}
public function career_application_category(Request $request){
  $recruitment = Recruitment::where('ref',$request->ref)->first();
  if($recruitment){
    $recruitment->update($request->all());
  }else{
    Recruitment::create($request->all());
  }
  return response()->json(['status' => 'OK'],200);
}
public function career_application_biodata(Request $request){
  if($request->keahlian_lainnya != ""){
    $request->merge(['keahlian_lainnya' => implode('|',$request->keahlian_lainnya)]);
  }
  $recruitment = Recruitment::where('ref',$request->ref)->first();
  if($recruitment){
    $recruitment->update($request->all());
  }else{
    Recruitment::create($request->all());
  }
  return response()->json(['status' => 'OK'],200);
}

public function career_application_experience(Request $request){
  if($request->cmd == "add"){
    $recruitment = RecruitmentExperience::create($request->all());
  }else if($request->cmd == "update"){
    $update = RecruitmentExperience::find($request->id)->update($request->all());
    $recruitment = RecruitmentExperience::find($request->id);
  }
  return response()->json(['status' => 'OK','data' => $recruitment],200);

}

public function career_application_education(Request $request){
  $data = $request->data;

  if(count($data)){
    $delete_previous = RecruitmentEducation::where('ref',$request->ref)->delete();
    $insert_update =  RecruitmentEducation::insert($data);
  }
  return response()->json(['status' => 'OK','data' => $data],200);
}
public function post_career_application(Request $request){
  /*$request->merge(['keahlian_bahasa' => implode("|",$request->keahlian_bahasa)]);
  $request->merge(['keahlian_lainnya' => implode("|",$request->keahlian_lainnya)]);
  if( Recruitment::latest()->first()){
    $no = Recruitment::latest()->first()->id;
    $no++;

  }else{
    $no = 1;
  }
  */
  $no = Recruitment::where('ref',$request->ref)->first()->id;
  $path = "BP/data-perusahaan/recruitment/".$no;

  $gambar_portofolio = array();
  if($request->file_gambar_portofolio != ""){
    foreach($request->file_gambar_portofolio as $key => $gambar){

      $ext = $gambar->getClientOriginalExtension();
      array_push($gambar_portofolio,Storage::disk('public')->putFileAs($path, $gambar, 'hasil-kerja'.$key.'-'.time().'.'.$ext));

    }
    $request->merge(['gambar_portofolio' => implode("|", $gambar_portofolio)]);
  }
  $transkrip_nilai = array();
  if($request->file_transkrip_nilai != ""){
    foreach($request->file_transkrip_nilai as $key => $transkrip){
      $ext = $transkrip->getClientOriginalExtension();
      array_push($transkrip_nilai,Storage::disk('public')->putFileAs($path, $transkrip, 'transkrip-nilai'.$key.'-'.time().'.'.$ext));
    }
    $request->merge(['transkrip_nilai' => implode("|", $transkrip_nilai)]);
  }

  $dokumen_tambahan = array();
  if($request->file_dokumen_tambahan != ""){
    foreach($request->file_dokumen_tambahan as $key => $dokumen){
      $ext = $dokumen->getClientOriginalExtension();
      array_push($dokumen_tambahan,Storage::disk('public')->putFileAs($path, $dokumen, 'dokumen-tambahan'.$key.'-'.time().'.'.$ext));
    }
    $request->merge(['dokumen_tambahan' => implode("|", $dokumen_tambahan)]);
  }


  if($request->hasFile('file_ktp')){
    $ktp = $request->file_ktp;
    $path_ktp = Storage::disk('public')->putFileAs($path,$ktp,'ktp'.'-'.time().'.'.$ktp->getClientOriginalExtension());
    $request->merge(['ktp' => $path_ktp]);
  }
  if($request->hasFile('file_ijazah')){
    $ijazah = $request->file_ijazah;
    $path_ijazah = Storage::disk('public')->putFileAs($path,$ijazah,'ijazah'.'-'.time().'.'.$ijazah->getClientOriginalExtension());
    $request->merge(['ijazah' => $path_ijazah]);
  }
  

  if($request->hasFile('file_sim')){
    $sim = $request->file_sim;
    $path_sim = Storage::disk('public')->putFileAs($path,$sim,'sim'.'-'.time().'.'.$sim->getClientOriginalExtension());
    $request->merge(['sim' => $path_sim]);
  }
  if($request->hasFile('file_pas_foto')){
    $pas_foto = $request->file_pas_foto;
    $path_pas_foto = Storage::disk('public')->putFileAs($path,$pas_foto,'pas_foto'.'-'.time().'.'.$pas_foto->getClientOriginalExtension());
    $request->merge(['pas_foto' => $path_pas_foto]);
  }
  if($request->status == ""){
    $request->merge(['status' => 1]);
  }
  Recruitment::where('ref',$request->ref)->update($request->except('file_ktp','file_sim','file_ijazah','file_transkrip_nilai','file_pas_foto','file_dokumen_tambahan','_token'));
  //Mail::send(new CareerApplicationMail($request));
  if($request->status == 2){
    return redirect('careers/application')->with('message','Data Sudah Berhasil Di Input !');
  }
  return redirect('careers/application');
}

public function career_illustrator_application($id_perusahaan)
{
  return view('/career-illustrator-application',['id_perusahaan' => $id_perusahaan]);
}

public function post_career_illustrator_application(Request $request){
  $request->merge(['nama' => $request->nama_depan." ".$request->nama_belakang]);
  $request->merge(['tanggal_lahir' => $request->tanggal_lahir]);
  if($request->keahlian_illustrator!=""){
    $request->merge(['keahlian_illustrator' => implode("|",$request->keahlian_illustrator)]);
  }else{
    $request->merge(['keahlian_illustrator' => '']);
  }
  $request->merge(['keahlian_lainnya' => implode("|",$request->keahlian_lainnya)]);
  if( Recruitment::latest()->first()){
    $no = Recruitment::latest()->first()->id;
    $no++;

  }else{
    $no = 1;
  }
  $path = "BP/data-perusahaan/recruitment/".$no;

  $gambar_portofolio = array();
  if($request->file_gambar_portofolio != ""){
    foreach($request->file_gambar_portofolio as $key => $gambar){

      $ext = $gambar->getClientOriginalExtension();
      array_push($gambar_portofolio,Storage::disk('public')->putFileAs($path, $gambar, 'hasil-kerja'.$key.'-'.time().'.'.$ext));

    }
  }
  $transkrip_nilai = array();
  if($request->file_transkrip_nilai != ""){
    foreach($request->file_transkrip_nilai as $key => $transkrip){
      $ext = $transkrip->getClientOriginalExtension();
      array_push($transkrip_nilai,Storage::disk('public')->putFileAs($path, $transkrip, 'transkrip-nilai'.$key.'-'.time().'.'.$ext));
    }
  }



  $ktp = $request->file_ktp;
  $path_ktp = Storage::disk('public')->putFileAs($path,$ktp,'ktp'.$key.'-'.time().'.'.$ktp->getClientOriginalExtension());

  $ijazah = $request->file_ijazah;
  $path_ijazah = Storage::disk('public')->putFileAs($path,$ijazah,'ijazah'.$key.'-'.time().'.'.$ktp->getClientOriginalExtension());
  $request->merge(['ktp' => $path_ktp]);
  $request->merge(['ijazah' => $path_ijazah]);
  $request->merge(['gambar_portofolio' => implode("|", $gambar_portofolio)]);
  $request->merge(['transkrip_nilai' => implode("|", $transkrip_nilai)]);
  Recruitment::create($request->all());
  return redirect('careers/'.$request->id_perusahaan.'/illustrator/application')->with('status','Data Sudah Berhasil Di Input !');
}


public function post_promo_recruitment(Request $request){
  if( Recruitment::latest()->first()){
    $no = Recruitment::latest()->first()->id;
    $no++;
  }else{
    $no = 1;
  }
  $path = "BP/data-perusahaan/recruitment/promo/".$request->id_promo."/".$no;

  if($request->file_ktp != ""){   
    $ext = $request->file_ktp->getClientOriginalExtension();
    $path_ktp = Storage::disk('public')->putFileAs($path, $request->file_ktp, 'ktp'.'-'.uniqid().'.'.$ext);
    $request->merge(['ktp' => $path_ktp]);
  }
  if($request->file_kk != ""){
    $ext = $request->file_kk->getClientOriginalExtension();
    $path_kk = Storage::disk('public')->putFileAs($path, $request->file_kk, 'kk'.'-'.uniqid().'.'.$ext);
    $request->merge(['kk' => $path_kk]);
  }

  if($request->file_pas_foto != ""){
    $ext = $request->file_pas_foto->getClientOriginalExtension();
    $pas_foto = Storage::disk('public')->putFileAs($path,$request->file_pas_foto,'pas_foto'.'-'.uniqid().'.'.$ext);
    $request->merge(['pas_foto' => $pas_foto]);
  }
  if($request->file_surat_keterangan_tidak_mampu){
    $ext = $request->file_surat_keterangan_tidak_mampu->getClientOriginalExtension();
    $surat_keterangan_tidak_mampu = Storage::disk('public')->putFileAs($path,$request->file_surat_keterangan_tidak_mampu,'surat_keterangan_tidak_mampu'.'-'.uniqid().'.'.$ext);
    $request->merge(['surat_keterangan_tidak_mampu' => $surat_keterangan_tidak_mampu]);
  }
  Recruitment::create($request->all());
  Mail::send(new CareerApplicationMail($request));
  return redirect()->back()->with('status','Data Anda Sudah Terkirim !');
}

public function time_table()
{
  return view('/study abroad/time-table');
}
public function dataSekolah(Request $request)
{
  $cari = $request->search;
        //echo $cari;
  return json_encode(DB::table('sekolah')->select('id_sekolah', 'nama_sekolah')->orderBy('nama_sekolah')->where('nama_sekolah', 'like', '%'.$cari.'%')->get());
        /*echo $cari;
        if($data = DB::table('sekolah')->get()){

echo 'sukses';
        return response()->json($data);
         }else{
        echo 'gagal';
      }*/
    }
    public function tt_search()
    {
      return view('/time-table/search');
    }
    public function ielts_official()
    {
      $now = date('Y-m-d',Carbon::now()->timestamp);
      $tgl_ielts = Events::selectRaw('DATE_FORMAT(tgl_mulai, "%d-%c-%Y") as tgl_mulai')->where('event_type_id',2)->where('tgl_mulai','>=',$now)->orderBy('tgl_mulai','ASC')->limit(2)->pluck('tgl_mulai');


      return view('/language/ielts-official',['tgl_ielts' => $tgl_ielts]);
    }

    public function post_ielts_official(Request $request){
      $formIelts = new RegisPaket;
      $formIelts_dtl = new RegisPaketDtl;
      $regisPaketKD = RegisPaket::orderBy('id','desc')->limit(0)->value('KD');
      $numPaket = substr($regisPaketKD,-4);
      $numPaket = (int)$numPaket;
      $numPaket++;
      $width = 4;
      $kd = 'CS'.date('y').date('m'). str_pad((string)$numPaket, $width, "0", STR_PAD_LEFT);
      $formIelts->KD = $kd;
      $formIelts->users_id = Auth::user()->id;
      $formIelts->REF_PERUSAHAAN = "BEST PARTNER PONTIANAK";
      $nama = '';
      if($request->nama_depan!=''){
        $nama .= $request->nama_depan;
      }
      if($request->nama_tengah!=''){
        $nama .= ' '.$request->nama_tengah;
      }

      if($request->nama_belakang!=''){
        $nama .= ' '.$request->nama_belakang;
      }

      $request->merge(['NAMA' => $nama]);
      $formIelts->NAMA =  $nama;
      $formIelts->JK = $request->JK;
      $formIelts->TGL_LAHIR = date('Y-m-d', strtotime($request->TGL_LAHIR));
      $formIelts->ALAMAT = $request->ALAMAT;
      $formIelts->KOTA_KELAHIRAN = $request->KOTA;
      $formIelts->KOTA = $request->KOTA;
      $formIelts->POSTAL_CODE = $request->POSTAL_CODE;
      $formIelts->AGAMA = $request->AGAMA;
      $formIelts->KONTAK = $request->KONTAK;
      $formIelts->EMAIL = $request->EMAIL;
      $formIelts->REF_KTP = $request->REF_KTP;
      $formIelts->REF_PASPOR = $request->REF_PASPOR;
      $formIelts->TEST_MODULE = $request->TEST_MODULE;
      $formIelts->TITLE = $request->TITLE;
      $formIelts->TGL_TEST = $request->TGL_TEST;
      $formIelts->TGL_SIMULASI = $request->TGL_SIMULASI;
      $formIelts->TINGKAT_PEKERJAAN = $request->TINGKAT_PEKERJAAN;
      $formIelts->SEKTOR_PEKERJAAN = $request->SEKTOR_PEKERJAAN;
      $formIelts->TINGKAT_PENDIDIKAN = $request->TINGKAT_PENDIDIKAN;
      if($request->TINGKAT_PEKERJAAN_LAINNYA != ""){
        $request->merge(['TINGKAT_PEKERJAAN' => $request->TINGKAT_PEKERJAAN_LAINNYA]);
        $formIelts->TINGKAT_PEKERJAAN = $request->TINGKAT_PEKERJAAN_LAINNYA;
      }
      if($request->SEKTOR_PEKERJAAN_LAINNYA != ""){
        $request->merge(['SEKTOR_PEKERJAAN' => $request->SEKTOR_PEKERJAAN_LAINNYA]);
        $formIelts->SEKTOR_PEKERJAAN = $request->SEKTOR_PEKERJAAN_LAINNYA;
      }
      if($request->TINGKAT_PENDIDIKAN_LAINNYA != ""){
        $request->merge(['TINGKAT_PENDIDIKAN' => $request->TINGKAT_PENDIDIKAN_LAINNYA]);
        $formIelts->TINGKAT_PENDIDIKAN = $request->TINGKAT_PENDIDIKAN_LAINNYA;
      }
      $formIelts->JURUSAN = $request->JURUSAN;
      $formIelts->LAMA_BELAJAR_INGGRIS = $request->LAMA_BELAJAR_INGGRIS;
      $formIelts->NEGARA_TUJUAN = $request->NEGARA_TUJUAN;
      $formIelts->ALASAN = $request->ALASAN;
      $formIelts->TGL_BERLAKU_PASPOR = date('Y-m-d', strtotime($request->TGL_BERLAKU_PASPOR));
      $formIelts->AMBIL_GELAR = $request->AMBIL_GELAR;
      $formIelts->AMBIL_JURUSAN = $request->AMBIL_JURUSAN;
      $formIelts->REF_UNIVERSITAS = $request->REF_UNIVERSITAS;
      $token = $this->generate_registration_token();  
      $request->merge(['_token' => $token]);
      $formIelts->_token = $token;

      if ($request->hasfile('KTP') || $request->hasfile('PASPOR')) {
        $file_ktp = $request->file('KTP');
        $file_paspor = $request->file('PASPOR');
          //  $path = 'public/files/ielts-official/'.date('d-m-Y').'/'.$nama;
        $path = 'public/files/ielts-official/'.date('d-m-Y').'/'.$kd;

        $ext_ktp = $file_ktp->getClientOriginalExtension();
        $ext_paspor = $file_paspor->getClientOriginalExtension();
        $path_ktp = $file_ktp->storeAs($path, 'foto_ktp.'.$ext_ktp);
        $path_paspor = $file_paspor->storeAs($path, 'foto_paspor.'.$ext_paspor);
        $request->merge(['PATH_KTP' => $path_ktp]);
        $request->merge(['PATH_KTP' => $path_ktp]);
        $formIelts->PATH_KTP = $path_ktp;
        $formIelts->PATH_PASPOR = $path_paspor;
      }
      $ref_paket = "LT815";
      $ref_level = "38";
      $ref_kategori = "PRIVATE";
      $request->merge(['REF_PAKET' => $ref_paket]);
      $request->merge(['REF_LEVEL' => $ref_level]);
      $request->merge(['REF_KATEGORI' => $ref_kategori]);
      $request->merge(['TIPE_KELAS' => "OFFLINE"]);
      $duration = PacketPriceDetails::where('REF_PAKET',$ref_paket)->where('REF_LEVEL',$ref_level)->where('REF_KATEGORI',$ref_kategori)->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->first();

      $request->merge(['REF_PRICELIST' => $duration->KD]);
      $request->merge(['JUMLAH_JAM' => $duration->JUMLAH_JAM]);
      $request->merge(['JUMLAH_PERTEMUAN' => $duration->JUMLAH_PERTEMUAN]);
      $request->merge(['HARGA_PAKET' =>  $duration->HARGA_PAKET]);

      $formIelts_dtl->KD = $kd;
      $formIelts_dtl->REF_PRICELIST = $duration->KD;
      $formIelts_dtl->REF_PAKET = $ref_paket;
      $formIelts_dtl->REF_LEVEL = $ref_level;
      $formIelts_dtl->REF_KATEGORI = $ref_kategori;
      $formIelts_dtl->JUMLAH_JAM =$duration->JUMLAH_JAM;
      $formIelts_dtl->JUMLAH_PERTEMUAN = $duration->JUMLAH_PERTEMUAN;
      $formIelts_dtl->TIPE_KELAS = "OFFLINE";
      $formIelts_dtl->IELTS_MODULE= $request->TEST_MODULE;
      $formIelts->save();
      $formIelts_dtl->save();

      Mail::send(new RegisIeltsOfficialMail($request));
      Mail::send(new RegisIeltsOfficialPaymentsMail($request));

      return redirect('/products/ielts-test/official/')->with('message', 'Data Sudah Terkirim ! <br> Silahkan Cek Email Anda ('.$request->EMAIL.') untuk konfirmasi pembayaran !');
    }

    public function generate_registration_token(){
      $token = Str::random(32);
      $check_exist = RegisPaket::where('_token',$token)->first();
      if($check_exist){
        return generate_registration_token();
      }
      return $token;
    }

    public function ielts_official_step1_post(Request $request)
    {
      $test =  $request->session()->put('ielts_form', Input::all());
      return view('/language/ielts-official-step2');
    }
    public function ielts_official_submit(Request $request)
    {
      $formIelts = new RegisIeltsOfficial();
      $nama = session('ielts_form.nama_depan').' '.session('ielts_form.nama_tengah').' '.session('ielts_form.nama_belakang');
      $formIelts->nama =  $nama;
      $formIelts->gender = session('ielts_form.gender');
      $formIelts->tgl_lahir = session('ielts_form.tahun_lahir').'-'.session('ielts_form.bulan_lahir').'-'.session('ielts_form.tanggal_lahir');
      $formIelts->alamat = session('ielts_form.alamat');
      $formIelts->kota = session('ielts_form.kota');
      $formIelts->kode_pos = session('ielts_form.kode_pos');
      $formIelts->agama = session('ielts_form.agama');
      $formIelts->no_telepon = session('ielts_form.no_telepon');
      $formIelts->email = session('ielts_form.email');
      $formIelts->tipe_id = session('ielts_form.tipe_id');
      $formIelts->no_ktp = session('ielts_form.no_ktp');
      $formIelts->no_paspor = session('ielts_form.no_paspor');
      $formIelts->test_module = session('ielts_form.test_module');
      $formIelts->title = session('ielts_form.title');
      $formIelts->tgl_ielts = session('ielts_form.tgl_ielts');

      $formIelts->users_id = Auth::user()->id;
      $formIelts->tingkat_pekerjaan = $request->tingkat_pekerjaan;
      $formIelts->sektor_pekerjaan = $request->sektor_pekerjaan;
      $formIelts->tingkat_pendidikan = $request->tingkat_pendidikan;
      if($request->tingkat_pekerjaan_lainnya != ""){
        $formIelts->tingkat_pekerjaan = $request->tingkat_pekerjaan_lainnya;
      }
      if($request->sektor_pekerjaan_lainnya != ""){
        $formIelts->tingkat_pekerjaan = $request->sektor_pekerjaan_lainnya;
      }
      if($request->tingkat_pendidikan_lainnya != ""){
        $formIelts->tingkat_pendidikan = $request->tingkat_pekerjaan_lainnya;
      }
      $formIelts->jurusan = $request->jurusan;
      $formIelts->lama_inggris = $request->lama_inggris;
      $formIelts->negara_tujuan = $request->negara_tujuan;
      $formIelts->alasan_ielts = $request->alasan_ielts;
      $formIelts->tgl_berlaku_paspor = date('Y-m-d', strtotime($request->tgl_berlaku_paspor));
      $formIelts->ambil_gelar = $request->ambil_gelar;
      $formIelts->ambil_jurusan = $request->ambil_jurusan;
      $formIelts->ref_universitas = $request->ref_universitas;
      $token = Str::random(32);
      $formIelts->_token = $token;
      if ($request->hasfile('ktp') || $request->hasfile('paspor')) {
        $file_ktp = $request->file('ktp');
        $file_paspor = $request->file('paspor');
          //  $path = 'public/files/ielts-official/'.date('d-m-Y').'/'.$nama;
        $path = 'public/files/ielts-official/'.date('d-m-Y').'/'.$nama;

        $ext_ktp = $file_ktp->getClientOriginalExtension();
        $ext_paspor = $file_paspor->getClientOriginalExtension();
        $path_ktp = $file_ktp->storeAs($path, 'foto_ktp.'.$ext_ktp);
        $path_paspor = $file_paspor->storeAs($path, 'foto_paspor.'.$ext_paspor);
        $formIelts->lokasi_ktp = $path_ktp;
        $formIelts->lokasi_paspor = $path_paspor;
      }


      $request->session()->push('ielts_form.token', $token);
      Mail::send(new RegisIeltsOfficialMail($request));
      Mail::send(new RegisIeltsOfficialPaymentsMail($request));
      $formIelts->save();
      $request->session()->forget('ielts_form');
      return redirect('/products/ielts-test/official/')->with('message', 'Data Sudah Terkirim ! <br> Silahkan Cek Email Anda ('.$formIelts->email.') untuk konfirmasi pembayaran !');
    }
    public function ielts_official_upload_payment($token)
    {
      if (Auth::check()) {
        $user_id = Auth::user()->id;
        $validasi = RegisPaket::where('users_id', '=', $user_id)->where('_token', '=', $token)->first();

        if ($validasi) {
          $tgl_daftar = $validasi->updated_at;
          $today = Carbon::now();
          $datetime1 = new DateTime($tgl_daftar);
          $datetime2 = new DateTime($today);
          $days = $datetime2->diff($datetime1);
          $diff_day =  $days->d;
          if($diff_day<=2){
            return view('/language/ielts-official-step3', ['token' => $token,'validasi' => $validasi,'tgl_daftar' => $tgl_daftar]);
          }else{
            abort(403, 'Link Expire ! ');
          }
        } else {
          abort(403, 'Unauthorized Action ! Wrong Link / Email Account ! ');
        }

      } else {
        abort(403, 'Unauthorized Action ! ');
      }
    }
    public function upload_payments_receipt(Request $request){

      $token = $request->token;
      $tgl_daftar = $request->tgl_daftar;
      $user_id = Auth::user()->id;
      $data = RegisPaket::where('users_id','=',$user_id)->where('_token','=',$token)->first();
      $kd = $data->kd;
      $tgl = $data->created_at;
      $tgl = $tgl->format('d-m-Y');
      $myfile = $request->file('bukti_pembayaran');
      $path = 'public/files/ielts-official/'.$tgl.'/'.$kd;
      $ext = $myfile->getClientOriginalExtension();
      $bukti_pembayaran = $myfile->storeAs($path, 'bukti_pembayaran.'.$ext);
      RegisPaket::where('users_id','=',$user_id)->where('_token','=',$token)->update(['PATH_PAYMENT' => $bukti_pembayaran]);

      $request->merge(["subject" => "IELTS"]);
      Mail::send(new UploadPaymentsReceiptMail($request,$data));
      return redirect('/products/ielts-test/official')->with('message','Bukti Pembayaran sudah terupload');
    }
    public function ielts_simulation()
    {
      $perusahaan = Perusahaan::get();
      $modules = OtModule::where('test_id',1)->where('ot_modules.name','!=','-')->get();
      $types = OtSectionType::selectRaw('ot_section_types.id,ot_section_types.name as type')->join('ot_test_sections','ot_section_types.id','ot_test_sections.section_type_id')->where('ot_test_sections.test_id',1)->groupBy('ot_section_types.id','ot_section_types.name')->get()->toArray();

      return view('/language/ielts-simulation',['perusahaan' => $perusahaan,'modules' => $modules,'types' => $types]);
    }
    public function post_ielts_simulation(Request $request){

      if($request->jenis_test == "offline"){
        $regisPaketKD = RegisPaket::orderBy('id','desc')->limit(0)->value('KD');
        $numPaket = substr($regisPaketKD,-4);
        $numPaket = (int)$numPaket;
        $numPaket++;
        $width = 4;
        $kd = 'CS'.date('y').date('m'). str_pad((string)$numPaket, $width, "0", STR_PAD_LEFT);
        $request->merge(['KD' => $kd]);
        $arr_module = explode('|',$request->module);
        $module_id = $arr_module[0];
        $test_module = $arr_module[1];
        $tgl_lahir =  date("Y/m/d",strtotime($request->tgl_lahir.'/'.$request->bulan_lahir.'/'.$request->tahun_lahir));
        $request->merge(['NAMA_MODULE' => $test_module]);
        $regis_paket = new RegisPaket;
        $regis_paket_dtl = new RegisPaketDtl;
        $regis_paket->_token = $request->_token;
        $regis_paket->users_id = Auth::user()->id;
        $regis_paket->KD = $kd;
        $regis_paket->REF_PERUSAHAAN = $request->REF_PERUSAHAAN;
        $regis_paket->NAMA = $request->NAMA;
        $regis_paket->KOTA_KELAHIRAN = $request->KOTA_KELAHIRAN;
        $regis_paket->TGL_LAHIR = $tgl_lahir;
        $regis_paket->ALAMAT = $request->ALAMAT;
        $regis_paket->KOTA = $request->KOTA_KELAHIRAN;
        $regis_paket->KONTAK = $request->KONTAK;
        $regis_paket->EMAIL = $request->EMAIL;
        $regis_paket->REF_KTP = $request->REF_KTP;
        $regis_paket->ALASAN = $request->ALASAN;
        $path = 'public/files/ielts-simulation/offline/'.date('d-m-Y').'/'.$request->NAMA;
        if($request->hasFile('UPLOAD_KTP')){
          $file_ktp = $request->file('UPLOAD_KTP');
          $ext_ktp = $file_ktp->getClientOriginalExtension();
          $path_ktp = $file_ktp->storeAs($path, 'ktp_'.$request->NAMA.'_'.time().'.'.$ext_ktp,'local');
        }
        $regis_paket->PATH_KTP = $path_ktp;
        /*
 $jumlah_pertemuan = PacketPriceDetails::where('REF_PAKET',$id_course)->where('REF_LEVEL',$id_level)->where('JUMLAH_JAM',$request->durasi_kelas)->where('REF_KATEGORI',$request->id_kelompok_kelas);

      if($request->tipe_kelas == "ONLINE")
      {
        $jumlah_pertemuan =  $jumlah_pertemuan->whereRaw('SUBSTRING_INDEX(KD,".",-1) = "ONLINE"');
      }else{
        $jumlah_pertemuan =  $jumlah_pertemuan->whereRaw('SUBSTRING_INDEX(KD,".",-1) != "ONLINE"');
      }
      $jumlah_pertemuan = $jumlah_pertemuan->first()->JUMLAH_PERTEMUAN;
        */
        ////////////////////REGIS PAKET///////////////////
      $ref_paket = 'LT815';
      $ref_level = '39';
      $ref_kategori = 'PRIVATE';
      $duration = PacketPriceDetails::join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_PAKET',$ref_paket)->where('REF_LEVEL',$ref_level)->where('REF_KATEGORI',$ref_kategori)->whereRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) != "ONLINE"')->first();
      $regis_paket_dtl->KD = $kd;

      $regis_paket_dtl->REF_PRICELIST = $duration->KD;
      $regis_paket_dtl->REF_PAKET = $ref_paket;
      $regis_paket_dtl->REF_LEVEL = $ref_level;
      $regis_paket_dtl->REF_KATEGORI = $ref_kategori;
      $regis_paket_dtl->JUMLAH_JAM =$duration->JUMLAH_JAM;
      $regis_paket_dtl->JUMLAH_PERTEMUAN = $duration->JUMLAH_PERTEMUAN;
      $regis_paket_dtl->TIPE_KELAS = "OFFLINE";
      $regis_paket_dtl->IELTS_MODULE= $module_id;
      $regis_paket->save();
      $regis_paket_dtl->save();

      Mail::send(new RegisIeltsSimulation($request));
      Mail::send(new IeltsSimulationFeedback($request));

      return redirect()->route('ielts-simulation')->with('message','Data Sudah Berhasil Terkirim !');

    }else if($request->jenis_test == "online"){

      $request->merge(['test_id' => 1]);
      $arr_module = explode('|',$request->module);
      $module_id = $arr_module[0];
      $test_module = $arr_module[1];

      $tanggal_speaking =  new DateTime($request->tgl_speaking.' '.$request->jam_speaking);
      $tanggal_speaking->format('Y-m-d H:i:s');
      $request->merge(['tanggal_speaking' => $tanggal_speaking]);
      $request->merge(['test_name' => "ielts test"]);
      $request->merge(['module_id' => $module_id]);

      $request->merge(['TEST_MODULE' => $test_module]);
      $tgl_lahir = $request->tahun_lahir.'-'.$request->bulan_lahir.'-'.$request->tgl_lahir;
      $request->merge(['TGL_LAHIR' => $tgl_lahir]);
      $request->merge(['REF_KTP' => $request->REF_KTP]);
      $request->merge(['token' => $request->_token.'-'.time()]);

      $regisPaketKD = RegisPaket::orderBy('id','desc')->limit(0)->value('KD');
      $numPaket = substr($regisPaketKD,-4);
      $numPaket = (int)$numPaket;
      $numPaket++;
      $width = 4;

      $kd = 'CS'.date('y').date('m'). str_pad((string)$numPaket, $width, "0", STR_PAD_LEFT);
      $request->merge(['KD' => $kd]);
      $regis_paket = new RegisPaket;
      $regis_paket_dtl = new RegisPaketDtl;
      $regis_paket->_token = $request->_token;
      $regis_paket->users_id = Auth::user()->id;
      $regis_paket->KD = $kd;
      $regis_paket->REF_PERUSAHAAN = $request->REF_PERUSAHAAN;
      $regis_paket->NAMA = $request->NAMA;
      $regis_paket->KOTA_KELAHIRAN = $request->KOTA_KELAHIRAN;
      $regis_paket->TGL_LAHIR = $tgl_lahir;
      $regis_paket->ALAMAT = $request->ALAMAT;
      $regis_paket->KOTA = $request->KOTA_KELAHIRAN;
      $regis_paket->KONTAK = $request->KONTAK;
      $regis_paket->EMAIL = $request->EMAIL;
      $regis_paket->REF_KTP = $request->REF_KTP;
      $regis_paket->ALASAN = $request->ALASAN;
      $path = 'public/files/ielts-simulation/online/'.date('d-m-Y').'/'.$request->NAMA;
      if($request->hasFile('UPLOAD_KTP')){
        $file_ktp = $request->file('UPLOAD_KTP');
        $ext_ktp = $file_ktp->getClientOriginalExtension();
        $path_ktp = $file_ktp->storeAs($path, 'ktp_'.$request->NAMA.'_'.time().'.'.$ext_ktp,'local');
      }
      $regis_paket->PATH_KTP = $path_ktp;

      $ref_paket = 'LT815';
      $ref_level = '39';
      $ref_kategori = 'PRIVATE';
      $duration = PacketPriceDetails::join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_PAKET',$ref_paket)->where('REF_LEVEL',$ref_level)->where('REF_KATEGORI',$ref_kategori)->whereRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) = "ONLINE"')->first();

      if($duration != ""){
        $regis_paket_dtl->KD = $kd;
        $regis_paket_dtl->REF_PRICELIST = $duration->KD;
        $regis_paket_dtl->REF_PAKET = $ref_paket;
        $regis_paket_dtl->REF_LEVEL = $ref_level;
        $regis_paket_dtl->REF_KATEGORI = $ref_kategori;
        $regis_paket_dtl->JUMLAH_JAM =$duration->JUMLAH_JAM;
        $regis_paket_dtl->JUMLAH_PERTEMUAN = $duration->JUMLAH_PERTEMUAN;
      }else{
       $regis_paket_dtl->KD = $kd;
       $regis_paket_dtl->REF_PRICELIST = PacketPriceDetails::join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_PAKET',$ref_paket)->where('REF_LEVEL',$ref_level)->where('REF_KATEGORI',$ref_kategori)->value('KD');
       $regis_paket_dtl->REF_PAKET = $ref_paket;
       $regis_paket_dtl->REF_LEVEL = $ref_level;
       $regis_paket_dtl->REF_KATEGORI = $ref_kategori;
       $regis_paket_dtl->JUMLAH_JAM = 0;
       $regis_paket_dtl->JUMLAH_PERTEMUAN = 0;
     }
     $regis_paket_dtl->TIPE_KELAS = "ONLINE";
     $regis_paket_dtl->IELTS_MODULE= $module_id;
     $regis_paket->save();
     $regis_paket_dtl->save();

     $request->merge(['id_calonsiswa' => $kd]);
     $daftar =  OtRegistration::create($request->all());
     if($daftar){
      Mail::send(new ApproveOnlineTestNotification($request));
      Mail::send(new OtRegistrationMail($request));

      return redirect()->route('ielts-simulation')->with('message','Data Sudah Berhasil Terkirim !');
    }
  }
}
public function ielts_simulation_payment($token){
  $validasi = OtRegistration::where('token', '=', $token)->first();
  if ($validasi) {
    $tgl_daftar = $validasi->updated_at;
    $today = Carbon::now();
    $datetime1 = new DateTime($tgl_daftar);
    $datetime2 = new DateTime($today);
    $days = $datetime2->diff($datetime1);
    $diff_day =  $days->d;
    //if($diff_day<=2){
    return view('language.ielts-simulation-payment', ['token' => $token,'validasi' => $validasi,'tgl_daftar' => $tgl_daftar]);
    //}else{
    //  abort(403, 'Link Expire ! ');
    //}
  } else {
    abort(403, 'Unauthorized Action ! Wrong Link / Email Account ! ');
  }

}
public function post_ielts_simulation_payment(Request $request){

 $token= $request->token;
 $tgl_daftar = $request->tgl_daftar;
 $data = OtRegistration::where('token','=',$token)->first();
 $tgl = date("d-m-Y",strtotime($data->created_at));
 $myfile = $request->file('bukti_pembayaran');
 $path = 'public/files/ielts-simulation/online/'.$tgl.'/'.$data->id;
 $ext = $myfile->getClientOriginalExtension();
 $bukti_pembayaran = $myfile->storeAs($path, 'bukti_pembayaran.'.$ext);
 $data->update(['bukti_pembayaran' => $bukti_pembayaran]);
 return redirect('/products/ielts-test/simulation')->with('message','Bukti pembayaran sudah terupload, kami akan mengirimkan link simulasi ke email anda setelah memverifikasi bukti pembayaran. Proses ini paling lama membutuhkan waktu 1-2 hari.');

}
public function products_term_condition()
{
  return view('/language/term-condition');
}
public function ielts_term_condition()
{
  return view('/language/ielts-term-condition');
}

public function toefl_term_condition(){
 return view('/language/toefl-term-condition');
}
public function questionnaire()
{
  return view('/questionnaire');
}
public function ielts_questionnaire()
{
  return view('/ielts-questionnaire');
}
public function post_ielts_questionnaire(Request $request)
{
  Mail::send(new IeltsQuestionnaire($request));
  return redirect()->back()->with('message','Data Sudah Terkirim !');
}
public function toefl_questionnaire()
{
  return view('/toefl-questionnaire');
}
public function post_toefl_questionnaire(Request $request)
{
  Mail::send(new ToeflQuestionnaire($request));
  return redirect('/toefl-questionnaire')->with('message','Data Sudah Terkirim !');
}
public function fma_rules(){
  return view('/fma/rules');
}
public function fma_registration()
{
 return view('/fma/registration');
}
public function fma_post_regis(Request $request)
{
  if ($request->hasfile('myfiles')) {
            //foreach($request->myfiles as $file){
            //  echo $file->getRealPath();
            //}
    Mail::send(new FmaRegis($request));
    Mail::send(new FmaRegisFeedback($request));
  } else {
    echo 'tidak ada file !';
  }

  return redirect()->back()->with('message', 'Data Sudah Berhasil Terkirim !');
        //$file2 = Input::file('files')->getRealPath();
         //var_dump($file2);
         //Mail::send(new FmaRegis($request));
      /*   $foto_ktp = $request->file('foto_ktp');
         $foto_paspor = $request->file('foto_paspor');
         if ($foto_ktp->getError() == 1) {
       $max_size = $foto_ktp->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
       $error = 'The document size must be less than ' . $max_size . 'Mb.';
       return redirect()->back()->with('flash_danger', $error);*/
     }

     public function fma_term_condition()
     {
      return view('/fma/fma_term_condition');
    }

    public function price_list()
    {
      $pricelists = ProductPriceList::selectRaw('pricelists.KD,pricelists.name,pricelists.priority,pricelists.status')->groupBy('pricelists.KD','pricelists.name','pricelists.priority','pricelists.status')->join('tb_paket_bimbel_dtlharga','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->with(['packets' => function($query){
        return $query->selectRaw('tb_paket_bimbel.KD,tb_paket_bimbel.NAMA')->groupBy('tb_paket_bimbel.KD','tb_paket_bimbel.NAMA','tb_paket_bimbel_dtlharga.KD');
      }])->orderBy('priority','ASC')->where('status',1)->get();
      if(count($pricelists)){
        foreach($pricelists[0]->packets as $packet){
          $packet->details = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.KD,tb_paket_bimbel.NAMA as NAMA_PAKET,tb_paket_bimbel.KET,tb_level.NAMA as NAMA_LEVEL,tb_kategori.NAMA as NAMA_KATEGORI,HARGA_PAKET,REF_PAKET,REF_LEVEL,REF_KATEGORI,JUMLAH_JAM,JUMLAH_PERTEMUAN, pricelists.status')->join('tb_paket_bimbel','tb_paket_bimbel.KD','=','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','=','tb_paket_bimbel_dtlharga.REF_LEVEL')->join('tb_kategori','tb_kategori.KD','=','tb_paket_bimbel_dtlharga.REF_KATEGORI')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('HARGA_PAKET','!=',0)->orderBy('tb_paket_bimbel.NAMA','ASC')->orderBy('tb_paket_bimbel_dtlharga.JUMLAH_JAM','ASC')->orderBy('tb_level.NAMA','ASC')->where('tb_paket_bimbel_dtlharga.KD',$pricelists[0]->KD)->where('tb_paket_bimbel_dtlharga.REF_PAKET',$packet->KD)->orderBy('REF_KATEGORI','ASC')->get(); 
        }
      }else{
        abort(500);
      }


      return view('/products/price_list',['pricelists' => $pricelists]);
    }

    public function change_price_list(Request $request){
      $pricelist = ProductPriceList::selectRaw('pricelists.KD,pricelists.name,pricelists.priority,pricelists.status')->groupBy('pricelists.KD','pricelists.name','pricelists.priority','pricelists.status')->join('tb_paket_bimbel_dtlharga','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->with(['packets' => function($query){
        return $query->selectRaw('tb_paket_bimbel.KD,tb_paket_bimbel.NAMA')->groupBy('tb_paket_bimbel.KD','tb_paket_bimbel.NAMA','tb_paket_bimbel_dtlharga.KD');
      }])->find($request->KD);

      $pricelist->details = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.KD,tb_paket_bimbel.NAMA as NAMA_PAKET,tb_paket_bimbel.KET,tb_level.NAMA as NAMA_LEVEL,tb_kategori.NAMA as NAMA_KATEGORI,HARGA_PAKET,REF_PAKET,REF_LEVEL,REF_KATEGORI,JUMLAH_JAM,JUMLAH_PERTEMUAN, pricelists.status')->join('tb_paket_bimbel','tb_paket_bimbel.KD','=','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','=','tb_paket_bimbel_dtlharga.REF_LEVEL')->join('tb_kategori','tb_kategori.KD','=','tb_paket_bimbel_dtlharga.REF_KATEGORI')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('HARGA_PAKET','!=',0)->orderBy('tb_paket_bimbel.NAMA','ASC')->orderBy('tb_paket_bimbel_dtlharga.JUMLAH_JAM','ASC')->orderBy('tb_level.NAMA','ASC')->where('tb_paket_bimbel_dtlharga.KD',$request->KD)->where('tb_paket_bimbel_dtlharga.REF_PAKET',$pricelist->packets[0]->KD)->orderBy('REF_KATEGORI','ASC')->get(); 


       /* $pricelist = ProductPriceList::selectRaw('KD,name,priority,status')->find($request->KD);

      $pricelist->details = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.KD,tb_paket_bimbel.NAMA as NAMA_PAKET,tb_paket_bimbel.KET,tb_level.NAMA as NAMA_LEVEL,tb_kategori.NAMA as NAMA_KATEGORI,HARGA_PAKET,REF_PAKET,REF_LEVEL,REF_KATEGORI,JUMLAH_JAM,JUMLAH_PERTEMUAN, pricelists.status')->join('tb_paket_bimbel','tb_paket_bimbel.KD','=','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','=','tb_paket_bimbel_dtlharga.REF_LEVEL')->join('tb_kategori','tb_kategori.KD','=','tb_paket_bimbel_dtlharga.REF_KATEGORI')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('HARGA_PAKET','!=',0)->orderBy('tb_paket_bimbel.NAMA','ASC')->orderBy('tb_level.NAMA','ASC')->where('tb_paket_bimbel_dtlharga.KD',$request->KD)->orderBy('REF_KATEGORI','ASC')->orderBy('tb_paket_bimbel_dtlharga.JUMLAH_JAM','ASC')->get(); 
      */
      return view('products.price_list-ajax',['pricelist' => $pricelist]);
    }

    public function change_price_list_product(Request $request){
     $pricelist = ProductPriceList::selectRaw('pricelists.KD,pricelists.name,pricelists.priority,pricelists.status')->groupBy('pricelists.KD','pricelists.name','pricelists.priority','pricelists.status')->join('tb_paket_bimbel_dtlharga','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->find($request->kd_pricelist);
     $pricelist->details = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.KD,tb_paket_bimbel.NAMA as NAMA_PAKET,tb_paket_bimbel.KET,tb_level.NAMA as NAMA_LEVEL,tb_kategori.NAMA as NAMA_KATEGORI,HARGA_PAKET,REF_PAKET,REF_LEVEL,REF_KATEGORI,JUMLAH_JAM,JUMLAH_PERTEMUAN, pricelists.status')->join('tb_paket_bimbel','tb_paket_bimbel.KD','=','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','=','tb_paket_bimbel_dtlharga.REF_LEVEL')->join('tb_kategori','tb_kategori.KD','=','tb_paket_bimbel_dtlharga.REF_KATEGORI')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('HARGA_PAKET','!=',0)->orderBy('tb_paket_bimbel.NAMA','ASC')->orderBy('tb_paket_bimbel_dtlharga.JUMLAH_JAM','ASC')->orderBy('tb_level.NAMA','ASC')->where('tb_paket_bimbel_dtlharga.KD',$request->kd_pricelist)->where('tb_paket_bimbel_dtlharga.REF_PAKET',$request->kd_product)->orderBy('REF_KATEGORI','ASC')->get(); 

     return view('products.price_list-ajax',['pricelist' => $pricelist]);
   }

   public function ielts_simulation_school($nama_sekolah)
   {
    return view('/language/ielts-simulation-school3')->with('nama_sekolah', $nama_sekolah);
  }

  public function post_ielts_simulation_school(Request $request){
    $ielts_simulation_events = new IeltsSimulationEvent();
    $ielts_simulation_events->NAMA = $request->nama;
    $ielts_simulation_events->ALAMAT = $request->alamat;
    $ielts_simulation_events->KOTA_LAHIR = $request->tempat_kelahiran;
    $tanggal_lahir = $request->tahun_lahir.'-'.$request->bulan_lahir.'-'.$request->tgl_lahir;
    $ielts_simulation_events->TGL_LAHIR = $tanggal_lahir;
    $ielts_simulation_events->EMAIL = $request->email;
    $cek_data = $ielts_simulation_events::where('EMAIL','=',$request->email)->find(1);
    $ielts_simulation_events->NO_TELEPON = $request->no_hp;
    $ielts_simulation_events->JK = $request->jk;
    $ielts_simulation_events->KELAS = $request->kelas;
    $ielts_simulation_events->REF_EVENT = $request->ref_event;

    if($cek_data){
      return redirect('ielts-simulation/'.$request->ref_event)->with('warning','Anda Sudah Terdaftar Dengan Email ('.$request->email.') ! <br> Anda Hanya Dapat Mendaftar Sekali !');
    }else{
      $ielts_simulation_events->save();
      Mail::send(new IeltsSimulationEventsMail($request));
      return redirect('ielts-simulation/'.$request->ref_event)->with('message','Data Sudah Berhasil Terkirim !');
    }
  }
/*    public function post_ielts_simulation_school(Request $request){
      Mail::send(new IeltsSimulationEventsMail($request));
      return redirect()->back()->with('message','Data Sudah Berhasil Terkirim !');
    }*/
    public function copyrights()
    {
      return view('copyrights');
    }
    public function term_and_condition_register(){
      return view('auth.term-and-condition');
    }
    public function term_and_use()
    {
      return view('term_and_use');
    }
    public function privacy_and_policy()
    {
      return view('privacy_and_policy');
    }
    public function disclaimer()
    {
      return view('disclaimer');
    }

    public function document_translate()
    {
      $languages = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.KD as REF_PRICELIST,tb_paket_bimbel.KD,tb_paket_bimbel.NAMA')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->where('pricelists.status',1)->where('pricelists.type','terjemahan')->groupBy('tb_paket_bimbel.KD','tb_paket_bimbel.NAMA','tb_paket_bimbel_dtlharga.KD')->get();
      return view('translate-document',compact('languages'));
    }
    public function document_translate_post(Request $request)
    {
      $REF_PAKET = explode('|',$request->REF_PAKET);
      $REF_PAKET = $REF_PAKET[0];
      $request->merge(['users_id' => auth()->user()->id]);
      $request->merge(['REF_PAKET' => $REF_PAKET]);
      $id = RegisDocTranslate::orderBy('id','desc')->value('id');
      if($id != ""){
        $id ++;
      }else{
        $id = 1;
      }
      $arr_file = array();
      if(!empty($request->myfiles)){
        foreach($request->myfiles as $file){
          $path = 'storage/files/document-translation/'.date('d-m-Y').'/'.$id;
          $ext_file = $file->getClientOriginalExtension();
          $path_file = $file->storeAs($path, uniqid().'.'.$ext_file,'public');
          array_push($arr_file,$path_file);
        }
      }
      $request->merge(['files' => implode('|',$arr_file)]);
      $create = RegisDocTranslate::create($request->all());
      Mail::send(new DocTranslateFeedback($request));
      Mail::send(new DocTranslateMail($request));
      $output = array(
        'success' => 'File uploaded successfully',
      );

      return response()->json($output);
        //return redirect('document-translation')->with('message','Data Sudah Terkirim !');
    }
    public function document_translate_payment($token){
      $validasi = OtRegistration::where('token', '=', $token)->first();
      if ($validasi) {
        $tgl_daftar = $validasi->updated_at;
        $today = Carbon::now();
        $datetime1 = new DateTime($tgl_daftar);
        $datetime2 = new DateTime($today);
        $days = $datetime2->diff($datetime1);
        $diff_day =  $days->d;
        if($diff_day<=2){
          return view('language.toefl-simulation-payment', ['token' => $token,'validasi' => $validasi,'tgl_daftar' => $tgl_daftar]);
        }else{
          abort(403, 'Link Expire ! ');
        }
      } else {
        abort(403, 'Unauthorized Action ! Wrong Link / Email Account ! ');
      }

    }

    public function post_document_translate_payment(Request $request){

     $token= $request->token;
     $tgl_daftar = $request->tgl_daftar;
     $data = OtRegistration::where('token','=',$token)->first();
     $tgl = date("d-m-Y",strtotime($data->created_at));
     $myfile = $request->file('bukti_pembayaran');
     $path = 'public/files/toefl-simulation/online/'.$tgl.'/'.$data->id;
     $ext = $myfile->getClientOriginalExtension();
     $bukti_pembayaran = $myfile->storeAs($path, 'bukti_pembayaran.'.$ext);
     $data->update(['bukti_pembayaran' => $bukti_pembayaran]);
     return redirect('/products/toefl-test/simulation')->with('message','Bukti pembayaran sudah terupload, kami akan mengirimkan link simulasi ke email anda setelah memverifikasi bukti pembayaran. Proses ini paling lama membutuhkan waktu 1-2 hari.');
   }
   public function document_translate_tac(){
    $languages = PacketPriceDetails::get();
    dd($languages);
    return view('translate-document-fac');
  }
  
  public function tutor_application(){
    return view('careers.tutor-application');
  }

  public function post_tutor_application(Request $request){
    Mail::send(new TutorApplicationMail($request));
    return redirect('careers/tutor/application')->with('message','Data Sudah Terkirim');
  }
  public function regis_info_session(){
    return view('info-session');
  }
  public function post_regis_info_session(Request $request){
    Mail::send(new RegisInfoSessionMail($request));
    return redirect('info-session/registration');
  }
  public function school_information(){
    return view('school-information');
  }
  public function post_school_information(Request $request){
    Mail::send(new SchoolInformationMail($request));
    return redirect('school-information')->with('message','Data Anda Sudah Terkirim !');
  }

  public function school_information_tmc(){
    return view('sekolah.term-and-condition');
  }

  public function form_data_visa($type,$country){

    return view('form.form-data-visa',['type' => $type,'country' => $country]);
  }
  public function post_form_data_visa($type,$country,Request $request){
    Mail::send(new FormDataVisaMail($request));
    return redirect()->route('form-data-visa',['type' => 'tourist','code' => 'aus'])->withStatus('Data Anda Sudah Terkirim !');
  }

  public function select_sales_ajax(Request $request){
    if($request->company_id != ""){
      $sales = Sales::where('REF_PERUSAHAAN',$request->company_id)->where('AKTIF',1)->get();
    }else{
      $sales = Sales::where('AKTIF',1)->where('REF_PERUSAHAAN',$request->company_id)->get();
    }
    return $sales->toJson();
  }

  public function region_ajax(Request $request){
    $regions = Region::get();
    if ($request->country_id != "") {
      $regions = Region::where('country_id', $request->country_id)->orderBy('name','ASC')->get();
    }
    return $regions->toJson();
  }

  public function form_pindah_sekolah_agency(){
    $countries = Country::orderBy('name')->get();
    $companies = Perusahaan::get();

    return view('form.form-pindah-sekolah-agency',['companies' => $companies,'countries' => $countries]);
  }
  public function post_form_pindah_sekolah_agency(Request $request){
    $date_of_birth = $request->tanggal_lahir.'/'.$request->bulan_lahir.'/'.$request->tahun_lahir;
    $request->merge(['date_of_birth' =>$date_of_birth]);
    Mail::send(new FormPindahSekolahAgencyMail($request));
    return redirect()->route('form-pindah-sekolah-agency')->with('status','Data Has Been Successfully Sent');
  }

  public function visa_requirements($countrycode,$type){
    $country_id = Country::where('cca3',$countrycode)->value('id');
    $visaRequirements = VisaRequirement::where('country_id',$country_id)->where('type',$type)->get();

    return view('visa-requirements',['visaRequirements' => $visaRequirements,'country' => $countrycode,'type' => $type]);
  }

  public function download_visa_requirements($countrycode,$type){
    $country_id = Country::where('cca3',$countrycode)->value('id');
    $country_name = Country::where('cca3',$countrycode)->value('name');
    $visaRequirements = VisaRequirement::where('country_id',$country_id)->where('type',$type)->get();
    $pdf = PDF::loadview('download-visa-requirements',['visaRequirements'=>$visaRequirements]);
    return $pdf->download('visa-requirements-'.$country_name.'.pdf');
        //return view('download-visa-requirements',['visaRequirements' => $visaRequirements]);

  }
  public function visa_statement_letter($country,$type){
    return dd("test");
      //return view('form.visa-statement-letter');
  }
  public function post_visa_statement_letter(Request $request){

    Mail::send(new VisaStatementMail($request));
    Mail::send(new VisaStatementFeedback($request));
    return redirect('visa-statement-letter')->with('message','Data Sudah Berhasil Terkirim !');
  }
  public function visa_statement_letter_country($country){

    return view('form.visa-statement-letter-country');
  }
  public function tmc_visa_statement_letter(){
    return view('form.visa-statement-letter-tmc');
  }
  public function new_tmc_visa_statement_letter($country){
    return view('form.visa-statement-letter-tmc',['country' => strtoupper($country)]);
  }


  public function english_registration(){

    $paket_bimbel = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.KD, REF_PAKET,REF_LEVEL, tb_paket_bimbel.NAMA as PAKET, tb_level.NAMA as LEVEL')->groupBy('KD','REF_PAKET','tb_paket_bimbel.NAMA','tb_level.NAMA','REF_LEVEL')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->where('tb_paket_bimbel.REF_BIDANGUSAHA','!=','LK')->where('tb_paket_bimbel.REF_BIDANGUSAHA','!=','TL.DOC')->where('tb_paket_bimbel.REF_BIDANGUSAHA','!=','TL')->where('pricelists.status',1)->get();

    $kategori = PacketPriceDetails::selectRaw('tb_paket_bimbel_dtlharga.REF_KATEGORI as KD,tb_kategori.NAMA')->whereIn('tb_paket_bimbel_dtlharga.KD',ProductPriceList::where('status',1)->get()->toArray())->join('tb_kategori','tb_paket_bimbel_dtlharga.REF_KATEGORI','tb_kategori.KD')->groupBy('tb_paket_bimbel_dtlharga.REF_KATEGORI','NAMA')->get();

    $perusahaan = New Perusahaan;
    return view('language/english/registration',['paket_bimbel' => $paket_bimbel,'kategori' => $kategori,'perusahaan' => $perusahaan->get()]);
  }
  public function post_english_registration(Request $request){
    $arr_course_code = explode("-",$request->id_course);
    $id_course= $arr_course_code[0];
    $id_level = $arr_course_code[1];
    $nama_paket = PaketBimbel::where('KD','=',$id_course)->value('NAMA');
    $nama_level = Level::where('KD','=',$id_level)->value('NAMA');
    $jumlah_pertemuan = PacketPriceDetails::join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_PAKET',$id_course)->where('REF_LEVEL',$id_level)->where('JUMLAH_JAM',$request->durasi_kelas)->where('REF_KATEGORI',$request->id_kelompok_kelas);
    if($request->tipe_kelas == "ONLINE")
    {
      $jumlah_pertemuan =  $jumlah_pertemuan->whereRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) = "ONLINE"');
    }else{
      $jumlah_pertemuan =  $jumlah_pertemuan->whereRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) != "ONLINE"');
    }
    $ref_pricelist = $jumlah_pertemuan->get()[0]->KD;
    $jumlah_pertemuan = $jumlah_pertemuan->get()[0]->JUMLAH_PERTEMUAN;

    $request->merge(['id_course' => $id_course]);
    $request->merge(['nama_paket' => $nama_paket]);
    $request->merge(['jumlah_pertemuan' =>  $jumlah_pertemuan]);
    $request->merge(['jumlah_jam' =>  $request->durasi_kelas]);
    $request->merge(['nama_level' => $nama_level]);
    $nama =$request->nama_depan.' '.$request->nama_belakang;
    $request->merge(['id_level' => $id_level]);
    $request->merge(['nama' => $nama]);
    if ($request->hasfile('ktp')){
      $file_ktp = $request->file('ktp');
      $path = 'public/files/english-registration/'.date('d-m-Y').'/'.$nama;
      $ext_ktp = $file_ktp->getClientOriginalExtension();
      $path_ktp = $file_ktp->storeAs($path, 'foto_ktp.'.$ext_ktp);
      $request->merge(['lokasi_ktp' => $path_ktp]);
    }

    if ($request->hasfile('kk')){
      $file_kk = $request->file('kk');
      $path = 'public/files/english-registration/'.date('d-m-Y').'/'.$nama;
      $ext_kk = $file_kk->getClientOriginalExtension();
      $path_kk = $file_kk->storeAs($path, 'foto_kk.'.$ext_kk);
      $request->merge(['lokasi_kk' => $path_kk]);
    }
    $tanggal_lahir = $request->tahun_lahir.'/'.$request->bulan_lahir.'/'.$request->tanggal_lahir;
    $request->merge(['tanggal_lahir' => $tanggal_lahir]);

    $regisPaketKD = RegisPaket::orderBy('id','desc')->limit(0)->value('KD');
    $numPaket = substr($regisPaketKD,-4);
    $numPaket = (int)$numPaket;
    $numPaket++;
    $width = 4;
    $kd = 'CS'.date('y').date('m'). str_pad((string)$numPaket, $width, "0", STR_PAD_LEFT);
    $request->merge(['KD' => $kd]);
    $regis_paket = new RegisPaket;
    $regis_paket_dtl = new RegisPaketDtl;
    $regis_paket->_token = $request->_token;
    $regis_paket->users_id = Auth::user()->id;
    $regis_paket->KD = $kd;
    $regis_paket->REF_PERUSAHAAN = $request->cabang;
    $regis_paket->NAMA = $nama;
    $regis_paket->JK = $request->jk;
    $regis_paket->KOTA_KELAHIRAN = $request->tempat_lahir;
    $regis_paket->TGL_LAHIR = $tanggal_lahir;
    $regis_paket->ALAMAT = $request->alamat;
    $regis_paket->KOTA = $request->kota;
    $regis_paket->AGAMA = $request->agama;
    $regis_paket->KONTAK = $request->no_telepon;
    $regis_paket->EMAIL = $request->email;
    $regis_paket->KEWARGANEGARAAN = $request->kewarganegaraan;
    $regis_paket->REF_KTP = $request->no_ktp;
    $regis_paket->REF_PASPOR = $request->no_paspor;
    $regis_paket->TINGKAT_PEKERJAAN = $request->pekerjaan;
    $regis_paket->SEKTOR_PEKERJAAN = $request->bidang_pekerjaan;
    $regis_paket->TINGKAT_PENDIDIKAN = $request->pendidikan_terakhir;
    $regis_paket->UNIVERSITAS_TERAKHIR = $request->ref_universitas;
    $regis_paket->JURUSAN = $request->jurusan;
    if($request->tujuan_lainnya != ""){
      $regis_paket->ALASAN = $request->tujuan_lainnya;
    }else{
      $regis_paket->ALASAN = $request->tujuan_pelatihan;
    }
    $regis_paket->BAHASA_SEHARI_HARI = $request->bahasa_sehari_hari;
    $regis_paket->PATH_KTP = url($path_ktp);
    $regis_paket->PATH_KK = url($path_kk);
    $regis_paket_dtl->KD = $kd;
    $regis_paket_dtl->REF_PRICELIST = $ref_pricelist;
    $regis_paket_dtl->REF_PAKET = $id_course;
    $regis_paket_dtl->REF_LEVEL = $id_level;
    $regis_paket_dtl->REF_KATEGORI = $request->id_kelompok_kelas;
    $regis_paket_dtl->JUMLAH_JAM = $request->durasi_kelas;
    $regis_paket_dtl->JUMLAH_PERTEMUAN = $jumlah_pertemuan;
    $regis_paket_dtl->TIPE_KELAS = $request->tipe_kelas;
    $regis_paket_dtl->IELTS_MODULE= $request->ielts_module;
    $regis_paket->save();
    $regis_paket_dtl->save();

    $data_ayah = RegisPaketDataWali::create(['KD' => $kd,'nama_wali' => $request->nama_ayah,'hubungan' => 'Ayah','no_hp_wali' => $request->no_hp_ayah,'email_wali' => $request->email_ayah,'alamat_wali' => $request->alamat_orang_tua,'pekerjaan' => $request->pekerjaan_ayah,'penghasilan' => $request->penghasilan_ayah,'kebutuhan_khusus' => $request->kebutuhan_khusus_ayah]);
    $data_ibu = RegisPaketDataWali::create(['KD' => $kd,'nama_wali' => $request->nama_ibu,'hubungan' => 'Ibu','no_hp_wali' => $request->no_hp_ibu,'email_wali' => $request->email_ibu,'alamat_wali' => $request->alamat_orang_tua,'pekerjaan' => $request->pekerjaan_ibu,'penghasilan' => $request->penghasilan_ibu,'kebutuhan_khusus_ibu' => $request->kebutuhan_khusus_ibu]);
    if($request->nama_wali != "" || $request->hubungan != "" || $request->no_hp_wali != "" || $request->email_wali != ""){
      $data_wali = RegisPaketDataWali::create(['KD' => $kd,'nama_wali' => $request->nama_wali,'hubungan' => $request->hubungan,'no_hp_wali' => $request->no_hp_wali,'email_wali' => $request->email_wali,'alamat_wali' => $request->alamat_wali,'pekerjaan' => $request->pekerjaan_wali,'penghasilan' => $request->penghasilan_wali]); 
    }

    Mail::send(new EnglishRegistration($request));
    return redirect('products/language/english/registration')->with('message','Data Sudah Berhasil Terkirim !');
  }


  public function select_pricelist(Request $request){
    $result = array();
    $courses = PacketPriceDetails::selectRaw('tb_paket_bimbel.KD,tb_paket_bimbel.NAMA')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->where('pricelists.status',1)->where('tb_paket_bimbel_dtlharga.KD',$request->pricelist_id)->groupBy('tb_paket_bimbel.KD','tb_paket_bimbel.NAMA')->get();
    $result['courses'] = $courses;
    return json_encode($result);
  }
  public function select_course(Request $request){
    $course_id = $request->course_id;
    $level_id = $request->level_id;
    $type = $request->type;

    $result = array();
    if($type == "level_only"){
     $levels = PacketPriceDetails::selectRaw('tb_level.KD,tb_level.NAMA')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('tb_paket_bimbel_dtlharga.KD',$request->pricelist_id)->where('tb_paket_bimbel_dtlharga.REF_PAKET',$request->course_id)->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->get();
     $result['levels'] = $levels;
     return json_encode($result);
   }
   $duration = PacketPriceDetails::select('JUMLAH_JAM')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_LEVEL',$level_id)->where('REF_PAKET',$course_id)->groupBy('JUMLAH_JAM')->get()->toArray();
   $course_type = PacketPriceDetails::selectRaw('SUBSTRING_INDEX(tb_paket_bimbel_dtlharga.KD,".",-1) as type')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_LEVEL',$level_id)->where('REF_PAKET',$course_id)->where('HARGA_PAKET','!=','0')->groupBy('tb_paket_bimbel_dtlharga.KD')->having("type","ONLINE")->get()->toArray();
   $class_group =  PacketPriceDetails::select('REF_KATEGORI','tb_kategori.NAMA')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('REF_LEVEL',$level_id)->where('REF_PAKET',$course_id)->groupBy('REF_KATEGORI','NAMA')->join('tb_kategori','tb_paket_bimbel_dtlharga.REF_KATEGORI','tb_kategori.KD')->get()->toArray();
   $result['durations'] = $duration;
   $result['types'] = $course_type;
   $result['groups'] = $class_group;
   if($type == "with_level"){
    $levels = PacketPriceDetails::selectRaw('tb_level.KD,tb_level.NAMA')->join('pricelists','pricelists.KD','tb_paket_bimbel_dtlharga.KD')->where('pricelists.status',1)->where('tb_paket_bimbel_dtlharga.KD',$request->pricelist_id)->where('tb_paket_bimbel_dtlharga.REF_PAKET',$request->course_id)->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->get();
    $result['levels'] = $levels;
  }
  return json_encode($result);

}
public function select_level(Request $request){
  $level_id = $request->level_id;
  $course_id = $request->course_id;
  $pricelist_id = $request->pricelist_id;
  $categories= PacketPriceDetails::where('tb_paket_bimbel_dtlharga.KD',$pricelist_id)->where('tb_paket_bimbel_dtlharga.REF_LEVEL','=',$level_id)->where('tb_paket_bimbel_dtlharga.REF_PAKET','=',$course_id)->select('tb_paket_bimbel_dtlharga.REF_KATEGORI','tb_kategori.NAMA')->join('tb_kategori','tb_kategori.KD','tb_paket_bimbel_dtlharga.REF_KATEGORI')->groupBy('tb_paket_bimbel_dtlharga.REF_KATEGORI','tb_kategori.NAMA')->get();

  return json_encode($categories);
}

public function select_category(Request $request){
  $level_id = $request->level_id;
  $course_id = $request->course_id;
  $pricelist_id = $request->pricelist_id;
  $category_id = $request->category_id;
  $duration= PacketPriceDetails::where('tb_paket_bimbel_dtlharga.KD',$pricelist_id)->where('tb_paket_bimbel_dtlharga.REF_LEVEL','=',$level_id)->where('tb_paket_bimbel_dtlharga.REF_PAKET','=',$course_id)->where('tb_paket_bimbel_dtlharga.REF_KATEGORI','=',$category_id)->selectRaw('CAST(tb_paket_bimbel_dtlharga.JUMLAH_JAM as integer) as JUMLAH_JAM,CAST(tb_paket_bimbel_dtlharga.JUMLAH_PERTEMUAN as integer) as JUMLAH_PERTEMUAN,concat(CAST(JUMLAH_JAM as integer),"|",CAST(JUMLAH_PERTEMUAN as integer)) as JUMLAH_JAM_PERTEMUAN,concat(CAST(JUMLAH_JAM as integer)," Jam ",CAST(JUMLAH_PERTEMUAN as integer),"x") as LABEL')->get();
  return json_encode($duration);
}

public function select_duration(Request $request){
  $level_id = $request->level_id;
  $course_id = $request->course_id;
  $pricelist_id = $request->pricelist_id;
  $category_id = $request->category_id;
  $jumlah_jam = $request->jumlah_jam;
  $jumlah_pertemuan = $request->jumlah_pertemuan;
  $price= PacketPriceDetails::where('tb_paket_bimbel_dtlharga.KD',$pricelist_id)->where('tb_paket_bimbel_dtlharga.REF_LEVEL','=',$level_id)->where('tb_paket_bimbel_dtlharga.REF_PAKET','=',$course_id)->where('tb_paket_bimbel_dtlharga.REF_KATEGORI','=',$category_id)->where('tb_paket_bimbel_dtlharga.JUMLAH_JAM',$jumlah_jam)->where('tb_paket_bimbel_dtlharga.JUMLAH_PERTEMUAN',$jumlah_pertemuan)->value('HARGA_PAKET');
  return $price;
}


public function claim_insurance(){
  return view('products/claim-insurance');
}
public function form_whv(){
  return view('form-whv');
}
public function post_form_whv(Request $request){

  Mail::send(new FormDataMail($request));
  return redirect()->back()->with('messages','Data anda sudah terkirim !');
}
public function kinerja_tutor(){
  $data_course = ProductPriceList::selectRaw('tb_paket_bimbel.KD,tb_paket_bimbel.NAMA,tb_level.KD as KD_LEVEL,tb_level.NAMA as NAMA_LEVEL')->where('pricelists.status',1)->join('tb_paket_bimbel_dtlharga','tb_paket_bimbel_dtlharga.KD','pricelists.KD')->join('tb_paket_bimbel','tb_paket_bimbel.KD','tb_paket_bimbel_dtlharga.REF_PAKET')->join('tb_level','tb_level.KD','tb_paket_bimbel_dtlharga.REF_LEVEL')->groupBy('tb_paket_bimbel_dtlharga.KD','tb_paket_bimbel.KD','tb_paket_bimbel.NAMA','tb_level.KD','tb_level.NAMA')->get();
       //$course = new PaketBimbel;
      //$data_course = $course::where('REF_BIDANGUSAHA','=','BIMBEL')->get();
  return view('form/form-kinerja-tutor',['course' =>$data_course]);
}
public function post_kinerja_tutor(Request $request){
  $request->request->add(['nama_program' => $request->program_les]);

  Mail::send(new TutorPerformanceMail($request));
  return redirect()->back()->with('message','Data sudah terkirim !');
}

public function class_rules(){
  return view('language.english.class_rules');
}
public function form_data_student(){
  return view('form.form-data-student');
}
public function post_form_data_student(Request $request){
  Mail::send(new FormDataStudentMail($request));
  return redirect()->back()->with('message','Data Anda Sudah Terkirim !');
}
public function form_complaint(){
  return view('form.form-complaint');
}
public function post_form_complaint(Request $request){
  Complaint::create($request->all());
  Mail::send(new FormComplaintMail($request));
  session()->flash('message', 'Data sudah berhasil diinput !');
  return redirect()->back()->with('message','Data Anda Sudah Terkirim !');
}
public function form_janji_temu(){
  return view('form.form-reservasi-janji-temu');
}
public function post_form_janji_temu(Request $request){
  Mail::send(new FormJanjiTemuMail($request));
  return redirect()->back()->with('message','Data Anda Sudah Terkirim !');
}
public function portfolio_tutor($nama_tutor){
  return view('portfolio.tutor.ielts.'.$nama_tutor);
}
public function portfolio($jabatan,$nama){
  $jabatan = strtolower($jabatan);
  if($jabatan == "executive"){
    $karyawan = Executive::where('NAMA','=',$nama)->first();
    if(!$karyawan){
      abort(404,"Karyawan Tidak Ditemukan");
    }
    $id = $karyawan->ID_KARYAWAN;
    $portfolio = Portfolio::where('id_karyawan',$id)->first();
    if(!$portfolio){
      abort(404,"Portofolio Tidak Ditemukan");
    }
    $exp = Experience::where('id_karyawan','=',$id)->get();
    $edu = Edubackground::where('id_karyawan','=', $id)->orderBy('tahun_masuk')->get();
    $jenisPengalaman = OtherExperience::select('jenis_pengalaman')->where('id_karyawan','=',$id)->groupBy('jenis_pengalaman')->get();
    $pengalaman = collect($jenisPengalaman)->all();
    foreach($jenisPengalaman as $key => $value){
      $other = OtherExperience::where('id_karyawan','=',$id)->where('jenis_pengalaman','=',$value['jenis_pengalaman'])->get();
      $pengalaman[$key]['detail'] = $other;
    }
    $galleries = PortfolioDetail::with('galleries')->where('id_karyawan',$id)->get();
    return view('portfolio.portfolio-template',['karyawan' => $karyawan,'exp' => $exp,'edu' => $edu,'other' => $pengalaman,'portfolio' => $portfolio,'galleries' => $galleries,'certifications' => array()]);
  }else{
    $jabatan2 = $jabatan;
    $karyawan = Karyawan::selectRaw('tb_karyawan.NAMA as NAMA,tb_jabatan.NAMA as REF_JABATAN,tb_karyawan.ID_KARYAWAN as ID_KARYAWAN,tb_karyawan.REF_PERUSAHAAN')->join('tb_jabatan','tb_karyawan.REF_JABATAN','=','tb_jabatan.KD')->where('tb_karyawan.NAMA','=',$nama)->where('tb_jabatan.NAMA','=',$jabatan)->first();
    
    if(!$karyawan){
      abort(404,"Karyawan Tidak Ditemukan");
    }

    $id = $karyawan->ID_KARYAWAN;
    $portfolio = Portfolio::where('id_karyawan',$id)->first();
    if(!$portfolio){
      abort(404,"Portofolio Tidak Ditemukan");
    }
    $exp = Experience::where('id_karyawan','=',$id)->get();
    $edu = Edubackground::where('id_karyawan','=', $id)->orderBy('tahun_masuk')->get();
    $jenisPengalaman = OtherExperience::select('jenis_pengalaman')->where('id_karyawan','=',$id)->groupBy('jenis_pengalaman')->get()->toArray();
    $pengalaman = collect($jenisPengalaman)->all();
    foreach($jenisPengalaman as $key => $value){
      $other = OtherExperience::where('id_karyawan','=',$id)->where('jenis_pengalaman','=',$value['jenis_pengalaman'])->get();
      $pengalaman[$key]['detail'] = $other;
    }
    $galleries = PortfolioDetail::with('galleries')->where('id_karyawan',$id)->get();
    $data = ['karyawan' => $karyawan,'exp' => $exp,'edu' => $edu,'other' => $pengalaman,'portfolio' => $portfolio,'galleries' => $galleries];

    if(strtolower($jabatan) == "academic"){
      $certifications = Certification::where('id_karyawan',$id)->get();
      if($certifications){
        $data['certifications'] =  $certifications;
      }
    }else{
      $data['certifications'] = [];
    }
    return view('portfolio.portfolio-template',$data);

  }
}

public function print_portfolio($jabatan,$nama){
  $jabatan = strtolower($jabatan);
  if($jabatan == "executive"){
    $karyawan = Executive::where('NAMA','=',$nama)->first();
    $id = $karyawan->ID_KARYAWAN;
    $portfolio = Portfolio::where('id_karyawan',$id)->first();
    $exp = Experience::where('id_karyawan','=',$id)->get();
    $edu = Edubackground::where('id_karyawan','=', $id)->orderBy('tahun_masuk')->get();
    $jenisPengalaman = OtherExperience::select('jenis_pengalaman')->where('id_karyawan','=',$id)->groupBy('jenis_pengalaman')->get();
    $pengalaman = collect($jenisPengalaman)->all();
    foreach($jenisPengalaman as $key => $value){
      $other = OtherExperience::where('id_karyawan','=',$id)->where('jenis_pengalaman','=',$value['jenis_pengalaman'])->get();
      $pengalaman[$key]['detail'] = $other;
    }
    $galleries = PortfolioDetail::with('galleries')->where('id_karyawan',$id)->get();
    $pdf = PDF::loadview('portfolio.portfolio-template-print',['karyawan' => $karyawan,'exp' => $exp,'edu' => $edu,'other' => $pengalaman,'portfolio' => $portfolio,'galleries' => $galleries]); 
    return $pdf->download('portfolio-'.$nama.'.pdf');
  }else{
    $jabatan2 = $jabatan;
    $karyawan = Karyawan::selectRaw('tb_karyawan.NAMA as NAMA,tb_jabatan.NAMA as REF_JABATAN,tb_karyawan.ID_KARYAWAN as ID_KARYAWAN')->join('tb_jabatan','tb_karyawan.REF_JABATAN','=','tb_jabatan.KD')->where('tb_karyawan.NAMA','=',$nama)->where('tb_jabatan.NAMA','=',$jabatan)->first();
    if(!$karyawan){
      abort(404);
    }

    $id = $karyawan->ID_KARYAWAN;
    $portfolio = Portfolio::where('id_karyawan',$id)->first();
    $exp = Experience::where('id_karyawan','=',$id)->get();
    $edu = Edubackground::where('id_karyawan','=', $id)->orderBy('tahun_masuk')->get();
    $jenisPengalaman = OtherExperience::select('jenis_pengalaman')->where('id_karyawan','=',$id)->groupBy('jenis_pengalaman')->get()->toArray();
    $pengalaman = collect($jenisPengalaman)->all();
    foreach($jenisPengalaman as $key => $value){
      $other = OtherExperience::where('id_karyawan','=',$id)->where('jenis_pengalaman','=',$value['jenis_pengalaman'])->get();
      $pengalaman[$key]['detail'] = $other;
    }
    $galleries = PortfolioDetail::with('galleries')->where('id_karyawan',$id)->get();
    $data = ['karyawan' => $karyawan,'exp' => $exp,'edu' => $edu,'other' => $pengalaman,'portfolio' => $portfolio,'galleries' => $galleries];

    if(strtolower($jabatan) == "academic"){
      $certifications = Certification::where('id_karyawan',$id)->get();
      if($certifications){
        $data['certifications'] =  $certifications;
      }
    }else{
      $data['certifications'] = [];
    }
    $pdf = PDF::loadView('portfolio.portfolio-template-print',$data);
    return $pdf->stream();
  }
}

public function portfolio_perusahaan($perusahaan,$jabatan,$nama){
  if(!Schema::hasTable($perusahaan.'_portfolio')){
    abort(404);
  }
  $jabatan = strtolower($jabatan);
  if($jabatan == "executive"){
    $karyawan = Executive::where('NAMA','=',$nama)->first();
    if(!$karyawan){
      abort(404);
    }
    $id = $karyawan->ID_KARYAWAN;


    $portfolio =  DB::table($perusahaan."_portfolio")->where('id_karyawan',$id)->first();

    $exp =  DB::table($perusahaan."_portfolio_experience")->where('id_karyawan',$id)->get();

    $edu = DB::table($perusahaan."_portfolio_edubackground")->where('id_karyawan',$id)->orderBy('tahun_masuk')->get();
    $jenisPengalaman =  DB::table($perusahaan."_portfolio_other_experience")->select('jenis_pengalaman')->where('id_karyawan','=',$id)->groupBy('jenis_pengalaman')->get()->toArray();

    $pengalaman = collect($jenisPengalaman)->all();
    foreach($jenisPengalaman as $key => $value){
      $other =  DB::table($perusahaan."_portfolio_other_experience")->where('id_karyawan','=',$id)->where('jenis_pengalaman','=',$value->jenis_pengalaman)->get();
      $pengalaman[$key]->detail = $other;
    }
    return view('portfolio.portfolio-perusahaan-template',['karyawan' => $karyawan,'exp' => $exp,'edu' => $edu,'other' => $pengalaman,'portfolio' => $portfolio,'perusahaan' => $perusahaan]);
  }else{
    $jabatan2 = $jabatan;
    $karyawan = Karyawan::selectRaw('tb_karyawan.NAMA as NAMA,tb_jabatan.NAMA as REF_JABATAN,tb_karyawan.ID_KARYAWAN as ID_KARYAWAN')->join('tb_jabatan','tb_karyawan.REF_JABATAN','=','tb_jabatan.KD')->where('tb_karyawan.NAMA','=',$nama)->where('tb_jabatan.NAMA','=',$jabatan)->first();
    if(!$karyawan){
      abort(404);
    }
    $id = $karyawan->ID_KARYAWAN;
    $portfolio =  DB::table($perusahaan."_portfolio")->where('id_karyawan',$id)->first();

    $exp =  DB::table($perusahaan."_portfolio_experience")->where('id_karyawan',$id)->get();

    $edu = DB::table($perusahaan."_portfolio_edubackground")->where('id_karyawan',$id)->orderBy('tahun_masuk')->get();
        //Edubackground::where('id_karyawan','=', $id)->orderBy('tahun_masuk')->get();
    $jenisPengalaman =  DB::table($perusahaan."_portfolio_other_experience")->select('jenis_pengalaman')->where('id_karyawan','=',$id)->groupBy('jenis_pengalaman')->get()->toArray();
    $pengalaman = collect($jenisPengalaman)->all();
    foreach($jenisPengalaman as $key => $value){
      $other =  DB::table($perusahaan."_portfolio_other_experience")->where('id_karyawan','=',$id)->where('jenis_pengalaman','=',$value->jenis_pengalaman)->get();
         // $other = OtherExperience::where('id_karyawan','=',$id)->where('jenis_pengalaman','=',$value['jenis_pengalaman'])->get();
      $pengalaman[$key]->detail = $other;
    }
    return view('portfolio.portfolio-perusahaan-template',['karyawan' => $karyawan,'exp' => $exp,'edu' => $edu,'other' => $pengalaman,'portfolio' => $portfolio,'perusahaan' => $perusahaan]);

  }


}

public function detail_portfolio(Request $request){
  $galleries = PortfolioGallery::where('detail_id',$request->id)->get();
  $details = PortfolioDetail::find($request->id);
  return view('portfolio.detail-portfolio',['galleries' => $galleries,'details' => $details]);
}
    /*
    $jabatan2 = $jabatan;
        $karyawan = Karyawan::selectRaw('tb_karyawan.NAMA as NAMA,tb_jabatan.NAMA as REF_JABATAN,tb_karyawan.ID_KARYAWAN as ID_KARYAWAN')->join('tb_jabatan','tb_karyawan.REF_JABATAN','=','tb_jabatan.KD')->where('tb_karyawan.NAMA','=',$nama)->where('tb_jabatan.NAMA','=',$jabatan)->first();
        $id = $karyawan->ID_KARYAWAN;
        $exp = Experience::where('id_karyawan','=',$id)->get();
        $edu = Edubackground::where('id_karyawan','=', $id)->get();
        $jenisPengalaman = OtherExperience::select('jenis_pengalaman')->where('id_karyawan','=',$id)->groupBy('jenis_pengalaman')->get();
        $pengalaman = "";
        foreach($jenisPengalaman as $key => $value){

          $pengalaman .= "<br><h3>".$value->jenis_pengalaman."</h3>";
          $other = OtherExperience::where('id_karyawan','=',$id)->where('jenis_pengalaman','=',$value->jenis_pengalaman)->get();
          foreach($other as $key2 => $value2){
            $key2++;
            $pengalaman .= "<div class='tutor-desc row'>
            <div class='col-md-2'>".
            $value2->jenis_pengalaman." ".$key2."<span class='colon'>:</span>
            </div>
            <div class='col-md-10'>".
            urldecode($value2->pengalaman).
            "
            </div>

            </div>";
          }
        }
        return view('portfolio.portfolio-template',['karyawan' => $karyawan,'exp' => $exp,'edu' => $edu,'other' => $pengalaman]);
    */
        public function member_promo_ajax(){
          $promo = MerchantPromoModel::get();

          return view('member-les.product-ajax',['promo' => $promo]);
        }
        public function member_service_ajax(Merchant $model){
          $model = $model::where('status',1);
          return view('member-les.service-ajax',['merchant' => $model->paginate(9)]);
        }
        public function admin(Request $request){
          $title = "admin";
          $route = "admin";
          $dashboard = 'null';
          if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Staff')){
            $dashboard = 'admin'; 
            $year = date("Y");

            $calendar_events = Events::selectRaw('nama as title, tgl_mulai as start, tgl_selesai as end, full_day_event as allDay')->where('tgl_mulai','>=',$year.'-'.'01'.'-'.'01')->where('tgl_selesai','<=',$year.'-'.'12'.'-'.'31')->orderBy('tb_events.tgl_mulai','ASC')->get();
            $berdayakan_calendar_events = EventsBerdayakan::selectRaw('concat(tb_events_berdayakan.nama," - ",tb_event_types.name) as title, tb_events_berdayakan.tgl_mulai as start, tb_events_berdayakan.tgl_selesai as end, tb_events_berdayakan.full_day_event as allDay')->where('tgl_mulai','>=',$year.'-'.'01'.'-'.'01')->where('tgl_selesai','<=',$year.'-'.'12'.'-'.'31')->join('tb_event_types','tb_event_types.id','tb_events_berdayakan.event_type_id')->orderBy('tb_events_berdayakan.tgl_mulai','ASC')->get();
            $events = Events::orderByRaw('ABS(DATEDIFF(tgl_mulai, NOW()))','ASC')->whereNotNull('tgl_mulai')->whereRaw('tgl_mulai >= curdate()')->limit(10)->get();
            $rules = CompanyRule::selectRaw('company_rule_categories.name as category_name,company_rule_categories.icons as icons, company_rules.*')->join('company_rule_categories','company_rule_categories.id','company_rules.category_id')->get();
            $enquiries = Enquiry::where('user_id',Auth::user()->id)->paginate(10,['*'],'enquiry-page');
            
            $sk = SK::orderBy('no','ASC')->paginate(10,['*'],'sk-page');
            $contracts = Contract::orderBy('no','ASC')->paginate(10,['*'],'contract-page');

            $sk_karyawan = SK::where('id_karyawan',auth()->user()->employee_id)->orderBy('no','ASC')->paginate(10,['*'],'employee-sk-page');
            $contracts_karyawan = Contract::where('id_karyawan',auth()->user()->employee_id)->orderBy('no','ASC')->paginate(10,['*'],'employee-contract-page');
            $briefings = Briefing::paginate(10,['*'],'briefing-page');

            if(auth()->user()->employee_id != ""){
              $job_description = JobDescription::where('id_karyawan',auth()->user()->employee_id)->first();
            }else{
              $job_description = "";
            }
            if(!empty($request->all())){
              if(key($request->all()) == "enquiry-page"){
                return Response::json(View::make('admin.enquiry.ajax-result', array('enquiries' => $enquiries))->render());
              }else if(key($request->all()) == "sk-page"){
                return Response::json(View::make('admin.company-data.sk.ajax-result', array('sk' => $sk))->render());
              }else if(key($request->all()) == "employee-sk-page"){
                return Response::json(View::make('admin.company-data.sk.ajax-result', array('sk' => $sk_karyawan,'type' => 'account'))->render());
              }else if(key($request->all()) == "contract-page"){
                return Response::json(View::make('admin.company-data.contract.ajax-result', array('contracts' => $contracts))->render());
              }else if(key($request->all()) == "employee-contract-page"){
                return Response::json(View::make('admin.company-data.contract.ajax-result', array('contracts' => $contracts_karyawan,'type' => 'account'))->render());
              }else if(key($request->all()) == "briefing-page"){
                return Response::json(View::make('admin.company-data.briefing.ajax-result', array('briefings' => $briefings))->render());
              }
            }
            return view('dashboard',['dashboard' => $dashboard,'default_route' => $route,'calendar_events' => $calendar_events,'events' => $events,'rules' => $rules,'enquiries' => $enquiries,'sk' => $sk,'contracts' => $contracts,'sk_karyawan' => $sk_karyawan,'contracts_karyawan' => $contracts_karyawan ,'job_description' => $job_description,'briefings' => $briefings,'berdayakan_calendar_events' => $berdayakan_calendar_events]);
          }
        }
      }
