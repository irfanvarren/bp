 <table class="table table-bordered mb-0">
  <tr>
    <th>Subject</th> <th>Reference #</th> <th>Date Time</th> <th>Type</th> <th>Note Taker</th> <th>Date Created</th>
  </tr>
  @foreach($briefings as $briefing)
  <tr>
    <td>{{$briefing->subject}}</td> <td>{{$briefing->reference}}</td> <td>{{$briefing->date}} {{$briefing->time}}</td><td>{{$briefing->type}}</td><td>{{$briefing->note_taker}}</td><td>{{$briefing->created_at}}</td>
  </tr>
  @endforeach
</table>
<div>{{$briefings->links('admin.company-data.briefing.ajax-pagination')}}</div>