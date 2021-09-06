<?php

namespace yudijohn\Metronic\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use yudijohn\Metronic\Models\Role;
use Illuminate\Http\Request;
use DataTables;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with( 'users' )->orderBy( 'name', 'desc' )->get();
        return response()->json( [
            'code' => 200,
            'data' => $roles
        ], 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $request->merge( [ 'slug' => 'test5' ] );
        DB::beginTransaction();
        $role = Role::create( $request->all() );
        DB::commit();
        return response()->json( [
            'code' => 201,
            'message' => 'New role ' . $role->name . ' has created.'
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
     * @param  \yudijohn\Metronic\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Role $role )
    {
        DB::beginTransaction();
        $role->update( $request->all() );
        DB::commit();
        return response()->json( [
            'code' => 201,
            'message' => 'Role ' . $role->name . ' has updated.',
            'data' => $role
        ], 201 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy( Role $role )
    {
        DB::beginTransaction();
        $role->delete();
        DB::commit();
        return response()->json( [
            'code' => 201,
            'message' => 'Role ' . $role->name . ' has deleted.'
        ], 201 );
    }
}