<?php

namespace yudijohn\Metronic\Requests\Api;

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
            'email' => 'required_without:username|email|exists:users,email',
            'username' => 'required_without:email|exists:users,username',
            'password' => 'required'
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
            if( ! strpos( $this->email, '@' ) ) {
                $this->merge( [ 'username' => $this->email ] );
                $this->offsetUnset( 'email' );
            }
        }
        return $this->all();
    }
}