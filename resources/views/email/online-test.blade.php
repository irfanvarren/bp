<head>
    <style>
        table{
            border:1px solid black;
            border-collapse: collapse;
        }
        table th,table td{
            padding:10px;
            border:1px solid black;
        }
    </style>
</head>
<body>

    <p>
        <h4>Nama : {{$regis_data->NAMA}}</h4>
    </p>
    <p>
        <h4>Alasan Mengikuti Test : {{$regis_data->ALASAN}}</h4>
    </p>
      <p>
        Skills : @if($regis_data->skills != "")
                          @php
                            $array = explode(',',$regis_data->skills);
                            foreach ($array as $key => $id){
                            $type = collect($section_types)->where('id',$id)->first();
                            @endphp
                            @if($key > 0)
                            , 
                            @endif
                            {{$type->name}}
                            @php
                          }
                          @endphp
                          
                          @endif
    </p>
    @if($email['test_id'] == 2)

    <div class="col-md-12" > <h3> <strong>The  TOEFL Test Has Been Finished </strong></h3></div>

    <div class="col-md-12 score-result">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr> <th>Section</th> <th>Correct Answer</th> </tr>
                    @foreach($email['score_result'] as $key => $value)

                    <tr>    
                        <th>{{$value['name']}}</th> <td>{{$value['correct_answer'].' / '.$value['total_questions']}} ({{$value['score']}})</td>
                    </tr>
                    @endforeach
                </table> 
            </div>
            <div class="col-md-12" style="text-decoration: underline;"> <h1> TOEFL Score : {{round($email['total_score']*10/3,0)}} </h1> </div>
        </div>
    </div>
    @elseif($email['test_id'] == 1)
    <div class="col-md-12" > <h3> <strong>The IELTS Test Has Been Finished </strong></h3></div>
    <div class="col-md-12 score-result">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead>
                        <tr> <th>Section</th> <th>Correct Answer</th> <th class="text-center">Band Score</th> </tr>
                    </thead>
                    <tbody>
                        @foreach($email['score_result'] as $key => $value)

                        <tr>    
                            <th>{{$value['name']}}</th> <td>{{$value['correct_answer'].' / '.$value['total_questions']}}</td><td class="text-center">{{$value['score'] != 0 ? number_format($value['score'],1) : '0'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
            <!-- > 0.25 bulatkan ke atas < 0.25 bulatkan kebawah 
            bagi 0.5 kalau ada sisa hasil bagi, bulatkan seperti diatas
        -->
        <div class="col-md-12" style="text-decoration: underline;"> <h1> IELTS Score : {{ fmod($email['total_score'],0.5 ) == 0 ? number_format($email['total_score']/2,1) : number_format(round($email['total_score']/2,0),1) }} </h1> </div>
    </div>
</div>
@else
<div class="col-md-12" > <h3> <strong>The Test Has Been Finished </strong></h3></div>
<div class="col-md-12 score-result">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <colgroup>
                    <col>
                    <col>
                    <col>
                </colgroup>
                <thead>
                    <tr> <th>Section</th> <th>Correct Answer</th> <th class="text-center">Total</th> </tr>
                </thead>
                <tbody>
                    @foreach($email['score_result'] as $key => $value)
                    <tr>    
                        <th>{{$value['name']}}</th> <td>{{$value['correct_answer'].' / '.$value['total_questions']}}</td><td class="text-center">@if($value['score'] != 0) {{number_format($value['score'],1)}} @else @if($value['name']=='Writing') Not Yet Graded  @else 0 @endif @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
            <!-- > 0.25 bulatkan ke atas < 0.25 bulatkan kebawah 
            bagi 0.5 kalau ada sisa hasil bagi, bulatkan seperti diatas
        -->
        <div class="col-md-12" style="text-decoration: underline;"> <h1>  Score : {{    $email['total_score']}}</h1> </div>
    </div>
</div>
@endif

@if(!$sent_to_student)
<a href="{{url('tutor-admin/result/'.$test_id)}}">Details</a>
@endif