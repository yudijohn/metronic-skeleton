@extends( 'metronic::layout.index' )
@section( 'toolbar' )
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                User Management
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
                <li class="breadcrumb-item text-muted">User Management</li>
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
		<!--begin::Card-->
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header border-0 pt-6">
				<!--begin::Card title-->
				<div class="card-title">
					<!--begin::Search-->
					<div class="d-flex align-items-center position-relative my-1">
						<!--begin::Svg Icon-->
						<span class="svg-icon svg-icon-1 position-absolute ms-6">
							<x-icon name="search" />
						</span>
						<!--end::Svg Icon-->
						<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
					</div>
					<!--end::Search-->
				</div>
				<!--begin::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
					<!--begin::Toolbar-->
					<div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
						<!--begin::Filter-->
						<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
						<!--begin::Svg Icon-->
						<span class="svg-icon svg-icon-2">
							<x-icon name="filter" />
						</span>
						<!--end::Svg Icon-->Filter</button>
						<!--begin::Menu 1-->
						<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
							<!--begin::Header-->
							<div class="px-7 py-5">
								<div class="fs-5 text-dark fw-bolder">Filter Options</div>
							</div>
							<!--end::Header-->
							<!--begin::Separator-->
							<div class="separator border-gray-200"></div>
							<!--end::Separator-->
							<!--begin::Content-->
							<div class="px-7 py-5" data-kt-user-table-filter="form">
								<!--begin::Input group-->
								<div class="mb-10">
									<label class="form-label fs-6 fw-bold">Role:</label>
									<select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
										<option></option>
										@foreach( $roles as $role )
											<option value="{{ $role->id }}">{{ $role->name }}</option>
										@endforeach
									</select>
								</div>
								<!--end::Input group-->
								<!--begin::Actions-->
								<div class="d-flex justify-content-end">
									<button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
									<button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Menu 1-->
						<!--end::Filter-->
						<!--begin::Add user-->
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
							<!--begin::Svg Icon-->
							<span class="svg-icon svg-icon-2">
								<x-icon name="plus" />
							</span>
							<!--end::Svg Icon-->Add User
						</button>
						<!--end::Add user-->
					</div>
					<!--begin::Group actions-->
					<div class="d-flex justify-content-end align-items-center d-none" data-kt-docs-table-toolbar="selected">
						<div class="fw-bolder me-5">
						<span class="me-2" data-kt-docs-table-select="selected_count"></span>Selected</div>
						<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
					</div>
					<!--end::Group actions-->
					<!--end::Toolbar-->
					<!--begin::Modal - Adjust Balance-->
					<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
						<!--begin::Modal dialog-->
						<div class="modal-dialog modal-dialog-centered mw-650px">
							<!--begin::Modal content-->
							<div class="modal-content">
								<!--begin::Modal header-->
								<div class="modal-header">
									<!--begin::Modal title-->
									<h2 class="fw-bolder">Export Users</h2>
									<!--end::Modal title-->
									<!--begin::Close-->
									<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
										<!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
										<span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
													<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
													<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
												</g>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</div>
									<!--end::Close-->
								</div>
								<!--end::Modal header-->
								<!--begin::Modal body-->
								<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
									<!--begin::Form-->
									<form id="kt_modal_export_users_form" class="form" action="#">
										<!--begin::Input group-->
										<div class="fv-row mb-10">
											<!--begin::Label-->
											<label class="fs-6 fw-bold form-label mb-2">Select Roles:</label>
											<!--end::Label-->
											<!--begin::Input-->
											<select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bolder">
												<option></option>
												<option value="Administrator">Administrator</option>
												<option value="Analyst">Analyst</option>
												<option value="Developer">Developer</option>
												<option value="Support">Support</option>
												<option value="Trial">Trial</option>
											</select>
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-10">
											<!--begin::Label-->
											<label class="required fs-6 fw-bold form-label mb-2">Select Export Format:</label>
											<!--end::Label-->
											<!--begin::Input-->
											<select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bolder">
												<option></option>
												<option value="excel">Excel</option>
												<option value="pdf">PDF</option>
												<option value="cvs">CVS</option>
												<option value="zip">ZIP</option>
											</select>
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Actions-->
										<div class="text-center">
											<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
											<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
												<span class="indicator-label">Submit</span>
												<span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											</button>
										</div>
										<!--end::Actions-->
									</form>
									<!--end::Form-->
								</div>
								<!--end::Modal body-->
							</div>
							<!--end::Modal content-->
						</div>
						<!--end::Modal dialog-->
					</div>
					<!--end::Modal - New Card-->
				</div>
				<!--end::Card toolbar-->
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body pt-0">
				<!--begin::Table-->
					<table id="kt_table_users" class="table align-middle table-row-dashed fs-6 gy-5">
						<thead>
							<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
								<th class="w-10px pe-2">
									<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
										<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
									</div>
								</th>
								<th>Name</th>
								<th>Role</th>
								<th class="min-w-100px">Actions</th>
							</tr>
						</thead>
						<tbody class="text-gray-600 fw-bold"></tbody>
					</table>
				<!--end::Table-->
			</div>
			<!--end::Card body-->
		</div>
		<!--end::Card-->
    </x-app-container>
    <!--end::Content container-->
	@include( 'metronic::users.create_modal' )
	@include( 'metronic::users.edit_modal' )
