@extends( 'metronic::layout.index' )
@section( 'breadcrumb' )
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_header_nav'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
    	<!--begin::Title-->
    	<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Roles List</h1>
    	<!--end::Title-->
    	<!--begin::Separator-->
    	<span class="h-20px border-gray-200 border-start mx-4"></span>
    	<!--end::Separator-->
    	<!--begin::Breadcrumb-->
    	<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
    		<!--begin::Item-->
    		<li class="breadcrumb-item text-muted">
    			<a href="{{ route( 'admin::home::index' ) }}" class="text-muted text-hover-primary">Home</a>
    		</li>
    		<!--end::Item-->
    		<!--begin::Item-->
    		<li class="breadcrumb-item">
    			<span class="bullet bg-gray-200 w-5px h-2px"></span>
    		</li>
    		<!--end::Item-->
    		<!--begin::Item-->
    		<li class="breadcrumb-item text-muted">User Management</li>
    		<!--end::Item-->
    		<!--begin::Item-->
    		<li class="breadcrumb-item">
    			<span class="bullet bg-gray-200 w-5px h-2px"></span>
    		</li>
    		<!--end::Item-->
    		<!--begin::Item-->
    		<li class="breadcrumb-item text-dark">Roles List</li>
    		<!--end::Item-->
    	</ul>
    	<!--end::Breadcrumb-->
    </div>
@endsection
@section( 'content' )
	<div id="row-role" class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-9">
		<!--begin::Add new card-->
		<div class="col-md-4">
			<!--begin::Card-->
			<div class="card h-md-100">
				<!--begin::Card body-->
				<div class="card-body d-flex flex-center">
					<!--begin::Button-->
					<button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
						<!--begin::Illustration-->
						<img src="assets/media/illustrations/user-role.png" alt="" class="mw-100 mh-150px mb-7">
						<!--end::Illustration-->
						<!--begin::Label-->
						<div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Add New Role</div>
						<!--end::Label-->
					</button>
					<!--begin::Button-->
				</div>
				<!--begin::Card body-->
			</div>
			<!--begin::Card-->
		</div>
		<!--begin::Add new card-->
	</div>
	@include( 'metronic::roles.create_modal' )
	@include( 'metronic::roles.edit_modal' )
@endsection
@push( 'scripts' )
	<script type="text/javascript">
		var data_roles = [];

		KTUsersAddRole.storeCallback = function() {
			retrieveRole();
		}

		KTUsersUpdatePermissions.udpateCallback = function() {
			retrieveRole();
		}

		function retrieveRole() {
			$.ajax( {
				url: "{{ route( 'api::roles::index' ) }}",
				success: function( response ) {
					if( response.code == 200 ) {
						$( '#row-role .col-role' ).remove();
						data_roles = response.data;
						$.each( response.data, function( idx, role ) {
							$( '#row-role' ).prepend( `
								<div class="col-md-4 col-role"  data-row="${ idx }">
									<!--begin::Card-->
									<div class="card card-flush h-md-100">
										<!--begin::Card header-->
										<div class="card-header">
											<!--begin::Card title-->
											<div class="card-title">
												<h2>${ role.name }</h2>
											</div>
											<!--end::Card title-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-1">
											<!--begin::Users-->
											<div class="fw-bolder text-gray-600 mb-5">Total users with this role: ${ role.users.length }</div>
											<!--end::Users-->
											<!--begin::Permissions-->
											<div class="d-flex flex-column text-gray-600">
												<div class="d-flex align-items-center py-2">
												<span class="bullet bg-primary me-3"></span>All Admin Controls</div>
												<div class="d-flex align-items-center py-2">
												<span class="bullet bg-primary me-3"></span>View and Edit Financial Summaries</div>
												<div class="d-flex align-items-center py-2">
												<span class="bullet bg-primary me-3"></span>Enabled Bulk Reports</div>
												<div class="d-flex align-items-center py-2">
												<span class="bullet bg-primary me-3"></span>View and Edit Payouts</div>
												<div class="d-flex align-items-center py-2">
												<span class="bullet bg-primary me-3"></span>View and Edit Disputes</div>
												<div class="d-flex align-items-center py-2">
													<span class="bullet bg-primary me-3"></span>
													<em>and 7 more...</em>
												</div>
											</div>
											<!--end::Permissions-->
										</div>
										<!--end::Card body-->
										<!--begin::Card footer-->
										<div class="card-footer flex-wrap pt-0">
											<!-- <a href="../../demo1/dist/apps/user-management/roles/view.html" class="btn btn-light btn-active-primary my-1 me-2">View Role</a> -->
											<button type="button" class="btn btn-white btn-active-light-danger ym-delete-user-btn" style="display: inline-block;">Delete</button>
											<button type="button" class="btn btn-light btn-active-light-primary my-1" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role" data-row="${ idx }">Edit Role</button>
										</div>
										<!--end::Card footer-->
									</div>
									<!--end::Card-->
								</div>
							` );
						} );
					}
				}
			} );
		}

		let deleteRoleUrl = "{{ route( 'api::roles::destroy', ':_id' ) }}";
		$( document ).on( 'click', '.ym-delete-user-btn', function() {
			let row = $( this ).closest( '.col-role' ).data( 'row' );
			let role = data_roles[ row ];
            Swal.fire( {
	            text: "Are you sure you would like to delete role " + role.name + "?",
	            icon: "warning",
	            showCancelButton: !0,
	            buttonsStyling: !1,
	            confirmButtonText: "Yes, cancel it!",
	            cancelButtonText: "No, return",
	            customClass: {
	                confirmButton: "btn btn-primary",
	                cancelButton: "btn btn-active-light"
	            }
			} ).then( function( t ) {
				if( t.value ) {
					$.ajax( {
						url: deleteRoleUrl.replace( ':_id', role.id ),
						method: 'delete',
						success: function( response ) {
							retrieveRole();
							Swal.fire( {
                                text: response.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            } )
						}
					} );
				}
            } );
		} );

		$( document ).ready( function() {
			retrieveRole();
		} );
	</script>
@endpush