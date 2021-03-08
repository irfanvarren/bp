@extends('layouts.bp_wo_sidenav')
@push('head-script')
<style type="text/css">
	.mytab{
		float:left !important;
		background:#ddd;
		color:black;
	}
	.mytab .nav-link{
		background:#ddd;
		color:black;
		font-size:13px;
		font-weight: bold;
		letter-spacing: 1px;
		height:100%;
		border:none !important;
		border-radius:0 !important;
		white-space: nowrap;
overflow: hidden;
text-overflow: ellipsis;
	}
	.mytab .nav-link.active{
		background-color:#326ecf !important;
		border:none !important;
		color:white !important;
	}
	.mytab .nav-link:hover{
		border:none;
		color:black;
	}
	table tr td{
		vertical-align: middle;
	}

	.dataTables_filter{
		text-align: right;
		padding:0 30px;
	}

	#main{
		height: 100% !important;
		min-height: 100% !important;
	}
	.loading{
  position: fixed;
  top:0;
  width: 100%;
  height: 100%;
  left: 0;
  font-size:28px;
  text-align: center;
  background: rgba(255,255,255,0.8);
  z-index: 20;
  display: table;
  visibility: hidden;
}
.loading > div {
  display: table-cell;
  vertical-align: middle;
}
</style>
@endpush
@section('content')
<div class="loading">
  <div>
    Loading...
  </div>
</div>
<div class="col-md-12 content-wrapper" style="padding:15px;">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-center my-3">HALAMAN PENYIMPANAN LINK</h2>

			<ul class="nav nav-tabs mytab col-md-12" id="types" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="account-tab" data-toggle="tab" href="#" role="tab" aria-controls="account" aria-selected="true" onclick="change_type('all')" title="all">All</a>
				</li>
				@foreach($types as $key => $type)
				<li class="nav-item">
					<a class="nav-link" id="account-tab" data-toggle="tab" href="#" role="tab" aria-controls="account" aria-selected="true" onclick="change_type('{{ $type->id}}')" title="{{$type->name}}">{{$type->name}}</a>
				</li>
				@endforeach
			</ul>
		</div>
	<div class="col-md-12" style="padding:15px 30px;margin-bottom:25px;">
	<div class="row">
		<div class="col-md-3" style="border:1px solid #dedede;padding:15px;background:#555">
			<div>
				<ul class="nav nav-tabs mytab mb-3 col-md-12" id="subtypes" role="tablist" style="margin:0 !important;width: 100%;padding:0;">
					<li class="nav-item col-md-12" style="padding:0;">
						<a class="nav-link active" id="account-tab" data-toggle="tab" href="#" role="tab" aria-controls="account" aria-selected="true" onclick="change_sub_type('all')" title="All">All</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-9">
			<table class="table table-bordered table-hover datatable mdl-data-table dataTable dtr-inline collapsed" id="datatable" style="width: 100%;">
				<thead>
				<tr>
					<td>Name</td> <td>Link</td>
				</tr>
				</thead>
				<tbody id="table-output">
				@foreach($types as $type)
				@foreach($type->sub_types as $sub_type)
				@foreach($sub_type->pages as $page)
				
				<tr>
					<td>{{$page->name}}</td><td> <a href="{{url($page->slug)}}">{{url($page->slug)}}</a> </td>
					
				</tr>
				@endforeach
				@endforeach
				@endforeach
				</tbody>
			</table>
			
			

		</div>
	</div>
	</div>
</div>
</div>
@endsection
@push('more-script')
<script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	var table = $('#datatable').DataTable({
  responsive:false,
  stateSave: true,
});
	var url = "{{url('')}}";
	var division_id = "{{$division_id}}";
	var token = $("input[name='_token']").val();
	
	function change_sub_type(sub_type_id,type_id){
		$('.loading').css({
			'visibility' : 'visible'
		});
$('#table-output').html("");
		$.ajax({
			url : "{{route('change-link-subtype')}}",
			method: "POST",
			data: {
				_token: token,
				type_id : type_id,
				sub_type_id,
				division_id: division_id
			},
			success: function(data) {
				data = JSON.parse(data);

				if(data.length > 0){
					 $("#datatable").DataTable().clear();
				    var length = data.length;

				    for(var i = 0; i < length; i++) {
				    	var page = data[i];
				      $('#datatable').dataTable().fnAddData( [
				        page.name,
				        "<a href='"+url+ "/"+ page.slug+ "'>"+url +"/"+ page.slug+" </a>",
				      ]);
				    }
				}else{
						$('#table-output').html("<tr><td colspan='2'>No Data</td></tr>");
				}
			$('.loading').css({
			'visibility' : 'hidden'
			});
			},
			error: function(request, status, error) {
				alert(request.responseText);
			}
		});
	}

	function change_type(type_id){
		$('.loading').css({
			'visibility' : 'visible'
			});
		$('#subtypes').html("");
		$.ajax({
			url : "{{route('change-link-type')}}",
			method: "POST",
			data: {
				_token: token,
				type_id : type_id,
				division_id: division_id
			},
			success: function(data) {
				data = JSON.parse(data);
				console.log(data);
				$('#subtypes').html("");
								$('#table-output').html("");
				if(data.length > 0){
				$.each(data,function(k,v){
					$('#subtypes').append(`	<li class="nav-item col-md-12" style="padding:0;">
						<a class="nav-link `+ (k == 0 ? 'active' : '') +`" id="account-tab" data-toggle="tab" href="#" role="tab" aria-controls="account" aria-selected="true" onclick="change_sub_type('`+v.id+`','`+v.type_id+`')">`+v.name+`</a>
					</li>`);
				});

				if(data[0].pages.length > 0){
					 $("#datatable").DataTable().clear();
				    var length = data[0].pages.length;

				    for(var i = 0; i < length; i++) {
				      var page = data[0].pages[i];
					  $('#datatable').dataTable().fnAddData( [
				        page.name,
				        "<a href='"+url+"/" + page.slug+ "'>"+url +"/"+ page.slug+" </a>",
				      ]);
				    }
				}else{
						$('#table-output').html("<tr><td colspan='2'>No Data</td></tr>");
				}
			}else{
				$('#subtypes').html("<div style='padding:10px;'> No Data </div>");
			}
			$('.loading').css({
			'visibility' : 'hidden'
			});
			},
			error: function(request, status, error) {
				alert(request.responseText);
			}
		});
	}
</script>
@endpush