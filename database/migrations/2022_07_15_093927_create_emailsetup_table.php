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
        Schema::create('emailsetup', function (Blueprint $table) {
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
            $table->string('EmailAddress', 100)->nullable();
            $table->string('SMTPServer', 100)->nullable();
            $table->string('Password', 100)->nullable();
            $table->integer('PortNo')->nullable();
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_EmailSetup');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emailsetup');
    }
};
