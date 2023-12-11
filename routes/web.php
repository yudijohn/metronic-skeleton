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

Route::group( [ 'as' => 'web::', 'middleware' => 'web', 'namespace' => 'yudijohn\Metronic\Controllers\Admin' ], function() {
    Route::group( [ 'as' => 'auths::' ], function() {
        Route::get( 'login', [ 'as' => 'create', 'uses' => 'AuthController@create' ] );
        Route::post( 'login', [  'as' => 'store', 'uses' => 'AuthController@store' ] );
    } );
} );