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
        Schema::create('users', function (Blueprint $table) {
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
            $table->char('UserID', 38)->nullable();
            $table->string('FirstName', 100)->nullable();
            $table->string('LastName', 100)->nullable();
            $table->string('UserName', 100)->nullable();
            $table->string('Email', 100)->nullable();
            $table->string('Password', 100)->nullable();
            $table->binary('Hash')->nullable();
            $table->binary('Salt')->nullable();
            $table->dateTime('LastLogin')->nullable();
            $table->integer('ChangePasswordOnFirstLogon')->nullable();
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
