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
        Schema::create('taskassignments_roomtypes', function (Blueprint $table) {
            $table->char('RoomTypes', 38)->nullable();
            $table->char('TaskAssignments', 38)->nullable();
            $table->uuid('id')->primary();
            $table->integer('OptimisticLockField')->nullable();
            
            $table->unique(['RoomTypes', 'TaskAssignments'], 'iRoomTypesTaskAssignments_TaskAssignmentsTaskAssignme_910A9065');
            $table->foreign('RoomTypes', 'FK_taskassignments_RoomTypesRoomType_3809B68A')->references('id')->on('roomtypes');
            $table->foreign('TaskAssignments', 'FK_taskassignments_RoomTypesRoomType_88B904B8')->references('id')->on('taskassignments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taskassignments_roomtypes');
    }
};
