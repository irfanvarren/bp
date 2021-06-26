@extends('layouts.bp_wo_sidenav')
<style>
    .finish-test-message{
    position: relative;
    align-items: center;
    display: flex;
    justify-content: center;
    min-height: 450px;
    }
    .score-result{
        font-size:18px;
        padding:30px 0;

    }

</style>
@section('content')
<div class="col-md-12 content-wrapper">
    <div class="row justify-content-center finish-test-message">
    <div class="col-md-7 card text-center" style="margin-top:-25px;padding:30px">
        <div class="row">

        
        @if($result['test_id'] == 2)
        
            <div class="col-md-12" > <h3> <strong>The  TOEFL Test Has Been Finished </strong></h3></div>
       
        <div class="col-md-12 score-result">
            <div class="row">
                <div class="col-md-12">
            <table class="table table-bordered">
                <tr> <th>Section</th> <th>Correct Answer</th> </tr>
                @foreach($result['score_result'] as $key => $value)
                
                <tr>    
                    <th>{{$value['name']}}</th> <td>{{$value['correct_answer'].' / '.$value['total_questions']}} ({{$value['score']}})</td>
                </tr>
                @endforeach
            </table> 
            </div>
            <div class="col-md-12" style="text-decoration: underline;"> <h1> TOEFL Score : {{round($result['total_score']*10/3,0)}} </h1> </div>
            </div>
        </div>
        @elseif($result['test_id'] == 1)
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
                @foreach($result['score_result'] as $key => $value)
                <!--
                if($value['name'] == 'Writing')
                -->
                <tr>    
                    <th>{{$value['name']}}</th> <td>{{$value['correct_answer'].' / '.$value['total_questions']}}</td>
                    <td class="text-center">
                        
                        @if($value['score'] != 2 && $value['score'] != 0) 
                        
                        {{number_format($value['score'],1)}} 
                        @else 
                            @if($value['name'] == 'Writing' || $value['name'] == 'Speaking') 
                                Not Yet Graded @else 2.0 
                            @endif 
                        @endif
                            
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table> 
            </div>
            <!-- > 0.25 bulatkan ke atas < 0.25 bulatkan kebawah 
            bagi 0.5 kalau ada sisa hasil bagi, bulatkan seperti diatas
            -->
            <p class="col-md-12" style="font-size:13px;text-align:left;">*Hasil writing & speaking menyusul dalam 6 hari kerja</p>
            <div class="col-md-12" style="text-decoration: underline;">
            
            <h1> IELTS Score : {{ fmod($result['total_score'],0.5 ) == 0 ? number_format(($result['total_score'] - 2)/2,1) : number_format(round(($result['total_score'] - 2)/2,0),1) }} </h1> </div>
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
                    
                @foreach($result['score_result'] as $key => $value)
                <tr>    
                    <th>{{$value['name']}}</th> <td>{{$value['correct_answer'].' / '.$value['total_questions']}}</td>
                    <td class="text-center">
                   
                    @if($value['name'] == 'Writing' || $value['name'] == 'Speaking')
                    Not Yet Graded  
                    @else
                    @if($value['score'] != 0) {{number_format($value['score'],1)}} @else
                    0 
                    @endif
                    @endif</td>
                </tr>
                @endforeach
                </tbody>
            </table> 
            </div>
            <!-- > 0.25 bulatkan ke atas < 0.25 bulatkan kebawah 
            bagi 0.5 kalau ada sisa hasil bagi, bulatkan seperti diatas
            -->
            <div class="col-md-12" style="text-decoration: underline;"> <h1>  Total Score : {{    $result['total_score']}}</h1> </div>
            </div>
        </div>
        @endif
         <div class="col-md-12">
             <div class="row">
            <div class="col-md-6">
        <a href="{{url('student/check-answer')}}" class="btn btn-secondary col-md-12 ">Check Answer</a>
        </div>
        <div class="col-md-6">
    <a href="{{url('/')}}" class="btn btn-primary col-md-12">Finish</a>
        </div>
        </div>
        </div>
        </div>
        
    
    </div>
    </div>
</div>
<div class="col-md-12">
    
</div>
@endsection
@push('more-script')
<script type="text/javascript">
</script>
@endpush
