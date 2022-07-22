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
        Schema::create('taskscheduledetail', function (Blueprint $table) {
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
            $table->dateTime('TaskScheduleDate')->nullable();
            $table->dateTime('TaskCompletedDate')->nullable();
            $table->dateTime('FromDate')->nullable();
            $table->dateTime('ToDate')->nullable();
            $table->longText('Remarks')->nullable();
            $table->longText('HouseKeeperRemarks')->nullable();
            $table->char('HouseKeeper', 38)->nullable();
            $table->char('Room', 38)->nullable();
            $table->char('Task', 38)->nullable();
            $table->char('RoomStatus', 38)->nullable();
            $table->char('Status', 38)->nullable();
            $table->char('TaskSchedule', 38)->nullable();
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_TaskScheduleDetail');
            
            $table->foreign('HouseKeeper', 'FK_TaskScheduleDetail_HouseKeeper')->references('id')->on('housekeepers');
            $table->foreign('Room', 'FK_TaskScheduleDetail_Room')->references('id')->on('rooms');
            $table->foreign('RoomStatus', 'FK_TaskScheduleDetail_RoomStatus')->references('id')->on('roomstatuses');
            $table->foreign('Status', 'FK_TaskScheduleDetail_Status')->references('id')->on('status');
            $table->foreign('Task', 'FK_TaskScheduleDetail_Task')->references('id')->on('tasks');
            $table->foreign('TaskSchedule', 'FK_TaskScheduleDetail_TaskSchedule')->references('id')->on('taskschedules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taskscheduledetail');
    }
};
