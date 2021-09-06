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

$namespace = 'yudijohn\\Metronic\\Controllers\\Admin\\';

Route::group( [ 'as' => 'admin::', 'middleware' => 'web' ], function() use( $namespace ) {
    Route::group( [ 'as' => 'auths::' ], function() use( $namespace ) {
        Route::get( 'login', [ 'as' => 'create', 'uses' => $namespace . 'AuthController@create' ] );
        Route::post( 'login', [  'as' => 'store', 'uses' => $namespace . 'AuthController@store' ] );
    } );

    Route::group( [ 'middleware' => 'auth' ], function() use( $namespace ) {
        Route::group( [ 'as' => 'auths::' ], function() use( $namespace ) {
            Route::get( 'logout', [  'as' => 'destroy', 'uses' => $namespace . 'AuthController@destroy' ] );
        } );

        Route::group( [ 'prefix' => 'users', 'as' => 'users::' ], function() use( $namespace ) {
            Route::get( '/', [ 'as' => 'index', 'uses' => $namespace . 'UserController@index' ] );
            Route::get( '{user}/show', [ 'as' => 'show', 'uses' => $namespace . 'UserController@show' ] );
        } );

        Route::group( [ 'prefix' => 'roles', 'as' => 'roles::' ], function() use( $namespace ) {
            Route::get( '/', [ 'as' => 'index', 'uses' => $namespace . 'RoleController@index' ] );
        } );
    } );
} );