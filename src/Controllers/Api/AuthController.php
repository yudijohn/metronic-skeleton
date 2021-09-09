<?php

namespace yudijohn\Metronic\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        if( Auth::attempt( $request->only( [ 'email', 'password' ] ) ) ) {
            return response()->json( [
                'code' => 201,
                'message' => 'Valid login'
            ], 201 );
        }
        return response()->json( [
            'code' => 404,
            'message' => 'Username or password is invalid'
        ], 200 );
    }
}
