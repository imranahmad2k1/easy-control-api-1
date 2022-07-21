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
        Schema::create('seasons', function (Blueprint $table) {
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
            $table->dateTime('StartMonth')->nullable();
            $table->integer('StartDay')->nullable();
            $table->dateTime('EndMonth')->nullable();
            $table->integer('EndDay')->nullable();
            $table->dateTime('StartDate')->nullable();
            $table->dateTime('EndDate')->nullable();
            $table->string('Alias', 100)->nullable();
            $table->string('Name', 100)->nullable();
            $table->longText('Description')->nullable();
            $table->char('SeasonType', 38)->nullable();
            $table->char('Reservation', 38)->nullable();
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_Seasons');
            
            $table->foreign('Reservation', 'FK_Seasons_Reservation')->references('id')->on('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
    }
};