@endsection
@push( 'styles' )
	{{ Html::style( 'plugins/yudijohn/metronic/plugins/datatables/datatables.bundle.css' ) }}
@endpush
@push( 'scripts' )
	{{ Html::script( 'plugins/yudijohn/metronic/plugins/datatables/datatables.bundle.js' ) }}
	{{ Html::script( 'plugins/yudijohn/metronic/js/datatable-delete.js' ) }}
	<script type="text/javascript">
		KTUsersAddUser.storeUserCallback = function() {
			user_datatable.ajax.reload();
		}

		YMUsersEditUser.updateUserCallback = function() {
			user_datatable.ajax.reload();
		}

		const deleteUserUrl = "{{ route( 'api::users::destroy', ':_id' ) }}";
		deleteUser = ( row ) => {
    		data = user_datatable.row( row ).data();
			Swal.fire( {
		        text: "Are you sure you want to delete " + data.name + "?",
		        icon: "warning",
		        showCancelButton: !0,
		        buttonsStyling: !1,
		        confirmButtonText: "Yes, delete!",
		        cancelButtonText: "No, cancel",
		        customClass: {
		            confirmButton: "btn fw-bold btn-danger",
		            cancelButton: "btn fw-bold btn-active-light-primary"
		        }
		    } ).then( function( t ) {
		        if( t.value ) {
					$.ajax( {
						url: deleteUserUrl.replace( ':_id', data.id ),
						method: 'delete',
		                headers: {
		                    Authorization: 'Bearer ' + '{{ Auth::user()->api_token }}',
		                },
						success: function( response ) {
							user_datatable.ajax.reload();
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
		}

		$( document ).on( 'click', '#kt_table_users [type="checkbox"]', function() {
            setTimeout( function() {
                n();
            }, 50 );
		} );

        n = function() {
            const e = document.querySelector("#kt_table_users"),
                t = document.querySelector('[data-kt-docs-table-toolbar="base"]'),
                n = document.querySelector('[data-kt-docs-table-toolbar="selected"]'),
                a = document.querySelector('[data-kt-docs-table-select="selected_count"]'),
                r = e.querySelectorAll('tbody [type="checkbox"]');
            let s = !1,
                o = 0;
            r.forEach((e => {
                e.checked && (s = !0, o++)
            })), s ? (a.innerHTML = o, t.classList.add("d-none"), n.classList.remove("d-none")) : (t.classList.remove("d-none"), n.classList.add("d-none"))
        };

        var user_datatable = $( '#kt_table_users' ).DataTable( {
			lengthChange : !1,
			info: !1,
            order: [ [ 1, 'asc' ] ],
            select: {
                style: 'os',
                selector: 'td:first-child',
                className: 'row-selected'
            },
            ajax: {
    			url: "{{ route( 'api::users::datatable' ) }}",
                headers: {
                    Authorization: 'Bearer ' + '{{ Auth::user()->api_token }}',
                },
                data: function ( filter ) {
                    filter.name = $( '[data-kt-user-table-filter="search"]' ).val();
                    filter.role_id = $( '[data-kt-user-table-filter="role"]' ).val();
                }
            },
            columns: [
            	{ data: 'id', render: function( value ) {
					return `<div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="user_ids[]" value="${value}" />
                    </div>`;
				}, orderable: false },
            	{ data: 'name', render: function( value, type, row ) {
            		var user_show_url = "{{ route( 'admin::users::show', ':_id' ) }}";
            		return `<div class="d-flex">
	            		<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
							<a href="` + user_show_url.replace( ':_id', row.id ) + `">
								<div class="symbol-label">
									<img src="` + row.avatar + `" alt="` + row.name + `" class="w-100">
								</div>
							</a>
	            		</div>
	            		<div class="d-flex flex-column">
							<a href="` + user_show_url.replace( ':_id', row.id ) + `" class="text-dark fw-bolder text-hover-primary mb-1">` + row.name + `</a>
							<span>` + row.email + `</span>
						</div>
					</div>`;
            		return row.avatar;
            	} },
            	{ data: 'role_name', render: function( value ) {
            		if( value ) return value; return '-';
            	}, orderable: false },
            	{ data: null, class: 'text-end', render: function( value, type, row, meta ) {
            		return `<a href="javascript:;" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
					    Actions
					    <span class="svg-icon svg-icon-5 m-0">
							<x-icon name="chevron" />
					    </span>
					</a>
					<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
					    <div class="menu-item px-3">
					        <a href="javascript:;" class="menu-link px-3" data-kt-users-table-filter="edit_row" onclick="editUser(${ meta.row })">
					            Edit
					        </a>
					    </div>
				        <div class="menu-item px-3">
				            <a class="menu-link px-3" onclick="deleteUser(${ meta.row })">
				                Delete
				            </a>
				        </div>
					</div>`;
            	}, orderable: false }
        	],
        }).on( 'draw', function() {
            n();
            KTMenu.createInstances();
        } );

        $( '[data-kt-user-table-filter="search"]' ).on( 'keyup', function( t ) {
            user_datatable.ajax.reload();
        } );

        $( '[data-kt-user-table-filter="filter"]' ).click( function() {
            user_datatable.ajax.reload();
        } );

        $( document ).on( 'click', '[data-kt-user-table-select="delete_selected"]', function() {
        	console.log( $( '[type="checkbox"]:checked' ).serializeArray() );
        	Swal.fire( {
                text: "Are you sure you want to delete selected users?",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            } ).then( function( t ) {
            	if( t.value ) {
            		$.ajax( {
            			url: "{{ route( 'api::users::destroy_bulk' ) }}",
            			method: 'delete',
            			data: { user_ids: $( '[type="checkbox"]:checked' ).serializeArray() },
		                headers: {
		                    Authorization: 'Bearer ' + '{{ Auth::user()->api_token }}',
		                },
            			success: function( response ) {
            				if( response.code == 201 ) {
			                	$( '[type="checkbox"]' ).prop( 'checked', false );
			                	user_datatable.ajax.reload();
            					Swal.fire( {
				                    text: response.message,
				                    icon: "success",
				                    buttonsStyling: !1,
				                    confirmButtonText: "Ok, got it!",
				                    customClass: {
				                        confirmButton: "btn fw-bold btn-primary"
				                    }
				                } ).then( ( function() {
				                } ) )
            				}
            			}
            		} );
            	}
            } );
        } );
	</script>
@endpush