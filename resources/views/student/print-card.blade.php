@extends('layouts.student-dashboard')
@push('head-script')

@endpush
@section('student-content')
<div class="py-4">
	<div style="width:450px;height:230px;box-shadow: 0 0 10px #cecece;border-radius:15px;display: block;margin: 0 auto;font-size:13px; font-weight: bold;font-family: 'roboto';color:#595959;overflow: hidden;background:#fafafa;position: relative;" id="student-card">

			<!--  <svg height="230" width="450" style="position: absolute;z-index: 1;overflow: hidden;">
				<polygon points="0,0 315,0 290,230 0, 230" style="fill:#fafafa;" />
				
			</svg>  -->
			

		<svg height="230" width="450" style="position: absolute;z-index: 1;overflow: hidden;">
				<polygon points="315,0 450, 0 450,230 290, 230" style="fill:#023E8A" />
				</svg>
			<div style="position:relative;z-index: 10;">
				<img src="https://bestpartnereducation.com/img/logo lama.png" style="width:100px;margin:15px;display: block;position: relative;">
								<div style="padding:0 15px;">
					<div class="my-1" style="font-size:16px"> <strong>{{$student->NAMA}} ({{$student->KD}})</strong> </div>
					<div class="mb-1">{{$student->EMAIL}}</div>
					<div class="mb-1">{{$student->KONTAK_1}}</div>
					<div class="mb-1">{{$student->KONTAK_2}}</div>
					<div class="mb-1">{{$student->KONTAK_3}}</div>
					<div class="mb-1">{{date("d/m/Y",strtotime($student->TGL_LAHIR))}}</div>
				</div>
			</div>
	
	</div>
	<div class="text-center mt-4">
		<button type="button" onclick="print_card()" class="btn btn-primary" style="padding:8px 45px;">Print</button>
	</div>
</div>
@endsection
@push('more-script')
<script type="text/javascript" src="{{asset('js/html2canvas.js')}}"></script>
<script type="text/javascript">
	function print_card(){
		html2canvas(document.querySelector("#student-card"),{
			allowTaint : true,
			useCORS: true

		}).then(canvas => {
   saveAs(canvas.toDataURL('image/jpeg',1), '{{$student->KD}}.jpg');
});
	}

	function saveAs(uri, filename) {

    var link = document.createElement('a');

    if (typeof link.download === 'string') {

        link.href = uri;
        link.download = filename;

        //Firefox requires the link to be in the body
        document.body.appendChild(link);

        //simulate click
        link.click();

        //remove the link when done
        document.body.removeChild(link);

    } else {

        window.open(uri);

    }
}
</script>
@endpush