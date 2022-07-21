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
        Schema::create('rooms_housekeepingdays', function (Blueprint $table) {
            $table->char('HouseKeepingDays', 38)->nullable();
            $table->char('Rooms', 38)->nullable();
            $table->uuid('id')->primary();
            $table->integer('OptimisticLockField')->nullable();
            
            $table->unique(['HouseKeepingDays', 'Rooms'], 'iHouseKeepingDaysRooms_rooms_HouseKeepingDaysH_C2C56FE8');
            $table->foreign('HouseKeepingDays', 'FK_rooms_housekeepingdays_Hous_88726421')->references('id')->on('housekeepingdays');
            $table->foreign('Rooms', 'FK_rooms_housekeepingdays_Rooms')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms_housekeepingdays');
    }
};
