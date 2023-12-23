@extends( 'metronic::layout.index' )
@section( 'content' )
	<x-app-container>
		{!! $_yms_view !!}
	</x-app-container>
@endsection
@section( 'page_title' )
	<div data-kt-swapper="true" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_header_wrapper'}" class="page-title d-flex flex-column justify-content-center flex-wrap me-3 mb-5 mb-lg-0">
		<!--begin::Title-->
		<h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">{{ $_yms_title }}</h1>
		<!--end::Title-->
		<!--begin::Breadcrumb-->
		<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
			<!--begin::Item-->
			<li class="breadcrumb-item text-muted">
				<a href="{{ route( 'admin::home::index' ) }}" class="text-muted text-hover-primary">Dashboard</a>
			</li>
			<!--end::Item-->
			<!--begin::Item-->
			<li class="breadcrumb-item">
				<span class="bullet bg-gray-500 w-5px h-2px"></span>
			</li>
			<!--end::Item-->
			<!--begin::Item-->
			<li class="breadcrumb-item text-muted">{{ $_yms_title }}</li>
			<!--end::Item-->
		</ul>
		<!--end::Breadcrumb-->
	</div>
@endsection