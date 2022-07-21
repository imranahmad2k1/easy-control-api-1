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
        Schema::create('reservations', function (Blueprint $table) {
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
            $table->dateTime('ReservationDate');
            $table->dateTime('ArrivalDate');
            $table->dateTime('ArrivalTime');
            $table->dateTime('DepartureDate');
            $table->dateTime('DepartureTime');
            $table->integer('NoOfNightToStay')->nullable();
            $table->integer('NoOfAdults')->nullable();
            $table->integer('NoOfChilds')->nullable();
            $table->longText('Remarks')->nullable();
            $table->integer('IsInCart')->nullable();
            $table->integer('IsCheckedIn')->nullable();
            $table->char('Guest', 38)->nullable();
            $table->char('RateType', 38)->nullable();
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_Reservations');
            
            $table->foreign('Guest', 'FK_Reservations_Guest')->references('id')->on('guests');
            $table->foreign('RateType', 'FK_Reservations_RateType')->references('id')->on('roomratetypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
