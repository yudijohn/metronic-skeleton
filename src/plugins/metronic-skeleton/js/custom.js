$( '.select2' ).select2( { theme: 'bootstrap4', width: '100%' } );

function parseToInteger( currency ) {
    return parseInt( currency.toString().replace(/([,])/g, "") );
}

function parseToCurrency( num ) {
    return num.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
}

$( document ).on( 'keydown', '.number-input',function ( e ) {
    var k = e.which;
    if ( ( k < 48 || k > 57 ) && ( k < 96 || k > 105 ) && k != 8 && k != 46 && k != 9 && k != 13 ) {
        e.preventDefault();
        return false;
    }
} ).on( 'keyup', '.number-input', function ( e ) {
  if( $( this ).val() ) {
    $( this ).val( parseToCurrency( parseToInteger( $( this ).val() ) ) );
  }
} ).on( 'blur', '.number-input', function( e ) {
  if( $( this ).val() == '' ) {
    $( this ).val( 0 );
  } 
} ).on( 'focus', '.number-input',function( e ){
  if( $( this ).val() == '0' ) {
    $( this ).val( '' );
  } 
} ).ready( function() {
    $( '.number-input' ).trigger( 'keyup' );
} );