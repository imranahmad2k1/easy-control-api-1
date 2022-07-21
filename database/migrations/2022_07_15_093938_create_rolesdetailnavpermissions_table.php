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
        Schema::create('rolesdetailnavpermissions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('IsActive')->nullable();
            $table->char('PropertyID', 38)->nullable();
            $table->char('CreatedBy', 38)->nullable();
            $table->dateTime('CreatedDate');
            $table->char('LastUpdatedBy', 38)->nullable();
            $table->dateTime('LastUpdatedDate');
            $table->string('CreatedByName', 100)->nullable();
            $table->string('LastUpdatedByName', 100)->nullable();
            $table->integer('SortKey')->nullable();
            $table->integer('Navigate')->nullable();
            $table->char('Role', 38)->nullable();
            $table->char('NavigationItem', 38)->nullable();
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_RolesDetailNavPermissions');
            
            $table->foreign('NavigationItem', 'FK_RolesDetailNavPermissions_NavigationItem')->references('id')->on('navigationitems');
            $table->foreign('Role', 'FK_RolesDetailNavPermissions_Role')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolesdetailnavpermissions');
    }
};
