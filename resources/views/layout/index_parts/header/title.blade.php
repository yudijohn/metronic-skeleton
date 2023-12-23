@hasSection( 'page_title' )
    @yield( 'page_title' )
@else
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_header_wrapper'}" class="page-title d-flex flex-column justify-content-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
            Page Title
        </h1>
        <!--end::Title-->
    </div>
    <!--end::Page title-->
@endif