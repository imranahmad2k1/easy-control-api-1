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
        Schema::create('checkin', function (Blueprint $table) {
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
            $table->string('TrackingID', 100)->nullable();
            $table->dateTime('CheckInDate');
            $table->dateTime('ReservationDate');
            $table->longText('Remarks')->nullable();
            $table->integer('NoOfChilds')->nullable();
            $table->integer('NoOfAdults')->nullable();
            $table->integer('NoOfNightsToStay')->nullable();
            $table->dateTime('DepartureDate');
            $table->integer('IsCheckedOut')->nullable();
            $table->char('Reservation', 38)->nullable();
            $table->char('Guest', 38)->nullable();
            $table->char('RateType', 38)->nullable();
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_CheckIn');
            
            $table->foreign('Guest', 'FK_CheckIn_Guest')->references('id')->on('guests');
            $table->foreign('RateType', 'FK_CheckIn_RateType')->references('id')->on('roomratetypes');
            $table->foreign('Reservation', 'FK_CheckIn_Reservation')->references('id')->on('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkin');
    }
};
