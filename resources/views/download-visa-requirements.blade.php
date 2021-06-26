<style type="text/css">
	ul{
		margin-bottom:0px !important;
		width:100%;
	}

	ul ul {
		margin:0 !important;
	}
	p{
		width: 100%;
		margin:0 !important;
	}
</style>
<div style="text-align: center;"><h2 sytle="">Syarat Visa Student</h2></div>

@if(isset($visaRequirements))
@foreach($visaRequirements as $value)

<div style="margin-bottom: 25px;">
	<div style="padding:0;max-width: 100%;"><strong>{{$value->name}}</strong></div> 

	<div style="max-width: 100%;">
		{!! $value->content !!}
	</div>
</div>
@endforeach
@endif