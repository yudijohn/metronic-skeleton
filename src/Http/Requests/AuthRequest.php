<?php

namespace yudijohn\Metronic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function validationData()
    {
        if( $this->filled( 'email' ) ) {
            if( ! str_contains( $this->email, '@' ) ) {
                $this->merge( [ 'username' => $this->email ] );
                $this->offsetUnset( 'email' );
            }
        }
        return $this->all();
    }
}
