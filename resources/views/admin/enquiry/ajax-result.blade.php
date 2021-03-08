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
              <div>
              {{$enquiries->links('admin.enquiry.ajax-pagination')}}
            </div>