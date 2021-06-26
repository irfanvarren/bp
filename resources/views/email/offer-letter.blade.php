@if($subject == "Offer Letter Disetujui")
Berikut adalah lampiran offer letter yang telah anda setujui. Untuk melanjutkan ke pembayaran silahkan klik link berikut.
@else
Berikut adalah offer letter untuk tagihan anda, silahkan tanda tangani offer letter pada link berikut jika anda ingin melanjutkan ke pembayaran selanjutnya.
@endif
Link : <a href="{{url('products/registration-and-payment')}}">{{url('products/registration-and-payment')}}</a>