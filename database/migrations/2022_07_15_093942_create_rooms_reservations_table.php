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
        Schema::create('rooms_reservations', function (Blueprint $table) {
            $table->char('Reservations', 38)->nullable();
            $table->char('Room', 38)->nullable();
            $table->uuid('id')->primary();
            $table->integer('OptimisticLockField')->nullable();
            
            $table->unique(['Reservations', 'Room'], 'iReservationsRoom_rooms_reservations');
            $table->foreign('Reservations', 'FK_rooms_reservations_Reservations')->references('id')->on('reservations');
            $table->foreign('Room', 'FK_rooms_reservations_Room')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms_reservations');
    }
};
