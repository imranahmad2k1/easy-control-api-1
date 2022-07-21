<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_users', function (Blueprint $table) {
            $table->char('Roles', 38)->nullable();
            $table->char('Users', 38)->nullable();
            $table->uuid('id')->primary();
            $table->integer('OptimisticLockField')->nullable();
            
            $table->unique(['Roles', 'Users'], 'iRolesUsers_roles_users');
            $table->foreign('Roles')->references('id')->on('roles');
            $table->foreign('Users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_users');
    }
};
