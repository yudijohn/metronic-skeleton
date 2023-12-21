<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<base href=""/>
		<title>{{ config( 'app.name' ) }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="{{ asset( 'plugins/yudijohn/metronic/plugins/fullcalendar/fullcalendar.bundle.css' ) }}" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset( 'plugins/yudijohn/metronic/global/plugins.bundle.css' ) }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset( 'plugins/yudijohn/metronic/css/style.bundle.css' ) }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
		@stack( 'styles' )
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="{{ ( isset( $_page_sidebar_option ) && in_array( $_page_sidebar_option, [ 'dark', 'light' ] ) ) ? $_page_sidebar_option : 'dark' }}-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
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
					<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
						<!--begin::Logo-->
						<div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
							<!--begin::Logo image-->
							@include( 'metronic::layout.index_parts.sidebar.logo' )
							<!--end::Logo image-->
							<!--begin::Sidebar toggle-->
							<div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
							<i class="ki-duotone ki-black-left-line fs-3 rotate-180">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
							</div>
							<!--end::Sidebar toggle-->
						</div>
						<!--end::Logo-->
						<!--begin::sidebar menu-->
						<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
							<!--begin::Menu wrapper-->
							<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
								<!--begin::Menu-->
								<div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
									@include( 'metronic::layout.index_parts.aside' )
								</div>
								<!--end::Menu-->
							</div>
							<!--end::Menu wrapper-->
						</div>
						<!--end::sidebar menu-->
					</div>
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
                            <div id="kt_app_toolbar" class="app-toolbar {{ View::hasSection( 'toolbar' ) ? 'py-3 py-lg-6' : 'pt-3 pt-lg-6' }}">
								<!--begin::Toolbar container-->
								@yield( 'toolbar' )
								<!--end::Toolbar container-->
							</div>
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
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset( 'plugins/yudijohn/metronic/global/plugins.bundle.js' ) }}"></script>
		<script src="{{ asset( 'plugins/yudijohn/metronic/js/scripts.bundle.js' ) }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="{{ asset( 'plugins/yudijohn/metronic/plugins/fullcalendar/fullcalendar.bundle.js' ) }}"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		@stack( 'scripts' )
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>