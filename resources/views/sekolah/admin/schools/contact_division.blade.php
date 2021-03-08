<select class="form-control" id="contact_division" name="contact_division">
  <option value="">- Select Division -</option>
  @foreach ($contact_division as $key => $value)
      <option value="{{$value->id}}">{{$value->name}}</option>
  @endforeach
</select>
