<!DOCTYPE html>
<html lang="en">
    <head>
		<title>{{ config( 'app.name' ) }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="{{ asset( 'plugins/yudijohn/metronic/plugins/fullcalendar/fullcalendar.bundle.css' ) }}" rel="stylesheet" type="text/css" />
		@stack( 'styles' )
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset( 'plugins/yudijohn/metronic/global/plugins.bundle.css' ) }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset( 'plugins/yudijohn/metronic/css/style.bundle.css' ) }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
    </head>
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>
			var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }
		</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				@include( 'metronic::layout.index_parts.header' )
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					@include( 'metronic::layout.index_parts.aside' )
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
    						<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        						<!--begin::Toolbar container-->
								@yield( 'toolbar' )
        						<!--end::Toolbar container-->
							</div>
							<!--begin::Toolbar container-->
    						<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
    							<!--begin::Content container-->
								@yield( 'content' )
    							<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						@include( 'metronic::layout.index_parts.footer' )
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset( 'plugins/yudijohn/metronic/global/plugins.bundle.js' ) }}"></script>
		<script src="{{ asset( 'plugins/yudijohn/metronic/js/scripts.bundle.js' ) }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{ asset( 'plugins/yudijohn/metronic/plugins/fullcalendar/fullcalendar.bundle.js' ) }}"></script>
		@stack( 'scripts' )
		<!--end::Vendors Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>