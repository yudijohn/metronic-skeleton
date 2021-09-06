<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'roles', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'name' );
            $table->string( 'slug' )->unique();
            $table->text( 'description' )->nullable();
            $table->longText( 'permissions' )->nullable();
            $table->boolean( 'can_deleted' )->default( true );
            $table->boolean( 'is_super' )->default( false );
            $table->timestamps();
        } );

        Schema::create( 'roles_users', function ( Blueprint $table ) {
            $table->foreignId( 'role_id' )->constrained( 'roles' )->onUpdate( 'cascade' )->onDelete( 'cascade' );
            $table->foreignId( 'user_id' )->constrained( 'users' )->onUpdate( 'cascade' )->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'roles_users' );

        Schema::dropIfExists( 'roles' );
    }
}