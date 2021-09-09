<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->string( 'api_token' )->nullable()->unique()->after( 'password' );
        } );

        foreach( config( 'system.models.user' )::whereNull( 'api_token' )->get() as $user ) {
            $user->update( [ 'api_token' => Str::random( 60 ) ] );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->dropColumn( 'api_token' );
        } );
    }
}