@extends( 'metronic::layout.index' )
@section( 'toolbar' )
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Role Management
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Role Management</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
@endsection
@section( 'content' )
    <!--begin::Content container-->
	<x-app-container>
		<div id="row-role" class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-9">
			<!--begin::Add new card-->
			<div class="col-md-4">
				<!--begin::Card-->
				<div class="card h-md-100">
					<!--begin::Card body-->
					<div class="card-body d-flex flex-center">
						<!--begin::Button-->
						<button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
							<!--begin::Label-->
							<div class="fw-bolder fs-3 text-gray-600 text-hover-primary">
								<i class="bi bi-person-plus-fill fs-1"></i><br>
								Add New Role
							</div>
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
    </x-app-container>
    <!--end::Content container-->
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
                headers: {
                    Authorization: 'Bearer ' + '{{ Auth::user()->api_token }}',
                },
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
												<span class="bullet bg-primary me-3"></span>${ role.permissions.length } hak akses aktif</div>
												<!--
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
												-->
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
		                headers: {
		                    Authorization: 'Bearer ' + '{{ Auth::user()->api_token }}',
		                },
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