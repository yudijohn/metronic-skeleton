<?php

namespace yudijohn\Metronic\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function datatable( Request $request )
    {
        $users = config( 'system.models.user' )::query();
        if( $request->has( 'name' ) && ! empty( $request->name ) ) {
            $users->where( function( $user ) use( $request ) {
                $user->where( 'name', 'like', '%' . $request->name . '%' );
                $user->orWhere( 'email', 'like', '%' . $request->name . '%' );
            } );
        }
        $users->whereHas( 'roles', function( $role ) use( $request ) {
            $logged_in_user = Auth::user();
            if( ! $logged_in_user->roles()->where( 'is_super', true )->exists() ) {
                $role->where( 'is_super', false );
            }
            if( $request->has( 'role_id' ) && ! empty( $request->role_id ) ) {
                $role->where( 'role_id', $request->role_id );
            }
        } );
        return DataTables::eloquent( $users )->addColumn( 'avatar', function() {
            return asset( 'plugins/yudijohn/metronic/img/avatar.png' );
        } )->addColumn( 'role_id', function( $user ) {
            if( ! $user->roles->isEmpty() ) {
                return $user->roles()->first()->id;
            }
            return null;
        } )->addColumn( 'role_name', function( $user ) {
            if( ! $user->roles->isEmpty() ) {
                return $user->roles()->first()->name;
            }
            return null;
        } )->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        DB::beginTransaction();
        $request->merge( [
            'password' => bcrypt( $request->password ),
            'api_token' => \Str::random( 60 )
        ] );
        $user = config( 'system.models.user' )::create( $request->all() );
        if( $request->has( 'role_id' ) ) {
            $user->roles()->sync( $request->role_id );
        }
        DB::commit();
        return response()->json( [
            'code' => 201,
            'message' => 'New user ' . $user->name . ' has created.'
        ], 201 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( User $user )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $user_id )
    {
        $user = config( 'system.models.user' )::find( $user_id );
        DB::beginTransaction();
        $user->update( $request->all() );
        if( $request->has( 'role_id' ) ) {
            $user->roles()->sync( $request->role_id );
        }
        DB::commit();
        return response()->json( [
            'code' => 201,
            'message' => 'User ' . $user->name . ' has updated.',
            'data' => $user
        ], 201 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $user_id )
    {
        $user = config( 'system.models.user' )::find( $user_id );
        DB::beginTransaction();
        $user->delete();
        DB::commit();
        return response()->json( [
            'code' => 201,
            'message' => 'User ' . $user->name . ' has deleted.'
        ], 201 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyBulk( Request $request )
    {
        DB::beginTransaction();
        foreach( $request->user_ids as $user_id ) {
            $user = config( 'system.models.user' )::find( $user_id[ 'value' ] );
            $user->delete();
        }
        DB::commit();
        return response()->json( [
            'code' => 201,
            'message' => count( $request->user_ids ) . ' users has deleted.'
        ], 201 );
    }
}