<?php

namespace yudijohn\Metronic\Controllers\Api;

use yudijohn\Metronic\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \yudijohn\Metronic\Http\Requests\AuthRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store( AuthRequest $request )
    {
        if( $request->filled( 'email' ) ) {
            if( Auth::once( $request->only( [ 'email', 'password' ] ) ) ) {
                return response()->json( [
                    'code' => 201,
                    'message' => 'Login success'
                ], 201 );
            }
        } else if( $request->filled( 'username' ) ) {
            if( Auth::once( $request->only( [ 'username', 'password' ] ) ) ) {
                return response()->json( [
                    'code' => 201,
                    'message' => 'Login success'
                ], 201 );
            }
        }

        return response()->json( [
            'code' => 404,
            'message' => 'Email / username or password is invalid'
        ], 200 );
    }
}
