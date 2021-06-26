@extends('layouts.bp_wo_sidenav')
@push('head-script')
<link rel="stylesheet" href="{{asset('css/selectize.bootstrap3.css')}}">
<style type="text/css">

    .mytab{
        float:none;
    }
    .enquiry.content-wrapper{
        background:white;
    }
    .mytab .nav-item .nav-link{
        padding:8px;
        width:180px;
        text-align: center;
    }
    .hide{
        display: none;
    }
    .enquiry-title{
        padding:8px 12px;background:#aaa;color:white;
        font-size: 16px;
        margin-bottom:15px;
    }
    .enquiry-details-records{
        background:#e8e8e8;
        color:#666;
    }
    .enquiry-details-records tr td{
        padding:6px 12px 6px 12px;
    }


     .star-cb-group {
    /* remove inline-block whitespace */
     font-size: 0;
    /* flip the order so we can use the + and ~ combinators */
     unicode-bidi: bidi-override;
     direction: rtl;
    /* the hidden clearer */
}

 .star-cb-group * {
     font-size: 32px;
}
 .star-cb-group > input {
     display: none;
}
 .star-cb-group > input + label {
    /* only enough room for the star */
     display: inline-block;
     overflow: hidden;
     text-indent: 9999px;
     width: 1em;
     white-space: nowrap;
     cursor: pointer;
     margin-bottom:0 !important;
}
 .star-cb-group > input + label:before {
     display: inline-block;
     text-indent: -9999px;
     content: '\2606';
     color: #888;
}
 .star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
     content: '\2605';
     color: #ffce3b;
    /* text-shadow: 0 0 1px #333;*/
}
 .star-cb-group > .star-cb-clear + label {
     text-indent: -9999px;
     width: 0.5em;
     margin-left: -0.5em;
}
 .star-cb-group > .star-cb-clear + label:before {
     width: 0.5em;
}
 .star-cb-group:hover > input + label:before {
     content: '\2606';
     color: #888;
     text-shadow: none;
}
 .star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
     content: '\2605';
     color: #ffce3b;
     /*text-shadow: 0 0 1px #333;*/
}

@media screen and (max-width: 576px){
  .nav .nav-item{
    width: 100%;
  }
  .nav .nav-item .nav-link{
    width:100%;
    border:1px solid #dedede;
  }
}
</style>
@endpush
@section('content')

