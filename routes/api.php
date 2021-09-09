<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$namespace = 'yudijohn\\Metronic\\Controllers\\Api\\';

Route::group( [ 'prefix' => 'api', 'as' => 'api::' ], function() use( $namespace ) {
    Route::group( [ 'as' => 'auths::' ], function() use( $namespace ) {
        Route::post( 'signin', [  'as' => 'store', 'uses' => $namespace . 'AuthController@store' ] );
    } );

    Route::group( [ 'middleware' => 'api' ], function() use( $namespace ) {
        Route::group( [ /*'middleware' => 'auth'*/ ], function() use( $namespace ) {
            Route::group( [ 'as' => 'users::' ], function() use( $namespace ) {
                Route::get( 'user-databale', [ 'as' => 'datatable', 'uses' => $namespace . 'UserController@datatable' ] );
                Route::post( 'create', [  'as' => 'store', 'uses' => $namespace . 'UserController@store' ] );
                Route::put( '{user}/edit', [  'as' => 'update', 'uses' => $namespace . 'UserController@update' ] );
                Route::delete( '{user}/delete', [  'as' => 'destroy', 'uses' => $namespace . 'UserController@destroy' ] );
                Route::delete( 'bulk-delete', [  'as' => 'destroy_bulk', 'uses' => $namespace . 'UserController@destroyBulk' ] );
            } );

            Route::group( [ 'prefix' => 'roles', 'as' => 'roles::' ], function() use( $namespace ) {
                Route::get( '/', [ 'as' => 'index', 'uses' => $namespace . 'RoleController@index' ] );
                Route::post( 'create', [  'as' => 'store', 'uses' => $namespace . 'RoleController@store' ] );
                Route::put( '{role}/edit', [  'as' => 'update', 'uses' => $namespace . 'RoleController@update' ] );
                Route::delete( '{role}/destroy', [  'as' => 'destroy', 'uses' => $namespace . 'RoleController@destroy' ] );
            } );
        } );
    } );
} );