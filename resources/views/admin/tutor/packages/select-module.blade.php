
	<option value="">Without Module</option>
	@foreach($modules as $module)
	<option value="{{$module->id}}">{{$module->name}}</option>
	@endforeach
