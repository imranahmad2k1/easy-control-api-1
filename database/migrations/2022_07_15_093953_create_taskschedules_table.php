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
        Schema::create('taskschedules', function (Blueprint $table) {
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
            $table->dateTime('DateFrom')->nullable();
            $table->dateTime('DateTo')->nullable();
            $table->longText('Remarks')->nullable();
            $table->string('Time', 100)->nullable();
            $table->char('Task', 38)->nullable();
            $table->char('HouseKeeper', 38)->nullable();
            $table->char('Status', 38)->nullable();
            $table->char('RoomStatus', 38)->nullable();
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_TaskSchedules');
            
            $table->foreign('HouseKeeper', 'FK_TaskSchedules_HouseKeeper')->references('id')->on('housekeepers');
            $table->foreign('RoomStatus', 'FK_TaskSchedules_RoomStatus')->references('id')->on('roomstatus');
            $table->foreign('Status', 'FK_TaskSchedules_Status')->references('id')->on('status');
            $table->foreign('Task', 'FK_TaskSchedules_Task')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taskschedules');
    }
};
