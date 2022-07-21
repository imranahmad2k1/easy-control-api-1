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
        Schema::create('rooms_checkin', function (Blueprint $table) {
            $table->char('CheckIn', 38)->nullable();
            $table->char('Room', 38)->nullable();
            $table->uuid('id')->primary();
            $table->integer('OptimisticLockField')->nullable();
            
            $table->unique(['CheckIn', 'Room'], 'iCheckInRoom_rooms_checkin');
            $table->foreign('CheckIn', 'FK_rooms_checkin_CheckIn')->references('id')->on('checkin');
            $table->foreign('Room', 'FK_rooms_checkin_Room')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms_checkin');
    }
};
