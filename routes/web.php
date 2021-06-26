<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
return view('welcome');
});*/
use Illuminate\Http\Request;

use App\Mail\RegisIeltsOfficial;
use App\Mail\RegisIeltsSimulation;
use App\Mail\IeltsSimulationEvents;
use App\Mail\RegisToeflSimulation;
use App\Mail\FmaRegis;
use App\Mail\questionnaire;
use Illuminate\Support\Facades\Mail;



Route::group(['middleware' => 'cors'], function () {

	/* ======================  Web BP  ======================== */
	Route::get('/products/toefl-test','BP\WebController@toefl_test')->name('toefl-test');
	Route::get('/products/toefl-test/simulation','BP\WebController@toefl_simulation')->name('toefl-simulation')->middleware('authwithmessage','verified');
	Route::post('/products/toefl-test/simulation','BP\WebController@post_toefl_simulation');
	Route::get('/products/toefl-test/simulation/upload-payment/{token}','BP\WebController@toefl_simulation_payment');
	Route::post('/products/toefl-test/simulation/upload-payment','BP\WebController@post_toefl_simulation_payment');
	Route::get('/products/toefl-test/official','BP\WebController@toefl_official')->middleware('authwithmessage','verified');
	Route::post('/products/toefl-test/official','BP\WebController@post_toefl_official');
	Route::get('/products/toefl-test/official_step2','BP\WebController@toefl_official_step2')->name('toefl-official-step2');
	Route::get('/products/toefl-test/term-and-condition','BP\WebController@toefl_term_condition');
	Route::post('products/toefl-test/official/submit','BP\WebController@toefl_official_submit');
	Route::get('/products/toefl-test/official/upload-payment/{token}','BP\WebController@toefl_official_upload_payment')->middleware('authwithmessage');
	Route::post('/products/toefl-test/official/upload-payments-receipt','BP\WebController@toefl_upload_payments_receipt');


	Route::get('/products/ielts-test','BP\WebController@ielts_test')->name('ielts-test');
	Route::get('/products/ielts-test/official/','BP\WebController@ielts_official')->name('ielts-official')->middleware('authwithmessage','verified');
	Route::post('/products/ielts-test/official','BP\WebController@post_ielts_official')->name('post-ielts-official');
	Route::get('/products/ielts-test/simulation/','BP\WebController@ielts_simulation')->name('ielts-simulation')->middleware('authwithmessage','verified');
	Route::get('/products/ielts-test/simulation/upload-payment/{token}','BP\WebController@ielts_simulation_payment');
	Route::post('/products/ielts-test/simulation/upload-payment','BP\WebController@post_ielts_simulation_payment');
	Route::get('/products/term-and-condition','BP\WebController@products_term_condition');
	Route::get('/products/ielts-test/term-and-condition','BP\WebController@ielts_term_condition');
	Route::post('/products/ielts-test/official/step-2','BP\WebController@ielts_official_step1_post')->name('ielts_official_step1_post');
	Route::get('/products/ielts-test/official/upload-payment/{token}','BP\WebController@ielts_official_upload_payment')->middleware('authwithmessage');
	Route::post('/products/ielts-test/official/submit','BP\WebController@ielts_official_submit')->name('ielts_official_submit');
	Route::post('/products/ielts-test/official/upload-payments-receipt','BP\WebController@upload_payments_receipt');
	Route::get('/products/ielts-test/official/previous-step','BP\WebController@ieltso_previous_step')->name('ielts_previous_step');
	Route::post('/products/ielts-test/simulation','BP\WebController@post_ielts_simulation');

	Route::get('/products/{test_name}/simulation/upload-payment/{token}','BP\WebController@online_test_payment');
	Route::post('/products/{test_name}/simulation/upload-payment','BP\WebController@post_online_test_payment');

	Route::get('/products/pte-academic/simulation','BP\WebController@pte_academic_simulation')->name('pte-academic')->middleware('authwithmessage','verified');
	Route::post('/products/pte-academic/simulation','BP\WebController@post_pte_academic_simulation');
	Route::get('/products/pte-academic/official','BP\WebController@pte_academic_official')->middleware('authwithmessage','verified');
	Route::post('/products/pte-academic/official','BP\WebController@post_pte_academic_official');


	Route::get('/products/language/{language}/registration','BP\WebController@english_registration')->middleware('authwithmessage','verified');
	Route::post('/products/language/{language}/registration','BP\WebController@post_english_registration');

	Route::get('/products/registration-and-payment/{kode}/{slug}','BP\WebController@registration_payment')->middleware('authwithmessage','verified');
	Route::get('/products/registration-and-payment/{kode}/{slug}/cancel','BP\WebController@reseller_cancel')->middleware('authwithmessage','verified');
	Route::post('/products/registartion-and-payment/detail-product','BP\WebController@reseller_detail_product')->name('reseller-regis-detail-product');

	Route::get('/document-translation','BP\WebController@document_translate')->name('document_translate')->middleware('authwithmessage','verified');
	Route::get('/document-translation/upload-payment/{token}','BP\WebController@document_translate_payment');
	Route::get('/document-translation/term-and-condition','BP\WebController@document_translate_tac');
	Route::post('/document-translation','BP\WebController@document_translate_post')->name('post-document-translation');

	MenuBuilder::routes();
	Route::get('/products/bept','BP\WebController@bept')->name('bept');
	Route::post('/products/bept','BP\WebController@post_bept')->name('post-bept');


	Route::get('/','BP\WebController@index')->name('bp');

	Route::get('/company-structures','BP\WebController@company_structures');

	Route::get('/demo/pendaftaran-mahasiswa','BP\WebController@demo_pendaftaran_mahasiswa');
	Route::post('/demo/pendaftaran-mahasiswa','BP\WebController@post_demo_pendaftaran_mahasiswa');
	Route::get('/demo/pendaftaran-mahasiswa-wd','BP\WebController@demo_pendaftaran_mahasiswa_wd');
	Route::post('/demo/pendaftaran-mahasiswa-wd','BP\WebController@post_demo_pendaftaran_mahasiswa_wd');

	Route::get('/register/term-and-condition','BP\WebController@term_and_condition_register');
	Route::get('/contact_us', 'BP\WebController@contact_us')->name('contact_us');
	Route::post('/contact_us','BP\WebController@post_contact_us');
	Route::post('/subscribe/newsletter','BP\WebController@subscribe_newsletter')->name('subscribe-newsletter');
	Route::get('/routes','BP\WebController@routes');
	Route::get('/form/{slug}','BP\WebController@form');
	Route::post('/form/{slug}','BP\WebController@save_form');
	Route::get('/links/{role}','BP\WebController@links');
	Route::post('/links/change-type-ajax','BP\WebController@change_link_type')->name('change-link-type');
	Route::post('/links/change-subtype-ajax','BP\WebController@change_link_subtype')->name('change-link-subtype');

	Route::get('/copyrights','BP\WebController@copyrights')->name('copyrights');
	Route::get('/term_and_use','BP\WebController@term_and_use')->name('term_and_use');
	Route::get('/privacy_and_policy','BP\WebController@privacy_and_policy')->name('privacy_and_policy');
	Route::get('/disclaimer','BP\WebController@disclaimer')->name('disclaimer');
	Route::get('/careers/internship-and-job-vacancy','BP\WebController@internship_job_vacancy');
	Route::post('/careers/internship-and-job-vacancy','BP\WebController@post_internship_job_vacancy');
	Route::get('/careers/application','BP\WebController@career_application')->name('career_application')->middleware('authwithmessage');
	Route::post('/careers/application','BP\WebController@post_career_application')->name('post_career_application');
	Route::get('/careers/application/job-vacancies-ajax','BP\WebController@career_application_vacancies_ajax')->name('job-vacancies-ajax');
	Route::post('/careers/application/category','BP\WebController@career_application_category')->name('recruitments-category');
	Route::post('/careers/application/biodata','BP\WebController@career_application_biodata')->name('recruitments-biodata');
	Route::post('/careers/application/experience','BP\WebController@career_application_experience')->name('recruitments-experience');
	Route::post('/careers/application/education','BP\WebController@career_application_education')->name('recruitments-education');

	Route::get('/careers/{perusahaan}/illustrator/application','BP\WebController@career_illustrator_application')->name('post-illustrator-application');
	Route::post('/careers/{perusahaan}/illustrator/application','BP\WebController@post_career_illustrator_application');
	Route::get('/careers/tutor/application','BP\WebController@tutor_application')->name('tutor_application');
	Route::post('/careers/tutor/application','BP\WebController@post_tutor_application')->name('post_tutor_application');

	Route::resource('certificate-tracking','Admin\CertificateTrackingController',['names' => [
		'create' => 'certificate-tracking.create',
		'index' => 'certificate-tracking.index',	
		'store' => 'certificate-tracking.store',
		'destroy' => 'certificate-tracking.destroy',
		'edit' => 'certificate-tracking.edit',
		'update' => 'certificate-tracking.update'
	]]);

	
	Route::get('/about','BP\WebController@about_us')->name('about_us');
	Route::get('/why_choose_us','BP\WebController@why_choose_us')->name('why_choose_us');
	Route::get('/products','BP\WebController@product_languages')->name('products');
	Route::get('/media/news','BP\WebController@news')->name('news');
//Route::get('/media/info-lowker','BP\WebController@info_lowker')->name('info-lowker');
	Route::get('/media/promo','BP\WebController@media_promo')->name('media_promo');
	Route::get('/media/promo/{year}/{month}/{slug}','BP\WebController@media_promo_view');
	Route::get('/media/promo/tags/{tag}','BP\WebController@media_promo_tags');
	Route::post('promo-recruitment','BP\WebController@post_promo_recruitment');
	Route::get('/media/info-lowker','BP\WebController@info_lowker')->name('info_lowker');
	Route::get('/media/info-lowker/{year}/{month}/{slug}','BP\WebController@info_lowker_view');
	Route::get('/media/info-lowker/tags/{tag}','BP\WebController@info_lowker_tags');
	Route::get('/media/beasiswa','BP\WebController@media_beasiswa')->name('media_beasiswa');
	Route::post('/media/filter-beasiswa','BP\WebController@filter_beasiswa')->name('filter-beasiswa');
	Route::get('/media/beasiswa/{year}/{month}/{slug}','BP\WebController@media_beasiswa_view');
	Route::get('/media/beasiswa/tags/{tag}','BP\WebController@media_beasiswa_tags');
	Route::get('/news-tag-ajax','BP\WebController@news')->name('news-tag-ajax');
	Route::get('/media/events','BP\WebController@events')->name('events');
	Route::get('media/events/{type}','BP\WebController@events_type');
	Route::post('media/events/expo-content-ajax','BP\WebController@expo_content_ajax')->name('expo-content-ajax');
	Route::get('/media/events/{type}/{year}/{month}/{slug}','BP\WebController@events_type_view');
	Route::get('/media/events/expo/{kd}','BP\WebController@events_expo');
	Route::get('/media/events/expo/{kd}/exhibitors','BP\WebController@events_expo_exhibitors');
	Route::get('/media/events/expo/{kd}/pavillions','BP\WebController@events_expo_pavillions');
	Route::get('/media/testimony','BP\WebController@testimony')->name('testimony');
	Route::get('/media/news/{year}/{month}/{slug}','BP\WebController@news_view');
	Route::get('/media/news/tags/{tag}','BP\WebController@news_tags');

	Route::get('/media/info-lowker/{year}/{month}/{slug}','BP\WebController@info_lowker_view');
	Route::get('/media/info-lowker/tags/{tag}','BP\WebController@info_lowker_tags');
	Route::get('/products/document-translation','BP\WebController@document_translation');
	Route::get('/products/languages','BP\WebController@product_languages')->name('language');
	Route::post('select-sales-ajax','BP\WebController@select_sales_ajax')->name('select-sales-ajax');
	Route::post('region-ajax','BP\WebController@region_ajax')->name('region-ajax');

	Route::get('/products/{languages}/{products}/registration','BP\WebController@registration')->name('products-registration')->middleware('authwithmessage','verified');
	Route::get('/products/registration-and-payment','BP\WebController@registration_payment')->name('registration-and-payment')->middleware('authwithmessage','verified');
	Route::post('/products/registration','BP\WebController@post_registration')->name('post-products-registration');

	Route::post('/products/registration/billing-data','BP\WebController@post_billing_data')->name('api-product-transaction')->middleware('authwithmessage','verified');

	Route::post('/products/registration/offer-letter','BP\WebController@post_offer_letter')->name('post-registration-loo')->middleware('authwithmessage','verified');

	Route::get('/products/back-to-billing','BP\WebController@back_to_billing')->name('back-to-billing');

	Route::get('/products/cancel-payment','BP\WebController@cancel_payment')->name('cancel-payment')->middleware('authwithmessage','verified');
	Route::get('/products/payment-redirected','BP\WebController@payment_redirected')->name('payment-redirected');
	Route::post('/products/check-payment-status','BP\WebController@check_payment_status')->name('check-payment-status')->middleware('authwithmessage','verified');
	Route::get('/products/payment-finished','BP\WebController@payment_finished')->name('payment-finished');
	Route::get('getCartEvent','BP\WebController@cartEventStream');
	Route::post('/products/add-to-cart','BP\WebController@add_to_cart')->name('add-to-cart');
	Route::post('/products/remove-cart-item','BP\WebController@remove_cart_items')->name('remove-cart-items');
	Route::post('/products/payment-channel-fee','BP\WebController@payment_channel_fee')->name('payment-channel-fee');

	Route::get('/products/tax-claim','BP\WebController@tax_claim')->name('tax_claim');
	Route::get('/products/tax-claim/application','BP\WebController@tax_claim_application');
	Route::post('/products/tax-claim/application','BP\WebController@post_tax_claim_application');

	Route::get('/time-table/cariSekolah','BP\WebController@dataSekolah')->name('dataSekolah');
	Route::get('/study-abroad/{country}', ['uses' =>'BP\WebController@sa_country']);
	Route::get('/time-table','BP\WebController@time_table')->name('time_table');
	Route::get('/time-table/search','BP\WebController@tt_search')->name('tt_search');

	Route::get('/study-abroad/','BP\WebController@study_abroad')->name('study_abroad');
	Route::get('/careers','BP\WebController@careers');
	//Route::get('/media','BP\WebController@media')->name('media');
	Route::get('foo', function () {
		return 'Hello World';
	});

	Route::get('/products/tips-belajar','BP\WebController@tips_belajar')->name('tips-belajar');
	Route::get('/products/price-list','BP\WebController@price_list')->name('price-list');
	Route::post('/products/change-price-list','BP\WebController@change_price_list')->name('change-pricelist');
	Route::post('/products/change-price-list-product','BP\WebController@change_price_list_product')->name('change-pricelist-product');
	Route::get('/questionnaire','BP\WebController@questionnaire')->name('questionnaire');
	Route::get('/ielts-questionnaire','BP\WebController@ielts_questionnaire');
	Route::post('/ielts-questionnaire','BP\WebController@post_ielts_questionnaire');
	Route::get('/toefl-questionnaire','BP\WebController@toefl_questionnaire');
	Route::post('/toefl-questionnaire','BP\WebController@post_toefl_questionnaire');

	Route::get('/products/{language}','BP\WebController@language_products');
	Route::post('/questionnaire',function(Request $request){
		Mail::send(new questionnaire($request));
		return redirect()->back()->with('message','Data Sudah Berhasil Terkirim !');
	});

	Route::get('/ielts-simulation/{nama_sekolah}','BP\WebController@ielts_simulation_school');
	Route::post('/ielts-simulation-school','BP\WebController@post_ielts_simulation_school');

	Route::get('/fma/registration','BP\WebController@fma_registration')->name('fma_registration');
	Route::post('/fma/registration','BP\WebController@fma_post_regis')->name('fma_post_regis');
	Route::get('/fma/term-condition','BP\WebController@fma_term_condition')->name('fma_term_condition');
	//Route::get('/fma/rules','BP\WebController@fma_rules')->name('fma-fma_rules');


	Route::get('/info-session/registration','BP\WebController@regis_info_session')->name('regis-info-session');
	Route::post('/info-session/registration','BP\WebController@post_regis_info_session')->name('regis-info-session');
	Route::get('/form-testimony','BP\WebController@form_testimony')->name('form-testimony');
	Route::post('/form-testimony','BP\WebController@post_form_testimony')->name('post-form-testimony');
	Route::get('/school-information','BP\WebController@school_information')->name('school-information');
	Route::get('/student/school-information/term-and-condition','BP\WebController@school_information_tmc');
	Route::get('/form-data-visa/{type}/{code}','BP\WebController@form_data_visa')->name('form-data-visa');
	Route::post('/form-data-visa/{type}/{code}','BP\WebController@post_form_data_visa')->name('post-form-data-visa');

	Route::get('/form-study-tour-kuching/term-and-condition','BP\WebController@form_study_tour_kuching_tac');
	Route::get('/form-study-tour-kuching','BP\WebController@form_study_tour_kuching');
	Route::post('/form-study-tour-kuching','BP\WebController@post_form_study_tour_kuching');

	Route::get('/form-pindah-sekolah-dan-agency','BP\WebController@form_pindah_sekolah_agency')->name('form-pindah-sekolah-agency');
	Route::post('/form-pindah-sekolah-dan-agency','BP\WebController@post_form_pindah_sekolah_agency');

	Route::get('/form-webinars-guest-speaker','BP\WebController@form_webinars_guest_speaker');
	Route::post('/form-webinars-guest-speaker','BP\WebController@post_form_webinars_guest_speaker');

	Route::get('/form-design-webinars-guest-speaker','BP\WebController@form_design_webinars_guest_speaker');
	Route::post('/form-design-webinars-guest-speaker','BP\WebController@post_form_design_webinars_guest_speaker');
	Route::get('/form-design-promo','BP\WebController@form_design_promo');
	Route::post('/form-design-promo','BP\WebController@post_form_design_promo');

	Route::get('/form-permintaan-pembuatan-surat-menyurat','BP\WebController@form_permintaan_pembuatan_surat_menyurat');
	Route::post('/form-permintaan-pembuatan-surat-menyurat','BP\WebController@post_form_permintaan_pembuatan_surat_menyurat');

	Route::get('/enquiry','BP\WebController@enquiry');
	Route::post('/enquiry','BP\WebController@post_enquiry');
	Route::get('/enquiry/reference/{code}','BP\WebController@enquiry_detail');
	Route::get('/enquiry/reference/{code}/confirm','BP\WebController@enquiry_confirm')->name('confirm-enquiry');
	Route::post('/enquiry/reference/{code}/confirm','BP\WebController@enquiry_confirm')->name('post-confirm-enquiry');
	Route::get('/enquiry/submitted','BP\WebController@enquiry_submitted');
	Route::post('/enquiry/ask-question','BP\WebController@ask_question');
	Route::post('/enquiry/review','BP\WebController@post_review');


	Route::get('/visa-requirements/{countrycode}/{type}','BP\WebController@visa_requirements');
	Route::get('/visa-requirements/{countrycode}/{type}/download','BP\WebController@download_visa_requirements');

	Route::post('/select-pricelist','BP\WebController@select_pricelist')->name('select-pricelist');
	Route::post('/select-course','BP\WebController@select_course')->name('select-course');
	Route::post('/select-level','BP\WebController@select_level')->name('select-level');
	Route::post('/select-category','BP\WebController@select_category')->name('select-category');
	Route::post('/select-duration','BP\WebController@select_duration')->name('select-duration');

	Route::get('/events/{event}/guest-book','BP\WebController@events_guest_book');
	Route::post('/events/{event}/guest-book','BP\WebController@post_events_guest_book');
	Route::get('/events/term-and-condition','BP\WebController@events_term_condition');
	Route::get('/products/claim-insurance','BP\WebController@claim_insurance')->name('claim-insurance');
	Route::get('/whv/application','BP\WebController@form_whv')->name('form-whv');
	Route::post('/whv/application','BP\WebController@post_form_whv');
	Route::get('/form-kinerja-tutor','BP\WebController@kinerja_tutor');
	Route::post('/form-kinerja-tutor','BP\WebController@post_kinerja_tutor');


	Route::get('/products/language/english/class-rules','BP\WebController@class_rules');
	Route::get('/form-data-student/australia','BP\WebController@form_data_student');
	Route::post('/form-data-student/australia','BP\WebController@post_form_data_student');
	Route::get('/form-complaint','BP\WebController@form_complaint');
	Route::post('/form-complaint','BP\WebController@post_form_complaint');
	Route::get('/form-reservasi-janji-temu','BP\WebController@form_janji_temu');
	Route::post('/form-reservasi-janji-temu','BP\WebController@post_form_janji_temu');


	Route::middleware('auth')->group(function(){
		Route::get('/member-les','MemberController@index')->name('member-les');
		Route::get('/member-les/merchant/{id}','MemberController@view_merchant')->name('view-merchant');
		Route::post('/member-les/merchant/mp','MemberController@merchant_products_ajax')->name('mp-ajax');
		Route::post('/member-les/merchant/mpromo','MemberController@merchant_promo_ajax')->name('mpromo-ajax');
		Route::get('/promo/{kodepromo}','MemberController@promo_qrcode');
		Route::post('/promo-scan','MemberController@promo_qrcode_scan');
		Route::get('/member-les/promo/{kodepromo}','MemberController@promo_qrcode');
		Route::post('/member-promo-ajax','MemberController@member_promo_ajax')->name('member-promo-ajax');
		Route::post('/member-service-ajax','MemberController@member_service_ajax')->name('member-service-ajax');
	});



	Route::get('portfolio/tutor/ielts/{nama_tutor}','BP\WebController@portfolio_tutor');
	Route::get('portfolio/{jabatan}/{nama}','BP\WebController@portfolio');
	Route::get('portfolio/{jabatan}/{nama}/print','BP\WebController@print_portfolio');
	Route::get('portfolio/{perusahaan}/{jabatan}/{nama}','BP\WebController@portfolio_perusahaan');
	Route::get('portfolio/{jabatan}/{nama}/details/{id}','BP\WebController@detail_portfolio');


	Route::get('/admin/login','Auth\LoginController@showLoginForm')->name('admin-login');  

	Route::get('/admin','BP\WebController@admin')->middleware('admin-auth','verified')->name('admin-dashboard');

	Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');
	Route::get('/home', 'BP\WebController@index')->name('home');

	Auth::routes(['verify' => true]);

	Route::prefix('user')->middleware('auth')->group(function(){
		Route::get('dashboard','User\DashboardController@profile')->name('user-dashboard');
		Route::get('profile','User\DashboardController@profile')->name('user-profile');
		Route::get('transaction-details','User\DashboardController@transaction_details')->name('transaction-details');
		Route::get('transaction-details-ajax','User\DashboardController@transaction_details_ajax')->name('transaction-details-ajax');
	});


	Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
	Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

	/* ======================  Web BP  ======================== */


	/* ======================  Merchant  ======================== */
	Route::get('/merchant/login', 'Auth\MemberAdminLoginController@showLoginForm')->name('merchant-login');
	Route::post('/merchant/login', 'Auth\MemberAdminLoginController@login')->name('merchant-validate-login');
	Route::get('/merchant/register','Auth\MemberAdminRegisterController@showRegistrationForm')->name('merchant-register');
	Route::post('/merchant/register','Auth\MemberAdminRegisterController@register')->name('merchant-post-register');
	Route::post('/merchant/logout','Auth\MemberAdminLoginController@logout')->name('merchant-logout');
	Route::get('/merchant/logout','Auth\MemberAdminLoginController@logout')->name('merchant-logout');

	Route::get('merchant/check-slug','Auth\MemberAdminRegisterController@check_slug')->name('merchant.check-slug');

	Route::group(['middleware' => ['merchant-auth']],function(){
		Route::get('/merchant/','MerchantController@index')->name('merchant');
		Route::get('/merchant/dashboard','MerchantController@index')->name('merchant-dashboard');
		Route::get('/merchant/detail/promo/{kode_promo}','MerchantController@detail_promo');
		Route::resource('merchant/products','MerchantProducts',['names' =>  [
			'create' => 'mp.create',
			'index' => 'mp.index',
			'store' => 'mp.store',
			'destroy' => 'mp.destroy',
			'edit' => 'mp.edit',
			'update' => 'mp.update'
		]
	]);
		Route::resource('merchant/promo','MerchantPromo',['names' =>  [
			'create' => 'promo.create',
			'index' => 'promo.index',
			'store' => 'promo.store',
			'destroy' => 'promo.destroy',
			'edit' => 'promo.edit',
			'update' => 'promo.update'
		]
	]);


		Route::get('merchant/profile', 'ProfileController@edit')->name('merchant-profile.edit');
	//	Route::put('merchant/profile', 'ProfileController@update')->name('merchant-profile.update');
	//Route::put('member-les/admin/profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
		Route::put('merchant/profile/password', ['as' => 'merchant-profile.password', 'uses' => 'ProfileController@password']);
	});

	Route::put('/merchant/profile/{id}','Admin\MerchantController@update')->name('merchant-profile.update');

	Route::post('cek-merchant-ajax','Admin\MerchantController@cek_merchant')->name('cek-merchant-ajax');

	Route::resource('merchant/bank-account','MerchantBankAccountController',['names' =>  [
		'create' => 'mp-bank-account.create',
		'index' => 'mp-bank-account.index',
		'store' => 'mp-bank-account.store',
		'destroy' => 'mp-bank-account.destroy',
		'edit' => 'mp-bank-account.edit'
	]
]);



	/* ======================  Merchant  ======================== */



	/* ======================  Reseller  ======================== */
	Route::prefix('reseller')->middleware('auth')->group(function(){
		Route::get('register','BP\ResellerController@register');
		Route::post('register','BP\ResellerController@post_register');
		Route::get('/','BP\ResellerController@index');
		Route::get('registration-data/{slug}','BP\ResellerController@registration_data');
	});
	/* ======================  Reseller  ======================== */



	/* ======================  Admin Search School  ======================== */
	Route::group(['middleware' => 'admin-auth'], function () {
		Route::get('cari-sekolah','School\WebController@index');
		Route::post('cari-sekolah/search','School\WebController@search');
		Route::post('cari-sekolah/course-ajax','School\WebController@school_course_ajax')->name('search-course-ajax');
		Route::post('cari-sekolah/school-ajax','School\WebController@school_school_ajax')->name('search-school-ajax');
		Route::post('cari-sekolah/search/school-ajax','School\WebController@search_course_ajax')->name('search-result-course-ajax');
		Route::get('cari-sekolah/search/course/{keyword}','School\WebController@search_result');
		Route::get('cari-sekolah/search/course/','School\WebController@search_result');
		Route::get('cari-sekolah/search/school/{school}','School\WebController@search_result');
		Route::get('cari-sekolah/search/school/','School\WebController@search_result');

		Route::get('cari-sekolah/search/program/{program_id}/details','School\WebController@program_detail');
		Route::get('cari-sekolah/search/school/{program_id}/details','School\WebController@school_detail');
		Route::get('cari-sekolah/admin','School\AdminController@dashboard');

		Route::prefix('cari-sekolah/admin')->group(function () {
			Route::resource('marketing','School\EmployeeController',['names' =>  [
				'create_marketing' => 'admin.data-employee.create-marketing',
				'index_marketing' => 'admin.data-employee.index-marketing',
				'store_marketing' => 'admin.data-employee.store-marketing',
				'destroy_marketing' => 'admin.data-employee.destroy-marketing',
				'edit_marketing' => 'admin.data-employee.edit-marketing',
				'update_marketing' => 'admin.data-employee.update-marketing'
			]
		]);

			Route::resource('schools','School\SchoolController',['names' =>  [
				'create' => 'school.create',
				'index' => 'school.index',
				'store' => 'school.store',
				'destroy' => 'school.destroy',
				'edit' => 'school.edit',
				'update' => 'school.update'
			]
		]);	


			Route::prefix('student-informations')->group(function(){
				Route::get('/','School\StudentInformation\StudentInformationController@index');
				Route::get('/create','School\StudentInformation\StudentInformationController@create')->name('school-student-informations.create');
			});

			Route::resource('students','School\StudentController',['names' => [
				'create' => 'school-students.create',
				'index' => 'school-students.index',
				'store' => 'school-students.store',
				'destroy' => 'school-students.destroy',
				'edit' => 'school-students.edit',
				'update' => 'school-students.update'
			]]);

			Route::post('approve-student-ajax','School\StudentController@approve_student_ajax')->name('approve-student-ajax');
			Route::post('change-student-status-ajax','School\StudentController@change_student_status_ajax')->name('change-student-status-ajax');

			Route::get('search-students','School\StudentController@search_students');


			Route::post('admin-personal-information-ajax','School\StudentController@personal_information_ajax')->name('admin-student-pi-ajax');
			Route::post('admin-passport-history-ajax','School\StudentController@passport_history_ajax')->name('admin-student-ph-ajax');
			Route::post('admin-english-qualifications-ajax','School\StudentController@english_qualification_ajax')->name('admin-student-eq-ajax');
			Route::post('admin-bank-account-details-ajax','School\StudentController@bank_account_details_ajax')->name('admin-student-bad-ajax');
			Route::post('admin-visa-history-ajax','School\StudentController@visa_history_ajax')->name('admin-student-vh-ajax');
			Route::post('admin-student-sai-schools-ajax','School\StudentController@sai_schools_ajax')->name('admin-student-sai-schools-ajax');
			Route::post('admin-student-sai-programs-ajax','School\StudentController@sai_programs_ajax')->name('admin-student-sai-programs-ajax');
			Route::post('admin-student-cd-programs-ajax','School\StudentController@cd_programs_ajax')->name('admin-student-cd-programs-ajax');
			Route::post('admin-student-sai-ajax','School\StudentController@school_application_informations_ajax')->name('admin-student-sai-ajax');
			Route::post('admin-student-cd-ajax','School\StudentController@course_detail_ajax')->name('admin-student-cd-ajax');
			Route::post('admin-student-ps-ajax','School\StudentController@payment_schedule_ajax')->name('admin-student-ps-ajax');
			Route::post('admin-insurance-provider-ajax','School\StudentController@insurance_provider_ajax')->name('admin-student-cipd-ajax');
			Route::post('admin-student-qna-ajax','School\StudentController@question_answers_ajax')->name('admin-student-qna-ajax');


			Route::get('schools/{schoolId}/programs','School\SchoolController@programs');

			Route::resource('countries','School\CountryController',['names' =>  [
				'create' => 'school-country.create',
				'index' => 'school-country.index',
				'store' => 'school-country.store',
				'destroy' => 'school-country.destroy',
				'edit' => 'school-country.edit',
				'update' => 'school-country.update'
			]
		]);
			Route::resource('regions','School\RegionController',['names' =>  [
				'create' => 'school-region.create',
				'index' => 'school-region.index',
				'store' => 'school-region.store',
				'destroy' => 'school-region.destroy',
				'edit' => 'school-region.edit',
				'update' => 'school-region.update'
			]
		]);

			Route::resource('school-agents','School\SchoolAgentController',['names' => [
				'create' => 'school-agent.create',
				'index' => 'school-agent.index',
				'store' => 'school-agent.store',
				'destroy' => 'school-agent.destroy',
				'edit' => 'school-agent.edit',
				'update' => 'school-agent.update'
			]
		]);
			Route::post('school-contracts-ajax','School\SchoolAgentController@school_contract_ajax')->name('school-contracts-ajax');
			Route::get('contract-schools-ajax','School\SchoolAgentController@contract_schools_ajax')->name('contract-schools-ajax');
			Route::get('parent-agent-ajax','School\SchoolAgentController@parent_agent_ajax')->name('parent-agent-ajax');
			Route::post('school-commission-ajax','School\SchoolAgentController@school_commission_ajax')->name('school-commission-ajax');

			Route::resource('cities','School\CityController',['names' =>  [
				'create' => 'school-city.create',
				'index' => 'school-city.index',
				'store' => 'school-city.store',
				'destroy' => 'school-city.destroy',
				'edit' => 'school-city.edit',
				'update' => 'school-city.update'
			]
		]);
			Route::resource('school-programs','School\SchoolProgramController',['names' =>  [
				'create' => 'school-program.create',
				'index' => 'school-program.index',
				'store' => 'school-program.store',
				'destroy' => 'school-program.destroy',
				'edit' => 'school-program.edit',
				'update' => 'school-program.update'
			]
		]);
			Route::get('copy-programs','School\SchoolProgramController@copy_programs');
			Route::post('copy-programs','School\SchoolProgramController@post_copy_programs');


			Route::post('school-program-ajax','School\SchoolProgramController@program_data')->name('school-program-ajax');
			Route::resource('courses','School\CourseController',['names' =>  [
				'create' => 'school-course.create',
				'index' => 'school-course.index',
				'store' => 'school-course.store',
				'destroy' => 'school-course.destroy',
				'edit' => 'school-course.edit',
				'update' => 'school-course.update'
			]
		]);
			Route::resource('qualifications','School\QualificationController',['names' =>  [
				'create' => 'school-qualification.create',
				'index' => 'school-qualification.index',
				'store' => 'school-qualification.store',
				'destroy' => 'school-qualification.destroy',
				'edit' => 'school-qualification.edit',
				'update' => 'school-qualification.update'
			]
		]);
			Route::resource('education-sectors','School\EducationSectorController',['names' =>  [
				'create' => 'school-education-sector.create',
				'index' => 'school-education-sector.index',
				'store' => 'school-education-sector.store',
				'destroy' => 'school-education-sector.destroy',
				'edit' => 'school-education-sector.edit',
				'update' => 'school-education-sector.update'
			]
		]);

			Route::resource('school-courses','School\SchoolHasCourseController',['names' =>  [
				'create' => 'school-has-course.create',
				'index' => 'school-has-course.index',
				'store' => 'school-has-course.store',
				'destroy' => 'school-has-course.destroy',
				'edit' => 'school-has-course.edit',
				'update' => 'school-has-course.update'
			]
		]);
			Route::post('school-gallery-ajax','School\SchoolController@school_gallery')->name('school_gallery-ajax');
			Route::post('school-division-ajax','School\SchoolController@school_division')->name('school_division-ajax');
			Route::post('school-contact-ajax','School\SchoolController@school_contact')->name('school_contact-ajax');
			Route::post('school-other-fees-ajax','School\SchoolController@school_other_fees')->name('school_other_fees-ajax');
			Route::post('school-refund-ajax','School\SchoolController@school_refund')->name('school_refund-ajax');
			Route::post('school-intake-ajax','School\SchoolController@school_intake')->name('school_intake-ajax');
			Route::post('school-intake-course-ajax','School\SchoolController@school_has_course')->name('school_intake_course-ajax');
			Route::post('school-has-program-ajax','School\SchoolController@school_has_program')->name('school_has_program-ajax');
			Route::post('school-intake-program-ajax','School\SchoolController@school_course_has_program')->name('school_intake_program-ajax');
			Route::post('school-promo-ajax','School\SchoolController@school_promo')->name('school_promo-ajax');
			Route::post('school-bank-accounts-ajax','School\SchoolController@school_bank_accounts')->name('school_bank_accounts-ajax');

			Route::post('school-term-ajax','School\SchoolController@school_term')->name('school_term-ajax');
			Route::post('school-time-table-type-ajax','School\SchoolController@school_time_table_type')->name('school_time_table_type-ajax');
			Route::post('school-time-table','School\SchoolController@school_time_table')->name('school_time_table-ajax');
			Route::post('school-student-obligations','School\SchoolController@student_obligations')->name('school_student_obligations-ajax');
			Route::post('school-student-rights','School\SchoolController@student_rights')->name('school_student_rights-ajax');
			Route::post('school-intake-ajax','School\SchoolController@school_intake')->name('school_intake-ajax');
			Route::post('contact-division-ajax','School\SchoolController@contact_division')->name('contact_division-ajax');
			Route::post('course-period','School\SchoolProgramController@course_period')->name('school_course_period-ajax');
			Route::post('select-course-period','School\SchoolProgramController@select_period')->name('school_select_period-ajax');
			Route::post('program-course-unit','School\SchoolProgramController@course_unit')->name('school_course_unit-ajax');
			Route::post('program-requirement','School\SchoolProgramController@program_requirement')->name('school_program_requirement-ajax');


		});

});

Route::group(['middleware' => 'school-agent-auth'], function () {

});

/* ======================  Admin Search School  ======================== */



/* ======================  Search School dan Data Student Luar Negeri  ======================== */
// Route::get('/student/login','Auth\StudentLoginController@showLoginForm')->name('student-login');
// Route::post('/student/login', 'Auth\StudentLoginController@login')->name('student-validate-login');
// Route::post('/student/logout','Auth\StudentLoginController@logout')->name('student-logout');
// Route::get('/student/logout','Auth\StudentLoginController@logout')->name('student-logout');
// Route::get('/student/visa-statement-letter/term-and-condition/{country}','BP\WebController@new_tmc_visa_statement_letter');
// Route::post('/visa-statement-letter','BP\WebController@post_visa_statement_letter')->middleware('student-auth','student.verified');
// Route::get('/visa-statement-letter/term-and-condition','BP\WebController@tmc_visa_statement_letter')->middleware('student-auth','student.verified');
// Route::get('/student-verify','Auth\StudentVerificationController@show')->name('student.verify');
// Route::get('/student-verify/{id}','Auth\StudentVerificationController@verify')->name('student.verification.verify');
// Route::get('/student-verification-resend','Auth\StudentVerificationController@resend')->name('student.verification.resend');


Route::prefix('student')->group(function(){
	Route::get('/error','Student\WebController@error');
	Route::get('/select-test','Student\WebController@show_test')->name('student-show-test');
	Route::post('/select-test','Student\WebController@select_test')->name('student-select-test');
	Route::get('/select-modules','Student\WebController@show_modules')->name('student-show-modules');
	Route::post('/select-sections','Student\WebController@select_section');
	Route::post('/select-modules','Student\WebController@select_modules')->name('student-select-modules');
	Route::post('/start-test','Student\WebController@start_test');
	Route::get('/start-test','Student\WebController@get_start_test');
	Route::get('/{test}-simulation-link/{token}','Student\WebController@link_test');
	Route::get('/test','Student\WebController@test')->name('student-test');
	Route::get('/start-section-test','Student\WebController@start_section_test')->name('start-section-test');
	Route::get('/section-timeout','Student\WebController@section_timeout')->name('section-timeout');
	Route::post('/next','Student\WebController@next_question')->name('student-next-question');

	Route::get('/last','Student\WebController@last_question')->name('student-last-question');
	Route::get('/select','Student\WebController@select_question')->name('student-select-question');
	Route::post('/prev','Student\WebController@prev_question')->name('student-prev-question');
	Route::get('/finish-test','Student\WebController@finish_test')->name('student-finish-test');
	Route::get('/test-result','Student\WebController@test_result')->name('student-test-results');
	Route::get('/check-answer','Student\WebController@check_answer')->name('student-check-answer');

});

Route::prefix('student')->group(function(){
	Route::get('login','Auth\Student\LoginController@showLoginForm')->name('student-login');
	Route::post('/student/login', 'Auth\Student\LoginController@login')->name('student-validate-login');
	Route::post('/student/logout','Auth\Student\LoginController@logout')->name('student-logout');
	Route::get('/student/logout','Auth\Student\LoginController@logout')->name('student-logout');
	Route::get('/card/{kd}','Auth\Student\LoginController@card_info');
	Route::group(['middleware' => 'student-auth'],function(){
		Route::get('/',function(){
			return redirect('/student/dashboard');
		});

		Route::get('/profile','BP\StudentController@profile');
		Route::post('/profile','BP\StudentController@update_profile');
		Route::get('/dashboard','BP\StudentController@dashboard');
		Route::get('/payments','BP\StudentController@payments');
		Route::get('/courses','BP\StudentController@courses');
		Route::get('/print-card','BP\StudentController@print_card');
	});

});

Route::prefix('search-schools')->group(function(){
	Route::group(['middleware' => 'auth'],function(){
		Route::get('/','School\WebController@new_index')->name('student-dashboard');
	});
	Route::get('search/programs','School\WebController@new_search');
	Route::get('search/schools','School\WebController@new_search_school');
	Route::get('search-country-ajax','School\WebController@country_ajax')->name('search-course-country-ajax');
	Route::get('search-region-ajax','School\WebController@region_ajax')->name('search-course-region-ajax');
	Route::get('search/program/filter','School\WebController@course_filter')->name('search-course-filter');

	Route::get('school/{id}/details','School\WebController@school_detail');
	Route::get('program/{id}/details','School\WebController@program_detail');
	
	Route::group(['middleware' => 'auth'],function(){
		Route::prefix('student')->group(function(){
			Route::get('/register','Auth\StudentRegisterController@showRegistrationForm')->name('student-register');
			Route::post('/register','Auth\StudentRegisterController@register')->name('student-post-register');
			Route::post('/register/bank_account_details','Auth\StudentRegisterController@bank_account_details')->name('student-register-bank-account-details');
			Route::get('/profile','Student\WebController@profile');	
			Route::get('/','Student\WebController@index')->name('student-dashboard');
			Route::post('personal-information-ajax','Student\WebController@personal_information_ajax')->name('student-pi-ajax');
			Route::post('student-detail-profile-ajax','Student\WebController@student_detail_profile_ajax')->name('student-detail-profile-ajax');
			Route::post('passport-history-ajax','Student\WebController@passport_history_ajax')->name('student-ph-ajax');	
			Route::post('english-qualifications-ajax','Student\WebController@english_qualification_ajax')->name('student-eq-ajax');
			Route::post('visa-history-ajax','Student\WebController@visa_history_ajax')->name('student-vh-ajax');	
			Route::post('bank-account-details-ajax','Student\WebController@bank_account_details_ajax')->name('student-bad-ajax');
			Route::post('insurance-provider-ajax','Student\WebController@insurance_provider_ajax')->name('student-cipd-ajax');
		});

	});
	
	Route::prefix('admin')->group(function(){
		Route::group(['middleware' => 'admin-auth'], function () {
			Route::get('/','School\AdminController@dashboard');
		});
	});
	
	Route::get('{role}/login','Auth\School\SchoolLoginController@showLoginForm');
	Route::get('login','Auth\School\SchoolLoginController@showLoginForm')->name('school-login');
	Route::post('login', 'Auth\School\SchoolLoginController@login')->name('school-validate-login');
	Route::get('register','Auth\School\SchoolRegisterController@showRegistrationForm')->name('school-register');
	Route::post('register','Auth\School\SchoolRegisterController@register')->name('student-post-register');
	Route::get('sub-agent/register','Auth\School\SubAgentRegisterController@showRegistrationForm')->name('school-register');
	Route::post('sub-agent/register','Auth\School\SubAgentRegisterController@register')->name('student-post-register');
});

/* ======================  Search School dan Data Student Luar Negeri  ======================== */


/* ======================  Admin Tutor  ======================== */
Route::get('/tutor-admin/login','Auth\Tutor\LoginController@showLoginForm')->name('tutor-login');
Route::post('/tutor-admin/login', 'Auth\Tutor\LoginController@login')->name('tutor-validate-login');
Route::post('/tutor-admin/logout','Auth\Tutor\LoginController@logout')->name('tutor-logout');
Route::get('/tutor-admin/logout','Auth\Tutor\LoginController@logout')->name('tutor-logout');
Route::get('/tutor-admin/register','Auth\Tutor\LoginController@register')->name('tutor-register');
Route::post('/tutor-admin/register','Auth\Tutor\LoginController@postRegister')->name('post-tutor-register');
Route::get('/online-test-result/{id}','Admin\Tutor\WebController@result');
Route::group(['middleware' => 'tutor-auth'],function(){
	Route::prefix('tutor-admin')->group(function () {
//Route::get('/import-data','Admin\Tutor\WebController@import_data');
		Route::get('/test-results','Admin\Tutor\WebController@test_results');
		Route::get('/test-results-ajax','Admin\Tutor\WebController@test_results_ajax')->name('online-test-results-ajax');
		Route::get('/test-results/monitoring/{id}','Admin\Tutor\WebController@monitoring');
		Route::get('/','Admin\Tutor\WebController@index')->name('tutor-dashboard');
		Route::get('/results','Admin\Tutor\WebController@results');
		Route::get('/result/{id}','Admin\Tutor\WebController@result');
		Route::get('/select-module/{id}','Admin\Tutor\WebController@select_module');
		Route::get('/select-package','Admin\Tutor\WebController@select_package');
		Route::get('/create-structure','Admin\Tutor\WebController@create_structure');
		Route::get('/add-question','Admin\Tutor\WebController@add_question');
		Route::post('/add-question-ajax','Admin\Tutor\WebController@add_question_ajax')->name('add-question-ajax');
		Route::get('/question-answers-ajax','Admin\Tutor\WebController@add_question_answers')->name('question-answers-ajax');
		Route::post('/section-type-ajax','Admin\Tutor\WebController@section_type_ajax')->name('section-type-ajax');
		Route::post('/add-multiple-question-ajax','Admin\Tutor\WebController@add_multiple_question_ajax')->name('add-multiple-question-ajax');
		Route::post('/temp-multiple-question-ajax','Admin\Tutor\WebController@temp_multiple_question_ajax')->name('temp-multiple-question-ajax');
		Route::post('/section-ajax','Admin\Tutor\WebController@section_ajax')->name('section-ajax');
		Route::resource('tests','Admin\Tutor\TestController',['names' =>  [
			'create' => 'ot-test.create',
			'index' => 'ot-test.index',
			'store' => 'ot-test.store',
			'destroy' => 'ot-test.destroy',
			'edit' => 'ot-test.edit',
			'update' => 'ot-test.update'
		]
	]);
		Route::resource('packages','Admin\Tutor\PackageController',['names' =>  [
			'create' => 'ot-package.create',
			'index' => 'ot-package.index',
			'store' => 'ot-package.store',
			'destroy' => 'ot-package.destroy',
			'edit' => 'ot-package.edit',
			'update' => 'ot-package.update'
		]
	]);
		Route::get('package-select-module','Admin\Tutor\PackageController@select_module')->name('package-select-module');
		Route::resource('modules','Admin\Tutor\ModuleController',['names' =>  [
			'create' => 'ot-module.create',
			'index' => 'ot-module.index',
			'store' => 'ot-module.store',
			'destroy' => 'ot-module.destroy',
			'edit' => 'ot-module.edit',
			'update' => 'ot-module.update'
		]
	]);
		Route::resource('options','Admin\Tutor\OptionController',['names' =>  [
			'create' => 'ot-option.create',
			'index' => 'ot-option.index',
			'store' => 'ot-option.store',
			'destroy' => 'ot-option.destroy',
			'edit' => 'ot-option.edit',
			'update' => 'ot-option.update'
		]
	]);
		Route::resource('section-types','Admin\Tutor\SectionTypeController',['names' =>  [
			'create' => 'ot-section-type.create',
			'index' => 'ot-section-type.index',
			'store' => 'ot-section-type.store',
			'destroy' => 'ot-section-type.destroy',
			'edit' => 'ot-section-type.edit',
			'update' => 'ot-section-type.update'
		]
	]);
	});
});

/* ======================  Admin Tutor  ======================== */






Route::get('admin/registration','Admin\RegistrationController@index');
Route::post('admin/registration','Admin\RegistrationController@post_data');
Route::get('admin/registration-data','Admin\AdminController@registration_data');
Route::post('admin/registration-data-ajax','Admin\AdminController@registration_ajax')->name('regis-data-ajax');	
Route::get('admin/registration-data/{kd}/detail','Admin\AdminController@detail_registration')->name('detail-data-regis');

Route::get('admin/document-translate','Admin\AdminController@document_translate')->name('admin-document-translate');

Route::resource('admin/students','Admin\StudentController',['names' => [
	'create' => 'admin-student.create',
	'index' => 'admin-student.index',	
	'store' => 'admin-student.store',
	'destroy' => 'admin-student.destroy',
	'edit' => 'admin-student.edit',
	'update' => 'admin-student.update'
]
]);

Route::post('admin/students/{kd}/save-regis-detail','Admin\StudentController@save_regis_detail');
Route::post('admin/students/{kd}/add-guardian-data','Admin\StudentController@add_guardian_data');
Route::post('admin/students/{kd}/edit-guardian-data','Admin\StudentController@edit_guardian_data');
Route::post('admin/students/{kd}/delete-guardian-data','Admin\StudentController@delete_guardian_data');
Route::get('admin/student-lists','Admin\StudentController@student_lists')->name('admin-student.lists');
Route::get('admin/student-check-exist','Admin\StudentController@check_student_exist')->name('admin-student.check-student-exist');
Route::post('admin/students/show-temp','Admin\StudentController@show_temp_student')->name('admin-temp-student.show');
Route::post('admin/students/add-temp','Admin\StudentController@add_temp_student')->name('admin-temp-student.add');
Route::post('admin/students/delete-temp','Admin\StudentController@delete_temp_student')->name('admin-temp-student.delete');

Route::post('admin/students/show-temp-packet','Admin\StudentController@show_temp_student_packet')->name('admin-temp-student-packet.show');
Route::post('admin/students/add-temp-packet','Admin\StudentController@add_temp_student_packet')->name('admin-temp-student-packet.add');
Route::resource('admin/certificates','Admin\CertificateController',['names' => [
	'create' => 'admin-certificate.create',
	'index' => 'admin-certificate.index',	
	'store' => 'admin-certificate.store',
	'destroy' => 'admin-certificate.destroy',
	'edit' => 'admin-certificate.edit',
	'update' => 'admin-certificate.update'
]]);

Route::post('admin/country-ajax','Admin\AdminController@country_ajax')->name('country-ajax');
Route::post('admin/island-ajax','Admin\AdminController@island_ajax')->name('island-ajax');
Route::post('admin/province-ajax','Admin\AdminController@province_ajax')->name('province-ajax');
Route::post('admin/city-ajax','Admin\AdminController@city_ajax')->name('city-ajax');
Route::post('admin/district-ajax','Admin\AdminController@district_ajax')->name('district-ajax');
Route::post('admin/sub-district-ajax','Admin\AdminController@sub_district_ajax')->name('sub-district-ajax');


/* ======================  Admin BP  ======================== */
Route::group(['middleware' => 'admin-auth'], function () {

	Route::prefix('admin')->group(function () {

		Route::prefix('berdayakan')->group(function () {
			Route::get('/','Admin\AdminController@index');
			Route::prefix('company-data')->group(function () {
				Route::resource('rules','Admin\CompanyData\RuleController',['names' =>  [
					'create' => 'admin-berdayakan-rule.create',
					'index' => 'admin-berdayakan-rule.index',
					'store' => 'admin-berdayakan-rule.store',
					'destroy' => 'admin-berdayakan-rule.destroy',
					'edit' => 'admin-berdayakan-rule.edit',
					'update' => 'admin-berdayakan-rule.update'
				]
			]);
				Route::resource('rule-categories','Admin\CompanyData\RuleCategoryController',['names' =>  [
					'create' => 'admin-berdayakan-rule-category.create',
					'index' => 'admin-berdayakan-rule-category.index',
					'store' => 'admin-berdayakan-rule-category.store',
					'destroy' => 'admin-berdayakan-rule-category.destroy',
					'edit' => 'admin-berdayakan-rule-category.edit',
					'update' => 'admin-berdayakan-rule-category.update'
				]
			]);

				Route::resource('sk','Admin\CompanyData\SKController',['names' =>  [
					'create' => 'admin-berdayakan-sk.create',
					'index' => 'admin-berdayakan-sk.index',
					'store' => 'admin-berdayakan-sk.store',
					'destroy' => 'admin-berdayakan-sk.destroy',
					'edit' => 'admin-berdayakan-sk.edit',
					'update' => 'admin-berdayakan-sk.update'
				]
			]);


				Route::post('sk/change-status','Admin\CompanyData\SKController@change_status')->name('admin-berdayakan-sk.change_status');

				Route::resource('sk-types','Admin\CompanyData\SKTypeController',['names' =>  [
					'create' => 'admin-berdayakan-sk-type.create',
					'index' => 'admin-berdayakan-sk-type.index',
					'store' => 'admin-berdayakan-sk-type.store',
					'destroy' => 'admin-berdayakan-sk-type.destroy',
					'edit' => 'admin-berdayakan-sk-type.edit',
					'update' => 'admin-berdayakan-sk-type.update'
				]
			]);

				Route::resource('contracts','Admin\CompanyData\ContractController',['names' =>  [
					'create' => 'admin-berdayakan-contract.create',
					'index' => 'admin-berdayakan-contract.index',
					'store' => 'admin-berdayakan-contract.store',
					'destroy' => 'admin-berdayakan-contract.destroy',
					'edit' => 'admin-berdayakan-contract.edit',
					'update' => 'admin-berdayakan-contract.update'
				]
			]);
				Route::resource('employees','Admin\CompanyData\EmployeeController',['names' =>  [
					'create' => 'admin-berdayakan-employee.create',
					'index' => 'admin-berdayakan-employee.index',
					'store' => 'admin-berdayakan-employee.store',
					'destroy' => 'admin-berdayakan-employee.destroy',
					'edit' => 'admin-berdayakan-employee.edit',
					'update' => 'admin-berdayakan-employee.update'
				]
			]);
			});
		});
	});


	Route::resource('admin/portfolio','Admin\PortfolioController',['names' =>  [
		'create' => 'portfolio.create',
		'index' => 'portfolio.index',
		'store' => 'portfolio.store',
		'destroy' => 'portfolio.destroy',
		'edit' => 'portfolio.edit',
		'update' => 'portfolio.update'
	]	
]);


	Route::post('admin/portfolio-ajax','Admin\PortfolioController@portfolio_ajax')->name('portfolio-ajax');
	Route::post('admin/portfolio/edubackground-ajax','Admin\PortfolioController@edubackground_ajax')->name('edubackground-ajax');
	Route::post('admin/portfolio/experience-ajax','Admin\PortfolioController@experience_ajax')->name('experience-ajax');
	Route::post('admin/portfolio/other-exp-ajax','Admin\PortfolioController@other_exp_ajax')->name('other-exp-ajax');
	Route::post('admin/portfolio/upload-foto/{id}','Admin\PortfolioController@upload_foto');
	Route::post('admin/portfolio/certification-ajax','Admin\PortfolioController@certification_ajax')->name('certification-ajax');

	
	Route::get('admin/form','Admin\AdminController@form_builder');
	Route::post('admin/form/add','Admin\AdminController@fb_add_form');
	Route::post('admin/form/ubah','Admin\AdminController@fb_edit_form');
	Route::get('admin/form/add-question','Admin\AdminController@fb_add_question');
	Route::post('admin/form/add-question','Admin\AdminController@fb_post_add_question');
	Route::get('admin/form/view-data','Admin\AdminController@fb_view_data');
	Route::post('admin/form/change-description','Admin\AdminController@fb_change_description');
	Route::get('admin/form/delete-question','Admin\AdminController@fb_post_add_question');
	Route::post('admin/form/add-category','Admin\AdminController@fb_add_category');
	Route::post('admin/form/edit-category','Admin\AdminController@fb_add_category');
	Route::get('admin/form/delete-category','Admin\AdminController@fb_add_category');
	Route::resource('admin/users','Admin\UsersController',['names' =>  [
		'create' => 'admin-users.create',
		'index' => 'admin-users.index',
		'store' => 'admin-users.store',
		'destroy' => 'admin-users.destroy',
		'edit' => 'admin-users.edit',
		'update' => 'admin-users.update'
	]
]);
	Route::resource('admin/roles','Admin\RolesController',['names' =>  [
		'create' => 'admin-roles.create',
		'index' => 'admin-roles.index',
		'store' => 'admin-roles.store',
		'destroy' => 'admin-roles.destroy',
		'edit' => 'admin-roles.edit',
		'update' => 'admin-roles.update'
	]
]);

	Route::resource('admin/permissions','Admin\PermissionsController',['names' =>  [
		'create' => 'admin-permissions.create',
		'index' => 'admin-permissions.index',
		'store' => 'admin-permissions.store',
		'destroy' => 'admin-permissions.destroy',
		'edit' => 'admin-permissions.edit',
		'update' => 'admin-permissions.update'
	]
]);


	Route::resource('admin/membership','Admin\MembershipController',['names' => [
		'create' => 'admin-membership.create',
		'index' => 'admin-membership.index',
		'store' => 'admin-membership.store',
		'destroy' => 'admin-membership.destroy',
		'edit' => 'admin-membership.edit',
		'update' => 'admin-membership.update'
	]
]);

	Route::resource('admin/member-balance','Admin\MemberBalanceController',['names' => [
		'create' => 'admin-member-balance.create',
		'index' => 'admin-member-balance.index',
		'store' => 'admin-member-balance.store',
		'destroy' => 'admin-member-balance.destroy',
		'edit' => 'admin-member-balance.edit',
		'update' => 'admin-member-balance.update'

	]
]);

	Route::get('admin/student','Admin\AdminController@students');
	Route::resource('admin/merchant','Admin\MerchantController',['names' =>  [
		'create' => 'amp.create',
		'index' => 'amp.index',
		'store' => 'amp.store',
		'destroy' => 'amp.destroy',
		'edit' => 'amp.edit',
		'update' => 'amp.update'
	]
]);
	Route::resource('admin/events','Admin\EventsController',['names' =>  [
		'create' => 'admin-events.create',
		'index' => 'admin-events.index',
		'store' => 'admin-events.store',
		'destroy' => 'admin-events.destroy',
		'edit' => 'admin-events.edit',
		'update' => 'admin-events.update'
	]
]);

	
	Route::get('admin/events/data-contactus/{id}','Admin\EventsController@data_contactus');
	Route::post('admin/events/change-status','Admin\EventsController@change_status')->name('admin-events.change_status');
	Route::get('admin/events/event-type/{id}','Admin\EventsController@event_types');

	Route::resource('admin/events/berdayakan','Admin\EventsBerdayakanController',['names' =>  [
		'create' => 'admin-events-berdayakan.create',
		'index' => 'admin-events-berdayakan.index',
		'store' => 'admin-events-berdayakan.store',
		'destroy' => 'admin-events-berdayakan.destroy',
		'edit' => 'admin-events-berdayakan.edit',
		'update' => 'admin-events-berdayakan.update'
	]
]);

	Route::get('admin/events-berdayakan/data-contactus/{id}','Admin\EventsBerdayakanController@data_contactus');
	Route::post('admin/events-berdayakan/change-status','Admin\EventsBerdayakanController@change_status')->name('admin-events-berdayakan.change_status');
	Route::get('admin/events-berdayakan/event-type/{id}','Admin\EventsBerdayakanController@event_types');


	Route::get('admin/events/ajax/select-exhibitor-school','Admin\EventsController@select_school_ajax')->name('select-exhibitor-school');
	Route::get('admin/events/ajax/exhibitors-list','Admin\EventsController@exhibitors_list')->name('event-exhibitors-list');
	Route::post('admin/events/ajax/save-exhibitors','Admin\EventsController@save_exhibitors')->name('save_exhibitors');

	Route::post('admin/events/ajax/save-lobby','Admin\EventsController@save_lobby')->name('save-lobby');

	Route::post('admin/expo-brochure-ajax','Admin\EventsController@expo_brochure_ajax')->name('expo_brochure-ajax');
	Route::post('admin/expo-video-ajax','Admin\EventsController@expo_video_ajax')->name('expo_video-ajax');
	Route::post('admin/expo-about-ajax','Admin\EventsController@expo_about_ajax')->name('expo_about-ajax');
	Route::post('admin/expo-photo-ajax','Admin\EventsController@expo_photo_ajax')->name('expo_photo-ajax');

	


	Route::resource('admin/event-types','Admin\EventTypesController',['names' => [
		'create' => 'admin-event-types.create',
		'index' => 'admin-event-types.index',
		'store' => 'admin-event-types.store',
		'destroy' => 'admin-event-types.destroy',
		'edit' => 'admin-event-types.edit',
		'update' => 'admin-event-types.update'
	]
]);

	Route::get('admin/email-marketing','Admin\EmailController@student_birthday');
	Route::post('admin/email-marketing/sendmail','Admin\EmailController@sendmail');
	Route::post('admin/email-marketing/upload-gambar','Admin\EmailController@upload');

	Route::get('admin/email-bulk','Admin\EmailController@email_bulk');
	Route::post('admin/email-bulk/sendmail','Admin\EmailController@email_bulk_sendmail');
	Route::get('admin/company-structures','Admin\AdminController@company_structures');
	Route::post('admin/company-structures','Admin\AdminController@store_company_structures')->name('admin-company-structure.store');
	Route::resource('admin/menus/types','Admin\Cms\MenuTypeController',['names' => [
		'index' => 'cms.menu-types.index',
		'create' => 'cms.menu-types.create',
		'destroy' => 'cms.menu-types.destroy',
		'edit' => 'cms.menu-types.edit',
		'update' => 'cms.menu-types.update'
	]
]);

	Route::resource('admin/cms/countries','Admin\Cms\CountriesController',['names' =>  [
		'create' => 'admin-cms-countries.create',
		'index' => 'admin-cms-countries.index',
		'store' => 'admin-cms-countries.store',
		'destroy' => 'admin-cms-countries.destroy',
		'edit' => 'admin-cms-countries.edit',
		'update' => 'admin-cms-countries.update'
	]
]);

	Route::get('admin/cms/nav-bars','Admin\Cms\CmsController@nav_bars');

	Route::get('admin/cms/pages','Admin\PagesController@index')->name('pages.index');

	Route::resource('admin/cms/pages/{division}/','Admin\PagesController',['names' =>  [
		'create' => 'pages.create',
		'store' => 'pages.store',
		
	]
]);
	Route::get('admin/cms/pages/{division}','Admin\PagesController@show')->name('pages.show');

	Route::get('admin/cms/pages/{id}/{division}/edit','Admin\PagesController@edit')->name('pages.edit');
	Route::put('admin/cms/pages/{division}/{id}','Admin\PagesController@update')->name('pages.update');
	Route::delete('admin/cms/pages/{division}/{id}','Admin\PagesController@destroy')->name('pages.destroy');

	Route::resource('admin/cms/page-contents','Admin\Cms\PageContentController',['names' =>  [
		'create' => 'admin-page-content.create',
		'index' => 'admin-page-content.index',
		'store' => 'admin-page-content.store',
		'destroy' => 'admin-page-content.destroy',
		'edit' => 'admin-page-content.edit',
		'update' => 'admin-page-content.update'
	]
]);

	Route::resource('admin/cms/vision-mission','Admin\Cms\PageContentController',['names' =>  [
		'create' => 'admin-cms-vision-mission.create',
		'index' => 'admin-cms-vision-mission.index',
		'store' => 'admin-cms-vision-mission.store',
		'destroy' => 'admin-cms-vision-mission.destroy',
		'edit' => 'admin-cms-vision-mission.edit',
		'update' => 'admin-cms-vision-mission.update'
	]
]);

	Route::resource('admin/cms/what-we-do','Admin\Cms\PageContentController',['names' =>  [
		'create' => 'admin-cms-what-we-do.create',
		'index' => 'admin-cms-what-we-do.index',
		'store' => 'admin-cms-what-we-do.store',
		'destroy' => 'admin-cms-what-we-do.destroy',
		'edit' => 'admin-cms-what-we-do.edit',
		'update' => 'admin-cms-what-we-do.update'
	]
]);

	Route::post('admin/cms/page-types-ajax','Admin\PagesController@page_types_ajax')->name('page-type-ajax');

	Route::resource('admin/cms/page-types/{division}/','Admin\Cms\PageTypeController',['names' => [

		'create' => 'admin-page-type.create',
		'index' => 'admin-page-type.index',
		'store' => 'admin-page-type.store',
	]
]);
	Route::resource('admin/cms/page-subtypes/{division}/','Admin\Cms\PageSubTypeController',['names' => [

		'create' => 'admin-page-subtype.create',
		'index' => 'admin-page-subtype.index',
		'store' => 'admin-page-subtype.store',
	]
]);
	Route::get('admin/cms/page-types/{id}/{division}/edit','Admin\Cms\PageTypeController@edit')->name('admin-page-type.edit');
	Route::put('admin/cms/page-types/{division}/{id}','Admin\Cms\PageTypeController@update')->name('admin-page-type.update');
	Route::delete('admin/cms/page-types/{division}/{id}','Admin\Cms\PageTypeController@destroy')->name('admin-page-type.destroy');

	Route::get('admin/cms/page-subtypes/{id}/{division}/edit','Admin\Cms\PageSubTypeController@edit')->name('admin-page-subtype.edit');
	Route::put('admin/cms/page-subtypes/{division}/{id}','Admin\Cms\PageSubTypeController@update')->name('admin-page-subtype.update');
	Route::delete('admin/cms/page-subtypes/{division}/{id}','Admin\Cms\PageSubTypeController@destroy')->name('admin-page-subtype.destroy');
	
	Route::post('admin/cms/pages/{id}/page-builder/store','Admin\PagesController@store_page');
	Route::get('admin/cms/pages/{id}/page-builder/load','Admin\PagesController@load_page');
	Route::get('admin/cms/pages/{id}/page-builder','Admin\PagesController@page_builder');
	Route::post('admin/cms/page/page-builder-asset','Admin\PagesController@asset_manager')->name('page-builder-asset');


	Route::get('event-type-ajax','Admin\EventsController@event_type_ajax')->name('event-type-ajax');
	Route::get('admin/events/data-guestbook/{id}','Admin\EventsController@data_guestbook');
	Route::get('admin/events/data-guestbook/{id}/export','Admin\EventsController@events_guestbook_export');



	Route::get('admin/promo/data-contactus/{id}','Admin\PromoController@contact_us');
	Route::get('admin/promo/data-contactus/{id}/export','Admin\PromoController@export_contact_us');

	Route::get('admin/promo/promo-type/{id}','Admin\PromoController@promo_types');
	

	Route::resource('admin/promo','Admin\PromoController',['names' => [
		'create' => 'admin-news-promo.create',
		'index' => 'admin-news-promo.index',	
		'store' => 'admin-news-promo.store',
		'destroy' => 'admin-news-promo.destroy',
		'edit' => 'admin-news-promo.edit',
		'update' => 'admin-news-promo.update'
	]
]);
	Route::post('admin/promo/change-status','Admin\PromoController@change_status')->name('admin-news-promo.change_status');

	Route::resource('admin/news','Admin\NewsController',['names' =>  [
		'create' => 'admin-news.create',
		'index' => 'admin-news.index',
		'store' => 'admin-news.store',
		'destroy' => 'admin-news.destroy',
		'edit' => 'admin-news.edit',
		'update' => 'admin-news.update'
	]
]);

	Route::get('admin/news/news-type/{id}','Admin\NewsController@news_types');
	Route::resource('admin/info-lowker','Admin\NewsController',['names' =>  [
		'create' => 'admin-news.create',
		'index' => 'admin-news.index',
		'store' => 'admin-news.store',
		'destroy' => 'admin-news.destroy',
		'edit' => 'admin-news.edit',
		'update' => 'admin-news.update'
	]
]);
	Route::post('admin/news/change-status','Admin\NewsController@change_status')->name('admin-news.change_status');
	Route::get('admin/news/data-contactus/{id}','Admin\NewsController@contact_us');
	Route::resource('admin/cms/products','Admin\Cms\ProductsController',['names' =>  [
		'create' => 'cms-products.create',
		'index' => 'cms-products.index',
		'store' => 'cms-products.store',
		'destroy' => 'cms-products.destroy',
		'edit' => 'cms-products.edit',
		'update' => 'cms-products.update'
	]
]);

	Route::post('admin/products/productdesc-ajax','Admin\Cms\ProductsController@productdesc_ajax')->name('productdesc-ajax');
	Route::post('admin/products/productbenefit-ajax','Admin\Cms\ProductsController@productbenefit_ajax')->name('productbenefit-ajax');
	Route::post('admin/products/producttarget-ajax','Admin\Cms\ProductsController@producttarget_ajax')->name('producttarget-ajax');
	Route::resource('admin/testimony','Admin\TestimonyController',['names' =>  [
		'create' => 'admin-testimony.create',
		'index' => 'admin-testimony.index',
		'store' => 'admin-testimony.store',
		'destroy' => 'admin-testimony.destroy',
		'edit' => 'admin-testimony.edit',
		'update' => 'admin-testimony.update'
	]
]);

	Route::resource('admin/reseller/{reseller_id}/quota','Admin\ResellerQuotaController',['names' => [
		'create' => 'admin-reseller-quota.create',
		'index' => 'admin-reseller-quota.index',
		'store' => 'admin-reseller-quota.store',
		'destroy' => 'admin-reseller-quota.destroy',
		'edit' => 'admin-reseller-quota.edit',
		'update' => 'admin-reseller-quota.update'
	]]);


	Route::resource('admin/reseller','Admin\ResellerController',['names' => [
		'create' => 'admin-reseller.create',
		'index' => 'admin-reseller.index',
		'store' => 'admin-reseller.store',
		'destroy' => 'admin-reseller.destroy',
		'edit' => 'admin-reseller.edit',
		'update' => 'admin-reseller.update'
	]]);
	Route::post('admin/reseller/change-status','Admin\ResellerController@change_status')->name('admin-reseller.change-status');
	Route::get('admin/reseller/registration-data/{slug}','Admin\ResellerQuotaController@registration_data');

	

	Route::resource('admin/banner','Admin\Cms\BannerController',['names' =>  [
		'create' => 'cms-banner.create',
		'index' => 'cms-banner.index',
		'store' => 'cms-banner.store',
		'destroy' => 'cms-banner.destroy',
		'edit' => 'cms-banner.edit',
		'update' => 'cms-banner.update'
	]
]);



	
	Route::resource('admin/visa-requirements','Admin\VisaRequirementController',['names' =>  [
		'create' => 'visa-requirements.create',
		'index' => 'visa-requirements.index',
		'store' => 'visa-requirements.store',
		'destroy' => 'visa-requirements.destroy',
		'edit' => 'visa-requirements.edit',
		'update' => 'visa-requirements.update'
	]
]);

	Route::prefix('admin/company-data')->group(function(){

		Route::resource('briefing','Admin\CompanyData\BriefingController',['names' => [
			'create' => 'admin-briefing.create',
			'index' => 'admin-briefing.index',
			'store' => 'admin-briefing.store',
			'destroy' => 'admin-briefing.destroy',
			'edit' => 'admin-briefing.edit',
			'update' => 'admin-briefing.update'
		]]);
		Route::resource('companies','Admin\CompanyData\CompaniesController',['names' =>  [
			'create' => 'admin-company.create',
			'index' => 'admin-company.index',
			'store' => 'admin-company.store',
			'destroy' => 'admin-company.destroy',
			'edit' => 'admin-company.edit',
			'update' => 'admin-company.update'
		]
	]);
		Route::resource('employees','Admin\CompanyData\EmployeeController',['names' =>  [
			'create' => 'admin-employee.create',
			'index' => 'admin-employee.index',
			'store' => 'admin-employee.store',
			'destroy' => 'admin-employee.destroy',
			'edit' => 'admin-employee.edit',
			'update' => 'admin-employee.update'
		]
	]);
		Route::resource('divisions','Admin\CompanyData\DivisionController',['names' =>  [
			'create' => 'admin-division.create',
			'index' => 'admin-division.index',
			'store' => 'admin-division.store',
			'destroy' => 'admin-division.destroy',
			'edit' => 'admin-division.edit',
			'update' => 'admin-division.update'
		]
	]);

		Route::resource('rules','Admin\CompanyData\RuleController',['names' =>  [
			'create' => 'admin-rule.create',
			'index' => 'admin-rule.index',
			'store' => 'admin-rule.store',
			'destroy' => 'admin-rule.destroy',
			'edit' => 'admin-rule.edit',
			'update' => 'admin-rule.update'
		]
	]);
		Route::resource('rule-categories','Admin\CompanyData\RuleCategoryController',['names' =>  [
			'create' => 'admin-rule-category.create',
			'index' => 'admin-rule-category.index',
			'store' => 'admin-rule-category.store',
			'destroy' => 'admin-rule-category.destroy',
			'edit' => 'admin-rule-category.edit',
			'update' => 'admin-rule-category.update'
		]
	]);

		Route::resource('sk','Admin\CompanyData\SKController',['names' =>  [
			'create' => 'admin-sk.create',
			'index' => 'admin-sk.index',
			'store' => 'admin-sk.store',
			'destroy' => 'admin-sk.destroy',
			'edit' => 'admin-sk.edit',
			'update' => 'admin-sk.update'
		]
	]);


		Route::post('sk/change-status','Admin\CompanyData\SKController@change_status')->name('admin-sk.change_status');

		Route::resource('sk-types','Admin\CompanyData\SKTypeController',['names' =>  [
			'create' => 'admin-sk-type.create',
			'index' => 'admin-sk-type.index',
			'store' => 'admin-sk-type.store',
			'destroy' => 'admin-sk-type.destroy',
			'edit' => 'admin-sk-type.edit',
			'update' => 'admin-sk-type.update'
		]
	]);

		Route::resource('contracts','Admin\CompanyData\ContractController',['names' =>  [
			'create' => 'admin-contract.create',
			'index' => 'admin-contract.index',
			'store' => 'admin-contract.store',
			'destroy' => 'admin-contract.destroy',
			'edit' => 'admin-contract.edit',
			'update' => 'admin-contract.update'
		]
	]);

		Route::resource('term-and-conditions','Admin\CompanyData\TermAndCondition',['names' => [
			
		]]);

	});




	Route::post('admin/products/pricelist/change-status-ajax','Admin\AdminController@change_status_pricelists')->name('admin.change_status_pricelists');
	Route::get('admin/products/pricelist/{id}/details','Admin\AdminController@pricelist_details')->name('admin.products.pricelist.details');
	Route::get('admin/products/pricelist/{id}/edit','Admin\AdminController@pricelist_edit')->name('admin.products.pricelist.edit');
	Route::put('admin/products/pricelist/{id}','Admin\AdminController@pricelist_update')->name('admin.products.pricelist.update');
	Route::get('admin/products/pricelists','Admin\AdminController@pricelist')->name('admin.products.pricelist.index');

	Route::get('admin/products/pricelist/{id}/courses','Admin\AdminController@pricelist_courses')->name('admin.products.pricelist.courses');
	
	Route::post('admin/products/pricelist/courses/change-status','Admin\AdminController@pricelist_course_status')->name('admin.products.pricelist.course-status');

	Route::get('admin/products/pricelist/{pricelist_kd}/courses/{kd}/edit','Admin\AdminController@pricelist_course_edit')->name('admin.products.pricelist.course-edit');
	Route::post('admin/products/pricelist/courses/{kd}/update','Admin\AdminController@pricelist_course_update')->name('admin.products.pricelist.course-update');
	Route::post('admin/products/pricelist/courses/{kd}/update-level','Admin\AdminController@pricelist_course_level_update')->name('admin.products.pricelist.course-level-update');

	Route::resource('admin/offer-letter-settings','Admin\Course\OfferLetterController',['names' => [
		'create' => 'admin.offer-letter.create',
		'index' => 'admin.offer-letter.index',
		'store' => 'admin.offer-letter.store',
		'destroy' => 'admin.offer-letter.destroy',
		'edit' => 'admin.offer-letter.edit',
		'update' => 'admin.offer-letter.update'
	]]);

	Route::post('admin/offer-letter-settings/change-status','Admin\Course\OfferLetterController@change_status')->name('admin.offer-letter.change-status');

	Route::resource('admin/products/course-packets','Admin\Course\CoursePacketController',['names' =>  [
		'create' => 'course-packets.create',
		'index' => 'course-packets.index',
		'store' => 'course-packets.store',
		'destroy' => 'course-packets.destroy',
		'edit' => 'course-packets.edit',
		'update' => 'course-packets.update'
	]
]);

	Route::resource('admin/course-events','Admin\Course\EventController',['names' => [
		'create' => 'admin.course-events.create',
		'index' => 'admin.course-events.index',
		'store' => 'admin.course-events.store',
		'destroy' => 'admin.course-events.destroy',
		'edit' => 'admin.course-events.edit',
		'update' => 'admin.course-events.update'
	]]);
	Route::get('admin/recruitments','Admin\AdminController@recruitments');
	Route::get('admin/recruitments/{id}/detail','Admin\AdminController@recruitments_detail');

	Route::resource('admin/job-vacancy','Admin\JobVacancyController',['names' => [
		'create' => 'admin.job-vacancy.create',
		'index' => 'admin.job-vacancy.index',
		'store' => 'admin.job-vacancy.store',
		'destroy' => 'admin.job-vacancy.destroy',
		'edit' => 'admin.job-vacancy.edit',
		'update' => 'admin.job-vacancy.update'

	]]);
	Route::resource('admin/job-category','Admin\JobCategoryController',['names' => [
		'create' => 'admin.job-category.create',
		'index' => 'admin.job-category.index',
		'store' => 'admin.job-category.store',
		'destroy' => 'admin.job-category.destroy',
		'edit' => 'admin.job-category.edit',
		'update' => 'admin.job-category.update'
	]]); 

	Route::get('admin/data-pendaftaran-mahasiswa', 'Admin\AdminController@data_pendaftaran_mahasiswa');
	Route::get('admin/data-pendaftaran-mahasiswa/{id}/details', 'Admin\AdminController@detail_data_pendaftaran_mahasiswa');
	


	Route::get('admin/online-test-registration-data','Admin\AdminController@online_test_registration')->name('admin.ot_registration');
	Route::get('admin/online-test-registration/details/{id}','Admin\AdminController@online_test_registration_details')->name('admin.ot_registration.details');
	Route::delete('admin/online-test-registration/delete/{id}','Admin\AdminController@delete_online_test_registration')->name('admin.ot_registration.destroy');

	
	Route::get('admin/ielts-regis','Admin\AdminController@ielts_registration');
	Route::get('admin/ielts-simulation','Admin\AdminController@ielts_simulation');
	Route::get('admin/toefl-regis','Admin\AdminController@teofl_registration');
	Route::get('admin/toefl-simulation','Admin\AdminController@toefl_simulation');

	Route::get('admin/english-regis','Admin\AdminController@english_registration');
	Route::get('admin/contact-us','Admin\AdminController@contact_us');
	Route::delete('admin/contact-us/{id}','Admin\AdminController@delete_contact_us')->name('contact-us.destroy');

	Route::get('admin/enquiry','Admin\AdminController@enquiry');
	Route::get('admin/enquiry/{id}/details','Admin\AdminController@enquiry_details');
	Route::post('admin/enquiry/{id}/details','Admin\AdminController@post_enquiry_details');

	Route::get('admin/complaints','Admin\AdminController@complaints');

	Route::get('admin/english-regis/{id}','Admin\AdminController@english_preview')->name('admin-englishregis.english_preview');
	Route::get('admin/ielts-regis/{id}','Admin\AdminController@ielts_regis_preview')->name('admin-ieltsregis.ielts_regis_preview');
	Route::get('admin/toefl-regis/{id}','Admin\AdminController@toefl_regis_preview')->name('admin-toeflregis.toefl_regis_preview');
	Route::get('admin/profile', 'ProfileController@edit')->name('profile.edit');
	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);


	Route::get('admin/transactions','Admin\TransactionController@index')->name('admin-transaction');

	Route::get('admin/payment-gateway','Admin\PaymentMethodController@payment_gateway')->name('admin.payment-gateway');
	Route::get('admin/payment-gateway/edit','Admin\PaymentMethodController@edit_payment_gateway')->name('admin.payment-gateway.edit');
	Route::put('admin/payment-gateway/{code}/update','Admin\PaymentMethodController@update_payment_gateway')->name('admin.payment-gateway.update');
});

Route::post('admin/approve-online-test-registration','Admin\AdminController@approve_online_test_registration')->name('admin.approve_online_test_registration');

/* ======================  Admin BP - Perpustakaan ======================== */
Route::prefix('library')->group(function(){
	Route::get('/','Library\PagesController@getHome')->name('library-home');
	Route::get('/search','Library\PagesController@getsearch')->name('library-search');
	Route::post('/search','Library\PagesController@searchajax');
	Route::get('/catalog','Library\PagesController@getcatalog')->name('library-catalog');
	Route::get('detail/{id}','Library\PagesController@getDetail');
	Route::group(['middleware' => 'tutor-auth'],function(){
		Route::get('/dashboard','Library\DashboardController@index')->name('library-dashboard');
		Route::get('/isiformbuku','Library\BukuController@getBuku')->name('get-buku');
		Route::post('/buku-form-submit','Library\BukuController@submit')->name('buku-form-submit');
		Route::get('bannerupdate','Library\BannerController@getBanner');
		Route::get('/isiformbuku/{id}/edit','Library\BukuController@edit');
		Route::post('/isiformbuku/{id}/update','Library\BukuController@update');
		Route::get('/isiformbuku/{id}/delete','Library\BukuController@delete');

	});
});
/* ======================  Admin BP - Perpustakaan ======================== */

/* ======================  Admin BP  ======================== */

/* ======================  Link Settingan / Special Case  ======================== */
Route::get('get-all-route', function () {
    $getRouteCollection = Route::getRoutes(); //get and returns all returns route collection
    foreach ($getRouteCollection as $route) {
    	echo "https://bestpartnereducation.com/".$route->uri()."<br>";
    }
});

Route::get('refresh-csrf', function(){
	return csrf_token();
});

Route::fallback(function () {
	abort(404);
});
Route::get('/','BP\WebController@index');
//Route::get('/{slug}','BP\WebController@showPages');

/* ======================  Link Settingan / Special Case  ======================== */

});











