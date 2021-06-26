<!--<div class="cx-sidebar">-->
	<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
		<div class="logo">
			<a href="{{route('admin-dashboard')}}" class="simple-text logo-normal text-center">
				{{ __("Admin") }}
			</a>
		</div>
		<div class="sidebar-wrapper">
			{{ menu('Admin') }}
		</div>
	</div>
<!--</div>-->
