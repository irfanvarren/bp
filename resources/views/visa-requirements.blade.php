@extends('layouts.bp_wo_sidenav')
<style>
	ul, ol{
		list-style-position: inside;
	}
	ul ul,ul ol{
		padding-left: 20px;
	}
	.nav.nav-tabs{
		width:100%;
		padding:0 15px;
	}
	.nav.nav-tabs>li>a{
		background:#4180b0;
		color:white;
		margin-right: 3px;
		margin-bottom:3px;
	}
	.nav.nav-tabs>li>a.active{
		background:#34a8eb;
		color:white;
		border-bottom:none;
	}
	.nav.nav-tabs>li>a:hover{
		color:white;
	}
	.tab-content{
		background: white;
		padding:15px;
		border:1px solid #ccc;
	}
  @media screen and (max-width: 480px){
    .nav.nav-tabs{
    	margin-top:15px;
      display:block !important;
      border-bottom:none !important;
    }
    .nav.nav-tabs>li>a{
    	font-size:14px;
    	margin-bottom:5px;
    }
    .tab-content{
    	margin-top:15px;
    }
    .content-wrapper{
    	padding: 0 15px !important;
    }
}

</style>
@section('content')

<div class="col-md-12 content-wrapper">
	<div class="row">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			@foreach($visaRequirements as $key => $value)
			@php
			$key += 1;
			@endphp
			<li class="nav-item"><a data-toggle="tab" class="tab {{ $key == 1 ? 'active' : ''}} nav-link" href="#menu{{$key}}">{{$value->name}}</a></li>
			@endforeach
			
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tab-content" id="myTabContent">
				@foreach($visaRequirements as $key => $value)
				@php
				$key += 1;
				@endphp
				<div id="menu{{$key}}" class="tab-pane fade {{$key == 1 ? 'show active' : ''}}">
					{!!$value->content!!}
				</div>
				@endforeach
				
				
			</div>
			<br>
			<a href="{{url('visa-requirements/'.$country.'/'.$type.'/download')}}" class="btn btn-primary">Download </a>
			<br> <br>
			<p style="font-size: 12pt;">Note : Dokumen asli dan masih berlaku dapat diserahkan ke kantor BP untuk di Scan atau dalam bentuk Fotocopy berwarna Ukuran kertas A4/scan dokumen berwarna ke email admission1@bestpartnereducation.com</p>
		</div>
	</div>
</div>
	@endsection
	@push('more-script')
	<script type="text/javascript">
		
	</script>
	@endpush