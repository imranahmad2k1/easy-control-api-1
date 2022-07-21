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
        Schema::create('rooms_images', function (Blueprint $table) {
            $table->char('RoomImages', 38)->nullable();
            $table->char('Rooms', 38)->nullable();
            $table->uuid('id')->primary();
            $table->integer('OptimisticLockField')->nullable();
            
            $table->unique(['RoomImages', 'Rooms'], 'iRoomImagesRooms_rooms_images');
            $table->foreign('RoomImages', 'FK_rooms_images_RoomImages')->references('id')->on('images');
            $table->foreign('Rooms', 'FK_rooms_images_Rooms')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms_images');
    }
};
