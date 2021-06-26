  <option>--- Select State ---</option>
@if(!empty($level))
  @foreach($level as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif
