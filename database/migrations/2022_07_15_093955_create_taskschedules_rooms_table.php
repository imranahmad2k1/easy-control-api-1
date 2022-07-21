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
        Schema::create('taskschedules_rooms', function (Blueprint $table) {
            $table->char('Room', 38)->nullable();
            $table->char('TaskSchedule', 38)->nullable();
            $table->uuid('id')->primary();
            $table->integer('OptimisticLockField')->nullable();
            
            $table->unique(['Room', 'TaskSchedule'], 'iRoomTaskSchedule_taskschedules_rooms');
            $table->foreign('Room', 'FK_taskschedules_rooms_Room')->references('id')->on('rooms');
            $table->foreign('TaskSchedule', 'FK_taskschedules_rooms_TaskSchedule')->references('id')->on('taskschedules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taskschedules_rooms');
    }
};
