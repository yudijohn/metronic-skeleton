<?php

namespace yudijohn\Metronic\Controllers\Api;

use yudijohn\Metronic\Requests\Api\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \yudijohn\Metronic\Requests\Api\AuthRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store( AuthRequest $request )
    {
        if( $request->has( 'username' ) ) {
            if( Auth::once( $request->only( [ 'username', 'password' ] ) ) ) {
                return response()->json( [
                    'code' => 201,
                    'message' => 'Valid login'
                ], 201 );
            }
        } else {
            if( Auth::once( $request->only( [ 'email', 'password' ] ) ) ) {
                return response()->json( [
                    'code' => 201,
                    'message' => 'Valid login'
                ], 201 );
            }
        }
        return response()->json( [
            'code' => 404,
            'message' => 'Login gagal, email atau password salah.'
        ], 200 );
    }
}
