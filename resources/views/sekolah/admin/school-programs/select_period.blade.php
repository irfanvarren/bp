<select class="form-control" id="course_period" name="course_period">
  <option value="">- Select Period -</option>
  @foreach ($coursePeriod as $key => $value)
      <option value="{{$value->id}}">{{$value->name}}</option>
  @endforeach
</select>
