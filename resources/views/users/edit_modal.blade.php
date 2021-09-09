<!--begin::Modal - Edit user-->
<div class="modal fade" id="kt_modal_edit_user" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header" id="kt_modal_edit_user_header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder">Update User</h2>
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
				<form id="kt_modal_edit_user_form" class="form">
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_edit_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_user_header" data-kt-scroll-wrappers="#kt_modal_edit_user_scroll" data-kt-scroll-offset="300px">
						{{--
						<!--begin::Input group-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="d-block fw-bold fs-6 mb-5">Avatar</label>
							<!--end::Label-->
							<!--begin::Image input-->
							<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.png)">
								<!--begin::Preview existing avatar-->
								<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/150-1.jpg);"></div>
								<!--end::Preview existing avatar-->
								<!--begin::Label-->
								<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
									<i class="bi bi-pencil-fill fs-7"></i>
									<!--begin::Inputs-->
									<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
									<input type="hidden" name="avatar_remove" />
									<!--end::Inputs-->
								</label>
								<!--end::Label-->
								<!--begin::Cancel-->
								<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
									<i class="bi bi-x fs-2"></i>
								</span>
								<!--end::Cancel-->
								<!--begin::Remove-->
								<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
									<i class="bi bi-x fs-2"></i>
								</span>
								<!--end::Remove-->
							</div>
							<!--end::Image input-->
							<!--begin::Hint-->
							<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
							<!--end::Hint-->
						</div>
						<!--end::Input group-->
						--}}
						<!--begin::Input group-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Full Name</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="hidden" name="id" />
							<input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-7">
							<!--begin::Label-->
							<label class="required fw-bold fs-6 mb-2">Email</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="mb-7">
							<!--begin::Label-->
							<label class="fw-bold fs-6 mb-5">Role</label>
							<!--end::Label-->
							<!--begin::Roles-->
							@foreach( $roles as $key => $role )
								@if( $key )
									<div class='separator separator-dashed my-5'></div>
								@endif
								<!--begin::Input row-->
								<div class="d-flex fv-row">
									<!--begin::Radio-->
									<div class="form-check form-check-custom form-check-solid">
										<!--begin::Input-->
										<input class="form-check-input me-3" name="role_id" type="radio" value="{{ $role->id }}" id="ym_modal_update_role_option_{{ $key }}" />
										<!--end::Input-->
										<!--begin::Label-->
										<label class="form-check-label" for="ym_modal_update_role_option_{{ $key }}">
											<div class="fw-bolder text-gray-800">{{ $role->name }}</div>
											<div class="text-gray-600">Best for business owners and company administrators</div>
										</label>
										<!--end::Label-->
									</div>
									<!--end::Radio-->
								</div>
								<!--end::Input row-->
							@endforeach
							<!--end::Roles-->
						</div>
						<!--end::Input group-->
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
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
<!--end::Modal - Edit user-->
@push( 'scripts' )
	<script type="text/javascript">
		var YMUsersEditUser = function() {
		    const t = document.getElementById( 'kt_modal_edit_user' );
	        const e = t.querySelector( '#kt_modal_edit_user_form' );
	        const n = new bootstrap.Modal( t );

		    return {
		        init: function() {
		            (
		            	() => {
			                const i = t.querySelector( '[data-kt-users-modal-action="submit"]' );
			                var o = FormValidation.formValidation(e, {
			                    fields: {
			                        name: {
			                            validators: {
			                                notEmpty: {
			                                    message: "Full name is required"
			                                }
			                            }
			                        },
			                        email: {
			                            validators: {
			                                notEmpty: {
			                                    message: "Valid email address is required"
			                                },
				                            emailAddress: {
				                                message: "The value is not a valid email address"
				                            }
			                            }
			                        }
			                    },
			                    plugins: {
			                        trigger: new FormValidation.plugins.Trigger,
			                        bootstrap: new FormValidation.plugins.Bootstrap5( {
			                            rowSelector: ".fv-row",
			                            eleInvalidClass: "",
			                            eleValidClass: ""
			                        } )
			                    }
			                } );

			                $( i ).click( function( t ) {
			                	t.preventDefault();
			                	o.validate().then( function( t ) {
			                		if( "Valid" == t ) {
			                			i.setAttribute( "data-kt-indicator", "on" );
			                			i.disabled = !0;
			                			$.ajax( {
			                				url: "{{ route( 'api::users::update', ':_id' ) }}".replace( ':_id', e.querySelector( 'input[name=id]' ).value ),
			                				method: 'put',
			                				data: $( e ).serialize(),
			                				success: function( response ) {
					                            i.removeAttribute( "data-kt-indicator" );
					                            i.disabled = !1;
			                					if( response.code == 201 ) {
										        	YMUsersEditUser.updateUserCallback( response.data );
						                            Swal.fire( {
						                                text: response.message,
						                                icon: "success",
						                                buttonsStyling: !1,
						                                confirmButtonText: "Ok, got it!",
						                                customClass: {
						                                    confirmButton: "btn btn-primary"
						                                }
						                            } ).then( function( t ) {
					                            		e.reset();
						                                t.isConfirmed && n.hide()
						                            } );
						                        }
			                				}
			                			} );
			                		} else {
			                			Swal.fire( {
				                            text: "Sorry, looks like there are some errors detected, please try again.",
				                            icon: "error",
				                            buttonsStyling: !1,
				                            confirmButtonText: "Ok, got it!",
				                            customClass: {
				                                confirmButton: "btn btn-primary"
				                            }
				                        } );
			                		}
			                    } );
			                } );

			                t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (t => {
			                    t.preventDefault(), Swal.fire({
			                        text: "Are you sure you would like to cancel?",
			                        icon: "warning",
			                        showCancelButton: !0,
			                        buttonsStyling: !1,
			                        confirmButtonText: "Yes, cancel it!",
			                        cancelButtonText: "No, return",
			                        customClass: {
			                            confirmButton: "btn btn-primary",
			                            cancelButton: "btn btn-active-light"
			                        }
			                    }).then((function(t) {
			                        t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss && Swal.fire({
			                            text: "Your form has not been cancelled!.",
			                            icon: "error",
			                            buttonsStyling: !1,
			                            confirmButtonText: "Ok, got it!",
			                            customClass: {
			                                confirmButton: "btn btn-primary"
			                            }
			                        })
			                    }))
			                })), t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (t => {
			                    t.preventDefault(), Swal.fire({
			                        text: "Are you sure you would like to cancel?",
			                        icon: "warning",
			                        showCancelButton: !0,
			                        buttonsStyling: !1,
			                        confirmButtonText: "Yes, cancel it!",
			                        cancelButtonText: "No, return",
			                        customClass: {
			                            confirmButton: "btn btn-primary",
			                            cancelButton: "btn btn-active-light"
			                        }
			                    }).then((function(t) {
			                        t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss && Swal.fire({
			                            text: "Your form has not been cancelled!.",
			                            icon: "error",
			                            buttonsStyling: !1,
			                            confirmButtonText: "Ok, got it!",
			                            customClass: {
			                                confirmButton: "btn btn-primary"
			                            }
			                        })
			                    }))
			                }))
		            	}
	            	)(
	            		editUser = ( row ) => {
			        		data = user_datatable.row( row ).data();
			        		e.querySelector( 'input[name=id]' ).value = data.id;
			        		e.querySelector( 'input[name=name]' ).value = data.name;
			        		e.querySelector( 'input[name=email]' ).value = data.email;
			        		$( e ).find( `input[name="role_id"][value=${data.role_id}]` ).attr( 'checked', true );
		        			n.show();
	            		}
		            )
		        }
		    }
		}();

		KTUtil.onDOMContentLoaded( function() {
		    YMUsersEditUser.init();
		} );
	</script>
@endpush