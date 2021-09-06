<?php

namespace yudijohn\Metronic\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use yudijohn\Metronic\Models\User;
use yudijohn\Metronic\Models\Role;
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
        $users = User::query();
        if( $request->has( 'name' ) && ! empty( $request->name ) ) {
            $users->where( function( $user ) use( $request ) {
                $user->where( 'name', 'like', '%' . $request->name . '%' );
                $user->orWhere( 'email', 'like', '%' . $request->name . '%' );
            } );
        }
        if( $request->has( 'role_id' ) && ! empty( $request->role_id ) ) {
            $users->whereHas( 'roles', function( $role ) use( $request ) {
                $role->where( 'role_id', $request->role_id );
            } );
        }
        return DataTables::eloquent( $users )->addColumn( 'avatar', function() {
            return asset( 'plugins/yudijohn/metronic/img/avatar.png' );
        } )->addColumn( 'role', function( $user ) {
            if( ! $user->roles->isEmpty() ) {
                return $user->roles()->first()->name;
            }
            return null;
            return '-';
        } )->addColumn( 'action', function( $user ) use( $request ) {
            $delete_url = route( 'api::users::destroy', $user->id );
            return view( 'metronic::action_buttons', compact( 'delete_url' ) );
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
        $user = User::create( $request->all() );
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( User $user )
    {
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
            $user = User::find( $user_id[ 'value' ] );
            $user->delete();
        }
        DB::commit();
        return response()->json( [
            'code' => 201,
            'message' => count( $request->user_ids ) . ' users has deleted.'
        ], 201 );
    }
}