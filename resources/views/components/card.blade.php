<div class="card card-flush {{ $class }}">
    @if( isset( $title ) )
        <!--begin::Header-->
        <div class="card-header pt-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">{{ $title }}</span>
                @if( isset( $subtitle ) )
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">{{ $subtitle }}</span>
                @endif
            </h3>
            <!--end::Title-->
            @if( isset( $toolbar ) )
                <!--begin::Toolbar-->
                <div class="card-toolbar">{{ $toolbar }}</div>
                <!--end::Toolbar-->
            @endif
        </div>
        <!--end::Header-->
    @endif
    <!--begin::Body-->
    <div class="card-body pt-6">
        {{ $slot }}
    </div>
    <!--end: Card Body-->
</div>