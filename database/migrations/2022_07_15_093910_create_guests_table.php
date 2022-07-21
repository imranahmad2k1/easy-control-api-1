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
        Schema::create('guests', function (Blueprint $table) {
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
            $table->string('FirstName', 100)->nullable();
            $table->string('LastName', 100)->nullable();
            $table->string('MiddleName', 100)->nullable();
            $table->string('Gender', 100)->nullable();
            $table->dateTime('DateOfBirth');
            $table->string('Salutation', 100)->nullable();
            $table->string('VipStatus', 100)->nullable();
            $table->string('Company', 100)->nullable();
            $table->string('MembershipNo', 100)->nullable();
            $table->string('ImageUrl', 100)->nullable();
            $table->integer('IsSameAddress')->nullable();
            $table->char('BillingAddress', 38)->nullable();
            $table->char('Address', 38)->nullable();
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_Guests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
};
