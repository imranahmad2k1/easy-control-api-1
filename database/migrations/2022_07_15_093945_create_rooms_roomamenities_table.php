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
        Schema::create('rooms_roomamenities', function (Blueprint $table) {
            $table->char('RoomAmenities', 38)->nullable();
            $table->char('Rooms', 38)->nullable();
            $table->uuid('id')->primary();
            $table->integer('OptimisticLockField')->nullable();
            
            $table->unique(['RoomAmenities', 'Rooms'], 'iRoomAmenitiesRooms_rooms_roomamenities');
            $table->foreign('RoomAmenities', 'FK_rooms_roomamenities_RoomAmenities')->references('id')->on('roomamenities');
            $table->foreign('Rooms', 'FK_rooms_roomamenities_Rooms')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms_roomamenities');
    }
};
