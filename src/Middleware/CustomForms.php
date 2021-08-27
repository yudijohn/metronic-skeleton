<?php

namespace yudijohn\Metronic\Middleware;

use Closure;
use Form;

class CustomForms
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next )
    {
        // Get the errors from session...
        $errors = session( 'errors' );

        // If the field has errors, then add 'has-error' css class to the given field...
        Form::macro( 'hasError', function ( $field ) use ( $errors ) {
            if ( $errors && $errors->has( $field ) ) {
                return ' is-invalid';
            }

            return;
        });

        // Generate error message if the given field has errors...
        Form::macro( 'errorMsg', function ( $field, $show = false ) use ( $errors ) {
            if ( $errors && $errors->has( $field ) ) {
                return sprintf( '<span class="error invalid-feedback" %s>%s</span>', $show ? 'style="display:inline;"' : '', $errors->first( $field ) );
            }

            return;
        });

        return $next( $request );
    }
}