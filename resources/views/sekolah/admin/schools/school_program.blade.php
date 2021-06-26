<option value="">- Select School Programs -</option>
@foreach($school_programs as $value)
<option value="{{$value->id}}">{{$value->name}}</option>
@endforeach