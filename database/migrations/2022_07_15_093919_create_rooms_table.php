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
        Schema::create('rooms', function (Blueprint $table) {
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
            
            $table->string('Alias', 100)->nullable();
            $table->string('Name', 100)->nullable();
            $table->longText('Description')->nullable();
            $table->string('InterComNumber', 100)->nullable();
            $table->char('Property', 38)->nullable();
            $table->char('RoomStatus', 38)->nullable();
            $table->char('RoomType', 38)->nullable();
            $table->char('Floor', 38)->nullable();

            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_Rooms');
            
            $table->foreign('Floor', 'FK_Rooms_Floor')->references('id')->on('floors');
            $table->foreign('RoomStatus', 'FK_Rooms_RoomStatus')->references('id')->on('roomstatus');
            $table->foreign('RoomType', 'FK_Rooms_RoomType')->references('id')->on('roomtypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
