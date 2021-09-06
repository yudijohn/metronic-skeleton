$( document ).on( 'click', '[data-kt-users-table-filter="delete_row"]', function( e ) {
	e.preventDefault();
    var action_url = $( this ).attr( 'href' );
	Swal.fire( {
        text: "Are you sure you want to delete the data?",
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
                url: action_url,
                method: 'delete',
                success: function( response ) {
                    if( response.code == 201 ) {
                        datatableDeleteCallback();
                        Swal.fire( {
                            text: response.message,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        } );
                    }
                }
            } );
        }
    } );
} );