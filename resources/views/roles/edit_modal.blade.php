<div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-800px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder">Update Role</h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
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
			<div class="modal-body scroll-y mx-5 my-7">
				<!--begin::Form-->
				<form id="kt_modal_update_role_form" class="form" action="#">
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
						@include( 'metronic::roles.form_modal' )
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard</button>
						<button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
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
@push( 'scripts' )
	<script type="text/javascript">
		"use strict";
		var KTUsersUpdatePermissions = function() {
		    const t = document.getElementById("kt_modal_update_role"),
		        e = t.querySelector("#kt_modal_update_role_form"),
		        n = new bootstrap.Modal(t);
		    return {
		        init: function() {
		        	$( document ).on( 'click','[data-bs-target="#kt_modal_update_role"]', function() {
		        		e.reset();
		        		let role = data_roles[ $( this ).data( 'row' ) ];
		        		e.querySelector( 'input[name=id]' ).value = role[ 'id' ];
		        		e.querySelector( 'input[name=name]' ).value = role[ 'name' ];
		        		$.each( role.permissions, function( idx, permission ) {
		        			e.querySelector( 'input[name="permissions[]"][value="' + permission + '"]' ).checked = true;
		        		} );
		        	} );

		            (() => {
		                var o = FormValidation.formValidation(e, {
		                    fields: {
		                        name: {
		                            validators: {
		                                notEmpty: {
		                                    message: "Role name is required"
		                                }
		                            }
		                        }
		                    },
		                    plugins: {
		                        trigger: new FormValidation.plugins.Trigger,
		                        bootstrap: new FormValidation.plugins.Bootstrap5({
		                            rowSelector: ".fv-row",
		                            eleInvalidClass: "",
		                            eleValidClass: ""
		                        })
		                    }
		                });

		                t.querySelector('[data-kt-roles-modal-action="close"]').addEventListener("click", (t => {
		                    t.preventDefault(), Swal.fire({
		                        text: "Are you sure you would like to close?",
		                        icon: "warning",
		                        showCancelButton: !0,
		                        buttonsStyling: !1,
		                        confirmButtonText: "Yes, close it!",
		                        cancelButtonText: "No, return",
		                        customClass: {
		                            confirmButton: "btn btn-primary",
		                            cancelButton: "btn btn-active-light"
		                        }
		                    }).then((function(t) {
		                        t.value && n.hide()
		                    }))
		                })), t.querySelector('[data-kt-roles-modal-action="cancel"]').addEventListener("click", (t => {
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
		                }));
		                const i = t.querySelector('[data-kt-roles-modal-action="submit"]');
		                const updateRoleUrl = "{{ route( 'api::roles::update', ':_id' ) }}";
		                i.addEventListener("click", (function(t) {
		                    t.preventDefault(), o && o.validate().then((function(t) {
		                        console.log("validated!"), "Valid" == t ? (
		                        	i.setAttribute("data-kt-indicator", "on"), i.disabled = !0,
		                        	$.ajax( {
		                        		url: updateRoleUrl.replace( ':_id', e.querySelector( 'input[name=id]' ).value ),
		                        		method: 'put',
		                        		data: $( e ).serialize(),
						                headers: {
						                    Authorization: 'Bearer ' + '{{ Auth::user()->api_token }}',
						                },
		                        		success: function( response ) {
								        	KTUsersUpdatePermissions.udpateCallback( response.data );
				                            i.removeAttribute("data-kt-indicator");
				                            i.disabled = !1;
				                            Swal.fire( {
				                                text: "Form has been successfully submitted!",
				                                icon: "success",
				                                buttonsStyling: !1,
				                                confirmButtonText: "Ok, got it!",
				                                customClass: {
				                                    confirmButton: "btn btn-primary"
				                                }
				                            } ).then( function( t ) {
				                                t.isConfirmed && n.hide();
				                            } );
		                        		}
		                        	} )
		                        ) : Swal.fire({
		                            text: "Sorry, looks like there are some errors detected, please try again.",
		                            icon: "error",
		                            buttonsStyling: !1,
		                            confirmButtonText: "Ok, got it!",
		                            customClass: {
		                                confirmButton: "btn btn-primary"
		                            }
		                        } )
		                    }))
		                }))
		            })(), (() => {
		                const t = e.querySelector("#kt_roles_select_all"),
		                    n = e.querySelectorAll('[type="checkbox"]');
		                t.addEventListener("change", (t => {
		                    n.forEach((e => {
		                        e.checked = t.target.checked
		                    }))
		                }))
		            })()
		        }
		    }
		}();
		KTUtil.onDOMContentLoaded((function() {
		    KTUsersUpdatePermissions.init()
		}));
	</script>
@endpush