"use strict";
var KTSigninGeneral = function() {
    var t, e, i;
    return {
        init: function() {
            t = document.querySelector("#kt_sign_in_form"), e = document.querySelector("#kt_sign_in_submit"), i = FormValidation.formValidation(t, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Email/username is required"
                            },
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row"
                    })
                }
            }), e.addEventListener("click", function(n) {
                n.preventDefault(), i.validate().then( function( i ) {
                    if( "Valid" == i ) {
                        e.setAttribute( "data-kt-indicator", "on" );
                        e.disabled = !0;
                        $.ajax( {
                            url: KTSigninGeneral.signInUrl,
                            method: 'post',
                            data: $( t ).serialize(),
                            success: function( response ) {
                                if( response.code == 201 ) {
                                    t.submit();
                                } else {
                                    Swal.fire( {
                                        text: response.message,
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    } );
                                }
                            },
                            complete: function() {
                                e.removeAttribute( "data-kt-indicator" );
                                e.disabled = !1;
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
                } )
            })
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTSigninGeneral.init()
}));