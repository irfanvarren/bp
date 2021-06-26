
  @if($multiple_questions->count())
      <table class='table bordered-table'>
      <tr> <th> No </th> <th> Question </th> <th> Options </th> <th> Answers </th><th> Action </th>
      </tr>
      @foreach($multiple_questions as $multiple_question)
          <tr> <td> {{$multiple_question->number}} </td> <td>{!! $multiple_question->question !!}</td> <td></td> <td>
            @if($multiple_question->answers->count())
            @php
            $answer = $multiple_question->answers->first()->answers;
            $explanation= $multiple_question->answers->first()->explanation;
            @endphp
            <strong>Answers : </strong> {{$answer}}  
            <br>
            <strong>Explanation : </strong> <br> 
            {!!$explanation!!}
            @else

            @php
            $answer = "";
            $explanation = "";
            @endphp
            @endif
          
      
        </td>   
         <td>  <button type='button' onclick='edit_temp_multiple_question("{{$multiple_question->id}}","{{$multiple_question->number}}","{{$answer}}","{{trim(preg_replace('/\s\s+/', ' ',addslashes($explanation)))}}")'>edit</button>  <button type='button' onclick='delete_temp_multiple_question({{$multiple_question->id}})'>delete</button></td>
         @endforeach
       </tr>
      </table>
      @else
      <div style="padding:15px;border:1px solid black;" class="col-md-12">
                  No Question, Please Add Question...
                </div>
      @endif