<div class="col-md-12 content-wrapper enquiry">
    @if(session()->has('message'))
    <div class="alert alert-success" style="text-align:center">
        {!! session()->get('message') !!} <br>

        <button type="button" class="btn btn-primary" onclick="close_alert()" name="button">Ok</button>
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <ul class="nav nav-tabs mytab mb-3" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true">Your Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ask-question-tab" data-toggle="tab" href="#ask-question" role="tab" aria-controls="ask-question" aria-selected="false">Ask a Question</a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Review</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="card">
                <div class="tab-content card-body row">

                    <div class="tab-pane active col-md-12" id="account" role="tabpanel" aria-labelledby="home-tab">
                        @if(isset($enquiry_details))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                <a href="{{url('enquiry')}}" ><< See all enquiries</a>
                                </div>
                                @if($enquiry_details->details->count())
                                @foreach($enquiry_details->details as $detail)
                                 <div class="enquiry-title">
                                Response {{$detail->name}}&nbsp; <span style="float:right">{{date("d M Y H:i",strtotime($detail->created_at))}}</span>
                                </div>
                                <div>
                                {!!$detail->solution!!}
                                </div>
                                @endforeach
                                @else
                                <div class="enquiry-title">
                                No Response Yet...
                                </div>
                                @endif
                                <div class="enquiry-title">
                                Customer {{$enquiry_details->name}} <span style="float:right">{{date("d M Y H:i",strtotime($enquiry_details->created_at))}}</span>
                                </div>
                                <div class="mb-3">
                                    {{$enquiry_details->question}}
                                </div>
                                <div class="table-responsive" style="">
                                    <table class="enquiry-details-records">
                                        <tr>
                                            <td>Email Address</td><td>{{ $enquiry_details->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Reference Number</td><td>{{ $enquiry_details->complaint_code }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td><td>{{ $enquiry_details->status == 1? "Solved" : "Unsolved"}}</td>
                                        </tr>
                                        <tr>
                                            <td>Created At</td><td>{{ $enquiry_details->created_at }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            @if(auth()->check())
                            <div class="col-md-12">
                                <h3><strong>Account Overview</strong></h3>
                                <hr>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="enquiry-title">Questions</div>
                                    <strong>Your recently submitted question </strong>
                                    <div class="table-responsive">
                                    <table class="table table-bordered">
                                       
                                        <tr>
                                            <th>Subject</th> <th>Reference #</th> <th>Status</th> <th>Date Created</th>
                                        </tr>
                                        
                                         @if($enquiries->count())
                                         @foreach($enquiries as $enquiry)
                                        <tr>
                                            <td><a href="{{url('/enquiry/reference/'.$enquiry->complaint_code)}}">{{$enquiry->subject}}</a></td> <td>{{$enquiry->complaint_code}}</td> <td>{{$enquiry->status == 1 ? "Solved" : "Unsolved"}}</td> <td>{{date("d/m/Y",strtotime($enquiry->created_at))}}</td> 
                                        </tr>
                                        @endforeach
                                        @else
                                           <tr>
                                            <td colspan="4">No Records Found</td>
                                        </tr>
                                        @endif
                                    </table>
                                    </div>
                                    <div>
                                        {{$enquiries->links()}}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="enquiry-title" class="mb-2">Settings</div>
                                    <div>
                                        <a href="">Update your account settings </a>
                                    </div>
                                    <div>
                                        <a href="">Change your Password </a></div>
                                    </div>
                                </div>
                                @else
                                <div class="col-md-12">
                                    <h3><strong>Login</strong></h3>
                                    <hr>
                                </div>
                                <div class="col-md-8">



                                    <form  class="form" method="POST" action="{{route('login') }}">
                                        @csrf
                                        <input type="hidden" name="redirect_url" value="enquiry">
                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <strong>
                                                    If you already have an account, please enter your username and password.
                                                </strong> <br>
                                                <em>
                                                    Jika anda sudah memiliki akun, silahkan untuk memasukkan username dan password 
                                                </em>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                <div class="col-form-label">
                                                    Email
                                                </div>
                                                <div>
                                                    <input type="email" class="form-control" name="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                <div class="col-form-label">
                                                    Password
                                                </div>
                                                <div>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                <input type="submit" class="btn btn-secondary" style="margin:15px 0;" name="submit" value="Submit">
                                            </div>
                                        </div>
                                    </form>


                                </div>
                                <div class="col-md-4">
                                    <div style="background-color:#fafafa;border:1px solid #ccc;padding:15px;" class="row">
                                        <div class="col-md-12 mb-3 text-center">
                                            <h5><strong> Does Not Have an Account Yet?</strong></h5>
                                            <em>Belum memiliki akun?</em>
                                        </div>
                                        <div class="col-md-12">
                                         <h5><strong>Allow us to serve you better by enabling a faster line of communication.</strong></h5>
                                         <em>Memberikan kami akses untuk bemberikan pelayanan lebih baik dengan jalur komunikasi yang cepat.</em>
                                     </div>
                                     <div class="col-md-12">
                                        <h5><strong>Get notifications when information you care about is updated.</strong></h5>
                                        <em>Anda akan mendapatkan pemberitahuan saat informasi yang anda butuhkan diperbarui.</em>
                                    </div>
                                    <div class="col-md-12">
                                        <h5><strong>Costumize your support interest. </strong></h5>
                                        <em>Menyesuaikan dengan bantuan yang anda inginkan.</em>
                                    </div>
                                    <div class="col-md-12 text-center">
                                     <a class="btn" style="margin:15px 0;background-color:#aaa;color:white;" href="{{url('register')}}">Create a New Account</a>
                                 </div>
                             </div>

                         </div>
                         @endif
                     </div>
                     @endif


                 </div>
                 <div class="tab-pane col-md-12" id="ask-question" role="tabpanel" aria-labelledby="profile-tab">
                     
                    <div class="row  @if(session('response') != 'ask-question') hide @endif" id="submitted">
                          <div class="col-md-12">
                                <h3><strong>Your Question has been Submitted</strong></h3>
                                <hr>
                            </div>
                            <div class="col-md-12 mb-3">
                                            <h5><strong>The reference number for your question is #{{session('reference_code')}}</strong></h5>
                                            <em>Nomor referensi untuk pertanyaan anda adalah #{{session('reference_code')}}</em>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                         <h5><strong>You should receive a response by email from our support department within the next business day</strong></h5>
                                         <em>Anda akan menerima jawaban melalui email dari depatemen bantuan kami dalam hari kerja berikutnya</em>
                                     </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" onclick="submit_another_question('ask-question')">Submit Another Question</button>
                            </div>
                       
                    </div>
                    
                     <div class="row  @if(session('response') == 'ask-question') hide @endif" id="not-submitted">
                        @if(auth()->check())
                        <div class="col-md-12">
                            <h4><strong>Submit a Question to Our Support Team</strong></h4>
                            <hr>
                        </div>
                        <div class="col-md-8">


                           <form class="form" method="POST" action="{{url('enquiry/ask-question')}}" enctype="multipart/form-data">
                              <div class="row">
                                <div class="col-md-6">
                                    @csrf
                                 
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <div class="col-form-label">
                                                <strong>Are you a... *</strong> <br>
                                                <em>Anda adalah …</em>
                                            </div>
                                            <div>
                                                <select class="form-control" name="occupation">
                                                    <option value="">Select Occupation</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Client">Client</option>
                                                    <option value="Organization">Organization</option>
                                                    <option value="School">School</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <div class="col-form-label">
                                               <strong>Subject*</strong> <br>
                                               <em>Subjek</em>
                                           </div>
                                           <div>
                                            <input type="text" class="form-control" name="subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <div class="col-form-label">
                                           <strong>Question or Enquiry*</strong> <br>
                                           <em>Pertanyaan atau permintaan </em>
                                       </div>
                                       <div>
                                        <textarea class="form-control" name="question"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <div class="col-form-label">
                                       <strong>Enquiry Type*</strong> <br>
                                       <em>Jenis permintaan </em>
                                   </div>
                                   <div>
                                    <select class="form-control" name="type">
                                        <option value="">Select Type</option>
                                        <option value="Administration|info@bestpartnereducation.com">Administration</option>
                                        <option value="Complaint|info@bestpartnereducation.com">Complaint</option>
                                        <option value="Finance|finance@bestpartnereducation.com">Finance</option>
                                        <option value="Partnership|info@bestpartnereducation.com">Partnership</option>
                                        <option value="Request|info@bestpartnereducation.com">Request</option>
                                        <option value="School|info@bestpartnereducation.com">School</option>
                                   
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-form-label">
                                   <strong>Select the office you would like to send the enquiry to*</strong> <br>
                                   <em>Pilih kantor tujuan pengiriman pertanyaan atau permintaan </em>
                               </div>
                               <div>
                                <select class="form-control" name="branch_id">
                                    <option value="">Select Office</option>
                                    @foreach($companies as $company)
                                    <option value="{{$company->KD}}">{{$company->NAMA}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                            <div class="col-md-12">
                                <div class="col-form-label">
                                   <strong>Attach Documents</strong> <br>
                                   <em>Lampirkan dokumen </em>
                               </div>
                               <div>
                                <input type="file" name="myfiles[]" multiple>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row form-group">
                        <div class="col-md-12 text-right">
                            <input type="submit" value="Submit" class="btn btn-secondary" style="margin:15px 0;" name="submit">
                        </div>
                    </div>
        </form> 

    </div>
    @else
    <div class="col-md-12">
        <h3><strong>Login</strong></h3>
        <hr>
    </div>
    <div class="col-md-8">
        <form  class="form" method="POST" action="{{route('login') }}">
            @csrf
            <input type="hidden" name="redirect_url" value="enquiry">
            <div class="row form-group">
                <div class="col-md-12">
                    <strong>
                        If you already have an account, please enter your username and password.
                    </strong> <br>
                    <em>
                        Jika anda sudah memiliki akun, silahkan untuk memasukkan username dan password 
                    </em>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <div class="col-form-label">
                        Email
                    </div>
                    <div>
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <div class="col-form-label">
                        Password
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <input type="submit" class="btn btn-secondary" style="margin:15px 0;" value="Submit" name="submit">
                </div>
            </div>
        </form>


    </div>
    <div class="col-md-4">
        <div style="background-color:#fafafa;border:1px solid #ccc;padding:15px;" class="row">
            <div class="col-md-12 mb-3 text-center">
                <h5><strong> Does Not Have an Account Yet?</strong></h5>
                <em>Belum memiliki akun?</em>
            </div>
            <div class="col-md-12">
             <h5><strong>Allow us to serve you better by enabling a faster line of communication.</strong></h5>
             <em>Memberikan kami akses untuk bemberikan pelayanan lebih baik dengan jalur komunikasi yang cepat.</em>
         </div>
         <div class="col-md-12">
            <h5><strong>Get notifications when information you care about is updated.</strong></h5>
            <em>Anda akan mendapatkan pemberitahuan saat informasi yang anda butuhkan diperbarui.</em>
        </div>
        <div class="col-md-12">
            <h5><strong>Costumize your support interest. </strong></h5>
            <em>Menyesuaikan dengan bantuan yang anda inginkan.</em>
        </div>
        <div class="col-md-12 text-center">
          <a class="btn" style="margin:15px 0;background-color:#aaa;color:white;" href="{{url('register')}}">Create a New Account</a>
     </div>
 </div>

</div>
@endif
</div>
</div>
<div class="tab-pane col-md-12" id="review" role="tabpanel" aria-labelledby="review-tab">
                     
                     <div class="row justify-content-center">
                        @if(auth()->check())
                     
                        <div class="col-md-8">


                           <form class="form" method="POST" action="{{url('enquiry/review')}}" enctype="multipart/form-data">
                              <div class="row justify-content-center">
                                <div class="col-md-7 text-center" style="padding:40px 30px 30px 30px">
                                    @csrf
                                 
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <div class="col-form-label">
                                                <strong><h4>Bagaimana Pelayanan Kami Sejauh Ini?</h4></strong>
                                            </div>
                                             <div class="justify-content-center row">
                                            <fieldset style="text-align:justify;  border: 0;border-radius: 1px;padding: 1em 1.5em 0.75em 0;">

                                          <span class="star-cb-group">
      <input type="radio" id="rating-5" name="rating" value="5" {{$review->rating == 5 ? 'checked' : ''}}/><label for="rating-5">5</label>
      <input type="radio" id="rating-4" name="rating" value="4" {{$review->rating == 4 ? 'checked' : ''}}/><label for="rating-4">4</label>
      <input type="radio" id="rating-3" name="rating" value="3" {{$review->rating == 3 ? 'checked' : ''}}/><label for="rating-3">3</label>
      <input type="radio" id="rating-2" name="rating" value="2" {{$review->rating == 2 ? 'checked' : ''}}/><label for="rating-2">2</label>
      <input type="radio" id="rating-1" name="rating" value="1" {{$review->rating == 1 ? 'checked' : ''}}/><label for="rating-1">1</label>
      <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" {{$review->rating == 0 ? 'checked' : ''}}/><label for="rating-0">0</label>
    </span>
    </fieldset>
                                        </div>
                                            <div>
                                                <textarea class="form-control" name="review" id="review" rows="7">{!!$review->review!!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                       
                                    </div>
                                    <div class="row form-group">
                        <div class="col-md-12 text-right">
                            <input type="submit" class="btn btn-secondary" style="margin:15px 0;" name="submit" value="Submit">
                        </div>
                    </div>
                                    
                           
                        </div>
            </div>
            
        </form> 

    </div>
    @else
    <div class="col-md-12">
        <h3><strong>Login</strong></h3>
        <hr>
    </div>
    <div class="col-md-8">
        <form  class="form" method="POST" action="{{route('login') }}">
            @csrf
            <input type="hidden" name="redirect_url" value="enquiry">
            <div class="row form-group">
                <div class="col-md-12">
                    <strong>
                        If you already have an account, please enter your username and password.
                    </strong> <br>
                    <em>
                        Jika anda sudah memiliki akun, silahkan untuk memasukkan username dan password 
                    </em>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <div class="col-form-label">
                        Email
                    </div>
                    <div>
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <div class="col-form-label">
                        Password
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <input type="submit" class="btn btn-secondary" value="Submit" style="margin:15px 0;" name="submit">
                </div>
            </div>
        </form>


    </div>
    <div class="col-md-4">
        <div style="background-color:#fafafa;border:1px solid #ccc;padding:15px;" class="row">
            <div class="col-md-12 mb-3 text-center">
                <h5><strong> Does Not Have an Account Yet?</strong></h5>
                <em>Belum memiliki akun?</em>
            </div>
            <div class="col-md-12">
             <h5><strong>Allow us to serve you better by enabling a faster line of communication.</strong></h5>
             <em>Memberikan kami akses untuk bemberikan pelayanan lebih baik dengan jalur komunikasi yang cepat.</em>
         </div>
         <div class="col-md-12">
            <h5><strong>Get notifications when information you care about is updated.</strong></h5>
            <em>Anda akan mendapatkan pemberitahuan saat informasi yang anda butuhkan diperbarui.</em>
        </div>
        <div class="col-md-12">
            <h5><strong>Costumize your support interest. </strong></h5>
            <em>Menyesuaikan dengan bantuan yang anda inginkan.</em>
        </div>
        <div class="col-md-12 text-center">
          <a class="btn" style="margin:15px 0;background-color:#aaa;color:white;" href="{{url('register')}}">Create a New Account</a>
     </div>
 </div>

</div>
@endif
</div>
</div>

</div>
</div>                
</div>
</div>
</div>
</div>
<!--
<div class="row justify-content-center">
    <div class="col-md-9">

        <div class="col-md-12 card">
            <div class=" card-body">
                <form class="" id="myform" name="myform" action="{{url('enquiry')}}"
                enctype="multipart/form-data" method="post">
                @csrf

                <div class="row form-group">
                    <div class="col-md-12 text-center">

                        <h2>Enquiry Form</h2>

                    </div>

                </div>
                <div class="row form-group">

                    <label for="" class="col-md-3">Title</label>
                    <div class="col-md-9">
                        <div class="form-check form-check-inline">
                         <input type="radio" name="title" class="form-check-input" value="Mr.">  <label class="form-check-label">Mr.</label>     
                     </div>
                     <div class="form-check form-check-inline">
                         <input type="radio" name="title" class="form-check-input" value="Mrs.">  <label class="form-check-label">Mrs.</label>     
                     </div>

                     <div class="form-check form-check-inline">
                         <input type="radio" name="title" class="form-check-input" value="Ms.">  <label class="form-check-label">Ms.</label>     
                     </div>

                 </div>
             </div>
             <div class="row form-group">
                <div class="col-md-6">
                    <div class="row">
                      <label for="" class="col-md-12 col-form-label text-center">*First Name</label>
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="first_name">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                  <label for="" class="col-md-12 col-form-label text-center">*Last Name</label>
                  <div class="col-md-12">
                    <input type="text" class="form-control" name="last_name">
                </div>
            </div>
        </div>

    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <div class="row">
              <label for="" class="col-md-12 col-form-label text-center">*Address</label>
              <div class="col-md-12">
                <input type="text" class="form-control" name="address">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
          <label for="" class="col-md-12 col-form-label text-center">*Postcode</label>
          <div class="col-md-12">
            <input type="text" class="form-control" name="postcode">
        </div>
    </div>
</div>

</div>
<div class="row form-group">

    <label for="" class="col-md-12 col-form-label">Email</label>
    <div class="col-md-12">
        <input type="email" class="form-control" name="email">

    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-12 col-form-label">Mobile Number</label>
    <div class="col-md-12">
        <input type="text" class="form-control" name="mobile_number" required>
        <div class="form-check-inline">
            <input type="checkbox" class="form-check-input" name="whatsapp_number" value="yes">
            <label class="form-check-label" style="font-size:13px;">(please tick if your number available to be contacted by WhatsApp)</label>
        </div>
    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Enquiry</label>
    <div class="col-md-9">
        <textarea class="form-control" name="jabatan_speaker" placeholder=""
        value=""></textarea>
    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Prestasi Speaker</label>
    <div class="col-md-9">
        <textarea class="form-control" name="prestasi_speaker"  placeholder=""
        value=""></textarea>

    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Nama Lengkap Moderator</label>
    <div class="col-md-9">
        <textarea class="form-control" name="nama_lengkap_moderator"  placeholder=""
        value=""></textarea>

    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Jabatan Moderator</label>
    <div class="col-md-9">
        <textarea class="form-control" name="jabatan_moderator"  placeholder=""
        value=""></textarea>

    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Prestasi Moderator</label>
    <div class="col-md-9">
        <textarea class="form-control" name="prestasi_moderator"  placeholder=""
        value=""></textarea>

    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Hari / Tanggal Webinar</label>
    <div class="col-md-9">
        <textarea class="form-control" name="hari_atau_tanggal_webinar"></textarea>
    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Jam Webinar</label>
    <div class="col-md-9">
        <textarea class="form-control" name="jam_webinar"></textarea>
    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Platform Kegiatan</label>
    <div class="col-md-9">
        <textarea class="form-control" name="platform_kegiatan"></textarea>
    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Link Website / Guest Book </label>
    <div class="col-md-9">
        <textarea class="form-control" name="link_website_atau_guest_book" ></textarea>

    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Halaman Website Institusi</label>
    <div class="col-md-9">
        <textarea class="form-control" name="halaman_website_institusi" required></textarea>
        <div style="font-size:13px;">Mohon untuk mencantumkan halaman website institusi.</div>
    </div>
</div>
<div class="row form-group">
    <label for="" class="col-md-3 col-form-label">Level Sekolah</label>
    <div class="col-md-9">
        <textarea class="form-control" name="level_sekolah" placeholder=""
        value=""></textarea>
    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">Jurusan</label>
    <div class="col-md-9">
        <textarea class="form-control" name="jurusan" ></textarea>
    </div>
</div>
<div class="row form-group">

    <label for="" class="col-md-3 col-form-label">SPP Sekolah</label>
    <div class="col-md-9">
        <textarea class="form-control" name="spp_sekolah"></textarea>
    </div>
</div>


<div class="row form-group">
    <div class="col-md-12 text-center"> <br><h5>Required Documents to Upload</h5></div>
    <label for="" class="col-md-3 col-form-label">Photograph</label>
    <div class="col-md-9">
        <input type="file" class="form-control" name="photograph">
        <div>Harap upload foto tamu disini</div>
    </div>

</div>

<div class="col-md-12 text-right">
    <button type="submit" name="" id="submit" value="Submit"
    class="btn btn-primary" >Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>
</div>
</div>-->
<script type="text/javascript">
  @if(session('response') == 'ask-question')
  $("#{{session('response')}}-tab").tab('show');

 // $("#{{session('response')}} #submitted").show();
  //$("#{{session('response')}} #not-submitted").hide();

  @endif
  function submit_another_question(id){
    $("#"+id+" #submitted").hide();
     $("#"+id+" #not-submitted").show();
  }
    function close_alert() {
        $('.alert').hide();
    }

</script>
@stop
